<form class="card shadow-sm p-3 mb-3" method="GET" action="{{ route('books.index') }}">
    <div class="row g-2 align-items-end">
        <div class="col-md-4">
            <label class="form-label">Search title</label>
            <input type="text" name="q" class="form-control" value="{{ $q ?? '' }}" placeholder="e.g. Hobbit">
        </div>

        <div class="col-md-3">
            <label class="form-label">Author</label>
            <select name="author_id" class="form-select">
                <option value="">All authors</option>
                @foreach($authors as $a)
                    <option value="{{ $a->id }}" @selected(($authorId ?? '') == $a->id)>{{ $a->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-select">
                <option value="">All categories</option>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}" @selected(($categoryId ?? '') == $c->id)>{{ $c->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <label class="form-label">Sort</label>
            <select name="sort" class="form-select">
                <option value="newest" @selected(($sort ?? '') === 'newest')>Newest</option>
                <option value="title_asc" @selected(($sort ?? '') === 'title_asc')>Title A–Z</option>
                <option value="title_desc" @selected(($sort ?? '') === 'title_desc')>Title Z–A</option>
                <option value="year_desc" @selected(($sort ?? '') === 'year_desc')>Year (high–low)</option>
                <option value="year_asc" @selected(($sort ?? '') === 'year_asc')>Year (low–high)</option>
            </select>
        </div>

        <div class="col-12 d-flex gap-2 mt-2">
            <button class="btn btn-primary">Apply</button>
            <a class="btn btn-outline-secondary" href="{{ route('books.index') }}">Reset</a>
        </div>
    </div>
</form>
