@extends('client.layout.master')
@section('title')
    Home
@endsection
@section('content')
    <!-- ============================ Slider ============================== -->
    <section class="slider">
        <div class="slick-carousel m-slides-0"
            data-slick='{"slidesToShow": 1, "arrows": true, "dots": false, "speed": 700,"fade": true,"cssEase": "linear"}'>
            <div class="slide-item align-v-h">
                <div class="bg-img">
                    <img src="{{ asset('assets/client/images/sliders/6.jpg') }}" alt="slide img" />
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
                            <div class="slide__content">
                                <span class="slide__subtitle">The Best Medical And General Practice Care!
                                </span>
                                <h2 class="slide__title">
                                    Vibrant Smile For Healthy Lifestyle!!
                                </h2>
                                <p class="slide__desc">
                                    The health and well-being of our patients and their health
                                    care team will always be our priority, so we follow the
                                    best practices for cleanliness.
                                </p>
                                <div class="d-flex flex-wrap align-items-center">
                                    <a href="services.html" class="btn btn__secondary btn__rounded mr-30">
                                        <span>Our Services</span>
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                    <a href="about-us.html" class="btn btn__white btn__rounded">
                                        <span>More About Us</span>
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- /.slide-content -->
                        </div>
                        <!-- /.col-xl-7 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.slide-item -->
            <div class="slide-item align-v-h">
                <div class="bg-img">
                    <img src="{{ asset('assets/client/images/sliders/7.jpg') }}" alt="slide img" />
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
                            <div class="slide__content">
                                <span class="slide__subtitle">The Best Medical And General Practice Care!
                                </span>
                                <h2 class="slide__title">Best Care For Dental Health!</h2>
                                <p class="slide__desc">
                                    The health and well-being of our patients and their health
                                    care team will always be our priority, so we follow the
                                    best practices for cleanliness.
                                </p>
                                <div class="d-flex flex-wrap align-items-center">
                                    <a href="services.html" class="btn btn__secondary btn__rounded mr-30">
                                        <span>Our Services</span>
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                    <a href="about-us.html" class="btn btn__white btn__rounded">
                                        <span>More About Us</span>
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- /.slide-content -->
                        </div>
                        <!-- /.col-xl-7 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.slide-item -->
        </div>
        <!-- /.carousel -->
    </section>
    <!-- /.slider -->

    <!-- ========================About Layout 4 =========================== -->
    <section class="about-layout4 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="heading-layout2">
                        <h3 class="heading__title mb-40">
                            Improving The Quality Of Your Life Through Better Health.
                        </h3>
                    </div>
                    <!-- /heading -->
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="about__Text">
                        <p class="mb-30">
                            Our goal is to deliver quality of care in a courteous,
                            respectful, and compassionate manner. We hope you will allow
                            us to care for you and to be the first and best choice for
                            healthcare.
                        </p>
                        <p class="mb-30">
                            We will work with you to develop individualised care plans,
                            including management of chronic diseases. We are committed to
                            being the region’s premier healthcare network providing
                            patient centered care that inspires clinical and service
                            excellence.
                        </p>
                        <div class="d-flex align-items-center mb-30">
                            <a href="doctors-grid.html" class="btn btn__primary btn__outlined btn__rounded mr-30">
                                Meet Our Doctors</a>
                            <img src="{{ asset('assets/client/images/about/singnture.png') }}" alt="singnture" />
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="video-banner">
                        <img src="{{ asset('assets/client/images/about/4.jpg') }}" alt="about" />
                        <a class="video__btn video__btn-white popup-video"
                            href="https://www.youtube.com/watch?v=UyfJsIbiSEk">
                            <div class="video__player">
                                <i class="fa fa-play"></i>
                            </div>
                        </a>
                    </div>
                    <!-- /.video-banner -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.About Layout 4 -->

    <!-- ======================Features Layout 1========================= -->
    <section class="features-layout1 pt-130 pb-50 mt--90">
        <div class="bg-img">
            <img src="{{ asset('assets/client/images/backgrounds/1.jpg') }}" alt="background" />
        </div>
        <div class="container">
            <div class="row mb-40">
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <div class="heading__layout2">
                        <h3 class="heading__title">
                            Providing Care for The Sickest In Community.
                        </h3>
                    </div>
                </div>
                <!-- /col-lg-5 -->
                <div class="col-sm-12 col-md-12 col-lg-5 offset-lg-1">
                    <p class="heading__desc font-weight-bold">
                        Medcity has been present in Europe since 1990, offering
                        innovative solutions, specializing in medical services for
                        treatment of medical infrastructure. With over 100 professionals
                        actively participates in numerous initiatives aimed at creating
                        sustainable change for patients!
                    </p>
                    <div class="d-flex flex-wrap align-items-center mt-40 mb-30">
                        <a href="appointment.html" class="btn btn__primary btn__rounded mr-30">
                            <span>Make Appointment</span>
                            <i class="icon-arrow-right"></i>
                        </a>
                        <a href="#" class="btn btn__secondary btn__link">
                            <i class="icon-arrow-right icon-filled"></i>
                            <span>Our Core Values</span>
                        </a>
                    </div>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- Feature item #1 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-heart"></i>
                                <i class="icon-heart feature__overlay-icon"></i>
                            </div>
                            <h4 class="feature__title">Medical Advices & Check Ups</h4>
                        </div>
                        <!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div>
                    <!-- /.feature-item -->
                </div>
                <!-- /.col-lg-3 -->
                <!-- Feature item #2 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-doctor"></i>
                                <i class="icon-doctor feature__overlay-icon"></i>
                            </div>
                            <h4 class="feature__title">Trusted Medical Treatment</h4>
                        </div>
                        <!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div>
                    <!-- /.feature-item -->
                </div>
                <!-- /.col-lg-3 -->
                <!-- Feature item #3 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-ambulance"></i>
                                <i class="icon-ambulance feature__overlay-icon"></i>
                            </div>
                            <h4 class="feature__title">Emergency Help Available 24/7</h4>
                        </div>
                        <!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div>
                    <!-- /.feature-item -->
                </div>
                <!-- /.col-lg-3 -->
                <!-- Feature item #4 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-drugs"></i>
                                <i class="icon-drugs feature__overlay-icon"></i>
                            </div>
                            <h4 class="feature__title">Medical Research Professionals</h4>
                        </div>
                        <!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div>
                    <!-- /.feature-item -->
                </div>
                <!-- /.col-lg-3 -->
                <!-- Feature item #5 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-first-aid-kit"></i>
                                <i class="icon-first-aid-kit feature__overlay-icon"></i>
                            </div>
                            <h4 class="feature__title">Only Qualified Doctors</h4>
                        </div>
                        <!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div>
                    <!-- /.feature-item -->
                </div>
                <!-- /.col-lg-3 -->
                <!-- Feature item #6 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-hospital"></i>
                                <i class="icon-hospital feature__overlay-icon"></i>
                            </div>
                            <h4 class="feature__title">
                                Cutting Edge <br />
                                Facility
                            </h4>
                        </div>
                        <!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div>
                    <!-- /.feature-item -->
                </div>
                <!-- /.col-lg-3 -->
                <!-- Feature item #7 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-expenses"></i>
                                <i class="icon-expenses feature__overlay-icon"></i>
                            </div>
                            <h4 class="feature__title">
                                Affordable Prices For All Patients
                            </h4>
                        </div>
                        <!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div>
                    <!-- /.feature-item -->
                </div>
                <!-- /.col-lg-3 -->
                <!-- Feature item #8 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-bandage"></i>
                                <i class="icon-bandage feature__overlay-icon"></i>
                            </div>
                            <h4 class="feature__title">Quality Care For Every Patient</h4>
                        </div>
                        <!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div>
                    <!-- /.feature-item -->
                </div>
                <!-- /.col-lg-3 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12 col-lg-6 offset-lg-3 text-center">
                    <p class="font-weight-bold mb-0">
                        Serve the community by improving the quality of life through
                        better health. We have put protocols to protect our patients and
                        staff while continuing to provide medically necessary care.
                        <a href="#" class="color-secondary">
                            <span>Contact Us For More Information</span>
                            <i class="icon-arrow-right"></i>
                        </a>
                    </p>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.Features Layout 1 -->

    <section class="services-layout1 pt-130">
        <div class="bg-img"><img src="{{ asset('assets/client/images/backgrounds/2.jpg') }}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                    <div class="heading text-center mb-60">
                        <h2 class="heading__subtitle">The Best Medical And General Practice Care!</h2>
                        <h3 class="heading__title">Our services at Medcity Dental.</h3>
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
                            <p class="service__desc">Pathology is the study of disease, it is the bridge between science
                                and
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

    <!-- ======================Team ========================= -->
    <section class="team-layout2 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                    <div class="heading text-center mb-40">
                        <h3 class="heading__title">Meet Our Doctors</h3>
                        <p class="heading__desc">
                            Our administration and support staff all have exceptional
                            people skills and trained to assist you with all medical
                            enquiries.
                        </p>
                    </div>
                    <!-- /.heading -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="slick-carousel"
                        data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                        <!-- Member #1 -->
                        <div class="member">
                            <div class="member__img">
                                <img src="{{ asset('assets/client/images/team/1.jpg') }}" alt="member img" />
                            </div>
                            <!-- /.member-img -->
                            <div class="member__info">
                                <h5 class="member__name">
                                    <a href="doctors-single-doctor1.html">Mike Dooley</a>
                                </h5>
                                <p class="member__job">Cardiology Specialist</p>
                                <p class="member__desc">
                                    Muldoone obtained his undergraduate degree in Biomedical
                                    Engineering at Tulane University prior to attending St
                                    George's University School of Medicine
                                </p>
                                <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                    <a href="doctors-single-doctor1.html"
                                        class="btn btn__secondary btn__link btn__rounded">
                                        <span>Read More</span>
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                    <ul class="social-icons list-unstyled mb-0">
                                        <li>
                                            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="phone"><i class="fas fa-phone-alt"></i></a>
                                        </li>
                                    </ul>
                                    <!-- /.social-icons -->
                                </div>
                            </div>
                            <!-- /.member-info -->
                        </div>
                        <!-- /.member -->
                        <!-- Member #2 -->
                        <div class="member">
                            <div class="member__img">
                                <img src="{{ asset('assets/client/images/team/2.jpg') }}" alt="member img" />
                            </div>
                            <!-- /.member-img -->
                            <div class="member__info">
                                <h5 class="member__name">
                                    <a href="doctors-single-doctor1.html">Dermatologists</a>
                                </h5>
                                <p class="member__job">Cardiology Specialist</p>
                                <p class="member__desc">
                                    Brian specializes in treating skin, hair, nail, and mucous
                                    membrane. He also address cosmetic issues, helping to
                                    revitalize the appearance of the skin
                                </p>
                                <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                    <a href="doctors-single-doctor1.html"
                                        class="btn btn__secondary btn__link btn__rounded">
                                        <span>Read More</span>
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                    <ul class="social-icons list-unstyled mb-0">
                                        <li>
                                            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="phone"><i class="fas fa-phone-alt"></i></a>
                                        </li>
                                    </ul>
                                    <!-- /.social-icons -->
                                </div>
                            </div>
                            <!-- /.member-info -->
                        </div>
                        <!-- /.member -->
                        <!-- Member #3 -->
                        <div class="member">
                            <div class="member__img">
                                <img src="{{ asset('assets/client/images/team/3.jpg') }}" alt="member img" />
                            </div>
                            <!-- /.member-img -->
                            <div class="member__info">
                                <h5 class="member__name">
                                    <a href="doctors-single-doctor1.html">Maria Andaloro</a>
                                </h5>
                                <p class="member__job">Pediatrician</p>
                                <p class="member__desc">
                                    Andaloro graduated from medical school and completed 3
                                    years residency program in pediatrics. She passed rigorous
                                    exams by the American Board of Pediatrics.
                                </p>
                                <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                    <a href="doctors-single-doctor1.html"
                                        class="btn btn__secondary btn__link btn__rounded">
                                        <span>Read More</span>
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                    <ul class="social-icons list-unstyled mb-0">
                                        <li>
                                            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="phone"><i class="fas fa-phone-alt"></i></a>
                                        </li>
                                    </ul>
                                    <!-- /.social-icons -->
                                </div>
                            </div>
                            <!-- /.member-info -->
                        </div>
                        <!-- /.member -->
                        <!-- Member #4 -->
                        <div class="member">
                            <div class="member__img">
                                <img src="{{ asset('assets/client/images/team/4.jpg') }}" alt="member img" />
                            </div>
                            <!-- /.member-img -->
                            <div class="member__info">
                                <h5 class="member__name">
                                    <a href="doctors-single-doctor1.html">Dupree Black</a>
                                </h5>
                                <p class="member__job">Urologist</p>
                                <p class="member__desc">
                                    Black diagnose and treat diseases of the urinary tract in
                                    both men and women. He also diagnose and treat anything
                                    involving the reproductive tract in men.
                                </p>
                                <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                    <a href="doctors-single-doctor1.html"
                                        class="btn btn__secondary btn__link btn__rounded">
                                        <span>Read More</span>
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                    <ul class="social-icons list-unstyled mb-0">
                                        <li>
                                            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="phone"><i class="fas fa-phone-alt"></i></a>
                                        </li>
                                    </ul>
                                    <!-- /.social-icons -->
                                </div>
                            </div>
                            <!-- /.member-info -->
                        </div>
                        <!-- /.member -->
                        <!-- Member #5 -->
                        <div class="member">
                            <div class="member__img">
                                <img src="{{ asset('assets/client/images/team/5.jpg') }}" alt="member img" />
                            </div>
                            <!-- /.member-img -->
                            <div class="member__info">
                                <h5 class="member__name">
                                    <a href="doctors-single-doctor1.html">Markus skar</a>
                                </h5>
                                <p class="member__job">Laboratory</p>
                                <p class="member__desc">
                                    Skar play a very important role in your health care.
                                    People working in the clinical laboratory are responsible
                                    for conducting tests that provide crucial information.
                                </p>
                                <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                    <a href="doctors-single-doctor1.html"
                                        class="btn btn__secondary btn__link btn__rounded">
                                        <span>Read More</span>
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                    <ul class="social-icons list-unstyled mb-0">
                                        <li>
                                            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="phone"><i class="fas fa-phone-alt"></i></a>
                                        </li>
                                    </ul>
                                    <!-- /.social-icons -->
                                </div>
                            </div>
                            <!-- /.member-info -->
                        </div>
                        <!-- /.member -->
                        <!-- Member #6 -->
                        <div class="member">
                            <div class="member__img">
                                <img src="{{ asset('assets/client/images/team/6.jpg') }}" alt="member img" />
                            </div>
                            <!-- /.member-img -->
                            <div class="member__info">
                                <h5 class="member__name">
                                    <a href="doctors-single-doctor1.html">Kiano Barker</a>
                                </h5>
                                <p class="member__job">Pathologist</p>
                                <p class="member__desc">
                                    Barker help care for patients every day by providing their
                                    doctors with the information needed to ensure appropriate
                                    care. He also valuable resources for other physicians.
                                </p>
                                <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                    <a href="doctors-single-doctor1.html"
                                        class="btn btn__secondary btn__link btn__rounded">
                                        <span>Read More</span>
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                    <ul class="social-icons list-unstyled mb-0">
                                        <li>
                                            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="phone"><i class="fas fa-phone-alt"></i></a>
                                        </li>
                                    </ul>
                                    <!-- /.social-icons -->
                                </div>
                            </div>
                            <!-- /.member-info -->
                        </div>
                        <!-- /.member -->
                    </div>
                    <!-- /.carousel -->
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.Team -->

    <!-- ==========================contact layout 5=========================== -->
    <section class="contact-layout5 bg-overlay bg-overlay-blue-gradient pb-60">
        <div class="bg-img">
            <img src="{{ asset('assets/client/images/banners/3.jpg') }}" alt="banner" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-5 d-flex flex-column justify-content-between">
                    <div>
                        <div class="heading heading-light mb-30">
                            <h3 class="heading__title mb-30">
                                Committed To Build A Positive, Safe, Patient Focused
                                Culture.
                            </h3>
                            <p class="heading__desc">
                                Today the hospital is recognised as a world renowned
                                institution, not only providing outstanding care and
                                treatment, our goal is to deliver quality care in a
                                respectful & compassionate manner. We strive to be the first
                                and best choice for healthcare.
                            </p>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="doctors-modern.html" class="btn btn__white btn__rounded mr-30">
                                <span>Find A Doctor</span> <i class="icon-arrow-right"></i>
                            </a>
                            <a href="contact-us.html" class="btn btn__white btn__outlined btn__rounded">Contact
                                Us</a>
                        </div>
                    </div>
                    <ul class="list-items list-items-layout2 list-items-light list-horizontal list-unstyled mb-50">
                        <li>Fractures and dislocations</li>
                        <li>Health Assessments</li>
                        <li>Desensitisation injections</li>
                        <li>High Quality Care</li>
                        <li>Home medicine review</li>
                    </ul>
                </div>
                <!-- /.col-lg-5 -->
                <div class="col-sm-12 col-md-12 col-lg-7">
                    <div class="contact-panel mb-50">
                        <form class="contact-panel__form" method="post" action="assets/php/contact.php"
                            id="contactForm">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="contact-panel__title">Book An Appointment</h4>
                                    <p class="contact-panel__desc mb-30">
                                        Please feel welcome to contact our friendly reception
                                        staff with any general or medical enquiry. Our doctors
                                        will receive or return any urgent calls.
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
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <i class="icon-user form-group-icon"></i>
                                        <select class="form-control">
                                            <option value="0">Choose Doctor</option>
                                            <option value="1">Ahmed Abdallah</option>
                                            <option value="2">Mahmoud Begha</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <i class="icon-news form-group-icon"></i>
                                        <input type="text" class="form-control" placeholder="Name" id="contact-name"
                                            name="contact-name" required />
                                    </div>
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <i class="icon-email form-group-icon"></i>
                                        <input type="email" class="form-control" placeholder="Email"
                                            id="contact-email" name="contact-email" required />
                                    </div>
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <i class="icon-phone form-group-icon"></i>
                                        <input type="text" class="form-control" placeholder="Phone"
                                            id="contact-Phone" name="contact-phone" required />
                                    </div>
                                </div>
                                <!-- /.col-lg-4 -->
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group form-group-date">
                                        <i class="icon-calendar form-group-icon"></i>
                                        <input type="date" class="form-control" id="contact-date" name="contact-date"
                                            required />
                                    </div>
                                </div>
                                <!-- /.col-lg-4 -->
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group form-group-date">
                                        <i class="icon-clock form-group-icon"></i>
                                        <input type="time" class="form-control" id="contact-time" name="contact-time"
                                            required />
                                    </div>
                                </div>
                                <!-- /.col-lg-4 -->
                                <div class="col-12">
                                    <button type="submit"
                                        class="btn btn__primary btn__rounded btn__block btn__xhight mt-10">
                                        <span>Book Appointment</span>
                                        <i class="icon-arrow-right"></i>
                                    </button>
                                    <div class="contact-result"></div>
                                </div>
                                <!-- /.col-lg-12 -->
                            </div>
                            <!-- /.row -->
                        </form>
                    </div>
                </div>
                <!-- /.col-lg-7 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.contact layout 5 -->

    <!-- =========================Testimonials layout 2 =========================  -->
    <section class="testimonials-layout2 pt-130 pb-40">
        <div class="container">
            <div class="testimonials-wrapper">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <div class="heading-layout2">
                            <h3 class="heading__title">Inspiring Stories!</h3>
                        </div>
                        <!-- /.heading -->
                    </div>
                    <!-- /.col-lg-5 -->
                    <div class="col-sm-12 col-md-12 col-lg-7">
                        <div class="slider-with-navs">
                            <!-- Testimonial #1 -->
                            <div class="testimonial-item">
                                <h3 class="testimonial__title">
                                    “Their doctors include highly qualified practitioners who
                                    come from a range of backgrounds and bring with them a
                                    diversity of skills and special interests. They also have
                                    registered nurses on staff who are available to triage any
                                    urgent matters, and the administration and support staff
                                    all have exceptional people skills”
                                </h3>
                            </div>
                            <!-- /. testimonial-item -->
                            <!-- Testimonial #2 -->
                            <div class="testimonial-item">
                                <h3 class="testimonial__title">
                                    “Their doctors include highly qualified practitioners who
                                    come from a range of backgrounds and bring with them a
                                    diversity of skills and special interests. They also have
                                    registered nurses on staff who are available to triage any
                                    urgent matters, and the administration and support staff
                                    all have exceptional people skills”
                                </h3>
                            </div>
                            <!-- /. testimonial-item -->
                            <!-- Testimonial #3 -->
                            <div class="testimonial-item">
                                <h3 class="testimonial__title">
                                    “Their doctors include highly qualified practitioners who
                                    come from a range of backgrounds and bring with them a
                                    diversity of skills and special interests. They also have
                                    registered nurses on staff who are available to triage any
                                    urgent matters, and the administration and support staff
                                    all have exceptional people skills”
                                </h3>
                            </div>
                            <!-- /. testimonial-item -->
                        </div>
                        <!-- /.slick-carousel -->
                        <div class="slider-nav mb-60">
                            <div class="testimonial__meta">
                                <div class="testimonial__thmb">
                                    <img src="{{ asset('assets/client/images/testimonials/thumbs/1.png') }}"
                                        alt="author thumb" />
                                </div>
                                <!-- /.testimonial-thumb -->
                                <div>
                                    <h4 class="testimonial__meta-title">Sami Wade</h4>
                                    <p class="testimonial__meta-desc">7oroof Inc</p>
                                </div>
                            </div>
                            <!-- /.testimonial-meta -->
                            <div class="testimonial__meta">
                                <div class="testimonial__thmb">
                                    <img src="{{ asset('assets/client/images/testimonials/thumbs/2.png') }}"
                                        alt="author thumb" />
                                </div>
                                <!-- /.testimonial-thumb -->
                                <div>
                                    <h4 class="testimonial__meta-title">Ahmed</h4>
                                    <p class="testimonial__meta-desc">Web Inc</p>
                                </div>
                            </div>
                            <!-- /.testimonial-meta -->
                            <div class="testimonial__meta">
                                <div class="testimonial__thmb">
                                    <img src="{{ asset('assets/client/images/testimonials/thumbs/3.png') }}"
                                        alt="author thumb" />
                                </div>
                                <!-- /.testimonial-thumb -->
                                <div>
                                    <h4 class="testimonial__meta-title">Sonia Blake</h4>
                                    <p class="testimonial__meta-desc">Web Inc</p>
                                </div>
                            </div>
                            <!-- /.testimonial-meta -->
                        </div>
                        <!-- /.slider-nav -->
                    </div>
                    <!-- /.col-lg-7 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.testimonials-wrapper -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.testimonials layout 2 -->

    <!-- ========================gallery=========================== -->
    <section class="gallery pt-0 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="slick-carousel"
                        data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "autoplay": true, "arrows": true, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                        <a class="popup-gallery-item" href="{{ asset('assets/client/images/gallery/1.jpg') }}">
                            <img src="{{ asset('assets/client/images/gallery/1.jpg') }}" alt="gallery img" />
                        </a>
                        <a class="popup-gallery-item" href="{{ asset('assets/client/images/gallery/2.jpg') }}">
                            <img src="{{ asset('assets/client/images/gallery/2.jpg') }}" alt="gallery img" />
                        </a>
                        <a class="popup-gallery-item" href="{{ asset('assets/client/images/gallery/3.jpg') }}">
                            <img src="{{ asset('assets/client/images/gallery/3.jpg') }}" alt="gallery img" />
                        </a>
                        <a class="popup-gallery-item" href="{{ asset('assets/client/images/gallery/4.jpg') }}">
                            <img src="{{ asset('assets/client/images/gallery/4.jpg') }}" alt="gallery img" />
                        </a>
                        <a class="popup-gallery-item" href="{{ asset('assets/client/images/gallery/5.jpg') }}">
                            <img src="{{ asset('assets/client/images/gallery/5.jpg') }}" alt="gallery img" />
                        </a>
                        <a class="popup-gallery-item" href="{{ asset('assets/client/images/gallery/6.jpg') }}">
                            <img src="{{ asset('assets/client/images/gallery/6.jpg') }}" alt="gallery img" />
                        </a>
                    </div>
                    <!-- /.gallery-images-wrapper -->
                </div>
                <!-- /.col-xl-5 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.gallery 2 -->
@endsection
