<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>🔐 Login</title>

    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
            width: 400px;
            background-color: #ffffff; /* putih polos */
            border: 1px solid #ccc; /* border tipis */
            border-radius: 10px; /* sudut membulat */
            padding: 30px;
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
            font-size: 1rem;
            padding: 10px 15px;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: #1cc88a;
            box-shadow: none;
            color: #333;
        }

        .form-control::placeholder {
            color: #888;
            font-weight: 400;
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

        .toggle-password {
            cursor: pointer;
            color: #555;
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

        .g-recaptcha {
            display: flex;
            justify-content: center;
            margin: 10px 0;
            transform: scale(1);
        }

        .form-group.mb-3.text-center {
            margin-top: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <h1>🔐 Welcome Back💻</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group mb-3">
                <input type="email" class="form-control" placeholder="Email Address" name="email"
                    value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group mb-3 position-relative">
                <input type="password" class="form-control" placeholder="Password" name="password" id="passwordInput"
                    required>
                <span class="toggle-password position-absolute"
                    style="top: 50%; right: 15px; transform: translateY(-50%);" onclick="togglePassword()">
                    <i class="bi bi-eye-slash" id="iconToggle"></i>
                </span>
            </div>

            <!-- Google reCAPTCHA -->
            <div class="form-group mb-3 text-center">
                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
            </div>

            <div class="form-group mb-3 text-start">
                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember Me</label>
            </div>

            <button type="submit" class="btn btn-primary mb-3">Login</button>
        </form>

        <div class="text-center">
            <a href="{{ route('password.request') }}">Forgot Password?</a>
        </div>
        <div class="text-center mt-2">
            @if (Route::has('register'))
                <a href="{{ route('register') }}">Don't have an account? Register here.</a>
            @endif
        </div>
    </div>

    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        function togglePassword() {
            const input = document.getElementById('passwordInput');
            const icon = document.getElementById('iconToggle');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            }
        }
    </script>
</body>

</html>
