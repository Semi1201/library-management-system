@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="p-5 bg-white rounded shadow-sm">
        <h1 class="mb-2">Welcome</h1>
        <p class="text-muted">This is the Library System.</p>
        <a class="btn btn-primary" href="{{ route('books.index') }}">View Books</a>
    </div>
@endsection
