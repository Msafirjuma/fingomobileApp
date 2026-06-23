<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;


class Ensureconnection
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

    try {
         $response = Http::post(env("API_URL").'/api/native-dashboard',[
            'userId' => session('logged_in_user_id'),
    
        ]);
    } catch (\Throwable $th) {
        return redirect('/no_internetconnection');
    }
     
   

       




        return $next($request);
    }
}
