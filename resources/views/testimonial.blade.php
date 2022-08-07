@extends('layouts.master')
@section('title') Testimonials @endsection
@section('content')

    <main id="main">
        <!-- ======= Specials Section ======= -->
        <section id="specials" class="specials">
            <div class="container">

                <div class="section-title">
                    <h2>Frequently Asked  <span>Questions</span></h2>
                    <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            @foreach($categories as $k=>$category)
                            <li class="nav-item">
                                <a class="nav-link {{$k==0?'active show':''}}" data-bs-toggle="tab" href="#tab-{{$category->id}}">{{$category->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">
                            @foreach($categories as $k=> $category)
                            <div class="tab-pane {{$k==0?'active show':''}}" id="tab-{{$category->id}}">
                                <div class="row">
                                    @foreach($category->faq as $faq)
                                        <div class="col-lg-8 details order-2 order-lg-1">
                                            <h3>{{$faq->question}}</h3>
                                            <p class="fst-italic">
                                                {{$faq->answer}}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Specials Section -->

    </main><!-- End #main -->

@endsection