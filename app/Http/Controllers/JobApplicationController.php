<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobListing;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $job = JobListing::where('id', $request->joblisting)->firstOrFail();
        return view('job-listings.apply', [
            'job' => $job
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone_number' => 'required',
            'resume' => 'required|file|mimes:pdf,docx|max:2048',
            'cover_letter' => 'required',
            'job_id' => 'required|numeric',
        ]);

        // If the data is not valid, redirect back to form and show the inputted data
        if (!$validated) {
            return redirect()->back()->withInput();
        } else {
            $resume_file_path = $request->file('resume')->store('resumes');
            JobApplication::create([
                "name" => $request->name,
                "email" => $request->email,
                "phone_number" => $request->phone_number,
                "resume_file_path" => $resume_file_path,
                "cover_letter" => $request->cover_letter,
                "job_id" => $request->job_id
            ])->save();
            $request->session()->flash('status', 'Job application was successful!');
            return redirect()->route('joblistings.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
