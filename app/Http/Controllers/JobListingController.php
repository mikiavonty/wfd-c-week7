<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobListingController extends Controller
{
    public function index(): View {
        $jobListings = JobListing::paginate(8);
        return view('job-listings.index', [
            'jobListings' => $jobListings
        ]);
    }
}
