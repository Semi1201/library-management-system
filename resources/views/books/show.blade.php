@extends('layouts.app')
@section('title', $book->title)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">{{ $book->title }}</h1>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('books.edit', $book) }}">Edit</a>
        <a class="btn btn-outline-dark" href="{{ route('books.index') }}">Back</a>
    </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
            <p><strong>Author:</strong> {{ $book->author?->name }}</p>
            <p><strong>Category:</strong> {{ $book->category?->name }}</p>
            <p><strong>ISBN:</strong> {{ $book->isbn ?? '-' }}</p>
            <p><strong>Published Year:</strong> {{ $book->published_year ?? '-' }}</p>
            <p class="mb-0"><strong>Description:</strong><br>{{ $book->description ?? 'No description.' }}</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
            <img src="{{ $book->cover_url }}" style="width:400px;height:500px;">
      </div>
    </div>
  </div>
</div>
@endsection
