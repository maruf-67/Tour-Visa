<h2>Applicant {{ $numForms }}</h2>

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
    <div class="progress mt-4" id="progressBar{{ $numForms }}">
        <div class="progress-bar form-progress" role="progressbar" style="width: 100%;" aria-valuenow="0"
            aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div>
<div id="step3{{ $numForms }}" class="form-step">
    <fieldset id="finalform">
        <div class="page-content">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body container">
                        <form id="application" action enctype="multipart/form-data">
                            <form id="application" action="route('application.store')" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="${data.id}">
                                <div class="row">
                                    <div class="col-12 col-md-12 col-xl-12">
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <H1 class="card-text text-center" style="color:#383838">Please
                                                            review the provided information, If need any correction
                                                            please modify form below.</H1>
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
                                                        <p class="card-text">{{ $data->reference_id }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h5 class="card-title">Service Type</h5>
                                                    </div>
                                                    <div class="col-8">
                                                        <select class="form-select" id="service" name="service_id"
                                                            required>
                                                        @foreach ($services as $item)
                                                        <option value="{{ $item->id }}" {{ $data->service_id }}>{{ $item->name }}</option>
                                                        @endforeach
                                                        </select>
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
                                                        <input type="text" class="form-control" name="first_name"
                                                            id="first_name" value='{{ $data->first_name }}' required>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Last Name</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <input type="text" class="form-control" name="last_name"
                                                            id="last_name" value='{{ $data->last_name }}' required>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Sex</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="sex" id="sex" id="inlineRadio1"
                                                                value="Male" value="Male" {{ $data->sex=='Male' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="sex">Male</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="sex" id="sex2" value="Female"
                                                                {{ $data->sex=='Female' ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="sex2">Female</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Birth Country</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <select class="form-select" id="birth_country_id"
                                                            name="birth_country_id" value="{{ $data->birth_country_id }}"
                                                            required>
                                                            @foreach ($countries as $item)
                                                                <option value="{{ $item->id }}" {{ $item->id == $data->birth_country_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Date of Birth</h5>
                                                    </div>
                                                    <div class="col-7">

                                                        <input type="text" class="form-control datepicker"
                                                            name="dob" placeholder="dd/mm/yyyy"
                                                            value="{{ $data->dob }}" />
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
                                                        <select class="form-select" id="passport_country"
                                                            name="passport_country_id"
                                                           required>
                                                            @foreach ($countries as $item)
                                                            <option value="{{ $item->id }}" {{ $item->id == $data->passport_country_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                        @endforeach
                                                            </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Passport Number</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <input type="text" class="form-control"
                                                            id="passport_number" name="passport_number"
                                                            placeholder="Enter Passport Number"
                                                            value="{{ $data->passport_number }}" required>
                                                        <small id="phone" class="form-text text-muted">We'll never
                                                            share your
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

                                                        <input type="text" class="form-control datepicker"
                                                            name="passport_issue" placeholder="dd/mm/yyyy"
                                                            value="{{ $data->passport_issue }}" />
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Expiry Date</h5>
                                                    </div>
                                                    <div class="col-7">

                                                        <input type="text" class="form-control datepicker"
                                                            name="passport_expiry" placeholder="dd/mm/yyyy"
                                                            value="{{ $data->passport_expiry }}" />
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Intended Date</h5>
                                                    </div>
                                                    <div class="col-7">

                                                        <input type="text" class="form-control datepicker"
                                                            name="intended_date" placeholder="dd/mm/yyyy"
                                                            value="{{ $data->intended_date }}" />
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
                                                        <input class="form-control" type="file" id="image"
                                                            name="image">
                                                        <h5 class="card-title text-center" id="iamge2">{{ basename(asset($data->image)) }}</h5>
                                                        <h5 class="card-title"><img src="{{ asset($data->image)}}"
                                                                alt="" style="width:400px;"></h5>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Passport Bio Data Page</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <input class="form-control" type="file"
                                                            id="passport_bio_data" name="passport_bio_data">
                                                        <h5 class="card-title text-center" id="passport_bio_data2">{{ basename(asset($data->passport_bio_data)) }}</h5>
                                                        <h5 class="card-title"><img src="{{ asset($data->passport_bio_data)}}"
                                                                alt="" style="width:400px;"></h5>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <input type="submit" class="btn btn-primary col-12 next-btn"
                                                            value="Confirm Submit" />
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

<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            dateFormat: 'dd/mm/yy',
            changeMonth: true,
    changeYear: true,
    autoclose: true
        });
    });
</script>

