<?php
$packages=\App\Models\Product::all();
$products=[];
foreach ($packages as $package){
    $products[$package->id]=$package;
}
?>
<div class="col-md-12 mt-md-5">
    <div class="card">
        <div class="card-body">
            <h4 class="c-color">Your Girlfriend Social Subscription</h4>

            <p>As an upgraded member, you will show up <b>FIRST</b> in the Match Section. This means that new users will
                let you know if they are interested in becoming friends with you within minutes of signup!
                Messaging users who already want to be friends is the most effective way to use the site. You'll get all
                the features listed below and you will help us grow.</p>

            <p>If you would like to upgrade your account and start taking your friendship search seriously, please
                select an option below and then click on the green Upgrade button.</p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="c-color">Change your Upgraded Plan to a New Version?</h4>
                </div>
                <div class="card-body">
                    <h6 class="c-color">Gold Membership - Monthly plans</h6>
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <div class="border pt-5 pb-5 rounded px-3 package position-relative" data-package="{{$products[4]['id']}}">
                                <span>Save ${{$products[4]['save']}}</span>
                                <h3>${{$products[4]['price']}}/mo</h3>
                                <p>{{$products[4]['duration']}} Month Plan</p>
                                <p>$79.80 Yearly</p>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <div class="border pt-5 pb-5 rounded px-3 package position-relative" data-package="{{$products[4]['id']}}">
                                <span>Save ${{$products[3]['save']}}</span>
                                <h3>${{$products[3]['price']}}/mo</h3>
                                <p>{{$products[3]['duration']}} Month Plan</p>
                                <p>$45.95 Half Year</p>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <div class="border pt-5 pb-5 rounded px-3 package position-relative" data-package="{{$products[2]['id']}}">
                                <span>Save ${{$products[2]['save']}}</span>
                                <h3>${{$products[2]['price']}}/mo</h3>
                                <p>{{$products[2]['duration']}} Month Plan</p>
                                <p>$24.95 Quarterly</p>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <div class="border pt-5 pb-5 rounded px-3 package active position-relative" data-package="{{$products[1]['id']}}">
                                <span>Try it out</span>
                                <h3>${{$products[1]['price']}}/mo</h3>
                                <p>{{$products[1]['duration']}} Month Plan</p>
                                <p>$9.99 Monthly</p>
                            </div>
                        </div>
                    </div>
                    <h6 class="c-color mt-5">Lifetime Diamond Membership</h6>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="border pt-5 pb-5 rounded px-3 package position-relative" data-package="{{$products[5]['id']}}">
                                <h3>${{$products[5]['price']}}/one time</h3>
                                <p>Lifetime Membership</p>
                                <p>$150.00 Includes Tax</p>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p class="m-0 mt-4">All paid memberships are managed securely with Stripe.</p>
                            <p class="m-0">You can use your credit card or your bank account to upgrade via Stripe.</p>
                            <div>
                                <img src="{{url('user/stripe.png')}}" class="img-fluid" alt="">
                            </div>
                            <form id="submit-form" action="{{route('settings.payments.gateway')}}" method="get">
                                <input type="hidden" id="package" name="package">
                                <button type="submit" class="btn btn-lg btn-success upgrade-btn mt-2 mb-4">Upgrade and Continue
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
                    <h4 class="c-color">Upgraded Features</h4>
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
                    You will be forwarded to Stripe to complete your subscription when you click 'Upgrade'. A copy of
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
