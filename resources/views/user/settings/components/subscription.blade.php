<?php
$packages = \App\Models\Product::all();
$products = [];
foreach ($packages as $package) {
    $products[$package->id] = $package;
}
?>
<div class="col-md-12 mt-md-5">
    <div class="card">
        @if(ifUpgraded())
            <div class="card-body">
                <h4 class="c-color">Girlfriend Social Subscription Information</h4>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>SUBSCRIPTION</th>
                        <th>COST</th>
                        <th>STATUS</th>
                        <th>RENEWAL DATE</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Models\Order::where('user_id',auth()->user()->id)->get() as $order)
                        <tr>
                            <td>{{$order->product->type}}</td>
                            <td>{{$order->product->price}}</td>
                            <td>
                                @if($order->status=='Active')
                                    <span style="color: #00bf38">●</span>
                                @else
                                    <span style="color: #bf0024">●</span>
                                @endif
                                {{$order->status}}
                            </td>
                            <td>{{$order->end}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="card-body">
                <h4 class="c-color">Your Girlfriend Social Subscription</h4>

                <p>As an upgraded member, you will show up <b>FIRST</b> in the Match Section. This means that new users will
                    let you know if they are interested in becoming friends with you within minutes of signup!
                    Messaging users who already want to be friends is the most effective way to use the site. You'll get all
                    the features listed below and you will help us grow.</p>

                <p>If you would like to upgrade your account and start taking your friendship search seriously, please
                    select an option below and then click on the green Upgrade button.</p>
            </div>
            @endif

    </div>
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="c-color">Change your Upgraded Plan to a New Version?</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach(\App\Models\Product::all() as $product)
                            <div class="col-md-3 text-center">
                                <div class="border pt-5 pb-5 rounded px-3 package position-relative {{($product->id==1)?'active':''}}"
                                     data-package="{{$product['id']}}">
                                    <span>Save ${{$product['save']}}</span>
                                    <h3>${{$product['price']}}/mo</h3>
                                    <p>{{$product['duration']}} Month Plan</p>
                                </div>
                                <h6 class="c-color">{{$product->type}}</h6>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p class="m-0 mt-4">All paid memberships are managed securely with PayPal.</p>
                            <p class="m-0">You can use your credit card or your bank account to upgrade via PayPal.</p>
                            <div>
                                <img src="{{url('user/paypal.png')}}" class="img-fluid" alt="">
                            </div>
                            <form id="submit-form" action="{{route('settings.payments.gateway')}}" method="get">
                                <input type="hidden" id="package" name="package">
                                <button type="submit" class="btn btn-lg btn-success upgrade-btn mt-2 mb-4">Upgrade and
                                    Continue
                                </button>
                            </form>
                            <p>
                                <small>By clicking the "Upgrade" button you agree to the <a href="">Terms and
                                        Conditions</a></small>
                            </p>
                        </div>
                        <h4 class="c-color">Upgrade and Help support GFS so that women everywhere can make friends AND
                            make your friendship search easier at the same time!</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    @if(ifUpgraded())
                        <h4 class="c-color">Thank you for your Upgraded Support Girlfriend!</h4>
                        <p>Let's go through some of the cool stuff you can do ...</p>
                    @else
                        <h4 class="c-color">Upgraded Features</h4>
                    @endif
                </div>
                <div class="card-body">
                    <p><i class="bi bi-check border"></i> Show up first in Match!</p>
                    <p><i class="bi bi-check border"></i> Add additional images to enhance your Profile.</p>
                    <p><i class="bi bi-check border"></i> See when a user last logged in.</p>
                    <p><i class="bi bi-check border"></i> See if your emails were read or deleted.</p>
                    <p><i class="bi bi-check border"></i> Experience GFS ad-free.</p>
                    <p><i class="bi bi-check border"></i> Find out the date and time someone viewed your profile.</p>
                    <p><i class="bi bi-check border"></i> Massive increase in emails.</p>
                    <p><i class="bi bi-check border"></i> Number of people viewing your profile triples.</p>
                    <p><i class="bi bi-check border"></i> Stand out in all searches with a color banner.</p>
                    <p><i class="bi bi-check border"></i> Supporter badge shown on your profile.</p>
                    <p><i class="bi bi-check border"></i> This upgrade more than doubles your chances of meeting
                        someone.</p>
                </div>
                <div class="card-footer text-sm text-muted">
                    You will be forwarded to PayPal to complete your subscription when you click 'Upgrade'. A copy of
                    your subscription details will be sent to you via email for your records. At the end of your current
                    upgrade, Girlfriend Social will automatically continue your subscription for the same period and
                    amount as your current upgrade. You can cancel on this page at any time. Upgrade today and start
                    connecting!
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .package {
        margin-top: 20px;
    }

    .package p {
        margin: 0;
    }

    .package.active {
        background-color: #c3f2f7;
    }

    .package span {
        display: none;
    }

    .package.active span {
        display: block;
        top: -10px;
        right: -10px;
        background-color: yellowgreen;
        position: absolute;
        font-weight: bold;
        padding: 5px;
        border-radius: 5px;
    }
</style>
<script>
    $(function () {
        $('.package').click(function () {
            $('.package').removeClass('active');
            $(this).addClass('active');
        });
        $(document).on('click', '.upgrade-btn', function (e) {
            e.preventDefault();
            var package = $('.package.active').attr('data-package');
            $('#package').val(package);
            $('#submit-form').submit();
        });
    });
</script>
