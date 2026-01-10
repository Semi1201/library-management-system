<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Library System')</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-semibold d-flex align-items-center gap-2" href="{{ url('/') }}">
            <i class="bi bi-book-half fs-5"></i>
            <span>Library</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link px-lg-3 rounded
                        {{ request()->routeIs('books.*') ? 'active bg-white bg-opacity-10' : '' }}"
                       href="{{ route('books.index') }}">
                        <i class="bi bi-journal-bookmark me-1"></i> Books
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-lg-3 rounded
                        {{ request()->routeIs('authors.*') ? 'active bg-white bg-opacity-10' : '' }}"
                       href="{{ route('authors.index') }}">
                        <i class="bi bi-people me-1"></i> Authors
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-lg-3 rounded
                        {{ request()->routeIs('categories.*') ? 'active bg-white bg-opacity-10' : '' }}"
                       href="{{ route('categories.index') }}">
                        <i class="bi bi-tags me-1"></i> Categories
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="border-bottom bg-white">
    <div class="container py-4">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-2">
            <div>
                <h1 class="h4 mb-1">@yield('page_title', 'Library System')</h1>
                <div class="text-muted small">Add your favorite books, edit existing entries and delete anything you don't like!</div>
            </div>
        </div>
    </div>
</header>

<main class="container py-4">
    {{-- Flash Alerts --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            @yield('content')
        </div>
    </div>
</main>

<footer class="border-top py-4 text-center text-muted bg-white mt-auto">
    <div class="container">
        <div class="small">
            © {{ date('Y') }} Library System by <b>Semira Saafi</b>
        </div>
    </div>
</footer>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>
