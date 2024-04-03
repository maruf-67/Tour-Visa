@extends('backend.layouts.master')
@section('title', 'Unpaid Application')

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
                            <h6 class="card-title mb-0 text-primary">Unpaid Application List</h6>
                            <div class="dropdown">
                                {{-- <a href="{{ route('admin.application.index') }}"><button class="btn btn-primary me-2">Add
                                        Admin</button></a> --}}

                            </div>
                        </div>


                        {{-- Content --}}
                        <div class="col-12 mt-4" style="overflow-y: hidden;">
                            <table id="unpaid-table" class="table table-striped" style="width:100%">
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
                                            <td>{{ $application->order->reference_id }}</td>
                                            <td>{{ $application->service->name }}</td>
                                            <td>{{ $application->first_name }} {{ $application->last_name }}</td>
                                            <td>{{ $application->order->email }}</td>
                                            <td>{{ $application->order->phone }}</td>
                                            <td>{{ $application->order->citizenCountry?->name }}</td>
                                            <td>
                                                @if ($application->status == 1)
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
                                                <form action="{{ route('admin.application.destroy', $application->id) }}" method="POST" id="deleteForm{{ $application->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger delete-button" data-application-id="{{ $application->id }}">Delete</button>
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
        new DataTable('#unpaid-table', {
            responsive: true
        });
    </script>
    <script>
         $(document).ready(function() {
        $(".delete-button").click(function(event) { // added event parameter here
            event.preventDefault();
            var applicationId = $(this).data('application-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // changed to jQuery selector to submit form
                    $('#deleteForm' + applicationId).submit();
                }
            });
        });
    });

        // function deleteConfirmation(applicationId) {
        //     //prevent from submission


        //     Swal.fire({
        //         title: 'Are you sure?',
        //         text: 'This will delete the cart!',
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes, clear it!'
        //     }).then((result) => {
        //         // If user confirms the removal
        //         if (result.isConfirmed) {
        //             // Remove the product from the cart
        //             $('.product-wrap').empty();
        //             productArray = [];
        //             $('.count').text(productArray.length);
        //             $('.product-info').removeClass('active');
        //             // Show 'Product removed' message
        //             Swal.fire({
        //                 toast: true,
        //                 position: 'top-end',
        //                 icon: 'success',
        //                 title: 'Product cleared from the cart',
        //                 showConfirmButton: false,
        //                 timer: 2000
        //             });
        //         }
        //     });
        // }
    </script>
@endpush
