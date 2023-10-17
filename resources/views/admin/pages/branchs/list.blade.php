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
                                <h3 class="card-title">Branch Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
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
                                                    <div
                                                        class="{{ $branch->status === 1 ? 'btn btn-success' : 'btn btn-danger' }}">
                                                        {{ $branch->status === 1 ? 'show' : 'hide' }}
                                                    </div>
                                                </td>
                                                <td>
                                                    @php
                                                        $imagesLink = is_null($branch->image) || !file_exists('images/' . $branch->image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $branch->image);
                                                    @endphp
                                                    <img src="{{ $imagesLink }}" alt="{{ $branch->name }}"
                                                        width="50" />
                                                </td>
                                                <td>
                                                    <form class="d-inline"
                                                        action="{{ route('admin.branchs.destroy', ['branch' => $branch->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button onclick="return confirm('Are u sure !')" type="submit"
                                                            name="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    <a href="{{ route('admin.branchs.show', ['branch' => $branch->id]) }}"
                                                        class="btn btn-primary">Detail</a>
                                                    @if (!is_null($branch->deleted_at))
                                                        <a href="{{ route('admin.branchs.restore', ['branch' => $branch->id]) }}"
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
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                {{-- <div class="row">
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
                                            <div
                                                class="{{ $branch->status === 1 ? 'btn btn-success' : 'btn btn-danger' }}">
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
                        {{ $branchs->links('pagination::bootstrap-5') }}
                    </div>
                </div> --}}
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
@section('title')
    Admin | List Branch
@endsection
