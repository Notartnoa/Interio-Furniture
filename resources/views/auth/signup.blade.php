<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Interio.</title>
</head>

<body>
    <div class="signup-container">
        <div class="left-section">
            <div class="signup-form">
                <h2 class="signup-title">Welcome!</h2>
                <p class="signup-subtitle">Create your account</p>
                <form action="{{ route('register.user') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" class="form-control" id="fname" name="fname" placeholder=" "
                                required>
                            <label class="form-label" for="fname">First Name</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="lname" name="lname" placeholder=" "
                                required>
                            <label class="form-label" for="lname">Last Name</label>
                        </div>
                    </div>
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
                    <button type="submit" class="signup-btn">Sign up</button>
                    <p class="login-text">
                        Already have an account<br>
                        <a href="/login" class="login-link">Login now</a>
                    </p>
                </form>
            </div>
        </div>
        <div class="right-section"></div>
    </div>
    @include('sweetalert::alert')
</body>

</html>
