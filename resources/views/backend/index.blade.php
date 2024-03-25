@extends('backend.layouts.master')
@section('title', 'Tour-Visa')

@section('content')

    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
            </div>
        </div>

        <div class="row">
            <div class="card mb-3">
                <h2> Services</h2>
                <div class="d-flex justify-content-start align-items-center flex-wrap grid-margin">
                    @foreach ($services as $service)
                        <div class="col-xl-3 col-sm-6 col-12 p-3 ">
                            <a href="{{ route('admin.service.service', $service->id) }}">
                                <div class="card mini-stat bg-primary">
                                    <div class="card-body mini-stat-img">
                                        <div class="mini-stat-icon">
                                            {{-- <i class="mdi mdi-cart-arrow-right float-end"></i> --}}
                                        </div>
                                        <div class="text-white">
                                            <h6 class="text-uppercase mb-3 font-size-16 text-white">{{ $service->name }}
                                                Applications</h6>
                                            <h2 class="mb-4 text-white">{{ $service->applications_count }}</h2>
                                        </div>
                                        <i class="me-2 icon-md" data-feather="arrow-right-circle"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card mb-3">
                <h2> Application Data Filter</h2>
                <div class="d-flex justify-content-start align-items-center flex-wrap grid-margin mt-3 ">

                    <div class="col-xl-3 col-sm-6 col-12 p-3 ">
                        <a href="{{ route('admin.application.today') }}">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        {{-- <i class="mdi mdi-cart-arrow-right float-end"></i> --}}

                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16 text-white">
                                            {{-- {{ $todaysOrderCount->name }} --}}
                                            Todays Application</h6>
                                        <h2 class="mb-4 text-white">{{ $todaysOrderCount }}</h2>
                                    </div>
                                    <i class="me-2 icon-md" data-feather="arrow-right-circle"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12 p-3 ">
                        <a href="{{ route('admin.application.last_week') }}">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        {{-- <i class="mdi mdi-cart-arrow-right float-end"></i> --}}

                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16 text-white">
                                            {{-- {{ $todaysOrderCount->name }} --}}
                                            Weekly Applications</h6>
                                        <h2 class="mb-4 text-white">{{ $lastWeekOrderCount }}</h2>
                                    </div>
                                    <i class="me-2 icon-md" data-feather="arrow-right-circle"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 p-3 ">
                        <a href="{{ route('admin.application.last_month') }}">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        {{-- <i class="mdi mdi-cart-arrow-right float-end"></i> --}}

                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16 text-white">
                                            {{-- {{ $todaysOrderCount->name }} --}}
                                            Monthly Applications</h6>
                                        <h2 class="mb-4 text-white">{{ $lastMonthOrderCount }}</h2>
                                    </div>
                                    <i class="me-2 icon-md" data-feather="arrow-right-circle"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 p-3 ">
                        <a href="{{ route('admin.application.last_year') }}">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        {{-- <i class="mdi mdi-cart-arrow-right float-end"></i> --}}

                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16 text-white">
                                            {{-- {{ $todaysOrderCount->name }} --}}
                                            Yearly Applications</h6>
                                        <h2 class="mb-4 text-white">{{ $lastYearOrderCount }}</h2>
                                    </div>
                                    <i class="me-2 icon-md" data-feather="arrow-right-circle"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>







@endsection
