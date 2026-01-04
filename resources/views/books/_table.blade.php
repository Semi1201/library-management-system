<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-striped align-middle mb-0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Year</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($books as $book)
                <tr>
                    <td>
                        <a href="{{ route('books.show', $book) }}" class="text-decoration-none">
                            {{ $book->title }}
                        </a>
                    </td>
                    <td>{{ $book->author?->name }}</td>
                    <td>{{ $book->category?->name }}</td>
                    <td>{{ $book->published_year ?? '-' }}</td>
                    <td class="text-end">
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-outline-secondary">Edit</a>

                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Delete this book?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center py-4 text-muted">No books found.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
