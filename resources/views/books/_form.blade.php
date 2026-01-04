@csrf

<div class="mb-3">
    <label class="form-label">Title</label>
    <input name="title" class="form-control @error('title') is-invalid @enderror"
           value="{{ old('title', $book->title ?? '') }}">
    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Author</label>
        <select name="author_id" class="form-select @error('author_id') is-invalid @enderror">
            <option value="">Select author...</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}"
                    @selected(old('author_id', $book->author_id ?? '') == $author->id)>
                    {{ $author->name }}
                </option>
            @endforeach
        </select>
        @error('author_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
            <option value="">Select category...</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    @selected(old('category_id', $book->category_id ?? '') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">ISBN</label>
        <input name="isbn" class="form-control @error('isbn') is-invalid @enderror"
               value="{{ old('isbn', $book->isbn ?? '') }}">
        @error('isbn') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Published Year</label>
        <input name="published_year" type="number" class="form-control @error('published_year') is-invalid @enderror"
               value="{{ old('published_year', $book->published_year ?? '') }}">
        @error('published_year') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Cover URL</label>
    <input name="cover_url" class="form-control @error('cover_url') is-invalid @enderror"
           value="{{ old('cover_url', $book->cover_url ?? '') }}">
    @error('cover_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $book->description ?? '') }}</textarea>
    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
