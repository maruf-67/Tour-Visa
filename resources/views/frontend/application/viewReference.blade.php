@extends('frontend.layouts.master')
@section('title', 'Appliaction Details')

@push("style")
<link rel="stylesheet" href="{{ asset('css/demo1/style.css') }}">
@endpush

@section('content')

    <div class="page-content mx-5 mt-5">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Reference</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">
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

                                    <div class="col-5 col-md-10 col-xl-5">
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h5 class="card-title">Reference ID:</h5>
                                                    </div>
                                                    <div class="col-8">
                                                        {{-- <p class="card-text">{{ $application->reference_id }}</p> --}}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h5 class="card-title">Service Type</h5>
                                                    </div>
                                                    <div class="col-8">
                                                        {{-- <p class="card-text">{{ $application->service->name }}</p> --}}
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
                                                        {{-- <p class="card-text">{{ $application->first_name }} {{ $application->last_name }}<h5 class="card-title"></h5> --}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Email</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        {{-- <p class="card-text">{{ $application->email }}</p> --}}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Phone</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        {{-- <p class="card-text">{{ $application->phone }}</p> --}}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Sex</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        {{-- <p class="card-text">{{ $application->gender }}</p> --}}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Birth Country</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        {{-- <p class="card-text">{{ $application->birthCountry->name }}</p> --}}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Citizen Country</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        {{-- <p class="card-text">{{ $application->citizenCountry->name }}</p> --}}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Address</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        {{-- <p class="card-text">{{ $application->address }}</p> --}}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Date of Birth</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        {{-- <p class="card-text">{{ $application->dob }}</p> --}}
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
                                                        {{-- <p class="card-text">{{ $application->details }}</p> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-5 col-md-10 col-xl-5">

                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Passport Country</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        {{-- <p class="card-text">{{ $application->passportCountry->name }}</p> --}}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Passport Number</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        {{-- <p class="card-text">{{ $application->passport_number }}</p> --}}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Issue Date</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        {{-- <p class="card-text">{{ $application->passport_issue }}</p> --}}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Expiry Date</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        {{-- <p class="card-text">{{ $application->passport_expiry }}</p> --}}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Intended Date</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        {{-- <p class="card-text">{{ $application->intended_date }}</p> --}}
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
                                                        {{-- <p class="card-text">{{ $application->is_criminal_record==1 ? 'Yes' : 'No' }}</p> --}}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">War Crime</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        {{-- <p class="card-text">{{ $application->is_war_crime==1 ? 'Yes' : 'No' }}</p> --}}
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
                                                        {{-- <p class="card-text">{{ $application->is_payment==1 ? 'Paid' : 'Unpaid' }}</p> --}}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h5 class="card-title">Payment Details</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        {{-- <p class="card-text"><button class="btn btn-primary">Check</button></p> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-2 col-md-2 col-xl-2">
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-baseline">
                                                    <h6 class="card-title mb-0">Applicaton</h6>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 col-md-12 col-xl-7">
                                                        <div class="d-flex align-items-baseline">
                                                            <p class="text-success">
                                                                <span>Visitors ID</span>
                                                                <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                                                            </p>
                                                        </div>
                                                        {{-- <h3 class="mb-2 text-end">{{ $application->id }}</h3> --}}
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
