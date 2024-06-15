<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Coaching Platform - Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            background-color: #b3d9ff;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            animation: fadeIn 1.5s ease-in-out;
        }
        .login-container {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            position: relative;
            animation: fadeIn 2s ease-in-out;
        }
        .login-container h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
        .login-container .form-group {
            margin-bottom: 20px;
            position: relative;
            animation: fadeIn 2.5s ease-in-out;
        }
        .login-container .form-control {
            padding: 15px;
            padding-left: 45px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ddd;
            transition: border-color 0.3s ease;
        }
        .login-container .form-control:focus {
            border-color: #66b3ff;
            box-shadow: 0 0 5px rgba(102, 179, 255, 0.5);
        }
        .login-container .form-control::placeholder {
            color: #999;
        }
        .login-container .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }
        .login-container .btn {
            padding: 15px;
            font-size: 1rem;
            border-radius: 5px;
            background-color: #66b3ff;
            color: #fff;
            border: none;
            width: 100%;
            transition: background-color 0.3s ease;
            animation: fadeIn 3s ease-in-out;
        }
        .login-container .btn:hover {
            background-color: #3385ff;
        }
        .login-container .forgot-password {
            margin-top: 15px;
            text-align: center;
            animation: fadeIn 3.5s ease-in-out;
        }
        .login-container .forgot-password a {
            color: #66b3ff;
            text-decoration: none;
        }
        .login-container .forgot-password a:hover {
            text-decoration: underline;
        }
        .motivation-text {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.2rem;
            color: #333;
        }
        .attractive-text {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.4rem;
            color: #66b3ff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="bg-white p-5 rounded-lg shadow-md w-full max-w-md">
            <h1>Welcome Back!</h1>
            <!-- Motivation Text -->
            <div class="motivation-text">
                Welcome back to our Virtual Coaching Platform for Personal Development.
            </div>
            <!-- Attractive Text -->
            <div class="attractive-text">
                Discover Your Best Self, Virtually!
            </div>
            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                @csrf
                <div class="form-group">
                    <i class="fas fa-envelope form-icon"></i>
                    <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                    <div class="invalid-feedback">Please enter a valid email address.</div>
                </div>
                <div class="form-group">
                    <i class="fas fa-lock form-icon"></i>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <div class="invalid-feedback">Please enter your password.</div>
                </div>
                <button type="submit" class="btn">Log in</button>
            </form>
            <div class="forgot-password">
                <p>Forgot your password? <a href="{{ route('password.request') }}">Reset it here</a></p>
            </div>
        </div>
    </div>
</body>
</html>
