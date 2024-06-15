
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Questionnaires List</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Questionnaires</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                            </tr>

                                <th>Title</th>
                                <th>Description</th>
                                <th>Actions</th>                        </thead>
                        <tbody>
                            @foreach($questionnaires as $questionnaire)
                                <tr>
                                    <td>{{ $questionnaire->id }}</td>
                                    <td>{{ $questionnaire->title }}</td>
                                    <td>{{ $questionnaire->description }}</td>
                                    <td>
                                        <a href="{{ route('questionnaires.edit', $questionnaire->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('questionnaires.delete', $questionnaire->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
