@extends('backend.layouts.master')
@section('title', 'Basic Setting')

@section('content')

    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to service</h4>
            </div>

        </div>



        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card ">
                <div class="card overflow-hidden ">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3 ">
                            <h6 class="card-title mb-0 text-primary">service List</h6>
                            <div class="dropdown">
                                <a href="{{ route('admin.service.create') }}"><button class="btn btn-primary me-2">Add
                                        Service</button></a>

                            </div>
                        </div>


                        {{-- Content --}}
                        <div class="col-12 mt-4">
                            <table id="admintable" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr style="text-align:center">
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
                                        <tr style="text-align:center">
                                            <td valign='middle'>{{ $loop->index + 1 }}</td>
                                            <td valign='middle'>{{ $service->name }}</td>
                                            <td valign='middle'>{{ $service->time }} Days</td>
                                            <td valign='middle'>{{ $service->price }}</td>
                                            <td valign='middle'>{{ $service->description }}</td>
                                            <td valign='middle'><span
                                                    class="badge badge bg-{{ $service->status ? 'success' : 'danger' }}">{{ $service->status ? 'Active' : 'Inactive' }}</span>

                                            </td>
                                            <td valign='middle'>{{ $service->created_at }}</td>
                                            <td valign='middle' class="d-flex justify-content-around">

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
                        {{-- Content --}}

                    </div>
                </div>
            </div>
        </div> <!-- row -->
    </div>

@endsection

@push('script')
    <script>
        new DataTable('#admintable', {
        responsive: true
        });
    </script>
@endpush
