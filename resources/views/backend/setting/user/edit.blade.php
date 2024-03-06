@extends('backend.layouts.master')
@section('name', 'Tour-Visa')

@section('content')

    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row mx-auto">
                        <!-- left column -->
                        <div class="col-md-8 mx-auto">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header text-center">
                                    <h3 class="card-name" style="float: none; font-size: 2rem;">Add Your Profile Setting</h3>
                                </div>
                                <!-- /.card-header -->
                                <form method="POST" action="{{ route('admin.user.update',$user->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    {{ method_field('PATCH') }}
                                    {{-- {{ csrf_field() }} --}}
                                    @csrf
                                    <div class="card-body">
                                        <!-- Your form fields -->
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Your Profile Photo</label>
                                            <div class="col-md-9">
                                                <input type="file" name="image" id="image"
                                                class="custom-file-input"
                                                value="{{ isset($user->image) ? $user->image : '' }}">
                                            <label class="custom-file-label" for="exampleInputFile"
                                                style="right:8px; left:8px;">Choose file</label>

                                            @isset($user->image)
                                                <img src="{{ asset($user->image) }}" alt="image" width="150px"
                                                    height="100px">
                                            @endisset
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Profile Name</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="name" type="text" id="name"
                                                    value="{{ isset($user->name) ? $user->name : '' }}">
                                            </div>
                                        </div>

                                        {{-- <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                            <label for="name" class="control-label">{{ 'Title' }}</label>
                                            <input class="form-control" name="title" type="text" id="name" value="{{ isset($blog->title) ? $blog->title : ''}}" >
                                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                        </div> --}}

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Email</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="email" type="text" id="email"
                                                value="{{ isset($user->email) ? $user->email : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Phone</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="phone" type="text" id="phone"
                                                value="{{ isset($user->phone) ? $user->phone : '' }}">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                                <!-- form start -->
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>


@endsection
