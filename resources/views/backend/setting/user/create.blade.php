@extends('backend.layouts.master')
@section('title', 'Tour-Visa')

@section('content')

    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add New User</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">User</li>
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
                                    <h3 class="card-title" style="float: none; font-size: 2rem;">Add Your New User Setting
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <form method="POST" action="{{ route('admin.user.store') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                        <div class="card-body">
                                        <!-- Your form fields -->

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">User Name</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="name"  name="name" placeholder="Enter user name">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Email</label>
                                            <div class="col-md-9">
                                                <input type="email" name="email" class="form-control" id="staticEmail" placeholder="Enter user email">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">User Password</label>
                                            <div class="col-md-9">
                                                <input type="password" name="password" class="form-control" id="staticEmail" placeholder="Enter user password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">User Role</label>
                                            <div class="col-md-9">
                                                {{-- <input type="text" class="form-control" id="staticEmail"> --}}
                                                <select class="form-control" name="type">
                                                    <option value="1">Administrator</option>
                                                    <option value="2">Admin</option>
                                                    <option value="3">Moderator</option>
                                                </select>
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


                            {{-- <div class="card card-primary">
                                <div class="card-header text-center">
                                    <h3 class="card-title" style="float: none; font-size: 2rem;">User Table</h3>
                                </div>
                            </div>
                            <table id="usertable" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Type</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                    <td>{{ $loop->index +1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>

                                    <td><img src="{{ asset($user->email) ?? ''}}" height="60px" alt="Image"></td>
                                    <td>{{ $user->type }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td style="vertical-align: middle; text-align:center" style="vertical-align: middle; text-align:center">
                                        <a href="{{ route('admin.users.viewnewuser') }}"><button class="btn btn-primary">Edit</button></a>
                                        @if(auth()->user()->type == 'administrator')
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        @endif

                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table> --}}


                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>


@endsection
