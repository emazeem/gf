<form id="interest_form">
    @csrf
    <div class="alert alert-success alert-dismissible fade show justify-content-between" role="alert"
         style="display: none;">
        <strong>Success!</strong> <span class="message"></span>
        <span onclick="$('.alert').css('display','none')">
            <i class="bi bi-x-circle"></i>
        </span>
    </div>
    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="hobbies" class="h4 c-h">Hobbies?
            </label><br>
            <label for="hobbies">
                Check off any of these hobbies that you are interested in
            </label>
            <div class="col-md-12 ">
                <ul class="c-select-single hobbies">
                    @php $e_hobbies=explode('@@@',$de->hobbies); @endphp
                    @php $hobbies='Antiques / furniture restoration,Astrology,Birds,Cars,Cats,Crafts,Creative writing,Dogs,Family / kids,Fish / aquarium,Gardening,Gourmet cooking,Home improvement,Investing,Motorcycles,News / politics / Current events,Painting,Philosophy,Photography,Playing a musical instrument,Scrapbooking,Spirituality,Shopping,Traveling,Vegetarianism / Vegan,Volunteer/ Charity work,Dont Have many Hobbies yet';
                    $hobbies=explode(',',$hobbies);
                    @endphp
                    @foreach($hobbies as $hobby)
                        <li class="{{in_array($hobby,$e_hobbies)?'active':''}}">{{$hobby}}</li>
                    @endforeach
                </ul>
                <input type="hidden" name="hobbies" id="hobbies">
                <script>
                    $('.c-select-single.hobbies li').click(function () {
                        $(this).toggleClass('active');
                        var pets=[];
                        var i=0;
                        $('.c-select-single.hobbies li').each(function () {
                            if ($(this).hasClass('active')){
                                pets[i]=$(this).text();
                                i++;
                            }
                        });
                        $('#hobbies').val(pets);
                    });
                    @if($de->hobbies)
                    $(function () {
                        var pets=[];
                        var i=0;
                        $('.c-select-single.hobbies li').each(function () {
                            if ($(this).hasClass('active')){
                                pets[i]=$(this).text();
                                i++;
                            }
                        });
                        $('#hobbies').val(pets);
                    });
                    @endif
                </script>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="sports" class="h4 c-h">Sports
            </label><br>
            <label for="sports">
                Check which kind of Sports you Watch or Participate in.
            </label>
            <div class="col-md-12 ">
                <ul class="c-select-single sports">

                    @php $e_sports=explode('@@@',$de->sports); @endphp
                    @php $sports='Badminton,Baseball,Basketball,Billiards,Bowling,Boxing/UFC/Kickboxing,Cricket,Couch Potato,Dancing,Extreme Sports,Figure skating,Football,Golf,Hockey,Olympic sports,Rugby,Soccer,Squash,Tennis,Volleyball,Are you kidding? No Sports';
                    $sports=explode(',',$sports);
                    @endphp
                    @foreach($sports as $sport)
                        <li class="{{in_array($sport,$e_sports)?'active':''}}">{{$sport}}</li>
                    @endforeach
                </ul>
                <input type="hidden" name="sports" id="sports">

            </div>
            <script>
                $('.c-select-single.sports li').click(function () {
                    $(this).toggleClass('active');
                    var pets=[];
                    var i=0;
                    $('.c-select-single.sports li').each(function () {
                        if ($(this).hasClass('active')){
                            pets[i]=$(this).text();
                            i++;
                        }
                    });
                    $('#sports').val(pets);
                });
                @if($de->sports)
                $(function () {
                    var pets=[];
                    var i=0;
                    $('.c-select-single.sports li').each(function () {
                        if ($(this).hasClass('active')){
                            pets[i]=$(this).text();
                            i++;
                        }
                    });
                    $('#sports').val(pets);
                });
                @endif
            </script>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="fitness" class="h4 c-h">Fitness/ Outdoors
            </label><br>
            <label for="fitness">
                Check Any activities that you enjoy or already do.
            </label>
            <input type="hidden" name="fitness" id="fitness">
            <div class="col-md-12 ">
                <ul class="c-select-single fitness">


                    @php $e_fitness=explode('@@@',$de->fitness); @endphp
                    @php $fitness='Aerobics / Gym Classes,Biking,Boating/Sailing,Camping/ Cottage Life,Fishing,Hiking/ Walking,Horseback Riding,Hunting,Ice skating,Jogging / Running,Martial Arts,Snow skiing,Snowboarding,Swimming,Surfing,Weight Lifting,Yoga/Pilates,I dont do many fitness activities';
                    $fitness=explode(',',$fitness);
                    @endphp
                    @foreach($fitness as $fitnes)
                        <li class="{{in_array($fitnes,$e_fitness)?'active':''}}">{{$fitnes}}</li>
                    @endforeach

                </ul>
            </div>
            <script>
                $('.c-select-single.fitness li').click(function () {
                    $(this).toggleClass('active');
                    var pets=[];
                    var i=0;
                    $('.c-select-single.fitness li').each(function () {
                        if ($(this).hasClass('active')){
                            pets[i]=$(this).text();
                            i++;
                        }
                    });
                    $('#fitness').val(pets);
                });
                @if($de->fitness)
                $(function () {
                    var pets=[];
                    var i=0;
                    $('.c-select-single.fitness li').each(function () {
                        if ($(this).hasClass('active')){
                            pets[i]=$(this).text();
                            i++;
                        }
                    });
                    $('#fitness').val(pets);
                });
                @endif
            </script>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="entertainment" class="h4 c-h">Entertainment/Going Out
            </label><br>
            <label for="entertainment">
                Check off anything you like to do for entertainment or to get out of the house
            </label>
            <div class="col-md-12 ">
                <ul class="c-select-single entertainment">
                    @php $e_entertainments=explode('@@@',$de->entertainment); @endphp
                    @php $entertainments='Casino,Bingo,Board games,Card games,Concerts,Cultural Events,Charity Events,Dance/Night clubs,Dinner parties at Home,Fashion events,Foodie / Dining Out,Going to Plays/Theater,Going to Movies,Pubs/Patios,Spa and Salon,Sports Events,Surfing the web,Yard Sales,Video games,Wine tasting,I like staying In/Dont Go out Much';
                    $entertainments=explode(',',$entertainments);
                    @endphp
                    @foreach($entertainments as $entertainment)
                        <li class="{{in_array($entertainment,$e_entertainments)?'active':''}}">{{$entertainment}}</li>
                    @endforeach
                </ul>
                <input type="hidden" name="entertainment" id="entertainment">

            </div>
            <script>
                $('.c-select-single.entertainment li').click(function () {
                    $(this).toggleClass('active');
                    var pets=[];
                    var i=0;
                    $('.c-select-single.entertainment li').each(function () {
                        if ($(this).hasClass('active')){
                            pets[i]=$(this).text();
                            i++;
                        }
                    });
                    $('#entertainment').val(pets);
                });
                @if($de->entertainment)
                $(function () {
                    var pets=[];
                    var i=0;
                    $('.c-select-single.entertainment li').each(function () {
                        if ($(this).hasClass('active')){
                            pets[i]=$(this).text();
                            i++;
                        }
                    });
                    $('#entertainment').val(pets);
                });
                @endif
            </script>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="music" class="h4 c-h">Music Genres
            </label><br>
            <label for="music">
                Select the various genres of music that you enjoy.
            </label>
            <div class="col-md-12 ">
                <ul class="c-select-single music">
                    @php $e_music=explode('@@@',$de->music); @endphp
                    @php $musics='Alternative,Blues,Classical,Country,Classic Rock,Dance/Electronica,Heavy Metal,Musicals/Soundtracks,New Age/Celtic,Oldies,Pop,Rap,Rock Music,RnB/Hip Hop,Top 40,Reggae,Dont Like Music Much';
                    $musics=explode(',',$musics);
                    @endphp
                    @foreach($musics as $music)
                        <li class="{{in_array($music,$e_music)?'active':''}}">{{$music}}</li>
                    @endforeach
                </ul>
                <input type="hidden" name="music" id="music">
                <script>
                    $('.c-select-single.music li').click(function () {
                        $(this).toggleClass('active');
                        var pets=[];
                        var i=0;
                        $('.c-select-single.music li').each(function () {
                            if ($(this).hasClass('active')){
                                pets[i]=$(this).text();
                                i++;
                            }
                        });
                        $('#music').val(pets);
                    });
                    @if($de->music)
                    $(function () {
                        var pets=[];
                        var i=0;
                        $('.c-select-single.music li').each(function () {
                            if ($(this).hasClass('active')){
                                pets[i]=$(this).text();
                                i++;
                            }
                        });
                        $('#music').val(pets);
                    });
                    @endif
                </script>
            </div>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="movies" class="h4 c-h">Movies Genres
            </label><br>
            <label for="movies">
                Select the different Movie Genres that you enjoy.
            </label>
            <div class="col-md-12 ">
                <ul class="c-select-single movies">
                    @php $e_movies=explode('@@@',$de->movies); @endphp
                    @php $movies='Action ,Cartoon/Disney/Pixar ,Comedy ,Crime ,Drama ,Fantasy ,Musicals ,Historical ,International/Subtitles ,Horror ,Romance/Chick Flicks ,Science Fiction ,War ,Westerns ,Dont Like Movies Much';
                    $movies=explode(',',$movies);
                    @endphp
                    @foreach($movies as $movi)
                        <li class="{{in_array($movi,$e_movies)?'active':''}}">{{$movi}}</li>
                    @endforeach
                </ul>
                <input type="hidden" name="movies" id="movies" class="form-control">

                <script>
                    $('.c-select-single.movies li').click(function () {
                        $(this).toggleClass('active');
                        var pets=[];
                        var i=0;
                        $('.c-select-single.movies li').each(function () {
                            if ($(this).hasClass('active')){
                                pets[i]=$(this).text();
                                i++;
                            }
                        });
                        $('#movies').val(pets);
                    });
                    @if($de->movies)
                    $(function () {
                        var pets=[];
                        var i=0;
                        $('.c-select-single.movies li').each(function () {
                            if ($(this).hasClass('active')){
                                pets[i]=$(this).text();
                                i++;
                            }
                        });
                        $('#movies').val(pets);
                    });
                    @endif
                </script>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="books" class="h4 c-h">Book Genres
            </label><br>
            <label for="books">
                Select the various types of books that you read.
            </label>
            <div class="col-md-12 ">
                <ul class="c-select-single books">


                    @php $e_books=explode('@@@',$de->books); @endphp
                    @php $books='Biographies,Fantasy,Crime/Law,Fairy Tales/Fables,Fiction,Historical Fiction,Magazines,Mystery,Non-Fiction,Poetry,Reference/Newspapers,Romance,Science Fiction,Self Help/Personal Development,Dont Read Much';
                    $books=explode(',',$books);
                    @endphp
                    @foreach($books as $book)
                        <li class="{{in_array($book,$e_books)?'active':''}}">{{$book}}</li>
                    @endforeach
                </ul>
                <input type="hidden" name="books" id="books" class="form-control">

                <script>
                    $('.c-select-single.books li').click(function () {
                        $(this).toggleClass('active');
                        var pets=[];
                        var i=0;
                        $('.c-select-single.books li').each(function () {
                            if ($(this).hasClass('active')){
                                pets[i]=$(this).text();
                                i++;
                            }
                        });
                        $('#books').val(pets);
                    });
                    @if($de->books)
                    $(function () {
                        var pets=[];
                        var i=0;
                        $('.c-select-single.books li').each(function () {
                            if ($(this).hasClass('active')){
                                pets[i]=$(this).text();
                                i++;
                            }
                        });
                        $('#books').val(pets);
                    });
                    @endif
                </script>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="fav_tv_shows" class="h4  c-h">Favorite TV Shows</label>
            <label for="fav_tv_shows">
                List off your any tv shows that you enjoy here. Example. I love the Walking Dead
                and Game of Thrones. I can't miss a show! Also like The Biggest Loser, Buffy,
                X-files, Sex and the City
            </label>
            <textarea class="form-control" name="fav_tv_shows" rows="10" id="fav_tv_shows" data-rule="fav_tv_shows">{{$de->fav_tv_shows}}</textarea>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="fav_movies" class="h4  c-h">Favorite Movies and Actors</label>
            <label for="fav_movies">
                List off your any tv shows that you enjoy here. Example. I love the Walking Dead
                and Game of Thrones. I can't miss a show! Also like The Biggest Loser, Buffy,
                X-files, Sex and the City
            </label>
            <textarea class="form-control" name="fav_movies" rows="10"
                      id="fav_movies"
                      data-rule="fav_movies">{{$de->fav_movies}}</textarea>
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
                      data-rule="fav_hobbies">{{$de->fav_hobbies}}</textarea>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="fav_teams" class="h4  c-h">Favorite Teams and Sports</label>
            <label for="fav_teams">
                Have a favorite Sports Team? Or tell us about other specific unique Sports
                interests here. Example: Lawn Bowling, Ottawa Senators, Toronto blue jays, New
                Zealand Allblacks

            </label>
            <textarea class="form-control" name="fav_teams" rows="10" id="fav_teams"
                      data-rule="fav_teams">{{$de->fav_teams}}</textarea>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="fav_bands" class="h4  c-h">Favorite Bands and Music</label>
            <label for="fav_bands">
                List Your tops bands or your favorite song. Example: I totally love Pearl Jam
                and Frank Sinatra. Sweet Caroline is a favorite song of mine.

            </label>
            <textarea class="form-control" name="fav_bands" rows="10" id="fav_bands" data-rule="fav_bands">{{$de->fav_bands}}</textarea>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="fav_books" class="h4  c-h">Favorite Books and Authors</label>
            <label for="fav_books">
                Give examples of Authors or Books you like. Example - Angels and Demons,
                Cosmopolitan, Stephen King
            </label>
            <textarea class="form-control" name="fav_books" rows="10" id="fav_books"
                      data-rule="fav_books">{{$de->fav_books}}</textarea>
        </div>
    </div>

    <div class="col-md-12 d-flex justify-content-end">
        <div class="btn-group mt-4" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-secondary btn-lg" onclick="$('#pills-about-tab').click()">Previous</button>
            <button type="button" class="btn btn-secondary disabled btn-lg">Next</button>
            <button type="submit" class="btn btn-gfv btn-lg">Submit</button>
        </div>
    </div>
</form>
<script>
    $(function () {
        $(document).on('submit','#interest_form',function (e) {
            e.preventDefault();

            var button = $(this).find('button[type=submit]'), previous =$(this).find('button[type=submit]').html();
            button.attr('disabled', 'disabled').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing ...');

            $(this).find('.form-control.is-invalid').removeClass('is-invalid');
            $(this).find('.invalid-feedback.is-invalid').remove();
            var alert=$(this).find('.alert');
            alert.hide();
            $.ajax({
                type: "POST",
                url: "{{route('user.interest.store')}}",
                data: new FormData(this),
                dataType: 'JSON',
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    button.attr('disabled', null).html(previous);
                    alert.find('.message').html(data.success);
                    alert.css('display','flex');

                    $('html, body').animate({
                        scrollTop: alert.offset().top - 150
                    }, 'slow');
                },
                error: function (xhr) {
                    button.attr('disabled', null).html(previous);
                    erroralert(xhr);
                }
            });
        })
    });
</script>
