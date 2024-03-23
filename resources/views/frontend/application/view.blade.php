@extends('frontend.layouts.master')

@section('title', 'Contact Us | PrepBook')

@push('style')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" /> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo1/style.css') }}" />
@endpush

@section('navbar')

@endsection

@push('nav')
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <ul class="info">
                        <li><i class="fa fa-envelope"></i> info@company.com</li>
                        <li><i class="fa fa-map"></i> Sunny Isles Beach, FL 33160</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                    <ul class="social-links">
                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="https://x.com/minthu" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endpush

@section('content')

    <div class="page-content">
        <div class="col-md-12 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body container" style="height:100vh">
                    <div class="row">
                        <div class="col-12 col-md-12 col-xl-12 mt-5">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <H1 class="card-text text-center text-primary">Check Your Visa Status</H1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xl-6 mx-auto mt-3">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title text-center fs-3 text-secondary"><b>What is your Reference Number??</b></h5>
                                            <!-- Begin Form -->
                                            <form action="{{ route('viewReference') }}" method="POST">
                                                @csrf
                                                <input type="text" name="reference_id" class="form-control" id="exampleInputNumber" placeholder="Input Your Reference Number!!">
                                                <small id="phone" class="form-text text-muted ms-1">We'll never share your information with anyone else.</small>
                                                <!-- Submit Button -->
                                                <div class="text-center mt-3">
                                                    <button type="submit" class="btn btn-primary col-6">Check Now</button>
                                                </div>
                                            </form>
                                            <!-- End Form -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
