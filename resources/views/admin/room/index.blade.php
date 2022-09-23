{{-- @extends('layout.main')

@section('content')
<div class="row" id="table-hover-row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Rooms</h4>
                <a href="/admin/room/create" class="btn btn-primary btn-sm float-right mr-5 px-4">Create</a>
              </div>
              <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Room Type</th>
                                    <th>Room Facility</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($room as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
<td>{{ $row->room_type }}</td>
<td>{{ $row->room_facility->facility_name }}</td>
<td>{{ $row->price }}</td>
<td>
    <a href="/admin/room/{{ $row->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
    <a href="/admin/room/{{ $row->id }}" class="btn btn-danger btn-sm">Delete</a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection --}}

@extends('layout.main')

@section('css')
<link rel="stylesheet" href="/voler/dist/assets/css/bootstrap.css">

<link rel="stylesheet" href="/voler/dist/assets/vendors/simple-datatables/style.css">

<link rel="stylesheet" href="/voler/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
<link rel="stylesheet" href="/voler/dist/assets/css/app.css">
<link rel="shortcut icon" href="/voler/dist/assets/images/favicon.svg" type="image/x-icon">
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        ROOM DATA
        <a href="/admin/room/create" class="btn btn-primary btn-sm float-right ml-3">Create</a>
    </div>
    <div class="card-body">
        <table class='table table-striped' id="table1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Room Type</th>
                    <th>Room Facility</th>
                    <th>Number Of Rooms</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($room as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->room_type }}</td>
                    <td>{{ $row->room_facility->facility_name }}</td>
                    <td>{{ $row->number_of_rooms }}</td>
                    <td>{{ $row->price }}</td>
                    <td>
                        <a href="/admin/room/{{ $row->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/admin/room/{{ $row->id }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection

@section('javascript')
<script src="/voler/dist/assets/js/feather-icons/feather.min.js"></script>
<script src="/voler/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/voler/dist/assets/js/app.js"></script>

<script src="/voler/dist/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script src="/voler/dist/assets/js/vendors.js"></script>

<script src="/voler/dist/assets/js/main.js"></script>
@endsection
