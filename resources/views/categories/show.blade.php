@extends('layouts.app')
@section('title', $category->name)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h1 class="h3 mb-0">{{ $category->name }}</h1>
        <div class="text-muted">Books in this category</div>
    </div>
    <div class="d-flex gap-2">
        <a class="btn btn-outline-secondary" href="{{ route('categories.edit', $category) }}">Edit</a>
        <a class="btn btn-outline-dark" href="{{ route('categories.index') }}">Back</a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0 table-striped align-middle">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Year</th>
                        <th class="text-end">View</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($category->books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author?->name ?? '-' }}</td>
                        <td>{{ $book->published_year ?? '-' }}</td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('books.show', $book) }}">Open</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center py-4 text-muted">No books yet.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
