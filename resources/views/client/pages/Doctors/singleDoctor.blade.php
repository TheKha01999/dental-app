@extends('client.layout.master')

@section('content')
    <section class="page-title page-title-layout5">
        <div class="bg-img"><img src="{{ asset('assets/client/images/backgrounds/6.jpg') }}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="pagetitle__heading">{{ $doctor->name }}</h1>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('home.allDoctors') }}">Doctors</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $doctor->name }}</li>
                        </ol>
                    </nav>
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->

    <section class="pt-120 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <aside class="sidebar has-marign-right sticky-top">
                        <div class="widget widget-member">
                            <div class="member mb-0">
                                <div class="member__img">
                                    <img src="{{ asset('images/' . $doctor->image) }}" alt="member img">
                                </div><!-- /.member-img -->
                                <div class="member__info">
                                    <h5 class="member__name"><a href="doctors-single-doctor1.html">{{ $doctor->name }}</a>
                                    </h5>
                                    <p class="member__job">{{ $doctor->specialist }}</p>
                                    <p class="member__desc">{{ $doctor->description }}</p>
                                    <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                        <ul class="social-icons list-unstyled mb-0">
                                            <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                        </ul><!-- /.social-icons -->
                                    </div>
                                </div><!-- /.member-info -->
                            </div><!-- /.member -->
                        </div><!-- /.widget-member -->
                        <div class="widget widget-help bg-overlay bg-overlay-primary-gradient">
                            <div class="bg-img"><img src="assets/images/banners/5.jpg" alt="background"></div>
                            <div class="widget-content">
                                <div class="widget__icon">
                                    <i class="icon-call3"></i>
                                </div>
                                <h4 class="widget__title">Emergency Cases</h4>
                                <p class="widget__desc">Please feel welcome to contact our friendly reception staff with any
                                    general
                                    or medical enquiry call us.
                                </p>
                                <a href="tel:+201061245741" class="phone__number">
                                    <i class="icon-phone"></i> <span>01061245741</span>
                                </a>
                            </div><!-- /.widget-content -->
                        </div><!-- /.widget-help -->
                        <div class="widget widget-schedule">
                            <div class="widget-content">
                                <div class="widget__icon">
                                    <i class="icon-charity2"></i>
                                </div>
                                <h4 class="widget__title">Opening Hours</h4>
                                <ul class="time__list list-unstyled mb-0">
                                    <li><span>Monday - Friday</span><span>8.00 - 7:00 pm</span></li>
                                    <li><span>Saturday</span><span>9.00 - 10:00 pm</span></li>
                                    <li><span>Sunday</span><span>10.00 - 12:00 pm</span></li>
                                </ul>
                            </div><!-- /.widget-content -->
                        </div><!-- /.widget-schedule -->
                    </aside><!-- /.sidebar -->
                </div><!-- /.col-lg-4 -->
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="text-block mb-50">
                        {{ $doctor->biography }}
                    </div><!-- /.text-block -->

                    <section class="contact-layout4 bg-overlay bg-overlay-secondary-gradient pb-50 pb-50">
                        <div class="bg-img"><img src="assets/images/banners/3.jpg" alt="banner"></div>
                        <div class="contact-panel mb-0">
                            <form class="contact-panel__form" method="post" action="assets/php/contact.php"
                                id="contactForm">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="contact-panel__title">Book An Appointment</h4>
                                        <p class="contact-panel__desc mb-30">Please feel welcome to contact our friendly
                                            reception staff
                                            with any general or medical enquiry. Our doctors will receive or return any
                                            urgent calls.
                                        </p>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <i class="icon-widget form-group-icon"></i>
                                            <select class="form-control">
                                                <option value="0">Choose Clinic</option>
                                                <option value="1">Pathology Clinic</option>
                                                <option value="2">Pathology Clinic</option>
                                            </select>
                                        </div>
                                    </div><!-- /.col-lg-6 -->
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <i class="icon-user form-group-icon"></i>
                                            <select class="form-control">
                                                <option value="0">Choose Doctor</option>
                                                <option value="1">Ahmed Abdallah</option>
                                                <option value="2">Mahmoud Begha</option>
                                            </select>
                                        </div>
                                    </div><!-- /.col-lg-6 -->
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <i class="icon-news form-group-icon"></i>
                                            <input type="text" class="form-control" placeholder="Name" id="contact-name"
                                                name="contact-name" required>
                                        </div>
                                    </div><!-- /.col-lg-6 -->
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <i class="icon-email form-group-icon"></i>
                                            <input type="email" class="form-control" placeholder="Email"
                                                id="contact-email" name="contact-email" required>
                                        </div>
                                    </div><!-- /.col-lg-6 -->
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <i class="icon-phone form-group-icon"></i>
                                            <input type="text" class="form-control" placeholder="Phone"
                                                id="contact-Phone" name="contact-phone" required>
                                        </div>
                                    </div><!-- /.col-lg-4 -->
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group form-group-date">
                                            <i class="icon-calendar form-group-icon"></i>
                                            <input type="date" class="form-control" id="contact-date"
                                                name="contact-date" required>
                                        </div>
                                    </div><!-- /.col-lg-4 -->
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group form-group-date">
                                            <i class="icon-clock form-group-icon"></i>
                                            <input type="time" class="form-control" id="contact-time"
                                                name="contact-time" required>
                                        </div>
                                    </div><!-- /.col-lg-4 -->
                                    <div class="col-12">
                                        <button type="submit"
                                            class="btn btn__primary btn__rounded btn__block btn__xhight mt-10">
                                            <span>Book Appointment</span> <i class="icon-arrow-right"></i>
                                        </button>
                                        <div class="contact-result"></div>
                                    </div><!-- /.col-lg-12 -->
                                </div><!-- /.row -->
                            </form>
                        </div>
                    </section><!-- /.contact layout 2 -->
                </div><!-- /.col-lg-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
@endsection
@section('title')
    {{ $doctor->name }}
@endsection
