@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="{{asset('user/css/toast.css')}}">
    <script src="{{asset('user/js/toast.js')}}"></script>
    <main id="main">

        <div class="container">
            <div class="card mt-2">
                <div class="card-header">
                    <h4>Checkout Details</h4>
                    @if(Session::has('error'))
                        <div class="alert alert-danger">{{Session::get('error')}}</div>
                    @endif
                </div>
                <div class="card-body">
                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>
    </main>
    <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

    <script>
        $(":input").inputmask();
        $("#month_year").inputmask({"mask": "99/99"});
    </script>
    <script src="https://www.paypal.com/sdk/js?client-id=AVCjpmwfZivYOE2OXTG1yRd8FokNrnixQ13CDXhMELxHxoHHEs3FRnU9fn2F1gJVKtdNUNLfu1vL_toJ&currency=USD"></script>

    <script>

        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '77.44' // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                });
            }
        }).render('#paypal-button-container');

    </script>








{{--    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function () {
            var $form = $("#payment-form");
            $('form#payment-form').bind('submit', function (e) {
                var button = $('#save-card-btn');
                button.attr('disabled', 'disabled').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing ...');
                var monthyear = $('#month_year').val();monthyear = monthyear.split('/');
                $('#expiration_month').val(monthyear[0]);
                $('#expiration_year').val(monthyear[1]);
                if ($('#card_number').val()== '' || $('#cvc').val()== '' || $('#full_name').val()== '' || monthyear[0]=='__' || monthyear[1]=='__' || $('#month_year').val()=='' ){
                    if ($('#card_number').val() == ''){
                        $.toast({heading: 'Warning', text:'Card number is required.*', icon: 'warning', position: 'top-right'});
                    }
                    if ($('#month_year').val() == ''){
                        $.toast({heading: 'Warning', text:'Expiration month & year is required.*', icon: 'warning', position: 'top-right'});
                    }
                    if ($('#cvc').val() == ''){
                        $.toast({heading: 'Warning', text:'CVC is required.*', icon: 'warning', position: 'top-right'});
                    }
                    if ($('#chec-0').prop("checked") == false){
                        $.toast({heading: 'Warning', text:'Please agree terms and conditions.*', icon: 'warning', position: 'top-right'});
                    }
                    if (monthyear[0]=='__'){
                        $.toast({heading: 'Warning', text:'Expiration month is required.*', icon: 'warning', position: 'top-right'});
                    }
                    if (monthyear[1]=='__'){
                        $.toast({heading: 'Warning', text:'Expiration year is required.*', icon: 'warning', position: 'top-right'});
                    }
                    if ($('#full_name').val() == ''){
                        $.toast({heading: 'Warning', text:'Name on card is required.*', icon: 'warning', position: 'top-right'});
                    }
                    $('#save-card-btn').attr('disabled', null).html('Save');
                    return false;
                }
                var $form = $("#payment-form"),
                    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');
                $inputs.each(function (i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('#expiration_month').val(),
                        exp_year: $('#expiration_year').val()
                    }, stripeResponseHandler);
                }
            });
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $.toast({
                        heading: 'Warning',
                        text: response.error.message,
                        icon: 'warning',
                        position: 'top-right',
                    });
                    $('#save-card-btn').attr('disabled', null).html('Save');
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    //$form.get(0).submit();
                    var route = '{{route('settings.payments.store')}}';
                    var data = new FormData($form[0]);
                    $.ajax({
                        url: route,
                        type: "POST",
                        data: data,
                        dataType: "JSON",
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function (data) {
                            $('#save-card-btn').attr('disabled', null).html('Save');
                        },
                        error: function (xhr) {
                            $('#save-card-btn').attr('disabled', null).html('Save');
                            erroralert(xhr);
                        }
                    });
                }
            }
        });
    </script>--}}
@endsection