<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fc;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .alert {
            padding: 15px;
            border-radius: 10px;
        }
        .alert-warning {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }
        .alert-warning a {
            color: #721c24;
            text-decoration: none;
            font-weight: bold;
        }
        .alert-warning a:hover {
            text-decoration: underline;
        }
        .btn-get-subscription {
            margin-top: 20px;
            background-color: #dc3545;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-get-subscription:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <!-- Subscription Check -->
    @if (!$hasSubscription)
    <div class="container">
        <div class="alert alert-warning" role="alert">
            <span>You should buy a subscription to access all features.</span>
            <a href="{{ route('user.subscriptions.list') }}" class="btn btn-primary btn-get-subscription">Get Subscription</a>
        </div>
    </div>
    @endif

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
