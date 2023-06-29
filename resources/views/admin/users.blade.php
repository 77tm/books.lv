@extends('layout')
@section('title', 'List of users')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .user {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .user p {
            margin-bottom: 10px;
        }

        .user button {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>List of Users</h1>
        <hr>
        @foreach ($users as $user)
        <div class="user">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <form action="{{ route('admin.users.delete', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user account?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete Account</button>
            </form>
            @if ($user->role !== 1)
            <form action="{{ route('admin.users.makeAdmin', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to make this user an admin?')">
                @csrf
                <button class="btn btn-primary" type="submit">Make Admin</button>
            </form>
            @else
            <form action="{{ route('admin.users.removeAdmin', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove the admin status from this user?')">
                @csrf
                @method('PUT')
                <button class="btn btn-secondary" type="submit">Remove Admin</button>
            </form>
            @endif
        </div>
        @endforeach
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>

@endsection