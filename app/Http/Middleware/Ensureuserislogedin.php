<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Ensureuserislogedin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

    if (! session()->has('logged_in_user_id')) {
        return redirect('/')->with('email', 'You must log in first.');
    }

    return $next($request);
    }
}
