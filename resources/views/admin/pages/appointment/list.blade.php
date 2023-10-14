@extends('admin.layout.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content mt-4">
            <div class="container-fluid">
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div style="gap: 12px"
                                class="card-header d-flex align-items-center flex-md-row flex-column mb-sm-0 mb-5">
                                <h3 class="card-title">Booking Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table id="table-booking" class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Patient</th>
                                            <th>Doctor</th>
                                            <th>Branch</th>
                                            <th>Service</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($bookings as $booking)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $booking->name }}</td>
                                                <td>{{ $booking->doctor_name }}</td>
                                                <td>{{ $booking->branch_name }}</td>
                                                <td>{{ $booking->service_name }}</td>
                                                @php
                                                    $Newdate = date('d-m-Y', strtotime($booking->date));
                                                @endphp
                                                <td>{{ $Newdate }}</td>
                                                <td>{{ $booking->time }}</td>
                                                @php
                                                    if ($booking->status_code == 'S1') {
                                                        $color = 'gray';
                                                    } elseif ($booking->status_code == 'S2') {
                                                        $color = 'green';
                                                    } elseif ($booking->status_code == 'S3') {
                                                        $color = 'red';
                                                    } else {
                                                        $color = '#d35400';
                                                    }
                                                @endphp
                                                <td>
                                                    <strong style="color: {{ $color }}">
                                                        {{ $booking->status }}</strong>
                                                </td>
                                                <td>
                                                    <form class="d-inline"
                                                        action="{{ route('admin.bookings.destroy', ['booking' => $booking->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button onclick="return confirm('Are u sure !')" type="submit"
                                                            name="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    <a href="{{ route('admin.bookings.show', ['booking' => $booking->id]) }}"
                                                        class="btn btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">No data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{-- {{ $serviceCategories->links('pagination::bootstrap-5') }} --}}
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="table-booking" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Patient</th>
                                            <th>Doctor</th>
                                            <th>Branch</th>
                                            <th>Service</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($bookings as $booking)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $booking->name }}</td>
                                                <td>{{ $booking->doctor_name }}</td>
                                                <td>{{ $booking->branch_name }}</td>
                                                <td>{{ $booking->service_name }}</td>
                                                @php
                                                    $Newdate = date('d-m-Y', strtotime($booking->date));
                                                @endphp
                                                <td>{{ $Newdate }}</td>
                                                <td>{{ $booking->time }}</td>
                                                @php
                                                    if ($booking->status_code == 'S1') {
                                                        $color = 'gray';
                                                    } elseif ($booking->status_code == 'S2') {
                                                        $color = 'green';
                                                    } elseif ($booking->status_code == 'S3') {
                                                        $color = 'red';
                                                    } else {
                                                        $color = '#d35400';
                                                    }
                                                @endphp
                                                <td>
                                                    <strong style="color: {{ $color }}">
                                                        {{ $booking->status }}</strong>
                                                </td>
                                                <td>
                                                    <form class="d-inline"
                                                        action="{{ route('admin.bookings.destroy', ['booking' => $booking->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button onclick="return confirm('Are u sure !')" type="submit"
                                                            name="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    <a href="{{ route('admin.bookings.show', ['booking' => $booking->id]) }}"
                                                        class="btn btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">No data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div> --}}
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('booking_list_menu_open')
    menu-open
@endsection
@section('booking_list_menu_active')
    active
@endsection
@section('js-custom')
    <script type="text/javascript">
        $('#table-booking').dataTable({
            "pageLength": 4
        });
    </script>
@endsection
