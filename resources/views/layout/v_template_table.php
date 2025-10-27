{{-- resources/views/layout/v_template.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'Smart Tech 🌿 Green Future')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="{{ asset('template2/public/css/tailwind/tailwind.min.css') }}"/>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #0d1b1e; color: white; scroll-behavior: smooth; }
        .gradient-bg { background: linear-gradient(135deg, #0d9488, #064e3b); }
        .section-title { font-size: 2.2rem; font-weight: 700; margin-bottom: 1rem; }
        .highlight { color: #a3e635; }
    </style>
</head>
<body class="antialiased">

{{-- Header & Navbar --}}
<header class="fixed w-full z-50 gradient-bg shadow-lg">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-white">SmartTech<span class="highlight">.</span></h1>
        <nav class="hidden md:flex space-x-8 text-white font-medium">
            <a href="#home" class="hover:text-lime-300">Home</a>
            <a href="#about" class="hover:text-lime-300">About</a>
            <a href="#features" class="hover:text-lime-300">Features</a>
            <a href="#dokumen" class="hover:text-lime-300">Dokumen</a>
            <a href="#contact" class="hover:text-lime-300">Contact</a>
        </nav>
        <a href="{{ route('login') }}" class="hidden md:inline-block bg-lime-400 text-teal-900 px-5 py-2 rounded-full font-semibold hover:bg-white transition">
            Login
        </a>
    </div>
</header>

{{-- Konten Dinamis --}}
<main class="pt-24">
    @yield('content')
</main>

{{-- Footer --}}
<footer class="bg-teal-950 py-6 text-center text-gray-300 mt-12">
    <p>© 2025 Smart Tech. All Rights Reserved.</p>
    <p class="text-sm mt-2">💻 Made with 💚 by <span class="highlight">SmartTech Team</span></p>
</footer>

</body>
</html>
