@extends('client.layout.master')
@section('content')
    <!-- ========================
                                                                                                                                                                                       page title
                                                                                                                                                                                    =========================== -->
    <section class="page-title page-title-layout1 bg-overlay">
        <div class="bg-img"><img src="{{ asset('assets/client/images/page-titles/1.jpg') }}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                    <h1 class="pagetitle__heading">Caring For The Health & Well Being Of Family.</h1>
                    <p class="pagetitle__desc">Medcity has been present in Europe since 1990, offering innovative
                        solutions, specializing in medical services for treatment of medical infrastructure.
                    </p>
                    <div class="d-flex flex-wrap align-items-center">
                        <a href="appointment.html" class="btn btn__primary btn__rounded mr-30">
                            <span>Find A Doctor</span>
                            <i class="icon-arrow-right"></i>
                        </a>
                        <a href="services.html" class="btn btn__white btn__rounded">
                            <span>Our Services</span>
                            <i class="icon-arrow-right"></i>
                        </a>
                    </div>
                </div><!-- /.col-xl-5 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->


    <!-- ========================
                                                                                                                                                                              About Layout 1
                                                                                                                                                                            =========================== -->
    <section class="about-layout1 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="heading-layout2">
                        <h3 class="heading__title mb-40">Highly Qualified And Dedicated Doctor.</h3>
                    </div><!-- /heading -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="about__Text">
                        <p class="mb-30">Our goal is to deliver quality of care in a courteous, respectful, and
                            compassionate
                            manner. We hope you will allow us to care for you and to be the first and best choice for
                            healthcare.
                        </p>
                        <p class="mb-30">We will work with you to develop individualised care plans, including management
                            of
                            chronic diseases. We are committed to being the region’s premier healthcare network providing
                            patient
                            centered care that inspires clinical and service excellence.</p>
                    </div>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->

            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <img width="100%" src="{{ asset('assets/client/images/about/1.jpg') }}" alt="about">
                </div><!-- /.col-lg-6 -->
            </div>
        </div><!-- /.container -->
    </section><!-- /.About Layout 1 -->

    <section class="about-layout1 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="heading-layout2">
                        <h3 class="heading__title mb-40">The most modern and complete facilities.</h3>
                    </div><!-- /heading -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="about__Text">
                        <p class="mb-30">Our goal is to deliver quality of care in a courteous, respectful, and
                            compassionate
                            manner. We hope you will allow us to care for you and to be the first and best choice for
                            healthcare.
                        </p>
                        <p class="mb-30">We will work with you to develop individualised care plans, including management
                            of
                            chronic diseases. We are committed to being the region’s premier healthcare network providing
                            patient
                            centered care that inspires clinical and service excellence.</p>
                    </div>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->

            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <img width="100%" src="{{ asset('assets/client/images/about/2.jpg') }}" alt="about">
                </div><!-- /.col-lg-6 -->
            </div>
        </div><!-- /.container -->
    </section><!-- /.About Layout 1 -->

    <section class="about-layout1 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="heading-layout2">
                        <h3 class="heading__title mb-40">
                            Branches spread across the country.</h3>
                    </div><!-- /heading -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="about__Text">
                        <p class="mb-30">Our goal is to deliver quality of care in a courteous, respectful, and
                            compassionate
                            manner. We hope you will allow us to care for you and to be the first and best choice for
                            healthcare.
                        </p>
                        <p class="mb-30">We will work with you to develop individualised care plans, including management
                            of
                            chronic diseases. We are committed to being the region’s premier healthcare network providing
                            patient
                            centered care that inspires clinical and service excellence.</p>
                    </div>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->

            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <img width="100%" src="{{ asset('assets/client/images/about/3.jpg') }}" alt="about">
                </div><!-- /.col-lg-6 -->
            </div>
        </div><!-- /.container -->
    </section><!-- /.About Layout 1 -->
@endsection

@section('title')
    About
@endsection
