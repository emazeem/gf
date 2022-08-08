@extends('layouts.master')
@section('title') Testimonials @endsection
@section('content')

    <main id="main">
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="section-title">
                    <h2>Privacy Policy</h2>
                    <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas
                        atque vitae autem.</p>
                </div>

                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-10">
                            <div class="box">
                                {!! $privacy->value !!}
                            </div>
                        </div>
                    </div>

            </div>
        </section><!-- End Whu Us Section -->

    </main><!-- End #main -->

@endsection