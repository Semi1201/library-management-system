@extends('layouts.app')
@section('title', 'Edit Category')

@section('content')
<h1 class="h3 mb-3">Edit Category</h1>

<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('categories.update', $category) }}">
            @method('PUT')
            @include('categories._form', ['category' => $category])
            <button class="btn btn-primary">Save</button>
            <a class="btn btn-link" href="{{ route('categories.show', $category) }}">Cancel</a>
        </form>
    </div>
</div>
@endsection
