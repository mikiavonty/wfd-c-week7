<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\JobApplicationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/jobs', [JobListingController::class, 'index'])
        ->name('joblistings.index')
        ->middleware(['auth', 'log.request', 'add.header.middleware', 'terminating.middleware']);

Route::middleware(['auth', 'log.request', 'ensure.job.exists', 'add.header.middleware', 'terminating.middleware'])->group(function () {
       Route::get('/joblistings/{joblisting}/apply', [JobApplicationController::class, 'create'])
              ->name('jobapplications.create');
       Route::post('/joblistings/{joblisting}/apply', [JobApplicationController::class, 'store'])
              ->name('jobapplications.store')->middleware(['ensure.job.exists', 'check.age:21']);
});

require __DIR__.'/auth.php';
