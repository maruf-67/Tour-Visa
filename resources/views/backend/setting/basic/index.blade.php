@extends('backend.layouts.master')
@section('title', 'Basic Setting')

@section('content')

    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Basic</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Basic Setting</li>
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
                                    <h3 class="card-title" style="float: none; font-size: 2rem;">Add Your Basic Setting</h3>
                                </div>
                                <!-- /.card-header -->
                                <form method="POST" action="{{ route('admin.setting.store') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <!-- Your form fields -->
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Add Your Website Favicon Icon</label>
                                            <div class="col-md-9">
                                                {{-- <input type="file" name="fav_icon" id="fav_icon"
                                                    class="custom-file-input"
                                                    value="{{ isset($data->fav_icon) ? $data->fav_icon : '' }}">
                                                <label class="custom-file-label" for="exampleInputFile"
                                                    style="right:8px; left:8px;">Choose file</label> --}}

                                                    <input type="file" name="fav_icon" id="fav_icon" class="form-control" value="{{ isset($data->fav_icon) ? $data->fav_icon : ''}}">

                                                @isset($data->fav_icon)
                                                    <img src="{{ asset($data->fav_icon) }}" alt="Fav Icon" width="150px"
                                                        height="100px">
                                                @endisset
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Add Your Website Logo</label>
                                            <div class="col-md-9">
                                                <input type="file" name="logo" id="logo"
                                                    class="custom-file-input"
                                                    value="{{ isset($data->logo) ? $data->logo : '' }}">
                                                <label class="custom-file-label" for="exampleInputFile"
                                                    style="right:8px; left:8px;">Choose file</label>

                                                @isset($data->logo)
                                                    <img src="{{ asset($data->logo) }}" alt="Logo" width="150px"
                                                        height="100px">
                                                @endisset
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Site Title</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="title" type="text" id="title"
                                                    value="{{ isset($data->title) ? $data->title : '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Site Description</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="editor" rows="5" cols="80"  name="description" >{{ $data->description ?? '' }}</textarea>
                                                {{-- <input type="text" class="form-control" id="staticEmail"> --}}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Add Your Keywords</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="editor" rows="3" cols="80"  name="keywords" >{{ $data->keywords ?? '' }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label"> Head Tag</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="head_tag" type="text" id="head_tag"
                                                    value="{{ isset($data->head_tag) ? $data->head_tag : '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label"> Author Name</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="author_name" type="text" id="author_name"
                                                    value="{{ isset($data->author_name) ? $data->author_name : '' }}">
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
