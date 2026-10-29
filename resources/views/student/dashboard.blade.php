<!DOCTYPE html>
<html>
<head>
<title>Student Dashboard</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <span class="navbar-brand">📚 Student Dashboard</span>
        <a href="{{ route('landing') }}" class="btn btn-danger">Logout</a>
    </div>
</nav>

<div class="container">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <h3>
        Welcome,
        {{ htmlspecialchars($student->name) }}
        (Roll: {{ htmlspecialchars($student->roll_no) }})
    </h3>

    <p class="text-muted">
        Class: {{ htmlspecialchars($student->class) }} |
        Contact: {{ htmlspecialchars($student->contact) }}
    </p>

    <hr>

    <!-- Available Books -->
    <h4>Available Books</h4>
    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Year</th>
            <th>Action</th>
        </tr>

        @foreach($books as $book)
        <tr>
            <td>{{ htmlspecialchars($book->title) }}</td>
            <td>{{ htmlspecialchars($book->author) }}</td>
            <td>{{ htmlspecialchars($book->category) }}</td>
            <td>{{ htmlspecialchars($book->year) }}</td>
            <td>
                <a href="{{ route('student.borrow', $book->id) }}"
                   class="btn btn-success btn-sm">
                   Borrow
                </a>
            </td>
        </tr>
        @endforeach
    </table>

    <hr>

    <!-- Borrowed Books -->
    <h4>Your Borrowed Books</h4>
    <table class="table table-bordered">
        <tr>
            <th>Book</th>
            <th>Issue Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        @foreach($issued as $issue)
        <tr>
            <td>{{ htmlspecialchars($issue->book->title) }}</td>
            <td>{{ $issue->issue_date }}</td>
            <td>{{ $issue->status }}</td>
            <td>
                @if($issue->status === 'issued')
                    <a href="{{ route('issued.return.book', $issue->id) }}"
                       class="btn btn-warning btn-sm">
                       Return
                    </a>
                @else
                    <span class="badge bg-success">Returned</span>
                @endif
            </td>
        </tr>
        @endforeach
    </table>

    <a href="{{ route('student.portal') }}" class="btn btn-secondary mt-3">Back</a>

</div>

</body>
</html>

