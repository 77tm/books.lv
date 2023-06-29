@extends('layout')
@section('title', 'New reading list')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>


    <form method="POST" action={{ action([App\Http\Controllers\ReadingListController::class, 'store']) }} enctype="multipart/form-data">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
        </div>

        <div>
            <label for="description">Description:</label>
            <input type="text" name="description" id="description">
        </div>

        <button type="submit">Submit</button>
    </form>
</body>

</html>
@endsection