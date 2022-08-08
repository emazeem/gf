@extends('layouts.master')
@section('title') Blog @endsection
@section('content')
    <main id="main">

        <section id="menu" class="menu">
            <div class="container-fluid">

                <div class="section-title">
                    <h2>All <span>Blogs</span></h2>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consequatur excepturi praesentium tempore! Ab excepturi sint vel! Aliquam, aliquid aut, delectus ducimus facere, fugiat in ipsa molestias mollitia quam rem!

                </div>
                <div class="row">
                    <div class="col-md-9">
                        <section id="chefs" class="chefs" style="background-image: url('https://www.girlfriendsocial.com/blog/wp-content/uploads/2021/01/pinkbrickBackground.jpg')">
                            <div class="container">
                                <div class="section-title">
                                    @if(request()->tags)
                                    <h2>Blog related to <span>{{request()->tags}}</span></h2>
                                    @endif
                                </div>


                                <div class="row">
                                    @foreach($blogs as $blog)
                                    <div class="col-md-6">
                                        <div class="member">
                                            <div class="pic">
                                                <img src="{{$blog->thumbnail()}}" class="img-fluid" alt="">
                                            </div>
                                            <div class="member-info">
                                                <img src="{{$blog->profile()}}" width="40" height="40" class="img-fluid" alt="" style="border-radius: 50%;object-fit: cover">
                                                <h4>{{$blog->by}}</h4>

                                                <h6>{{$blog->title}}</h6>
                                                <span>
                                                    {{substr($blog->description,0,150)}}
                                                    @if(strlen($blog->description)>150)
                                                    [...]
                                                    @endif
                                                </span>
                                                <span class="text-muted mt-2">{{$blog->created_at->format('F d,y, h:i A')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                        </section><!-- End Chefs Section -->

                    </div>
                    <div class="col-md-3">
                        @foreach(array_count_values($tags) as $tag=>$k)
                            <div class="col-lg-12 menu-item filter-starters">
                                <div class="menu-content">
                                    <a href="{{route('w.blog',[$tag])}}">{{$tag}}</a><span>{{$k}}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section><!-- End Menu Section -->

    </main><!-- End #main -->

@endsection