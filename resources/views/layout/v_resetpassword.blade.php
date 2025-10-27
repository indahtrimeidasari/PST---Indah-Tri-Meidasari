<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🔑 Reset Password</title>
    <style>
        body {
            background: #0f2f3a;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            width: 350px;
            text-align: center;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 10px;
            text-align: center;
        }
        button {
            background: linear-gradient(to right, #4e9af1, #34d399);
            border: none;
            border-radius: 10px;
            padding: 10px;
            margin-top: 15px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
        }
        a {
            display: block;
            margin-top: 10px;
            color: white;
            text-decoration: underline;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>🔑 Reset Password</h2>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="New Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Reset Password</button>
        </form>
        <a href="{{ route('login') }}">Back to Login</a>
    </div>
</body>
</html>
