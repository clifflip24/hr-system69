<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | DILG Region VIII</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
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
        <div class="wrapper">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <h2>Login</h2>

                <div class="input-field">
                    <input type="text" name="name" required>
                    <label>Enter your username</label>
                </div>

                <div class="input-field">
                    <input type="password" name="password" required>
                    <label>Enter your password</label>
                </div>

                <div class="forget">
                    <label style="display: flex; align-items: center; gap: 5px;">
                        <input type="checkbox" name="remember">
                        <span>Remember me</span>
                    </label>
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                </div>

                <button type="submit">Log In</button>

                <div class="register">
                    <p>Don't have an account?
                        <a href="{{ route('register') }}">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

</div>

</body>
</html>