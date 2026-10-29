<!DOCTYPE html>
<html>
<head>
    <title>Library Management</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

<h1>Library Management System</h1>

<a class="btn" href="{{ route('books.create') }}">+ Add Book</a>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Category</th>
        <th>Year</th>
        <th>Actions</th>
    </tr>

    @foreach($books as $book)
    <tr>
        <td>{{ $book->id }}</td>
        <td>{{ htmlspecialchars($book->title) }}</td>
        <td>{{ htmlspecialchars($book->author) }}</td>
        <td>{{ htmlspecialchars($book->category) }}</td>
        <td>{{ htmlspecialchars($book->year) }}</td>
        <td>
            <a class='edit' href="{{ route('books.edit', $book->id) }}">Edit</a>
            <a class='delete'
               href="{{ route('books.destroy', $book->id) }}"
               onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>

