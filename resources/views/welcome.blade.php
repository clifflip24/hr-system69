<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | DILG Region VIII</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
        .welcome-content {
            color: #fff;
            text-align: center;
            padding: 40px;
        }
        .welcome-content h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        .welcome-content p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #ffcc00;
        }
        .btn-group {
            display: flex;
            gap: 20px;
            justify-content: center;
        }
        .btn {
            padding: 12px 30px;
            background: #ffcc00;
            color: #002b76;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background: #fff;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="left">
        <div class="info">
            <div class="logos">
                <img src="/logo.png" alt="DILG Logo">
            </div>

            <h1>DEPARTMENT OF THE INTERIOR AND LOCAL GOVERNMENT</h1>
            <h2>REGION VIII</h2>
            <p>HUMAN RESOURCE MANAGEMENT E-LIBRARY</p>
        </div>
    </div>

    <div class="right">
        <div class="welcome-content">
            <h1>Welcome</h1>
            <p>DILG Region VIII HR Management System</p>
            <div class="btn-group">
                <a href="{{ route('login') }}" class="btn">Login</a>
                <a href="{{ route('register') }}" class="btn">Register</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
