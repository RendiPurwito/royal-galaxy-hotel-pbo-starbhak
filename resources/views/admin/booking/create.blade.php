@extends('layout.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="fw-bold">Create Booking/h4>
    </div>
    <div class="card-body">
        <form action="/admin/booking" method="POST">
            @csrf
            <div class="mb-4">
                <label for="user_id" class="form-label">Name</label>
                <select class="form-select" name="user_id" id="user_id">
                    @foreach ($user as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="room_id" class="form-label">Room Type</label>
                <select class="form-select" name="room_id" id="room_id">
                    @foreach ($room as $row)
                    <option value="{{ $row->id }}">{{ $row->room_type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="qty" class="form-label">Qty</label>
                <input type="text" class="form-control" id="qty" name="qty" autocomplete="off">
            </div>
            <div class="mb-4">
                <label for="check_in" class="form-label">Check In</label>
                <input type="date" class="form-control" id="check_in" name="check_in" autocomplete="off">
            </div>
            <div class="mb-4">
                <label for="check_out" class="form-label">Check Out</label>
                <input type="date" class="form-control" id="check_out" name="check_out" autocomplete="off">
            </div>
            
            <button type="submit" class="btn btn-primary float-right">Submit</button>
        </form>
    </div>
</div>
@endsection
