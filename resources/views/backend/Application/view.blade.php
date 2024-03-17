@extends('backend.layouts.master')
@section('title', 'Basic Setting')

@section('content')

    {{-- <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Admin User</h4>
            </div>

        </div>



        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card ">
                <div class="card overflow-hidden ">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3 ">
                            <h6 class="card-title mb-0 text-primary">Approved Application View</h6>
                            <div class="dropdown">
                                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

                            </div>
                        </div>


                        <div class="container">
                            <form>
                              <div class="row g-3">
                                <div class="col-md-6">
                                  <label for="#" class="form-label">#</label>
                                  <input type="text" class="form-control" id="#" name="#">
                                </div>
                                <div class="col-md-6">
                                  <label for="name" class="form-label">Name</label>
                                  <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="col-md-6">
                                  <label for="service" class="form-label">Service</label>
                                  <input type="text" class="form-control" id="service" name="service">
                                </div>
                                <div class="col-md-6">
                                  <label for="noofVisitor" class="form-label">NoofVisitor</label>
                                  <input type="text" class="form-control" id="noofVisitor" name="noofVisitor">
                                </div>
                                <div class="col-md-6">
                                  <label for="dob" class="form-label">DOB</label>
                                  <input type="date" class="form-control" id="dob" name="dob">
                                </div>
                                <div class="col-md-6">
                                  <label for="sex" class="form-label">Sex</label>
                                  <select class="form-select" id="sex" name="sex">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                  </select>
                                </div>
                                <div class="col-md-6">
                                  <label for="birth_country" class="form-label">Birth Country</label>
                                  <input type="text" class="form-control" id="birth_country" name="birth_country">
                                </div>
                                <div class="col-md-6">
                                  <label for="citizen_country" class="form-label">Citizen Country</label>
                                  <input type="text" class="form-control" id="citizen_country" name="citizen_country">
                                </div>
                                <div class="col-md-6">
                                  <label for="email" class="form-label">Email</label>
                                  <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="col-md-6">
                                  <label for="phone" class="form-label">Phone</label>
                                  <input type="tel" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="col-md-6">
                                  <label for="about_urself" class="form-label">About Yourself</label>
                                  <textarea class="form-control" id="about_urself" name="about_urself"></textarea>
                                </div>
                                <div class="col-md-6">
                                  <label for="countryOfPassport" class="form-label">Country of Passport</label>
                                  <input type="text" class="form-control" id="countryOfPassport" name="countryOfPassport">
                                </div>
                                <div class="col-md-6">
                                  <label for="passportNum" class="form-label">Passport Number</label>
                                  <input type="text" class="form-control" id="passportNum" name="passportNum">
                                </div>
                                <div class="col-md-6">
                                  <label for="issueDate" class="form-label">Issue Date</label>
                                  <input type="date" class="form-control" id="issueDate" name="issueDate">
                                </div>
                                <div class="col-md-6">
                                  <label for="expiryDate" class="form-label">Expiry Date</label>
                                  <input type="date" class="form-control" id="expiryDate" name="expiryDate">
                                </div>
                                <div class="col-md-6">
                                  <label for="intendedDate" class="form-label">Intended Date</label>
                                  <input type="date" class="form-control" id="intendedDate" name="intendedDate">
                                </div>
                                <div class="col-md-6">
                                  <label for="criminal" class="form-label">Criminal</label>
                                  <input type="text" class="form-control" id="criminal" name="criminal">
                                </div>
                                <div class="col-md-6">
                                  <label for="warCrime" class="form-label">War Crime</label>
                                  <input type="text" class="form-control" id="warCrime" name="warCrime">
                                </div>
                                <div class="col-md-6">
                                  <label for="createdDate" class="form-label">Created Date</label>
                                  <input type="date" class="form-control" id="createdDate" name="createdDate">
                                </div>
                                <div class="col-md-6">
                                  <label for="action" class="form-label">Action</label>
                                  <input type="text" class="form-control" id="action" name="action">
                                </div>
                              </div>
                              <div class="row g-3">
                                <div class="col-12">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                              </div>
                            </form>
                          </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div>
    </div> --}}




    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                    <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i
                            data-feather="calendar" class="text-primary"></i></span>
                    <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date"
                        data-input>
                </div>
                <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="printer"></i>
                    Print
                </button>
                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                    Download Report
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">
                    <div class="col-md-2 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Applicaton</h6>
                                    <div class="dropdown mb-2">
                                        <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="eye" class="icon-sm me-2"></i> <span
                                                    class="">View</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                    class="">Edit</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="trash" class="icon-sm me-2"></i> <span
                                                    class="">Delete</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="printer" class="icon-sm me-2"></i> <span
                                                    class="">Print</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="download" class="icon-sm me-2"></i> <span
                                                    class="">Download</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- <div class="col-6 col-md-12 col-xl-5">
                                        <div class="d-flex align-items-baseline">
                                            <p class="text-success">
                                                <span>Visitors</span>
                                                <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                                            </p>
                                        </div>
                                        <h3 class="mb-2 text-end">1</h3>
                                    </div> --}}
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div class="d-flex align-items-baseline">
                                            <p class="text-success">
                                                <span>Visitors ID</span>
                                                <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                                            </p>
                                        </div>
                                        <h3 class="mb-2 text-end">{{ $application->id }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Update Personal Information</h6>
                                    <div class="dropdown mb-2">
                                        <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="eye" class="icon-sm me-2"></i> <span
                                                    class="">View</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                    class="">Edit</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="trash" class="icon-sm me-2"></i> <span
                                                    class="">Delete</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="printer" class="icon-sm me-2"></i> <span
                                                    class="">Print</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="download" class="icon-sm me-2"></i> <span
                                                    class="">Download</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-12 col-xl-12">
                                        <form action="{{ route('admin.application.update', ['id' => $application->id]) }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <div class="form-group row mt-4 {{ $errors->has('service_id') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 col-form-label">Service Type</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="service_id">
                                                        @foreach ($services as $service)
                                                            <option value="{{ $service->id }}" {{ $application->service_id == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                                                        @endforeach
                                                    </select>

                                                        {!! $errors->first('service_id', '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="form-group row mt-4 {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 col-form-label">First Name</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="first_name" class="form-control" value="{{ $application->first_name }}">
                                                        {!! $errors->first('first_name', '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="form-group row mt-4 {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 col-form-label">Last Name</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="last_name" class="form-control" value="{{ $application->last_name }}">
                                                        {!! $errors->first('last_name', '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="form-group row mt-4 {{ $errors->has('phone') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 col-form-label">Phone</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="phone" class="form-control" value="{{ $application->phone }}">
                                                        {!! $errors->first('phone', '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="form-group row mt-4 {{ $errors->has('email') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 col-form-label">Email</label>
                                                    <div class="col-md-9">
                                                        <input type="email" name="email" class="form-control" value="{{ $application->email }}">
                                                        {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3"></div>
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary">Update Information</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Application Change</h6>
                                    <div class="dropdown mb-2">
                                        <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="eye" class="icon-sm me-2"></i> <span
                                                    class="">View</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                    class="">Edit</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="trash" class="icon-sm me-2"></i> <span
                                                    class="">Delete</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="printer" class="icon-sm me-2"></i> <span
                                                    class="">Print</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="download" class="icon-sm me-2"></i> <span
                                                    class="">Download</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-12 col-xl-12">
                                        <form action="{{ route('admin.application.update', ['id' => $application->id]) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <div
                                                    class="form-group row mt-4 {{ $errors->has('is_payment') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 col-form-label">Payment Status</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="is_payment">
                                                            <option value="1" {{ isset($application->is_payment) && $application->is_payment == 1 ? 'selected' : '' }}>Paid</option>
                                                            <option value="0" {{ isset($application->is_payment) && $application->is_payment == 0 ? 'selected' : '' }}>Unpaid</option>

                                                        </select>
                                                        {!! $errors->first('is_payment', '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-group row mt-4 {{ $errors->has('status') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 col-form-label">Application Status</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="status">
                                                            <option value="1" {{ isset($application->status) && $application->status == 1 ? 'selected' : '' }}>Pending</option>
                                                            <option value="2" {{ isset($application->status) && $application->status == 2 ? 'selected' : '' }}>Processing</option>
                                                            <option value="3" {{ isset($application->status) && $application->status == 3 ? 'selected' : '' }}>Approved</option>
                                                            <option value="4" {{ isset($application->status) && $application->status == 4 ? 'selected' : '' }}>On-Hold</option>
                                                            <option value="5" {{ isset($application->status) && $application->status == 5 ? 'selected' : '' }}>Rejected</option>

                                                        </select>
                                                        {!! $errors->first('status', '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div
                                                    class="form-group row mt-4 {{ $errors->has('visa_image)') ? 'has-error' : '' }}">
                                                    <div class="col-md-12">
                                                        <label class="col-form-label">Upload Application Visa File</label>
                                                        <input type="file" class="form-control" id="visa_image"
                                                            name="visa_image">
                                                        @if($application->visa_image)
                                                        <img src="{{ asset($application->visa_image) }}" alt="visa-image" width="150px">
                                                        @endif
                                                        {!! $errors->first('visa_image', '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3"></div>
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary">Change</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Personal Details</h6>
                                    <div class="dropdown mb-2">
                                        <a type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="eye" class="icon-sm me-2"></i> <span
                                                    class="">View</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                    class="">Edit</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="trash" class="icon-sm me-2"></i> <span
                                                    class="">Delete</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="printer" class="icon-sm me-2"></i> <span
                                                    class="">Print</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="download" class="icon-sm me-2"></i> <span
                                                    class="">Download</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-6 col-md-12 col-xl-6">
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h5 class="card-title">Reference ID:</h5>
                                                    </div>
                                                    <div class="col-8">
                                                        <p class="card-text">{{ $application->reference_id }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h5 class="card-title">Service Type</h5>
                                                    </div>
                                                    <div class="col-8">
                                                        <p class="card-text">{{ $application->service->name }}</p>
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
                                                        <p class="card-text">{{ $application->first_name }} {{ $application->last_name }}<h5 class="card-title"></h5>
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Email</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <p class="card-text">{{ $application->email }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Phone</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <p class="card-text">{{ $application->phone }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Sex</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <p class="card-text">{{ $application->gender }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Birth Country</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <p class="card-text">{{ $application->birthCountry->name }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Citizen Country</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <p class="card-text">{{ $application->citizenCountry->name }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Address</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <p class="card-text">{{ $application->address }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Date of Birth</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <p class="card-text">{{ $application->dob }}</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h5 class="card-title">Details</h5>
                                                    </div>
                                                    <div class="col-8">
                                                        <p class="card-text">{{ $application->details }}</p>
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
                                                        <p class="card-text">{{ $application->passportCountry->name }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Passport Number</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <p class="card-text">{{ $application->passport_number }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Issue Date</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <p class="card-text">{{ $application->passport_issue }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Expiry Date</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <p class="card-text">{{ $application->passport_expiry }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Intended Date</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <p class="card-text">{{ $application->intended_date }}</p>
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
                                                        <p class="card-text">{{ $application->is_criminal_record==1 ? 'Yes' : 'No' }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">War Crime</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <p class="card-text">{{ $application->is_war_crime==1 ? 'Yes' : 'No' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Payment Status</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <p class="card-text">{{ $application->is_payment==1 ? 'Paid' : 'Unpaid' }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Payment Details</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <p class="card-text"><button class="btn btn-primary">Check</button></p>
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
