<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        {{-- <h1 class="text-center mt-5">INVOICE</h1>
        <div class="row mt-5 text-center">
            <div class="col-2 d-flex">
                <p class="me-1">Name:</p>
                <p>{{ auth()->user()->name }}</p>
    </div>
    <div class="col-2 d-flex">
        <p class="me-1">Email:</p>
        <p>{{ auth()->user()->email }}</p>
    </div>
    <div class="col-2 d-flex">
        <p class="me-1">Invoice Number:</p>
    </div>
    <div class="col-2 d-flex">
        <p class="me-1">Date/Time:</p>
    </div>
    </div> --}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container mt-5">
                <a href="/redirect-to-previous-url" class="btn btn-warning ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                        <path
                            d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                    </svg>
                    <span>Go Back</span>
                </a>
                <div class="row mb-2 ">
                    <h1 class="text-center ">Invoice</h1>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- info row -->
                            <div class="row invoice-info">
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    @foreach($booking as $row)
                                    <b>Invoice ID:</b> {{ $row->booking_number }} <br>
                                    @endforeach
                                    <b>Name:</b> {{ auth()->user()->name }}<br>
                                    <b>Email:</b> {{ auth()->user()->email }}<br>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Facility</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                                <th>Qty</th>
                                                <th>Prices</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($booking as $row)
                                            <tr>
                                                <td>{{ $row->room->room_type }}</td>
                                                <td>{{ $row->room->room_facility->facility_name }}</td>
                                                <td>{{ $row->check_in }}</td>
                                                <td>{{ $row->check_out }}</td>
                                                <td>{{ $row->qty }}</td>
                                                <td>{{ $row->room->price }}</td>
                                                <td>{{ $row->total_payment }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <a href="/invoice-print" rel="noopener" target="_blank"
                                        class="btn btn-default"></i> Print</a>

                                    <button type="button" class="btn btn-primary float-right"
                                        style="margin-right: 5px;">
                                        <i class="fas fa-download"></i> Generate PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    </div>
</body>

</html>