<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register - Mandiri Jaya Digital 💻</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; }
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #cddff1ff; /* netral */
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #000;
    }

    .register-container {
      background-color: #fff; /* putih polos */
      padding: 2rem 2.5rem;
      border-radius: 10px;
      width: 90%;
      max-width: 500px;
      text-align: center;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    h2 {
      margin-bottom: 1.5rem;
      font-size: 1.8rem;
      font-weight: 600;
      color: #333;
    }

    form {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1rem;
    }

    label {
      display: block;
      font-size: 0.9rem;
      font-weight: 500;
      margin-bottom: 0.3rem;
      color: #555;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 0.8rem 1rem;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 1rem;
      color: #333;
      background-color: #fff;
    }

    input::placeholder { color: #aaa; }

    input:focus {
      outline: none;
      border-color: #1cc88a;
      box-shadow: none;
    }

    .error-message {
      background: #f8d7da;
      border: 1px solid #f5c2c7;
      color: #842029;
      padding: 0.8rem 1rem;
      border-radius: 5px;
      font-size: 0.9rem;
      text-align: left;
    }

    button {
      background-color: #1cc88a;
      color: #fff;
      border: none;
      padding: 0.9rem;
      font-size: 1rem;
      font-weight: 600;
      border-radius: 5px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    button:hover {
      background-color: #17a673;
    }

    .bottom-text {
      margin-top: 1rem;
      font-size: 0.9rem;
      color: #555;
    }

    .bottom-text a {
      color: #1cc88a;
      text-decoration: none;
      font-weight: 600;
    }

    .bottom-text a:hover {
      text-decoration: underline;
    }

    @media (max-width: 500px) {
      .register-container { padding: 1.5rem 1.5rem; }
    }
  </style>
</head>
<body>
  <main class="register-container" role="main">
    <h2>Register Your Account 💻</h2>

    @if ($errors->any())
      <div class="error-message" role="alert">
        <ul style="margin: 0; padding-left: 1.2em;">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('register') }}" novalidate>
      @csrf
      <div>
        <label for="name">Full Name</label>
        <input
          id="name"
          type="text"
          name="name"
          value="{{ old('name') }}"
          required
          autofocus
          autocomplete="name"
          placeholder="Your full name"
        >
      </div>

      <div>
        <label for="email">Email Address</label>
        <input
          id="email"
          type="email"
          name="email"
          value="{{ old('email') }}"
          required
          autocomplete="email"
          placeholder="you@example.com"
        >
      </div>

      <div>
        <label for="password">Password</label>
        <input
          id="password"
          type="password"
          name="password"
          required
          autocomplete="new-password"
          placeholder="Create a password"
        >
      </div>

      <div>
        <label for="password_confirmation">Confirm Password</label>
        <input
          id="password_confirmation"
          type="password"
          name="password_confirmation"
          required
          autocomplete="new-password"
          placeholder="Repeat your password"
        >
      </div>

      <button type="submit" aria-label="Register a new account">Register</button>

      <div class="bottom-text">
        Already have an account? <a href="{{ route('login') }}">Login here</a>
      </div>
    </form>
  </main>
</body>
</html>
