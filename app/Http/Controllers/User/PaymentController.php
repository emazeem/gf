<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
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
        $product = Product::find($id);
        session()->put('cart_product',$product);
        $package=session()->get('cart_product');
        if (!$package){
            return redirect()->back();
        }
        return view('user.settings.payment.gateway', compact('package', 'id'));
    }

    public function process(Request $request)
    {
        $package = session()->get('cart_product');
        if (!$package){
            return redirect()->back();
        }
        return view('user.settings.payment.process', compact('package'));
    }
    public function after_payment(Request $request){
        $package=session()->get('cart_product');
        $order=new Order();
        $order->user_id=auth()->user()->id;
        $order->product_id=$package['id'];
        $order->status='Active';
        $order->order_id=$request->order_id;
        $order->end=date('Y-m-d',strtotime(' + '.$package->duration.' months'));
        $order->save();
        session()->forget('cart_product');
        return response()->json(['success'=>'You have successfully upgraded your account']);
    }
}
