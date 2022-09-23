<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice Print</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <style>
        *{ 
            border: 1px solid;
        }
    </style> --}}
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row mb-3">
                <h1 class="text-center ">Invoice</h1>
                <div class="col d-flex ">
                    <img src="/image/logo.jpeg" alt="" style="width: 120px;">
                    <h4 class="mt-5 ms-2">ROYAL GALAXY</h4>
                </div>
            </div>
            <!-- info row -->
            <div class="row invoice-info mb-3">
                <div class="col-sm-3 invoice-col">
                    <b class="fs-5">INVOICE</b><br>
                    @foreach($booking as $row)
                    <b>Invoice ID:</b> {{ $row->booking_code }} <br>
                    @endforeach

                    @foreach($booking as $row)
                    <b>Date/Time:</b> {{ date('Y-m-d',strtotime($row->created_at)) }} <br>
                    @endforeach
                </div>

                <div class="col-sm-3 invoice-col ">
                    <b class="fs-5">CUSTOMER DETAIL</b><br>
                    <b>Name:</b> {{ auth()->user()->name }}<br>
                    <b>Email:</b> {{ auth()->user()->email }}<br>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped table-bordered ">
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

        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>