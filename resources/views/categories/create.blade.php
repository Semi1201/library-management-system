@extends('layouts.app')
@section('title', 'Add Category')

@section('content')
<h1 class="h3 mb-3">Add Category</h1>

<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('categories.store') }}">
            @include('categories._form')
            <button class="btn btn-primary">Create</button>
            <a class="btn btn-link" href="{{ route('categories.index') }}">Cancel</a>
        </form>
    </div>
</div>
@endsection
