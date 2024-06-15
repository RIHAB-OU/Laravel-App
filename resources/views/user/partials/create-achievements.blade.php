<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Achievement</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .container:hover {
            transform: scale(1.02);
        }
        .form-group label {
            font-weight: bold;
            color: #495057;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn {
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        h1 {
            font-size: 2.5em;
            color: #343a40;
            margin-bottom: 10px;
            text-align: center;
        }
        .motivational-phrase {
            font-size: 1.2em;
            color: #6c757d;
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-trophy icon"></i> Add Achievement</h1>
        <p class="motivational-phrase">"Celebrate small victories to achieve big goals."</p>
        <form action="{{ route('achievements.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title"><i class="fas fa-heading icon"></i> Title</label>
                <input type="text" name="title" class="form-control" id="title" required>
            </div>
            <div class="form-group">
                <label for="description"><i class="fas fa-align-left icon"></i> Description</label>
                <textarea name="description" class="form-control" id="description" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-check icon"></i> Add</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
