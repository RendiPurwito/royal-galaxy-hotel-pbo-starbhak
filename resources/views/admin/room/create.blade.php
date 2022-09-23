@extends('layout.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="fw-bold">Create Data Room Facility</h4>
    </div>
    <div class="card-body">
        <form action="/admin/room" method="POST">
            @csrf
            <div class="mb-4">
                <label for="room_type" class="form-label">Room Type</label>
                <input type="text" class="form-control" id="room_type" name="room_type" autocomplete="off">
            </div>
            <div class="mb-4">
                <label for="room_facility_id" class="form-label">Facility Name</label>
                <select class="form-select" name="room_facility_id" id="room_facility_id">
                    @foreach ($room_facility as $row)
                    <option value="{{ $row->id }}">{{ $row->facility_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" autocomplete="off">
            </div>
            <div class="mb-4">
                <label for="number_of_rooms" class="form-label">Number Of Rooms</label>
                <input type="text" class="form-control" id="number_of_rooms" name="number_of_rooms" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary float-right">Submit</button>
        </form>
    </div>
</div>
@endsection
