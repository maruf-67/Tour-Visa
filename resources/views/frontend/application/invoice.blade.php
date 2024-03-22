@extends('frontend.layouts.master')

@section('title', 'Contact Us | PrepBook')

@push('style')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" /> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo1/style.css') }}" />
@endpush

@section('navbar')

@endsection

@push('nav')
    <div class="sub-header">
        <div class="container mt-5">
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

@section('content')<div class="row">
        <div class="col-md-12">
            <div class="card p-5 m-5" style="height: 90vh">
                <div class="card-body">
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-3 ps-0">
                            <a href="#" ><img src="{{ asset($homedata->logo) }}" alt="Logo" style="width:80px;"/></a>

                        </div>

                        <div class="col-lg-3 pe-0">
                            <h4 class="fw-bolder text-uppercase text-end mt-4 mb-2">invoice</h4>
                            <h6 class="text-end mb-5 pb-4"># INV-002308</h6>
                            <h6 class="mb-0 mt-3 text-end fw-normal mb-2"><span class="text-muted">Invoice Date :</span>
                                {{ date('Y-m-d H:i:s') }}</h6>
                            {{-- <h6 class="text-end fw-normal"><span class="text-muted">Due Date :</span> 12th Jul 2022</h6> --}}
                        </div>
                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                        <div class="table-responsive w-100">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Reference No</th>
                                        <th class="text-end">Applicant Name</th>
                                        <th class="text-end">Passport Number</th>
                                        <th class="text-end">Service Name</th>
                                        <th class="text-end">Unit cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($applications as $application)
                                    <tr class="text-end">
                                        <td class="text-start"> {{ $loop->index + 1 }} </td>
                                        <td class="text-start">{{ $application->id }}</td>
                                        <td class="text-start">{{ $application->first_name }} {{ $application->last_name }}</td>
                                        <td>{{ $application->passport_number }}</td>
                                        <td>{{ $application->service->name }}</td>
                                        <td>{{ $application->service->price }}</td>
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
                                                <td class="text-bold-800 text-end"> <div id="totalPrice"></div> </td>
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
                    <div class="container-fluid w-100">
                        <a href="javascript:;" class="btn btn-primary float-end mt-4 ms-2"><i data-feather="send"
                                class="me-3 icon-md"></i>Send Invoice</a>
                        <a href="javascript:;" class="btn btn-outline-primary float-end mt-4"><i data-feather="printer"
                                class="me-2 icon-md"></i>Print</a>
                    </div>
                </div>
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
</script>
