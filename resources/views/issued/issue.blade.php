<!DOCTYPE html>
<html>
<head>
<title>Issue Book</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h3>Issue Book</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('issued.issue') }}" class="card p-3 mt-3">
        @csrf

        <label>Choose Student</label>
        <select name="student_id" class="form-control" required>
            <option value="">-- Select Student --</option>
            @foreach($students as $student)
                <option value="{{ $student->id }}">
                    {{ htmlspecialchars($student->name) }}
                </option>
            @endforeach
        </select>

        <label class="mt-3">Choose Book</label>
        <select name="book_id" class="form-control" required>
            <option value="">-- Select Book --</option>
            @foreach($books as $book)
                <option value="{{ $book->id }}">
                    {{ htmlspecialchars($book->title) }}
                </option>
            @endforeach
        </select>

        <button name="issue" class="btn btn-success mt-3">Issue Book</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Back</a>

    </form>
</div>

</body>
</html>

