<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-img">
                    <a class="navbar-brand" href="#">Interio.</a>
                    <p class="mt-4">Discover the best in home furniture, from living room to bedroom and more.</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="f-title">
                    <h3>Quick Links</h3>
                </div>
                <ul class="f-links">
                    <li><i class="fa-solid fa-chevron-right"></i><a href="/">Home</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i><a href="products">Products</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i><a href="#">About</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <div class="f-title">
                    <h3>Categories</h3>
                </div>
                <ul class="f-links">
                    <li><i class="fa-solid fa-chevron-right"></i><a href="#">Living Room</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i><a href="#">Dining Room</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i><a href="#">Bedroom</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i><a href="#">Office</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <div class="f-title">
                    <h3>Help</h3>
                </div>
                <ul class="f-links">
                    <li><i class="fa-solid fa-chevron-right"></i><a href="#">Delivery</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i><a href="#">Returns</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i><a href="#">Secure Payments</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i><a href="#">Track an order</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <div class="f-title">
                    <h3>Contact Info</h3>
                </div>
                <ul class="f-list">
                    <li><i class="fa-solid fa-location-dot"></i><a href="#">1234 Elm Street, Furniture City</a>
                    </li>
                    <li><i class="fa-solid fa-phone"></i><a href="tel:1234567890">123-456-7890</a></li>
                    <li><i class="fa-solid fa-envelope"></i><a href="mailto:info@megashop.com">info@megashop.com</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<style>
    .footer {
        background-color: #2d3239;
        padding: 50px 0;
    }

    .footer a,
    .footer p {
        color: #ffffff;
        font-size: 14px;
        text-decoration: none;
    }

    .f-links li {
        display: flex;
        align-items: center;
        gap: 5px;
        margin-bottom: 10px;
    }

    .f-links li i {
        color: #ffa832;
        font-size: 10px;
    }

    .f-title h3 {
        color: #ffffff;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .f-list li {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        gap: 5px;
    }

    .f-list li i {
        width: 36px;
        height: 36px;
        display: grid;
        place-content: center;
        background-color: #ffa832;
        color: #ffffff;
        border-radius: 100%;
        font-size: 14px;
    }

    .copyrights {
        padding: 10px 0;
        background: #2d3239;
        text-align: center;
        border-top: 1px solid #eeeeee;
    }

    .copyrights a {
        color: #ffffff;
        font-size: 16px;
        text-decoration: none;
    }

    footer .navbar-brand {
        font-size: 36px;
        font-weight: bold;
    }

    .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
    }

    .col-lg-3,
    .col-lg-2 {
        flex: 1;
    }
