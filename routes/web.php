<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// User-facing controllers
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ExamScheduleController;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\FormController;

// Admin controllers
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminAnnouncementController;
use App\Http\Controllers\Admin\AdminExamScheduleController;
use App\Http\Controllers\Admin\AdminJobPostingController;
use App\Http\Controllers\Admin\AdminFormController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\ActivityLogController;

// HR Officer controllers
// (same controllers as above, just different middleware group)
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

require __DIR__.'/auth.php';
