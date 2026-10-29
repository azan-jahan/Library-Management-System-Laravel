<!DOCTYPE html>
<html>
<head>
<title>Return Books</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h3>Manage Returns</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered table-striped mt-3">
        <tr>
            <th>Student</th>
            <th>Book</th>
            <th>Issue Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        @foreach($issuedBooks as $issued)
        <tr>
            <td>{{ htmlspecialchars($issued->student->name) }}</td>
            <td>{{ htmlspecialchars($issued->book->title) }}</td>
            <td>{{ $issued->issue_date }}</td>
            <td>{{ $issued->status }}</td>
            <td>
                @if($issued->status === 'issued')
                    <a href="{{ route('issued.return', $issued->id) }}"
                       class="btn btn-warning btn-sm"
                       onclick="return confirm('Mark this book as returned?');">
                       Mark Returned
                    </a>
                @else
                    <span class="badge bg-success">Returned</span>
                @endif
            </td>
        </tr>
        @endforeach
    </table>

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Back</a>
</div>

</body>
</html>

