@extends('admin.layout.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background:#fff">
        <!-- Content Header (Page header) -->
        @if (session('message'))
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">X</button>
                            {{ session('message') }}
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
        @endif
        <!-- Main content -->
        <section class="content mt-2" style="background:#fff">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Branch's Name</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($branchs as $branch)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $branch->name }}</td>
                                        <td>{{ $branch->address }}</td>
                                        <td>
                                            <div class="{{ $branch->status === 1 ? 'btn btn-success' : 'btn btn-danger' }}">
                                                {{ $branch->status === 1 ? 'show' : 'hide' }}
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('images/' . $branch->image) }}" alt="{{ $branch->name }}"
                                                width="50" />
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <form class="mr-1"
                                                    action="{{ route('admin.branchs.destroy', ['branch' => $branch->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button onclick="return confirm('Are u sure !')" type="submit"
                                                        name="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                                <a href="{{ route('admin.branchs.show', ['branch' => $branch->id]) }}"
                                                    class="btn btn-primary">Detail</a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $branchs->links('pagination::bootstrap-5') }} --}}
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('branch_list_menu_open')
    menu-open
@endsection
@section('branch_list_menu_active')
    active
@endsection
