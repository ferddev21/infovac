@extends('layouts.user-main')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card shadow-sm rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h1 class="text-center fw-light">InfoVac <i class="bi bi-shield-fill-check"></i></h1>
                        <hr>
                        <h5 class="card-title text-center mb-3 fw-light fs-5">Sign up</h5>
                        <form action="{{ route('register.process') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama"
                                    placeholder="nama lengkap" name="nama" value="{{ old('nama') }}">
                                <label for="nama">Nama Lengkap</label>
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control  @error('username') is-invalid @enderror"
                                    id="username" placeholder="username" name="username" value="{{ old('username') }}">
                                <label for="username">Username</label>
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control  @error('telphone') is-invalid @enderror"
                                    id="floatingInput" placeholder="telphone" name="telphone"
                                    value="{{ old('telphone') }}">
                                <label for="floatingInput">Nomor Telphone</label>
                                @error('telphone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                    id="floatingInput" placeholder="email" name="email" value="{{ old('email') }}">
                                <label for="floatingInput">Alamat Email</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control  @error('password') is-invalid @enderror"
                                    id="password" placeholder="password" name="password" value="{{ old('password') }}">
                                <label for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-dark" type="submit">
                                    Sign up
                                </button>
                            </div>
                        </form>
                        <hr class="my-4">
                        <div class="d-grid mb-2">
                            <a href="{{ route('login.google') }}" class="btn btn-google " type="submit">
                                <i class="bi bi-google"></i> Sign up with Google
                            </a>
                        </div>


                        <p class="text-center mt-5">Sudah punya akun ?
                            <a href="{{ route('login') }}" class="text-dark">
                                Sign In
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
