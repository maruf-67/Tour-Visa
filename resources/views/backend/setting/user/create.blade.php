




@extends('backend.layouts.master')
@section('title', 'Basic Setting')

@section('content')

    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Admin User</h4>
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
                            <h6 class="card-title mb-0 text-primary">Add New User</h6>
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

                        </div>

                        {{-- Content --}}
                        <div class="col-12 mt-4">
                            <form method="POST" action="{{ route('admin.user.store') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                    <div class="card-body">
                                    <!-- Your form fields -->

                                    <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                                        <label class="col-md-3 col-form-label">User Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="name"  name="name" placeholder="Ajmain Akash" required>
                                            {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
                                        </div>

                                    </div>

                                    <div class="form-group row mt-4 {{ $errors->has('email') ? 'has-error' : ''}}">
                                        <label class="col-md-3 col-form-label">User Email</label>
                                        <div class="col-md-9">
                                            <input type="email" name="email" class="form-control" id="staticEmail" placeholder="ajmain@gmail.com">

                                            {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4 {{ $errors->has('password') ? 'has-error' : ''}}">
                                        <label class="col-md-3 col-form-label">User Password</label>
                                        <div class="col-md-9">
                                            <input type="password" name="password" class="form-control" id="staticEmail" placeholder="Enter user password">
                                            {!! $errors->first('password', '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4 {{ $errors->has('fav_icon') ? 'has-error' : ''}}">
                                        <label class="col-md-3 col-form-label">User Image</label>
                                        <div class="col-md-9">
                                            <input type="file" name="fav_icon" id="fav_icon" class="form-control">
                                            {!! $errors->first('fav_icon', '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4 {{ $errors->has('phone') ? 'has-error' : ''}}">
                                        <label class="col-md-3 col-form-label">User Phone</label>
                                        <div class="col-md-9">
                                            <input type="number" name="phone" class="form-control" id="staticEmail" placeholder="+8801712******">
                                            {!! $errors->first('phone', '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4{{ $errors->has('type') ? 'has-error' : ''}}">
                                        <label class="col-md-3 col-form-label">User Role</label>
                                        <div class="col-md-9">
                                            {{-- <input type="text" class="form-control" id="staticEmail"> --}}
                                            <select class="form-control" name="type">
                                                <option value="1">Administrator</option>
                                                <option value="2">Admin</option>
                                                <option value="3">Moderator</option>
                                            </select>
                                        </div>
                                        {!! $errors->first('type', '<p class="help-block danger">:message</p>') !!}

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

