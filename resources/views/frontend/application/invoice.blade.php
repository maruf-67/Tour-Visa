@extends('frontend.layouts.master')

@section('title', 'Contact Us | PrepBook')

@push('style')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" /> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo1/style.css') }}" />
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
@endpush

@section('navbar')

@endsection

@push('nav')
<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('application') }}" class="logo mt-3">
                        @if (isset($homedata->logo))
                            <h1><img src="{{ asset($homedata->logo) }}" alt="TourVisa" style="width:50px"></h1>
                        @else
                            <h1>TourVisa</h1>
                        @endif
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="text-primary"><a href="{{ route('application_view') }}"><i class="fa fa-calendar"></i>Check Status</a>
                        </li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card p-5 m-5" style="height: 90vh">
                <div class="card-body">
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-6 col-8 pe-0">
                            <h4 class="fw-bolder text-uppercase text-start mt-4 mb-2">invoice</h4>
                            <p class="text-start "><b>Reference :</b> {{ $applications->first()->reference_id }}</p>
                            <p class="text-start "><b>Name :</b> {{ $applications->first()->first_name }}
                                {{ $applications->first()->last_name }}</p>
                            <p class="text-start "><b>Email :</b> {{ $applications->first()->email }}</p>
                            <p class="text-start "><b>Transaction Id :</b> {{ $applications->first()->transaction->transaction_id }}
                            </p>
                            <p class="text-start"><b>Transaction Time :</b>
                                {{ $applications->first()->transaction->created_at }}</p>
                            {{-- @foreach ($applications as $application)
                                 {{ $application->reference_id }}
                            @break

                            <!-- Stop the loop after printing the first reference_id -->
                        @endforeach --}}

                        <p class="mb-0 text-start fw-normal mb-2"><span><b>Invoice Date :</b></span>
                                {{ date('Y-m-d H:i:s') }}</p>
                            {{-- <h6 class="text-end fw-normal"><span class="text-muted">Due Date :</span> 12th Jul 2022</h6> --}}
                        </div>

                        <div class="col-lg-6 col-2 ps-0 text-end">
                            <a href="#"><img src="{{ asset($homedata->logo) }}" alt="Logo" style="width:80px;" /></a>
                        </div>

                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                        <div class="table-responsive w-100">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Reference No</th>
                                        <th>Applicant Name</th>
                                        <th>Passport Number</th>
                                        <th>Service Name</th>
                                        <th>Unit cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($applications as $application)
                                        <tr class="text-center">
                                            <td> {{ $loop->index + 1 }} </td>
                                            <td>{{ $application->id }}</td>
                                            <td>{{ $application->first_name }} {{ $application->last_name }}</td>
                                            <td>{{ $application->passport_number }}</td>
                                            <td>{{ $application->service->name }}</td>
                                            <td class="price">{{ $application->service->price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="container-fluid mt-5 w-100">
                        <div class="row">
                            <div class="col-md-6 ms-auto">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            {{-- <tr>
                                                <td>Sub Total</td>
                                                <td class="text-end">$ 14,900.00</td>
                                            </tr>
                                            <tr>
                                                <td>TAX (12%)</td>
                                                <td class="text-end">$ 1,788.00</td>
                                            </tr> --}}
                                            <tr>
                                                <td class="text-bold-800">Total</td>
                                                <td class="text-bold-800 text-end">
                                                    <div id="totalPrice"></div>
                                                </td>
                                            </tr>
                                            {{-- <tr>
                                                <td>Payment Made</td>
                                                <td class="text-danger text-end">(-) $ 4,688.00</td>
                                            </tr>
                                            <tr class="bg-light">
                                                <td class="text-bold-800">Balance Due</td>
                                                <td class="text-bold-800 text-end">$ 12,000.00</td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="container-fluid w-100">
                        <a href="javascript:;" class="btn btn-primary float-end mt-4 ms-2"><i data-feather="send"
                                class="me-3 icon-md"></i>Send Invoice</a>
                        <a href="javascript:;" onclick="printInvoice()" class="btn btn-outline-primary float-end mt-4"><i
                                data-feather="printer" class="me-2 icon-md"></i>Print</a>
                    </div> --}}
                </div>
            </div>
        </div>

    @endsection

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // JavaScript to calculate and display total price
            var applications = @json($applications); // Convert PHP array to JavaScript array

            function calculateSum() {
                var sum = 0;
                for (var i = 0; i < applications.length; i++) {
                    sum += parseFloat(applications[i].service.price);
                }
                return sum;
            }

            // Call the function to get the sum
            var totalPrice = calculateSum();

            // Display total price in the div element
            document.getElementById('totalPrice').textContent = ' $' + totalPrice;
        });

        function printInvoice() {
            var buttons = document.getElementsByClassName('btn');
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].style.display = 'none';
            }

            window.print();
        }
    </script>
