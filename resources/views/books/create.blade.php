<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
</head>

<body>

    <h1>Add a New Book</h1>

    <form action="{{ route('books.store') }}" method="POST">

        @csrf

        <div>
            <label for="title">Book Title:</label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}"
            >

            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label for="author">Author:</label>

            <input
                type="text"
                id="author"
                name="author"
                value="{{ old('author') }}"
            >

            @error('author')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label for="status">Status:</label>

            <select id="status" name="status">

                <option value="to-read"
                    {{ old('status', 'to-read') == 'to-read' ? 'selected' : '' }}>
                    To read
                </option>

                <option value="reading"
                    {{ old('status') == 'reading' ? 'selected' : '' }}>
                    Reading
                </option>

                <option value="finished"
                    {{ old('status') == 'finished' ? 'selected' : '' }}>
                    Finished
                </option>

            </select>

            @error('status')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">Save Book</button>

    </form>

    <br>

    <a href="{{ route('books.index') }}">Back to Reading List</a>

</body>

</html>