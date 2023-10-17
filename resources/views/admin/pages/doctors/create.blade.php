@extends('admin.layout.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content mt-4">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create Doctor</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ route('admin.doctors.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Doctor's Name</label>
                                        <input name="name" type="text" value="{{ old('name') }}"
                                            class="form-control" id="name" placeholder="Enter name">
                                        @error('name')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" cols="30" rows="10" placeholder="Enter description"
                                            class="form-control">{{ old('description') }}</textarea>

                                        @error('description')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="biography">Biography</label>
                                        <textarea name="biography" id="biography" cols="30" rows="10" placeholder="Enter biography"
                                            class="form-control">{{ old('biography') }}</textarea>

                                        @error('biography')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="custom-select" name="status">
                                            <option value="">---Please Select---</option>
                                            <option {{ old('status') === '1' ? 'selected' : '' }} value="1">Show
                                            </option>
                                            <option {{ old('status') === '0' ? 'selected' : '' }} value="0">Hide
                                            </option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Service_Category</label>
                                        <select class="custom-select" name="service_categories_id">
                                            <option value="">--Service Category--</option>
                                            @foreach ($serviceCategories as $serviceCategory)
                                                <option
                                                    {{ old('service_categories_id') == $serviceCategory->id ? 'selected' : '' }}
                                                    value="{{ $serviceCategory->id }}">{{ $serviceCategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('service_categories_id')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Branchs</label>
                                        <select class="custom-select" name="branch_id">
                                            <option value="">--Branchs--</option>
                                            @foreach ($branchs as $branch)
                                                <option {{ old('branch_id') == $branch->id ? 'selected' : '' }}
                                                    value="{{ $branch->id }}">{{ $branch->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('branch_id')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="image">Doctor Image</label>
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
                                    <button type="submit" class="btn btn-primary">Create</button>
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

@section('title')
    Admin | Create Doctor
@endsection

@section('doctor_create_menu_open')
    menu-open
@endsection
@section('doctor_create_menu_active')
    active
@endsection

@section('js-custom')
    <script>
        ClassicEditor
            .create(document.querySelector('#biography'), {
                ckfinder: {
                    // Upload the images to the server using the CKFinder QuickUpload command.
                    uploadUrl: '{{ route('admin.doctors.ckedit.upload.image') . '?_token=' . csrf_token() }}'
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
