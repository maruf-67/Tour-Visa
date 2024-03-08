@extends('backend.layouts.master')
@section('title', 'Basic Setting')

@section('content')

    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Password Section</h4>
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
                            <h6 class="card-title mb-0 text-primary">Change Password</h6>
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

                        </div>


                        {{-- Content --}}
                        <div class="col-12 ">
                            <form method="POST" action="#" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                {{-- {{ csrf_field() }} --}}
                                @csrf
                                    <div class="card-body">
                                    <!-- Your form fields -->

                                    <div class="form-group row mt-4">
                                        <label class="col-md-3 col-form-label">Old Password</label>
                                        <div class="col-md-9">
                                            <input type="password" name="old_password" class="form-control" id="staticEmail" placeholder="Enter Old password">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <label class="col-md-3 col-form-label">New Password</label>
                                        <div class="col-md-9">
                                            <input type="password" name="new_password" class="form-control" id="staticEmail" placeholder="Enter New password">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <label class="col-md-3 col-form-label">Confirm Password</label>
                                        <div class="col-md-9">
                                            <input type="password" name="c_password" class="form-control" id="staticEmail" placeholder="Enter Confirm password">
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="d-flex justify-content-end align-items-baseline">
                                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                    <button type="submit" class="btn btn-outline-primary btn-icon-text me-4 mb-2 mb-md-0">Submit </button>
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


