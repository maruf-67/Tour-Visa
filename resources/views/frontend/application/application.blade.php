@extends('frontend.layouts.master')

@section('title', 'Contact Us | PrepBook')

@push('style')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
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

    <div class="container">

        <div class="mb-3 mt-5 generateForms">
            {{-- <label for="numFormsInput" class="form-label">Number of Forms</label>
        <input type="number" class="form-control" id="numFormsInput" min="1" value="3"> --}}

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
                                        <select class="form-select" id="numFormsInput" name="application_count">
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
                <input id="generateForms" type="button" name="next-step" class="next-step me-4" value="Next" />
            </fieldset>
        </div>
        {{-- <button id="generateForms" class="btn btn-primary">Generate Forms</button> --}}
        <div id="formsContainer" style="display: none;"></div> <!-- Initially hidden -->
        <div class="progress mt-4">
            <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <button id="submitAll" class="btn btn-primary mt-3">Submit All</button>
    </div>
    @push('script')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            var formData = [];
            var countries = [];

            $(document).ready(function() {
                var $numFormsInput = $('#numFormsInput');
                var $formsContainer = $('#formsContainer');
                var $progressBar = $('#progressBar');

                $.ajax({
                    url: "{{ route('countries') }}",
                    type: "GET",
                    success: function(response) {
                        // Handle successful response here
                        countries = response;

                        // countries.forEach(function(country) {
                        //     console.log(country);
                        // });
                        var numForms = 1;
                        var formsFilled = 0;
                        var drafts = [];

                        function updateProgressBar() {
                            var completionPercentage = (formsFilled / numForms) * 100;
                            $progressBar.css('width', completionPercentage + '%').attr('aria-valuenow',
                                completionPercentage);
                        }

                        function generateForm(formIndex) {

                            // console.log(formIndex);
                            let formHtml = `
                            <form class="form" id="form${formIndex}" style="display: ${formIndex === 1 ? 'block' : 'none'};">
                                <h2>Form ${formIndex}</h2>

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
                                    </ul>
                                    <div class="progress mt-4" id="progressBar${formIndex}">
                                        <div class="progress-bar form-progress" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                                <div id="step1${formIndex}" class="form-step">
                                    <fieldset>
                                        <div class="container py-4 px-4">
                                            <h1 class="text-center mb-5 text-success">Personal Information</h1>
                                            <div class="row section-padding justify-content-center">
                                                <div class="col-md-12">

                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <label class="d-block mb-4">
                                                                <span class="form-label d-block">First Name *</span>
                                                                <input name="f_name" type="text" class="form-control"
                                                                    placeholder="Mahfujur" />
                                                            </label>
                                                        </div>

                                                        <div class="col-md-6 col-sm-12">
                                                            <label class="d-block mb-4">
                                                                <span class="form-label d-block">Last Name *</span>
                                                                <input name="l_name" type="text" class="form-control"
                                                                    placeholder="Rahman" />
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <label class="d-block mb-4">
                                                                <span class="form-label d-block">Date of Birth *</span>
                                                                <input name="date" type="date" class="form-control"
                                                                    placeholder="Rahman" />
                                                            </label>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <label class="d-block mb-4">
                                                                <span class="form-label d-block">Sex *</span>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name='sex' id="sex1" value="Male">
                                                                    <label class="form-check-label" for="sex1">Male</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="sex" id="sex2" value="Female">
                                                                    <label class="form-check-label" for="sex2">Female</label>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <!-- Country names and Country Code -->
                                                            <label class="d-block mb-4 ">
                                                                <span class="form-label d-block">Country of Birth *</span>
                                                                <select class="form-select" id="country_birth" name="country_birth">

                                                                    <option value="">Enter Your Country</option>`;

                                                                // Add options for each country
                                                                countries.forEach(function(country) {
                                                                    formHtml += `<option value="${country.name}">${country.name}</option>`;
                                                                });

                                                                formHtml += `

                                                                </select>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <!-- Country names and Country Code -->
                                                            <label class="d-block mb-4 ">
                                                                <span class="form-label d-block">Country of Citizenship *</span>
                                                                <select class="form-select" id="country_citizen" name="country_citizen">
                                                                    <option value="">Enter Your Country</option>`;


                                                                    countries.forEach(function(country) {
                                                                        formHtml += `<option value="${country.name}">${country.name}</option>`;
                                                                    });

                                                                    formHtml += `

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
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group mb-3">
                                                                <label class="d-block mb-4">
                                                                    <span class="form-label d-block">Address</span>
                                                                    <textarea name="address" class="form-control" rows="2" placeholder="Where do you live?"></textarea>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group mb-3">
                                                                <label class="d-block mb-4">
                                                                    <span class="form-label d-block">Tell us more about yourself</span>
                                                                    <textarea name="message" class="form-control" rows="2" placeholder="What motivates you?"></textarea>
                                                                </label>
                                                            </div>
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
                                        <input type="button" class="next-step me-4 next-btn" value="Next" />

                                    </fieldset>
                                </div>

                                <div id="step2${formIndex}" class="form-step" style="display: none;">
                                    <fieldset>
                                        <div class="container py-4 px-4">
                                            <h1 class="text-center mb-5 text-success">Passport & Travel Details</h1>
                                            <div class="row section-padding justify-content-center">
                                                <div class="col-md-12">
                                                    <!-- Country names and Country Code -->
                                                    <label class="d-block mb-4 ">
                                                        <span class="form-label d-block">Country of Passport *</span>
                                                        <select class="form-select" id="country_passport" name="country_passport">
                                                            <option value="">Enter Your Country</option>`;


                                                            countries.forEach(function(country) {
                                                                formHtml += `<option value="${country.name}">${country.name}</option>`;
                                                            });

                                                            formHtml += `

                                                        </select>
                                                    </label>

                                                    <div class="form-group mb-3">
                                                        <label for="exampleInputNumber" class="form-label">Passport Number</label>
                                                        <input type="text" class="form-control" id="exampleInputNumber" name="passport_num"
                                                            placeholder="Enter Passport Number">
                                                        <small id="phone" class="form-text text-muted">We'll never share your number
                                                            with
                                                            anyone
                                                            else.</small>
                                                    </div>

                                                    <label class="d-block mb-4">
                                                        <span class="form-label d-block">Issue Date *</span>
                                                        <input type="date" class="form-control" name="issueDate"
                                                            placeholder="Rahman" />
                                                    </label>

                                                    <label class="d-block mb-4">
                                                        <span class="form-label d-block">Expiry Date *</span>
                                                        <input type="date" class="form-control" name="expiryDate"
                                                            placeholder="Rahman" />
                                                    </label>

                                                    <label class="d-block mb-4">
                                                        <span class="form-label d-block">Intended Date of Entry *</span>
                                                        <input type="date" class="form-control" name="intendDate"
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


                                        <input type="button" class="next-step me-4 next-btn1" value="Next" />
                                        <input type="button" name="previous-step" class="previous-step prev-btn" value="Previous" />
                                    </fieldset>
                                </div>

                                <div id="step3${formIndex}" class="form-step" style="display: none;">
                                    <fieldset>
                                        <div class="container py-4 px-4">
                                            <h1 class="text-center mb-5 text-success">Declaration of Application</h1>
                                            <div class="row section-padding justify-content-center">
                                                <div class="col-md-12">
                                                    <label class="d-block mb-4 ">
                                                        <span class="form-label d-block">Have you ever had a criminal conviction? *</span>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="criminal" id="criminal1" value="Yes">
                                                            <label class="form-check-label" for="criminal1">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="criminal" id="criminal2" value="No">
                                                            <label class="form-check-label" for="criminal2">No</label>
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
                                                            <input class="form-check-input" type="radio" name="war"
                                                                id="war1" value="Yes">
                                                            <label class="form-check-label" for="war1">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="war"
                                                                id="war2" value="No">
                                                            <label class="form-check-label" for="war2">No</label>
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


                                        <input type="submit" class="next-step me-4" value="Next" />
                                        <input type="button" name="previous-step" class="previous-step prev-btn1" value="Previous " />
                                    </fieldset>
                                </div>

                                <div id="step4${formIndex}" class="form-step" style="display: none;">
                                    <fieldset id="finalform">



                                        <input type="submit" name="next-step" class="next-step me-4" value="Final" />
                                        <input type="button" name="previous-step" class="previous-step prev-btn1" value="Previous " />
                                    </fieldset>
                                </div>

                            </form>
                            `;
                            return formHtml;
                        }
                        // function generateFinalForm(formIndex,ItemData) {
                        //     console.log(formIndex);
                        //     return `



                        $('#generateForms').click(function() {
                            numForms = parseInt($numFormsInput.val());
                            $formsContainer.empty();
                            drafts = []; // Reset drafts when generating new forms
                            for (var i = 1; i <= numForms; i++) {
                                $formsContainer.append(generateForm(i));
                            }
                            $formsContainer.show(); // Show forms container after generating forms
                            formsFilled = 0; // Reset formsFilled when generating new forms
                            updateProgressBar(); // Update progress bar after generating forms
                        });

                        document.getElementById("generateForms").addEventListener("click", function() {
                            // Hide the code block
                            document.querySelector("div.generateForms").style.display = "none";
                            document.getElementById("generateForms").style.display = "none";
                        });

                        $(document).on('click', '.next-btn', function() {
                            var $form = $(this).closest('.form');
                            var formIndex = $form.attr('id').replace('form', '');
                            $form.find('.form-step').hide();
                            $('#step2' + formIndex).show();
                            $('#progressBar' + formIndex).show();
                            $form.find('.form-progress').css('width', '33%').attr('aria-valuenow',
                                33);

                        });

                        $(document).on('click', '.next-btn1', function() {
                            var $form = $(this).closest('.form');
                            var formIndex = $form.attr('id').replace('form', '');
                            $form.find('.form-step').hide();
                            $('#step3' + formIndex).show();
                            $('#progressBar' + formIndex).show();
                            $form.find('.form-progress').css('width', '66%').attr('aria-valuenow',
                                66);

                        });

                        $(document).on('click', '.next-btn2', function() {
                            var $form = $(this).closest('.form');
                            var formIndex = $form.attr('id').replace('form', '');
                            $form.find('.form-step').hide();
                            $('#step4' + formIndex).show();
                            $('#progressBar' + formIndex).show();
                            $form.find('.form-progress').css('width', '100%').attr('aria-valuenow',
                                100);

                        });

                        $(document).on('click', '.prev-btn', function() {
                            var $form = $(this).closest('.form');
                            var formIndex = $form.attr('id').replace('form', '');
                            $form.find('.form-step').hide();
                            $('#step1' + formIndex).show();
                            $('#progressBar' + formIndex).show();
                            $form.find('.form-progress').css('width', '50%').attr('aria-valuenow',
                                50);
                        });

                        $(document).on('click', '.prev-btn1', function() {
                            var $form = $(this).closest('.form');
                            var formIndex = $form.attr('id').replace('form', '');
                            $form.find('.form-step').hide();
                            $('#step2' + formIndex).show();
                            $('#progressBar' + formIndex).show();
                            $form.find('.form-progress').css('width', '0%').attr('aria-valuenow',
                            0);
                        });



                        // Array to store form data

                        $(document).on('submit', '.form', function(event) {
                            event.preventDefault();
                            // console.log('submit working');
                            var currentFormData = new FormData(
                            this); // Create FormData object with the form data
                            var formIndex = $(this).attr('id').replace('form', '');
                            var formObject = {}; // Object to store form data
                            for (var pair of currentFormData.entries()) {
                                formObject[pair[0]] = pair[
                                1]; // Store form input values with their names as keys
                            }
                            formData[formIndex - 1] = formObject; // Save form data into the correct index of formData array
                            drafts[formIndex - 1] =
                            formObject; // Also save form data into the drafts array
                            console.log(formData[formData.length - 1]);
                            $('#finalform').empty();
                            var formIndex = $('#finalform').closest('[id^="step"]').attr('id')
                                .replace('step', '')
                                .slice(-1);
                            var ItemData = formData[formData.length - 1];

                            var htmlContent = `
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
                                                                    <H1 class="card-text text-center text-primary">Preview Form ${formIndex}</H1>
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
                                                                    <p class="card-text">${ItemData.l_name}</p>
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
                                                                    <h5 class="card-title">Full Name</h5>
                                                                </div>
                                                                <div class="col-7">
                                                                    <input type="text" class="form-control" name="name" id="name"
                                                                    value='${ItemData.f_name} ${ItemData.l_name}'>
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
                                                                        name="email" value='${ItemData.email}'>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-5">
                                                                    <h5 class="card-title">Phone</h5>
                                                                </div>
                                                                <div class="col-7">
                                                                    <input type="tel" class="form-control" id="exampleInputNumber"
                                                                        placeholder="Enter Phone Number" name="phone" value='${ItemData.phone}'>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-5">
                                                                    <h5 class="card-title">Sex</h5>
                                                                </div>
                                                                <div class="col-7">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="sex" id="sex1"
                                                                            id="inlineRadio1" value="option1" value="Male" ${ItemData.sex==='Male' ? 'checked' : ''}>
                                                                        <label class="form-check-label" for="sex1">Male</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="sex" id="sex2"
                                                                            value="Female" ${ItemData.sex==='Female' ? 'checked':''}>
                                                                        <label class="form-check-label" for="sex2">Female</label>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-5">
                                                                    <h5 class="card-title">Birth Country</h5>
                                                                </div>
                                                                <div class="col-7">
                                                                    <select class="form-select" id="country_birth" name="country_birth" value="${ItemData.country_birth}">
                                                                        <option value="">${ItemData.country_birth}</option>`;

                                                                        countries.forEach(function(country) {
                                                                            htmlContent += `<option value="${country.id}">${country.name}</option>`;
                                                                        });

                                                                        htmlContent += `
                                                                    </select>

                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-5">
                                                                    <h5 class="card-title">Citizen Country</h5>
                                                                </div>
                                                                <div class="col-7">
                                                                    <select class="form-select" id="country" name="country" value="${ItemData.country_citizen}">
                                                                        <option value="">${ItemData.country_citizen}</option>`;

                                                                        countries.forEach(function(country) {
                                                                            htmlContent += `<option value="${country.id}">${country.name}</option>`;
                                                                        });

                                                                        htmlContent += `

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-5">
                                                                    <h5 class="card-title">Address</h5>
                                                                </div>
                                                                <div class="col-7">

                                                                    <div class="form-group mb-3">
                                                                        <label class="d-block mb-4">
                                                                            <textarea name="address" class="form-control" rows="2" placeholder="San Franscisko 7/2A Austria" value="${ItemData.address}">${ItemData.address}</textarea>
                                                                        </label>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-5">
                                                                    <h5 class="card-title">Date of Birth</h5>
                                                                </div>
                                                                <div class="col-7">
                                                                    <input    name="date" type="date" class="form-control"
                                                                        placeholder="Rahman" value="${ItemData.date}"/>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="card mt-3">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-5">
                                                                    <h5 class="card-title">Tell us more about yourself</h5>
                                                                </div>
                                                                <div class="col-7">
                                                                    <textarea name="message" class="form-control" rows="3" placeholder="What motivates you?" value="${ItemData.message}">${ItemData.message}</textarea>
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
                                                                    <select class="form-select" id="country" name="country" value="${ItemData.country_passport}">
                                                                        <option value="">${ItemData.country_passport}</option>`;

                                                                        countries.forEach(function(country) {
                                                                        htmlContent += `<option value="${country.id}">${country.name}</option>`;
                                                                        });

                                                                        htmlContent += `

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
                                                                        placeholder="Enter Passport Number" value="${ItemData.passport_num}">
                                                                    <small id="phone" class="form-text text-muted">We'll never share your
                                                                        number
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
                                                                    <input    name="date" type="date" class="form-control"
                                                                    value="${ItemData.issueDate}" />
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-5">
                                                                    <h5 class="card-title">Expiry Date</h5>
                                                                </div>
                                                                <div class="col-7">
                                                                    <input    name="date" type="date" class="form-control"
                                                                    value="${ItemData.expiryDate}" />
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-5">
                                                                    <h5 class="card-title">Intended Date</h5>
                                                                </div>
                                                                <div class="col-7">
                                                                    <input    name="date" type="date" class="form-control"
                                                                    value="${ItemData.intendDate}" />
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
                                                                    <div class="col-7">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" name="criminal" id="criminal1" value="Yes" ${ItemData.criminal ==='Yes' ? 'checked' : ''}>
                                                                            <label class="form-check-label" for="criminal1">Yes</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" name="criminal" id="criminal2" value="No" ${ItemData.criminal ==='No' ? 'checked' : ''}>
                                                                            <label class="form-check-label" for="criminal2">No</label>
                                                                        </div>
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
                                                                        <input class="form-check-input" type="radio" name="war"
                                                                            id="war1" value="Yes" ${ItemData.war ==='Yes' ? 'checked' : ''}>
                                                                        <label class="form-check-label" for="war1">Yes</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="war"
                                                                            id="war2" value="No" ${ItemData.war === 'No' ? 'checked' : ''}>
                                                                        <label class="form-check-label" for="war2">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card mt-3">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-12 text-center">
                                                                    <input type="submit" class="btn btn-primary col-12 next-btn" value="Confirm Submit" />
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
                            `;




                            $('#finalform').append(htmlContent);

                            var $form = $(this).closest('.form');
                            var formIndex = $form.attr('id').replace('form', '');
                            $form.find('.form-step').hide();
                            $('#step4' + formIndex).show();
                            $('#progressBar' + formIndex).show();
                            $form.find('.form-progress').css('width', '100%').attr('aria-valuenow',
                                100);
                            // formsFilled++;
                            // updateProgressBar();
                            // $(this).hide(); // Hide the submitted form
                            // // Show next form if available
                            // if (formsFilled < numForms) {
                            //     $('#form' + (parseInt(formIndex) + 1)).show();
                            // }
                        });
                        $('#submitAll').click(function() {
                            console.log('Submitting all forms:');
                            // console.log(formData);
                            for (var i = 0; i < formData.length; i++) {
                                var formIndex = i + 1;
                                var currentFormData = formData[i];
                                console.log('Form ' + formIndex + ' data:', currentFormData);
                                // Here you can send currentFormData to the server for further processing
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error("Error:", error);
                    }

                });

            });
        </script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script> --}}
        <script src={{ asset('assets/js/bootstrap.bundle.min.js') }}></script>
    @endpush
@endsection
