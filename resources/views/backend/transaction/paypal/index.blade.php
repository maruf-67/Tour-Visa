@extends('backend.layouts.master')
@section('title', 'Approved Application')

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
                        <div class="col-12 mt-4" style="overflow-y: hidden;">
                            <table id="approve-table" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>#SL</th>
                                        <th>Transaction Id</th>
                                        <th>Amount</th>
                                        {{-- <th>Currency</th> --}}
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Payment Status</th>
                                        <th>Payment Method</th>
                                        <th>Reference Id</th>
                                        <th>Apply Date And Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $application)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $application->transaction_id }}</td>
                                            <td>{{ $application->amount}}</td>
                                            {{-- <td>{{ $application->currency }}</td> --}}
                                            <td>{{ $application->payer_name }}</td>
                                            <td>{{ $application->payer_email }}</td>
                                            <td>{{ $application->payment_status}}</td>
                                            <td>{{ $application->payment_method}}</td>
                                            <td>{{ $application->reference_id }}</td>
                                            <td>{{ $application->created_at }}</td>
                                            <td class="d-flex justify-content-between">
                                                <a href="{{ route('admin.application.view', $application->id) }}"><button class="btn btn-primary">View</button></a>
                                                <a href="#"><button class="btn btn-primary">Edit</button></a>
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
        new DataTable('#approve-table', {
        responsive: true
        });
    </script>
@endpush
