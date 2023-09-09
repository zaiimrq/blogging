@extends('parts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-5">
                <main class="form-signin w-100 m-auto">
                    <h1 class="h3 mb-3 fw-normal">Please Register</h1>
                    <form action="{{ route('register.post') }}" method="post">
                      @csrf

                      <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <label for="name">Name</label>
                      </div>

                      <div class="form-floating">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required>
                        @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <label for="username">Username</label>
                      </div>

                      <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <label for="email">Email address</label>
                      </div>

                      <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <label for="password">Password</label>
                      </div>

                      <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Register</button>
                      <small class="text-center d-block">
                        Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                      </small>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection