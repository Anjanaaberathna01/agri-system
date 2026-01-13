<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - SpasilaLahanPetani</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f7fa;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .header {
            background: linear-gradient(135deg, #ff9500 0%, #ff7c00 100%);
            color: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .cart-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        .cart-items {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .empty-cart {
            text-align: center;
            padding: 60px 20px;
            color: #999;
        }

        .empty-cart-icon {
            font-size: 80px;
            margin-bottom: 20px;
        }

        .empty-cart h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .empty-cart p {
            font-size: 14px;
            margin-bottom: 20px;
        }

        .empty-cart a {
            display: inline-block;
            background: linear-gradient(135deg, #ff9500 0%, #ff7c00 100%);
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .empty-cart a:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 149, 0, 0.4);
        }

        .cart-item {
            display: grid;
            grid-template-columns: 100px 1fr auto;
            gap: 20px;
            padding: 20px;
            border: 2px solid #f0f0f0;
            border-radius: 12px;
            margin-bottom: 15px;
            align-items: center;
            transition: all 0.3s ease;
        }

        .cart-item:hover {
            border-color: #ff9500;
            box-shadow: 0 4px 15px rgba(255, 149, 0, 0.1);
        }

        .item-image {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #ff9500 0%, #ff7c00 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            color: white;
        }

        .item-details h3 {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .item-type {
            display: inline-block;
            background: #fff3e0;
            color: #ff9500;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .item-price {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }

        .item-quantity {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .item-quantity input {
            width: 60px;
            padding: 6px;
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            text-align: center;
            font-size: 14px;
        }

        .item-quantity button {
            padding: 6px 12px;
            background: #ff9500;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .item-quantity button:hover {
            background: #ff7c00;
            transform: scale(1.05);
        }

        .item-actions {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 10px;
        }

        .item-total {
            font-size: 18px;
            font-weight: 700;
            color: #ff9500;
        }

        .item-remove {
            background: #f5f5f5;
            color: #d32f2f;
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .item-remove:hover {
            background: #ffebee;
            color: #c62828;
        }

        .cart-summary {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            height: fit-content;
            position: sticky;
            top: 100px;
        }

        .summary-title {
            font-size: 20px;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .summary-row.total {
            font-size: 18px;
            font-weight: 700;
            color: #333;
            padding-top: 15px;
            border-top: 2px solid #f0f0f0;
            margin-top: 15px;
        }

        .summary-row.total .price {
            color: #ff9500;
        }

        .checkout-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #ff9500 0%, #ff7c00 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
            box-shadow: 0 4px 15px rgba(255, 149, 0, 0.4);
        }

        .checkout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 149, 0, 0.6);
        }

        .continue-shopping {
            width: 100%;
            padding: 12px;
            background: #f0f0f0;
            color: #333;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            text-decoration: none;
            display: block;
            text-align: center;
        }

        .continue-shopping:hover {
            background: #e0e0e0;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        @media (max-width: 768px) {
            .cart-layout {
                grid-template-columns: 1fr;
            }

            .cart-summary {
                position: static;
            }

            .cart-item {
                grid-template-columns: 80px 1fr;
            }

            .item-actions {
                grid-column: 1 / -1;
                flex-direction: row;
                justify-content: space-between;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    @include('layouts.nav')

    <div class="container">
        <div class="header">
            <h1>Shopping Cart</h1>
            <p>Review your items and proceed to checkout</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="cart-layout">
            <!-- Cart Items -->
            <div class="cart-items">
                @if(empty($cart))
                    <div class="empty-cart">
                        <div class="empty-cart-icon">🛒</div>
                        <h2>Your Cart is Empty</h2>
                        <p>Add some tools, fertilizers, or crops to get started!</p>
                        <a href="{{ route('home') }}">Continue Shopping</a>
                    </div>
                @else
                    @foreach($cart as $key => $item)
                        <div class="cart-item" style="align-items: flex-start;">
                            <div class="item-image" style="display: flex; align-items: center; justify-content: center; min-width: 100px; min-height: 100px;">
                                @php
                                    if ($item['type'] === 'tool') {
                                        $imageFolder = 'tools';
                                    } elseif ($item['type'] === 'fertilizer') {
                                        $imageFolder = 'fertilizer';
                                    } else {
                                        $imageFolder = 'crop';
                                    }
                                    $itemSubfolder = isset($item['name']) ? strtolower($item['name']) : '';
                                    $imageFile = !empty($item['image']) ? $item['image'] : '1.jpg';
                                @endphp
                                <img src="{{ asset('images/' . $imageFolder . '/' . $itemSubfolder . '/' . $imageFile) }}" alt="{{ $item['name'] }}" style="width:90px;height:90px;border-radius:10px;object-fit:cover;box-shadow:0 2px 8px rgba(0,0,0,0.07);">
                            </div>

                            <div class="item-details" style="padding-left:10px;flex:1;">
                                <h3 style="margin-bottom:6px;">{{ $item['name'] }}</h3>
                                <span class="item-type" style="margin-bottom:6px;">{{ ucfirst($item['type']) }}</span>
                                <div class="item-price" style="margin-bottom:8px;">Rs. {{ number_format($item['price'], 2) }}</div>
                                <form action="{{ route('cart.update', $key) }}" method="POST" class="item-quantity" style="margin-bottom:8px;">
                                    @csrf
                                    @method('PUT')
                                    <label style="margin-right:4px;">Qty:</label>
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" required style="width:50px;">
                                    <button type="submit" style="margin-left:6px;">Update</button>
                                </form>
                            </div>

                            <div class="item-actions" style="min-width:110px;display:flex;flex-direction:column;align-items:flex-end;gap:10px;">
                                <div class="item-total" style="margin-bottom:8px;">Rs. {{ number_format($item['price'] * $item['quantity'], 2) }}</div>
                                <a href="{{ route('cart.remove', $key) }}" class="item-remove" onclick="return confirm('Remove this item?')">Remove</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Cart Summary -->
            <div class="cart-summary">
                <div class="summary-title">Order Summary</div>

                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>Rs. {{ number_format($total, 2) }}</span>
                </div>

                <div class="summary-row">
                    <span>Shipping</span>
                    <span>Rs. 0.00</span>
                </div>

                <div class="summary-row">
                    <span>Tax</span>
                    <span>Rs. 0.00</span>
                </div>

                <div class="summary-row total">
                    <span>Total</span>
                    <span class="price">Rs. {{ number_format($total, 2) }}</span>
                </div>

                @if(!empty($cart))
                <div style="display: flex; flex-direction: column; gap: 12px; margin-top: 24px;">
                    <a class="checkout-btn" href="{{ route('auth.check_out') }}" style="margin-bottom:0;">Proceed to Checkout</a>
                    <a href="{{ route('home') }}" class="continue-shopping" style="margin-bottom:0;">Continue Shopping</a>
                    <a href="{{ route('cart.clear') }}" class="continue-shopping" onclick="return confirm('Clear your entire cart?')" style="background: #ffebee; color: #d32f2f; margin-top:0;">Clear Cart</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
