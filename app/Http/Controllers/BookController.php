<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index() {
        $books = Book::orderBy('id')->get();
        return view('book.index', ['books' => $books]);
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|unique:books',
            'published_at' => 'required|date',
            'quantity' => 'required|integer|min:0',
        ]);

        Book::create($request->all());

        return redirect('/books')->with('message', 'Book created successfully!');
    }

    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));
    }

    public function update(Book $book, Request $request) 
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|unique:books',
            'published_at' => 'required|date',
            'quantity' => 'required|integer|min:0',
        ]);

        $book->update($request->all());
        return redirect('/books')->with('message', "$book->title has been updated.");
    }

  
}
