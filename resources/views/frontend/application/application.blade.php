@extends('frontend.layouts.master')

@section('title', 'Contact Us | PrepBook')

@push('style')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" /> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo1/style.css') }}" />
@endpush

{{-- @section('navbar')

@endsection --}}

{{-- @push('nav')
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class=" col-lg-8 col-md-8">
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
@endpush --}}

@section('content')

    <div class="container mt-5" style=" overflow-x: hidden;">

        <div class="mb-3 mt-5 generateForms">

            <fieldset>
                <div class="container mt-5 pt-4 px-4">
                    <h1 class="text-center mb-5 text-success">Application Information</h1>
                    <div class="row section-padding justify-content-center">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-6 col-sm-12">

                                    <!-- Country names and Country Code -->
                                    <label class="d-block mb-4 ">
                                        <span class="form-label d-block">Service Type *</span>
                                        <select class="form-select" id="service" name="service">

                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach

                                        </select>
                                    </label>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <!-- Country names and Country Code -->
                                    <label class="d-block mb-4 ">
                                        <span class="form-label d-block">No Off Applications *</span>
                                        <select class="form-select" id="numFormsInput" name="application_count">
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
                            </div>
                        </div>
                    </div>
                </div>
                <input id="generateForms" type="button" name="next-step" class="next-step me-4" value="Next" />
            </fieldset>
        </div>

        <div id="formsContainer" style="display: none;"></div> <!-- Initially hidden -->
        <div class="progress mt-4">
            <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>

    </div>
    @push('script')
        <script>
            var formData = [];
            var countries = @json($countries);;
            var formDataArray = [];
            var $formsContainer = $('#formsContainer');
            var $progressBar = $('#progressBar');
            var totalform = 0;

            var numForms = 1;
            var services = @json($services);

            $(document).ready(function() {

                document.getElementById("generateForms").addEventListener("click", function() {
                    totalform = parseInt($('#numFormsInput').val());
                    generateForms();
                    document.querySelector("div.generateForms").style.display = "none";
                    document.getElementById("generateForms").style.display = "none";
                });

                $(document).on('click', '.next-btn', function() {
                    var $form = $(this).closest('.form.app');
                    $form.find('.form-step').hide();
                    $('#progressbar li').removeClass('active');
                    $('#step2').addClass('active');
                    $('#step2' + numForms).show();
                    $('#progressBar' + numForms).show();
                    $form.find('.form-progress').css('width', '50%').attr('aria-valuenow',
                        33);

                });

                $(document).on('click', '.next-btn1', function() {
                    var $form = $(this).closest('.form.app');

                    $form.find('.form-step').hide();
                    $('#progressbar li').removeClass('active');
                    $('#step3').addClass('active');
                    $('#step3' + numForms).show();
                    $('#progressBar' + numForms).show();
                    $form.find('.form-progress').css('width', '75%').attr('aria-valuenow',
                        66);

                });

                $(document).on('click', '.prev-btn', function() {
                    var $form = $(this).closest('.form.app');

                    $form.find('.form-step').hide();
                    $('#progressbar li').removeClass('active');
                    $('#step1').addClass('active');
                    $('#step1' + numForms).show();
                    $('#progressBar' + numForms).show();
                    $form.find('.form-progress').css('width', '25%').attr('aria-valuenow',
                        50);
                });

                $(document).on('click', '.prev-btn1', function() {
                    var $form = $(this).closest('.form.app');

                    $form.find('.form-step').hide();
                    $('#progressbar li').removeClass('active');
                    $('#step2').addClass('active');
                    $('#step2' + numForms).show();
                    $('#progressBar' + numForms).show();
                    $form.find('.form-progress').css('width', '50%').attr('aria-valuenow',
                        0);
                });

                $(document).on('submit', '.form.app', function(event) {
                    event.preventDefault();

                    var currentFormData = new FormData(
                        this); // Create FormData object with the form data

                    var formObject = {}; // Object to store form data
                    for (var pair of currentFormData.entries()) {
                        formObject[pair[0]] = pair[
                            1]; // Store form input values with their names as keys
                    }
                    formData[numForms - 1] =
                        formObject;

                    console.log(formData[formData.length - 1]);
                    $('#finalform').empty();

                    var ItemData = formData[formData.length - 1];
                    var service = $('#service').val();
                    // var services = @json($services);


                    $formsContainer.empty();

                    var htmlContent =
                        `
                        <h2>Form ${numForms}</h2>

                        <div class="progress-container">
                            <ul id="progressbar">
                                <li id="step1">
                                    <strong>Step 1</strong>
                                </li>
                                <li id="step2">
                                    <strong>Step 2</strong>
                                </li>
                                <li id="step3">
                                    <strong>Step 3</strong>
                                </li>
                                <li class="active" id="step4">
                                    <strong>Step 4</strong>
                                </li>
                            </ul>
                            <div class="progress mt-4" id="progressBar${numForms}">
                                <div class="progress-bar form-progress" role="progressbar" style="width: 100%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div id="step4${numForms}" class="form-step" style="display:none;">
                                    <fieldset id="finalform">
                                        <div class="page-content">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body container">
                                                        <form id="application">
                                                            <div class="row">
                                                                <div class="col-12 col-md-12 col-xl-12">
                                                                    <div class="card mt-3">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <H1 class="card-text text-center text-primary">Preview Form ${numForms}</H1>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12 col-md-12 col-xl-6">
                                                                    <div class="card mt-3">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-4">
                                                                                    <h5 class="card-title">Reference Id</h5>
                                                                                </div>
                                                                                <div class="col-8">
                                                                                    <p class="card-text">Not Available</p>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-4">
                                                                                    <h5 class="card-title">Service Type</h5>
                                                                                </div>
                                                                                <div class="col-8">
                                                                                    <select class="form-select" id="service" name="service" required> `;
                                                                                        services.forEach(function(item) {
                                                                                            if (item.id == service) {
                                                                                                htmlContent +=
                                                                                                    `<option value="${item.id}" selected>${item.name}</option>`;
                                                                                            } else {
                                                                                                htmlContent +=
                                                                                                    `<option value="${item.id}">${item.name}</option>`;
                                                                                            }
                                                                                        });

                                                                                        htmlContent +=
                                                                                            `</select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="card mt-3">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-5">
                                                                                    <h5 class="card-title">First Name</h5>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <input type="text" class="form-control" name="f_name" id="f_name"
                                                                                    value='${ItemData.f_name}' required>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-5">
                                                                                    <h5 class="card-title">Last Name</h5>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <input type="text" class="form-control" name="l_name" id="l_name"
                                                                                    value='${ItemData.l_name}' required>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-5">
                                                                                    <h5 class="card-title">Email</h5>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <input type="email" class="form-control" id="email"
                                                                                        aria-describedby="emailHelp" placeholder="Enter Your Email Here"
                                                                                        name="email" value='${ItemData.email}' required>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-5">
                                                                                    <h5 class="card-title">Phone</h5>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <input type="text" class="form-control" id="phone"
                                                                                        placeholder="Enter Phone Number" name="phone" value='${ItemData.phone}' required>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-5">
                                                                                    <h5 class="card-title">Sex</h5>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <div class="form-check form-check-inline">
                                                                                        <input class="form-check-input" type="radio" name="sex" id="sex"
                                                                                            id="inlineRadio1" value="Male" value="Male" ${ItemData.sex==='Male' ? 'checked' : ''}>
                                                                                        <label class="form-check-label" for="sex">Male</label>
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
                                                                                    <select class="form-select" id="country_birth" name="country_birth" value="${ItemData.country_birth}" required>
                                                                                        <option value="">${ItemData.country_birth}</option>`;

                                                                                            countries.forEach(function(country) {
                                                                                                htmlContent +=
                                                                                                    `<option value="${country.id}">${country.name}</option>`;
                                                                                            });

                                                                                            htmlContent +=
                                                                                                `
                                                                                    </select>

                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-5">
                                                                                    <h5 class="card-title">Citizen Country</h5>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <select class="form-select" id="country_citizen" name="country_citizen" value="${ItemData.country_citizen}" required>
                                                                                        <option value="">${ItemData.country_citizen}</option>`;

                                                                                            countries.forEach(function(country) {
                                                                                                htmlContent +=
                                                                                                    `<option value="${country.id}">${country.name}</option>`;
                                                                                            });

                                                                                            htmlContent +=
                        `

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
                                                                                            <textarea name="address" class="form-control" rows="2" placeholder="San Franscisko 7/2A Austria" value="${ItemData.address}" required>${ItemData.address}</textarea>
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
                                                                                    <input name="date" type="date" class="form-control"
                                                                                        placeholder="Rahman" value="${ItemData.date}" required>
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

                                                                <div class="col-12 col-md-12 col-xl-6">

                                                                    <div class="card mt-3">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-5">
                                                                                    <h5 class="card-title">Passport Country</h5>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <select class="form-select" id="passport_country" name="passport_country" value="${ItemData.country_passport}" required>
                                                                                        <option value="">${ItemData.country_passport}</option>`;

                                                                                            countries.forEach(function(country) {

                                                                                                htmlContent +=
                                                                                                    `<option value="${country.id}">${country.name}</option>`;
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
                                                                                    <input type="text" class="form-control" id="passport_number"
                                                                                        placeholder="Enter Passport Number" value="${ItemData.passport_num}" required>
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
                                                                                    <input    name="issue_date" type="date" class="form-control"
                                                                                    value="${ItemData.issueDate}" required>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-5">
                                                                                    <h5 class="card-title">Expiry Date</h5>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <input    name="expiry_date" type="date" class="form-control"
                                                                                    value="${ItemData.expiryDate}" required>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-5">
                                                                                    <h5 class="card-title">Intended Date</h5>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <input    name="intended_date" type="date" class="form-control"
                                                                                    value="${ItemData.intendDate}" required>
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
                                                                                            <input class="form-check-input" type="radio" name="criminal" id="criminal1" value="1" ${ItemData.criminal ==='Yes' ? 'checked' : ''}>
                                                                                            <label class="form-check-label" for="criminal1">Yes</label>
                                                                                        </div>
                                                                                        <div class="form-check form-check-inline">
                                                                                            <input class="form-check-input" type="radio" name="criminal" id="criminal2" value="0" ${ItemData.criminal ==='No' ? 'checked' : ''}>
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
                                                                                            id="war1" value="1" ${ItemData.war ==='Yes' ? 'checked' : ''}>
                                                                                        <label class="form-check-label" for="war1">Yes</label>
                                                                                    </div>
                                                                                    <div class="form-check form-check-inline">
                                                                                        <input class="form-check-input" type="radio" name="war"
                                                                                            id="war2" value="0" ${ItemData.war === 'No' ? 'checked' : ''}>
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
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            </fieldset>
                                        </div>
                                `;

                    $formsContainer.append(htmlContent);

                    var $form = $(this).closest('.form.app');

                    $('#step4' + numForms).show();
                    $('#progressBar' + numForms).show();


                });



                $(document).on('submit', '#application', function(event) {
                    // console.log('working');
                    event.preventDefault();

                    var formData = {
                        "service_id": $('#service').val(),
                        "first_name": $('#f_name').val(),
                        "last_name": $('#l_name').val(),
                        "email": $('#email').val(),
                        "phone": $('#phone').val(),
                        "gender": $('input[name="sex"]:checked').val(),
                        "birth_country_id": $('#country_birth').val(),
                        "citizen_country_id": $('#country_citizen').val(),
                        "address": $('textarea[name="address"]').val(),
                        "dob": $('input[name="date"]').val(),
                        "details": $('textarea[name="message"]').val(),
                        "passport_country_id": $('#passport_country')
                            .val(), // Note: Ensure unique IDs for country select fields
                        "passport_number": $('#passport_number')
                            .val(), // Note: Ensure unique IDs for input fields
                        "passport_issue": $('input[name="issue_date"]')
                            .val(), // Note: Ensure unique IDs for input fields
                        "passport_expiry": $('input[name="expiry_date"]')
                            .val(), // Note: Ensure unique IDs for input fields
                        "intended_date": $('input[name="intended_date"]')
                            .val(), // Note: Ensure unique IDs for input fields
                        "is_criminal_record": $('input[name="criminal"]:checked').val(),
                        "is_war_crime": $('input[name="war"]:checked').val()
                    };

                    formDataArray.push(formData);
                    numForms++;
                    generateForms();

                });

                $(document).on('change', '#privacyPolicy', function() {
                // $('#privacyPolicy').change(function() {
                if($(this).is(":checked")) {
                    $('#submitButton').removeClass('d-none');
                } else {
                    $('#submitButton').addClass('d-none');
                }
            });


            });

            function updateProgressBar() {
                var completionPercentage = (numForms / totalform) * 100;
                $progressBar.css('width', completionPercentage + '%').attr('aria-valuenow',
                    completionPercentage);
            }

            function generateForm(formIndex) {

                // console.log(formIndex);
                let formHtml = `
                        <form class="form app" id="form${formIndex}">
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
                                <div class="progress-bar form-progress" role="progressbar" style="width: 25%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
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
                                                            placeholder="Mahfujur">
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
                                                            <input class="form-check-input" type="radio" name='sex' id="sex" value="Male" checked>
                                                            <label class="form-check-label" for="sex">Male</label>
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
                                                                formHtml +=
                                                                    `<option value="${country.name}">${country.name}</option>`;
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
                                                                    formHtml +=
                                                                        `<option value="${country.name}">${country.name}</option>`;
                                                                });

                                                                formHtml += `

                                                        </select>
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Email address *</label>
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
                                                        <label for="exampleInputNumber" class="form-label">Phone Number *</label>
                                                        <input type="tel" class="form-control" id="exampleInputNumber"
                                                            placeholder="Enter Phone Number" name="phone">
                                                        <small id="phoneno" class="form-text text-muted">We'll never share your
                                                            number with anyone else.</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group mb-3">
                                                        <label class="d-block mb-4">
                                                            <span class="form-label d-block">Address *</span>
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
                                                            formHtml +=
                                                                `<option value="${country.name}">${country.name}</option>`;
                                                        });

                                                        formHtml += `

                                                </select>
                                            </label>

                                            <div class="form-group mb-3">
                                                <label for="exampleInputNumber" class="form-label">Passport Number *</label>
                                                <input type="text" class="form-control" id="exampleInputNumber" name="passport_num"
                                                    placeholder="Enter Passport Number">
                                                <small id="passno" class="form-text text-muted">We'll never share your number
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
                                                    <input class="form-check-input" type="radio" name="criminal" id="criminal2" value="No" checked>
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
                                                        id="war2" value="No" checked>
                                                    <label class="form-check-label" for="war2" >No</label>
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
                                                    <input type="checkbox" class="form-check-input" id="privacyPolicy" value="no" />
                                                    <span class="form-check-label">I have read and understand the <b>Terms and conditions</b>, and the <b>Privacy Policy</b>.</span>
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


                                <div class="button-container mt-3">
                                <input type="submit" class="next-step me-4 d-none" value="Next" id="submitButton"/>
                                <input type="button" name="previous-step" class="previous-step prev-btn1" value="Previous " />
                            </div>
                            </fieldset>
                        </div>
                        </form>

                        `;
                return formHtml;
            }

            function generateForms() {
                console.log(numForms, totalform);
                if (numForms > totalform) {
                    var jsonData = JSON.stringify(formDataArray);
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    // Send the JSON data using jQuery AJAX
                    $.ajax({
                        url: "{{ route('application.store') }}", // Laravel route
                        type: "POST",
                        data: jsonData, // Send JSON data
                        contentType: "application/json",
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': csrfToken // Include CSRF token in the headers
                        },
                        success: function(response) {
                            // Handle success response
                            // ref = response.reference_id;
                            console.log(response);
                            window.location.href = "{{ url('app-view') }}/" + encodeURIComponent(response.reference_id);
                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $formsContainer.empty();
                    // drafts = []; // Reset drafts when generating new forms
                    $formsContainer.append(generateForm(numForms, countries));
                    $formsContainer.show();
                    // formsFilled = 0; // Reset formsFilled when generating new forms
                    updateProgressBar();
                }

            }
        </script>
    @endpush
@endsection
