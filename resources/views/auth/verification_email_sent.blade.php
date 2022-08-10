@extends('layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main">
        <section id="book-a-table" class="book-a-table">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h3>A verification link has been sent to your email account</h3>
                        <p>
                            Please click on the link that has just sent to your email account to verify
                            your email and continue the registration process.
                            Check your spam mail if you don't see it.
                        </p>
                        <center>
                            <a href="{{url('')}}">Return to Home</a>
                        </center>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection