@extends('layouts.master')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main">
        <section id="book-a-table" class="book-a-table">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form method="POST" action="{{ route('register') }}" class="php-email-form" id="register-form">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-3 col-form-label ">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}"  autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-3 col-form-label ">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}"  autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-3 col-form-label ">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                            autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                       class="col-md-3 col-form-label ">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation"  autocomplete="new-password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="username" class="col-md-3 col-form-label ">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                           class="form-control @error('username') is-invalid @enderror" name="username"
                                           value="{{ old('username') }}"  autocomplete="name" autofocus>
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="timezone" class="col-md-3 col-form-label ">{{ __('Timezone') }}</label>

                                <div class="col-md-6">
                                        <select id="timezone" type="text"
                                                class="form-control @error('timezone') is-invalid @enderror" name="timezone"
                                                value="{{ old('timezone') }}"  autocomplete="name" autofocus>
                                            <option hidden disabled selected>(Select timezone)</option>
                                            <option value="US/Pacific">(UTC-8) Pacific Time (US &amp; Canada)</option>
                                            <option value="US/Mountain">(UTC-7) Mountain Time (US &amp; Canada)</option>
                                            <option value="US/Central">(UTC-6) Central Time (US &amp; Canada)</option>
                                            <option value="US/Eastern">(UTC-5) Eastern Time (US &amp; Canada)</option>
                                            <option value="America/Halifax">(UTC-4)  Atlantic Time (Canada)</option>
                                            <option value="America/Anchorage">(UTC-9)  Alaska (US &amp; Canada)</option>
                                            <option value="Pacific/Honolulu">(UTC-10) Hawaii (US)</option>
                                            <option value="Pacific/Samoa">(UTC-11) Midway Island, Samoa</option>
                                            <option value="Etc/GMT-12">(UTC-12) Eniwetok, Kwajalein</option>
                                            <option value="Canada/Newfoundland">(UTC-3:30) Canada/Newfoundland</option>
                                            <option value="America/Buenos_Aires">(UTC-3) Brasilia, Buenos Aires, Georgetown</option>
                                            <option value="Atlantic/South_Georgia">(UTC-2) Mid-Atlantic</option>
                                            <option value="Atlantic/Azores">(UTC-1) Azores, Cape Verde Is.</option>
                                            <option value="Europe/London">Greenwich Mean Time (Lisbon, London)</option>
                                            <option value="Europe/Berlin">(UTC+1) Amsterdam, Berlin, Paris, Rome, Madrid</option>
                                            <option value="Europe/Athens">(UTC+2) Athens, Helsinki, Istanbul, Cairo, E. Europe</option>
                                            <option value="Europe/Moscow">(UTC+3) Baghdad, Kuwait, Nairobi, Moscow</option>
                                            <option value="Iran">(UTC+3:30) Tehran</option>
                                            <option value="Asia/Dubai">(UTC+4) Abu Dhabi, Kazan, Muscat</option>
                                            <option value="Asia/Kabul">(UTC+4:30) Kabul</option>
                                            <option value="Asia/Yekaterinburg">(UTC+5) Islamabad, Karachi, Tashkent</option>
                                            <option value="Asia/Calcutta">(UTC+5:30) Bombay, Calcutta, New Delhi</option>
                                            <option value="Asia/Katmandu">(UTC+5:45) Nepal</option>
                                            <option value="Asia/Omsk">(UTC+6) Almaty, Dhaka</option>
                                            <option value="Indian/Cocos">(UTC+6:30) Cocos Islands, Yangon</option>
                                            <option value="Asia/Krasnoyarsk">(UTC+7) Bangkok, Jakarta, Hanoi</option>
                                            <option value="Asia/Hong_Kong">(UTC+8) Beijing, Hong Kong, Singapore, Taipei</option>
                                            <option value="Asia/Tokyo">(UTC+9) Tokyo, Osaka, Sapporto, Seoul, Yakutsk</option>
                                            <option value="Australia/Adelaide">(UTC+9:30) Adelaide, Darwin</option>
                                            <option value="Australia/Sydney">(UTC+10) Brisbane, Melbourne, Sydney, Guam</option>
                                            <option value="Asia/Magadan">(UTC+11) Magadan, Solomon Is., New Caledonia</option>
                                            <option value="Pacific/Auckland">(UTC+12) Fiji, Kamchatka, Marshall Is., Wellington</option>
                                        </select>
                                    @error('timezone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-md-12">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('agree') is-invalid @enderror" type="checkbox" name="agree" id="agree" value="1" style="height: 14px;">
                                        <label class="form-check-label" for="agree">
                                            {{ __('I have read and agree to the ,  and that I am a woman over the age of 18.') }}</label>
                                    </div>
                                    @error('agree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12 text-md-end">
                                    <button type="submit" class="btn btn-primary"
                                            onclick="$('#register-form').submit()">
                                        {{ __('Register') }}
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
