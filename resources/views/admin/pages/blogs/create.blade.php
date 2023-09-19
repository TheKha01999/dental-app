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
                                <h3 class="card-title">Create New Blog</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ route('admin.blogs.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="author">Author</label>
                                        <input name="author" type="text" value="{{ old('author') }}"
                                            class="form-control" id="name" placeholder="Enter author's name">
                                        @error('author')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="author_image">Choose Author Image</label>
                                        <input name="author_image" type="file" value="{{ old('author_image') }}"
                                            class="form-control" id="author_image">
                                        @error('author_image')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input name="title" type="text" value="{{ old('title') }}"
                                            class="form-control" id="title" placeholder="Enter title">
                                        @error('title')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="blog_image">Choose Blog Image</label>
                                        <input name="blog_image" type="file" value="{{ old('blog_image') }}"
                                            class="form-control" id="blog_image">
                                        @error('blog_image')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input name="slug" type="text" value="{{ old('slug') }}"
                                            class="form-control" id="slug" placeholder="a-b-c">
                                        @error('slug')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea name="content" id="content" cols="30" rows="10" placeholder="Your blog content"
                                            class="form-control">{{ old('content') }}</textarea>
                                        @error('content')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="short_description">Short Description</label>
                                        <textarea name="short_description" id="short_description" cols="30" rows="10" placeholder="short_description"
                                            class="form-control">{{ old('short_description') }}</textarea>
                                        @error('short_description')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="author_description">Author_Description</label>
                                        <textarea name="author_description" id="author_description" cols="30" rows="10"
                                            placeholder="Enter author_description" class="form-control">{{ old('author_description') }}</textarea>

                                        @error('author_description')
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
                                        <label>Blog_Category</label>
                                        <select class="custom-select" name="blog_categories_id">
                                            <option value="">--Blog Category--</option>
                                            @foreach ($blogCategories as $blogCategory)
                                                <option
                                                    {{ old('blog_categories_id') == $blogCategory->id ? 'selected' : '' }}
                                                    value="{{ $blogCategory->id }}">{{ $blogCategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('blog_categories_id')
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

@section('blog_create_menu_open')
    menu-open
@endsection
@section('blog_create_menu_active')
    active
@endsection

@section('js-custom')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#title').on('keyup', function() {
                var title = $('#title').val();

                $.ajax({
                    method: "POST", //method of form
                    url: "{{ route('admin.blogs.create.slug') }}", //action of form
                    data: {
                        'title': title,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#slug').val(response.slug);
                    }
                });
            });
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'), {
                ckfinder: {
                    // Upload the images to the server using the CKFinder QuickUpload command.
                    uploadUrl: '{{ route('admin.blogs.ckedit.upload.image') . '?_token=' . csrf_token() }}'
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
