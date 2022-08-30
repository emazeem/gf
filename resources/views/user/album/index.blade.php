@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main">
        <div class="container">

            <div class="card mt-2">
                <div class="card-header">
                    <h4>Photo Albums</h4>
                </div>
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link {{(Route::currentRouteName()=='user.album.manage')?'active':''}}"
                               href="{{route('user.album.manage')}}"
                               role="tab" aria-controls="nav-home" aria-selected="true">My Albums</a>
                            <a class="nav-item nav-link {{(Route::currentRouteName()=='user.album.add')?'active':''}}"
                               href="{{route('user.album.add')}}">
                                Add New Photos</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        @if(Route::currentRouteName()=='user.album.manage')
                            <div class="tab-pane fade active show">
                                @include('user.album.components.manage')
                            </div>
                        @endif
                        @if(Route::currentRouteName()=='user.album.add')
                            <div class="tab-pane fade active show">
                                @include('user.album.components.add')
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection