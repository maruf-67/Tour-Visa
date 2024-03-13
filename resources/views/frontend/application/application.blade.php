@extends('frontend.layouts.master')

@section('title', 'Contact Us | PrepBook')

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
            $(document).ready(function() {
                var $numFormsInput = $('#numFormsInput');
                var $formsContainer = $('#formsContainer');
                var $progressBar = $('#progressBar');

                var numForms = 1;
                var formsFilled = 0;
                var drafts = [];

                function updateProgressBar() {
                    var completionPercentage = (formsFilled / numForms) * 100;
                    $progressBar.css('width', completionPercentage + '%').attr('aria-valuenow', completionPercentage);
                }

                function generateForm(formIndex) {
                    return `
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
                            <input type="button" class="next-step me-4 next-btn" value="Next" />
                        </div>
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
                                        <input name="date" type="date" class="form-control"
                                            placeholder="Rahman" />
                                    </label>

                                    <label class="d-block mb-4">
                                        <span class="form-label d-block">Expiry Date *</span>
                                        <input name="date" type="date" class="form-control"
                                            placeholder="Rahman" />
                                    </label>

                                    <label class="d-block mb-4">
                                        <span class="form-label d-block">Intended Date of Entry *</span>
                                        <input name="date" type="date" class="form-control"
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

                    <input type="submit" name="next-step" class="next-step me-4 next-btn" value="Next" />
                    <input type="button" name="previous-step" class="previous-step prev-btn" value="Previous" />
                </fieldset>
                    </div>
                </form>
                `;
                }

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
                    $form.find('.form-progress').css('width', '50%').attr('aria-valuenow', 50);
                });

                $(document).on('click', '.prev-btn', function() {
                    var $form = $(this).closest('.form');
                    var formIndex = $form.attr('id').replace('form', '');
                    $form.find('.form-step').hide();
                    $('#step1' + formIndex).show();
                    $('#progressBar' + formIndex).hide();
                    $form.find('.form-progress').css('width', '0%').attr('aria-valuenow', 0);
                });


                $(document).on('submit', '.form', function(event) {
                    event.preventDefault();
                    var formData = new FormData(this); // Create FormData object with the form data
                    var formIndex = $(this).attr('id').replace('form', '');
                    drafts[formIndex - 1] = formData; // Save draft data
                    formsFilled++;
                    updateProgressBar();
                    $(this).hide(); // Hide the submitted form
                    // Show next form if available
                    if (formsFilled < numForms) {
                        $('#form' + (parseInt(formIndex) + 1)).show();
                    }
                    console.log('Form ' + formIndex + ' data:', Object.fromEntries(formData.entries()));
                });

                $('#submitAll').click(function() {
                    console.log('Submitting all forms:');
                    for (var i = 0; i < drafts.length; i++) {
                        var formIndex = i + 1;
                        var formData = drafts[i];
                        console.log('Form ' + formIndex + ' data:', Object.fromEntries(formData.entries()));
                        // Here you can send formData to the server for further processing
                    }
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    @endpush
@endsection
