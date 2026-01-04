@extends('layouts.app')

@section('title', 'Books')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Books</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
</div>

@include('books._filters')
@include('books._table', ['books' => $books])

<div class="mt-3">
    {{ $books->links() }}
</div>
@endsection
