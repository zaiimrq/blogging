@extends('parts.main')

@section('container')
    <div class="container">
        @foreach ($posts as $post)          
            <article class="mt-3 border-bottom">
                <a href="/posts/{{ $post->slug }}">
                    <h2>{{ $post->title }}</h2>
                </a>
                <small>
                    By <a href="/posts?author={{ $post->user->username }}">{{ $post->user->name }}</a>
                    In <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                </small>
                <p>{{ $post->excerpt }}</p>
            </article>
        @endforeach
    </div>
@endsection