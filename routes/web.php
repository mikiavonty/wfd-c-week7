<?php

use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/jobs', [JobListingController::class, 'index'])->name('joblistings.index');

Route::post('/joblistings/{joblisting}/apply', [JobApplicationController::class, 'create'])->name('jobapplications.create');
// Route::resource('joblistings', JobApplicationController::class);