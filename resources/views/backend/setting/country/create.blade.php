@extends('backend.layouts.master')
@section('title', 'Luxury Hotel | Restaurant')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            <div class="card">
                <div class="card-header">Add New Country</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.country.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="iso">ISO</label>
                            <input type="text" class="form-control" id="iso" name="iso" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="nicename">Nice Name</label>
                            <input type="text" class="form-control" id="nicename" name="nicename" required>
                        </div>

                        <div class="form-group">
                            <label for="iso3">ISO3</label>
                            <input type="text" class="form-control" id="iso3" name="iso3" required>
                        </div>

                        <div class="form-group">
                            <label for="numcode">Numcode</label>
                            <input type="text" class="form-control" id="numcode" name="numcode" required>
                        </div>

                        <div class="form-group">
                            <label for="phonecode">Phone Code</label>
                            <input type="text" class="form-control" id="phonecode" name="phonecode" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
