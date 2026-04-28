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
    <div id="sidebar" class="sidebar">
        <h4 class="text-center">MENU</h4>
        <h5> Welcome, {{ Auth::user()->name ?? 'Guest' }}</h5>
        <a href="{{ url('/dashboard') }}">Home</a>
        <a href="{{ route('ld.activities') }}">L & D Activities</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger w-100 mt-3">
                Log Out
            </button>
        </form>
    </div>

    <!-- Topbar -->
    <div class="topbar">
        <div class ="logos">
            <img src="/logo.png" alt="DILG Logo">
        </div>
        <button id="toggleBtn" class="btn btn-light me-2">☰</button>

        <h5 class="mb-0">
            | DEPARTMENT OF THE INTERIOR AND LOCAL GOVERNMENT REGION VIII
        </h5>
    </div>

    <!-- Page Content -->
    <div id="content" class="content">
        @yield('content')
    </div>

    <script src="{{ asset('js/nav.js') }}"></script>
</body>
</html>