@extends('layouts\default')

@section('content')
<div class="container d-flex flex-column">
    <div class="row vh-100">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">

                <div class="text-center mt-4">
                    <h1 class="h2">Welcome back!</h1>
                    <p class="lead">
                        Sign in to your account to continue
                    </p>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="m-sm-3">
                            <form method="POST" accept="{{ route('supplier.login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Supplier Numbar or Email</label>
                                    <input
                                        class="form-control form-control-lg {{ $errors->has('email') || $errors->has('login_error') ? 'is-invalid' : '' }}"
                                        type="email" name="email" placeholder="Supplier Number or Email"
                                        value="{{ old('email') }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input
                                        class="form-control form-control-lg {{ $errors->has('password') || $errors->has('login_error') ? 'is-invalid' : '' }}"
                                        type="password" name="password" placeholder="Enter your password" />
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="form-check align-items-center">
                                        <input id="customControlInline" type="checkbox" class="form-check-input"
                                            value="remember-me" name="remember-me" checked>
                                        <label class="form-check-label text-small" for="customControlInline">Remember
                                            me</label>
                                    </div>
                                    <div>
                                        <a href="{{ route('supplier.reset-password') }}"
                                            rel="noopener noreferrer">Forgot Password?</a>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 mt-3">
                                    <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-3">
                    Don't have an account? <a href="{{ route('supplier.register') }}">Sign up</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection