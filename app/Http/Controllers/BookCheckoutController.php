<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookCheckout;
use App\Models\User;
use App\Models\Book;

class BookCheckoutController extends Controller
{
    public function index()
    {
        // Retrieve all book checkouts
        $checkouts = BookCheckout::all();
        return view('bookcheckout.index', compact('checkouts'));
    }

    public function create()
    {
        $users = User::all();
        $books = Book::all();

        return view('bookcheckout.create', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        // Validate the request and store the checkout record
        // You might want to add additional validation logic
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'checkout_date' => 'required|date',
            'due_date' => 'required|date',
            'returned_at' => 'nullable|date', // Make 'returned_at' nullable
        ]);

        BookCheckout::create($request->all());

        return redirect('/bookcheckouts')->with('message', 'Book checked out successfully!');
    }

    public function edit($id)
    {
        $checkout = BookCheckout::findOrFail($id);
        $books = Book::all();
        $users = User::all();

        return view('bookcheckout.edit', compact('checkout', 'books', 'users'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'checkout_date' => 'required|date',
            'due_date' => 'required|date',
            'returned_at' => 'nullable|date', // Make 'returned_at' nullable
        ]);

        $checkout = BookCheckout::findOrFail($id);
        $checkout->update($request->all());

        return redirect('/bookcheckouts')->with('message', "Book checkout ID $id has been updated.");
    }
    public function delete($id)
    {
        $checkout = BookCheckout::findOrFail($id);
        $checkout->delete();

        return redirect('/bookcheckouts')->with('message', "Book checkout ID $id has been deleted.");
    }
}
