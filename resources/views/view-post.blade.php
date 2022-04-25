@extends('layouts.app')

@section('title', "$post->title_meta")

@push('styles')
<link rel="stylesheet" href="{{ asset('css/post/view.css') }}">
<link rel="stylesheet" href="{{ asset('css/post/post-section.css') }}">
@endpush

@section('content')
    <!-- newsletter viewer -->
    <div id="newsletter-viewer" class="global-viewer full-center none" style="background-color: #16171cf0; z-index: 555555">
        <div id="newsletter-viewer-container">
            <div class="close-button-style-1 close-global-viewer unselectable">✖</div>
            <div id="newsletter-loading-section">
                <svg class="spinner size20 white" fill="none" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                    <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                </svg>
            </div>
        </div>
    </div>

    
    <div id="post-box">
        <!-- nav links -->
        <div id="post-nav-links-container">
            <a href="{{ route('root.slash') }}" class="post-nav-link">
                <span>{{__('Home')}}</span>
            </a>
            <svg class="post-nav-link-separator" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M224.31,239l-136-136a23.9,23.9,0,0,0-33.9,0l-22.6,22.6a23.9,23.9,0,0,0,0,33.9l96.3,96.5-96.4,96.4a23.9,23.9,0,0,0,0,33.9L54.31,409a23.9,23.9,0,0,0,33.9,0l136-136a23.93,23.93,0,0,0,.1-34Z"></path></svg>
            <a href="{{ route('discover') }}" class="post-nav-link">
                <span>{{__('Discover')}}</span>
            </a>
            <svg class="post-nav-link-separator" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M224.31,239l-136-136a23.9,23.9,0,0,0-33.9,0l-22.6,22.6a23.9,23.9,0,0,0,0,33.9l96.3,96.5-96.4,96.4a23.9,23.9,0,0,0,0,33.9L54.31,409a23.9,23.9,0,0,0,33.9,0l136-136a23.93,23.93,0,0,0,.1-34Z"></path></svg>
            <a href="{{ route('discover', ['category'=>$category->slug]) }}" class="post-nav-link">
                <span>{{ $category->title }}</span>
            </a>
            <svg class="post-nav-link-separator" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M224.31,239l-136-136a23.9,23.9,0,0,0-33.9,0l-22.6,22.6a23.9,23.9,0,0,0,0,33.9l96.3,96.5-96.4,96.4a23.9,23.9,0,0,0,0,33.9L54.31,409a23.9,23.9,0,0,0,33.9,0l136-136a23.93,23.93,0,0,0,.1-34Z"></path></svg>
            <a href="{{ route('view.post', ['category'=>$category->slug, 'post'=>$post->slug]) }}" class="post-nav-link">
                <span>{{ $post->slug }}</span>
            </a>
        </div>
        @if($fimage = $post->featured_image)
        <div id="feature-image-container">
            <img src="{{ $fimage }}" id="feature-image" class="pointer open-image-on-image-viewer" alt="">
        </div>
        @endif
        <div id="body-box">
            <article id="post-content-box">
                {!! $post->content !!}
            </article>
            <div id="right-panel-container">
                <!-- published by & publish date & categories -->
                <div class="post-meta">
                    <!-- date -->
                    <div id="post-date" class="post-meta-text">
                        {{__('PUBLISHED')}} :
                        <time class="entry-date" datetime="{{ $post->published_at }}">{{ strtoupper($post->short_publish_date) }}</time>
                        {{__('BY')}} :
                    </div>
                    <!-- author -->
                    <div id="post-author">
                        <img src="{{ $post->author->avatar(100) }}" id="author-avatar" alt="">
                        <div>
                            <a href="" id="author-name">{{ $post->author->fullname }}</a>
                            <span id="author-role">{{ $post->author->high_role()->title }}</span>
                        </div>
                    </div>
                    <div id="post-categories" class="post-meta-text mt8">
                        <div class="align-center">
                            <svg class="size13 mr8" style="margin-top: -2px;" fill="#2d363e" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M156.49,146.2q-32.57,0-65.12,0c-7.57,0-10.44-2.8-10.46-10.22q-.06-23.25,0-46.51c0-7.21,2.85-10,10.12-10q65.1,0,130.22,0c7.16,0,10,2.85,10,10.17q.1,23.27,0,46.51c0,7.21-3,10.07-10.13,10.08Q188.8,146.24,156.49,146.2Zm64.63,83.56c7.26,0,10.09-2.83,10.12-10.07q.1-23.25,0-46.5c0-7.23-3-10.26-10-10.27q-65.1-.06-130.21,0c-7.11,0-10.09,3-10.11,10.16,0,15,0,30,0,45,0,9.24,2.36,11.65,11.48,11.66q31.82,0,63.64,0C177.71,229.78,199.41,229.82,221.12,229.76ZM30.64,200c0,3.73.86,5.17,4.86,5,6.67-.33,13.38-.09,20.07-.09,13.45,0,13.37,0,12.78-13.5-.12-2.65-1-3.33-3.45-3.25-4.41.14-8.83-.11-13.22.08-3,.14-4.32-.63-4.29-4q.21-29.62,0-59.26c0-3.11,1.16-3.91,4-3.81,4.57.17,9.14.06,13.71,0,1.42,0,3.19.27,3.12-2-.14-4.7,1.63-10.14-.75-13.87-1.65-2.59-7-.58-10.72-.85a17.62,17.62,0,0,0-3.91,0c-4.17.61-5.58-.77-5.52-5.25.27-19.58.12-39.17.12-58.76,0-11.19,0-10.92-11.31-11.26-4.75-.15-5.55,1.58-5.52,5.81.16,27.26.08,54.52.08,81.79C30.71,144.46,30.78,172.21,30.64,200Z"></path></svg>
                            <span>{{ ($post->categories->count() > 1) ? __('CATEGORIES') : __('CATEGORY')  }} :</span>
                        </div>
                        @foreach($post->categories as $category)
                            @if(!$loop->first)
                            <span class="category-separator">〡</span>
                            @endif
                            <a href="" class="category">{{ $category->title }}</a>
                        @endforeach
                    </div>
                    
                    @if($post->tags->count())
                    <div id="post-tags">
                        <div class="align-center mb4" style="flex-basis: 100%;">
                            <svg class="size12 mr8" fill="#2d363e" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M155.32,3.3h78.12c11.19,3.13,18.39,10.25,21.48,21.49v79.09c-1.28.34-1,1.52-1.23,2.38-2.34,9.41-7.32,17.21-14.14,24Q183.26,186.47,127,242.73C112.72,257,95,256.88,80.58,242.52Q48.47,210.45,16.4,178.35C.91,162.85,1,145.73,16.51,130.17Q67,79.62,117.55,29C128.53,18,139.19,6.68,155.32,3.3ZM197.4,86.52a26,26,0,1,0-25.7-26.18A25.94,25.94,0,0,0,197.4,86.52Z"></path></svg>
                            <span class="post-meta-text">{{ ($post->tags->count() > 1) ? __('TAGS') : __('TAG')  }} :</span>
                        </div>
                        @foreach($post->tags as $tag)
                            <a href="" class="tag">{{ $tag->title }}</a>
                        @endforeach
                    </div>
                    @endif

                    <div id="newsletter-box">
                        <svg class="icon" fill="#2c3237" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M5.22,96.23c5.69-2.47,11.29-5.14,17.07-7.38Q71.87,69.68,121.52,50.7q50.1-19.19,100.23-38.27c4.78-1.83,9.4-4.3,14.33-5.52,3-.74,7-.56,9.38,1,1.25.82.68,5.79-.32,8.41-4.93,12.88-10.62,25.48-15.41,38.4Q217.94,86.51,207,118.58c-5.84,17-11.16,34.15-16.79,51.21-1.76,5.32-3.65,5.87-8.54,3.18a55.87,55.87,0,0,0-8.68-4.1c-12.71-4.4-25.47-8.6-38.32-12.91-5.13,10.65-12.71,20.65-21,30.24S97.76,205.53,90,215.38c-1.85,2.36-3.89,4.6-6.66,3.29-2.09-1-4.58-3.56-4.82-5.67-1.93-16.74-3.71-33.5-4.86-50.31-.88-12.95-.67-26-1.31-39-.08-1.6-2.16-3.76-3.84-4.52a208.7,208.7,0,0,0-52-15.44c-3.93-.67-7.57-3-11.35-4.65Zm235-80.08-1.51-.87c-15.1,11.64-31,22.38-45.13,35.12-29.34,26.51-57.8,54-86.34,81.35a24.62,24.62,0,0,0-6.3,12.06c-2.49,11.6-3.84,23.43-6,35.1-1.58,8.33-3.82,16.53-5.77,24.79l.82.45,40.7-51.7L108,142l-5.89,25.54-1.6-.35c.91-8.51,1.44-17.09,2.85-25.52,1.06-6.29,3.13-7.38,9.16-5,8.94,3.52,17.52,7.95,26.43,11.54,14.82,6,29.79,11.56,45,17.45C201.16,115.07,216.4,64,240.2,16.15ZM76.66,114.77C90.8,104.39,104,93,119.85,85,130,79.94,139.3,73.17,148.79,66.86,169.53,53,190.16,39,210.83,25.1L210,23.57,19.63,97.39A147.54,147.54,0,0,1,76.66,114.77Zm7.41,83.75,1.67.07c2.43-14.38,5.58-28.7,7.1-43.18,1.55-14.75,6.66-26.62,18-36.83,21.17-19,41.25-39.21,61.77-58.93.15-.13.1-.48.21-1.2-1.08.54-1.92.88-2.68,1.35-7.81,4.77-15.58,9.61-23.42,14.33-13.34,8-27,15.59-40,24.05-9.56,6.19-18.4,13.49-27.51,20.36a4.31,4.31,0,0,0-1.72,2.64c-.44,6.38-1.22,12.81-.85,19.16.56,9.77,1.8,19.52,3.06,29.24S82.6,188.87,84.07,198.52Zm16.69,54c2.79-.54,5.63-.91,8.35-1.7a3.89,3.89,0,0,0,2.45-2.48c.09-.78-1.24-2.28-2.2-2.54-7-1.94-13.51.19-20.11,1.67L89,249l8.86,3.56ZM203.7,209.4c5.75,1.9,11.51,3.77,17.29,5.56a11.37,11.37,0,0,0,4.2.7c2.87-.24,3.52-1.84,2-4.3-4.36-7.23-18.9-9.48-26.29-3.53A18.13,18.13,0,0,0,203.7,209.4Zm-28.49-4c-6,1.87-11,5.2-13.76,10.91l.82,1.47,24.32-8.94C182.77,203.5,178.92,204.23,175.21,205.38Zm-46.33,33c-.36.36.6,3.12,1.26,3.25,5.35,1.07,17.39-7.65,18.79-13.89C140.11,228,134.31,232.94,128.88,238.42ZM52.71,233c3.2,10.83,13.53,17.87,21.15,13.68C66.45,242.07,62,234.47,52.71,233Zm-7.87-6.58c-.9-8.53-4-15.72-7.59-23.3C32,210,36.36,223.21,44.84,226.45Zm206.89,1.28c-3.62-3-7.29-5.91-10.95-8.85-.73,1.12-2.32,2.92-2.06,3.27,2.6,3.32,5.21,6.77,8.44,9.43,2.32,1.91,5.12.17,5-2.64C252,228.61,252,228,251.73,227.73ZM37.58,166.48a29.66,29.66,0,0,0-5.33,17.07c0,1.1,1.35,2.18,2.08,3.27,1-1.07,2.49-2,2.8-3.23a96.8,96.8,0,0,0,2-11.24,42.87,42.87,0,0,0,0-5.67Zm3.73-12.67a3,3,0,0,0,1.71,2,2.74,2.74,0,0,0,2.4-1c2.64-4.45,5.1-9,8.08-14.33C48.08,140.9,40.42,150.27,41.31,153.81ZM115.18,156c-.31,1.34-1.13,2.81-.82,4,.45,1.72,1.72,3.22,2.64,4.81.6-.88,1.79-1.84,1.68-2.63a42.14,42.14,0,0,0-1.74-6.3Zm-3,13.17v-10C108.39,163.5,108.5,166.4,112.14,169.21ZM100,120.26c1.06-1.26,1.28-3.32,1.6-5.07.07-.43-.93-1-1.44-1.58-.77,1.18-1.53,2.35-2.32,3.51a3.23,3.23,0,0,1-.54.5l1.08-1.13-3.54-3.57L92.9,114.4l1.3,9.09C96.84,122.09,98.89,121.57,100,120.26Zm-12.48,7A2.16,2.16,0,0,0,89,128.79a2.07,2.07,0,0,0,1.68-1.17c.37-3.18.7-6.45-3.22-9.29C87.46,121.85,87.38,124.58,87.53,127.3Z"/></svg>
                        <span class="title">{{ __('SUBSCRIBE TO OUR NEWSLETTER') }}</span>
                        <p class="description">{{ __('Receive insightful articles and topics chosen by our expert artisans') }}</p>
                        <div id="newsletter-subscribe-opener-button">
                            <span>{{ __('SUBSCRIBE') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection