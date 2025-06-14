<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$types): Response
    {

        if(auth()->check() && in_array(auth()->user()->user_type,$types)){
            return $next($request);
        }

        return redirect('/home')->with('status',"you Dont have access to this page");
        
        // return $next($request);
    }
}