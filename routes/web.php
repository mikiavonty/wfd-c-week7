<?php

use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobListingController;
use App\Http\Middleware\EnsureJobExists;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/jobs', [JobListingController::class, 'index'])->name('joblistings.index');

// Route::middleware([EnsureJobExists::class])->group(function() {
    Route::get('/joblistings/{joblisting}/apply', [JobApplicationController::class, 'create'])->name('jobapplications.create')->middleware('ensure.job.exists');
    Route::post('/joblistings/{joblisting}/apply', [JobApplicationController::class, 'store'])->name('jobapplications.store')->middleware('ensure.job.exists');
// });