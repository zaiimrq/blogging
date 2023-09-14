@extends('dashboard.parts.main')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">All Categories</h1>
</div>
<div class="row">
  <div class="col-lg-5">
    @if (session()->has('success'))     
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="table-responsive small">
      <button type="button" class="btn btn-primary border-0" data-bs-toggle="modal" data-bs-target="#modal-create">New Category</button>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)     
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $category->name }}</td>
              <td class="d-flex justify-content-around">
                <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><i data-feather="edit"></i></a>
                <form action="/dashboard/categories/{{ $category->slug }}" method="post">
                  @csrf
                  @method('delete')
                  <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure ?')"><i data-feather="trash-2"></i></button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      {{-- modal create --}}
      <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">New Category</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('categories.store') }}" method="post" id="create">
                @csrf
                <div class="mb-3">
                  <label for="name" class="col-form-label">Category:</label>
                  <input type="text" class="form-control" @error('name') is-invalid @enderror id="category" name="name" onchange="createSlug()" value="{{ old('name') }}" required autofocus>
                  @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                  <label for="slug" class="col-form-label">Slug:</label>
                  <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" required>
                  @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" form="create">Create</button>
            </div>
          </div>
        </div>
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