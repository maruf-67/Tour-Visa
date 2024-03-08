@extends('backend.layouts.master')
@section('title', 'Basic Setting')

@section('content')

    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Country Section</h4>
            </div>
        </div>



        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card ">
                <div class="card overflow-hidden ">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3 ">
                            <h6 class="card-title mb-0 text-primary">Add New Country</h6>
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

                        </div>

                        {{-- Content --}}
                        <div class="col-12 mt-4 {{ $errors->has('iso') ? 'has-error' : ''}}">
                            <form method="POST" action="{{ route('admin.country.store') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                    <div class="card-body">
                                    <!-- Your form fields -->

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">ISO</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="iso" name="iso" required>
                                            {!! $errors->first('iso', '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4 {{ $errors->has('name') ? 'has-error' : ''}}">
                                        <label class="col-md-3 col-form-label">Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="name" name="name" required>
                                            {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4 {{ $errors->has('nicename') ? 'has-error' : ''}}">
                                        <label class="col-md-3 col-form-label">Nice Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="nicename" name="nicename" required>
                                            {!! $errors->first('nicename', '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4 {{ $errors->has('iso3') ? 'has-error' : ''}}">
                                        <label class="col-md-3 col-form-label">ISO3</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="iso3" name="iso3" required>
                                            {!! $errors->first('iso3', '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4 {{ $errors->has('numcode') ? 'has-error' : ''}}">
                                        <label class="col-md-3 col-form-label">Number Code</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="numcode" name="numcode" required>
                                            {!! $errors->first('numcode', '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4 {{ $errors->has('phonecode') ? 'has-error' : ''}}">
                                        <label class="col-md-3 col-form-label">Phone Code</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="phonecode" name="phonecode" required>
                                            {!! $errors->first('phonecode', '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4 {{ $errors->has('status') ? 'has-error' : ''}}">
                                        <label class="col-md-3 col-form-label">Status</label>
                                        <div class="col-md-9">
                                            {{-- <input type="text" class="form-control" id="staticEmail"> --}}
                                            <select class="form-control" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            {!! $errors->first('status', '<p class="help-block text-danger">:message</p>') !!}
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
