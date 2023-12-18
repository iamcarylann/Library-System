@extends('pages.base')

@section('content')
    <h1>Return Book</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('bookcheckout.return', $checkout->id) }}" method="POST">
        @csrf
        @method('PUT')

        <button type="submit">Return Book</button>
    </form>
@endsection
