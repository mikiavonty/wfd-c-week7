<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class LogRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info("Entering LogRequest Middleware");
        Log::info("Incoming Request", [
            'Method' => $request->method(),
            'URL' => $request->fullUrl(),
            'IP' => $request->ip(),
        ]);
        return $next($request);
    }
}
