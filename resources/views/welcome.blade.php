@extends('layout')
@section('title', "Home page")
@section('content')
@auth
{{auth()->user()->name}}

@endauth
@endsection