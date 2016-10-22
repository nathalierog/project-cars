<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfUserIsBoth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    $user = $request->user();

    if(isset($user->role)) {
        if($user->role == 1){
            return redirect('/');
        }
    } else {
        return redirect('/login');
    }

        return $next($request);
    }
}
