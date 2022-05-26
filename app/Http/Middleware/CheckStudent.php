<?php

namespace App\Http\Middleware;

use Closure;

class CheckStudent
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
        if($request->role != 'student'){
            return response()->json(['status'=> 'NG','message'=>'You are not student']);
        }
        return $next($request);
    }
}
