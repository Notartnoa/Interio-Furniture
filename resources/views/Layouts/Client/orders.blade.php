<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/bd9b5a24ba.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>MegaShop</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
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
    @endif
    <section class="orders-section">
        <div class="container">
            @if (sizeof($orders) == 0)
                <div class="empty-state">
                    <h2 class="section-title">No order placed so far :</h2>
                    <a href="/products" class="order-link">Order now</a>
                </div>
            @else
                <div class="header-container">
                    <h2 class="section-title">These are all the orders you have placed so far</h2>
                </div>

                <table class="orders-table">
                    <thead>
                        <tr class="table-header">
                            <th>#</th>
                            <th>order date</th>
                            <th>order status</th>
                            <th>total</th>
                            <th>order bills</th>
                        </tr>
                    </thead>
                    @php
                        $x = 0;
                    @endphp
                    <tbody class="table-body">
                        @foreach ($orders as $order)
                            <tr class="table-row">
                                <td class="table-cell">
                                    <div class="flex items-center">
                                        <div>
                                            <p class="font-semibold">{{ $x = $x + 1 }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="table-cell">{{ $order->order_date }}</td>
                                <td class="table-cell">{{ $order->order_status }}</td>
                                @php
                                    $orderTotal = 0;
                                @endphp
                                @foreach ($order->orderProducts as $orderProduct)
                                    @php
                                        $orderTotal += $orderProduct->total;
                                    @endphp
                                @endforeach
                                <td class="table-cell">{{ $orderTotal }} $</td>
                                <td class="table-cell">
                                    <button class="print-button">Print PDF</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>
    @include('sweetalert::alert')

</body>
<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>

</html>
