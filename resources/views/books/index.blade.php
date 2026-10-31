<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reading List</title>
</head>

<body>

    <h1>My Reading List</h1>
    <a href="{{ route('books.create') }}">Add book</a>

    @if($books->isEmpty())

        <p>No books yet. Start building your reading list!</p>

    @else

        @foreach($books as $book)
<div>
    <h3>{{ $book->title }}</h3>

    <p>Author: {{ $book->author }}</p>

    <p>Status: {{ $book->status }}</p>

    <a href="{{ route('books.edit', $book) }}">Edit</a>
</div>

        @endforeach

    @endif

</body>

</html>