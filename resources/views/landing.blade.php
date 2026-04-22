<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
   <section class=landing_section>
        <div class="container loading">
            <div class="left">
               <div class="info">
                <div class="logos">
                    <img src="/logo.png" alt="DILG Logo">
                </div>
                <h1>DEPARTMENT OF THE INTERIOR AND LOCAL GOVERNMENT</h1>
                <h2>REGION VIII</h2>
                <p>HUMAN RESOURCE MANAGEMENT E-LIBRARY</p>
                <a href="{{ route('login') }}" class="login-btn">Login</a>
            </div>
        </div>
    </section>
    <div class="mvs-section">
    <div class="mvs-container">

        {{-- Mission & Vision Cards side by side --}}
        <div class="mv-cards">

            <div class="mv-card">
                <h3>Mission</h3>
                <p>The department shall ensure peace and order, public safety and security,
                uphold excellence in local governance and enable resilient and inclusive
                communities.</p>
            </div>

            <div class="mv-card">
                <h3>Vision</h3>
                <p>A highly trusted Department and Partner in nurturing local government and
                sustaining peaceful, safe, progressive, resilient, and inclusive communities
                towards a comfortable and secure life for Filipinos by 2040.</p>
            </div>

        </div>

        {{-- Shared Values below --}}
        <div class="sv-card">
            <h3>Shared Values</h3>
            <p>Ang DILG ay Matino, Mahusay at Maasahan.</p>
        </div>

    </div>
</div>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const left = document.querySelector('.left');

        requestAnimationFrame(() => {
            left.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
            left.style.opacity = '1';
            left.style.transform = 'translateY(0)';
        });
    });
</script>
</script>
</body>
</html>