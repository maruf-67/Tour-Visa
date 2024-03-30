@extends('frontend.layouts.master')

@section('title', 'Homepage')

@push('style')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" /> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo1/style.css') }}" /> --}}
@endpush



@section('content')
    <div class="container mt-5 pt-4 px-4" style="height: 60vh">
        <h1 class="text-center mb-5 text-success"><span style="color:red">Let's Start Your Uk ETA</span>
            Application</h1>
        <div class="row section-padding justify-content-center">
            <div class="col-md-12">
                {{-- create form for laravel --}}
                <form action="{{ route('order.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <!-- Country names and Country Code -->
                            <label class="d-block mb-4 ">
                                <span class="form-label d-block">Country of Citizenship *</span>
                                <select class="form-select" id="country_citizen" name="citizen_country_id">
                                    <option value="">Enter Your Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach

                                </select>
                            </label>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- Country names and Country Code -->
                            <label class="d-block mb-4 ">
                                <span class="form-label d-block">No Off Applications *</span>
                                <select class="form-select" id="numFormsInput" name="count">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                            </label>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- Country names and Country Code -->
                            <label class="d-block mb-4 ">
                                <span class="form-label d-block">Email address *</span>
                                <input type="mail" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Your Email Here" name="email">
                                <div id="emailHelp" class="form-text">We'll never share your email with
                                    anyone
                                    else.
                                </div>
                            </label>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- Country names and Country Code -->
                            <label class="d-block mb-4 ">
                                <span class="form-label d-block">Phone Number *</span>
                                <input type="tel" class="form-control" id="exampleInputNumber"
                                    placeholder="Enter Phone Number" name="phone">
                                <small id="phoneno" class="form-text text-muted">We'll never share your
                                    number with anyone else.</small>
                            </label>
                        </div>
                    </div>
                    {{-- submit button --}}

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

