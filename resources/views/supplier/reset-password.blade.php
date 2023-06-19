@extends('layouts.default')

@section('content')
<div class="container d-flex flex-column">
    <div class="row vh-100">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">

                <div class="text-center mt-4">
                    <h1 class="h2">Forgot Password</h1>
                    <p class="lead">
                        Enter your email address to reset your password.
                    </p>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="m-sm-3">
                            <form method="POST" action="{{ route('supplier.reset-password') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input
                                        class="form-control form-control-lg {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                        type="email" name="email" placeholder="Enter your email"
                                        value="{{ old('email') }}" />
                                    @if ($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="d-grid gap-2 mt-3">
                                    <button type="submit" class="btn btn-lg btn-primary">Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-3">
                    Remembered your password? <a href="{{ route('supplier.login') }}">Sign in</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection