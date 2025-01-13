<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Interio.</title>
</head>

<body>
    <div class="login-container">
        <div class="left-section">
            <div class="left-content">
                <div class="left-title">Welcome back to Interio!</div>
                <div class="left-text">Please login to access your account and start shopping.</div>
            </div>
        </div>
        <div class="right-section">
            <div class="login-form">
                <h2 class="login-title">Welcome Back!</h2>
                <p class="login-subtitle">Please log in to your account</p>
                <form action="{{ route('login.user') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder=" "
                            required>
                        <label class="form-label" for="email">Email</label>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder=" "
                            required>
                        <label class="form-label" for="password">Password</label>
                    </div>
                    <button type="submit" class="login-btn">Login</button>
                    <p class="signup-text">
                        Don't have an account?<br>
                        <a href="/signup" class="signup-link">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</body>

</html>
