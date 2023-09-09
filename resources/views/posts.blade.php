@extends('parts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="row justify-content-center">
                <div class="col-md-6">            
                    <form action="/posts">
                        <div class="input-group mb-3">
                            @if (request('author'))
                                <input type="hidden" value="{{ request('author') }}" name="author">
                            @endif
                            @if (request('category'))
                                <input type="hidden" value="{{ request('category') }}" name="category">
                            @endif
                            <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            @if (request('search'))
                <p class="h4 mt3">All result for "{{ request('search') }}"</p>
            @endif

            <div class="card p-0">
                <img src="https://source.unsplash.com/1200x350?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none">
                        <h5 class="card-title">{{ $posts[0]->title }}</h5>
                        <p class="card-text text-dark">{{ $posts[0]->excerpt }}</p>
                    </a>
                </div>
            </div>

            @if ($posts->count())         
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 my-1">
                        <div class="card">
                            <img src="https://source.unsplash.com/200x100?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                            <a href="/posts?category={{ $post->category->slug }}" class="position-absolute btn text-white" style="background-color: rgba(0, 0, 0, .7)">{{ $post->category->name }}</a>
                            <div class="card-body">
                                <small>
                                    <a href="/posts?author={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a>
                                    {{ $post->created_at->diffForHumans() }}
                                </small>
                                <h5 class="card-title mt-2"><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h5>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Selengkapnya</a>
                                </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h1 class="h1 text-center mt-5">No Post Found !</h1>
            @endif

            {{ $posts->links() }}
        </div>
    </div>
@endsection