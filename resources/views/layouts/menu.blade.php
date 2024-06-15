<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viva Coaching</title>
    <!-- Update Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .navbar {
            background-color: #f8f9fa;
            border: none;
            border-radius: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            color: #1e88e5 !important;
            font-size: 24px;
            font-weight: bold;
        }
        .navbar-toggler {
            border: none;
            background: transparent !important;
        }
        .navbar-toggler-icon {
            color: #1e88e5;
        }
        .navbar-nav .nav-link {
            color: #333333 !important;
            font-size: 16px;
            font-weight: normal;
            transition: color 0.3s;
        }
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link:focus {
            color: #43a047 !important;
        }
        .btn-custom {
            color: #ffffff !important;
            font-size: 16px;
            padding: 10px 20px;
            margin: 10px 5px;
            background-color: #1e88e5;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
        }
        .btn-custom:hover {
            background-color: #43a047 !important;
            color: #ffffff !important;
        }
        .dropdown-menu {
            background-color: #f8f9fa;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .dropdown-item {
            color: #333333 !important;
            padding: 10px 20px;
        }
        .dropdown-item:hover,
        .dropdown-item:focus {
            background-color: #43a047;
            color: #ffffff !important;
        }
        @media (max-width: 767px) {
            .btn-custom {
                display: block;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand">Viva Coaching</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="#top">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Our Coaches</a></li>
                    <li class="nav-item"><a class="nav-link" href="#sessions">Sessions</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonial">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-custom"><i class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle btn btn-primary btn-custom" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-plus"></i> Sign Up
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('register') }}">User Sign Up</a>
                            <a class="dropdown-item" href="{{ route('admin/register') }}">Admin Sign Up</a>
                            <a class="dropdown-item" href="{{ route('coach/register') }}">Coach Sign Up</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Update jQuery and Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
