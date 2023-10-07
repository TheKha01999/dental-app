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
                    <a href="{{ route('home.appointment') }}" class="btn btn__primary btn__rounded">
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
                @foreach ($doctors as $doctor)
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="member">
                            <div class="member__img">
                                <img src="{{ asset('images/' . $doctor->image) }}" alt="member img">
                            </div><!-- /.member-img -->
                            <div class="member__info">
                                <h5 class="member__name"><a
                                        href="{{ route('home.singleDoctor', ['id' => $doctor->id]) }}">{{ $doctor->name }}</a>
                                </h5>
                                <p class="member__job">{{ $doctor->specialist }}</p>
                                @php
                                    $shortContent = $doctor->description;
                                    $shortContent = explode(' ', $shortContent);
                                    $shortContent = array_splice($shortContent, 0, 22);
                                    $shortContent = implode(' ', $shortContent);
                                @endphp
                                <p class="member__desc">{{ $shortContent }}...</p>
                                <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                    <a href="{{ route('home.singleDoctor', ['id' => $doctor->id]) }}"
                                        class="btn btn__secondary btn__link btn__rounded">
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
                @endforeach

            </div> <!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.Team layout 2  -->
@endsection
@section('title')
    Doctors
@endsection
