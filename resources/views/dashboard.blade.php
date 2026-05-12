<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | DILG Region VIII</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: "Open Sans", sans-serif;
            background: linear-gradient(135deg, rgba(0, 43, 118, 0.9), rgba(0, 20, 60, 0.8)),
                        url("/bg.jpg") center/cover;
            min-height: 100vh;
            color: #fff;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        .header p {
            color: #ffcc00;
            font-size: 1.1rem;
        }
        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background: #ffcc00;
            color: #002b76;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .logout-btn:hover {
            background: #fff;
        }
    </style>
</head>
<body>

<a href="{{ route('logout') }}" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<div class="container">
    <div class="header">
        <h1>Dashboard</h1>
        <p>Welcome, {{ Auth::user()->name }}!</p>
    </div>

    <p>This is your dashboard. More features coming soon.</p>
</div>

</body>
</html>
