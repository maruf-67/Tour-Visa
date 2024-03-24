@extends('backend.layouts.master')
@section('title', 'Date Wise Filtered Application')

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
                            <h6 class="card-title mb-0 text-primary">Date Wise Application List</h6>
                            <div class="dropdown">
                                {{-- <a href="{{ route('admin.application.index') }}"><button class="btn btn-primary me-2">Add
                                        Admin</button></a> --}}

                            </div>
                        </div>
                        <form action="{{ route('admin.application.report') }}" method="GET">
                            <div class="row mt-4">
                                <div class="col-md-5">
                                    <label for="start_date">Start Date:</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" value={{ $start_date ?? null }} >
                                </div>
                                <div class="col-md-5">
                                    <label for="end_date">End Date:</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" value={{ $end_date ?? null }} >
                                </div>
                                <div class="col-md-2">
                                    <label>&nbsp;</label><br>
                                    <button type="submit" class="btn btn-primary">Generate Report</button>
                                </div>
                            </div>
                        </form>

                        {{-- Content --}}
                        <div class="col-12 mt-4">
                            <table id="report-table" class="table table-striped" style="width:100%">
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
                                    @foreach ($applications as $application)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $application->reference_id }}</td>
                                            <td>{{ $application->service->name }}</td>
                                            <td>{{ $application->first_name }} {{ $application->last_name }}</td>
                                            <td>{{ $application->email }}</td>
                                            <td>{{ $application->phone }}</td>
                                            <td>{{ $application->citizenCountry->name }}</td>
                                            <td>
                                                @if($application->status == 1)
                                                    Pending
                                                @elseif($application->status == 2)
                                                    Processing
                                                @elseif($application->status == 3)
                                                    Approved
                                                @elseif($application->status == 4)
                                                    On-Hold
                                                @elseif($application->status == 5)
                                                    Rejected
                                                @else
                                                    Unknown Status
                                                @endif
                                            </td>
                                            <td>{{ $application->is_payment ? 'Paid' : 'Unpaid' }}</td>
                                            <td>{{ $application->created_at }}</td>
                                            <td class="d-flex justify-content-between">
                                                <a href="{{ route('admin.application.view', $application->id) }}"><button class="btn btn-primary">View</button></a>
                                                {{-- <a href="#"><button class="btn btn-primary">Edit</button></a> --}}
                                                <form action="#" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
        new DataTable('#report-table', {
        responsive: true
        });
    </script>
@endpush
