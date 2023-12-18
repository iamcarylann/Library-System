@extends('pages.base')

@section('content')
    <h1>Book Checkout Details</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <td>{{ $checkout->id }}</td>
        </tr>
        <tr>
            <th>User ID</th>
            <td>{{ $checkout->user_id }}</td>
        </tr>
        <tr>
            <th>Book ID</th>
            <td>{{ $checkout->book_id }}</td>
        </tr>
        <tr>
            <th>Checkout Date</th>
            <td>{{ $checkout->checkout_date }}</td>
        </tr>
        <tr>
            <th>Due Date</th>
            <td>{{ $checkout->due_date }}</td>
        </tr>
        <tr>
            <th>Returned At</th>
            <td>{{ $checkout->returned_at }}</td>
        </tr>
    </table>

    <a href="{{ route('bookcheckout.index') }}">Back to Book Checkouts</a>
@endsection
