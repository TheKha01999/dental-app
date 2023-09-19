@extends('client.layout.master')

@section('content')
    <section class="page-title page-title-layout1 bg-overlay">
        <div class="bg-img"><img src="{{ asset('assets/client/images/page-titles/2.jpg') }}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                    <span class="pagetitle__subheading">Caring For The Health Of You And Your Family.</span>
                    <h1 class="pagetitle__heading">We Provide All Aspects Of Medical Practice For Your Whole Family!</h1>
                    <p class="pagetitle__desc">Medcity has been present in Europe since 1990, offering innovative
                        solutions, specializing in medical services for treatment of medical infrastructure.
                    </p>
                    <div class="d-flex flex-wrap align-items-center">
                        <a href="appointment.html" class="btn btn__secondary btn__rounded mr-30">
                            <span>Find A Doctor</span>
                            <i class="icon-arrow-right"></i>
                        </a>
                        <a href="about-us.html" class="btn btn__secondary btn__outlined btn__rounded">
                            <span>More About Us</span>
                        </a>
                    </div>
                </div><!-- /.col-xl-5 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->
    <section class="services-layout1 pt-130">
        <div class="bg-img"><img src="{{ asset('assets/client/images/backgrounds/2.jpg') }}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                    <div class="heading text-center mb-60">
                        <h2 class="heading__subtitle">The Best Medical And General Practice Care!</h2>
                        <h3 class="heading__title">Providing Medical Care For The Sickest In Our Community.</h3>
                    </div><!-- /.heading -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <div class="row">
                <!-- service item #1 -->
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="service-item">
                        <div class="service__icon">
                            <img src="{{ asset('assets/client/images/services/1.jpg') }}" alt="">
                        </div><!-- /.service__icon -->
                        <div class="service__content">
                            <h4 class="service__title">Neurology Clinic</h4>
                            <p class="service__desc">Some neurologists receive subspecialty training focusing on a
                                particular area
                                of
                                the fields, these training programs are called fellowships, and are one to two years.
                            </p>
                            <ul class="list-items list-items-layout1 list-unstyled">
                                <li>Neurocritical Care</li>
                                <li>Neuro Oncology</li>
                                <li>Geriatric Neurology</li>
                            </ul>
                            <a href="services-single.html" class="btn btn__secondary btn__outlined btn__rounded">
                                <span>Read More</span>
                                <i class="icon-arrow-right"></i>
                            </a>
                        </div><!-- /.service__content -->
                    </div><!-- /.service-item -->
                </div><!-- /.col-lg-4 -->
                <!-- service item #2 -->
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="service-item">
                        <div class="service__icon">
                            <img src="{{ asset('assets/client/images/services/2.jpg') }}" alt="">
                        </div><!-- /.service__icon -->
                        <div class="service__content">
                            <h4 class="service__title">Cardiology Clinic</h4>
                            <p class="service__desc">All cardiologists study the disorders of the heart, but the study of
                                adult and
                                child heart disorders are trained to take care of small children and adult heart disease.
                            </p>
                            <ul class="list-items list-items-layout1 list-unstyled">
                                <li>Neurocritical Care</li>
                                <li>Neuro Oncology</li>
                                <li>Geriatric Neurology</li>
                            </ul>
                            <a href="services-single.html" class="btn btn__secondary btn__outlined btn__rounded">
                                <span>Read More</span>
                                <i class="icon-arrow-right"></i>
                            </a>
                        </div><!-- /.service__content -->
                    </div><!-- /.service-item -->
                </div><!-- /.col-lg-4 -->
                <!-- service item #3 -->
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="service-item">
                        <div class="service__icon">
                            <img src="{{ asset('assets/client/images/services/3.jpg') }}" alt="">
                        </div><!-- /.service__icon -->
                        <div class="service__content">
                            <h4 class="service__title">Pathology Clinic</h4>
                            <p class="service__desc">Pathology is the study of disease, it is the bridge between science and
                                medicine.
                                Also it underpins every aspect of patient care, from diagnostic testing and treatment.
                            </p>
                            <ul class="list-items list-items-layout1 list-unstyled">
                                <li>Surgical Pathology</li>
                                <li>Histopathology</li>
                                <li>Cytopathology </li>
                            </ul>
                            <a href="services-single.html" class="btn btn__secondary btn__outlined btn__rounded">
                                <span>Read More</span>
                                <i class="icon-arrow-right"></i>
                            </a>
                        </div><!-- /.service__content -->
                    </div><!-- /.service-item -->
                </div><!-- /.col-lg-4 -->
                <!-- service item #4 -->
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="service-item">
                        <div class="service__icon">
                            <img src="{{ asset('assets/client/images/services/4.jpg') }}" alt="">
                        </div><!-- /.service__icon -->
                        <div class="service__content">
                            <h4 class="service__title">Laboratory Analysis</h4>
                            <p class="service__desc">Analyzing the radon or radon progeny concentrations with passive
                                devices, or
                                the
                                act of calibrating radon or radon progeny measurement devices.
                            </p>
                            <ul class="list-items list-items-layout1 list-unstyled">
                                <li>Newborn Care</li>
                                <li>Umbilical Cord Appearance </li>
                                <li>Repositioning Techniques</li>
                            </ul>
                            <a href="services-single.html" class="btn btn__secondary btn__outlined btn__rounded">
                                <span>Read More</span>
                                <i class="icon-arrow-right"></i>
                            </a>
                        </div><!-- /.service__content -->
                    </div><!-- /.service-item -->
                </div><!-- /.col-lg-4 -->
                <!-- service item #5 -->
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="service-item">
                        <div class="service__icon">
                            <img src="{{ asset('assets/client/images/services/5.jpg') }}" alt="">
                        </div><!-- /.service__icon -->
                        <div class="service__content">
                            <h4 class="service__title">Pediatric Clinic</h4>
                            <p class="service__desc">Pediatric providers see patients from birth into early adulthood to
                                make sure
                                children achieve stay healthy. Our care includes preventive health checkups.
                            </p>
                            <ul class="list-items list-items-layout1 list-unstyled">
                                <li>Clinical laboratory</li>
                                <li>Research Analyst</li>
                                <li>Quality Assurance</li>
                            </ul>
                            <a href="services-single.html" class="btn btn__secondary btn__outlined btn__rounded">
                                <span>Read More</span>
                                <i class="icon-arrow-right"></i>
                            </a>
                        </div><!-- /.service__content -->
                    </div><!-- /.service-item -->
                </div><!-- /.col-lg-4 -->
                <!-- service item #6 -->
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="service-item">
                        <div class="service__icon">
                            <img src="{{ asset('assets/client/images/services/6.jpg') }}" alt="">

                        </div><!-- /.service__icon -->
                        <div class="service__content">
                            <h4 class="service__title">Cardiac Clinic</h4>
                            <p class="service__desc">For people requiring additional follow up, the Cardiac Clinic provides
                                rapid
                                access to professionals specialized in diagnosing and treating heart disease.
                            </p>
                            <ul class="list-items list-items-layout1 list-unstyled">
                                <li>Macular degeneration</li>
                                <li>Diabetic retinopathy</li>
                                <li>Excessive tearing</li>
                            </ul>
                            <a href="services-single.html" class="btn btn__secondary btn__outlined btn__rounded">
                                <span>Read More</span>
                                <i class="icon-arrow-right"></i>
                            </a>
                        </div><!-- /.service__content -->
                    </div><!-- /.service-item -->
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.Services Layout 1 -->
@endsection
@section('title')
    Services
