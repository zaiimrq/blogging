@extends('parts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <article class="my-5">
                    <a href="/posts" class="btn btn-primary mb-3">Kembali</a>
                    <h1 class="mb-3 text-center">{{ $post->title }}</h1>
                    <div class="card p-0 mb-3">
                        @if ($post->image)            
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}">
                        @else
                            <img src="https://source.unsplash.com/1200x350?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                        @endif
                    </div>
                    <small class="mb-1">
                        By <a href="/posts?author={{ $post->user->username }}">{{ $post->user->name }}</a>
                        In <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                    </small>
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
@endsection