@extends('frontend.layouts.master')
@section('title', 'Appliaction Details')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/demo1/style.css') }}">
@endpush

@section('content')

    <div class="page-content mx-0 mt-5" style=" height: 60vh; overflow-x:hidden;">

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
                                </div>

                                <div class="row">

                                    {{-- Application loop --}}
                                    <div class="col-12 col-md-12 col-xl-6 ">
                                        <div class="card mt-3">
                                            <div class="card-body pe-2">
                                                <div class="d-flex justify-content-center align-items-baseline">
                                                    <h6 class="card-title mb-0 text-success">Applicaton</h6>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Visitors ID</th>
                                                                        <th>Applicant Name</th>
                                                                        <th>Status</th>
                                                                        <th>Payment Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($applications as $application)
                                                                        <tr>
                                                                            <td>
                                                                                <span>
                                                                                    <button class="btn btn-link" onclick="toggleDetails('{{ $application->id }}')">
                                                                                        {{ $application->id }}
                                                                                    </button>
                                                                                </span> -
                                                                                <span>
                                                                                    <button class="btn btn-link" onclick="toggleDetails('{{ $application->id }}')">
                                                                                        View
                                                                                    </button>
                                                                                </span>
                                                                            </td>
                                                                            <td valign='middle'>{{ $application->first_name }}</td>
                                                                            <td valign='middle'>
                                                                                @if ($application->status == 1)
                                                                                    Pending
                                                                                @elseif ($application->status == 2)
                                                                                    Processing
                                                                                @elseif ($application->status == 3)
                                                                                    Approved
                                                                                @elseif ($application->status == 4)
                                                                                    On-Hold
                                                                                @elseif ($application->status == 5)
                                                                                    Rejected
                                                                                @else
                                                                                    Unknown Status
                                                                                @endif
                                                                            </td>
                                                                            <td valign='middle'>{{ $application->is_payment ? 'Paid' : 'Unpaid' }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    @foreach ($applications as $application)
                                        <div class="col-12 col-md-6 col-xl-6" id="details-a{{ $application->id }}"
                                            style="display: {{ $loop->first ? 'block' : 'none' }};">
                                            <div class="card mt-3">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <h5 class="card-title">Reference ID:</h5>
                                                        </div>
                                                        <div class="col-7">
                                                            <p class="card-text">{{ $application->reference_id }}</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    {{-- <div class="row">
                                                        <div class="col-4">
                                                            <h5 class="card-title">Service Type</h5>
                                                        </div>
                                                        <div class="col-8">
                                                            <p class="card-text">{{ $application->service->name }}</p>
                                                        </div>
                                                    </div>
                                                    <hr> --}}
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <h5 class="card-title">Phone</h5>
                                                        </div>
                                                        <div class="col-7">
                                                            <p class="card-text">{{ $application->order->phone }}</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <h5 class="card-title">Email</h5>
                                                        </div>
                                                        <div class="col-7">
                                                            <p class="card-text">{{ $application->order->email }}</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <h5 class="card-title">Citizen Country</h5>
                                                        </div>
                                                        <div class="col-7">
                                                            <p class="card-text">{{ $application->order->citizenCountry->name }}</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <h5 class="card-title">Payment Details</h5>
                                                        </div>
                                                        <div class="col-7">
                                                            <p class="card-text">
                                                                <a href="{{ route('invoice',$application->reference_id) }}" class="btn btn-primary">Check</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <h5 class="card-title">Payment Details</h5>
                                                        </div>
                                                        <div class="col-7">
                                                            <p class="card-text">

                                                                <p class="card-text">{{ $application->created_at }}</p>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="card mt-3">
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

                                        <div class="col-12 col-md-6 col-xl-4" id="details-b{{ $application->id }}"
                                            style="display: {{ $loop->first ? 'block' : 'none' }};">

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
                                                            <p class="card-text">
                                                                <a href="{{ route('invoice',$application->reference_id) }}" class="btn btn-primary">Check</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->
    </div>
@endsection
@push('script')
    <script>
        function toggleDetails(detailsId) {
            // console.log(detailsId);
            // Select all elements with IDs starting with "details-a" or "details-b"
            var detailsBlocksA = document.querySelectorAll('[id^="details-a"]');
            var detailsBlocksB = document.querySelectorAll('[id^="details-b"]');

            // Iterate over each element and toggle its display property
            detailsBlocksA.forEach(function(detailsBlock) {
                detailsBlock.style.display =  "none";
            });

            detailsBlocksB.forEach(function(detailsBlock) {
                detailsBlock.style.display =  "none";
            });

            var detailsBlockA = document.getElementById("details-a" + detailsId);
            var detailsBlockB = document.getElementById("details-b" + detailsId);
            detailsBlockA.style.display = "block";
            detailsBlockB.style.display = "block";
        }
    </script>
@endpush
