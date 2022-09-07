@extends('layout.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="fw-bold">Create Data Public Facility</h4>
    </div>
    <div class="card-body">
        <form action="/admin/public-facility/{{ $public_facility->id }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="facility-name" class="form-label">Facility Name</label>
                <input type="text" class="form-control" id="facility-name" name="facility_name" autocomplete="off" value="{{ $public_facility->facility_name }}">
            </div>
            <div class="form-floating">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" style="height: 100px">{{ $public_facility->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary float-right">Submit</button>
        </form>
    </div>
</div>
@endsection
