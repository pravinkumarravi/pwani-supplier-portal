@extends('layouts.default')

@section('content')
<div class="container d-flex flex-column">
    <div class="row vh-100">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xl-6 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">

                <div class="text-center mt-4">
                    <h1 class="h2">Password Reset Email Sent</h1>
                    <p class="lead">
                        An email with instructions to reset your password has been sent.
                    </p>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="m-sm-3">
                            <div class="alert alert-info" role="alert">
                                <p class="text-center">
                                    We have sent an email to your registered email address with instructions to reset
                                    your password.
                                    Please check your inbox and follow the provided steps.
                                </p>
                                <p class="text-center">
                                    If you didn't receive the email, please check your spam folder or
                                    <a href="{{ route('supplier.reset-password') }}">
                                        click here to request another password reset email
                                    </a>.
                                </p>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('supplier.dashboard') }}" class="btn btn-primary">Back to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection