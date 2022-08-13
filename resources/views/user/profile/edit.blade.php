@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <main id="main" style="margin-top: 70px">
        <div class="container">
            <div class="card p-0" style="margin-top: 100px">
                <div class="card-header">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active rounded-0 px-5 border" href="{{route('user.profile.edit',[auth()->user()->username])}}"><i class="bi bi-person-rolodex"></i> Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0 px-5 border" href="{{route('user.profile.photo')}}"><i class="bi bi-camera"></i>
                                Edit My Photo
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h4 class="c-color">
                        Looks Like You Need To Complete Your Profile Girlfriend
                    </h4>
                    <h5>
                        It is only 7 % complete
                    </h5>
                    <h6>
                        Before you can use Girlfriend Social to meet new friends we need to find out more about you!
                    </h6>
                    <p>
                        Please use this section to complete your profile and you will then be able to gain access to the
                        website! Detailed, positive, fun and complete profiles will get you the best results.
                    </p>
                    <p>
                        There are 25 questions. There is always a do not wish to share option. Grab a coffee or a glass
                        of wine and take a few moments for *you* and do this part right. We want members who take
                        friendship searching serious, so you will not be able to access the rest of the website until
                        you completely fill out your profile out Girlfriend!
                    </p>
                    <h6>
                        Try following along the 4 steps below or try filling out : A Profile Photo as the next step in
                        completing your profile to 100%
                    </h6>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link border rounded-0 active" id="pills-basic-tab" data-toggle="pill"
                               href="#pills-basic" role="tab" aria-controls="pills-basic" aria-selected="true">Basic
                                Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border rounded-0" id="pills-personal-tab" data-toggle="pill"
                               href="#pills-personal" role="tab" aria-controls="pills-personal" aria-selected="false">Personal
                                Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border rounded-0" id="pills-about-tab" data-toggle="pill"
                               href="#pills-about" role="tab" aria-controls="pills-about" aria-selected="false">About
                                Me</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border rounded-0" id="pills-interests-tab" data-toggle="pill"
                               href="#pills-interests" role="tab" aria-controls="pills-interests" aria-selected="false">Interests</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-basic" role="tabpanel"
                             aria-labelledby="pills-basic-tab">
                            @include('user.profile.components.basic_html')
                        </div>
                        <div class="tab-pane fade" id="pills-personal" role="tabpanel"
                             aria-labelledby="pills-personal-tab">
                            @include('user.profile.components.personal_html')

                        </div>
                        <div class="tab-pane fade" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">
                            @include('user.profile.components.about_me_html')

                        </div>
                        <div class="tab-pane fade" id="pills-interests" role="tabpanel"
                             aria-labelledby="pills-interests-tab">

                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="hobbies" class="h4 c-h">Hobbies?
                                    </label><br>
                                    <label for="hobbies">
                                        Check off any of these hobbies that you are interested in
                                    </label>
                                    <input type="hidden" name="hobbies" id="hobbies">
                                    <div class="col-md-12 ">
                                        <ul class="c-select-single">

                                            <li>Antiques / furniture restoration</li>
                                            <li>Astrology</li>
                                            <li>Birds</li>
                                            <li>Cars</li>
                                            <li>Cats</li>
                                            <li>Crafts</li>
                                            <li>Creative writing</li>
                                            <li>Dogs</li>
                                            <li>Family / kids</li>
                                            <li>Fish / aquarium</li>
                                            <li>Gardening</li>
                                            <li>Gourmet cooking</li>
                                            <li>Home improvement</li>
                                            <li>Investing</li>
                                            <li>Motorcycles</li>
                                            <li>News / politics / Current events</li>
                                            <li>Painting</li>
                                            <li>Philosophy</li>
                                            <li>Photography</li>
                                            <li>Playing a musical instrument</li>
                                            <li>Scrapbooking</li>
                                            <li>Spirituality</li>
                                            <li>Shopping</li>
                                            <li>Traveling</li>
                                            <li>Vegetarianism / Vegan</li>
                                            <li>Volunteer/ Charity work</li>
                                            <li>Don't Have many Hobbies yet</li>

                                        </ul>
                                    </div>
                                    @error('hobbies')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="sports" class="h4 c-h">Sports
                                    </label><br>
                                    <label for="sports">
                                        Check which kind of Sports you Watch or Participate in.
                                    </label>
                                    <input type="hidden" name="sports" id="sports">
                                    <div class="col-md-12 ">
                                        <ul class="c-select-single">


                                            <li>Badminton</li>
                                            <li>Baseball</li>
                                            <li>Basketball</li>
                                            <li>Billiards</li>
                                            <li>Bowling</li>
                                            <li>Boxing/UFC/Kickboxing</li>
                                            <li>Cricket</li>
                                            <li>Couch Potato</li>
                                            <li>Dancing</li>
                                            <li>Extreme Sports</li>
                                            <li>Figure skating</li>
                                            <li>Football</li>
                                            <li>Golf</li>
                                            <li>Hockey</li>
                                            <li>Olympic sports</li>
                                            <li>Rugby</li>
                                            <li>Soccer</li>
                                            <li>Squash</li>
                                            <li>Tennis</li>
                                            <li>Volleyball</li>
                                            <li>Are you kidding? No Sports</li>

                                        </ul>
                                    </div>
                                    @error('sports')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="outdoors" class="h4 c-h">Fitness/ Outdoors
                                    </label><br>
                                    <label for="outdoors">
                                        Check Any activities that you enjoy or already do.
                                    </label>
                                    <input type="hidden" name="outdoors" id="outdoors">
                                    <div class="col-md-12 ">
                                        <ul class="c-select-single">


                                            <li>Aerobics / Gym Classes</li>
                                            <li>Biking</li>
                                            <li>Boating/Sailing</li>
                                            <li>Camping/ Cottage Life</li>
                                            <li>Fishing</li>
                                            <li>Hiking/ Walking</li>
                                            <li>Horseback Riding</li>
                                            <li>Hunting</li>
                                            <li>Ice skating</li>
                                            <li>Jogging / Running</li>
                                            <li>Martial Arts</li>
                                            <li>Snow skiing</li>
                                            <li>Snowboarding</li>
                                            <li>Swimming</li>
                                            <li>Surfing</li>
                                            <li>Weight Lifting</li>
                                            <li>Yoga/Pilates</li>
                                            <li>I don't do many fitness activities</li>

                                        </ul>
                                    </div>
                                    @error('outdoors')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="entertainments" class="h4 c-h">Entertainment/Going Out
                                    </label><br>
                                    <label for="entertainments">
                                        Check off anything you like to do for entertainment or to get out of the house
                                    </label>
                                    <input type="hidden" name="entertainments" id="entertainments">
                                    <div class="col-md-12 ">
                                        <ul class="c-select-single">

                                            <li>Casino</li>
                                            <li>Bingo</li>
                                            <li>Board games</li>
                                            <li>Card games</li>
                                            <li>Concerts</li>
                                            <li>Cultural Events</li>
                                            <li>Charity Events</li>
                                            <li>Dance/Night clubs</li>
                                            <li>Dinner parties at Home</li>
                                            <li>Fashion events</li>
                                            <li>Foodie / Dining Out</li>
                                            <li>Going to Plays/Theater</li>
                                            <li>Going to Movies</li>
                                            <li>Pubs/Patios</li>
                                            <li>Spa and Salon</li>
                                            <li>Sports Events</li>
                                            <li>Surfing the web</li>
                                            <li>Yard Sales</li>
                                            <li>Video games</li>
                                            <li>Wine tasting</li>
                                            <li>I like staying In/Don't Go out Much</li>

                                        </ul>
                                    </div>
                                    @error('entertainments')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="music" class="h4 c-h">Music Genres
                                    </label><br>
                                    <label for="music">
                                        Select the various genres of music that you enjoy.
                                    </label>
                                    <input type="hidden" name="music" id="music">
                                    <div class="col-md-12 ">
                                        <ul class="c-select-single">


                                            <li>Alternative</li>
                                            <li>Blues</li>
                                            <li>Classical</li>
                                            <li>Country</li>
                                            <li>Classic Rock</li>
                                            <li>Dance/Electronica</li>
                                            <li>Heavy Metal</li>
                                            <li>Musicals/Soundtracks</li>
                                            <li>New Age/Celtic</li>
                                            <li>Oldies</li>
                                            <li>Pop</li>
                                            <li>Rap</li>
                                            <li>Rock Music</li>
                                            <li>RnB/Hip Hop</li>
                                            <li>Top 40</li>
                                            <li>Don't Like Music Much</li>

                                        </ul>
                                    </div>
                                    @error('music')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="book" class="h4 c-h">Book Genres
                                    </label><br>
                                    <label for="book">
                                        Select the various types of books that you read.
                                    </label>
                                    <input type="hidden" name="book" id="book">
                                    <div class="col-md-12 ">
                                        <ul class="c-select-single">


                                            <li>Biographies</li>
                                            <li>Fantasy</li>
                                            <li>Crime/Law</li>
                                            <li>Fairy Tales/Fables</li>
                                            <li>Fiction</li>
                                            <li>Historical Fiction</li>
                                            <li>Magazines</li>
                                            <li>Mystery</li>
                                            <li>Non-Fiction</li>
                                            <li>Poetry</li>
                                            <li>Reference/Newspapers</li>
                                            <li>Romance</li>
                                            <li>Science Fiction</li>
                                            <li>Self Help/Personal Development</li>
                                            <li>Don't Read Much</li>

                                        </ul>
                                    </div>
                                    @error('book')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="tv_show" class="h4  c-h">Favorite TV Shows</label>
                                    <label for="tv_show">
                                        List off your any tv shows that you enjoy here. Example. I love the Walking Dead
                                        and Game of Thrones. I can't miss a show! Also like The Biggest Loser, Buffy,
                                        X-files, Sex and the City
                                    </label>
                                    <textarea class="form-control" name="tv_show" rows="10" id="tv_show"
                                              data-rule="tv_show">
                                    </textarea>

                                    @error('tv_show')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="movies_and_actors" class="h4  c-h">Favorite Movies and Actors</label>
                                    <label for="movies_and_actors">
                                        List off your any tv shows that you enjoy here. Example. I love the Walking Dead
                                        and Game of Thrones. I can't miss a show! Also like The Biggest Loser, Buffy,
                                        X-files, Sex and the City
                                    </label>
                                    <textarea class="form-control" name="movies_and_actors" rows="10"
                                              id="movies_and_actors"
                                              data-rule="movies_and_actors">
                                    </textarea>

                                    @error('movies_and_actors')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="fav_hobbies" class="h4  c-h">Favorite Hobbies</label>
                                    <label for="fav_hobbies">
                                        Have a unique or specific hobby? Tell us about it. Use as much detail as you
                                        like. Example:I have been playing Dungeon And Dragons since I was 12. I'd love
                                        to connect with other girls who do too and start a new game. I also like
                                        pottery, baking and adult

                                    </label>
                                    <textarea class="form-control" name="fav_hobbies" rows="10" id="fav_hobbies"
                                              data-rule="fav_hobbies">
                                    </textarea>

                                    @error('fav_hobbies')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="team_and_sports" class="h4  c-h">Favorite Teams and Sports</label>
                                    <label for="team_and_sports">
                                        Have a favorite Sports Team? Or tell us about other specific unique Sports
                                        interests here. Example: Lawn Bowling, Ottawa Senators, Toronto blue jays, New
                                        Zealand Allblacks

                                    </label>
                                    <textarea class="form-control" name="team_and_sports" rows="10" id="team_and_sports"
                                              data-rule="team_and_sports">
                                    </textarea>

                                    @error('team_and_sports')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="band_and_music" class="h4  c-h">Favorite Bands and Music</label>
                                    <label for="band_and_music">
                                        List Your tops bands or your favorite song. Example: I totally love Pearl Jam
                                        and Frank Sinatra. Sweet Caroline is a favorite song of mine.

                                    </label>
                                    <textarea class="form-control" name="band_and_music" rows="10" id="band_and_music"
                                              data-rule="band_and_music">
                                    </textarea>

                                    @error('band_and_music')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="band_and_music" class="h4  c-h">Favorite Books and Authors</label>
                                    <label for="band_and_music">
                                        Give examples of Authors or Books you like. Example - Angels and Demons,
                                        Cosmopolitan, Stephen King
                                    </label>
                                    <textarea class="form-control" name="band_and_music" rows="10" id="band_and_music"
                                              data-rule="band_and_music">
                                    </textarea>

                                    @error('band_and_music')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 d-flex justify-content-end">
                                <div class="btn-group mt-4" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-secondary  btn-lg">Previous</button>
                                    <button type="button" class="btn btn-secondary disabled btn-lg">Next</button>
                                    <button type="button" class="btn btn-gfv btn-lg">Submit</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <style>
        .c-select-single li {
            cursor: pointer;
            display: inline-block;
            padding: 8px 16px 10px 16px;
            font-size: 14px;
            font-weight: 500;
            line-height: 1;
            color: #444444;
            margin: 0 3px 10px 3px;
            transition: all ease-in-out 0.3s;
            background: #fff;
            border: 2px solid #dedede;
            border-radius: 50px;
        }

        .c-select-single li.active {
            color: #ec6d70;
            border: 2px solid #ec6d70;
        }

    </style>
@endsection