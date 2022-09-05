@extends('layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main">
        <section id="book-a-table" class="book-a-table">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h3>Sign Up For Free On Girlfriend Vibez</h3>

                        <h6> Welcome to Girlfriend Vibez - The Largest Women Only Friendship Website In The World</h6>
                        <p>
                            You are only minutes away from meeting new local ladies in your area who want to be friends.
                            Everyone who is a women over 18 can join.. So let's get started on your path to making new
                            friends.
                        </p>
                        <form method="POST" action="{{ route('user.basic.info.store') }}" class="php-email-form" id="basic-info-form">
                            @csrf
                            <div class="row mb-3">
                                <h4>PROFILE INFORMATION</h4>
                            </div>
                            <div class="row mb-3">
                                <label for="gender" class="col-md-3 col-form-label ">{{ __('Gender') }}</label>

                                <div class="col-md-9">
                                    <label for="gender">This site is for *WOMEN ONLY*</label>
                                    <select id="gender" type="text"
                                            class="form-control @error('gender') is-invalid @enderror" name="gender"
                                            value="{{ old('gender') }}">
                                        <option hidden disabled selected>(Select gender)</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="gender" class="col-md-3 col-form-label ">{{ __('Hear About Us') }}</label>

                                <div class="col-md-9">
                                    <label for="hear_about">Where did you hear about us from?</label>
                                    <select id="hear_about" type="text"
                                            class="form-control @error('hear_about') is-invalid @enderror" name="hear_about"
                                            value="{{ old('hear_about') }}">

                                        <option hidden disabled selected>(Select an option)</option>
                                        <option value="55">Search Engine</option>
                                        <option value="56">Friend</option>
                                        <option value="57">News/Media</option>
                                        <option value="58">Craigslist</option>
                                        <option value="61">Flyer/Poster</option>
                                        <option value="62">Other</option>
                                        <option value="302">Social Media</option>


                                    </select>
                                    @error('hear_about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="location" class="col-md-3 col-form-label ">{{ __('Location') }}</label>

                                <div class="col-md-9">
                                    <input id="location" type="text"
                                           class="form-control @error('location') is-invalid @enderror" name="location"
                                           value="{{ old('location') }}" autocomplete="email">

                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="dob" class="col-md-3 col-form-label ">{{ __('Date of Birth') }}</label>

                                <div class="col-md-9">
                                    <label for="dob">Enter in your Birthday - You must be at least 18 to use this site. We will only show your age on your profile not your actual birthday.</label>
                                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob">
                                    @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12 text-md-end">
                                    <button type="submit" class="btn btn-primary"
                                            onclick="$('#basic-info-form').submit()">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection