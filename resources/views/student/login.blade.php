<!DOCTYPE html>
<html>
<head>
<title>Student Login</title>
<link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

<h2>Student Login</h2>

@if(session('message'))
    <p style="color:red;">{{ session('message') }}</p>
@endif

<form method="POST" action="{{ route('student.login') }}">
    @csrf
    <input type="text" name="roll_no" placeholder="Enter Roll Number" required>
    <button type="submit" name="login">Login</button>
    <a href="{{ route('student.portal') }}" class="btn btn-secondary mt-3">Back</a>

</form>

</body>
</html>

