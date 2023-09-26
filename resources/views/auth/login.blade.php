@extends('layouts.app')

@section('content')
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-9">

                <h1 class="mb-4">Login</h1>

                <div class="card" style="border-radius: 15px;">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">

                                    <h6 class="mb-0">Email address</h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror form-control-lg"
                                        placeholder="example@example.com" required autocomplete="email" />

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">

                                    <h6 class="mb-0">Password</h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror
                                        form-control-lg" />

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="px-5 py-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Login
                                </button>
                            </div>

                            @if (Route::has('password.request'))
                                <a class="text-dark" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            @endif

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
