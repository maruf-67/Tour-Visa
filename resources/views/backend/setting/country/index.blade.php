@extends('backend.layouts.master')
@section('title', 'Basic Setting')

@section('content')

    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Country</h4>
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
            <div class="col-12 col-xl-12 grid-margin stretch-card ">
                <div class="card overflow-hidden ">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3 ">
                            <h6 class="card-title mb-0 text-primary">Country List</h6>
                            <div class="dropdown">
                                <a href="{{ route('admin.country.create') }}"><button class="btn btn-primary">Add New
                                        Country</button></a>
                                {{-- <a type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true"
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
                                </div> --}}
                            </div>
                        </div>


                        {{-- Content --}}
                        <div class="col-12 mt-4">
                            <table id="admintable" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr style="text-align:center">
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
                                {{-- <tbody>
                                    @foreach ($users as $user)
                                    <tr style="text-align:center">
                                    <td valign='middle'>{{ $loop->index +1 }}</td>
                                    <td valign='middle'>{{ $user->name }}</td>
                                    <td valign='middle'>{{ $user->email }}</td>

                                    <td valign='middle'><img src="{{ asset($user->email) ?? ''}}" height="60px" alt="Image"></td>
                                    <td valign='middle'>{{ $user->type }}</td>
                                    <td valign='middle'>{{ $user->created_at }}</td>
                                    <td class="d-flex justify-content-around">
                                        @if (auth()->user()->type == 'administrator')
                                        <a href="{{ route('admin.user.edit',$user->id) }}"><button class="btn btn-primary">Edit</button></a>
                                        <a href="{{ route('admin.user.edit',$user->id) }}"><button class="btn btn-primary">View</button></a>
                                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        @endif

                                    </td>
                                </tr>
                                    @endforeach
                                </tbody> --}}

                                @foreach ($countries as $country)
                                    <tr >
                                        <td valign='middle'>{{ $loop->index + 1 }}</td>
                                        <td valign='middle'>{{ $country->iso ?? '' }}</td>
                                        <td valign='middle'>{{ $country->name ?? '' }}</td>
                                        <td valign='middle'>{{ $country->nicename ?? '' }}</td>
                                        <td valign='middle'>{{ $country->iso3 ?? '' }}</td>
                                        <td valign='middle'>{{ $country->numcode ?? '' }}</td>
                                        <td valign='middle'>{{ $country->phonecode ?? '' }}</td>
                                        <td valign='middle'><span
                                                class="badge badge bg-{{ $country->status ? 'success' : 'danger' }}">{{ $country->status ? 'Active' : 'Inactive' }}</span>
                                        </td>
                                        <td valign='middle' class="d-flex justify-content-around">
                                            {{-- <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#editModal{{ $country->id }}">Edit</button> --}}
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editModal">Edit </button>
                                            <form action="{{ route('admin.application.destroy', $country->id ) }}" method="POST">

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>

                                            <!-- Modal -->
                                            <div class="modal fade" id="editModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('admin.country.update', $country->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PATCH')
                                                                <div class="form-group row mt-4">
                                                                    <label class="col-md-3 col-form-label">Status</label>
                                                                    <div class="col-md-9">
                                                                        {{-- <input type="text" class="form-control" id="staticEmail"> --}}
                                                                        <select class="form-control" name="status">
                                                                            <option value="1">Active</option>
                                                                            <option value="0">Inactive</option>
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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
        new DataTable('#admintable');
    </script>
@endpush
