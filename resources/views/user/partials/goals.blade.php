<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Goals</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }
        h1 {
            color: #343a40;
            font-weight: bold;
        }
        .btn-add {
            margin-bottom: 20px;
        }
        .btn-action {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            width: 40px;
            height: 40px;
        }
        .icon-size {
            font-size: 1.25rem; /* Taille des icônes personnalisée */
        }
        .modal-header, .modal-footer {
            display: flex;
            justify-content: space-between;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>My Goals</h1>
            <a href="{{ route('user.create') }}" class="btn btn-primary btn-add">
                <i class="fas fa-plus icon-size"></i> <!-- Utilisation de l'icône plus avec taille personnalisée -->
            </a>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($goals as $goal)
                        <tr>
                            <td>{{ $goal->title }}</td>
                            <td>{{ $goal->description }}</td>
                            <td>{{ $goal->due_date }}</td>
                            <td>
                                <a href="{{ route('goals.edit', $goal) }}" class="btn btn-warning btn-action">
                                    <i class="fas fa-edit icon-size"></i> <!-- Utilisation de l'icône d'édition avec taille personnalisée -->
                                </a>
                                <button type="button" class="btn btn-danger btn-action" data-toggle="modal" data-target="#deleteModal{{ $goal->id }}">
                                    <i class="fas fa-trash-alt icon-size"></i> <!-- Utilisation de l'icône de suppression avec taille personnalisée -->
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Modal -->
    @foreach($goals as $goal)
        <div class="modal fade" id="deleteModal{{ $goal->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $goal->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $goal->id }}">Delete Goal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this goal?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-action" data-dismiss="modal">
                            <i class="fas fa-times icon-size"></i> <!-- Utilisation de l'icône de fermeture avec taille personnalisée -->
                        </button>
                        <form action="{{ route('goals.destroy', $goal) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-action">
                                <i class="fas fa-trash-alt icon-size"></i> <!-- Utilisation de l'icône de suppression avec taille personnalisée -->
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
