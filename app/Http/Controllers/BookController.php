<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // Menampilkan buku beserta data genrenya
        return response()->json(Book::with('genre')->get(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'year' => 'required|integer',
            'genre_id' => 'required|exists:genres,id'
        ]);

        $book = Book::create($validated);
        return response()->json($book, 201);
    }

    public function show(Book $book)
    {
        return response()->json($book->load('genre'), 200);
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'string',
            'author' => 'string',
            'year' => 'integer',
            'genre_id' => 'exists:genres,id'
        ]);

        $book->update($validated);
        return response()->json($book, 200);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(null, 204);
    }
}