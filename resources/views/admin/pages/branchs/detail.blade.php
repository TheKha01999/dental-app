@extends('admin.layout.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mt-4">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Update Branch Info</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ route('admin.branchs.update', ['branch' => $branch->id]) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Branch's Name</label>
                                        <input name="name" type="text" value="{{ $branch->name }}"
                                            class="form-control" id="name" placeholder="Enter name">
                                        {{-- loi tu truyen qa ben day --}}
                                        @error('name')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email of Branch</label>
                                        <input name="email" type="email" value="{{ $branch->email }}"
                                            class="form-control" id="email" placeholder="Enter email">

                                        @error('email')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone Contact</label>
                                        <input name="phone" type="number" value="{{ $branch->phone }}"
                                            class="form-control" id="phone" placeholder="Enter phone">

                                        @error('phone')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea name="address" id="address" cols="30" rows="10" placeholder="Enter address" class="form-control">{{ $branch->address }}</textarea>

                                        @error('address')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="custom-select" name="status">
                                            <option value="">---Please Select---</option>
                                            <option {{ $branch->status == '1' ? 'selected' : '' }} value="1">Show
                                            </option>
                                            <option {{ $branch->status == '0' ? 'selected' : '' }} value="0">Hide
                                            </option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Branch Image</label>
                                        <input name="image" type="file" class="form-control" id="image">
                                        @error('image')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
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
    Admin | Update Branch
@endsection
