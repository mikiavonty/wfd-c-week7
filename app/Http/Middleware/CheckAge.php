<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, int $age): Response
    {
        Log::info("Entering CheckAge Middleware");
        $userAge = $request->input('age');

        if($userAge >= $age){
            return $next($request);
        }

        return response('Unauthorized. You must be at least '.$age.' years old', 403);
    }
}
