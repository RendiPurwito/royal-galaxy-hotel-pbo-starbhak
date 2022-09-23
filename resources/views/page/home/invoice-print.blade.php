<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice Print</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row mb-2">
                <h1 class="text-center ">Invoice</h1>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
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