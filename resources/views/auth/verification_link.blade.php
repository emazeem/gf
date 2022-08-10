@extends('layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main">
        <section id="book-a-table" class="book-a-table">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        @if($user->email_verified_at)
                                <h3>Your account is verified successfully through the verification link sent to your email </h3>
                                <center>
                                    <a href="{{url('login')}}">Click to Login</a>
                                </center>
                        @else
                            <h3>Please try again </h3>
                            <p>
                                The details in verification link are not correct. Please click on the verification link sent to your email.
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection