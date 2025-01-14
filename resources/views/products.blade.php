@php
    use Illuminate\Support\Facades\Auth;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/bd9b5a24ba.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Interio.</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
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
                            <li><a href="/" class="nav-link" aria-current="page">Home</a></li>
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
                    <div class="navbar-links" id="mobile-menu-2">
                        <ul class="nav-list">
                            <li><a href="/" class="nav-link" aria-current="page">Home</a></li>
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

    <section class="section-container">
        <div class="max-w-screen-xl">
            <div class="max-w-screen-md">
                <h2 class="section-title">Discover Our Range of Elegant and Functional Furniture</h2>
                <p class="section-description">Each piece of our furniture is thoughtfully designed and crafted to
                    combine style with practicality. Explore our collection today and find the perfect furniture to
                    elevate your living space.</p>
                <form class="search-form" id="search-form">
                    <label for="UserEmail" class="search-input-wrapper">
                        <input type="text" id="UserEmail" placeholder="Search a product name" class="search-input" />
                    </label>
                    <button class="search-button">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>

            <div class="content-wrapper">
                <div class="filters-container">
                    <details class="filter-box">
                        <summary class="filter-header">
                            <span class="filter-title">Categories</span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" style="width: 16px; height: 16px;">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </summary>
                        <div class="filter-content">
                            <div class="filter-stats">
                                <span>0 Selected</span>
                                <button type="button" class="reset-button">Reset</button>
                            </div>
                            <ul class="checkbox-list">
                                @foreach ($categories as $category)
                                    <li class="checkbox-item">
                                        <label class="checkbox-item">
                                            <input type="checkbox" id="FilterInStock" class="checkbox-input" />
                                            <span class="checkbox-label">{{ $category->name }}</span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </details>

                    <details class="filter-box">
                        <summary class="filter-header">
                            <span class="filter-title">Price</span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" style="width: 16px; height: 16px;">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </summary>
                        <div class="filter-content">
                            <div class="filter-stats">
                                <span>The highest price is $600</span>
                                <button id="filterBtn" class="filter-button">Filter</button>
                            </div>
                            <div class="price-inputs">
                                <div class="price-input-group">
                                    <span class="price-symbol">$</span>
                                    <input type="number" id="FilterPriceFrom" placeholder="From"
                                        class="price-input" />
                                </div>
                                <div class="price-input-group">
                                    <span class="price-symbol">$</span>
                                    <input type="number" id="FilterPriceTo" placeholder="To" class="price-input" />
                                </div>
                            </div>
                        </div>
                    </details>
                </div>

                <div class="products-grid">
                    @foreach ($products as $product)
                        <a id="{{ $product->name }}" href="#" class="product-card">
                            <img src="{{ asset('storage/' . $product->img) }}" alt="img"
                                class="product-image" />
                            <div class="product-details">
                                <h3 class="product-name">{{ $product->name }}</h3>
                                <p class="product-price">${{ $product->price }}</p>
                                <form action="{{ url('/cart/add/' . $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="add-to-cart">Add to Cart</button>
                                </form>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @component('Layouts.Components.footer')
    @endcomponent
    @include('sweetalert::alert')

    <script>
        const form = document.getElementById('search-form');
        const input = form.querySelector('input');

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            const searchValue = input.value.toLowerCase();

            // Loop through all products and hide/show them based on their ID
            const products = document.querySelectorAll('.group');

            products.forEach((product) => {
                const id = product.id.toLowerCase();

                if (id.includes(searchValue)) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        });
    </script>
    <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
</body>

</html>
