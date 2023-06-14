@extends('layouts\default')

@section('content')
<div class="container d-flex flex-column">
    <div class="row vh-100">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">

                <div class="text-center">
                    <h1 class="display-1 fw-bold">404</h1>
                    <p class="h2">Page not found.</p>
                    <p class="lead fw-normal mt-3 mb-4">The page you are looking for might have been removed.</p>
                    <a href="{{ route('supplier.dashboard') }}" class="btn btn-primary btn-lg">Return to website</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection