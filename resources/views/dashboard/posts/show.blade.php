@extends('dashboard.parts.main')

@section('main')
    <div class="row">
        <div class="col-lg-10">
            <h1 class="my-3 text-center">{{ $post->title }}</h1>
            <span class="mb-3">
                <a href="{{ route('dashboard.index') }}" class="btn btn-primary"><i data-feather="arrow-left"></i></a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i data-feather="edit"></i></a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')

                    <button type="submit" class="btn btn-danger"><i data-feather="trash-2"></i></button>
                </form>
            </span>
            <article class="mt-3 mb-5">
                {!! $post->body !!}
            </article>
        </div>
    </div>
@endsection