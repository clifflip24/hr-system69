<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">My Dashboard</h4>
        <a href="{{ url('/dashboard') }}">Home</a>
        <a href="#">Users</a>
        <a href="#">Reports</a>
        <a href="#">Settings</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
    </div>

    <!-- Topbar -->
    <div class="topbar">
        <h5 class="mb-0">
            Welcome, {{ Auth::user()->name ?? 'Guest' }}
        </h5>
    </div>

    <!-- Page Content -->
    <div class="content">
        @yield('content')
    <h1>Dashboard</h1>
    <p>This is your main dashboard.</p>

    <div class="row">
        <div class="col-md-4">
            <div class="card p-3">
                <h5>Users</h5>
                <p>hatdog</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h5>Announcement</h5>
                <p>For sale hatdog!</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h5>Reports</h5>
                <p>hahaha</p>
            </div>
        </div>
    </div>
    </div>
   
</body>
</html>