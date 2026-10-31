```blade
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reading List</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7f4;
            color: #1f2937;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            gap: 15px;
        }

        h1 {
            color: #14532d;
            margin: 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-add {
            background: #166534;
            color: white;
        }

        .btn-edit {
            background: #e0f2fe;
            color: #075985;
        }

        .btn-delete {
            background: #fee2e2;
            color: #b91c1c;
        }

        .filter-box {
            background: white;
            padding: 18px;
            border-radius: 12px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        select {
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: white;
        }

        .btn-filter {
            background: #14532d;
            color: white;
        }

        .book-card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            margin-bottom: 16px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
            border: 1px solid #e5e7eb;
        }

        .book-card h3 {
            margin-top: 0;
            margin-bottom: 8px;
            color: #14532d;
            font-size: 21px;
        }

        .author {
            color: #6b7280;
            margin-top: 0;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .to-read {
            background: #fef3c7;
            color: #92400e;
        }

        .reading {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .finished {
            background: #dcfce7;
            color: #166534;
        }

        .actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .actions form {
            margin: 0;
        }

        .empty {
            background: white;
            padding: 35px;
            text-align: center;
            border-radius: 12px;
            color: #6b7280;
        }

        @media (max-width: 600px) {
            .header {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">
            <h1>My Reading List</h1>
            <a href="{{ route('books.create') }}" class="btn btn-add">+ Add Book</a>
        </div>

        <form action="{{ route('books.index') }}" method="GET" class="filter-box">
            <label for="status">Filter by status:</label>

            <select name="status" id="status">
                <option value="">All Books</option>
                <option value="to-read" {{ $status == 'to-read' ? 'selected' : '' }}>To Read</option>
                <option value="reading" {{ $status == 'reading' ? 'selected' : '' }}>Reading</option>
                <option value="finished" {{ $status == 'finished' ? 'selected' : '' }}>Finished</option>
            </select>

            <button type="submit" class="btn btn-filter