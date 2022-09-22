@extends('layout.main')

@section('content')
{{-- <div class="page-title">
    <h3>Dashboard</h3>
    <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
</div> --}}
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h1>{{ $rooms }}</h1>
                    <a href="/admin/room" class="text-white">Rooms</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h1>{{ $rooms_facilities }}</h1>
                    <a href="/admin/room-facility" class="text-white">Rooms Facilities</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h1>{{ $facilities }}</h1>
                    <a href="/admin/public-facility" class="text-white">Public Facilities</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h1>{{ $booking }}</h1>
                    <a href="/admin/booking" class="text-white">Booking</a>
                </div>
            </div>
        </div>
    </div>
</div>







@endsection
