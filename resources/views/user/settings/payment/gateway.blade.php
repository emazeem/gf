@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main">
        <div class="container">
            <div class="card mt-2">
                <div class="card-header">
                    <h4>Transferring you to Stripe</h4>
                </div>
                <div class="card-body">
                    <p>Awesome Girlfriend! We are about to transfer you to Stripe secure website where you will be able to finish upgrading your subscription! Hold please.</p>

                    <h5 class="c-color">{{$package['type']}}</h5>
                    <h6>You have selected the upgrade of: ${{$package['price']}} @if($package['duration']!='Lifetime') /mo @endif</h6>
                    <h6>Total Duration : {{$package['duration']}}</h6>
                </div>
                <div class="card-footer">
                    <form action="{{route('settings.payments.process')}}">
                        <input type="hidden" value="{{$id}}" name="package">
                        <button class="btn btn-lg btn-success">Pay with Stripe</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection