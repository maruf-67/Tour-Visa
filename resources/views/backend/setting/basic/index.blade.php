@extends('backend.layouts.master')
@section('title', 'Basic Setting')

@section('content')

    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
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
            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                            <h6 class="card-title mb-0 text-primary">Add Your Basic Setting</h6>
                            <div class="dropdown">
                                <a type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="eye" class="icon-sm me-2"></i> <span
                                            class="">View</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="edit-2" class="icon-sm me-2"></i> <span
                                            class="">Edit</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="trash" class="icon-sm me-2"></i> <span
                                            class="">Delete</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="printer" class="icon-sm me-2"></i> <span
                                            class="">Print</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="download" class="icon-sm me-2"></i> <span
                                            class="">Download</span></a>
                                </div>
                            </div>
                        </div>


                        {{-- Content --}}
                        <div class="col-12 mt-4">
                            <form method="POST" action="{{ route('admin.setting.store') }}" accept-charset="UTF-8"
                                class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <!-- Your form fields -->
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Add Your Website Favicon Icon</label>
                                        <div class="col-md-8">
                                            {{-- <input type="file" name="fav_icon" id="fav_icon"
                                                class="custom-file-input"
                                                value="{{ isset($data->fav_icon) ? $data->fav_icon : '' }}">
                                            <label class="custom-file-label" for="exampleInputFile"
                                                style="right:8px; left:8px;">Choose file</label> --}}

                                            <input type="file" name="fav_icon" id="fav_icon" class="form-control"
                                                value="{{ isset($data->fav_icon) ? $data->fav_icon : '' }}">
                                        </div>
                                        @isset($data->fav_icon)
                                            <div class="col-md-1">
                                                <img src="{{ asset($data->fav_icon) }}" alt="Fav Icon" width="100px"
                                                height="100px">
                                            </div>
                                        @endisset
                                    </div>


                                    <div class="form-group row mt-4">
                                        <label class="col-md-3 col-form-label">Add Your Website Logo</label>
                                        <div class="col-md-8">
                                            <input type="file" name="logo" id="logo" class="form-control"
                                                value="{{ isset($data->logo) ? $data->logo : '' }}">
                                        </div>
                                        @isset($data->logo)
                                            <div class="col-md-1">
                                                <img src="{{ asset($data->logo) }}" alt="Logo" width="100px"
                                                    height="100px">
                                            </div>
                                        @endisset
                                    </div>

                                    <div class="form-group row mt-4">
                                        <label class="col-md-3 col-form-label">Site Title</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="title" type="text" id="title"
                                                value="{{ isset($data->title) ? $data->title : '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <label class="col-md-3 col-form-label">Site Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="editor" rows="5" cols="80" name="description">{{ $data->description ?? '' }}</textarea>
                                            {{-- <input type="text" class="form-control" id="staticEmail"> --}}
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <label class="col-md-3 col-form-label">Add Your Keywords</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="editor" rows="3" cols="80" name="keywords">{{ $data->keywords ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <label class="col-md-3 col-form-label"> Head Tag</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="head_tag" type="text" id="head_tag"
                                                value="{{ isset($data->head_tag) ? $data->head_tag : '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <label class="col-md-3 col-form-label"> Author Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="author_name" type="text"
                                                id="author_name"
                                                value="{{ isset($data->author_name) ? $data->author_name : '' }}">
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








    {{-- <div class="wrapper">



            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row mx-auto">
                        <!-- left column -->
                        <div class="col-md-8 mx-auto">
                            <!-- general form elements -->
                            <div class="card card-primary">

                                <!-- form start -->
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div> --}}


@endsection
