
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Sessions List</h1>
    <a href="{{ route('sessions.add') }}" class="btn btn-primary mb-3">Add Session</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-white">Sessions</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Start Session</th>
                            <th>End Session</th>
                            <th>Coach</th>
                            <th>User</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Start Session</th>
                            <th>End Session</th>
                            <th>Coach</th>
                            <th>User</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($sessions as $session)
                            <tr>
                                <td>{{ $session->id }}</td>
                                <td>{{ $session->name }}</td>
                                <td>{{ $session->start_date }}</td>
                                <td>{{ $session->end_date }}</td>
                                <td>
                                    @if ($session->coach && $session->coach->profile_image)
                                        <img class="img-profile rounded-circle" style="width: 45px; height: 45px;"
                                             src="{{ asset('storage/profiles/' . $session->coach->profile_image) }}" alt="{{ $session->coach->name }}">
                                    @else
                                        <img class="img-profile rounded-circle" style="width: 45px; height: 45px;"
                                             src="{{ asset('storage/profiles/default.jpg') }}" alt="Default Profile Image">
                                    @endif
                                    {{ $session->coach ? $session->coach->name : 'N/A' }}
                                </td>
                                <td>
                                    @if ($session->user && $session->user->profile_image)
                                        <img class="img-profile rounded-circle" style="width: 45px; height: 45px;"
                                             src="{{ asset('storage/profiles/' . $session->user->profile_image) }}" alt="{{ $session->user->name }}">
                                    @else
                                        <img class="img-profile rounded-circle" style="width: 45px; height: 45px;"
                                             src="{{ asset('storage/profiles/default.jpg') }}" alt="Default Profile Image">
                                    @endif
                                    {{ $session->user ? $session->user->name : 'N/A' }}
                                </td>
                                <td>
                                    <form action="{{ route('sessions.destroy', $session->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this session?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
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

