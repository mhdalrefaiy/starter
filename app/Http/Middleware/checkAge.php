<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class checkAge
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
        $age =Auth::user() -> age;
        if($age < 15){
            return redirect() -> route('not.adult');
        }
        return $next($request);
    }
}
