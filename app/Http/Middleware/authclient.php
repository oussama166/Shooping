<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class authclient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        
        if(!(auth()->guest())){
            $check = Auth::user() -> validadmin;
            if($check == "client"){
                return $next($request);
        }
            return  redirect('login')->withSuccess("Veuillez entrer un autre compte, ce compte n'est pas autorisé de passer");
        }
        return redirect('login')->withSuccess("Vous devez connecter d'abord");
        
    }
}
