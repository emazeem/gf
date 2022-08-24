<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProfileCompletionMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->profileCompletePercentage()<=90){
            return redirect()->route('user.profile.pending');
        }
        return $next($request);
    }
}
