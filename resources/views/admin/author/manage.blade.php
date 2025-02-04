@extends('layouts.admin')

@section('title', 'Admin - Author management')

@push('scripts')
    <script src="{{ asset('js/admin/author/author.js') }}" type="text/javascript" defer></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/author.css') }}">
    <link rel="stylesheet" href="{{ asset('css/author.css') }}">
@endpush

@section('left-panel')
    @include('partials.admin.left-panel', ['page'=>'author.management', 'subpage'=>'admin.author.management'])
@endsection

@section('content')
<main class="flex flex-column">
    <div class="admin-top-page-box">
        <div class="align-center">
            <svg class="size20 mr8" fill="#202224" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M57.44,255.15q.08-23.37.15-46.72c0-12.28,2.72-15.17,15.37-15.81-4-9.44-8-18.74-11.93-28C57.4,156.14,54.1,147.49,50,139.28c-4-7.88-2.37-13.67,3.57-20a332.26,332.26,0,0,0,56.94-81.89,224,224,0,0,0,9.46-22.84c2.09-5.82,5.7-8.68,10.42-8.7s8.48,3,10.51,8.63c14,39.1,37.23,72.37,64.58,103.08,1.3,1.46,2.57,2.94,4,4.3,4.39,4.31,4.84,9.11,2.42,14.65-7.55,17.35-14.95,34.76-22.39,52.15-.51,1.17-1,2.36-1.42,3.52,1.06,1,2.23.54,3.27.59,7.86.34,11.69,4.15,11.85,12.28.16,7.79,0,15.58.05,23.36.07,8.91.23,17.81.36,26.72H182.11c0-12.48,0-25,.21-37.42.07-3.42-.92-4.31-4.31-4.28-19.6.16-39.21.08-58.81.08q-18.48,0-36.95,0c-2,0-3.87-.28-3.79,2.8.32,12.94-.44,25.89.41,38.83Zm73-210.93c-3.34,6.44-6.11,12.06-9.14,17.53-13.54,24.5-30.12,46.83-48.68,67.74-1.66,1.87-2.89,3.32-1.59,6.26,8,18,15.7,36.18,23.42,54.32.88,2.07,2,2.87,4.28,2.8,6-.17,12-.19,18,0,2.63.08,3.24-.78,3.2-3.29-.15-8.59-.21-17.19,0-25.78.08-3.05-.95-4.54-3.63-5.88-10.42-5.2-16.07-14-16.87-25.41-1.15-16.36,9.75-29.67,26.22-32.77,14-2.64,29.38,6.67,34.05,20.66,5.06,15.14-1.4,30.66-16,38-1.95,1-3,1.88-3,4.27q.19,13.62,0,27.25c0,2.42.74,3,3,3,5.84-.15,11.68-.22,17.51,0,2.88.12,4.19-.88,5.29-3.5q11.2-26.58,22.8-53c1.24-2.83.93-4.55-1.1-6.75A372,372,0,0,1,159.77,94,325.54,325.54,0,0,1,130.47,44.22Zm-.22,96.57a10.3,10.3,0,0,0,.48-20.59,10.3,10.3,0,1,0-.48,20.59Z"></path></svg>
            <h1 class="fs20 dark no-margin">Authors management</h1>
        </div>
        <div class="align-center height-max-content">
            <a href="{{ route('admin.dashboard') }}" class="blue-link align-center">
                <svg class="mr4" style="width: 13px; height: 13px" fill="#2ca0ff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M67,14.45c13.12,0,26.23,0,39.35,0C115.4,14.48,119,18,119,26.82q.06,40.09,0,80.19c0,8.67-3.61,12.29-12.23,12.31q-40.35.06-80.69,0c-8.25,0-11.92-3.74-11.93-12.11q-.08-40.33,0-80.68c0-8.33,3.69-12,12-12.06C39.74,14.4,53.35,14.45,67,14.45Zm-31.92,52c0,9.52.11,19-.06,28.56-.05,2.78.73,3.53,3.51,3.52q28.08-.2,56.14,0c2.78,0,3.54-.74,3.52-3.52q-.18-28.06,0-56.14c0-2.78-.73-3.53-3.52-3.52q-28.06.2-56.13,0c-2.78,0-3.58.73-3.52,3.52C35.16,48,35.05,57.2,35.05,66.4Zm157.34,52.94c-13.29,0-26.57,0-39.85,0-8.65,0-12.29-3.63-12.3-12.24q-.06-40.35,0-80.69c0-8.25,3.75-11.91,12.11-11.93q40.35-.06,80.69,0c8.33,0,12,3.7,12.05,12q.07,40.35,0,80.69c0,8.58-3.67,12.15-12.36,12.18C219.28,119.37,205.83,119.34,192.39,119.34Zm.77-84c-9.52,0-19,.1-28.56-.07-2.78,0-3.54.73-3.52,3.52q.18,28.07,0,56.14c0,2.77.73,3.53,3.52,3.52q28.07-.2,56.13,0c2.78,0,3.54-.73,3.52-3.52q-.18-28.06,0-56.14c0-2.77-.73-3.57-3.51-3.52C211.55,35.48,202.35,35.37,193.16,35.37ZM66.23,245.43c-13.29,0-26.57,0-39.85,0-8.62,0-12.22-3.64-12.24-12.31q-.06-40.09,0-80.19c0-8.7,3.59-12.34,12.19-12.35q40.33-.08,80.68,0c8.3,0,12,3.72,12,12.06q.07,40.33,0,80.68c0,8.52-3.73,12.09-12.43,12.12C93.12,245.46,79.67,245.43,66.23,245.43ZM98.1,193c0-9.35-.11-18.71.06-28.07,0-2.79-.74-3.53-3.52-3.51q-28.06.18-56.14,0c-2.78,0-3.53.74-3.51,3.52q.18,28.07,0,56.13c0,2.79.74,3.54,3.52,3.52q28.07-.18,56.13,0c2.79,0,3.57-.74,3.52-3.52C98,211.7,98.1,202.34,98.1,193Zm94.34,52.42a52.43,52.43,0,1,1,52.64-52.85A52.2,52.2,0,0,1,192.44,245.4Zm31.75-52.17a31.53,31.53,0,1,0-31.9,31.28A31.56,31.56,0,0,0,224.19,193.23Z"></path></svg>
                <span class="fs13 bold">{{ __('Dashboard') }}</span>
            </a>
            <svg class="size10 mx4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M224.31,239l-136-136a23.9,23.9,0,0,0-33.9,0l-22.6,22.6a23.9,23.9,0,0,0,0,33.9l96.3,96.5-96.4,96.4a23.9,23.9,0,0,0,0,33.9L54.31,409a23.9,23.9,0,0,0,33.9,0l136-136a23.93,23.93,0,0,0,.1-34Z"/></svg>
            <span class="fs13 bold">{{ __('Author management') }}</span>
        </div>
    </div>
    <div class="admin-page-content-box">
        @include('partials.session-messages')

        @if($author)
            <input type="hidden" id="author-id" value="{{ $author->id }}" autocomplete="off">
            <!-- revoke role viewer -->
            <div id="revoke-contributor-author-role-viewer" class="global-viewer full-center none">
                <div class="close-button-style-1 close-global-viewer unselectable">✖</div>
                <div class="global-viewer-content-box viewer-box-style-1" style="width: 600px;">
                    <div class="align-center space-between light-gray-border-bottom" style="padding: 14px;">
                        <div class="align-center">
                            <svg class="size18 mr8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M167.69,256.92c-4.4-51.22,37.26-92.87,89-89,0,28.5-.05,57,.09,85.51,0,3-.6,3.55-3.55,3.54C224.71,256.86,196.2,256.92,167.69,256.92ZM19.86,3.86c-16.27,0-16.31.05-16.31,16.07q0,94.91,0,189.79c0,7.15,2.26,9.84,8.61,9.85,38.23.05,76.47,0,114.7.08,2.56,0,3.43-.63,3.3-3.27a77.64,77.64,0,0,1,1.45-19.65c8.29-39.74,41.06-66.4,81.87-66.2,5.11,0,6-1.32,6-6.12-.22-36.58-.11-73.15-.12-109.73,0-8.73-2.06-10.81-10.65-10.81H19.86Zm49.8,76.56c-4.07-4.07-4-4.72.84-9.54s5.56-5,9.55-1C90.24,80,100.39,90.26,111.43,101.34c0-5.58,0-10,0-14.31,0-3.5,1.63-5.17,5.14-5,1.64,0,3.29,0,4.94,0,3.26-.07,4.84,1.45,4.82,4.76,0,10.7.07,21.4-.06,32.1-.05,5-2.7,7.64-7.66,7.71-10.7.15-21.41,0-32.11.07-3.27,0-4.87-1.54-4.8-4.82,0-1.48.07-3,0-4.44-.24-3.94,1.48-5.8,5.52-5.66,4.21.14,8.44,0,13.87,0C89.94,100.65,79.78,90.55,69.66,80.42Z"></path></svg>
                            <span class="fs20 bold dark">Revoke contributor author role</span>
                        </div>
                        <div class="pointer fs20 close-global-viewer unselectable">✖</div>
                    </div>
                    <div class="viewer-content y-auto-overflow" style="padding: 14px; max-height: 450px;">
                        <p class="dark lh15 no-margin">Revoke contributor author role from this user if he is not suitable for this role.</p>
                        <h2 class="dark no-margin fs15 my8">Author :</h2>
                        <div class="author-meta-box">
                            <div class="flex">
                                <img src="{{ $author->avatar(100) }}" class="size60 br4 pointer open-image-on-image-viewer" style="margin-right: 12px;">
                                <div class="dark">
                                    <p class="no-margin dark bold">{{ $author->fullname }}</p>
                                    <p class="no-margin fs12 mt2">{{ $author->username }}</p>
                                    <div class="simple-line-separator my4" style="width: 80px;"></div>
                                    <p class=" fs12 my4">Author since : <span>{{ $author->author_since() }}</span></p>
                                    <p class=" fs12 my4">Email : <a href="mailto:{{ $author->email }}" target="_blank" class="no-underline dark-blue open-mailto-in-new-tab">{{ $author->email }}</a></p>
                                </div>
                            </div>
                        </div>
                        <h2 class="dark no-margin fs15 my8">Author posts :</h2>
                        <p class="dark fs13 lh15 my8">Please specify whether to delete author resources including posts and other activities after revoking role, or keep them.</p>

                        <label class="typical-section-style flex pointer mb8">
                            <input type="radio" name="author-resources-after-role-revoke" checked="checked" value="keep" class="height-max-content mr6 author-resources-after-role-revoke" autocomplete="off" style="margin-top: 1px;">
                            <div class="dark">
                                <p class="bold no-margin mb4">Keep posts</p>
                                <p class="fs13 no-margin">Keep author posts fter revoking the role.</p>
                            </div>
                        </label>
                        <label class="typical-section-style flex pointer">
                            <input type="radio" name="author-resources-after-role-revoke" autocomplete="off" value="delete" class="height-max-content mr6 author-resources-after-role-revoke" style="margin-top: 1px;">
                            <div class="dark">
                                <p class="bold no-margin mb4">Delete posts</p>
                                <p class="fs13 no-margin">Delete all posts relevant to that author after revoking the role.</p>
                            </div>
                        </label>

                        <div class="my12">
                            <h2 class="no-margin fs15 bold dark">Confirmation</h2>
                            <p class="no-margin my4 dark">Please type <strong>{{ auth()->user()->username }}::revoke-author-from::{{ $author->username }}</strong> to confirm.</p>
                            <div>
                                <input type="text" autocomplete="off" class="full-width styled-input" id="revoke-author-role-confirm-input" style="padding: 8px 10px" placeholder="Revoke authore role confirmation">
                                <input type="hidden" id="revoke-author-role-confirm-value" autocomplete="off" value="{{ auth()->user()->username }}::revoke-author-from::{{ $author->username }}">
                            </div>
                        </div>

                        <div class="flex" style="margin-top: 12px">
                            <div id="revoke-contributor-author-role" class="typical-button-style red-bs red-bs-disabled align-center">
                                <div class="relative size14 mr4">
                                    <svg class="size12 icon" fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M167.69,256.92c-4.4-51.22,37.26-92.87,89-89,0,28.5-.05,57,.09,85.51,0,3-.6,3.55-3.55,3.54C224.71,256.86,196.2,256.92,167.69,256.92ZM19.86,3.86c-16.27,0-16.31.05-16.31,16.07q0,94.91,0,189.79c0,7.15,2.26,9.84,8.61,9.85,38.23.05,76.47,0,114.7.08,2.56,0,3.43-.63,3.3-3.27a77.64,77.64,0,0,1,1.45-19.65c8.29-39.74,41.06-66.4,81.87-66.2,5.11,0,6-1.32,6-6.12-.22-36.58-.11-73.15-.12-109.73,0-8.73-2.06-10.81-10.65-10.81H19.86Zm49.8,76.56c-4.07-4.07-4-4.72.84-9.54s5.56-5,9.55-1C90.24,80,100.39,90.26,111.43,101.34c0-5.58,0-10,0-14.31,0-3.5,1.63-5.17,5.14-5,1.64,0,3.29,0,4.94,0,3.26-.07,4.84,1.45,4.82,4.76,0,10.7.07,21.4-.06,32.1-.05,5-2.7,7.64-7.66,7.71-10.7.15-21.41,0-32.11.07-3.27,0-4.87-1.54-4.8-4.82,0-1.48.07-3,0-4.44-.24-3.94,1.48-5.8,5.52-5.66,4.21.14,8.44,0,13.87,0C89.94,100.65,79.78,90.55,69.66,80.42Z"></path></svg>
                                    <svg class="spinner size14 opacity0 absolute" style="top: 0; left: 0" fill="none" viewBox="0 0 16 16">
                                        <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                        <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                    </svg>
                                </div>
                                <span class="bold fs13">Revoke</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- manage a specific author -->
            <h2 class="no-margin fs18 dark">Manage Author - {{ '@' . $author->username }}</h2>
            <p class="lh15 dark my4">Manage author posts, permissions and activities.</p>
            
            <div class="author-meta-box">
                <div class="flex">
                    <img src="{{ $author->avatar(100) }}" class="size60 br4 pointer open-image-on-image-viewer" style="margin-right: 12px;">
                    <div class="dark">
                        <p class="no-margin dark bold">{{ $author->fullname }} - <a href="{{ route('admin.users.management', ['user'=>$author->username]) }}" target="_blank" class="blue bold fs12 no-underline">manage user</a></p>
                        <p class="no-margin fs12 mt2">{{ $author->username }}</p>
                        <div class="simple-line-separator my4" style="width: 80px;"></div>
                        <p class=" fs12 my4">Author since : <span>{{ $author->author_since() }}</span></p>
                        <p class=" fs12 no-margin mt4">Email : <a href="mailto:{{ $author->email }}" target="_blank" class="no-underline dark-blue open-mailto-in-new-tab">{{ $author->email }}</a></p>
                    </div>
                    <div id="open-revoke-author-role-viewer" class="align-center height-max-content move-to-right button-style-4">
                        <svg class="size14 mr6" fill="#d23a3a" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M167.69,256.92c-4.4-51.22,37.26-92.87,89-89,0,28.5-.05,57,.09,85.51,0,3-.6,3.55-3.55,3.54C224.71,256.86,196.2,256.92,167.69,256.92ZM19.86,3.86c-16.27,0-16.31.05-16.31,16.07q0,94.91,0,189.79c0,7.15,2.26,9.84,8.61,9.85,38.23.05,76.47,0,114.7.08,2.56,0,3.43-.63,3.3-3.27a77.64,77.64,0,0,1,1.45-19.65c8.29-39.74,41.06-66.4,81.87-66.2,5.11,0,6-1.32,6-6.12-.22-36.58-.11-73.15-.12-109.73,0-8.73-2.06-10.81-10.65-10.81H19.86Zm49.8,76.56c-4.07-4.07-4-4.72.84-9.54s5.56-5,9.55-1C90.24,80,100.39,90.26,111.43,101.34c0-5.58,0-10,0-14.31,0-3.5,1.63-5.17,5.14-5,1.64,0,3.29,0,4.94,0,3.26-.07,4.84,1.45,4.82,4.76,0,10.7.07,21.4-.06,32.1-.05,5-2.7,7.64-7.66,7.71-10.7.15-21.41,0-32.11.07-3.27,0-4.87-1.54-4.8-4.82,0-1.48.07-3,0-4.44-.24-3.94,1.48-5.8,5.52-5.66,4.21.14,8.44,0,13.87,0C89.94,100.65,79.78,90.55,69.66,80.42Z"></path></svg>
                        <span class="red fs13 bold" style="margin-top: -2px;">revoke author role</span>
                    </div>
                </div>
            </div>

            <div class="align-center my12">
                <svg class="size16" style="margin-right: 6px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M357.51,334.33l28.28-28.27a7.1,7.1,0,0,1,12.11,5V439.58A42.43,42.43,0,0,1,355.48,482H44.42A42.43,42.43,0,0,1,2,439.58V128.52A42.43,42.43,0,0,1,44.42,86.1H286.11a7.12,7.12,0,0,1,5,12.11l-28.28,28.28a7,7,0,0,1-5,2H44.42V439.58H355.48V339.28A7,7,0,0,1,357.51,334.33ZM495.9,156,263.84,388.06,184,396.9a36.5,36.5,0,0,1-40.29-40.3l8.83-79.88L384.55,44.66a51.58,51.58,0,0,1,73.09,0l38.17,38.17A51.76,51.76,0,0,1,495.9,156Zm-87.31,27.31L357.25,132,193.06,296.25,186.6,354l57.71-6.45Zm57.26-70.43L427.68,74.7a9.23,9.23,0,0,0-13.08,0L387.29,102l51.35,51.34,27.3-27.3A9.41,9.41,0,0,0,465.85,112.88Z"></path></svg>
                <h2 class="dark fs18 no-margin">Author posts :</h2>
            </div>
            <div class="align-center my12">
                <a href="{{ route('admin.author.management', ['author'=>$author->username, 'tab'=>'all']) }}" class="button-style-5 fs13 @if($tab=='all') blue @endif">{{ __('All') }} ({{ $statistics['all'] }})</a>
                <span class="fs10 unselectable">〡</span>
                <a href="{{ route('admin.author.management', ['author'=>$author->username, 'tab'=>'published']) }}" class="button-style-5 fs13 @if($tab=='published') blue @endif">{{ __('Published') }} ({{ $statistics['published'] }})</a>
                <span class="fs10 unselectable">〡</span>
                <a href="{{ route('admin.author.management', ['author'=>$author->username, 'tab'=>'awaiting-review']) }}" class="button-style-5 fs13 @if($tab=='awaiting-review') blue @endif">{{ __('Awaiting review') }} ({{ $statistics['awaiting-review'] }})</a>
                <span class="fs10 unselectable">〡</span>
                <a href="{{ route('admin.author.management', ['author'=>$author->username, 'tab'=>'draft']) }}" class="button-style-5 fs13 @if($tab=='draft') blue @endif">{{ __('Drafts') }} ({{ $statistics['draft'] }})</a>
                <span class="fs10 unselectable">〡</span>
                <a href="{{ route('admin.author.management', ['author'=>$author->username, 'tab'=>'deleted']) }}" class="button-style-5 fs13 @if($tab=='deleted') blue @endif">{{ __('Deleted') }} ({{ $statistics['deleted'] }})</a>
            </div>

            <div id="author-posts-box">
                @foreach($posts as $post)
                <div class="post-component">
                    <div class="categories-container">
                        @foreach($post->categories as $category)
                        <a href="{{ $category->link }}" class="category">{{ $category->title }}</a>
                        @endforeach
                    </div>
                    <a href="{{ route('admin.all.posts', ['k'=>$post->slug]) }}" target="_blank" class="title">{{ $post->title }}</a>
                    <input type="hidden" value="{{ $post->id }}" autocomplete="off">
                    <div class="status-and-actions-box">
                        <div class="status-and-visibility-container">
                            @if(is_null($post->deleted_at))
                            <div class="align-center">
                                <svg class="size11 ml4 mr4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M149.78,24c-1.59-11.62,9.08-21.73,20.46-18.55,15.86,4.42,30,12.39,42.71,22.8A127,127,0,0,1,253.15,86c.53,1.53,1,3.09,1.41,4.66a9.31,9.31,0,0,1,.21,1.79c.11,8.12-5.09,15-12.24,17-7.65,2.05-16.12-1.28-19.6-8.13-2.5-4.92-4.19-10.23-6.67-15.15-11.35-22.5-28.86-38.21-52.52-46.94C156.42,36.46,150.94,32.45,149.78,24ZM248,148.15c-5.4-4.34-11.48-4.85-17.87-1.91-5.92,2.72-8,8.16-10.21,13.63-15,36.7-42.39,57.53-81.85,60.65-40.68,3.21-78.94-22.13-93.12-60A93.32,93.32,0,0,1,75.22,53.15c9-7,19.25-11.31,29.53-15.84a16.9,16.9,0,0,0,9.17-22c-3.4-8.5-12.58-12.77-21.8-9.4C47,22.42,18.44,53.84,7.24,100.79c-.75,3.13-.76,6.43-1.63,9.53A25.14,25.14,0,0,1,5.15,114,25.78,25.78,0,0,1,4.76,118a25.93,25.93,0,0,1-.34,4.68v15.2c.06.39.13.77.18,1.16a32.61,32.61,0,0,1,.67,4.11C7.12,149,7.35,155.3,9.1,161.28q15.65,53.25,64.46,79.36a117.93,117.93,0,0,0,37.87,12.64c.36,0,.71,0,1.07,0a28.75,28.75,0,0,1,7.33.94,29,29,0,0,1,5.65.56h.15c.78,0,1.55,0,2.31.1s1.33-.1,2-.1a29.69,29.69,0,0,1,4.76.39h3.77a27,27,0,0,1,5.53-.58l.6,0a1.88,1.88,0,0,1,1.14-.38c30-3,55.54-15.52,76.82-36.63,14.91-14.79,25.81-32.2,31.52-52.55C256,158.17,253.28,152.42,248,148.15Z"></path></svg>
                                <span class="">status :</span>
                                <span class="bold ml4 {{ $post->scolor }}">{{ $post->hstatus }}</span>
                            </div>
                            @else
                            <div class="align-center">
                                <svg class="size11 ml4 mr4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M149.78,24c-1.59-11.62,9.08-21.73,20.46-18.55,15.86,4.42,30,12.39,42.71,22.8A127,127,0,0,1,253.15,86c.53,1.53,1,3.09,1.41,4.66a9.31,9.31,0,0,1,.21,1.79c.11,8.12-5.09,15-12.24,17-7.65,2.05-16.12-1.28-19.6-8.13-2.5-4.92-4.19-10.23-6.67-15.15-11.35-22.5-28.86-38.21-52.52-46.94C156.42,36.46,150.94,32.45,149.78,24ZM248,148.15c-5.4-4.34-11.48-4.85-17.87-1.91-5.92,2.72-8,8.16-10.21,13.63-15,36.7-42.39,57.53-81.85,60.65-40.68,3.21-78.94-22.13-93.12-60A93.32,93.32,0,0,1,75.22,53.15c9-7,19.25-11.31,29.53-15.84a16.9,16.9,0,0,0,9.17-22c-3.4-8.5-12.58-12.77-21.8-9.4C47,22.42,18.44,53.84,7.24,100.79c-.75,3.13-.76,6.43-1.63,9.53A25.14,25.14,0,0,1,5.15,114,25.78,25.78,0,0,1,4.76,118a25.93,25.93,0,0,1-.34,4.68v15.2c.06.39.13.77.18,1.16a32.61,32.61,0,0,1,.67,4.11C7.12,149,7.35,155.3,9.1,161.28q15.65,53.25,64.46,79.36a117.93,117.93,0,0,0,37.87,12.64c.36,0,.71,0,1.07,0a28.75,28.75,0,0,1,7.33.94,29,29,0,0,1,5.65.56h.15c.78,0,1.55,0,2.31.1s1.33-.1,2-.1a29.69,29.69,0,0,1,4.76.39h3.77a27,27,0,0,1,5.53-.58l.6,0a1.88,1.88,0,0,1,1.14-.38c30-3,55.54-15.52,76.82-36.63,14.91-14.79,25.81-32.2,31.52-52.55C256,158.17,253.28,152.42,248,148.15Z"></path></svg>
                                <span class="">status :</span>
                                <span class="bold ml4 red">deleted</span>
                            </div>
                            @endif
                            <div class="align-center">
                                <svg class="size14 ml4 mr4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M5.22,125.75c1.87-7.6,6.32-13.64,11.46-19.33C37.14,83.8,60,64.32,88.3,52.11c34.75-15,67.81-10,99.59,8.71,22.8,13.44,42.16,30.92,59,51.26,8.74,10.6,9.54,24.93,1.1,35.4-21.67,26.89-47.28,49.07-79.57,62.46-33.49,13.89-65.44,8.84-96.08-8.82-23.52-13.55-43.4-31.42-60.46-52.39-3.05-3.74-4.45-8.82-6.61-13.28ZM131.91,62.67a83.6,83.6,0,0,0-32.8,6.14c-29.08,11.73-52,31.52-71.88,55.27-3.87,4.62-3.66,8.68.4,13.55,16.4,19.67,35.28,36.45,58,48.57,21.45,11.45,43.83,16.45,67.68,8.4,32.51-10.95,57.36-32.39,78.83-58.28,3.4-4.1,2.86-8.18-.95-12.77-14.87-18-32-33.4-52.07-45.28C163.91,69.28,147.79,63,131.91,62.67Zm-2.06,19.42A48.5,48.5,0,1,1,80.91,130,48.62,48.62,0,0,1,129.85,82.09Zm-.42,77.6a29.1,29.1,0,1,0-29.12-29.31A29.19,29.19,0,0,0,129.43,159.69Z"/></svg>
                                <span class="">visibility :</span>
                                <span class="bold ml4">{{ $post->hvisibility }}</span>
                            </div>
                            <a href="{{ route('edit.post', ['post'=>$post->id]) }}" target="_blank" class="button-style-4 no-underline blue">
                                <span>Manage post</span>
                            </a>
                        </div>
                        <div class="post-options-container none">
                            @if(is_null($post->deleted_at))
                                <a href="" class="fs12 dark-blue no-underline">
                                    <span>Edit</span>
                                </a>
                                <span class="fs11 dark unselectable">〡</span>
                                <span class="fs12 red pointer align-center delete-post">
                                    <svg class="spinner size12 mr4 none" fill="none" viewBox="0 0 16 16">
                                        <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                        <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                    </svg>
                                    <span>Delete</span>
                                    <input type="hidden" class="post-id" value="{{ $post->id }}" autocomplete="off">
                                </span>
                                <span class="fs11 dark unselectable">〡</span>
                                @if($post->status == 'published')
                                <a href="{{ $post->link }}" target="_blank" class="fs12 dark-blue no-underline">
                                    <span>View</span>
                                </a>
                                @else
                                <a href="" target="_blank" class="fs12 dark-blue no-underline">
                                    <span>Preview</span>
                                </a>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="statistics-box">
                        <div class="align-center">
                            <svg class="size14 ml4" style="margin-right: 2px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400,32H48A48,48,0,0,0,0,80V432a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V80A48,48,0,0,0,400,32ZM160,368a16,16,0,0,1-16,16H112a16,16,0,0,1-16-16V240a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16Zm96,0a16,16,0,0,1-16,16H208a16,16,0,0,1-16-16V144a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16Zm96,0a16,16,0,0,1-16,16H304a16,16,0,0,1-16-16V304a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16Z"/></svg>
                            <span>{{ __('statistics') }} :</span>
                        </div>
                        <div class="statistics-container">
                            <div class="align-center">
                                <svg class="size14 mr4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M126.89,237.41C66.74,234.75,20,185.15,22.59,126.63c2.62-59.8,52.22-106.51,110.51-104,60.06,2.53,107,52.36,104.3,110.77C234.65,193.27,185,240,126.89,237.41Zm89-107.53a85.84,85.84,0,1,0-86,86A85.63,85.63,0,0,0,215.84,129.88ZM99.26,174a53.71,53.71,0,0,0,73.48-76.55c-15.11-20.13-42.38-25-57.26-18.42,10.73,6.73,16.21,16.2,14,28.84-2,11.26-9,18.7-20.2,21.28C96,132.24,86.17,126.59,79,115.48,72.52,131.07,77.23,158.79,99.26,174Z"/></svg>
                                <span class="bold fs14 dark">{{ $post->views }}</span>
                            </div>
                            <div class="align-center">
                                <svg class="size16 mr4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M255,166.15c-2.6,8.16-8.17,14.15-14.13,20-15,14.73-29.78,29.71-44.67,44.56-21,21-48.79,21.06-69.77.12q-32.37-32.29-64.67-64.66c-13-13-12.08-26.82,4.17-39.07-2.38-1.79-4.85-3.15-6.7-5.12-12.3-13.06-6.3-32.84,11.11-37.11,1.22-.3,3.1-1.19,3.26-2.07C75.75,71.33,83,65.43,94,63.49c2.22-14.87,15.46-25.23,32.92-18.2,8.26-11.1,16.87-15,26.86-11.21A31.69,31.69,0,0,1,164.19,41c10.56,10.13,20.79,20.6,31.61,31.4.43-3.07.58-5.59,1.17-8,2.76-11.19,12.58-17.91,24.19-16.7C231.65,48.8,240,58.05,240.27,69.09c.16,6.52.13,13,0,19.56-.05,2.66.39,4.42,3.18,5.72,6.34,2.94,9.26,8.8,11.55,15Zm-14.68-28.66c0-7.5,0-15,0-22.5-.05-5.44-2.71-8.56-7.18-8.64-4.66-.09-7.44,3.12-7.47,8.83-.05,9.78-.08,19.57,0,29.35,0,3.75-1,6.84-4.61,8.38s-6.55-.06-9.15-2.7c-7.45-7.54-15-15-22.47-22.5q-22.83-22.83-45.67-45.65c-4.42-4.4-8.59-4.84-11.93-1.44s-2.74,7.46,1.66,11.91c3.89,4,7.83,7.84,11.75,11.77,5.87,5.88,11.84,11.68,17.58,17.7,3.13,3.28,2.94,7.68,0,10.5s-6.73,2.79-10.16,0c-1-.83-1.87-1.81-2.79-2.74L103.18,83a27.46,27.46,0,0,0-3.2-3c-3.39-2.43-6.81-2.27-9.7.74-2.73,2.85-2.65,6.18-.5,9.38a23.88,23.88,0,0,0,3,3.22l47,47a23.78,23.78,0,0,1,3.28,3.61,6.72,6.72,0,0,1-.79,8.95c-2.71,2.84-6,3.2-9.31,1.05a23.27,23.27,0,0,1-3.59-3.3q-23.54-23.5-47.05-47a23.17,23.17,0,0,0-3.22-3c-3.22-2.12-6.55-2.18-9.38.59-3,2.91-3.11,6.33-.65,9.7a33,33,0,0,0,3.36,3.54c15.79,15.8,31.65,31.53,47.3,47.48,1.87,1.91,3.63,5,3.5,7.49-.12,2.14-2.72,5.45-4.71,5.85a10.57,10.57,0,0,1-8.19-2.39c-10-9.39-19.47-19.26-29.2-28.9-4.1-4.07-8.32-4.43-11.56-1.2s-2.9,7.46,1.21,11.58c22.57,22.62,45.08,45.31,67.83,67.75,13.08,12.9,32.14,12.87,45.2,0,17.44-17.15,34.6-34.57,51.94-51.83a14.83,14.83,0,0,0,4.57-11.4C240.22,151.84,240.32,144.66,240.32,137.49ZM211,128.17c0-5.63-.1-10.29,0-14.95.16-6.52,2.19-13,7.79-16,7-3.8,7.29-9.18,6.89-15.62-.24-3.74,0-7.5-.07-11.25-.14-5-3-8-7.3-8s-7.23,3-7.33,8c-.11,5.71-.12,11.42,0,17.12.09,4.09-.09,8.08-4.46,9.93-4.59,2-7.62-.89-10.62-3.91q-20.49-20.65-41.13-41.17a26,26,0,0,0-3.58-3.32c-3.07-2.07-6.25-2-8.94.61s-2.85,5.75-1,8.91a15.8,15.8,0,0,0,2.57,2.93Q175.66,93.19,207.48,125C208.34,125.86,209.29,126.64,211,128.17Zm-95.59-54,10.53-9.71c-2.49-2-4.74-7.67-10.77-6.5A8.81,8.81,0,0,0,109.47,63C107.57,69.36,113.36,71.85,115.39,74.14ZM23.49,87.32c3.91,0,7.82.21,11.71,0,4.61-.32,7.48-3.45,7.35-7.48s-3.09-6.9-7.81-7q-11.22-.21-22.44,0c-4.73.1-7.69,2.92-7.84,7S7.35,87,12.28,87.32c3.72.21,7.47,0,11.21,0ZM77.8,21.87c-.16-4.87-3.17-7.9-7.49-7.79-4.13.1-7,3-7.11,7.67Q63,33,63.2,44.19c.08,4.87,3.15,7.9,7.48,7.79,4.11-.1,6.95-3,7.11-7.68.14-3.73,0-7.48,0-11.22S77.93,25.6,77.8,21.87ZM30.73,29.53c-3.61-3.27-7.87-3.22-10.81,0s-2.7,7.16.57,10.44q7.91,7.95,16.1,15.62c3.55,3.34,7.86,3.24,10.8.06,2.8-3,2.65-7.11-.56-10.46-2.58-2.69-5.35-5.22-8-7.83S33.5,32,30.73,29.53Z"/></svg>
                                <span class="bold fs14 dark">{{ $post->reactions_count }}</span>
                            </div>
                            <div class="align-center">
                                <svg class="size14 mr4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M242.59,126.87c.39,68.29-60.46,121.59-128.32,112.48a123.89,123.89,0,0,1-36.32-11,11.92,11.92,0,0,0-7.61-.65c-13.33,3.71-26.56,7.76-39.79,11.8-4.5,1.37-8.67,1.27-12.1-2.23s-3.32-7.43-2-11.73c4-13.23,8.11-26.45,11.8-39.78a12.35,12.35,0,0,0-.77-8.06C-4.8,113.42,30.65,35.22,100.35,17.13,172.34-1.55,242.17,52.33,242.59,126.87ZM41.27,214.68c9.75-2.93,18.41-5.28,26.89-8.16,5.92-2,11-1.41,16.51,1.68,18.92,10.6,39.31,14.16,60.63,10.06,49.8-9.58,81.33-52.89,75.62-103.31-5.77-50.85-56-88.36-106.48-79.54C49.89,46.69,16.77,115.7,48.52,172.9a15.29,15.29,0,0,1,1.38,12.91C47,195,44.37,204.23,41.27,214.68Z"/></svg>
                                <span class="bold fs14 dark">{{ $post->comments_count }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="full-center my12">
                {{ $posts->appends(request()->query())->onEachSide(0)->links() }}
            </div>

            @if(!$posts->count())
            <div class="full-center flex-column dark">
                <svg class="size84" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M173.75,3.35c9.76,2.95,17.47,8.26,21,18.36.68,2,2.26,1.34,3.65,1.45,9.36.76,15.86,5.84,18.25,14.93.7,2.65,1.92,2.88,4,2.84,4.22-.08,8.47-.54,12.66.41a15.18,15.18,0,0,1,11.79,15.79c-.47,7.15-6.44,13.34-13.39,13.94-2.41.21-4.81.22-5.15-2.93-.3-2.83,1.34-3.83,4-4.33,5.13-.93,7.57-4.34,7-8.89-.58-4.18-3.7-6.58-8.78-6.62-4.07,0-8.17-.24-12.21.12-4.84.43-6.71-1.33-6.81-6.26a11.71,11.71,0,0,0-9.64-11.36,12,12,0,0,0-13.21,7,17.05,17.05,0,0,0-1.18,5.69c-.11,3.27-1.69,4.54-4.81,4.89-5.74.63-8.47,3.49-8.22,8.19s3.52,7.36,9.1,7.4q12.23.11,24.44,0c2.7,0,5.2.33,5.27,3.54s-2.31,3.87-5.07,3.85c-8.31,0-16.61,0-24.92,0-7.85-.08-13.4-3.57-15.66-11.35-.49-1.69-1.44-2.23-3-2.7-13.6-4.13-21.49-14.09-21.35-26.8S149.84,7.78,163.39,4c.24-.07.38-.46.58-.69ZM149.06,30.5a19.86,19.86,0,0,0,14.28,19.33c1.7.48,2.92.77,4-1.26,2.25-4.3,7.31-5.23,10.44-8,2.92-2.6,2.87-8.37,6.38-11.6a7.29,7.29,0,0,1,1.46-1.28c3-1.52,2.37-3.53,1.13-6a20.17,20.17,0,0,0-22.6-10.46A20,20,0,0,0,149.06,30.5ZM254.93,195.05c-1.38-2.45-3.65-2.68-6.15-2.66-8.4.06-16.8,0-25.85,0,3.26-5.78,3.54-11.41,3.21-17.12-.14-2.27-1.38-3.69-3.73-3.66s-3.57,1.39-3.64,3.71.1,4.57-.08,6.84a9.86,9.86,0,0,1-6.85,9.18c0-5.2-.05-9.75,0-14.31,0-2.89-.43-5.48-4-5.38-3.33.09-3.55,2.72-3.54,5.32,0,4.64,0,9.28,0,14.79a40.3,40.3,0,0,1-3.76-2.69c-3.75-3.57-3.27-8.27-3.19-12.82.05-2.64-.75-4.62-3.69-4.63s-3.59,2.13-3.58,4.7c0,5.42-.3,10.88,3.54,16.07H171.07c-1.79,0-3.69-.13-4.91,1.51a3.69,3.69,0,0,0-.31,4.14c1,2,2.83,1.87,4.64,1.87,26.39,0,52.79,0,79.18.06a8.87,8.87,0,0,0,5.26-2ZM62.44,42.76c-3.6,1.91-2.09,4.64-.79,7.09.85,1.6.2,2.32-1,3.16-6.38,4.57-8.82,11-8.81,18.61q0,23,0,46c0,2.86-.08,6.08,3.89,6s3.55-3.46,3.55-6.23c0-15.32,0-30.64,0-46,0-9,5.08-14.42,13.44-14.55,8.64-.13,14,5.32,14,14.48,0,13.2,0,26.4,0,39.6,0,6.12,3.24,9.68,8.54,9.73s8.49-3.46,8.62-9.64c.12-5.86-.08-11.73.09-17.6.15-5.16,3-8,7.86-8s7.83,2.73,7.91,7.92c.14,9.45.26,18.91,0,28.35-.27,8.37-6.87,14.52-15.24,14.75-3.58.1-7.17,0-10.75,0-6.88,0-7,.14-7,7.25,0,15,0,30,0,45,0,2.51-.26,3.8-3.33,3.68-7-.29-14-.27-21-.12-2.61.06-3.28-.75-3.22-3.27.17-6.52.07-13,.06-19.56,0-6.18-.37-6.52-6.75-6.54-3.58,0-7.17.06-10.75,0-8.45-.21-15.07-6.11-15.41-14.57-.4-9.92-.26-19.88,0-29.82.1-4.87,3.21-7.54,7.81-7.53s7.47,2.63,8,7.46c.19,1.78.1,3.58.12,5.37,0,5.22-.12,10.44.19,15.64.26,4.37,3.35,7,7.76,7.22s8-2.2,8.84-6.12c.44-2,.55-4.07-1.73-5s-4.16-.62-5.19,1.95c-.33.81-.37,2.19-1.77,1.75-1.24-.38-.76-1.64-.77-2.52,0-5.87-.08-11.73,0-17.6,0-3.2-.5-6.41-2.6-8.7-2.43-2.65-2.29-4.9-.67-7.71,1.24-2.16,1.52-4.54-1.11-5.88-2.86-1.47-4.58.09-5.58,2.79-.21.57-.44,1.25-1.51,1.24-.84-2.61,1.27-7.1-3.68-7.4-5.18-.32-2.9,4.72-4.51,7.3a35.18,35.18,0,0,0-2.3-3.41,3.19,3.19,0,0,0-4-.64c-1.39.64-2.95,2.26-2.12,3.37,4,5.38.31,9.43-1.71,13.94-.75,1.68-.69,3.82-.71,5.75-.06,9-.09,17.92,0,26.89.11,13.9,9.28,23.26,23.13,23.68a44.21,44.21,0,0,0,5.87,0c2.92-.31,4.06.6,3.89,3.73a121.53,121.53,0,0,0,0,14.66c.22,3.45-1.23,3.95-4.2,3.91-11.89-.14-23.79-.06-35.68-.05-1.14,0-2.29,0-3.43,0-2.47.17-4.08,1.5-3.93,4,.13,2.21,1.61,3.46,4,3.44.82,0,1.63,0,2.45,0H141.65c.81,0,1.63,0,2.44,0,2.29-.06,3.87-1.31,4-3.47.15-2.53-1.66-3.74-4-4-1.13-.11-2.28,0-3.42,0-13.85,0-27.7-.13-41.55.08-3.65.05-5-.67-4.89-4.69.3-11.89.1-23.79.1-35.69,0-8.12,0-8.12,8-8.22,15.7-.21,24.75-9.33,24.82-25.06,0-8.31,0-16.62,0-24.93,0-3.69-.54-7.27-3-10.06-1.83-2.06-1.63-3.77-.5-6,1.23-2.43,2.86-5.32-.88-7-3.39-1.56-4.59,1.11-5.67,3.58-.22.5-.44.75-1.08.39-.5-2.72,1-7-3.63-7.2-5.47-.26-3.44,4.65-4.46,8.12-1.63-2.93-2.68-6.84-6.67-4.73s-1.31,5-.25,7.57c.68,1.62.92,2.84-.49,4.35-3.19,3.38-4.11,7.6-4,12.18.13,4.88.1,9.78,0,14.66,0,1.09.87,3.14-1,3.15s-1.06-2-1.07-3.11c-.07-12.71,0-25.42,0-38.13,0-7-2.08-13.24-7.71-17.69-2.14-1.7-3-3-1.4-5.47,1.38-2.21,1.19-4.56-1.45-5.74s-4.28.25-5.24,2.77c-.22.59-.32,1.64-1.45,1.48-.72-2.84,1.16-7.39-4-7.43s-3,4.71-4.1,7.42C66.07,42.61,64.61,41.6,62.44,42.76Zm78.79,193.17a17,17,0,0,1,0,3.42c-.4,1.87,1.46,4.91-1.18,5.39-2.14.38-3.59-2.33-4.69-4.38s-1.06-4.06-1.13-6.17c-.05-1.79,0-3.59-.14-5.37a3.33,3.33,0,0,0-3.68-3.16,3.25,3.25,0,0,0-3.52,3.29c-.07,3.09-.36,6.26.15,9.27,1.32,7.75,5.88,12.88,13.57,15a17.84,17.84,0,0,0,18.64-6.65c3.39-4.41,3.89-9.49,3.76-14.8-.08-2.89,0-6.14-3.76-6.15s-3.8,3.26-3.79,6.13c0,1.79,0,3.59-.14,5.37a9.55,9.55,0,0,1-3.57,6.71c-.72.63-1.5,1.5-2.53,1.14-1.21-.43-.69-1.66-.7-2.54-.06-4.4,0-8.8-.06-13.2,0-2.43-1.61-3.58-3.78-3.52a3.18,3.18,0,0,0-3.37,3.41c0,2.28,0,4.56,0,6.84ZM27.87,217.67c-2.56,0-4.62.71-4.75,3.65s1.82,3.91,4.44,3.91H59.77c2.47,0,4.2-1.12,4.29-3.64.09-2.85-1.79-3.93-4.46-3.92-5.21,0-10.42,0-15.62,0C38.61,217.68,33.24,217.7,27.87,217.67ZM225.48,242c2.57,0,4-1.13,4-3.75s-1.56-3.44-3.81-3.44q-13.92,0-27.84,0c-2.31,0-3.75,1.08-3.78,3.5,0,2.67,1.46,3.73,4,3.7,4.56-.05,9.12,0,13.68,0S220.92,242,225.48,242ZM85.24,217.75a3.46,3.46,0,0,0-3.5,3.85A3.23,3.23,0,0,0,85,225.14c4.21.17,8.45.14,12.66,0a3.33,3.33,0,0,0,3.27-3.58,3.41,3.41,0,0,0-3.51-3.82c-1.94-.11-3.89,0-5.84,0C89.46,217.72,87.34,217.59,85.24,217.75Z" style="fill:#080808"/></svg>
                <p class="bold my12">{{ __("No posts found in this section") }}.</p>
                <p class="fs13 no-margin">{{ __('Try to change tab section, or create a new post') }}.</p>
            </div>
            @endif
        @else
            <!-- display all authors - search for specific author to manage -->
            <div class="align-end space-between mb8">
                <div>
                    <h2 class="no-margin fs18 dark">Authors</h2>
                    <p class="lh15 dark my4">Elected authors with permission to create posts.</p>
                </div>
                <div>
                    <label class="flex mb4 fs12 dark" for="author-search-input">Search for an author (by username or firstname, or lastname)</label>
                    <form action="" class="align-center relative">
                        <svg class="search-icon-style-1" fill="#5b5b5b" enable-background="new 0 0 515.558 515.558" viewBox="0 0 515.558 515.558" xmlns="http://www.w3.org/2000/svg"><path d="m378.344 332.78c25.37-34.645 40.545-77.2 40.545-123.333 0-115.484-93.961-209.445-209.445-209.445s-209.444 93.961-209.444 209.445 93.961 209.445 209.445 209.445c46.133 0 88.692-15.177 123.337-40.547l137.212 137.212 45.564-45.564c0-.001-137.214-137.213-137.214-137.213zm-168.899 21.667c-79.958 0-145-65.042-145-145s65.042-145 145-145 145 65.042 145 145-65.043 145-145 145z"></path></svg>
                        <input type="text" id="author-search-input" required name="k" class="search-input-style-1" style="width: 300px" placeholder="Search for an author" @if($k) value="{{ $k }}" @endif>
                        <button class="search-button-style-1">
                            <span>Search</span>
                        </button>
                    </form>
                </div>
            </div>

            @if($k)
            <h2 class="dark my12 fs16">Authors search results for : "<span class="blue">{{ $k }}</span>" - {{ $authors->total() }}</h2>
            @endif

            <div id="elected-authors-box">
                @foreach($authors as $author)
                <div class="elected-author-component">
                    <div class="meta">
                        <img src="{{ $author->avatar(100) }}" class="size36 br4 mr6" alt="">
                        <div class="dark">
                            <p class="no-margin dark bold align-center">
                                {{ $author->fullname }} - 
                                <a href="{{ route('admin.author.management', ['author'=>$author->username]) }}" class="blue bold fs12 ml8 no-underline">manage author</a>
                                <span class="fs10 dark default-weight mx4">〡</span>
                                <a href="{{ route('admin.users.management', ['user'=>$author->username]) }}" target="_blank" class="blue bold fs12 no-underline">manage user</a>
                            </p>
                            <p class="no-margin fs12 mt2">{{ $author->username }}</p>
                        </div>
                    </div>
                    <div>
                        <p class="my8 dark bold">Details</p>
                        <p class="dark fs13 my8">Author since : <span class="bold">{{ $author->author_since('format') }}</span></p>
                        <p class="dark fs13 my8">Number of posts : <span class="bold">{{ $author->posts()->withoutGlobalScopes()->count() }}</span></p>
                    </div>
                </div>
                @endforeach
            </div>

            @if(!$authors->count())
            <div class="typical-section-style full-center">
                <svg class="size14 mr8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256,0C114.5,0,0,114.51,0,256S114.51,512,256,512,512,397.49,512,256,397.49,0,256,0Zm0,472A216,216,0,1,1,472,256,215.88,215.88,0,0,1,256,472Zm0-257.67a20,20,0,0,0-20,20V363.12a20,20,0,0,0,40,0V234.33A20,20,0,0,0,256,214.33Zm0-78.49a27,27,0,1,1-27,27A27,27,0,0,1,256,135.84Z"/></svg>
                @if($k)
                <p class="dark bold my4 fs12">We cannot find any author that match your search query.</p>
                @else
                <p class="dark bold my4 fs12">There is no elected author exists yet.</p>
                @endif
            </div>
            @endif
            <div class="full-center my12">
                {{ $authors->appends(request()->query())->onEachSide(0)->links() }}
            </div>
        @endif
    </div>
</main>
@endsection