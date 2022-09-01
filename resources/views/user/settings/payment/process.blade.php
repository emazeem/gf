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
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="c-color">Package Type : {{$package->type}}</h4>
                            <h5>Price : {{$package->price}}</h5>
                            <p>This package will be active for {{$package->duration}}months</p>
                        </div>
                        <div class="col-md-6">
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://www.paypal.com/sdk/js?client-id=AVCjpmwfZivYOE2OXTG1yRd8FokNrnixQ13CDXhMELxHxoHHEs3FRnU9fn2F1gJVKtdNUNLfu1vL_toJ&currency=USD"></script>
    <script>

        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{$package['price']}}' // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {


                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

                    console.log(orderData,transaction);
                    $.ajax({
                        type: "POST",
                        url: "{{route('payment.success')}}",
                        dataType: "JSON",
                        data: {'order_id': transaction.id, 'status': transaction.status, _token: '{{csrf_token()}}'},
                        success: function (data) {
                            $.toast({heading: 'Success', text:data.success, icon: 'success', position: 'top-right'});
                        },
                        error: function (xhr) {
                            erroralert(xhr);
                        }
                    });
                });
            }
        }).render('#paypal-button-container');
    </script>
@endsection