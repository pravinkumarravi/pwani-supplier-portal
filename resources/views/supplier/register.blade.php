@extends('layouts\default')

@section('content')
<div class="container d-flex flex-column">
    <div class="row vh-100">
        <div class="col-sm-10 col-md-8 col-lg-6 offset-lg-6 col-xl-4 offset-xl-8 d-table h-100">
            <div class="d-table-cell align-middle">

                <div class="text-center mt-4">
                    <h1 class="h2">Get started</h1>
                    <p class="lead">
                        Register into your Pwani Oil Products Limited.
                    </p>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('supplier.register') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Supplier Name</label>
                                <input class="form-control form-control-lg" type="text" name="name"
                                    placeholder="Enter your name" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input class="form-control form-control-lg" type="email" name="email"
                                    placeholder="Enter your email" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mobile</label>
                                <div class="row">
                                    <div class="col-md-3 pe-0">
                                        <input class="form-control form-control-lg" type="code" name="code"
                                            placeholder="+91" />
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control form-control-lg" type="phone" name="phone"
                                            placeholder="Enter your phone number" />
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input class="form-control form-control-lg" type="password" name="password"
                                    placeholder="Enter password" />
                            </div>
                            <div>
                                <div class="form-check align-items-center">
                                    <input id="terms-and-policy" type="checkbox" class="form-check-input" value="true"
                                        name="terms-and-policy" />
                                    <label class="form-check-label text-small" for="terms-and-policy">I agree for the
                                        Pwani Oil Products Limited credit terms and policy.</label>
                                </div>
                            </div>
                            <div class="d-grid gap-2 mt-3">
                                <button type="submit" class="btn btn-lg btn-primary">Sign up</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center mb-3">
                    Already have account? <a href="{{ route('supplier.login') }}">Log In</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection