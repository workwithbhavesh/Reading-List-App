<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>

    <h1>Edit Book</h1>

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title:</label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ $book->title }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="author">Author:</label>
            <input
                type="text"
                id="author"
                name="author"
                value="{{ $book->author }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="to-read" {{ $book->status == 'to-read' ? 'selected' : '' }}>
                    To Read
                </option>

                <option value="reading" {{ $book->status == 'reading' ? 'selected' : '' }}>
                    Reading
                </option>

                <option value="finished" {{ $book->status == 'finished' ? 'selected' : '' }}>
                    Finished
                </option>
            </select>
        </div>

        <br>

        <button type="submit">Update Book</button>
    </form>

    <br>

    <a href="{{ route('books.index') }}">Back to Book List</a>

</body>
</html>