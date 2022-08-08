@extends('layouts.master')
@section('title') Home @endsection
@section('content')
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <!-- Slide 1 -->
                    @foreach($sliders as $k=>$slider)
                    <div class="carousel-item {{$k==0?'active':''}}" style="background-image: url({{$slider->image()}});">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">{{$slider->title}}</h2>
                                <p class="animate__animated animate__fadeInUp">{{$slider->description}}</p>
                                <div>
                                    <a href="{{route('register')}}" class="btn-menu animate__animated animate__fadeInUp scrollto">Free Signup</a>
                                    <a href="{{route('login')}}" class="btn-book animate__animated animate__fadeInUp scrollto">Member Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">


        @if($section1)
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-10">
                        <div class="content">
                            {!! $section1->value !!}
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End About Section -->
        @endif
        @if($section2)
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-10">
                        <div class="content">
                            {!! $section2->value !!}
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End About Section -->
        @endif
        @if($section3)
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-10">
                        <div class="content">
                            {!! $section3->value !!}
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End About Section -->
        @endif

        <!-- ======= Chefs Section ======= -->
        <section id="chefs" class="chefs">
            <div class="container">

                <div class="section-title">
                    <h2>Perks of <span>GFV</span></h2>
                    <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
                </div>

                <div class="row">
                    @foreach($thumbnails as $thumbnail)
                    <div class="col-lg-3 col-md-6">
                        <div class="member">
                            <div class="pic">
                                <img src="{{$thumbnail->image()}}" class="img-fluid" alt="" style="height: 300px">
                            </div>
                            <div class="member-info">
                                <h4>{{$thumbnail->title}}</h4>
                                <span>{{$thumbnail->description}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Chefs Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container position-relative">

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        @foreach($testimonials as $k=>$testimonial)

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="{{$testimonial->profile()}}" width="100" height="100" class="testimonial-img" alt="">
                                    <h3>{{$testimonial->name}}</h3>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        {{$testimonial->feedback}}
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach


                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->


    </main><!-- End #main -->

@endsection