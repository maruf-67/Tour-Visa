@extends('backend.layouts.master')
@section('title', 'Luxury Hotel | Restaurant')

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
                                <li class="breadcrumb-item active">Basic</li>
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
                        <a href="{{ route('admin.country.create') }}"><button class="btn btn-primary">Add New Country</button></a>
                        <div class="col-md-8 mx-auto">
                            
                            <div class="card card-primary">
                                <div class="card-header text-center">
                                    <h3 class="card-title" style="float: none; font-size: 2rem;">Country List</h3>
                                </div>
                            </div>
                            <table id="country" class="table table-striped" style="width:100%">
                                <thead>
                                    {{-- @dd($countries) --}}
                                    <tr>
                                        <th>#</th>
                                        <th>Iso</th>
                                        <th>Name</th>
                                        <th>Nicename</th>
                                        <th>Iso3</th>
                                        <th>Number Code</th>
                                        <th>Phone Code</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($countries as $country)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{$country->iso ??  ''}}</td>
                                            <td>{{$country->name ??  ''}}</td>
                                            <td>{{$country->nicename ??  ''}}</td>
                                            <td>{{$country->iso3 ??  ''}}</td>
                                            <td>{{$country->numcode??  ''}}</td>
                                            <td>{{$country->phonecode ??  ''}}</td>
                                            <td><span class="badge badge-{{ $country->status ? 'success' : 'danger' }}">{{ $country->status ? 'Active' : 'Inactive' }}</span></td>
                                            <td>
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $country->id }}">Edit</button>
                                                {{-- <form action="#', $country->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="editModal{{ $country->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $country->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel{{ $country->id }}">Edit Status</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('admin.country.update', $country->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Status:</label>
                                                                <select class="form-control" name="status">
                                                                    <option value="1" {{ $country->status ? 'selected' : '' }}>Active</option>
                                                                    <option value="0" {{ !$country->status ? 'selected' : '' }}>Inactive</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

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

    @push('script')
    <script>
        new DataTable('#country');
    </script>
    @endpush
@endsection
