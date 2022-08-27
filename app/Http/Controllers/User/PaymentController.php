<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        dd($request->all());

        $myAccount=auth()->user();

        Stripe\Stripe::setApiKey(env("STRIPE_SECRET_KEY"));
        Stripe\Charge::create ([
            "amount" => $total*100,
            "currency" => "usd",
            'customer' => auth()->user()->stripe_customer_id,
            'source' => $card->stripe_card_id,
            "description" => $narration,
        ]);
        session()->forget('coin_cart');
        return response()->json(["success"=>"Payment proceeded successfully!"]);








    }

}
