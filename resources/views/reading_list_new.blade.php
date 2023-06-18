@extends('layout')
@section('title', 'Login')
@section('content')
reading list page

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

@endsection