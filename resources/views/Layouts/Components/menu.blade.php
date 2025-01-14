<header class="fixed-header">
    <nav class="custom-nav">
        <div class="custom-container">
            <a href="/" class="custom-logo">
                <span class="custom-logo-text">Interio.</span>
            </a>
            <div class="custom-nav-links" id="mobile-menu-2">
                <ul class="custom-nav-menu">
                    <li><a href="/" class="custom-nav-link" aria-current="page">Home</a></li>
                    <li><a href="products" class="custom-nav-link">Products</a></li>
                    <li><a href="#" class="custom-nav-link">About</a></li>
                    <li><a href="#" class="custom-nav-link">Contact</a></li>
                </ul>
            </div>
            <div class="custom-nav-items">
                <a href="/cart" class="nav-icon"><i class="fas fa-shopping-cart fa-lg"></i></a>
                <a href="/login" class="nav-button">Login</a>
            </div>
        </div>
    </nav>
</header>

<style>
    .fixed-header {
        position: fixed;
        width: 100%;
    }

    .custom-nav {
        background-color: white;
        border-bottom: 1px solid #e5e7eb;
        padding: 10px 0;
    }

    .custom-container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 16px;
    }

    .custom-logo {
        display: flex;
        align-items: center;
    }

    .custom-logo-text {
        font-size: 1.25rem;
        font-weight: bold;
        color: #2d3239;
    }

    .custom-nav-links {
        flex-grow: 1;
        display: flex;
        justify-content: center;
    }

    .custom-nav-menu {
        display: flex;
        gap: 20px;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .custom-nav-link {
        color: #374151;
        text-decoration: none;
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        transition: all 0.3s ease;
    }

    .custom-nav-link:hover {
        background-color: #f3f4f6;
        color: #ffa832;
    }

    .custom-nav-items {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .nav-icon {
        color: #ffa832;
    }

    .nav-button {
        background-color: #ffa832;
        color: white;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 0.875rem;
        font-weight: 500;
        text-decoration: none;
    }

    .nav-button:hover {
        background-color: #f59d23;
    }
</style>
