@extends('layout.main')

@section('content')
{{-- <div class="page-title">
    <h3>Dashboard</h3>
    <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
</div> --}}
<div class="col-md-3">
    <div class="card text-white bg-primary">
        <div class="card-body">
            <h1>{{ $booking }}</h1>
            <a href="/receptionist/booking" class="text-white">Booking</a>
        </div>
    </div>
</div>
@endsection