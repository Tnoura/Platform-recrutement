<?php

// use App\Http\Controllers\ProfileController;
// use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ApplicationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Job routes
Route::resource('jobs', JobController::class)->middleware('auth');

// Profile routes
Route::resource('profile', ProfileController::class)->middleware('auth');

// Category routes (Admin only)
Route::resource('categories', CategoryController::class)->middleware('auth');

// Application routes
Route::post('jobs/{job}/apply', [ApplicationController::class, 'store'])->middleware('auth')->name('jobs.apply');
Route::get('applications', [ApplicationController::class, 'index'])->middleware('auth')->name('applications.index');


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
