<!-- verification-notice.blade.php -->
@extends('layouts.default')

@section('content')
<div class="container d-flex flex-column">
    <div class="row vh-100">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xl-6 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">

                <div class="text-center mt-4">
                    <h1 class="h2">Email Verification Required</h1>
                    <p class="lead">
                        Please verify your email address before accessing this site.
                    </p>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="m-sm-3">
                            <div class="alert alert-info" role="alert">
                                <p class="text-center">
                                    An email with a verification link has been sent to your registered email address
                                    <strong>{{ Str::mask(Auth()->user()->email, '*', -15, 3) }}</strong>. Click on the
                                    link to verify your email.
                                </p>
                                <p class="text-center">
                                    If you didn't receive the email, you can
                                    <a href="{{ route('verification.send') }}">
                                        <i class="fas fa-sync-alt"></i> Resend the verification email
                                    </a>.
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