<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');
        $authorId = $request->query('author_id');
        $categoryId = $request->query('category_id');
        $sort = $request->query('sort', 'newest'); // default

        $booksQuery = Book::with(['author', 'category'])
            ->when($q, fn($query) =>
                $query->where('title', 'like', "%{$q}%")
            )
            ->when($authorId, fn($query) =>
                $query->where('author_id', $authorId)
            )
            ->when($categoryId, fn($query) =>
                $query->where('category_id', $categoryId)
            );

        // Sorting
        $booksQuery = match ($sort) {
            'title_asc'  => $booksQuery->orderBy('title', 'asc'),
            'title_desc' => $booksQuery->orderBy('title', 'desc'),
            'year_desc'  => $booksQuery->orderBy('published_year', 'desc'),
            'year_asc'   => $booksQuery->orderBy('published_year', 'asc'),
            default      => $booksQuery->orderBy('created_at', 'desc'),
        };

        $books = $booksQuery->paginate(10)->withQueryString();

        $authors = Author::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('books.index', compact('books', 'authors', 'categories', 'q', 'authorId', 'categoryId', 'sort'));
    }


    public function create()
    {
        $authors = Author::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('books.create', compact('authors', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'isbn' => ['nullable', 'string', 'max:20'],
            'published_year' => ['nullable', 'integer', 'min:1000', 'max:' . date('Y')],
            'description' => ['nullable', 'string'],
            'cover_url' => ['nullable', 'url'],
            'author_id' => ['required', 'exists:authors,id'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        // Generate unique slug
        $baseSlug = Str::slug($validated['title']);
        $slug = $baseSlug;
        $i = 2;

        while (Book::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $i;
            $i++;
        }

        $validated['slug'] = $slug;

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        $book->load(['author', 'category']);
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'isbn' => ['nullable', 'string', 'max:20'],
            'published_year' => ['nullable', 'integer', 'min:1000', 'max:' . date('Y')],
            'description' => ['nullable', 'string'],
            'cover_url' => ['nullable', 'url'],
            'author_id' => ['required', 'exists:authors,id'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        // If title changed, update slug safely
        if ($validated['title'] !== $book->title) {
            $baseSlug = Str::slug($validated['title']);
            $slug = $baseSlug;
            $i = 2;

            while (Book::where('slug', $slug)->where('id', '!=', $book->id)->exists()) {
                $slug = $baseSlug . '-' . $i;
                $i++;
            }

            $validated['slug'] = $slug;
        }

        $book->update($validated);

        return redirect()->route('books.show', $book)->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
