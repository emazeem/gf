@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-12">
                    <div class="card-header">
                        <h4 class="c-color">You Can Not Access This Page...</h4>
                        <h4 class="c-color">Looks Like You Need To Complete Your Profile Girlfriend It is only {{auth()->user()->profileCompletePercentage()}} % complete</h4>
                        <h5>** Please take a moment to fill out your profile. **</h5>
                    </div>
                    <div class="card-body">
                        <p>We need to have all your interests and likes so we can match you with the best possible friendship matches. Take a few moments for you and do this part right. You won't be able to access the rest of the website until you do!</p>
                        <div class="d-flex">
                            <a href="{{route('user.profile.edit',[auth()->user()->username])}}">Click here to finish completing your profile.</a>
                        </div>
                        <a href="{{URL::previous()}}"><i class="bi bi-arrow-left"></i> Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection