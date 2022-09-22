{{-- @extends('layout.main')

@section('content')
<div class="row" id="table-hover-row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Booking</h4>
                <a href="/receptionist/booking/create" class="btn btn-primary btn-sm float-right mr-5 px-4">Create</a>
              </div>
              <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Action</th>
                                    <th>Name</th>
                                    <th>Room Type</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Total Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booking as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
<td>
    <a href="/receptionist/booking/{{ $row->id }}/edit" class="btn btn-warning btn-sm px-4 mb-1">Edit</a>
    <a href="/receptionist/booking/{{ $row->id }}" class="btn btn-danger btn-sm px-4">Delete</a>
</td>
<td>{{ $row->user->name }}</td>
<td>{{ $row->room->room_type }}</td>
<td>{{ $row->check_in }}</td>
<td>{{ $row->check_out }}</td>
<td>{{ $row->total_payment }}</td>
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
        BOOKING DATA
        <a href="/receptionist/booking/create" class="btn btn-primary btn-sm float-right ml-3">Create</a>
        <button type="button" class="btn btn-success float-right ml-3" data-toggle="modal" data-target="#inlineForm">
            Filter Tanggal
        </button>
        <a href="/receptionist/booking" class="btn btn-secondary btn-sm px-4 text-white float-right">Refresh</a>
    </div>
    <div class="card-body">
        <table class='table table-striped' id="table1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Room Type</th>
                    <th>Qty</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Total Pembayaran</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($booking as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->user->name }}</td>
                    <td>{{ $row->room->room_type }}</td>
                    <td>{{ $row->qty }}</td>
                    <td>{{ $row->check_in }}</td>
                    <td>{{ $row->check_out }}</td>
                    <td>{{ $row->total_payment }}</td>
                    <td >
                        <a href="/receptionist/booking/{{ $row->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/receptionist/booking/{{ $row->id }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Filter Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form role="form" method="GET" action="/receptionist/booking/filter">
                <div class="modal-body">
                    <label for="exampleInputEmail1">Dari Tanggal</label>
                    <div class="form-group">
                        <input type="date" class="form-control date-picker" id="exampleInputEmail1"
                        placeholder="Dari Tanggal" name="dari" value="{{ date('Y-m-d') }}">
                    </div>
                    <label for="exampleInputPassword1">Sampai Tanggal</label>
                    <div class="form-group">
                        <input type="date" class="form-control datepicker" id="exampleInputPassword1"
                        placeholder="Sampai Tanggal" name="sampai" value="{{ date('Y-m-d') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    {{-- <button type="button" class="btn btn-primary ml-1" data-dismiss="modal" type="submit">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Submit</span>
                    </button> --}}
                    <button type="submit" class="btn btn-primary ml-1">Submit</button>
                </div>
            </form>
        </div>
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
