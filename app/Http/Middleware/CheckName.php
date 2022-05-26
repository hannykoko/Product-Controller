<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class CheckName
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
        #to check $request pattern
        // Log::info($request);

        #check if name entered
        if(empty($request->name)){
            return response()->json(['status'=> 'NG','message'=> 'Please enter name']);
        }
        #check if name is valid
        else if(!preg_match ("/^([a-zA-Z' ]+)$/", $request->name)){
            return response()->json(['status'=> 'NG','message'=> 'Please enter valid name']);
        }
        return $next($request);
    }
}
