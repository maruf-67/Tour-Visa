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
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body container">
                <div class="row">
                    <div class="col-12 col-md-12 col-xl-12">
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <H1 class="card-text text-center text-primary">ETAVA37846873</H1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-6 col-md-12 col-xl-12 col-sm-6">
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="row">
                                    <table class="table table-light">
                                        <thead>
                                          <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col">Application ID</th>
                                            <th scope="col">Applicant Name</th>
                                            <th scope="col">Service Type</th>
                                            <th scope="col">Payable</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">1</th>
                                            <td>ETA123434324</td>
                                            <td>Maruf</td>
                                            <td>Super</td>
                                            <td>1500</td>
                                          </tr>
                                          <tr>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td  class="d-flex justify-content-end">SUM =</th>
                                              <td></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <input type="button" class="btn btn-primary" value="Proceed To Payment">
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
