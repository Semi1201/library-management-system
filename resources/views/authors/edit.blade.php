@extends('layouts.app')
@section('title', 'Edit Author')

@section('content')
<h1 class="h3 mb-3">Edit Author</h1>

<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('authors.update', $author) }}">
            @method('PUT')
            @include('authors._form', ['author' => $author])
            <button class="btn btn-primary">Save</button>
            <a class="btn btn-link" href="{{ route('authors.show', $author) }}">Cancel</a>
        </form>
    </div>
</div>
@endsection
