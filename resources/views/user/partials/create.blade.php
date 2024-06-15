<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Goal</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
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
        .icon {
            margin-right: 10px;
        }
        .alert {
            display: none;
            margin-top: 20px;
        }
        .alert.active {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-bullseye icon"></i> Create Goal</h1>
        <p class="motivational-phrase">"The journey of a thousand miles begins with a single step."</p>
        <form action="{{ route('goals.store') }}" method="POST" onsubmit="showSuccessMessage()">
            @csrf
            <div class="form-group">
                <label for="title"><i class="fas fa-heading icon"></i> Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description"><i class="fas fa-align-left icon"></i> Description</label>
                <textarea name="description" id="description" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="due_date"><i class="fas fa-calendar-alt icon"></i> Due Date</label>
                <input type="date" name="due_date" id="due_date" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-check icon"></i> Create Goal</button>
        </form>
        <div class="alert alert-success mt-4" role="alert" id="successMessage">
            Goal created successfully!
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        function showSuccessMessage() {
            const successMessage = document.getElementById('successMessage');
            successMessage.classList.add('active');
            setTimeout(() => {
                successMessage.classList.remove('active');
            }, 3000);
        }
    </script>
</body>
</html>
