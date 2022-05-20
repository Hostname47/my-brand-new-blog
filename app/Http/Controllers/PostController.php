<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\{Post,Category,Tag,SavedPost};
use App\View\Components\Post\PostCard;
use Carbon\Carbon;
use Cookie;

class PostController extends Controller
{
    public function all(Request $request) {
        $status = 'all';
        $k = '';
        if($request->has('status'))
            $status = $request->validate(['status'=>Rule::in(['all', 'published', 'draft', 'private', 'trashed', 'awaiting-review'])])['status'];

        $statistics = DB::select("
            SELECT 'all' as k, COUNT(*) as v FROM posts WHERE deleted_at IS NULL
            union all
            SELECT 'trashed' as k, COUNT(*) as v FROM posts WHERE deleted_at IS NOT NULL
            union all
            SELECT ANY_VALUE(visibility) as k, COUNT(*) AS v FROM posts GROUP BY visibility
            union all
            SELECT ANY_VALUE(status) as k, COUNT(*) AS v FROM posts GROUP BY status
        ");
        $temp = [];
        foreach($statistics as $stats) $temp[$stats->k] = $stats->v;
        $statistics = $temp;

        if($request->has('k')) {
            $k = $request->validate(['k'=>'max:1200'])['k'];
            $posts = Post::withoutGlobalScopes()->where('title', 'like', "%$k%")
                ->orWhere('slug', 'like', "%$k%")
                ->orWhere('content', 'like', "%$k%");
        } else {
            $posts = Post::query();
            switch($status) {
                case 'all':
                    /**
                     * Here we don't have to add any contraint. Notice that all does not
                     * include trashed posts.
                     */
                    break;
                case 'published':
                    $posts = $posts->where('status', 'published');
                    break;
                case 'draft':
                    $posts = $posts->where('status', 'draft');
                    break;
                case 'awaiting-review':
                    $posts = $posts->where('status', 'awaiting-review');
                    break;
                case 'private':
                    $posts = $posts->where('visibility', 'private');
                    break;
                case 'trashed':
                    $posts = $posts->onlyTrashed();
                    break;
            }
        }
        $posts = $posts->with(['author','categories','tags'])->orderBy('updated_at', 'desc')->paginate(12);
        
        return view('admin.posts.all')
            ->with(compact('posts'))
            ->with(compact('status'))
            ->with(compact('statistics'))
            ->with(compact('k'));
    }

    public function create() {
        return view('admin.posts.create');
    }

    public function store(Request $request) {
        $postdata = $request->validate([
            'title'=>'required|max:1200',
            'title_meta'=>'required|max:1200',
            'slug'=>'required|max:1200',
            'summary'=>'sometimes|max:2000',
            'status'=>['sometimes', Rule::in(['draft', 'published', 'awaiting-review'])],
            'visibility'=>['sometimes', Rule::in(['public', 'private', 'password-protected'])],
            'content'=>'required|max:50000',
            'allow_reactions'=>['sometimes', Rule::in([0, 1])],
            'allow_comments'=>['sometimes', Rule::in([0, 1])],
        ]);
        $postdata['user_id'] = auth()->user()->id;
        // Handle published at if status is published
        if(isset($postdata['status']) && $postdata['status'] == 'published') {
            $postdata['published_at'] = Carbon::now();
        }

        // Categories
        $categories = $request->validate([
            'categories'=>'sometimes|min:1|max:10',
            'categories.*'=>'exists:categories,id',
        ]);
        // Tags
        $tags = $request->validate([
            'tags'=>'sometimes|max:36',
            'tags.*'=>'min:1|max:120'
        ]);
        // Thumbnail Image
        $thumbnail = $request->validate([
            'thumbnail'=>'sometimes|exists:metadata,id'
        ]);
        // Checking if post is password protected
        $password = $request->validate([
            'password'=>'required_if:visibility,password-protected|min:8|max:450',
        ]);

        // Create the post
        $post = Post::create($postdata);

        // Attach categories to the post if the admin select categories
        if(isset($categories['categories']))
            $post->categories()->attach($categories['categories']);
        else // Uncategorized category will be attached to post in case admin does not specify any category
            $post->categories()->attach(Category::where('slug', 'uncategorized')->first()->id);

        // Attach tags to the post
        if(isset($tags['tags'])) {
            foreach($tags['tags'] as $tag) {
                /**
                 * Here, we have to check if a tag exists with that title or not, If a tag already
                 * exists with the same title or generated slug, then we return it and get its id to attach it
                 * Otherwise the first_or_create_method will create it
                 */
                $post->tags()->syncWithoutDetaching(Tag::first_or_create(
                    ['title'=>$tag, 'title_meta'=>$tag, 'slug'=>Str::slug($tag, '-')], 
                    ['title'=>$tag, 'title_meta'=>$tag, 'slug'=>Str::slug($tag, '-'), 'description' => '--']
                )->id);
            }
        }

        // Attach thumbnail to the post
        if(isset($thumbnail['thumbnail'])) {
            $post->update(['thumbnail'=>$thumbnail]);
        }

        // Create a password for the post if admin specify password locked visibility
        if(isset($password['password'])) {
            $metadata = $post->metadata;
            // $metadata['password'] = Hash::make($password['password']);
            $metadata['password'] = $password['password'];
            $post->update(['metadata'=>$metadata]);
        }

        $flash="";
        if(isset($postdata['status']) && $postdata['status'] == 'draft')
            $flash = 'Post has been created <strong>as draft</strong> successfully.';
        else if(isset($postdata['status']) && $postdata['status'] == 'awaiting-review')
            $flash = 'Post has been created successfully under review. One of the admins will review its content before publish it.';
        else
            $flash = 'Post has been created successfully. <a href="' . route('edit.post', ['post'=>$post->id]) . '" class="link-style">click here</a> to manage the post';

        Session::flash('message', $flash);

        return [
            'id'=>$post->id,
            'editlink' => route('edit.post', ['post'=>$post->id]),
            'previewlink' => route('preview.post', ['post'=>$post->id]),
            'allpostslink' => route('admin.all.posts')
        ];
    }

    public function edit(Request $request) {
        $post = null;
        if($request->has('post'))
            $post = Post::withoutGlobalScopes()->find($request->post);

        return view('admin.posts.edit')
            ->with(compact('post'));
    }

    public function update(Request $request) {
        // Get the post
        $post_id = $request->validate(['post_id'=>'required|exists:posts,id'])['post_id'];
        $post = Post::withoutGlobalScopes()->find($post_id);

        $postdata = $request->validate([
            'title'=>'sometimes|max:1200',
            'title_meta'=>'sometimes|max:1200',
            'slug'=>'sometimes|max:1200',
            'summary'=>'sometimes|max:2000',
            'visibility'=>['sometimes', Rule::in(['public', 'private', 'password-protected'])],
            'content'=>'sometimes|max:50000',
            'allow_reactions'=>['sometimes', Rule::in([0, 1])],
            'allow_comments'=>['sometimes', Rule::in([0, 1])],
        ]);

        /**
         * Here in update, we check if thumbnail is set by admin; If so then we update
         * its value to the value specified by admin. In the other hand if the value is missed
         * we need to remove thumbnail from the post metadata
         */
        $thumbnail = $request->validate([
            'thumbnail'=>'sometimes|exists:metadata,id'
        ]);

        $categories = $request->validate([
            'categories'=>'sometimes|max:10',
            'categories.*'=>'exists:categories,id',
        ]);

        $tags = $request->validate([
            'tags'=>'sometimes|max:36',
            'tags.*'=>'min:1|max:256',
        ]);

        // Checking if post is password locked
        $password = $request->validate([
            'password'=>'required_if:visibility,password-protected|min:8|max:450',
        ]);

        if(!isset($postdata['summary']))
            $postdata['summary'] = null;

        // Update post content and other rlated inputs
        $post->update($postdata);

        // thumbnail image
        if(isset($thumbnail['thumbnail'])) {
            $post->update(['thumbnail'=>$metadata]);
        }

        // Check if visibility is password protected to save the password
        if(isset($password['password'])) {
            $metadata = $post->metadata;
            // $metadata['password'] = Hash::make($password['password']);
            $metadata['password'] = $password['password'];
            $post->update(['metadata'=>$metadata]);
        }

        // Update categories by syncing post categories with the new selected ones
        if(isset($categories['categories']) && count($categories['categories']))
            $post->categories()->sync($categories['categories']);
        else // If admin remove all categories we need to put the post as uncategorized
            $post->categories()->sync(Category::where('slug', 'uncategorized')->first()->id);
        
        /**
         * Syncing tags of post with the new ones
         *  1. first detach all tags
         *  2. then attach new selected ones
         */
        if(isset($tags['tags'])) {
            $post->tags()->sync([]); // 1
            foreach($tags['tags'] as $tag) { // 2
                $post->tags()->syncWithoutDetaching(Tag::first_or_create(
                    ['title'=>$tag, 'title_meta'=>$tag, 'slug'=>Str::slug($tag, '-')], 
                    ['title'=>$tag, 'title_meta'=>$tag, 'slug'=>Str::slug($tag, '-'), 'description' => '--']
                )->id);
            }
        }

        Session::flash('message', 'Post has been <strong>updated</strong> successfully. <a href="" class="link-style">click here</a> to view the post');
    }

    public function update_status(Request $request) {
        $data = $request->validate([
            'post_id'=>'required|exists:posts,id',
            'status'=>['required', Rule::in(['draft', 'published', 'awaiting-review'])],
        ]);

        $post = Post::withoutGlobalScopes()->find($data['post_id']);
        $data = [
            'status'=>$data['status'],
            'published_at'=>($data['status'] == 'published') ? Carbon::now() : null
        ];
        $post->update($data);

        Session::flash('message', 'Post status has been updated successfully.');
    }

    public function post_data(Request $request) {
        $post_id = $request->validate(['post_id'=>'required|exists:posts,id'])['post_id'];
        $post = Post::withoutGlobalScopes()->find($post_id);

        return [
            'title'=>$post->title,
            'title_meta'=>$post->title_meta,
            'slug'=>$post->slug,
            'content'=>$post->content,
            'visibility'=>$post->visibility,
            'password'=>($post->visibility == 'password-protected') ? $post->metadata['password'] : '',
            'categories'=>$post->categories->pluck('id'),
            'tags'=>$post->tags->pluck('title'),
            'thumbnail'=>[
                'exists' => (bool) $post->thumbnail,
                'path' => $post->thumbnail->path,
                'metadata_id' => $post->thumbnail_id
            ],
            'summary'=>$post->summary,
            'allow_comments'=>$post->allow_comments,
            'allow_reactions'=>$post->allow_reactions,
        ];
    }

    public function preview(Request $request) {
        $post = null;
        if($request->has('post'))
            $post = Post::withoutGlobalScopes()->find($request->get('post'));

        return view('admin.posts.preview')
            ->with(compact('post'));
    }

    public function delete(Request $request) {
        $post_id = $request->validate(['post_id'=>'required|exists:posts,id'])['post_id'];
        $post = Post::withoutGlobalScopes()->find($post_id);

        $post->delete();
        Session::flash('message', '
            <div class="align-center">
                Post has been trashed successfully. 
                <div class="blue bold pointer align-center ml4 untrash-post-button">
                    <svg class="spinner flex size12 mr4 none" style="margin-top: 1px;" fill="none" viewBox="0 0 16 16">
                        <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                        <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                    </svg>
                    <span class="fs13">undo</span>
                    <input type="hidden" class="post-id" value="' . $post_id . '" autocomplete="off">
                </div>
            </div>
        ');
    }

    public function restore(Request $request) {
        $post_id = $request->validate(['post_id'=>'required|exists:posts,id'])['post_id'];
        $post = Post::withoutGlobalScopes()->find($post_id);

        $post->restore();
        Session::flash('message', 'Post has been restored successfully.');
    }

    public function destroy(Request $request) {
        $post_id = $request->validate(['post_id'=>'required|exists:posts,id'])['post_id'];
        $post = Post::withoutGlobalScopes()->find($post_id);

        $post->forceDelete();
        Session::flash('message', 'Post has been permanently deleted successfully');
    }

    /** client */

    public function view(Request $request, Category $category, Post $post) {
        $link = route('view.post', ['category'=>$category->slug, 'post'=>$post->slug]);
        $title = $post->html_title;
        $saved = $post->saved;
        return view('view-post')
            ->with(compact('category'))
            ->with(compact('post'))
            ->with(compact('title'))
            ->with(compact('link'))
            ->with(compact('saved'));
    }

    public function unlock(Request $request) {
        $data = $request->validate([
            'post_id'=>'required|exists:posts,id',
            'password'=>'required|max:256'
        ]);
        $post = Post::find($data['post_id']);

        /**
         * Notice that we cannot use policies because guest users are also allowed
         * to access those locked posts if they have the password
         */
        if(is_null($post))
            abort(404, __('Post not found'));

        if($post->visibility != 'password-protected')
            abort(403, __('Post already available and does not require a password.'));

        if($data['password'] != $post->metadata['password'])
            abort(401, __('Invalid password, try again.'));
        
        /** If user provide a valid password we store a cookie for 120 minutes that allow that user to access the post */    
        $cookie = Cookie::make('post-'.$post->id.'-password', $data['password'], 120);

        return redirect($post->link)->withCookie($cookie);
    }

    public function save(Request $request) {
        $data = [
            'post_id'=>$request->validate(['post_id'=>'required|exists:posts,id'])['post_id'],
            'user_id'=>auth()->user()->id
        ];

        // Check if user already save this post
        $already = SavedPost::where('user_id', auth()->user()->id)->where('post_id', $data['post_id'])->first();
        if($already) {
            $already->delete();
            return 0;
        } else {
            SavedPost::create($data);
            return 1;
        }
    }

    public function fetch(Request $request) {
        $data = $request->validate([
            'skip'=>'required|numeric',
            'take'=>'required|numeric',
            'sort'=>['required', Rule::in(['publish-date','views','comments','reactions'])],
            'form'=>['required', Rule::in(['raw','card-component'])],
        ]);

        $sortby = '';
        switch($data['sort']) {
            case 'publish-date':
                $sortby = 'published_at desc';
                break;
            case 'views':
                $sortby = 'published_at desc'; // We'll handle this later
                break;
            case 'comments':
                $sortby = 'comments_count desc';
                break;
            case 'reactions':
                $sortby = 'reactions_count desc';
                break;
        }

        $posts = Post::with(['categories', 'author', 'author.roles', 'tags'])
            ->orderByRaw($sortby)->skip($data['skip'])->take($data['take']+1)->get();
        $hasmore = $posts->count() > $data['take'];
        $posts = $posts->take($data['take']);
        $payload = "";
        switch($data['form']) {
            case 'raw':
                $payload = $posts->map(function($post) {
                    return [
                        'id'=>$post->id,
                        // The other neccessary columns
                    ];
                });
                break;
            case 'card-component':
                $posts->map(function($post) use (&$payload) {
                    $postcard = (new PostCard($post));
                    $postcard = $postcard->render(get_object_vars($postcard))->render();
                    $payload .= $postcard;
                });
                break;
        }

        return [
            'posts'=>$payload,
            'count'=>$posts->count(),
            'hasmore'=>$hasmore
        ];
    }
}
