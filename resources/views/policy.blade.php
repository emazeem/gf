@extends('layouts.master')
@section('title') Testimonials @endsection
@section('content')

    <main id="main">
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="section-title">
                    <h2>Testimonials</h2>
                    <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas
                        atque vitae autem.</p>
                </div>

                @foreach($testimonials as $k=>$testimonial)
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="box">
                                <span>{{str_pad($k+1,2,0,STR_PAD_LEFT)}}</span>
                                <div class="text-center">
                                    <img src="{{$testimonial->profile()}}" class="testimonial-img" width="100"
                                         height="100" style="object-fit: cover;border-radius: 50%" alt="">
                                    <h4>{{$testimonial->name}}</h4>
                                </div>
                                <p>{{$testimonial->feedback}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </section><!-- End Whu Us Section -->

    </main><!-- End #main -->

@endsection