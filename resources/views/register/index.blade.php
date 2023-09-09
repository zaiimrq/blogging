@extends('parts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-5">
                <main class="form-signin w-100 m-auto">
                    <h1 class="h3 mb-3 fw-normal">Please Register</h1>
                    <form action="{{ route('login.store') }}" method="post">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="name" name="name">
                        <label for="name">Name</label>
                      </div>
                      <div class="form-floating">
                        <input type="text" class="form-control" id="username" name="username">
                        <label for="username">Username</label>
                      </div>
                      <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email">
                        <label for="email">Email address</label>
                      </div>
                      <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password">
                        <label for="password">Password</label>
                      </div>
                      <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
                      <small class="text-center d-block">
                        Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                      </small>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection