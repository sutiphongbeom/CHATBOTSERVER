<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isstore
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->is_store == 1){
            return $next($request);
        }else
            return redirect('/')->with('error','You Dont Have Access'); 
     
    }
}
