<!DOCTYPE html>
<html>
<head>
<title>Student Registration</title>
<link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

<h2>Student Registration</h2>

@if(session('message'))
    <p style="color:{{ session('msgColor', 'red') }};">
        {{ htmlspecialchars(session('message')) }}
    </p>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <p style="color:red;">{{ $error }}</p>
    @endforeach
@endif

<form method="POST" action="{{ route('student.register') }}">
    @csrf
    <input type="text" name="name" placeholder="Student Name" required>
    <input type="text" name="roll_no" placeholder="Roll Number" required>
    <input type="text" name="class" placeholder="Class" required>
    <input type="text" name="contact" placeholder="Contact Number" required>

    <button type="submit" name="register">Register</button>
    <a href="{{ route('student.portal') }}" class="btn btn-secondary mt-3">Back</a>
</form>

</body>
</html>

