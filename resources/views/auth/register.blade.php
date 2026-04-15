<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div class="main-content">
        <div class="wrapper">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h2>Register</h2>

                <div class="input-field">
                    <input type="text" name="name" required>
                    <label>Full Name</label>
                </div>

                <div class="input-field">
                    <input type="email" name="email" required>
                    <label>Email Address</label>
                </div>

                <div class="input-field">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>

                <div class="input-field">
                    <input type="password" name="password_confirmation" required>
                    <label>Confirm Password</label>
                </div>

                <button type="submit">Create Account</button>

                <div class="register">
                    <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>