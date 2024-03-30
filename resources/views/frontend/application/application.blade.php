@extends('frontend.layouts.master')

{{-- @section('title', 'Contact Us | PrepBook') --}}

@push('style')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" /> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo1/style.css') }}" /> --}}

@endpush

@section('content')
<div class="container mt-5" style="overflow-x: hidden;">

        <div id="formsContainer" style="display: none;"></div>
        <div class="progress mt-4">
            <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0"
                aria-valuemax="100"></div>
        </div>


</div>

    @push('script')
        <script>
            var formData = [];
            var countries = @json($countries);
            var order = @json($order);
            var formDataArray = [];
            var $formsContainer = $('#formsContainer');
            var $progressBar = $('#progressBar');
            var totalform = order.count;
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var numForms = 1;
            var services = @json($services);

            $(document).ready(function() {

                generateForms();

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

                    var formData = new FormData(this);
                    var fileInput1 = document.getElementById('image');
                    var file1 = fileInput1.files[0];
                    formData.append('image', file1);
                    var fileInput2 = document.getElementById('passport_bio_data');
                    var file2 = fileInput2.files[0];
                    formData.append('passport_bio_data', file2);
                    formData.append('reference_id', order.reference_id);

                    // Send an AJAX request
                    $.ajax({
                        url: "{{ route('application.store') }}", // Laravel route
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken // Include CSRF token in the headers
                        },
                        success: function(response) {
                            // Handle success response
                            // ref = response.reference_id;
                            console.log(response);
                            step3load(response)

                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            console.error(xhr.responseText);
                        }
                    });

                    // });




                });




                $(document).on('submit', '#application', function(event) {
                    // console.log('working');
                    event.preventDefault();

                    var formData = {
                        "service_id": $('#service').val(),
                        "first_name": $('#first_name').val(),
                        "last_name": $('#last_name').val(),
                        "email": $('#email').val(),
                        "phone": $('#phone').val(),
                        "gender": $('input[name="sex"]:checked').val(),
                        "birth_country_id": $('#birth_country_id').val(),
                        "citizen_country_id": $('#citizen_country_id').val(),
                        "address": $('textarea[name="address"]').val(),
                        "dob": $('input[name="dob"]').val(),
                        "details": $('textarea[name="message"]').val(),
                        "passport_country_id": $('#passport_country')
                            .val(), // Note: Ensure unique IDs for country select fields
                        "passport_number": $('#passport_number')
                            .val(), // Note: Ensure unique IDs for input fields
                        "passport_issue": $('input[name="passport_issue"]')
                            .val(), // Note: Ensure unique IDs for input fields
                        "passport_expiry": $('input[name="passport_expiry"]')
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
                    if ($(this).is(":checked")) {
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
                <form class="form app" id="form${formIndex}" action="route('application.store')"  method="post" enctype="multipart/form-data">
                    @csrf
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
                        </ul>
                        <div class="progress mt-4" id="progressBar${formIndex}">
                            <div class="progress-bar form-progress" role="progressbar" style="width: 25%;" aria-valuenow="0"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div id="step1${formIndex}" class="form-step">
                        <fieldset>
                            <div class="container py-4 px-4">
                                <h1 class="text-center mb-5 text-success">Passport Information</h1>
                                <div class="row section-padding justify-content-center">
                                    <div class="col-md-12">
                                        <!-- Country names and Country Code -->
                                        <label class="d-block mb-4 ">
                                            <span class="form-label d-block">Service Type *</span>
                                            <select class="form-select" id="service" name="service_id">

                                                @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                @endforeach

                                            </select>
                                        </label>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="d-block mb-4">
                                                    <span class="form-label d-block">First Name * / Given Name</span>
                                                    <input name="first_name" type="text" class="form-control" placeholder="Mahfujur">
                                                </label>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <label class="d-block mb-4">
                                                    <span class="form-label d-block">Last Name * / Surename</span>
                                                    <input name="last_name" type="text" class="form-control" placeholder="Rahman" />
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="d-block mb-4">
                                                    <span class="form-label d-block">Date of Birth *</span>
                                                    <input name="dob" type="date" class="form-control" placeholder="Rahman" />
                                                </label>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label class="d-block mb-4">
                                                    <span class="form-label d-block">Sex *</span>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name='sex' id="sex" value="Male"
                                                            checked>
                                                        <label class="form-check-label" for="sex">Male</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="sex" id="sex2"
                                                            value="Female">
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
                                                    <select class="form-select" id="birth_country_id" name="birth_country_id">

                                                        <option value="">Enter Your Country</option>`;

                // Add options for each country
                countries.forEach(function(country) {
                    formHtml +=
                        `<option value="${country.id}">${country.name}</option>`;
                });

                formHtml += `

                                                    </select>
                                                </label>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <!-- Country names and Country Code -->
                                                <label class="d-block mb-4 ">
                                                    <span class="form-label d-block">Country of Passport *</span>
                                                    <select class="form-select" id="passport_country_id" name="passport_country_id">
                                                        <option value="">Enter Your Country</option>`;


                countries.forEach(function(country) {
                    formHtml +=
                        `<option value="${country.id}">${country.name}</option>`;
                });

                formHtml += `

                                                    </select>
                                                </label>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label for="exampleInputNumber" class="form-label">Passport Number *</label>
                                                <input type="text" class="form-control" id="exampleInputNumber" name="passport_number"
                                                    placeholder="Enter Passport Number">
                                                <small id="passno" class="form-text text-muted">We'll never share your number
                                                    with
                                                    anyone
                                                    else.</small>
                                            </div>
                                            <div class="col-md-6 col-sm-12">

                                                <label class="d-block mb-4">
                                                    <span class="form-label d-block">Intended Date of Travel *</span>
                                                    <input type="date" class="form-control" name="intended_date" placeholder="Rahman" />
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="d-block mb-4">
                                                    <span class="form-label d-block">Passport Issue Date *</span>
                                                    <input type="date" class="form-control" name="passport_issue" placeholder="Rahman" />
                                                </label>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label class="d-block mb-4">
                                                    <span class="form-label d-block">Passport Expiry Date *</span>
                                                    <input type="date" class="form-control" name="passport_expiry" placeholder="Rahman" />
                                                </label>
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
                                <h1 class="text-center mb-5 text-success">Declaration of Application</h1>
                                <div class="row section-padding justify-content-center">
                                    <div class="col-md-12">
                                        <label class="d-block mb-4 ">
                                            <span class="form-label d-block">Photograph of applicant *</span>
                                            <div class="mb-3">
                                                <input class="form-control" type="file" id="image" name="image">
                                            </div>
                                        </label>

                                        <label class="d-block mb-4 ">
                                            <span class="form-label d-block">Passport Bio Data Page *</span>
                                            <div class="mb-3">
                                                <input class="form-control" type="file" id="passport_bio_data" name"passport_bio_data">
                                            </div>
                                        </label>

                                        <div class="mb-4">
                                            <div>
                                                <div class="form-check">
                                                    <label class="d-block">
                                                        <input type="checkbox" class="form-check-input" name="remote" value="yes"
                                                            checked />
                                                        <span class="form-check-label">I declare that the information I have
                                                            given
                                                            in this application is truthful, complete and correct.</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div>
                                                <label class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="privacyPolicy" value="no" />
                                                    <span class="form-check-label">I have read and understand the <b>Terms and
                                                            conditions</b>, and the <b>Privacy Policy</b>.</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="d-block text-end">
                                            <div class="small">
                                                <a href="#" class="text-dark text-decoration-none" target="_blank">Developed By Mahfujur
                                                    Rahman</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <input type="submit" class="next-step me-4 d-none" value="Next" id="submitButton"/>
                            <input type="button" name="previous-step" class="previous-step prev-btn" value="Previous" />
                        </fieldset>
                    </div>


                </form>


                        `;
                return formHtml;
            }

            function step3load(data)
            {
                console.log(data);
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
                                <li class="active" id="step3">
                                    <strong>Step 3</strong>
                                </li>
                            </ul>
                            <div class="progress mt-4" id="progressBar${numForms}">
                                <div class="progress-bar form-progress" role="progressbar" style="width: 100%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div id="step3${numForms}" class="form-step" style="display:none;">
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
                                                                                    <p class="card-text">${data.reference_id}</p>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-4">
                                                                                    <h5 class="card-title">Service Type</h5>
                                                                                </div>
                                                                                <div class="col-8">
                                                                                    <select class="form-select" id="service" name="service_id" required> `;
                    services.forEach(function(item) {
                        if (item.id == data.service_id) {
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
                                                                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                                                                    value='${data.first_name}' required>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-5">
                                                                                    <h5 class="card-title">Last Name</h5>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                                                                    value='${data.last_name}' required>
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
                                                                                            id="inlineRadio1" value="Male" value="Male" ${data.sex==='Male' ? 'checked' : ''}>
                                                                                        <label class="form-check-label" for="sex">Male</label>
                                                                                    </div>
                                                                                    <div class="form-check form-check-inline">
                                                                                        <input class="form-check-input" type="radio" name="sex" id="sex2"
                                                                                            value="Female" ${data.sex==='Female' ? 'checked':''}>
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
                                                                                    <select class="form-select" id="birth_country_id" name="birth_country_id" value="${data.birth_country_id}" required>
                                                                                    `;


                                                                                        countries.forEach(function(item) {
                                                                                            if (item.id == data.birth_country_id) {
                                                                                                htmlContent +=
                                                                                                    `<option value="${item.id}" selected>${item.name}</option>`;
                                                                                            } else {
                                                                                                htmlContent +=
                                                                                                    `<option value="${item.id}">${item.name}</option>`;
                                                                                            }
                                                                                        });

                                                                                        htmlContent +=
                                                                                            `
                                                                                    </select>

                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-5">
                                                                                    <h5 class="card-title">Date of Birth</h5>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <input name="dob" type="date" class="form-control"
                                                                                        placeholder="Rahman" value="${data.dob}" required>
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
                                                                                    <select class="form-select" id="passport_country" name="passport_country" value="${data.passport_country_id}" required>
                                                                                       `;


                                                                                        countries.forEach(function(item) {
                                                                                            if (item.id == data.passport_country_id) {
                                                                                                htmlContent +=
                                                                                                    `<option value="${item.id}" selected>${item.name}</option>`;
                                                                                            } else {
                                                                                                htmlContent +=
                                                                                                    `<option value="${item.id}">${item.name}</option>`;
                                                                                            }
                                                                                        });

                                                                                        htmlContent +=`

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
                                                                                        placeholder="Enter Passport Number" value="${data.passport_number}" required>
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
                                                                                    <input    name="passport_issue" type="date" class="form-control"
                                                                                    value="${data.passport_issue}" required>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-5">
                                                                                    <h5 class="card-title">Expiry Date</h5>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <input    name="passport_expiry" type="date" class="form-control"
                                                                                    value="${data.passport_expiry}" required>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-5">
                                                                                    <h5 class="card-title">Intended Date</h5>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <input    name="intended_date" type="date" class="form-control"
                                                                                    value="${data.intended_date}" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="card mt-3">
                                                                        <div class="card-body">

                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-5">
                                                                                    <h5 class="card-title">Photograph of applicant</h5>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <h5 class="card-title"><img src="${data.image}" alt="" style="width:400px;"></h5>
                                                                                </div>

                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-5">
                                                                                    <h5 class="card-title">Passport Bio Data Page</h5>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <h5 class="card-title"><img src="${data.passport_bio_data}" alt="" style="width:400px;"></h5>
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

                    $('#step3' + numForms).show();
                    $('#progressBar' + numForms).show();
            }

            function generateForms() {
                console.log(numForms, totalform);
                if (numForms > totalform) {
                    var jsonData = JSON.stringify(formDataArray);

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
                            window.location.href = "{{ url('app-view') }}/" + encodeURIComponent(response
                                .reference_id);
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
