<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function authenticated(Request $request, $user) {
        $user->last_login = Carbon::now()->toDateTimeString();
        $user->save();
        $orders=Order::where('user_id',auth()->user()->id)->where('status','Active')->get();
        foreach ($orders as $order){
            if (date('Y-m-d')>=date('Y-m-d',strtotime($order->end))){
                $order->status='Expired';
                $order->save();
            }
        }
    }
}
