<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\ExamSchedule;
use App\Models\JobPosting;
use App\Models\User;
use App\Models\ActivityLog;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            // Stat card counts
            'totalAnnouncements' => Announcement::count(),
            'totalExamSchedules' => ExamSchedule::count(),
            'totalJobPostings'   => JobPosting::count(),
            'totalUsers'         => User::count(),

            // Recent activity feed (latest 6)
            'recentActivities' => ActivityLog::with('causer')
                ->latest()
                ->take(6)
                ->get(),

            // Tabbed table data (latest 5 each)
            'announcements'  => Announcement::latest()->take(5)->get(),
            'examSchedules'  => ExamSchedule::latest()->take(5)->get(),
            'jobPostings'    => JobPosting::latest()->take(5)->get(),
        ]);
    }
}