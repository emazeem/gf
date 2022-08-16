@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main">
        <div class="container">

            <div class="card mt-2">
                <div class="card-header">
                    <h4>My Settings</h4>
                </div>
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                               role="tab" aria-controls="nav-home" aria-selected="true">Subscription</a>


                            <a class="nav-item nav-link {{(Route::currentRouteName()=='settings.account.show')?'active':''}}">
                                Account Settings</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                               role="tab" aria-controls="nav-contact" aria-selected="false">Blocked Numbers</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                               role="tab" aria-controls="nav-contact" aria-selected="false">Email Notifications</a>


                            <a class="nav-item nav-link {{(Route::currentRouteName()=='settings.change.password.show')?'active':''}}"
                               href="{{route('settings.change.password.show')}}">Change Password</a>

                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                               role="tab" aria-controls="nav-contact" aria-selected="false">Delete Account</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        @if(Route::currentRouteName()=='settings.change.password.show')
                            <div class="tab-pane fade active show">
                                @include('user.settings.components.change_password')
                            </div>
                        @endif
                        @if(Route::currentRouteName()=='settings.account.show')
                            <div class="tab-pane fade active show">
                                @include('user.settings.components.account')
                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection