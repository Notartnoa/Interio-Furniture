@php use Illuminate\Support\Facades\Auth; @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/bd9b5a24ba.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Contact - Interio.</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .contact-section {
            padding: 4rem 2rem;
            text-align: center;
            background-color: #f8f9fa;
        }

        .contact-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #333;
        }

        .contact-description {
            font-size: 1.2rem;
            line-height: 1.8;
            color: #555;
            margin-bottom: 2rem;
        }

        .contact-form {
            max-width: 400px;
            margin: auto;
            padding: 4rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        .contact-form button {
            background-color: #ffa832;
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
        }

        .contact-form button:hover {
            background-color: #ffbf3f;
        }
    </style>
</head>

<body class="antialiased">
    @if (Auth::guest())
        @component('Layouts.Components.menu')
        @endcomponent
    @elseif(Auth::user()->type == 'client')
        <header class="header">
            <nav class="navbar">
                <div class="navbar-container">
                    <a href="/" class="navbar-brand">
                        <span class="brand-text">Interio.</span>
                    </a>
                    <div class="navbar-links" id="mobile-menu-2">
                        <ul class="nav-list">
                            <li><a href="/" class="nav-link" aria-current="page">Home</a></li>
                            <li><a href="/products" class="nav-link">Products</a></li>
                            <li><a href="/about" class="nav-link">About</a></li>
                            <li><a href="/contact" class="nav-link">Contact</a></li>
                        </ul>
                    </div>
                    <div class="navbar-items">
                        <a href="/cart" class="cart-button" id="cart-button">
                            <i class="fas fa-shopping-cart fa-lg"></i>
                        </a>
                        <div class="dropdown">
                            <button id="dropdownNavbarLink" class="dropdown-button">
                                <i class="fa-solid fa-bars fa-lg"></i>
                            </button>
                            <div id="dropdownNavbar" class="dropdown-menu">
                                <ul class="dropdown-list">
                                    <li><a href="/orders" class="dropdown-link">Your orders</a></li>
                                    <li><a href="/logout" class="dropdown-link">Sign out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    @elseif(Auth::user()->type == 'client')
        <header class="header">
            <nav class="navbar">
                <div class="navbar-container">
                    <a href="/home" class="navbar-brand">
                        <span class="brand-text">Interio.</span>
                    </a>
                    <div class="navbar-links">
                        <ul class="nav-list">
                            <li><a href="/home" class="nav-link">Home</a></li>
                            <li><a href="/products" class="nav-link">Products</a></li>
                            <li><a href="/about" class="nav-link">About</a></li>
                            <li><a href="/contact" class="nav-link">Contact</a></li>
                        </ul>
                    </div>
                    <div class="navbar-items">
                        <a href="/cart" class="cart-button">
                            <i class="fas fa-shopping-cart fa-lg"></i>
                        </a>
                        <div class="dropdown">
                            <button id="dropdownNavbarLink" class="dropdown-button">
                                <i class="fa-solid fa-bars fa-lg"></i>
                            </button>
                            <div id="dropdownNavbar" class="dropdown-menu">
                                <ul class="dropdown-list">
                                    <li><a href="/orders" class="dropdown-link">Your orders</a></li>
                                    <li><a href="/logout" class="dropdown-link">Sign out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    @elseif(Auth::user()->type == 'admin')
        <header class="header">
            <nav class="navbar">
                <div class="navbar-container">
                    <a href="/" class="navbar-brand">
                        <span class="brand-text">Interio.</span>
                    </a>
                    <div class="navbar-links">
                        <ul class="nav-list">
                            <li><a href="/" class="nav-link">Home</a></li>
                            <li><a href="/product" class="nav-link">Products</a></li>
                            <li><a href="/about" class="nav-link">About</a></li>
                            <li><a href="/contact" class="nav-link">Contact</a></li>
                        </ul>
                    </div>
                    <div class="navbar-items">
                        <div class="dropdown">
                            <button id="dropdownNavbarLink" class="dropdown-button">
                                <i class="fa-solid fa-bars fa-lg"></i>
                            </button>
                            <div id="dropdownNavbar" class="dropdown-menu">
                                <ul class="dropdown-list">
                                    <li><a href="/admin" class="dropdown-link">Dashboard</a></li>
                                    <li><a href="/logout" class="dropdown-link">Sign out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    @endif

    <section class="contact-section">
        <h1 class="contact-title">Contact Us</h1>
        <p class="contact-description">
            Ada pertanyaan? Hubungi kami melalui kontak yang tersedia, dan kami akan segera menghubungi Anda!
        </p>

        <div class="contact-form">
            <form action="/contact" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>

    </section>

    @component('Layouts.Components.footer')
    @endcomponent
</body>

</html>
