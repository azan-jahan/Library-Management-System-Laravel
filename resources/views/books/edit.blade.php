<!DOCTYPE html>
<html>
<head>
<title>Edit Book</title>
<link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

<h2>Edit Book</h2>

@if($errors->any())
    @foreach($errors->all() as $error)
        <p style="color:red;">{{ htmlspecialchars($error) }}</p>
    @endforeach
@endif

<form method="POST" action="{{ route('books.update', $book->id) }}">
    @csrf
    @method('PUT')
    <input type="text" name="title"
           value="{{ htmlspecialchars($book->title) }}" required>

    <input type="text" name="author"
           value="{{ htmlspecialchars($book->author) }}" required>

    <input type="text" name="category"
           value="{{ htmlspecialchars($book->category) }}" required>

    <input type="number" name="year"
           value="{{ htmlspecialchars($book->year) }}" required>

    <button type="submit" name="update" class="btn">Update</button>
    <a href="{{ route('books.manage') }}" class="btn btn-secondary">Back</a>
</form>

</body>
</html>

