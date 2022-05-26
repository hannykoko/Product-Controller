<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if(($request->role !='parent') && ($request->role !='teacher')){
            return response()->json(['status'=>'NG','message'=>'You are not allowed CheckRole']);
        }
        return $next($request);
    }
}
