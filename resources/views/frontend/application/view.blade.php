@extends('frontend.layouts.master')
@section('title', 'Basic Setting')

@push('style')
<!-- Layout styles -->
<link rel="stylesheet" href="{{ asset('css/demo1/style.css') }}">
<!-- End layout styles -->
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
                                                        <H1 class="card-text text-center text-primary">Preview Form 1</H1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-6 col-md-12 col-xl-6">
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h5 class="card-title">Reference Id</h5>
                                                    </div>
                                                    <div class="col-8">
                                                        <p class="card-text">Etajs45646</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h5 class="card-title">Service Type</h5>
                                                    </div>
                                                    <div class="col-8">
                                                        <select class="form-select" id="service" name="service">
                                                            <option>Rush</option>
                                                            <option>Fast</option>
                                                            <option>Normal</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="">Full Name</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <input type="text" class="form-control" name="name" id="name" required placeholder="Ajmain Akash">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Email</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <input type="mail" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Enter Your Email Here"
                                                name="email">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Phone</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <input type="tel" class="form-control" id="exampleInputNumber"
                                                placeholder="Enter Phone Number" name="phone">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Sex</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                                id="inlineRadio1" value="option1">
                                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                                id="inlineRadio2" value="option2">
                                                            <label class="form-check-label" for="inlineRadio2">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Birth Country</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <select class="form-select" id="country" name="country">
                                                            <option value="">Enter Your Country</option>
                                                            <option value="AF">Afghanistan</option>
                                                            <option value="AX">Aland Islands</option>
                                                            <option value="AL">Albania</option>
                                                            <option value="DZ">Algeria</option>
                                                            <option value="AS">American Samoa</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Citizen Country</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <select class="form-select" id="country" name="country">
                                                            <option value="">Enter Your Country</option>
                                                            <option value="AF">Afghanistan</option>
                                                            <option value="AX">Aland Islands</option>
                                                            <option value="AL">Albania</option>
                                                            <option value="DZ">Algeria</option>
                                                            <option value="AS">American Samoa</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Address</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <p class="card-text">123 Main St, City, Country</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Date of Birth</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <input required name="date" type="date" class="form-control"
                                                placeholder="Rahman" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h5 class="card-title">Tell us more about yourself</h5>
                                                    </div>
                                                    <div class="col-8">
                                                        <textarea name="message" class="form-control" rows="3" placeholder="What motivates you?"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-12 col-xl-6">

                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Passport Country</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <select class="form-select" id="country" name="country">
                                                            <option value="">Enter Your Country</option>
                                                            <option value="AF">Afghanistan</option>
                                                            <option value="AX">Aland Islands</option>
                                                            <option value="AL">Albania</option>
                                                            <option value="DZ">Algeria</option>
                                                            <option value="AS">American Samoa</option>
                                                            <option value="AD">Andorra</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Passport Number</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <input type="text" class="form-control" id="exampleInputNumber"
                                        placeholder="Enter Passport Number">
                                    <small id="phone" class="form-text text-muted">We'll never share your number
                                        with
                                        anyone
                                        else.</small>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Issue Date</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <input required name="date" type="date" class="form-control"
                                        placeholder="Rahman" />
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Expiry Date</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <input required name="date" type="date" class="form-control"
                                        placeholder="Rahman" />
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Intended Date</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <input required name="date" type="date" class="form-control"
                                        placeholder="Rahman" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Criminal Record</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                                id="inlineRadio1" value="option1">
                                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                                id="inlineRadio2" value="option2">
                                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">War Crime</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                                id="inlineRadio1" value="option1">
                                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                                id="inlineRadio2" value="option2">
                                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <button class="btn btn-primary col-12">Confirm Submit</button>
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
            </div>
        </div> <!-- row -->
    </div>
@endsection
