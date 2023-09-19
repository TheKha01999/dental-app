@extends('client.layout.master')

@section('content')
    <section class="page-title page-title-layout1 bg-overlay">
        <div class="bg-img"><img src="{{ asset('assets/client/images/page-titles/7.jpg') }}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                    <h1 class="pagetitle__heading">Providing Care for The Sickest In Community. </h1>
                    <p class="pagetitle__desc">Medcity has been present in Europe since 1990, offering innovative solutions,
                        specializing in medical services for treatment of medical infrastructure.
                    </p>
                    <a href="appointment.html" class="btn btn__primary btn__rounded">
                        <span>Make Appointment</span>
                        <i class="icon-arrow-right"></i>
                    </a>
                </div><!-- /.col-xl-5 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->

    <section class="team-layout2 pb-40">
        <div class="container">
            <div class="row">
                <!-- Member #1 -->
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="member">
                        <div class="member__img">
                            <img src="{{ asset('assets/client/images/team/1.jpg') }}" alt="member img">
                        </div><!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Mike Dooley</a></h5>
                            <p class="member__job">Cardiology Specialist</p>
                            <p class="member__desc">Muldoone obtained his undergraduate degree in Biomedical Engineering at
                                Tulane
                                University prior to attending St George's University School of Medicine</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
                                    <span>Read More</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul><!-- /.social-icons -->
                            </div>
                        </div><!-- /.member-info -->
                    </div><!-- /.member -->
                </div><!-- /.col-lg-4 -->
                <!-- Member #2 -->
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="member">
                        <div class="member__img">
                            <img src="{{ asset('assets/client/images/team/2.jpg') }}" alt="member img">
                        </div><!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Richard Muldoone</a></h5>
                            <p class="member__job">Cardiology Specialist</p>
                            <p class="member__desc">Brian specializes in treating skin, hair, nail, and mucous membrane. He
                                also
                                address cosmetic issues, helping to revitalize the appearance of the skin</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
                                    <span>Read More</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul><!-- /.social-icons -->
                            </div>
                        </div><!-- /.member-info -->
                    </div><!-- /.member -->
                </div><!-- /.col-lg-4 -->
                <!-- Member #3 -->
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="member">
                        <div class="member__img">
                            <img src="{{ asset('assets/client/images/team/3.jpg') }}" alt="member img">
                        </div><!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Maria Andaloro</a></h5>
                            <p class="member__job">Pediatrician</p>
                            <p class="member__desc">Andaloro graduated from medical school and completed 3 years residency
                                program
                                in pediatrics. She passed rigorous exams by the American Board of Pediatrics.</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
                                    <span>Read More</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul><!-- /.social-icons -->
                            </div>
                        </div><!-- /.member-info -->
                    </div><!-- /.member -->
                </div><!-- /.col-lg-4 -->
                <!-- Member #4 -->
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="member">
                        <div class="member__img">
                            <img src="{{ asset('assets/client/images/team/4.jpg') }}" alt="member img">
                        </div><!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Dupree Black</a></h5>
                            <p class="member__job">Urologist</p>
                            <p class="member__desc">Black diagnose and treat diseases of the urinary tract in both men and
                                women. He
                                also diagnose and treat anything involving the reproductive tract in men.</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
                                    <span>Read More</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul><!-- /.social-icons -->
                            </div>
                        </div><!-- /.member-info -->
                    </div><!-- /.member -->
                </div><!-- /.col-lg-4 -->
                <!-- Member #5 -->
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="member">
                        <div class="member__img">
                            <img src="{{ asset('assets/client/images/team/5.jpg') }}" alt="member img">
                        </div><!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Markus skar</a></h5>
                            <p class="member__job">Laboratory</p>
                            <p class="member__desc">Skar play a very important role in your health care. People working in
                                the
                                clinical laboratory are responsible for conducting tests that provide crucial information.
                            </p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
                                    <span>Read More</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul><!-- /.social-icons -->
                            </div>
                        </div><!-- /.member-info -->
                    </div><!-- /.member -->
                </div><!-- /.col-lg-4 -->
                <!-- Member #6 -->
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="member">
                        <div class="member__img">
                            <img src="{{ asset('assets/client/images/team/6.jpg') }}" alt="member img">
                        </div><!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Kiano Barker</a></h5>
                            <p class="member__job">Pathologist </p>
                            <p class="member__desc">Barker help care for patients every day by providing their doctors with
                                the
                                information needed to ensure appropriate care. He also valuable resources for other
                                physicians.</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
                                    <span>Read More</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul><!-- /.social-icons -->
                            </div>
                        </div><!-- /.member-info -->
                    </div><!-- /.member -->
                </div><!-- /.col-lg-4 -->
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="member">
                        <div class="member__img">
                            <img src="{{ asset('assets/client/images/team/7.jpg') }}" alt="member img">
                        </div><!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Kiano Barker</a></h5>
                            <p class="member__job">Pathologist </p>
                            <p class="member__desc">Barker help care for patients every day by providing their doctors with
                                the
                                information needed to ensure appropriate care. He also valuable resources for other
                                physicians.</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
                                    <span>Read More</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul><!-- /.social-icons -->
                            </div>
                        </div><!-- /.member-info -->
                    </div><!-- /.member -->
                </div><!-- /.col-lg-4 -->
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="member">
                        <div class="member__img">
                            <img src="{{ asset('assets/client/images/team/8.jpg') }}" alt="member img">
                        </div><!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Kiano Barker</a></h5>
                            <p class="member__job">Pathologist </p>
                            <p class="member__desc">Barker help care for patients every day by providing their doctors with
                                the
                                information needed to ensure appropriate care. He also valuable resources for other
                                physicians.</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
                                    <span>Read More</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul><!-- /.social-icons -->
                            </div>
                        </div><!-- /.member-info -->
                    </div><!-- /.member -->
                </div><!-- /.col-lg-4 -->
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="member">
                        <div class="member__img">
                            <img src="{{ asset('assets/client/images/team/9.jpg') }}" alt="member img">
                        </div><!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Kiano Barker</a></h5>
                            <p class="member__job">Pathologist </p>
                            <p class="member__desc">Barker help care for patients every day by providing their doctors with
                                the
                                information needed to ensure appropriate care. He also valuable resources for other
                                physicians.</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
                                    <span>Read More</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul><!-- /.social-icons -->
                            </div>
                        </div><!-- /.member-info -->
                    </div><!-- /.member -->
                </div><!-- /.col-lg-4 -->
            </div> <!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.Team layout 2  -->
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
