@extends('layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main">
        <section id="book-a-table" class="book-a-table">
            <div class="container">
                <div class="row justify-content-center">
                    @if(Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                    @if(Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif
                    <div class="col-md-8">
                        <h3>A verification link has been sent to your email account</h3>
                        <p>
                            Please click on the link that has just sent to your email account to verify
                            your email and continue the registration process.
                            Check your spam mail if you don't see it.
                        </p>
                        <div class="col-md-12 d-flex justify-content-around align-items-center">
                            <button class="btn btn-danger c-bg rounded-5" onclick="$('#resend').submit();">Resend Verification Email</button>
                            <a href="{{url('')}}">Return to Home</a>
                            <form action="{{route('user.verification.resend')}}" method="post" id="resend">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection