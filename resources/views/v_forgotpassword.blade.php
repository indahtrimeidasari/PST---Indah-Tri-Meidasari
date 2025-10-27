<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>🔑 Forgot Password</title>

    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #cddff1ff; /* background netral */
            font-family: 'Poppins', sans-serif;
        }

        .login-card {
            width: 340px;
            background-color: #ffffff; /* putih polos */
            border: 1px solid #ccc; /* border tipis */
            border-radius: 10px; /* sudut membulat */
            padding: 30px 25px;
            color: #000;
            text-align: center;
            box-shadow: none; /* tanpa shadow */
        }

        .login-card h1 {
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 1.5rem;
            color: #333;
            text-shadow: none;
        }

        .form-control {
            border-radius: 5px;
            background-color: #fff;
            border: 1px solid #ccc;
            color: #333;
            padding: 10px 15px;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: #1cc88a;
            box-shadow: none;
            color: #333;
        }

        .form-control::placeholder {
            color: #888;
        }

        .btn-primary {
            border-radius: 5px;
            background-color: #1cc88a;
            border: none;
            width: 100%;
            padding: 10px;
            font-weight: 500;
            color: white;
        }

        .btn-primary:hover {
            background-color: #17a673;
        }

        .alert-success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            border-radius: 5px;
            padding: 8px 12px;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        .alert-danger {
            background-color: #f8d7da;
            border: 1px solid #f5c2c7;
            color: #842029;
            border-radius: 5px;
            padding: 8px 12px;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        .text-center a {
            color: #007bff;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .text-center a:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <h1>🔑 Forgot Password</h1>

        {{-- Pesan sukses --}}
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        {{-- Error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form kirim reset password --}}
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email Address"
                    value="{{ old('email') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Send Reset Link</button>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}">Back to Login</a>
        </div>
    </div>

    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
