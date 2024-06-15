<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Edit Subscription</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('subscriptions.edit', $subscription->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $subscription->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" required>{{ $subscription->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Price ($)</label>
                            <input type="number" name="price" class="form-control" value="{{ $subscription->price }}" required>
                        </div>

                        <div class="form-group">
                            <label for="duration">Duration (months)</label>
                            <input type="number" name="duration" class="form-control" value="{{ $subscription->duration }}" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="active" {{ $subscription->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $subscription->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Subscription</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
