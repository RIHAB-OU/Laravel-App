<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subscription</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
        .card {
            border-radius: 15px;
        }
        .card-header {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .form-label i {
            margin-right: 5px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .alert ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4><i class="bi bi-plus-circle-fill"></i> Add Subscription</h4>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('subscriptions.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label"><i class="bi bi-card-heading"></i> Subscription Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label"><i class="bi bi-info-circle-fill"></i> Description</label>
                            <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="price" class="form-label"><i class="bi bi-cash"></i> Price</label>
                                <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                            </div>
                            <div class="col">
                                <label for="duration" class="form-label"><i class="bi bi-calendar2-check"></i> Duration (in months)</label>
                                <input type="number" id="duration" name="duration" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label"><i class="bi bi-toggle-on"></i> Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add Subscription</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
