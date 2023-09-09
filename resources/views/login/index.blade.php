@extends('parts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-5">
                <main class="form-signin w-100 m-auto">
                  @if (session()->has('success'))     
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('success') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @elseif (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{ session('loginError') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                  <h1 class="h3 mb-3 fw-normal">Please Login</h1>
                    <form action="{{ route('login.post') }}" method="post">
                      @csrf

                      <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" required autofocus>
                        <label for="email">Email address</label>
                      </div>

                      <div class="form-floating">
                        <input type="password" class="form-control @error('email') is-invalid @enderror" id="password" placeholder="Password" name="password" required>
                        <label for="password">Password</label>
                      </div>

                      <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Login</button>
                      <small class="text-center d-block">
                        Belum punya akun? <a href="{{ route('register') }}">Register</a>
                      </small>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection