<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layouts.dashboard-content');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/ld-activities', function () {
    return view('layouts.ld_activities');
})->name('ld.activities');

Route::get('/calendar', [EventController::class, 'index']);
Route::get('/events', [EventController::class, 'fetch']);
Route::post('/events', [EventController::class, 'store']);

require __DIR__.'/auth.php';
