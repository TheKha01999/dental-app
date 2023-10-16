@extends('admin.layout.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mt-4">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
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
                                <h3 class="card-title">Order Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table id="table-order" class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer</th>
                                            <th>Address</th>
                                            <th>Note</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $order->customer }}</td>
                                                <td>{{ $order->address }} </td>
                                                <td>{{ $order->note }} </td>
                                                <td>{{ $order->total }} </td>
                                                <td>{{ $order->status }} </td>
                                                <td>
                                                    <form class="d-inline"
                                                        action="{{ route('admin.orders.destroy', ['order' => $order->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button onclick="return confirm('Are u sure !')" type="submit"
                                                            name="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    @if (!is_null($order->deleted_at))
                                                        <a href="{{ route('admin.orders.restore', ['order' => $order->id]) }}"
                                                            class="btn btn-success">Restore</a>
                                                    @endif
                                                    <a href="{{ route('admin.order-items', ['order' => $order->id]) }}"
                                                        class="btn btn-primary">Detail</a>
                                                    <a href="{{ route('admin.payments', ['order' => $order->id]) }}"
                                                        class="btn btn-primary">Payment</a>
                                                    <a href="{{ route('admin.orders.update', ['order' => $order->id]) }}"
                                                        class="btn btn-warning">Update</a>
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
                                {{-- {{ $doctors->links('pagination::bootstrap-5') }} --}}
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('order_menu_open')
    menu-open
@endsection
@section('order_menu_active')
    active
@endsection
@section('js-custom')
    <script type="text/javascript">
        $('#table-order').dataTable({
            "pageLength": 4
        });
    </script>
@endsection
