@extends('admin.layout.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mt-4">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content ">
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
                                <h3 class="card-title">Blog Category Table</h3>

                                <form class="form-inline ml-md-auto" action="{{ route('admin.blog_categories.index') }}"
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
                                        @forelse ($blogCategories as $blogCategory)
                                            <tr>
                                                <td>{{ $stt++ }}</td>
                                                <td>{{ $blogCategory->name }}</td>
                                                <td>
                                                    <div
                                                        class="{{ $blogCategory->status === 1 ? 'btn btn-success' : 'btn btn-danger' }}">
                                                        {{ $blogCategory->status === 1 ? 'show' : 'hide' }}
                                                    </div>
                                                </td>

                                                <td>
                                                    <form class="d-inline"
                                                        action="{{ route('admin.blog_categories.destroy', ['blog_category' => $blogCategory->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button onclick="return confirm('Are u sure !')" type="submit"
                                                            name="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    <a href="{{ route('admin.blog_categories.show', ['blog_category' => $blogCategory->id]) }}"
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
                                {{ $blogCategories->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="card-title mr-3">Blog Categories</h3>
                                <form class="form-inline ml-3" action="{{ route('admin.blog_categories.index') }}"
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
                                        @forelse ($blogCategories as $blogCategory)
                                            <tr>
                                                <td>{{ $stt++ }}</td>
                                                <td>{{ $blogCategory->name }}</td>
                                                <td>
                                                    <div
                                                        class="{{ $blogCategory->status === 1 ? 'btn btn-success' : 'btn btn-danger' }}">
                                                        {{ $blogCategory->status === 1 ? 'show' : 'hide' }}
                                                    </div>
                                                </td>
                                                <td>{{ $blogCategory->created_at }}</td>
                                                <td>
                                                    <form class="d-inline"
                                                        action="{{ route('admin.blog_categories.destroy', ['blog_category' => $blogCategory->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button onclick="return confirm('Are u sure !')" type="submit"
                                                            name="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    <a href="{{ route('admin.blog_categories.show', ['blog_category' => $blogCategory->id]) }}"
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
                                {{ $blogCategories->links('pagination::bootstrap-5') }}
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
@section('blog_category_list_menu_open')
    menu-open
@endsection
@section('blog_category_list_menu_active')
    active
@endsection
