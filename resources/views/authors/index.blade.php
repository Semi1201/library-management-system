@extends('layouts.app')
@section('title', 'Authors')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Authors</h1>
    <a href="{{ route('authors.create') }}" class="btn btn-primary">Add Author</a>
</div>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-striped align-middle mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Country</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($authors as $author)
                <tr>
                    <td>
                        <a class="text-decoration-none" href="{{ route('authors.show', $author) }}">
                            {{ $author->name }}
                        </a>
                    </td>
                    <td>{{ $author->country ?? '-' }}</td>
                    <td class="text-end">
                        <a href="{{ route('authors.edit', $author) }}" class="btn btn-sm btn-outline-secondary">Edit</a>

                        <form action="{{ route('authors.destroy', $author) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Delete this author?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="text-center py-4 text-muted">No authors found.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $authors->links() }}
</div>
@endsection
