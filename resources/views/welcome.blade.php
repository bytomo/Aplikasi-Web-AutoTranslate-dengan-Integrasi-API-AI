<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Translator AI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Reset & base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f0f4ff, #dbeafe);
            overflow: hidden;
            height: 100vh;
            position: relative;
        }

        /* Orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            opacity: 0.6;
            animation: float 8s infinite ease-in-out;
        }
        .orb1 {
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, #60a5fa, #3b82f6);
            top: 10%;
            left: 15%;
        }
        .orb2 {
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, #f472b6, #ec4899);
            bottom: 15%;
            right: 10%;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-30px); }
        }

        /* Header Buttons */
        .header {
            position: absolute;
            top: 1rem;
            right: 2rem;
            z-index: 20;
        }
        .nav-btn {
            display: inline-block;
            margin-left: 1rem;
            padding: 0.5rem 1.2rem;
            border-radius: 999px;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .nav-btn.login {
            background: linear-gradient(to right, #6366f1, #3b82f6);
            color: #fff;
        }
        .nav-btn.login:hover {
            background: linear-gradient(to right, #4f46e5, #2563eb);
            transform: scale(1.05);
        }
        .nav-btn.register {
            background: linear-gradient(to right, #f59e0b, #f97316);
            color: #fff;
        }
        .nav-btn.register:hover {
            background: linear-gradient(to right, #d97706, #ea580c);
            transform: scale(1.05);
        }

        /* Main Container */
        .container {
            z-index: 10;
            text-align: center;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            max-width: 400px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        h1 {
            font-size: 2.5rem;
            color: #1e3a8a;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1.1rem;
            color: #374151;
            margin-bottom: 2rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
            text-decoration: none;
        }

        .btn:hover {
            background: #1d4ed8;
        }
    </style>
</head>
<body>
    <!-- Orbs Background -->
    <div class="orb orb1"></div>
    <div class="orb orb2"></div>

    <!-- Header Auth Buttons -->
    <div class="header">
        @guest
            <a href="{{ route('login') }}" class="nav-btn login">🔐 Login</a>
            <a href="{{ route('register') }}" class="nav-btn register">📝 Register</a>
        @endguest

        @auth
            <a href="{{ url('/dashboard') }}" class="nav-btn login">📂 Dashboard</a>
        @endauth
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1>Translator AI</h1>
        <p>Terjemahkan teks dengan cepat dan akurat menggunakan teknologi AI.</p>
        <a href="{{ url('/translator') }}" class="btn">🚀 Mulai Translate</a>
    </div>
</body>
</html>