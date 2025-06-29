<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index()
    {
        return view('book_form');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'unique:books', 'max:100'],
            'author' => ['required', 'max:255']
        ]);

        $book = new Book($request->all());
        $book->save();
        return response()->json('Book is successfully validated and data has been saved');

    }
}
