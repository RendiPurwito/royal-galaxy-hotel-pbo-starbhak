@extends('layout.main')

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
                                        <a href="/receptionist/booking/{{ $row->id }}"
                                        class="btn btn-danger btn-sm px-4">Delete</a>
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
@endsection