@endsection

@section('navbar_menu')
    <li class="nav__item has-dropdown">
        <a href="#" class="nav__item-link dropdown-toggle " data-toggle="dropdown">Blog</a>
        <ul class="dropdown-menu">
            @foreach ($blogCategories as $blogCategory)
                <li class="nav__item">
                    <a href="{{ route('home.blog', ['id' => $blogCategory->id]) }}"
                        class="nav__item-link">{{ $blogCategory->name }}</a>
                </li>
                <!-- /.nav-item -->
            @endforeach
        </ul>
        <!-- /.dropdown-menu -->
    </li>
@endsection

@section('navbar_services')
    <li class="nav__item has-dropdown">
        <a data-toggle="dropdown" href="#" class="dropdown-toggle nav__item-link">Services
        </a>
        <ul class="dropdown-menu">
            <li class="nav__item">
                <a href="departments.html" class="nav__item-link">Orthodontic</a>
            </li>
            <!-- /.nav-item -->
            <li class="nav__item">
                <a href="departments-single.html" class="nav__item-link">Implant</a></a>
            </li>
            <!-- /.nav-item -->
            <li class="nav__item">
                <a href="departments-single.html" class="nav__item-link">Porcelain Crowns</a></a>
            </li>
            <!-- /.nav-item -->
            <li class="nav__item">
                <a href="departments-single.html" class="nav__item-link">Ceramic Veneer</a></a>
            </li>
            <!-- /.nav-item -->
            <li class="nav__item">
                <a href="departments-single.html" class="nav__item-link">Gummy Smile</a></a>
            </li>
            <!-- /.nav-item -->
            <li class="nav__item">
                <a href="departments-single.html" class="nav__item-link">Wisdom teeth</a></a>
            </li>
            <!-- /.nav-item -->
        </ul>
        <!-- /.dropdown-menu -->
    </li>
@endsection
