@extends('backend.layouts.master')
@section('title', 'User List')

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
                                <li class="breadcrumb-item active">User List</li>
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
                                    <h3 class="card-title" style="float: none; font-size: 2rem;">User List</h3>
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

                                        <a href="{{ route('admin.user.edit',$user->id) }}"><button class="btn btn-primary">Edit</button></a>

                                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>


@endsection
@push('script')
    <script>
        new DataTable('#usertable');
    </script>
    @endpush
