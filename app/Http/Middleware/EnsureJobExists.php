<?php

namespace App\Http\Middleware;

use App\Models\JobListing;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureJobExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Route parameter is joblisting
        $jobid = $request->route('joblisting');

        if (!JobListing::where('id', $jobid)->exists()) {
            // Redirect to list of job listings
            // and return an error that the job listing id passed is not found
            // abort(404);
            return redirect()->route('joblistings.index')->with('error', "Job listing is not found!");
        }
        return $next($request);
    }
}
