@php use Illuminate\Support\Facades\Auth; @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/bd9b5a24ba.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Interio.</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
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
                            <li><a href="/" class="nav-link" aria-current="page">Dashboard</a></li>
                            <li><a href="products" class="nav-link">Products</a></li>
                            <li><a href="#" class="nav-link">About</a></li>
                            <li><a href="#" class="nav-link">Contact</a></li>
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
                                    <li> <a href="/orders" class="dropdown-link">Your orders</a> </li>
                                    <li> <a href="/logout" class="dropdown-link">Sign out</a> </li>
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
                    <div class="navbar-links" id="mobile-menu-2">
                        <ul class="nav-list">
                            <li><a href="/" class="nav-link" aria-current="page">Dashboard</a></li>
                            <li><a href="products" class="nav-link">Products</a></li>
                            <li><a href="#" class="nav-link">About</a></li>
                            <li><a href="#" class="nav-link">Contact</a></li>
                        </ul>
                    </div>
                    <div class="navbar-items">
                        <div class="dropdown">
                            <button id="dropdownNavbarLink" class="dropdown-button">
                                <i class="fa-solid fa-bars fa-lg"></i>
                            </button>
                            <div id="dropdownNavbar" class="dropdown-menu">
                                <ul class="dropdown-list">
                                    <li> <a href="/admin" class="dropdown-link">Dashboard</a> </li>
                                    <li> <a href="/logout" class="dropdown-link">Sign out</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    @endif

    <section class="hero-section">
        <div class="hero-container">
            <div class="hero-content">
                <h1 class="hero-title">Furnish your home <br>with <span class="highlight">style and comfort.</span></h1>
                <p class="hero-description">
                    Find the best furniture for every room, from cozy living rooms to stylish bedrooms. Affordable and
                    trendy designs await. Start shopping now!
                </p>

                <a href="/products" class="hero-button">Start shopping</a>
            </div>
        </div>
    </section>

    <section class="categories-section">
        <div class="categories-container">
            <h1 class="categories-title">Top categories</h1>
            <div class="categories-grid">
                <!-- Kategori loop -->
                @foreach ($categories as $category)
                    <a href="products" class="category-item">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="new-arrivals-section">
        <div class="new-arrivals-container">
            <p class="new-arrivals-subtitle">New Arrivals</p>
            <h2 class="new-arrivals-title">Shop the Latest and Greatest in our New Arrivals!</h2>
            <p class="new-arrivals-description">
                Discover our latest and greatest arrivals! Our team is constantly curating new products that are sure to
                impress. Browse our collection and be the first to get your hands on the latest trends and must-have
                items!
            </p>
            <div class="products-grid">
                @foreach ($products as $product)
                    <a href="#" class="product-item">
                        <img src="{{ asset('storage/' . $product->img) }}" alt="Product Image" class="product-image">
                        <div class="product-details">
                            <h3 class="product-name">{{ $product->name }}</h3>
                            <p class="product-price">${{ $product->price }}</p>
                            <form action="{{ url('/cart/add/' . $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="product-button">Add to Cart</button>
                            </form>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    @component('Layouts.Components.footer')
    @endcomponent

</body>

</html>
