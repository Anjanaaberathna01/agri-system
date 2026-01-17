<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - SpasilaLahanPetani</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #f5f7fa; min-height: 100vh; padding: 0; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #ff9500 0%, #ff7c00 100%); color: white; padding: 30px; border-radius: 15px; margin-bottom: 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .header h1 { font-size: 28px; font-weight: 700; margin-bottom: 5px; }
        .header p { font-size: 14px; opacity: 0.9; }

        .alert { padding: 15px 20px; border-radius: 8px; margin-bottom: 20px; font-weight: 500; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }

        .orders-container { display: grid; gap: 25px; }
        .order-card { background: white; border-radius: 15px; padding: 25px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: all 0.3s ease; }
        .order-card:hover { box-shadow: 0 8px 25px rgba(0,0,0,0.08); }

        .order-header { display: flex; justify-content: space-between; align-items: center; padding-bottom: 15px; border-bottom: 2px solid #f0f0f0; margin-bottom: 20px; }
        .order-number { font-size: 18px; font-weight: 700; color: #333; }
        .order-date { font-size: 13px; color: #888; }

        .order-status { display: inline-block; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; text-transform: uppercase; }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-processing { background: #cce5ff; color: #004085; }
        .status-completed { background: #d4edda; color: #155724; }
        .status-cancelled { background: #f8d7da; color: #721c24; }

        .order-items { margin: 20px 0; }
        .order-item { display: flex; align-items: center; gap: 15px; padding: 12px 0; border-bottom: 1px solid #f5f5f5; }
        .order-item:last-child { border-bottom: none; }
        .item-image { width: 60px; height: 60px; background: linear-gradient(135deg, #ff9500 0%, #ff7c00 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center; overflow: hidden; }
        .item-image img { width: 100%; height: 100%; object-fit: cover; }
        .item-details { flex: 1; }
        .item-name { font-size: 14px; font-weight: 600; color: #333; margin-bottom: 3px; }
        .item-type { font-size: 11px; color: #ff9500; background: #fff5e6; border-radius: 3px; padding: 2px 6px; margin-right: 6px; display: inline-block; }
        .item-qty { font-size: 12px; color: #888; }
        .item-price { font-size: 14px; font-weight: 600; color: #28a745; }

        .order-summary { background: #f8f9fa; border-radius: 10px; padding: 20px; margin-top: 20px; }
        .summary-row { display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 14px; }
        .summary-row.total { font-size: 18px; font-weight: 700; color: #333; padding-top: 12px; border-top: 2px solid #dee2e6; margin-top: 12px; }
        .summary-row.total .price { color: #ff9500; }

        .order-actions { margin-top: 20px; display: flex; gap: 10px; }
        .btn { padding: 10px 20px; border: none; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; font-family: 'Poppins', sans-serif; text-decoration: none; display: inline-block; }
        .btn-cancel { background: #dc3545; color: white; }
        .btn-cancel:hover { background: #c82333; transform: translateY(-2px); }
        .btn-cancel:disabled { background: #ccc; cursor: not-allowed; }
        .btn-view { background: #ff9500; color: white; }
        .btn-view:hover { background: #ff7c00; transform: translateY(-2px); }

        .empty-state { text-align: center; padding: 60px 20px; }
        .empty-state img { width: 200px; opacity: 0.5; margin-bottom: 20px; }
        .empty-state h2 { font-size: 24px; color: #666; margin-bottom: 10px; }
        .empty-state p { color: #999; margin-bottom: 20px; }
        .btn-shop { background: linear-gradient(135deg, #ff9500 0%, #ff7c00 100%); color: white; padding: 12px 30px; }
        .btn-shop:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(255, 149, 0, 0.4); }

        @media (max-width: 768px) {
            .order-header { flex-direction: column; align-items: flex-start; gap: 10px; }
            .order-item { flex-direction: column; align-items: flex-start; }
            .item-image { width: 100%; height: 150px; }
        }
    </style>
</head>
<body>
    @include('layouts.nav')
    <div class="container">
        <div class="header">
            <h1>My Orders</h1>
            <p>Track and manage your orders</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if($orders->count() > 0)
            <div class="orders-container">
                @foreach($orders as $order)
                    <div class="order-card">
                        <div class="order-header">
                            <div>
                                <div class="order-number">{{ $order->order_number }}</div>
                                <div class="order-date">Placed on {{ $order->created_at->format('M d, Y \a\t h:i A') }}</div>
                            </div>
                            <div>
                                <span class="order-status status-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
                            </div>
                        </div>

                        <div class="order-items">
                            @foreach($order->items as $item)
                                <div class="order-item">
                                    <div class="item-image">
                                        @php
                                            $imageFolder = $item['type'] === 'tool' ? 'tools' : ($item['type'] === 'fertilizer' ? 'fertilizer' : 'crop');
                                            $itemSubfolder = isset($item['name']) ? strtolower($item['name']) : '';
                                            $imageFile = !empty($item['image']) ? $item['image'] : '1.jpg';
                                        @endphp
                                        <img src="{{ asset('images/' . $imageFolder . '/' . $itemSubfolder . '/' . $imageFile) }}" alt="{{ $item['name'] }}">
                                    </div>
                                    <div class="item-details">
                                        <div class="item-name">{{ $item['name'] }}</div>
                                        <span class="item-type">{{ ucfirst($item['type']) }}</span>
                                        <span class="item-qty">Quantity: {{ $item['quantity'] }}</span>
                                    </div>
                                    <div class="item-price">Rs. {{ number_format($item['price'] * $item['quantity'], 2) }}</div>
                                </div>
                            @endforeach
                        </div>

                        <div class="order-summary">
                            <div class="summary-row">
                                <span>Subtotal</span>
                                <span>Rs. {{ number_format($order->total_amount, 2) }}</span>
                            </div>
                            @if($order->cod_fee > 0)
                                <div class="summary-row">
                                    <span>Cash on Delivery Fee</span>
                                    <span>Rs. {{ number_format($order->cod_fee, 2) }}</span>
                                </div>
                            @endif
                            <div class="summary-row">
                                <span>Payment Method</span>
                                <span>{{ strtoupper($order->payment_method) }}</span>
                            </div>
                            <div class="summary-row total">
                                <span>Grand Total</span>
                                <span class="price">Rs. {{ number_format($order->grand_total, 2) }}</span>
                            </div>
                        </div>

                        <div class="order-actions">
                            @if($order->status === 'pending')
                                <form action="{{ route('orders.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this order?');">
                                    @csrf
                                    <button type="submit" class="btn btn-cancel">Cancel Order</button>
                                </form>
                            @elseif($order->status === 'cancelled')
                                <button class="btn btn-cancel" disabled>Order Cancelled</button>
                            @else
                                <button class="btn btn-cancel" disabled>Cannot Cancel</button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                <h2>No Orders Yet</h2>
                <p>You haven't placed any orders. Start shopping now!</p>
                <a href="{{ route('home') }}" class="btn btn-shop">Start Shopping</a>
            </div>
        @endif
    </div>
</body>
</html>
