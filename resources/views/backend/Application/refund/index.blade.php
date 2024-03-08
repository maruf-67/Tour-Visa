@extends('backend.layouts.master')
@section('title', 'Basic Setting')

@section('content')

    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Application</h4>
            </div>

        </div>



        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card ">
                <div class="card overflow-hidden ">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3 ">
                            <h6 class="card-title mb-0 text-primary">Approved Application List</h6>
                            <div class="dropdown">
                                {{-- <a href="{{ route('admin.application.index') }}"><button class="btn btn-primary me-2">Add
                                        Admin</button></a> --}}

                            </div>
                        </div>


                        {{-- Content --}}
                        <div class="col-12 mt-4">
                            <table id="admintable" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>#ID</th>
                                        <th>Reference</th>
                                        <th>Service</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Country From</th>
                                        <th>Application_Status</th>
                                        <th>Payment_status</th>
                                        <th>Apply Date And Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>ETAN4683</td>
                                        <td>Regular</td>
                                        <td>Aju</td>
                                        <td>aju@gmail.com</td>
                                        <td>01976756465</td>
                                        <td>Bangladesh</td>
                                        <td>Refund</td>
                                        <td>Not paid</td>
                                        <td>31 march 2023 12:24pm</td>
                                        <td class="d-flex justify-content-between">

                                            <a href="{{ route('admin.application.view') }}"><button class="btn btn-primary">View</button></a>
                                            <a href="#"><button class="btn btn-primary">Edit</button></a>

                                            <form action="#"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                    <tbody>




                                    </tbody>
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
        new DataTable('#admintable');
        responsive;
    </script>
@endpush
