<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Customer;

class PaymentController extends Controller
{
    //
    public function gateway(Request $request)
    {
        $id = $request->package;
        $package = Product::find($id);
        return view('user.settings.payment.gateway', compact('package', 'id'));
    }

    public function process(Request $request)
    {
        $package = Product::find($request->package);
        return view('user.settings.payment.process', compact('package'));
    }

    public function store(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if (!auth()->user()->stripe_customer_id) {
            $customer = Customer::create(['email' => auth()->user()->email]);
            $user->stripe_customer_id = $customer['id'];
            $user->save();
        }
        $product = Product::find($request->product);
        $stripe_product = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );
        if (!isset($product->product_id)) {

            $responseProduct = $stripe_product->products->create([
                'name' => 'Package # [' . $product->id . '] [' . $product->type . ']',
            ]);
            $product->product_id = $responseProduct['id'];
            $product->save();
        }
        if (!isset($product->product_price)) {
            $responsePrice = $stripe_product->prices->create([
                'unit_amount' => $product->price * 100,
                'currency' => 'usd',
                'recurring' => ['interval' => 'month'],
                'product' => $product->product_id,
            ]);
            $product->product_price = $responsePrice['id'];
            $product->save();
        }

        /*        $card=$stripe_product->customers->createSource(
                    auth()->user()->stripe_customer_id,
                    ['source' => $request->stripeToken]
                );
                */


        if (!isset($product->product_subscription)) {
            $subscription = $stripe_product->subscriptions->create([
                'customer' => $user->stripe_customer_id,
                'items' => [
                    ['price' => $product->product_price],
                ],

            ]);

            $product->product_subscription = $subscription['id'];
            $product->save();
        }

        if (!isset($product->product_schedule)) {
            $responseSchedule=$stripe_product->subscriptionSchedules->create([
                'customer' => $user->stripe_customer_id,
                'start_date' => time(),
                'end_behavior' => 'release',
                'phases' => [
                    [
                        'items' => [
                            [
                                'price' => $product->product_price,
                                'quantity' => 1,
                            ],
                        ],
                        'iterations' => $product->duration,
                    ],
                ],
            ]);
            $product->product_schedule = $responseSchedule['id'];
            $product->save();
        }
        $stripe_product->invoices->create([
            'customer' =>$user->stripe_customer_id,
        ]);


        dd($request->all());
    }

}
