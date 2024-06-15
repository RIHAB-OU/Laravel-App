
    <h1>Edit Resource</h1>
    <form action="{{ route('resources.update', $resource->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $resource->name }}" required>
        </div>
        <button type="submit">Update</button>
    </form>

