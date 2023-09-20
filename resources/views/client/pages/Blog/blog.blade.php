@extends('client.layout.master')

@section('content')
    <!-- ========================
                                                                                                                                                                                                                                       page title
                                                                                                                                                                                                                                    =========================== -->
    <section class="page-title page-title-layout5 bg-overlay">
        <div class="bg-img"><img src="{{ asset('assets/client/images/page-titles/8.jpg') }}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="pagetitle__heading">Health Essentials</h1>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ======================
                                                                                                                                                                                                                                        Blog Grid
                                                                                                                                                                                                                                      ========================= -->
    <section class="blog-grid">
        <div class="container">
            <div class="row">
                <!-- Post Item #1 -->
                @foreach ($blogs as $blog)
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="post-item">
                            <div class="post__img">
                                <a href="blog-single-post.html">
                                    <img src="{{ asset('assets/client/images/blog/grid/1.jpg') }}" alt="post image"
                                        loading="lazy">
                                </a>
                            </div><!-- /.post__img -->
                            <div class="post__body">
                                <div class="post__meta-cat">
                                    <a href="#">{{ $blog->blog_category_name }}</a>
                                </div><!-- /.blog-meta-cat -->
                                <div class="post__meta d-flex">
                                    <span class="post__meta-date">{{ $blog->created_at }}</span>
                                    <a class="post__meta-author" href="#">{{ $blog->author }}</a>
                                </div>
                                <h4 class="post__title"><a
                                        href="{{ route('home.blog.detail', ['id' => $blog->id]) }}">{{ $blog->title }}</a>
                                </h4>
                                @php
                                    $shortContent = $blog->short_description;
                                    $shortContent = explode(' ', $shortContent);
                                    $shortContent = array_splice($shortContent, 0, 15);
                                    $shortContent = implode(' ', $shortContent);
                                @endphp
                                <p class="post__desc">{{ $shortContent }} ...
                                </p>
                                <a href="{{ route('home.blog.detail', ['id' => $blog->id]) }}"
                                    class="btn btn__secondary btn__link btn__rounded">
                                    <span>Read More</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                            </div><!-- /.post__body -->
                        </div><!-- /.post-item -->
                    </div><!-- /.col-lg-4 -->
                @endforeach
            </div><!-- /.row -->
            <div class="row">
                <div class="col-12 text-center">
                    <nav class="pagination-area">
                        <ul class="pagination justify-content-center">
                            <li><a class="current" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#"><i class="icon-arrow-right"></i></a></li>
                        </ul>
                    </nav><!-- .pagination-area -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.blog Grid -->
@endsection

@section('title')
    Blog
@endsection


