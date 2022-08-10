@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main" style="margin-top: 70px">
        <div class="container">
            <div class="card p-0" style="margin-top: 100px">
                <div class="card-header">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active rounded-0 px-5 border" href="#"><i
                                        class="bi bi-person-rolodex"></i> Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0 px-5 border" href="#"><i class="bi bi-camera"></i>
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
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="headline" class="h4  c-h">Headline</label>
                                    <label for="headline">Enter a short headline about you. Example - Single Mom Looking
                                        to get out and Dance! Reminder - GFS is for Women friendship purposes only. Any
                                        accounts with inappropriate, selling or sexual themes will be removed.</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="headline" id="headline"
                                               data-rule="headline">
                                    </div>
                                    @error('headline')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="about_me" class="h4  c-h">About Me</label>
                                    <label for="about_me">This is the main section of your friendship profile. Go into
                                        detail about who you are and what you are looking for in friends. You can type A
                                        LOT in this box - so get to it! Example: I love my job downtown, just moved
                                        here, have 2 cats and no kids! Let'</label>
                                    <textarea class="form-control" name="about_me" rows="10" id="about_me"
                                              data-rule="about_me">
                                    </textarea>

                                    @error('about_me')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="gender" class="h4 c-h">Gender</label><br>
                                    <label for="gender">This site is for *WOMEN ONLY*</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="gender" id="gender" data-rule="gender">
                                            <option selected hidden>(Select an option)</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="employment_group" class="h4 c-h">Employment Group</label><br>
                                    <label for="employment_group"> This will not be shown on your profile</label>
                                    <input type="hidden" name="employment_group" id="employment_group">
                                    <div class="col-md-12 ">
                                        <ul class="c-select-single">

                                            <li>
                                                Professional
                                            </li>
                                            <li>
                                                Sales
                                            </li>
                                            <li>
                                                Self Employed
                                            </li>
                                            <li>
                                                Home Maker/Mom
                                            </li>
                                            <li>
                                                Retired
                                            </li>
                                            <li>
                                                Student
                                            </li>
                                            <li>
                                                Manager
                                            </li>
                                            <li>
                                                Clerical
                                            </li>
                                            <li class="active">

                                                Trades Person
                                            </li>
                                            <li>
                                                Other/Dont wish to Share
                                            </li>
                                        </ul>
                                    </div>
                                    @error('headline')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="income_range" class="h4 c-h">HouseHold Income Range</label><br>
                                    <label for="income_range">This helps us get a better idea of events to offer. This
                                        will not be shown on your profile and is private. You can choose do not wish to
                                        share.</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="income_range" id="income_range"
                                                data-rule="income_range">
                                            <option selected disabled>(Select an option)</option>
                                            <option value="49">Under $25,000</option>
                                            <option value="50">$25,000-$50,000</option>
                                            <option value="51">$50,000 -$75,000</option>
                                            <option value="52">$75,000-$100,000</option>
                                            <option value="53">$100,000+</option>
                                            <option value="54">Prefer not to say</option>
                                        </select>
                                    </div>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="hear_about" class="h4 c-h">Hear About us</label><br>
                                    <label for="hear_about">Where did you hear about us from?</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="hear_about" id="hear_about"
                                                data-rule="hear_about">
                                            <option hidden disabled selected>(Select an option)</option>
                                            <option value="55">Search Engine</option>
                                            <option value="56">Friend</option>
                                            <option value="57">News/Media</option>
                                            <option value="58">Craigslist</option>
                                            <option value="61">Flyer/Poster</option>
                                            <option value="62">Other</option>
                                            <option value="302">Social Media</option>

                                        </select>
                                    </div>
                                    @error('hear_about')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="friends_name" class="h4  c-h">Friends Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="friends_name" id="friends_name"
                                               data-rule="friends_name">
                                    </div>
                                    @error('friends_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="education_level" class="h4 c-h">Education Level</label><br>
                                    <label for="education_level">Choose your highest level of education
                                        completed.</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="education_level" id="education_level"
                                                data-rule="education_level">

                                            <option selected hidden>(Select an option)</option>
                                            <option value="30">High School</option>
                                            <option value="31">Some College</option>
                                            <option value="32">Some University</option>
                                            <option value="33">Associates Degree</option>
                                            <option value="34">Bachelor Degree</option>
                                            <option value="35">Masters Degree</option>
                                            <option value="36">PhD/ Post Doctoral Degree</option>
                                            <option value="37">Graduates Degree</option>
                                            <option value="38">Other/Don't Wish to Share</option>

                                        </select>
                                    </div>
                                    @error('education_level')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 d-flex justify-content-end">
                                <div class="btn-group mt-4" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-secondary disabled btn-lg">Previous</button>
                                    <button type="button" class="btn btn-secondary btn-lg">Next</button>
                                    <button type="button" class="btn btn-gfv btn-lg">Submit</button>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-personal" role="tabpanel"
                             aria-labelledby="pills-personal-tab">
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="dob" class="h4  c-h">Date of Birth</label>
                                    <label for="dob">Enter in your Birthday - You must be at least 18 to use this site.
                                        We will only show your age on your profile not your actual birthday.</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="dob" id="dob"
                                               data-rule="dob">
                                    </div>
                                    @error('dob')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="astrology" class="h4 c-h">Astrology</label><br>
                                    <label for="astrology">
                                        What's Your Sign? If you don't wish to share choose that option.
                                    </label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="astrology" id="astrology"
                                                data-rule="astrology">
                                            <option selected disabled>(Select an option)</option>
                                            <option value="256">Libra</option>
                                            <option value="255">Virgo</option>
                                            <option value="254">Leo</option>
                                            <option value="253">Cancer</option>
                                            <option value="257">Scorpio</option>
                                            <option value="258">Sagittarius</option>
                                            <option value="252">Gemini</option>
                                            <option value="251">Taurus</option>
                                            <option value="250">Aries</option>
                                            <option value="249">Pisces</option>
                                            <option value="248">Aquarius</option>
                                            <option value="247">Capricorn</option>
                                            <option value="246">No Answer</option>
                                        </select>
                                    </div>
                                    @error('astrology')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="relationship_status" class="h4 c-h">Relationship Status</label><br>
                                    <label for="relationship_status">
                                        Tell us about your relationship status.
                                    </label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="relationship_status" id="relationship_status"
                                                data-rule="relationship_status">
                                            <option selected disabled>(Select an option)</option>
                                            <option value="256">Libra</option>
                                            <option value="255">Virgo</option>
                                            <option value="254">Leo</option>
                                            <option value="253">Cancer</option>
                                            <option value="257">Scorpio</option>
                                            <option value="258">Sagittarius</option>
                                            <option value="252">Gemini</option>
                                            <option value="251">Taurus</option>
                                            <option value="250">Aries</option>
                                            <option value="249">Pisces</option>
                                            <option value="248">Aquarius</option>
                                            <option value="247">Capricorn</option>
                                            <option value="246">No Answer</option>
                                        </select>
                                    </div>
                                    @error('relationship_status')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="children" class="h4 c-h">Children</label><br>
                                    <label for="children">
                                        Do you have children?
                                    </label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="children" id="children" data-rule="children">
                                            <option selected disabled>(Select an option)</option>
                                            <option value="27">No Children</option>
                                            <option value="28">Yes I Have Children</option>
                                            <option value="29">Prefer Not To Say</option>
                                        </select>

                                    </div>
                                    @error('children')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="smoke" class="h4 c-h">Do you smoke?</label><br>
                                    <input type="hidden" name="smoke" id="smoke">
                                    <div class="col-md-12 ">
                                        <ul class="c-select-single">

                                            <li>
                                                Yes
                                            </li>
                                            <li>
                                                No
                                            </li>
                                        </ul>
                                    </div>
                                    @error('smoke')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="pets" class="h4 c-h">Do you have any pets?</label><br>
                                    <input type="hidden" name="pets" id="pets">
                                    <div class="col-md-12 ">
                                        <ul class="c-select-single">
                                            <li>Cat</li>
                                            <li>Dog</li>
                                            <li>Birds</li>
                                            <li>Fish</li>
                                            <li>Reptiles</li>
                                            <li>Other</li>
                                            <li>None</li>
                                        </ul>
                                    </div>
                                    @error('pets')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="pets" class="h4 c-h">Do you drink?</label><br>
                                    <input type="hidden" name="pets" id="pets">
                                    <div class="col-md-12 ">
                                        <ul class="c-select-single">
                                            <li>Yes, Daily</li>
                                            <li>Yes, Sometimes</li>
                                            <li>Yes, Rarely</li>
                                            <li>No</li>
                                        </ul>
                                    </div>
                                    @error('pets')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <div class="tab-pane fade" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">

                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="job_title" class="h4  c-h">Job Title</label>
                                    <label for="job_title">
                                        Want to share what your job is? This will be shown on your profile.
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="job_title" id="job_title"
                                               data-rule="job_title">
                                    </div>
                                    @error('job_title')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="why_you_are_on_gfv" class="h4 c-h">Why You Are on GFS?</label><br>
                                    <label for="why_you_are_on_gfv">
                                        Why you are joining Girlfriend Vibez...
                                    </label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="why_you_are_on_gfv" id="why_you_are_on_gfv"
                                                data-rule="why_you_are_on_gfv">
                                            <option selected disabled>(Select an option)</option>

                                            <option value="75">Meet New Girl Friends</option>
                                            <option value="76">Having a Baby / Meet other Moms</option>
                                            <option value="77">Getting Married / GirlFriends Not Married</option>
                                            <option value="78">Just Moved to A New City</option>
                                            <option value="79">Recently Single / Divorced</option>
                                            <option value="80">Other/Don't Want To Share</option>
                                        </select>

                                    </div>
                                    @error('why_you_are_on_gfv')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="personality_type" class="h4 c-h">Personality Type</label><br>
                                    <label for="personality_type">
                                        How comfortable are you in social settings with people you do not know?
                                    </label>
                                    <input type="hidden" name="personality_type" id="personality_type">
                                    <div class="col-md-12 ">
                                        <ul class="c-select-single">
                                            <li> Very shy. I have never met someone online before
                                            </li>
                                            <li> Shy. I might need a push to meet people.
                                            </li>
                                            <li> Social. It might take me a bit to warm up though.
                                            </li>
                                            <li> Outgoing. I enjoy most social situations.
                                            </li>
                                            <li> Social Butterfly. I love meeting people anywhere!
                                            </li>
                                        </ul>
                                    </div>
                                    @error('personality_type')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="personality_type" class="h4 c-h">Communication Style</label><br>
                                    <label for="personality_type">
                                        Ways that you are interested in Communicating with New Friends on GFS. Check All
                                        that Apply.
                                    </label>
                                    <input type="hidden" name="personality_type" id="personality_type">
                                    <div class="col-md-12 ">
                                        <ul class="c-select-single">
                                            <li> On Girlfriend Social As Email Buddies
                                            </li>
                                            <li> Through IM or Personal Email
                                            </li>
                                            <li> Through Text Messaging/ Phone Calls
                                            </li>
                                            <li> In Person, When comfortable
                                            </li>
                                            <li> Group Meetings
                                            </li>
                                        </ul>
                                    </div>
                                    @error('personality_type')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="contact_by_people_from" class="h4 c-h">Connect by People
                                        from</label><br>
                                    <label for="contact_by_people_from">
                                        Let other members know if you are open to penpals, local gals, or maybe the next
                                        town over... Select all you are comfortable with
                                    </label>
                                    <input type="hidden" name="contact_by_people_from" id="contact_by_people_from">
                                    <div class="col-md-12 ">
                                        <ul class="c-select-single">
                                            <li> Anyone anywhere ( Pen pals )
                                            </li>
                                            <li> From the same local city area

                                            </li>
                                            <li> Within a 1-2 hr drive
                                            </li>
                                        </ul>
                                    </div>
                                    @error('contact_by_people_from')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="availability" class="h4 c-h">When Are You Available?
                                    </label><br>
                                    <label for="availability">
                                        If you tend to have certain times of day or days of the week more available to
                                        meet up with friends list that here. You can always select Don't wish to share.

                                    </label>
                                    <input type="hidden" name="availability" id="availability">
                                    <div class="col-md-12 ">
                                        <ul class="c-select-single">
                                            <li>Monday Morning</li>
                                            <li>Monday Afternoon</li>
                                            <li>Monday Night</li>
                                            <li>Tuesday Morning</li>
                                            <li>Tuesday Afternoon</li>
                                            <li>Tuesday Night</li>
                                            <li>Wednesday Morning</li>
                                            <li>Wednesday Afternoon</li>
                                            <li>Wednesday Night</li>
                                            <li>Thursday Morning</li>
                                            <li>Thursday Afternoon</li>
                                            <li>Thursday Night</li>
                                            <li>Friday Morning</li>
                                            <li>Friday Afternoon</li>
                                            <li>Friday Night</li>
                                            <li>Saturday Morning</li>
                                            <li>Saturday Afternoon</li>
                                            <li>Saturday Night</li>
                                            <li>Sunday Morning</li>
                                            <li>Sunday Afternoon</li>
                                            <li>Sunday Night</li>
                                            <li>Don't Wish To Share / Ask Me</li>
                                        </ul>
                                    </div>
                                    @error('availability')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

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