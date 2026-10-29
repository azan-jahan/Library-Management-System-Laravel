<!DOCTYPE html>
<html>
<head>
<title>Add Book</title>
<link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

<h2>Add Book</h2>

@if($errors->any())
    @foreach($errors->all() as $error)
        <p style="color:red;">{{ $error }}</p>
    @endforeach
@endif

<form method="POST" action="{{ route('books.store') }}">
    @csrf
    <input type="text" name="title" placeholder="Book Title" required>
    <input type="text" name="author" placeholder="Author" required>
    <input type="text" name="category" placeholder="Category" required>
    <input type="number" name="year" placeholder="Year" min="1" required>

    <button type="submit" name="submit" class="btn">Add</button>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a>
</form>

</body>
</html>

