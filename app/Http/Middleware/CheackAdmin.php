<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheackAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(Auth::user()->type == 'user') return redirect('/');


        // Auth::user(); // get current logged in user
        // Auth::id(); // get current looged in user id
        // Auth::login($user); // make userlogged in
        // Auth::logout(); //destroy current session
        // Auth::check();//cheak if there any logged in user
        
        return $next($request);

    }
}
