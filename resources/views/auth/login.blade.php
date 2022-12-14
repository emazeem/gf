@extends('layouts.master')
@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main">
        <section id="book-a-table" class="book-a-table">
            <div class="container">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="text-danger">{{$error}}</div>
                    @endforeach
                @endif
                @if(Session::has('error'))
                    <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @endif
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <form method="POST" action="{{ route('login') }}" class="php-email-form" id="login">
                            @csrf
                            <h4 class="mb-4"><i class="bi bi-lock"></i><span>Login</span></h4>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3 mt-md-0">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="Your Email"
                                           data-rule="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3 mt-md-0">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Your Password" data-rule="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="form-group mt-4 d-flex justify-content-end">
                                    <button type="submit" onclick="$('#login').submit()">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
