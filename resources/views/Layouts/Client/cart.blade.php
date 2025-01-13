<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/bd9b5a24ba.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <title>MegaShop</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Cart Items</h1>
        <div class="content-wrapper">
            <div class="cart-items">
                @if (sizeof($items) == 0)
                    <div class="empty-cart">
                        <p>No item added :</p>
                        <a href="/products">start shopping now</a>
                    </div>
                @else
                    @foreach ($items as $item)
                        <div class="cart-item">
                            <img src="{{ asset('storage/' . $item->product->img) }}" alt="product-image" />
                            <form class="cart-item-form" method="POST"
                                action="{{ route('quantity.update', $item->id) }}">
                                @method('PUT')
                                @csrf
                                <div class="product-info">
                                    <h2 class="product-title">{{ $item->product->name }}</h2>
                                </div>
                                <div class="quantity-price-section">
                                    <div class="quantity-controls">
                                        <span class="quantity-btn decrease">-</span>
                                        <input class="quantity-input quantity" type="number"
                                            value="{{ $item->quantity }}" min="1" name="quantity"
                                            data-price="{{ $item->product->price }}" data-item-id="{{ $item->id }}"
                                            onload="updatePrice()" />
                                        <span class="quantity-btn increase">+</span>
                                    </div>
                                    <div class="price-remove">
                                        <p class="price" value="{{ $item->product->price * $item->quantity }}">
                                            {{ $item->product->price * $item->quantity }} $
                                        </p>
                                        <a href="{{ route('cartItem.delete', ['id' => $item->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="remove-btn"
                                                data-item-id="{{ $item->id }}">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </a>
                                    </div>
                                    <button type="submit" class="confirm-btn">confirm</button>
                                </div>
                            </form>
                        </div>
                    @endforeach
            </div>

            <!-- Summary Card -->
            <div class="summary-card">
                <div class="summary-row">
                    <p>Subtotal</p>
                    <p id="subtotal" name="price">$0.00</p>
                </div>
                <div class="summary-row">
                    <p>Shipping</p>
                    <p>$4.99</p>
                </div>
                <hr class="summary-divider" />
                <div class="total-row">
                    <p>Total</p>
                    <div>
                        <p id="total" name="total">$4.99</p>
                        <p class="vat-text">including VAT</p>
                    </div>
                </div>
                <form action="{{ route('orders.store') }}" method="post">
                    @csrf
                    <button class="order-btn">Order now</button>
                </form>
            </div>
        </div>
    </div>
    @endif

    @include('sweetalert::alert')

    <script>
        document.querySelectorAll('.decrease').forEach(button => {
            button.addEventListener('click', () => {
                const input = button.nextElementSibling;
                let quantity = parseInt(input.value);
                if (quantity > 1) {
                    input.value = --quantity;
                    updatePrice(input);
                }
            });
        });

        document.querySelectorAll('.increase').forEach(button => {
            button.addEventListener('click', () => {
                const input = button.previousElementSibling;
                input.value = ++input.value;
                updatePrice(input);
            });
        });

        function updatePrice(input) {
            const price = input.getAttribute('data-price');
            const quantity = input.value;
            const item_id = input.getAttribute('data-item-id');
            const priceElement = input.parentElement.nextElementSibling.querySelector('.price');
            const newPrice = price * quantity;
            priceElement.innerText = newPrice + ' $';

            let subtotal = 0;
            quantityInputs.forEach(input => {
                const price = input.getAttribute('data-price');
                const quantity = input.value;
                const product = price * quantity;
                subtotal += product;
            });

            const subtotalElement = document.querySelector('#subtotal');
            subtotalElement.innerText = '$' + subtotal.toFixed(2);

            const shipping = 4.99;
            const total = subtotal + shipping;
            const totalElement = document.querySelector('#total');
            totalElement.innerText = '$' + total.toFixed(2);
        }

        const quantityInputs = document.querySelectorAll('.quantity');
        quantityInputs.forEach(input => {
            updatePrice(input);
            input.addEventListener('change', function() {
                updatePrice(input);
            });
        });
    </script>
</body>

</html>
