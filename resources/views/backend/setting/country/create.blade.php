





@extends('backend.layouts.master')
@section('title', 'Basic Setting')

@section('content')

    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Country Section</h4>
            </div>
            {{-- <div class="d-flex align-items-center flex-wrap text-nowrap">
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
            </div> --}}
        </div>



        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card ">
                <div class="card overflow-hidden ">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3 ">
                            <h6 class="card-title mb-0 text-primary">Add New Country</h6>

                        </div>


                        {{-- Content --}}
                        <div class="col-12 mt-4">
                            <form method="POST" action="{{ route('admin.country.store') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                    <div class="card-body">
                                    <!-- Your form fields -->

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">ISO</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="iso" name="iso" required>

                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <label class="col-md-3 col-form-label">Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <label class="col-md-3 col-form-label">Nice Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="nicename" name="nicename" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <label class="col-md-3 col-form-label">ISO3</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="iso3" name="iso3" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <label class="col-md-3 col-form-label">Number Code</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="numcode" name="numcode" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <label class="col-md-3 col-form-label">Phone Code</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="phonecode" name="phonecode" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <label class="col-md-3 col-form-label">User Role</label>
                                        <div class="col-md-9">
                                            {{-- <input type="text" class="form-control" id="staticEmail"> --}}
                                            <select class="form-control" name="type">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="d-flex justify-content-end align-items-baseline">
                                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                    <button type="button" class="btn btn-outline-primary btn-icon-text me-4 mb-2 mb-md-0">Submit </button>
                                </div>
                            </form>
                        </div>


                        {{-- Content --}}

                    </div>
                </div>
            </div>
        </div> <!-- row -->
    </div>


@endsection
