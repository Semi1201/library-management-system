@extends('layouts.app')
@section('title','Add Book')

@section('content')
<h1 class="h3 mb-3">Add Book</h1>

<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('books.store') }}">
            @include('books._form')
            <button class="btn btn-primary">Create</button>
            <a class="btn btn-link" href="{{ route('books.index') }}">Cancel</a>
        </form>
    </div>
</div>
@endsection


@section('scripts')
<script>
(() => {
    const btn = document.getElementById('isbnFetchBtn');
    if (!btn) return;

    const isbnInput = document.getElementById('isbnInput');
    const alertBox = document.getElementById('isbnAlert');

    const titleInput = document.querySelector('input[name="title"]');
    const yearInput = document.querySelector('input[name="published_year"]');
    const coverInput = document.querySelector('input[name="cover_url"]');
    const descInput = document.querySelector('textarea[name="description"]');

    function showAlert(type, message) {
        alertBox.classList.remove('d-none', 'alert-success', 'alert-danger', 'alert-warning');
        alertBox.classList.add('alert-' + type);
        alertBox.textContent = message;
    }

    btn.addEventListener('click', async () => {
        const isbn = (isbnInput.value || '').trim();
        if (!isbn) {
            showAlert('warning', 'Please enter an ISBN first.');
            return;
        }

        btn.disabled = true;
        btn.textContent = 'Fetching...';

        try {
            const res = await fetch("{{ route('books.isbnLookup') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ isbn })
            });

            const json = await res.json();

            if (!res.ok || !json.ok) {
                showAlert('danger', json.message || 'Could not fetch book details.');
                return;
            }

            const d = json.data;

            // Fill only if the API returned data
            if (d.title && titleInput) titleInput.value = d.title;
            if (d.published_year && yearInput) yearInput.value = d.published_year;
            if (d.cover_url && coverInput) coverInput.value = d.cover_url;
            if (d.description && descInput) descInput.value = d.description;

            // normalize(removes hyp/slash)
            if (d.isbn) isbnInput.value = d.isbn;

            showAlert('success', json.message || 'Fetched successfully.');
        } catch (e) {
            showAlert('danger', 'Network/API error. Please try again.');
        } finally {
            btn.disabled = false;
            btn.textContent = 'Fetch';
        }
    });
})();
</script>
@endsection
