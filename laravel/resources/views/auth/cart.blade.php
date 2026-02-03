<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Govi Saviya LK</title>

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
            min-block-size: 100vh;
        }

        .container {
            max-inline-size: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .header {
            background: linear-gradient(135deg, #ff9500 0%, #ff7c00 100%);
            color: white;
            padding: 30px;
            border-radius: 15px;
            margin-block-end: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            font-size: 32px;
            font-weight: 700;
            margin-block-end: 5px;
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
            margin-block-end: 20px;
        }

        .empty-cart h2 {
            font-size: 24px;
            color: #333;
            margin-block-end: 10px;
        }

        .empty-cart p {
            font-size: 14px;
            margin-block-end: 20px;
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
            margin-block-end: 15px;
            align-items: center;
            transition: all 0.3s ease;
        }

        .cart-item:hover {
            border-color: #ff9500;
            box-shadow: 0 4px 15px rgba(255, 149, 0, 0.1);
        }

        .item-image {
            inline-size: 100px;
            block-size: 100px;
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
            margin-block-end: 5px;
        }

        .item-type {
            display: inline-block;
            background: #fff3e0;
            color: #ff9500;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            margin-block-end: 10px;
        }

        .item-price {
            font-size: 14px;
            color: #666;
            margin-block-end: 10px;
        }

        .item-quantity {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .item-quantity input {
            inline-size: 60px;
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
            block-size: fit-content;
            position: sticky;
            inset-block-start: 100px;
        }

        .summary-title {
            font-size: 20px;
            font-weight: 700;
            color: #333;
            margin-block-end: 20px;
            padding-block-end: 15px;
            border-block-end: 2px solid #f0f0f0;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-block-end: 15px;
            font-size: 14px;
        }

        .summary-row.total {
            font-size: 18px;
            font-weight: 700;
            color: #333;
            padding-block-start: 15px;
            border-block-start: 2px solid #f0f0f0;
            margin-block-start: 15px;
        }

        .summary-row.total .price {
            color: #ff9500;
        }

        .checkout-btn {
            inline-size: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #ff9500 0%, #ff7c00 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-block-start: 20px;
            box-shadow: 0 4px 15px rgba(255, 149, 0, 0.4);
        }

        .checkout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 149, 0, 0.6);
        }

        .continue-shopping {
            inline-size: 100%;
            padding: 12px;
            background: #f0f0f0;
            color: #333;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-block-start: 10px;
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
            margin-block-end: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        @media (max-inline-size: 768px) {
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
                margin-block-start: 10px;
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
                            <div class="item-image" style="display: flex; align-items: center; justify-content: center; min-inline-size: 100px; min-block-size: 100px;">
                                @php
                                    if ($item['type'] === 'tool') {
                                        $imageFolder = 'tools';
                                    } elseif ($item['type'] === 'fertilizer') {
                                        $imageFolder = 'fertilizer';
                                    } else {
                                        $imageFolder = 'crop';
                                    }

                                    // Use the item name as the subfolder (case-sensitive to match folder names)
                                    $itemSubfolder = isset($item['name']) ? $item['name'] : '';

                                    // Check for different image file extensions
                                    $imagePath = null;
                                    $imageExtensions = ['jpg', 'jpeg', 'png', 'webp', 'svg', 'gif', 'avif'];

                                    if (!empty($item['image'])) {
                                        // Use the provided image name
                                        $testPath = 'images/' . $imageFolder . '/' . $itemSubfolder . '/' . $item['image'];
                                        if (file_exists(public_path($testPath))) {
                                            $imagePath = $testPath;
                                        }
                                    }

                                    // If no image found, try common filenames with different extensions
                                    if (!$imagePath) {
                                        foreach ($imageExtensions as $ext) {
                                            $testPath = 'images/' . $imageFolder . '/' . $itemSubfolder . '/1.' . $ext;
                                            if (file_exists(public_path($testPath))) {
                                                $imagePath = $testPath;
                                                break;
                                            }
                                        }
                                    }
                                @endphp

                                @if($imagePath)
                                    <img src="{{ asset($imagePath) }}" alt="{{ $item['name'] }}" style="inline-size:90px;block-size:90px;border-radius:10px;object-fit:cover;box-shadow:0 2px 8px rgba(0,0,0,0.07);">
                                @else
                                    <div style="inline-size:90px;block-size:90px;border-radius:10px;background:linear-gradient(135deg,#ff9500 0%,#ff7c00 100%);display:flex;align-items:center;justify-content:center;color:white;font-size:2rem;">
                                        @if($item['type'] === 'tool')
                                            🛠️
                                        @elseif($item['type'] === 'fertilizer')
                                            🌱
                                        @else
                                            🌾
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <div class="item-details" style="padding-inline-start:10px;flex:1;">
                                <h3 style="margin-block-end:6px;">{{ $item['name'] }}</h3>
                                <span class="item-type" style="margin-block-end:6px;">{{ ucfirst($item['type']) }}</span>
                                <div class="item-price" style="margin-block-end:8px;">Rs. {{ number_format($item['price'], 2) }}</div>
                                <form action="{{ route('cart.update', $key) }}" method="POST" class="item-quantity" style="margin-block-end:8px;">
                                    @csrf
                                    @method('PUT')
                                    <label style="margin-inline-end:4px;">Qty:</label>
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" required style="inline-size:50px;">
                                    <button type="submit" style="margin-inline-start:6px;">Update</button>
                                </form>
                            </div>

                            <div class="item-actions" style="min-inline-size:110px;display:flex;flex-direction:column;align-items:flex-end;gap:10px;">
                                <div class="item-total" style="margin-block-end:8px;">Rs. {{ number_format($item['price'] * $item['quantity'], 2) }}</div>
                                <a href="{{ route('cart.remove', $key) }}" class="item-remove" onclick="return confirm('Remove this item?')" style="text-decoration: none">Remove</a>
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
                <div style="display: flex; flex-direction: column; gap: 12px; margin-block-start: 24px;">
                    <a class="checkout-btn" href="{{ route('auth.check_out') }}" style="margin-block-end:0; text-decoration: none; text-align: center;">Proceed to Checkout</a>
                    <a href="{{ route('home') }}" class="continue-shopping" style="margin-block-end:0; text-decoration: none">Continue Shopping</a>
                    <a href="{{ route('cart.clear') }}" class="continue-shopping" onclick="return confirm('Clear your entire cart?')" style="background: #ffebee; color: #d32f2f; margin-block-start:0; text-decoration: none">Clear Cart</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
