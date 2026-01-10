@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center p-5">
                    <h1 class="display-6 fw-bold mb-3">
                        <i class="bi bi-book-half me-2"></i>
                        Welcome
                    </h1>


                    <p class="text-muted lead mb-4">
                        This is the Library System.
                    </p>

                    <a href="{{ route('books.index') }}"
                       class="btn btn-primary btn-lg">
                        View Current Books
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
