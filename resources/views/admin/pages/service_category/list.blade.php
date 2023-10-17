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
                                <h3 class="card-title">Service Category Table</h3>

                                <form class="form-inline ml-md-auto" action="{{ route('admin.service_categories.index') }}"
                                    method="get">
                                    <div class="input-group input-group-sm">
                                        <input class="form-control" type="text" name='keyword' placeholder="Search"
                                            aria-label="Search" value="{{ $keyword }}">

                                        <select class="form-control" name="sortBy">
                                            <option selected>-- Select option --</option>
                                            <option {{ $sortBy === 'oldest' ? 'selected' : '' }} value="oldest">Oldest
                                            </option>
                                            <option {{ $sortBy === 'latest' ? 'selected' : '' }} value="latest">Latest
                                            </option>
                                        </select>
                                        <select class="form-control" name="status">
                                            <option value="">--Show/Hide--</option>
                                            <option {{ $status == '1' ? 'selected' : '' }} value="1">Show</option>
                                            <option {{ $status == '0' ? 'selected' : '' }} value="0">Hide</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($serviceCategories as $serviceCategory)
                                            <tr>
                                                <td>{{ $stt++ }}</td>
                                                <td>{{ $serviceCategory->name }}</td>
                                                <td>
                                                    @php
                                                        $imagesLink = is_null($serviceCategory->image) || !file_exists('images/' . $serviceCategory->image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $serviceCategory->image);
                                                    @endphp
                                                    <img src="{{ $imagesLink }}" alt="{{ $serviceCategory->name }}"
                                                        width="50" />
                                                </td>
                                                <td>
                                                    <div
                                                        class="{{ $serviceCategory->status === 1 ? 'btn btn-success' : 'btn btn-danger' }}">
                                                        {{ $serviceCategory->status === 1 ? 'show' : 'hide' }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <form class="d-inline"
                                                        action="{{ route('admin.service_categories.destroy', ['service_category' => $serviceCategory->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button onclick="return confirm('Are u sure !')" type="submit"
                                                            name="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    <a href="{{ route('admin.service_categories.show', ['service_category' => $serviceCategory->id]) }}"
                                                        class="btn btn-primary">Detail</a>
                                                    @if (!is_null($serviceCategory->deleted_at))
                                                        <a href="{{ route('admin.service_categories.restore', ['service_category' => $serviceCategory->id]) }}"
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
                                {{ $serviceCategories->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="card-title mr-3">Service Categories</h3>
                                <form class="form-inline ml-3" action="{{ route('admin.service_categories.index') }}"
                                    method="get">
                                    <div class="input-group input-group-sm">
                                        <input class="form-control" type="text" name='keyword' placeholder="Search"
                                            aria-label="Search" value="{{ $keyword }}">

                                        <select class="form-control" name="sortBy">
                                            <option selected>-- Select option --</option>
                                            <option {{ $sortBy === 'oldest' ? 'selected' : '' }} value="oldest">Oldest
                                            </option>
                                            <option {{ $sortBy === 'latest' ? 'selected' : '' }} value="latest">Latest
                                            </option>
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Created_at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($serviceCategories as $serviceCategory)
                                            <tr>
                                                <td>{{ $stt++ }}</td>
                                                <td>{{ $serviceCategory->name }}</td>
                                                <td>
                                                    <div
                                                        class="{{ $serviceCategory->status === 1 ? 'btn btn-success' : 'btn btn-danger' }}">
                                                        {{ $serviceCategory->status === 1 ? 'show' : 'hide' }}
                                                    </div>
                                                </td>
                                                <td>{{ $serviceCategory->created_at }}</td>
                                                <td>
                                                    <form class="d-inline"
                                                        action="{{ route('admin.service_categories.destroy', ['service_category' => $serviceCategory->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button onclick="return confirm('Are u sure !')" type="submit"
                                                            name="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    <a href="{{ route('admin.service_categories.show', ['service_category' => $serviceCategory->id]) }}"
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
                                {{ $serviceCategories->links('pagination::bootstrap-5') }}
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
@section('service_category_list_menu_open')
    menu-open
@endsection
@section('service_category_list_menu_active')
    active
@endsection
@section('title')
    Admin | Service Category
@endsection
