<!DOCTYPE html>
<html>
<head>
    <title>Student Portal</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: #f3f3f3;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .box {
            text-align: center;
            background: white;
            padding: 40px;
            width: 400px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }

        h2 {
            margin-bottom: 25px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            color: white;
            border-radius: 8px;
            transition: 0.3s;
        }

        .register-btn { background: #28a745; }
        .register-btn:hover { background: #1f7b34; }

        .login-btn { background: #007bff; }
        .login-btn:hover { background: #0056b3; }

        .logout-btn { 
            background: #dc3545;
        }
        .logout-btn:hover {
            background: #b52a36;
        }
    </style>
</head>

<body>

<div class="box">
    <h2>Student Portal</h2>

    <a href="{{ route('student.register') }}" class="btn register-btn">Register Student</a>
    <a href="{{ route('student.login') }}" class="btn login-btn">Student Login</a>
    <a href="{{ route('landing') }}" class="btn logout-btn">Back to Home</a>
</div>

</body>
</html>

