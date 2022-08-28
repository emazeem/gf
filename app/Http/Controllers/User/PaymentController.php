<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Cartalyst\Stripe\Api\Customers;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
use Stripe\Customer;

class PaymentController extends Controller
{
    //
    public function gateway(Request $request){
        $package=getPackageDetails($request->package);
        $id=$request->package;
        return view('user.settings.payment.gateway',compact('package','id'));
    }
    public function process(Request $request){
        $package=getPackageDetails($request->package);
        return view('user.settings.payment.process',compact('package'));
    }
    public function store(Request $request){

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY', null));

        $user=User::find(auth()->user()->id);

        if (!auth()->user()->stripe_customer_id){
            $customer = Customer::create(['email' => auth()->user()->email]);
            $user->stripe_customer_id=$customer['id'];
            $user->save();
        }
        dd($request->all());


        $stripe = new \Stripe\StripeClient(
            'sk_test_51JZ9PYSECWbQyTIWpKOncPsIJffZ8EGheQxYfs0eC6caxpEdwaEnLRMT4LE6DHUljvnLHQiHSkwDoYp0ifHvk8Iv00sRfX9COF'
        );
        $stripe->subscriptions->create([
            'customer' => 'cus_AJ78ZaALpqgiuZ',
            'items' => [
                ['price' => 'price_1LbMVW2eZvKYlo2C5ld6rO2J'],
            ],
        ]);



        session()->forget('coin_cart');
        return response()->json(["success"=>"Payment proceeded successfully!"]);








    }

}
