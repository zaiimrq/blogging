@extends('dashboard.parts.main')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Update Category</h1>
</div>
<div class="row">
  <div class="col-lg-5">
    @if (session()->has('success'))     
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="row">
        <div class="col-md-10">
            <form action="/dashboard/categories/{{ $category->slug }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                  <label for="name" class="col-form-label">Category:</label>
                  <input type="text" class="form-control" @error('name') is-invalid @enderror id="category" name="name" onchange="createSlug()" value="{{ old('name', $category->name) }}">
                  @error('name') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                  <label for="slug" class="col-form-label">Slug:</label>
                  <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $category->slug) }}" required>
                  @error('slug') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
    </div>
  </div>
</div>
<script>
  function createSlug() {
    let category = document.getElementById('category');
    let slug = document.getElementById('slug');

    fetch('/dashboard/categories/slug?category=' + category.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)

  }
</script>
@endsection