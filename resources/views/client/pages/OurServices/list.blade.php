@extends('client.layout.master')

@section('content')
    <!-- ========================
                                                                                                                   page title
                                                                                                                =========================== -->
    <section class="page-title page-title-layout2 bg-overlay text-center pb-0">
        <div class="bg-img"><img src="{{ asset('images/' . $service->image) }}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 offset-xl-2">
                    <div class="pagetitle__icon">
                        {{-- <i class="icon-microscope"></i> --}}
                        <i class="fas fa-tooth"></i>
                    </div>
                    <h1 class="pagetitle__heading"> {{ $service->title }}</h1>
                    <p class="pagetitle__desc mb-30"> {{ $service->description }}
                    </p>
                    <a href="#content" class="scroll-down"><i class="fas fa-long-arrow-alt-down"></i></a>
                </div><!-- /.col-xl-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->

    <section id="content" class=" pb-80">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="text-block mb-50 text-block__desc">
                        {!! $service->content !!}
                    </div><!-- /.text-block -->


                    <!-- ======================  Team========================= -->
                    <section class="team-layout2 pt-0 pb-30">
                        <div class="heading mb-40">
                            <h3 class="heading__title">Meet Our Doctors</h3>
                            <p class="heading__desc">Our administration and support staff all have exceptional people
                                skills and
                                trained to assist you with all medical enquiries.
                            </p>
                        </div><!-- /.heading -->
                        <div class="slick-carousel"
                            data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                            <!-- Member #1 -->
                            <div class="member">
                                <div class="member__img">
                                    <img src="assets/images/team/1.jpg" alt="member img">
                                </div><!-- /.member-img -->
                                <div class="member__info">
                                    <h5 class="member__name"><a href="doctors-single-doctor1.html">Mike Dooley</a></h5>
                                    <p class="member__job">Cardiology Specialist</p>
                                </div><!-- /.member-info -->
                            </div><!-- /.member -->
                            <!-- Member #2 -->
                            <div class="member">
                                <div class="member__img">
                                    <img src="assets/images/team/2.jpg" alt="member img">
                                </div><!-- /.member-img -->
                                <div class="member__info">
                                    <h5 class="member__name"><a href="doctors-single-doctor1.html">Dermatologists</a></h5>
                                    <p class="member__job">Cardiology Specialist</p>
                                </div><!-- /.member-info -->
                            </div><!-- /.member -->
                            <!-- Member #3 -->
                            <div class="member">
                                <div class="member__img">
                                    <img src="assets/images/team/3.jpg" alt="member img">
                                </div><!-- /.member-img -->
                                <div class="member__info">
                                    <h5 class="member__name"><a href="doctors-single-doctor1.html">Maria Andaloro</a></h5>
                                    <p class="member__job">Pediatrician</p>
                                </div><!-- /.member-info -->
                            </div><!-- /.member -->
                            <!-- Member #4 -->
                            <div class="member">
                                <div class="member__img">
                                    <img src="assets/images/team/4.jpg" alt="member img">
                                </div><!-- /.member-img -->
                                <div class="member__info">
                                    <h5 class="member__name"><a href="doctors-single-doctor1.html">Dupree Black</a></h5>
                                    <p class="member__job">Urologist</p>
                                </div><!-- /.member-info -->
                            </div><!-- /.member -->
                            <!-- Member #5 -->
                            <div class="member">
                                <div class="member__img">
                                    <img src="assets/images/team/5.jpg" alt="member img">
                                </div><!-- /.member-img -->
                                <div class="member__info">
                                    <h5 class="member__name"><a href="doctors-single-doctor1.html">Markus skar</a></h5>
                                    <p class="member__job">Laboratory</p>
                                </div><!-- /.member-info -->
                            </div><!-- /.member -->
                            <!-- Member #6 -->
                            <div class="member">
                                <div class="member__img">
                                    <img src="assets/images/team/6.jpg" alt="member img">
                                </div><!-- /.member-img -->
                                <div class="member__info">
                                    <h5 class="member__name"><a href="doctors-single-doctor1.html">Kiano Barker</a></h5>
                                    <p class="member__job">Pathologist </p>
                                </div><!-- /.member-info -->
                            </div><!-- /.member -->
                        </div><!-- /.carousel -->
                    </section><!-- /.Team -->
                </div><!-- /.col-lg-8 -->
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <aside class="sidebar has-marign-left sticky-top">
                        <div class="widget widget-services">
                            <h5 class="widget__title">Medical Services</h5>
                            <div class="widget-content">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($serviceCategories as $serviceCategory)
                                        <li><a href="{{ route('home.services', ['id' => $serviceCategory->id]) }}"><span>{{ $serviceCategory->name }}</span><i
                                                    class="icon-arrow-right"></i></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div><!-- /.widget-content -->
                        </div><!-- /.widget-services -->
                        <div class="widget widget-help bg-overlay bg-overlay-secondary-gradient">
                            <div class="bg-img"><img src="assets/images/banners/5.jpg" alt="background"></div>
                            <div class="widget-content">
                                <div class="widget__icon">
                                    <i class="icon-call3"></i>
                                </div>
                                <h4 class="widget__title">Emergency Cases</h4>
                                <p class="widget__desc">Please feel welcome to contact our friendly reception staff with
                                    any general
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
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
@endsection
@section('title')
    {{ $service->title }}
@endsection
