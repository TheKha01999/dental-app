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
                                <h3 class="card-title">Product Category Table</h3>

                                <form class="form-inline ml-md-auto" action="{{ route('admin.product_categories.index') }}"
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
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($productCategories as $productCategory)
                                            <tr>
                                                <td>{{ $stt++ }}</td>
                                                <td>{{ $productCategory->name }}</td>
                                                <td>
                                                    <div
                                                        class="{{ $productCategory->status === 1 ? 'btn btn-success' : 'btn btn-danger' }}">
                                                        {{ $productCategory->status === 1 ? 'show' : 'hide' }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <form class="d-inline"
                                                        action="{{ route('admin.product_categories.destroy', ['product_category' => $productCategory->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button onclick="return confirm('Are u sure !')" type="submit"
                                                            name="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    <a href="{{ route('admin.product_categories.show', ['product_category' => $productCategory->id]) }}"
                                                        class="btn btn-primary">Detail</a>
                                                    @if (!is_null($productCategory->deleted_at))
                                                        <a href="{{ route('admin.product_categories.restore', ['product_category' => $productCategory->id]) }}"
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
                                {{ $productCategories->links('pagination::bootstrap-5') }}
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
@section('category_list_menu_open')
    menu-open
@endsection
@section('category_list_menu_active')
    active
@endsection
@section('title')
    Admin | Product Category
@endsection
