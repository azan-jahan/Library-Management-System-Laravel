<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - LMS</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        .dashboard-card {
            transition: 0.3s;
            cursor: pointer;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        .action-btn {
            padding: 15px;
            font-size: 18px;
        }
    </style>

</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand">📚 Library Admin Dashboard</a>
        <a href="{{ route('landing') }}" class="btn btn-danger btn-sm">Logout</a>
    </div>
</nav>

<div class="container mt-4">

    <h3>Welcome Admin</h3>
    <p class="text-muted">Manage books, students, issuing & returning easily.</p>

    <!-- Stats Row -->
    <div class="row mb-4">

        <div class="col-md-3">
            <div class="card text-center shadow p-3 dashboard-card">
                <h4>{{ $bookCount }}</h4>
                <p class="text-muted">Total Books</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center shadow p-3 dashboard-card">
                <h4>{{ $studentCount }}</h4>
                <p class="text-muted">Total Students</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center shadow p-3 dashboard-card">
                <h4>{{ $issuedCount }}</h4>
                <p class="text-muted">Issued Books</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center shadow p-3 dashboard-card">
                <h4>{{ $returnedCount }}</h4>
                <p class="text-muted">Returned Books</p>
            </div>
        </div>

    </div>

    <!-- Action Buttons -->
    <h4 class="mb-3">Admin Actions</h4>

    <div class="row g-3">

        <div class="col-md-3">
            <a href="{{ route('books.create') }}" class="btn btn-primary w-100 action-btn">
                <i class="bi bi-plus-square"></i> Add Book
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('books.manage') }}" class="btn btn-warning w-100 action-btn">
                <i class="bi bi-pencil-square"></i> Update / Delete Book
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('issued.issue') }}" class="btn btn-success w-100 action-btn">
                <i class="bi bi-box-arrow-up"></i> Issue Book
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('issued.return') }}" class="btn btn-info w-100 action-btn text-white">
                <i class="bi bi-box-arrow-in-down"></i> Return Book
            </a>
        </div>

    </div>
</body>
</html>

