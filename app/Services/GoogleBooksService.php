<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GoogleBooksService
{
    public function lookupByIsbn(string $isbn): ?array
    {
        //remove spaces/hyphens
        $isbn = preg_replace('/[^0-9Xx]/', '', $isbn);

        $response = Http::timeout(8)->get('https://www.googleapis.com/books/v1/volumes', [
            'q' => 'isbn:' . $isbn,
            'maxResults' => 1,
        ]);

        if (!$response->successful()) {
            return null;
        }

        $data = $response->json();

        if (empty($data['items'][0]['volumeInfo'])) {
            return null;
        }

        $info = $data['items'][0]['volumeInfo'];

        $title = $info['title'] ?? null;
        $description = $info['description'] ?? null;

        // publishedDate can be "1937" or "1937-09-21"
        $publishedDate = $info['publishedDate'] ?? null;
        $year = null;
        if ($publishedDate && preg_match('/^\d{4}/', $publishedDate, $m)) {
            $year = (int) $m[0];
        }

        $cover = $info['imageLinks']['thumbnail'] ?? null;

        return [
            'isbn' => strtoupper($isbn),
            'title' => $title,
            'published_year' => $year,
            'description' => $description,
            'cover_url' => $cover,
        ];
    }
}
