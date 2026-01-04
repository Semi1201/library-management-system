@extends('layouts.app')
@section('title', 'Add Author')

@section('content')
<h1 class="h3 mb-3">Add Author</h1>

<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('authors.store') }}">
            @include('authors._form')
            <button class="btn btn-primary">Create</button>
            <a class="btn btn-link" href="{{ route('authors.index') }}">Cancel</a>
        </form>
    </div>
</div>
@endsection
