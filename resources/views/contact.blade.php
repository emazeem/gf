@extends('layouts.master')
@section('title') Contact us @endsection
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
                            {!! $contact->value !!}
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Whu Us Section -->
        <section id="book-a-table" class="book-a-table">
            <div class="container">

                <div class="section-title">
                    <h2>Submit your <span>Query here</span></h2>
                    <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
                </div>

                <form action='#' method="post" role="form" class="php-email-form">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-3 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-3 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                    <div class="col-md-6 form-group mt-3">
                            <select class="form-control" name="type" id="type" data-rule="type" data-msg="Please enter a valid email">
                                <option hidden selected>-- Select an option</option>
                                <option value="Bug">Website Bug/Errors</option>
                                <option value="Upgrade">Gold/Platinum Member Question</option>
                                <option value="Sales">Sales/Advertising</option>
                                <option value="Job">Job Opportunities/Volunteering</option>
                                <option value="Feature">Feature Request</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                    </div>
                    <div class="row d-flex justify-content-center">

                    <div class="form-group col-md-6 mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>

            </div>
        </section>
    </main><!-- End #main -->

@endsection