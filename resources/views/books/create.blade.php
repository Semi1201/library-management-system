@extends('layouts.app')
@section('title','Add Book')

@section('content')
<h1 class="h3 mb-3">Add Book</h1>

<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('books.store') }}">
            @include('books._form')
            <button class="btn btn-primary">Create</button>
            <a class="btn btn-link" href="{{ route('books.index') }}">Cancel</a>
        </form>
    </div>
</div>
@endsection
