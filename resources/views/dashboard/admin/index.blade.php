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
                <a href="{{ route('categories.create') }}" class="badge bg-primary"><i data-feather="plus"></i></a>
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
    </div>
  </div>
</div>
@endsection