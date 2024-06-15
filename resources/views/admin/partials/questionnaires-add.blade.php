
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Add Questionnaire</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">New Questionnaire</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('questionnaires.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="questions">Questions</label>
                        <div id="question-list">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="questions[]" placeholder="Question" required>
                                <div class="input-group-append">
                                    <button class="btn btn-danger remove-question" type="button">Remove</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="add-question" class="btn btn-secondary">Add Question</button>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('add-question').addEventListener('click', function () {
            var questionList = document.getElementById('question-list');
            var newQuestion = document.createElement('div');
            newQuestion.className = 'input-group mb-3';
            newQuestion.innerHTML = `
                <input type="text" class="form-control" name="questions[]" placeholder="Question" required>
                <div class="input-group-append">
                    <button class="btn btn-danger remove-question" type="button">Remove</button>
                </div>
            `;
            questionList.appendChild(newQuestion);
        });

        document.getElementById('question-list').addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-question')) {
                e.target.closest('.input-group').remove();
            }
        });
    </script>

