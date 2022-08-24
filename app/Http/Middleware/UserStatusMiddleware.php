<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserStatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->status=='disable'){
            $user = Auth::user();
            $userToLogout = User::find($user->id);
            Auth::setUser($userToLogout);
            Auth::logout();
            return redirect()->route('login')->with('error','Your account is disabled');
        }
        if (auth()->user()->status=='delete'){
            $user = Auth::user();
            $userToLogout = User::find($user->id);
            Auth::setUser($userToLogout);
            Auth::logout();
            return redirect()->route('login')->with('error','Your account is deleted');
        }
        return $next($request);
    }
}
