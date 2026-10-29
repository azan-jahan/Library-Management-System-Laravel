<!DOCTYPE html>
<html>
<head>
    <title>Library Management System</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: url("{{ asset('library.jpg') }}") no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .box {
            text-align: center;
            background: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 15px;
        }

        h1 {
            color: white;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            width: 200px;
            padding: 15px;
            margin: 10px;
            font-size: 18px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
        }

        .admin-btn {
            background: #007bff;
        }

        .admin-btn:hover {
            background: #0056b3;
        }

        .student-btn {
            background: #28a745;
        }

        .student-btn:hover {
            background: #1f7b34;
        }
    </style>
</head>

<body>

<div class="box">
    <h1>Library Management System</h1>

    <a href="{{ route('admin.login') }}" class="btn admin-btn">Admin Portal</a>
    <a href="{{ route('student.portal') }}" class="btn student-btn">Student Portal</a>
</div>

</body>
</html>

