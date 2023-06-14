@extends('layouts.default')

@section('content')
<div class="container d-flex flex-column">
    <div class="row vh-100">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xl-6 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">

                <div class="text-center mt-4">
                    <h1 class="h2">Registration Successful!</h1>
                    <p class="lead">
                        Thank you for registering with us. A verification email has been sent to your registered email
                        address.
                    </p>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="m-sm-3">
                            <div class="alert alert-info" role="alert">
                                <p class="text-center">
                                    Please check your inbox and follow the instructions in the email to verify your
                                    account..
                                </p>
                                <p class="text-center">
                                    If you did not receive the email, please check your spam folder or contact our
                                    support team.
                                    <a href="{{ route('verification.send') }}">
                                        <i class="fas fa-sync-alt"></i> Resend the verification email
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection