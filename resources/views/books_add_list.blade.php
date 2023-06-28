@extends('layout')
@section('title', 'List of books')
@section('content')

<!-- books.create.blade.php -->

<!-- <h1>Add Book to Reading List</h1>

<form action="{{ route('reading_list.books.store', ['reading_list' => $readingList]) }}" method="POST">

    @csrf

    <div>
        <label for="book_id">Select a Book:</label>
        <select name="book_id" id="book">
            @foreach ($books as $book)
            <option value="{{ $book->id }}">{{ $book->name }} by {{$book->author}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit">Add Book</button>
</form> -->

<div class="home-content-profile">

    <h1>{{ __('Add a') }} <b>{{ __('book') }}</b> {{ __('to your reading list') }} 🚀</h1>

    <div class="login-container">
        <form action="{{ route('reading_list.books.store', ['reading_list' => $readingList]) }}" method="POST" class="mt-4" style="width: 400px">
            @csrf
            <!-- <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
            </div> -->

            <div class="col-md-12">
                <label for="book_id" class="form-label">{{ __('Choose one from the dropdown menu') }}</label>
                <select id="book" name="book_id" class="form-select">
                    @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->name }} by {{$book->author}}</option>
                    @endforeach
                </select>
            </div>

            <!-- <div>
                <label for="book_id">Select a Book:</label>
                <select name="book_id" id="book">
                    @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->name }} by {{$book->author}}</option>
                    @endforeach
                </select>
            </div> -->

            <div class="button-container-add">

                <button type="submit" class="btn btn-dark">{{ __('Update reading list') }}</button>
        </form>


        @endsection