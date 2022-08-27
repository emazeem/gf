@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('user/js/toast.js')}}"></script>
    <main id="main">
        <div class="container">
            <div class="card mt-2">
                <div class="card-header">
                    <h4>Checkout Details</h4>
                </div>
                <div class="card-body">


                    <form id="payment-form"
                          class="require-validation"
                          data-cc-on-file="false"
                          data-stripe-publishable-key="{{ env('STRIPE_PUBLISH_KEY') }}">
                        <div class="cart-order-card-content">
                            <div class="cart-order-card-content-inner">
                                <div class="cart-order-new-card">
                                    <div class="cart-order-new-card-inner">
                                        <div class="card-field-outer">
                                            <div class="card-field-inner">
                                                <div class="card-field-single">
                                                    <div class="card-field-single-row">
                                                        <input type="hidden" id="expiration_year"
                                                               name="expiration_year">
                                                        <input type="hidden" id="expiration_month"
                                                               name="expiration_month">
                                                        <input type="hidden" id="card_type"
                                                               name="card_type">
                                                        @csrf
                                                        <input type="hidden"
                                                               name="store"
                                                               value="0">
                                                        <div class="card-single-field">
                                                            <label for="field-01">Card
                                                                Number</label>
                                                            <input type="text"
                                                                   class="card-field-input card-number form-control"
                                                                   name="card_number"
                                                                   id="card_number"
                                                                   placeholder="0000 0000 000 0000">
                                                            <span class='icon'>
                                                                                <span class="ti-credit-card"></span>
                                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="card-field-single-row rows">
                                                        <div class="card-single-field mr-2">
                                                            <label for="field-01">Expiry Date</label>
                                                            <input type="text" id="month_year"
                                                                   class="card-field-input  form-control"
                                                                   placeholder="MM/YY" maxlength="5">
                                                            <span class='icon'>
                                                                                <span class="ti-calendar"></span>
                                                                            </span>
                                                        </div>
                                                        <div class="card-single-field">
                                                            <label for="field-01">CVC/CV</label>
                                                            <input type="text"
                                                                   class="card-field-input card-cvc form-control"
                                                                   placeholder="..."
                                                                   name="cvc"
                                                                   id="cvc" maxlength="4">
                                                            <span class='icon'>
                                                                                                        <span class="ti-info-alt"></span> </span>
                                                        </div>
                                                    </div>
                                                    <div class="card-field-single-row">
                                                        <div class="card-single-field">
                                                            <label for="field-01">Card
                                                                Holder
                                                                Name</label>
                                                            <input type="text"
                                                                   class="card-field-input form-control"
                                                                   name="full_name"
                                                                   id="full_name"
                                                                   placeholder="Enter Card Holder's Full Name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cart-order-card-action">
                            <div class="cart-order-card-action-inner">
                                <button type="submit" id="save-card-btn" class="btn mt-2 btn-primary"> Add Card</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </main>
    <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

    <script>
        $(":input").inputmask();
        $("#month_year").inputmask({"mask": "99/99"});
    </script>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
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
    </script>
@endsection