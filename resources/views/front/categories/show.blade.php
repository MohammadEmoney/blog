@extends('layouts.front')

@section('content')
<div class="container px-4 px-lg-5" dir="rtl">
    <div class="text-center">
        <h1>{{ $category->name }}</h1>
    </div>
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            @foreach ($category->posts as $post)
                <div class="post-preview">
                    <a href="{{ route('front.posts.show', $post->slug) }}">
                        <h2 class="post-title">{{ $post->name }}</h2>
                        <h3 class="post-subtitle">{{ $post->short_description }}</h3>
                    </a>
                    <p class="post-meta">
                        ناشر
                        <a href="#!">{{ $post->author->name }}</a>
                        در {{ \Morilog\Jalali\Jalalian::fromDateTime($post->created_at)->format('%A, %d %B %y') }}
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
            @endforeach

            <!-- Post preview-->
            <div class="post-preview">
                <a href="post.html"><h2 class="post-title">I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.</h2></a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">Start Bootstrap</a>
                    on September 18, 2022
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Post preview-->
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">Science has not yet mastered prophecy</h2>
                    <h3 class="post-subtitle">We predict too much for the next year and yet far too little for the next ten.</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">Start Bootstrap</a>
                    on August 24, 2022
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Post preview-->
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">Failure is not an option</h2>
                    <h3 class="post-subtitle">Many say exploration is part of our destiny, but it’s actually our duty to future generations.</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">Start Bootstrap</a>
                    on July 8, 2022
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Pager-->
            {{-- <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div> --}}
            {{-- {{ $posts->links("pagination::bootstrap-4") }} --}}
        </div>
    </div>
</div>
@endsection
