@extends('parts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-5">
                <main class="form-signin w-100 m-auto">
                    <h1 class="h3 mb-3 fw-normal">Please Login</h1>
                    <form action="{{ route('login.post') }}" method="post">
                      <div class="form-floating">
                        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
                        <label for="email">Email address</label>
                      </div>
                      <div class="form-floating">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        <label for="password">Password</label>
                      </div>
                      <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                      <small class="text-center d-block">
                        Belum punya akun? <a href="{{ route('register') }}">Register</a>
                      </small>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection