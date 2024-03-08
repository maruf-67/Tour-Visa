{{-- <div class="form-group row">
    <label class="col-md-3 col-form-label">Phone</label>
    <div class="col-md-9">
        <input class="form-control" name="phone" type="text" id="phone"
        value="{{ isset($user->phone) ? $user->phone : '' }}">
    </div>
</div> --}}

@extends('backend.layouts.master')
@section('title', 'Basic Setting')

@section('content')

    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Service Section</h4>
            </div>
        </div>



        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card ">
                <div class="card overflow-hidden ">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3 ">
                            <h6 class="card-title mb-0 text-primary">Edit Service</h6>
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

                        </div>

                        {{-- Content --}}
                        <div class="col-12 mt-4 {{ $errors->has('iso') ? 'has-error' : '' }}">
                            <form method="POST" action="{{ route('admin.service.update',$service->id) }}" accept-charset="UTF-8"
                                class="form-horizontal" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf
                                <div class="card-body">
                                    <!-- Your form fields -->

                                    <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label class="col-md-3 col-form-label">Service Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="name" name="name"
                                                required value="{{ isset($service->name) ? $service->name : '' }}">
                                            {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4 {{ $errors->has('time') ? 'has-error' : '' }}">
                                        <label class="col-md-3 col-form-label">Time Duration</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="time" name="time"
                                                required value="{{ isset($service->time) ? $service->time : '' }}">
                                            {!! $errors->first('time', '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4 {{ $errors->has('price') ? 'has-error' : '' }}">
                                        <label class="col-md-3 col-form-label">Price</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="price" name="price"
                                                required value="{{ isset($service->price) ? $service->price : '' }}">
                                            {!! $errors->first('price', '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4 {{ $errors->has('description') ? 'has-error' : '' }}">
                                        <label class="col-md-3 col-form-label">Description</label>
                                        <div class="col-md-9">
                                            {{-- <textarea name="description" class="form-control" id="description" cols="20" rows="5" required
                                            value="{{ isset($service->description) ? $service->description : '' }}" ></textarea> --}}

                                            <textarea name="description" class="form-control" id="description" cols="20" rows="5" required>{{ isset($service->description) ? $service->description : '' }}</textarea>

                                            {!! $errors->first('description', '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4 {{ $errors->has('status') ? 'has-error' : '' }}">
                                        <label class="col-md-3 col-form-label">Status</label>
                                        {{-- <div class="col-md-9">
                                            <select class="form-control" name="status"
                                                value="{{ isset($service->status) ? $service->status : '' }}">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            {!! $errors->first('status', '<p class="help-block text-danger">:message</p>') !!}
                                        </div> --}}
                                        <div class="col-md-9">
                                            <select class="form-control" name="status">
                                                <option value="1" {{ isset($service->status) && $service->status == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ isset($service->status) && $service->status == 0 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            {!! $errors->first('status', '<p class="help-block text-danger">:message</p>') !!}
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="d-flex justify-content-end align-items-baseline">
                                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                    <button type="submit"
                                        class="btn btn-outline-primary btn-icon-text me-4 mb-2 mb-md-0">Submit </button>
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
