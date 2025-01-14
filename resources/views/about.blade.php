@php use Illuminate\Support\Facades\Auth; @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/bd9b5a24ba.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>About - Interio.</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            padding: 0;
            font-family: 'Nunito', sans-serif;

        }

        main {
            padding-top: 70px;
            /* Sesuaikan dengan tinggi navbar */
        }

        .navbar {
            position: fixed;
            /* Membuat navbar selalu menempel di atas */
            top: 0;
            left: 0;
            width: 100%;
            /* Memastikan navbar menutupi seluruh lebar layar */
            z-index: 1000;
            /* Memberikan prioritas agar navbar tetap di atas elemen lain */
            background-color: #ffffff;
            /* Warna latar navbar (opsional) */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Tambahkan bayangan untuk membedakan dengan elemen lainnya */
        }

        .about-section {
            padding: 4rem 2rem;
            text-align: center;
            background-color: #f8f9fa;
        }

        .about-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #333;
        }

        .about-description {
            font-size: 1.2rem;
            line-height: 1.8;
            color: #555;
            margin-bottom: 2rem;
        }

        .about-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 2rem;
        }

        .about-description {
            padding: 80px;
            margin: 100px;
            background-color: #ffa832;
            border-radius: 12px;
            /* Membuat sudut melengkung */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            /* Menambahkan bayangan */
            font-size: 1.2rem;
            color: #333;
            line-height: 1.8;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            /* Animasi transisi */
        }

        .about-description:hover {
            transform: scale(1.02);
            /* Efek memperbesar saat hover */
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.3);
            /* Bayangan lebih gelap saat hover */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .about-description {
            animation: fadeIn 1s ease-in-out;
            /* Animasi fade-in */
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

    <section class="about-section">
        <h2 class="about-title">Menciptakan Ruang Dengan Elegansi</h2>
        <div class="about">
            <p class="about-description ">
                Selamat datang di Interio, destinasi utama Anda untuk furnitur dan dekorasi rumah yang luar biasa. Kami
                lebih dari sekadar
                marketplace; kami adalah jembatan untuk mengubah rumah menjadi tempat yang penuh kenyamanan dan
                keindahan. Di Interio,
                kami percaya bahwa setiap furnitur memiliki cerita cerita Anda. Koleksi kami dirancang dengan perpaduan
                gaya, kenyamanan, dan fungsionalitas.
                Mulai dari desain modern minimalis hingga klasik yang tak lekang oleh waktu, kami menyediakan beragam
                pilihan yang sesuai dengan berbagai selera.
                Setiap produk kami dipilih dengan cermat untuk memastikan kualitas tinggi dan keahlian yang tak
                tertandingi, sehingga keindahan dan ketahanannya dapat Anda nikmati dalam jangka panjang.
                Yang membuat kami istimewa adalah komitmen kami terhadap personalisasi. Apakah Anda sedang mempercantik
                sudut ruangan kecil atau melengkapi seluruh rumah, tim ahli kami siap membantu Anda menemukan furnitur
                yang selaras dengan selera dan kebutuhan Anda.
                Di Interio, kami terinspirasi oleh hasrat untuk menciptakan dan menginspirasi. Misi kami adalah
                menghadirkan kemewahan dan keanggunan yang dapat diakses oleh semua orang, mengubah setiap ruang hidup
                menjadi mahakarya desain.
                persingkat ini
            </p>
        </div>
    </section>


    @component('Layouts.Components.footer')
    @endcomponent
</body>

</html>
