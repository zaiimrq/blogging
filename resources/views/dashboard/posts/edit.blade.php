@extends('dashboard.parts.main')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Post</h1>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
                  @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
                  @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="category_id">
                        @foreach ($categories as $category)
                            @if (old('category_id', $post->category_id) == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="hidden" name="oldImage" value="{{ $post->image }}">
                    @if ($post->image)                        
                        <img src="{{ asset('storage/' . $post->image) }}" class="d-block img-fluid mb-2 rounded col-sm-5 shadow" id="preview">
                    @else
                        <img class="img-fluid mb-2 rounded col-sm-5 shadow" id="preview">                        
                    @endif
                    <input accept="image/*" type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" onchange="previewImg()" value="{{ old('image', $post->image) }}">
                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    @error('body') <div class="invalid-feedback d-block mb-1">{{ $message }}</div> @enderror
                    <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                    <trix-editor input="body"></trix-editor>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
    </div>

    <script>
        const title = document.getElementById('title');
        const slug = document.getElementById('slug');

        title.addEventListener('change', function () {
            fetch('/dashboard/posts/slug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })

        function previewImg() {
            const img = document.getElementById("image");
            const prev = document.getElementById("preview");
            const reader = new FileReader();

            prev.style.display = "block";

            reader.readAsDataURL(img.files[0]);
            reader.onload = function(e) {
                prev.src = e.target.result;
            }
        }
    </script>
@endsection