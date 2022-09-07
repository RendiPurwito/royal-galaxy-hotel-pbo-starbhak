@extends('layout.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="fw-bold">Create Data Room Facility</h4>
    </div>
    <div class="card-body">
        <form action="/admin/room-facility" method="POST">
            @csrf
            <div class="mb-4">
                <label for="facility-name" class="form-label">Facility Name</label>
                <input type="text" class="form-control" id="facility-name" name="facility_name" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary float-right">Submit</button>
        </form>
    </div>
</div>
@endsection
