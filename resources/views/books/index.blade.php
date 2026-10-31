<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reading List</title>
</head>

<body>

    <h1>My Reading List</h1>

    <a href="{{ route('books.create') }}">Add book</a>

    <!-- ADD THE FILTER FORM HERE -->
    <form action="{{ route('books.index') }}" method="GET">
        <label for="status">Filter by Status:</label>

        <select name="status" id="status">
            <option value="">All Books</option>

            <option value="to-read" {{ $status == 'to-read' ? 'selected' : '' }}>
                To Read
            </option>

            <option value="reading" {{ $status == 'reading' ? 'selected' : '' }}>
                Reading
            </option>

            <option value="finished" {{ $status == 'finished' ? 'selected' : '' }}>
                Finished
            </option>
        </select>

        <button type="submit">Filter</button>
    </form>

    @if($books->isEmpty())

        <p>No books yet. Start building your reading list!</p>

    @else

        @foreach($books as $book)

            <div>
                <h3>{{ $book->title }}</h3>

                <p>Author: {{ $book->author }}</p>

                <p>Status: {{ $book->status }}</p>

                <a href="{{ route('books.edit', $book) }}">Edit</a>

                <form action="{{ route('books.destroy', $book) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit">Delete</button>
                </form>
            </div>

        @endforeach

    @endif

</body>

</html>