<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <ul>
        @foreach ($allusers as $user)
            <li>{{ $user->name }}</li>
            @if ($user->role === 'admin')
                    This is admin: {{ $user->name }}
            
                @endif
        @endforeach
    </ul>
</body>
</html>