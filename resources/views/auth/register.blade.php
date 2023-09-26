@extends('layouts.app')

@section('content')
    <div class="container h-100 mb-12">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-9">

                <h1 class="mb-4">Register</h1>

                <div class="card" style="border-radius: 15px;">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">

                                    <h6 class="mb-0">First name</h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                    <input name="first_name" type="text" required autocomplete="first_name"
                                        class="form-control @error('first_name') is-invalid @enderror form-control-lg" />

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">

                                    <h6 class="mb-0">Last name</h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                    <input name="last_name" type="text" required autocomplete="last_name"
                                        class="form-control @error('last_name') is-invalid @enderror form-control-lg" />

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">

                                    <h6 class="mb-0">Username</h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                    <input name="username" type="text" required autocomplete="username"
                                        class="form-control @error('username') is-invalid @enderror form-control-lg" />

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">

                                    <h6 class="mb-0">Email address</h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                    <input type="email" name="email" required autocomplete="email"
                                        class="form-control @error('email') is-invalid @enderror form-control-lg"
                                        placeholder="example@example.com" />

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

                                    <h6 class="mb-0">Phone</h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                    <input type="tel" name="phone" required autocomplete="phone"
                                        class="form-control form-control-lg">

                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">

                                    <h6 class="mb-0">Password</h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                    <input name="password" type="password" required autocomplete="new-password"
                                        class="form-control @error('password') is-invalid @enderror form-control-lg" />


                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">

                                    <h6 class="mb-0">Password Confirm</h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                    <input type="password" name="password_confirmation" required autocomplete="new-password"
                                        class="form-control form-control-lg" />

                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">

                                    <h6 class="mb-0">Avatar</h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                    <input name="avatar" type="file" required autocomplete="avatar"
                                        class="form-control form-control-lg" />
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="px-5 py-4">
                                <button type="submit" class="btn btn-primary btn-lg">Register</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
