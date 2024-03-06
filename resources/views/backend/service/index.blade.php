@extends('backend.layouts.master')
@section('title', 'Service List')

@section('content')

    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add New Service</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Service List</li>
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
                                    <h3 class="card-title" style="float: none; font-size: 2rem;">Service List</h3>
                                </div>
                            </div>
                            <table id="servicetable" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Time</th>
                                        <th>Price</th>
                                        <th>Deccription</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ $service->time }} Days</td>
                                            <td>{{ $service->price }}</td>
                                            <td>{{ $service->description }}</td>
                                            <td><span class="badge badge-{{ $service->status ? 'success' : 'danger' }}">{{ $service->status ? 'Active' : 'Inactive' }}</span></td>
                                            <td>{{ $service->created_at }}</td>
                                            <td style="vertical-align: middle; text-align:center"
                                                style="vertical-align: middle; text-align:center">

                                                <a href="{{ route('admin.service.edit', $service->id) }}"><button
                                                        class="btn btn-primary">Edit</button></a>

                                                <form action="{{ route('admin.service.destroy', $service->id) }}"
                                                    method="POST">
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
        new DataTable('#servicetable');
    </script>
@endpush
