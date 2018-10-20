<?php

namespace App\Http\Middleware;
use Session;
use Auth;
use Closure;

class AdminCheck
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

        if(Auth::check()){
        if(Auth::user()->admin){
            return $next($request);

        }else{
            Session::flash('failed', 'Admin only allowed');
            return redirect()->back();
        }

    }
    else{
        Session::flash('failed', 'login');

        return redirect()->back();

    }
    }
}
