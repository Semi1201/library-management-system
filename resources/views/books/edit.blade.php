@extends('layouts.app')
@section('title','Edit Book')

@section('content')
<h1 class="h3 mb-3">Edit Book</h1>

<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('books.update', $book) }}">
            @method('PUT')
            @include('books._form', ['book' => $book])
            <button class="btn btn-primary">Save</button>
            <a class="btn btn-link" href="{{ route('books.show', $book) }}">Cancel</a>
        </form>
    </div>
</div>
@endsection
