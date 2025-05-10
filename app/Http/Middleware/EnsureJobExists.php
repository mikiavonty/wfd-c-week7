<?php

namespace App\Http\Middleware;

use App\Models\JobListing;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class EnsureJobExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info("Entering EnsureJobExists Middleware");
        // Route parameter is joblisting
        $jobid = $request->route('joblisting');
        Log::debug("Job ID received: ".$jobid);

        if (!JobListing::where('id', $jobid)->exists()) {
            // Redirect to list of job listings
            // and return an error that the job listing id passed is not found
            Log::debug("Redirecting to Job Listing index as job listing is not found!");
            return redirect()->route('joblistings.index')->with('error', "Job listing is not found!");
        }
        return $next($request);
    }
}
