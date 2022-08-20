<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home()
    {
        if (auth()->user()->role=='admin'){
            return redirect()->route('a.dashboard');
        }
        return redirect()->route('user.home');
    }
}
