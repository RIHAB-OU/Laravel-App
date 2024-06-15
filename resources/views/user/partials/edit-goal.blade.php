<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Edit Goal</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('goals.update', $goal) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $goal->title) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $goal->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="due_date">Due Date</label>
                            <input type="date" class="form-control" id="due_date" name="due_date" value="{{ old('due_date', $goal->due_date) }}">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Update Goal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
