@extends('admin.layout.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{-- session flash f5 trangg web tu mat, thong bao them thanh cong categoris list --}}
        @if (session('message'))
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 alert alert-success">
                            {{ session('message') }}
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
        @endif
        <!-- Main content -->
        <section class="content mt-2">
            <div class="container-fluid">
                <div class="row">
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
                </div>
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
