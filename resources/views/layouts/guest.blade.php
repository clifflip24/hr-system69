<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
    <h4 class="text-center">MENU</h4>

        <a href="{{ route('landing') }}" class="glass-btn">
            <span class="glass-btn__icon">🏠</span>
            <span class="glass-btn__label">Home</span>
        </a>
        <a href="{{ route('user.guest') }}" class="glass-btn">
            <span class="glass-btn__icon">📊</span>
            <span class="glass-btn__label">Dashboard</span>
        </a>
        <a href="{{ route('user.act') }}" class="glass-btn">
            <span class="glass-btn__icon">📚</span>
            <span class="glass-btn__label">L & D Activities</span>
        </a>
    </div>

    <!-- Topbar -->
    <div class="topbar">
        <div class ="logos">
            <img src="/logo.png" alt="DILG Logo">
        </div>
        <button id="toggleBtn" class="btn btn-light me-2 left-margin 2px">☰</button>

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
