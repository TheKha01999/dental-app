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
                                <h3 class="card-title">Order Payment Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table id="table-order-payment" class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Method</th>
                                            <th>Total</th>
                                            <th>Note</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orderPayments as $orderPayment)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $orderPayment->payment_provider }}</td>
                                                <td>{{ $orderPayment->total }} </td>
                                                <td>{{ $orderPayment->note }} </td>
                                                <td>{{ $orderPayment->status }} </td>

                                                <td>
                                                    <form class="d-inline"
                                                        action="{{ route('admin.payments.destroy', ['id' => $orderPayment->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button onclick="return confirm('Are u sure !')" type="submit"
                                                            name="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    @if (!is_null($orderPayment->deleted_at))
                                                        <a href="{{ route('admin.payments.restore', ['id' => $orderPayment->id]) }}"
                                                            class="btn btn-success">Restore</a>
                                                    @endif
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
        $('#table-order-payment').dataTable({
            "pageLength": 4
        });
    </script>
@endsection
