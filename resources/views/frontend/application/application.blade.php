@extends('frontend.layouts.master')

@section('title', 'Contact Us | PrepBook')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/style.css" />
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

  {{-- <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <h1>Villa</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="index.html" class="active">Home</a></li>
                      <li><a href="properties.html">Properties</a></li>
                      <li><a href="property-details.html">Property Details</a></li>
                      <li><a href="contact.html">Contact Us</a></li>
                      <li><a href="{{ route('application') }}"><i class="fa fa-calendar"></i> Apply Now</a></li>
                  </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header> --}}
  <!-- ***** Header Area End ***** -->

@endpush

@section('content')

    <div class="container">
        <div class="progress-container">
            <ul id="progressbar">
                <li class="active" id="step1">
                    <strong>Step 1</strong>
                </li>
                <li id="step2">
                    <strong>Step 2</strong>
                </li>
                <li id="step3">
                    <strong>Step 3</strong>
                </li>
                <li id="step4">
                    <strong>Step 4</strong>
                </li>
                <li id="step5">
                    <strong>Step 5</strong>
                </li>
            </ul>
            <div class="progress">
                <div class="progress-bar"></div>
            </div>
        </div>

        <form method="POST" class="w-100 rounded-1 p-4 border bg-white" action="#" enctype="multipart/form-data"
            style="border: unset !important;;">

            <div class="step-container">

                <fieldset>
                    <div class="container pt-4 px-4">
                        <h1 class="text-center mb-5 text-success">Application Information</h1>
                        <div class="row section-padding justify-content-center">
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <!-- Country names and Country Code -->
                                        <label class="d-block mb-4 ">
                                            <span class="form-label d-block">Service Type *</span>
                                            <select class="form-select" id="service" name="service">
                                                <option>Rush</option>
                                                <option>Fast</option>
                                                <option>Normal</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <!-- Country names and Country Code -->
                                        <label class="d-block mb-4 ">
                                            <span class="form-label d-block">No Off Applications *</span>
                                            <select class="form-select" id="application_count" name="application_count">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="button" name="next-step" class="next-step me-4" value="Next" />
                </fieldset>

                <fieldset>
                    <div class="container py-4 px-4">
                        <h1 class="text-center mb-5 text-success">Personal Information</h1>
                        <div class="row section-padding justify-content-center">
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label class="d-block mb-4">
                                            <span class="form-label d-block">First Name *</span>
                                            <input required name="f_name" type="text" class="form-control"
                                                placeholder="Mahfujur" />
                                        </label>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <label class="d-block mb-4">
                                            <span class="form-label d-block">Last Name *</span>
                                            <input required name="l_name" type="text" class="form-control"
                                                placeholder="Rahman" />
                                        </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label class="d-block mb-4">
                                            <span class="form-label d-block">Date of Birth *</span>
                                            <input required name="date" type="date" class="form-control"
                                                placeholder="Rahman" />
                                        </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label class="d-block mb-4 ">
                                            <span class="form-label d-block">Sex *</span>
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
                                        </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <!-- Country names and Country Code -->
                                        <label class="d-block mb-4 ">
                                            <span class="form-label d-block">Country of Birth *</span>
                                            <select class="form-select" id="country" name="country">
                                                <option value="">Enter Your Country</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AX">Aland Islands</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AS">American Samoa</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <!-- Country names and Country Code -->
                                        <label class="d-block mb-4 ">
                                            <span class="form-label d-block">Country of Citizenship *</span>
                                            <select class="form-select" id="country" name="country">
                                                <option value="">Enter Your Country</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AX">Aland Islands</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                            </select>
                                        </label>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <input type="mail" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Enter Your Email Here"
                                                name="email">
                                            <div id="emailHelp" class="form-text">We'll never share your email with
                                                anyone
                                                else.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputNumber" class="form-label">Phone Number</label>
                                            <input type="tel" class="form-control" id="exampleInputNumber"
                                                placeholder="Enter Phone Number" name="phone">
                                            <small id="phone" class="form-text text-muted">We'll never share your
                                                number with anyone else.</small>
                                        </div>
                                    </div>
                                </div>

                                <label class="d-block mb-4">
                                    <span class="form-label d-block">Tell us more about yourself</span>
                                    <textarea name="message" class="form-control" rows="3" placeholder="What motivates you?"></textarea>
                                </label>

                                <div class="d-block text-end">
                                    <div class="small">
                                        <a href="#" class="text-dark text-decoration-none"
                                            target="_blank">Developed By Mahfujur Rahman</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="button" name="next-step" class="next-step me-4" value="Next" />
                    <input type="button" name="previous-step" class="previous-step" value="Previous " />
                </fieldset>


                <fieldset>
                    <div class="container py-4 px-4">
                        <h1 class="text-center mb-5 text-success">Passport & Travel Details</h1>
                        <div class="row section-padding justify-content-center">
                            <div class="col-md-12">
                                <!-- Country names and Country Code -->
                                <label class="d-block mb-4 ">
                                    <span class="form-label d-block">Country of Passport *</span>
                                    <select class="form-select" id="country" name="country">
                                        <option value="">Enter Your Country</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Aland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                    </select>
                                </label>

                                <div class="form-group mb-3">
                                    <label for="exampleInputNumber" class="form-label">Passport Number</label>
                                    <input type="text" class="form-control" id="exampleInputNumber"
                                        placeholder="Enter Passport Number">
                                    <small id="phone" class="form-text text-muted">We'll never share your number
                                        with
                                        anyone
                                        else.</small>
                                </div>

                                <label class="d-block mb-4">
                                    <span class="form-label d-block">Issue Date *</span>
                                    <input required name="date" type="date" class="form-control"
                                        placeholder="Rahman" />
                                </label>

                                <label class="d-block mb-4">
                                    <span class="form-label d-block">Expiry Date *</span>
                                    <input required name="date" type="date" class="form-control"
                                        placeholder="Rahman" />
                                </label>

                                <label class="d-block mb-4">
                                    <span class="form-label d-block">Intended Date of Entry *</span>
                                    <input required name="date" type="date" class="form-control"
                                        placeholder="Rahman" />
                                </label>


                                <div class="d-block text-end">
                                    <div class="small">
                                        <a href="#" class="text-dark text-decoration-none"
                                            target="_blank">Developed By Mahfujur Rahman</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="button" name="next-step" class="next-step me-4" value="Next" />
                    <input type="button" name="previous-step" class="previous-step" value="Previous" />
                </fieldset>


                <fieldset>
                    <div class="container py-4 px-4">
                        <h1 class="text-center mb-5 text-success">Declaration of Application</h1>
                        <div class="row section-padding justify-content-center">
                            <div class="col-md-12">

                                <label class="d-block mb-4 ">
                                    <span class="form-label d-block">Have you ever had a criminal conviction? *</span>
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
                                </label>

                                <label class="d-block mb-4 ">
                                    <span class="form-label d-block">Have you ever been involved in, or suspected of
                                        war
                                        crimes, genocide or crimes against humanity; terrosim including support for, or
                                        membership of, terrorist groups; supporting extremist groups or expressing
                                        extremist
                                        views? *</span>
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
                                </label>

                                <div class="mb-4">
                                    <div>
                                        <div class="form-check">
                                            <label class="d-block">
                                                <input type="checkbox" class="form-check-input" name="remote"
                                                    value="yes" checked />
                                                <span class="form-check-label">I declare that the information I have
                                                    given
                                                    in this application is truthful, complete and correct.</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-check">
                                            <input type="checkbox" class="form-check-input" name="remote"
                                                value="no" />
                                            <span class="form-check-label">I have read and understand the <b>Terms and
                                                    conditions</b>, and the <b>Privacy Policy</b>.</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="d-block text-end">
                                    <div class="small">
                                        <a href="#" class="text-dark text-decoration-none"
                                            target="_blank">Developed By Mahfujur Rahman</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <input type="button" name="next-step" class="next-step me-4" value="Final" />
                    <input type="button" name="previous-step" class="previous-step" value="Previous " />
                </fieldset>


                <fieldset>
                    <div class="finish">
                        <h2 class="text">
                            <strong>FINISHED preview option needed</strong>
                        </h2>
                    </div>
                    <input type="button" name="previous-step" class="previous-step me-4" value="Previous" />
                </fieldset>

            </div>

        </form>
    </div>

    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="js/script.js"></script>
    @endpush
@endsection
