@extends('layouts.master')
@section('title') Testimonials @endsection
@section('content')

    <main id="main">
        <section>
            <div class="container">
                <div class="section-title">
                    <h2>Your Safety Is Important!</h2>
                    <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas
                        atque vitae autem.</p>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box">
                            {!! $press->value !!}
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Whu Us Section -->

    </main><!-- End #main -->

@endsection