<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details - Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f5f7fa;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .header-info {
            display: flex;
            gap: 2rem;
        }

        .header-item {
            display: flex;
            flex-direction: column;
        }

        .header-item label {
            font-size: 0.9rem;
            opacity: 0.9;
            margin-bottom: 0.3rem;
        }

        .header-item value {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-processing {
            background: #cce5ff;
            color: #004085;
        }

        .status-completed {
            background: #d4edda;
            color: #155724;
        }

        .status-cancelled {
            background: #f8d7da;
            color: #721c24;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .card h2 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .card h2 i {
            color: #667eea;
            font-size: 1.8rem;
        }

        .info-section {
            margin-bottom: 2rem;
        }

        .info-section h3 {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 1rem;
            padding-bottom: 0.8rem;
            border-bottom: 2px solid #f0f0f0;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 0.8rem 0;
            border-bottom: 1px solid #f5f5f5;
        }

        .info-row label {
            font-weight: 600;
            color: #555;
        }

        .info-row value {
            color: #333;
            text-align: right;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .order-items {
            margin-bottom: 2rem;
        }

        .order-item {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1.2rem;
            margin-bottom: 1rem;
            display: flex;
            gap: 1rem;
        }

        .item-image {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .item-details {
            flex: 1;
        }

        .item-details h4 {
            font-size: 1rem;
            color: #333;
            margin-bottom: 0.3rem;
        }

        .item-meta {
            font-size: 0.85rem;
            color: #888;
        }

        .item-type {
            display: inline-block;
            background: #e7f5ff;
            color: #1971c2;
            padding: 0.2rem 0.6rem;
            border-radius: 3px;
            margin-right: 0.5rem;
            font-weight: 500;
        }

        .item-price {
            font-size: 1.1rem;
            font-weight: 600;
            color: #28a745;
            text-align: right;
        }

        .summary-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #f5f5f5 100%);
            border-radius: 8px;
            padding: 1.5rem;
            margin-top: 1.5rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .summary-row label {
            color: #555;
            font-weight: 500;
        }

        .summary-row.total {
            font-size: 1.3rem;
            font-weight: 700;
            color: #333;
            padding-top: 1rem;
            border-top: 2px solid white;
            margin-top: 1rem;
        }

        .summary-row.total value {
            color: #667eea;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            flex: 1;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(102, 126, 234, 0.3);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
        }

        .back-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 2rem;
        }

        .back-link:hover {
            color: #764ba2;
        }

        @media (max-width: 768px) {
            .content-grid {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;
                text-align: center;
            }

            .header-info {
                justify-content: center;
                width: 100%;
                margin-top: 1rem;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    @include('layouts.admin_nav')

    <div class="container">
        <a href="{{ route('admin.orders') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to Orders
        </a>

        <div class="header">
            <div>
                <h1><i class="fas fa-receipt"></i> Order Details</h1>
                <p style="margin-top: 0.5rem; opacity: 0.9;">Order #{{ $order->order_number }}</p>
            </div>
            <span class="status-badge status-{{ $order->status }}">
                {{ ucfirst($order->status) }}
            </span>
        </div>

        <div class="content-grid">
            <!-- Left: Order Details & Items -->
            <div>
                <!-- Customer Information -->
                <div class="card">
                    <h2><i class="fas fa-user"></i> Customer Information</h2>

                    <div class="info-section">
                        <h3>Personal Details</h3>
                        <div class="info-row">
                            <label>Name</label>
                            <value>{{ $order->user->first_name ?? 'N/A' }} {{ $order->user->last_name ?? '' }}</value>
                        </div>
                        <div class="info-row">
                            <label>Email</label>
                            <value>{{ $order->user->email ?? 'N/A' }}</value>
                        </div>
                        <div class="info-row">
                            <label>Phone</label>
                            <value>{{ $order->phone ?? 'N/A' }}</value>
                        </div>
                    </div>

                    <div class="info-section">
                        <h3>Shipping Address</h3>
                        <div class="info-row" style="flex-direction: column; border: none;">
                            <value style="text-align: left;">{{ $order->shipping_address ?? 'N/A' }}</value>
                        </div>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="card">
                    <h2><i class="fas fa-shopping-cart"></i> Order Items</h2>

                    <div class="order-items">
                        @php
                            $items = is_string($order->items) ? json_decode($order->items, true) : $order->items;
                        @endphp

                        @if(is_array($items) && !empty($items))
                            @foreach($items as $key => $item)
                            <div class="order-item">
                                <div class="item-image">
                                    <i class="fas fa-box"></i>
                                </div>
                                <div class="item-details" style="flex: 1;">
                                    <h4>{{ $item['name'] ?? 'Unknown Item' }}</h4>
                                    <div class="item-meta">
                                        <span class="item-type">{{ ucfirst($item['type'] ?? 'N/A') }}</span>
                                        <span>Qty: <strong>{{ $item['quantity'] ?? 1 }}</strong></span>
                                    </div>
                                </div>
                                <div class="item-price">
                                    Rs. {{ number_format($item['price'] ?? 0, 2) }}
                                </div>
                            </div>
                            @endforeach
                        @else
                            <p style="text-align: center; color: #888; padding: 2rem;">No items found</p>
                        @endif
                    </div>

                    <div class="summary-section">
                        <div class="summary-row">
                            <label>Subtotal</label>
                            <value>Rs. {{ number_format($order->total_amount ?? 0, 2) }}</value>
                        </div>
                        <div class="summary-row">
                            <label>Shipping</label>
                            <value>Rs. 0.00</value>
                        </div>
                        <div class="summary-row">
                            <label>Tax</label>
                            <value>Rs. 0.00</value>
                        </div>
                        @if($order->cod_fee > 0)
                        <div class="summary-row">
                            <label>COD Fee</label>
                            <value>Rs. {{ number_format($order->cod_fee, 2) }}</value>
                        </div>
                        @endif
                        <div class="summary-row total">
                            <label>Total Amount</label>
                            <value>Rs. {{ number_format(($order->total_amount ?? 0) + ($order->cod_fee ?? 0), 2) }}</value>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Order Summary & Actions -->
            <div>
                <!-- Order Summary Card -->
                <div class="card">
                    <h2><i class="fas fa-info-circle"></i> Order Summary</h2>

                    <div class="info-section">
                        <h3>Order Information</h3>
                        <div class="info-row">
                            <label>Order Number</label>
                            <value>{{ $order->order_number }}</value>
                        </div>
                        <div class="info-row">
                            <label>Date</label>
                            <value>{{ $order->created_at->format('M d, Y') }}</value>
                        </div>
                        <div class="info-row">
                            <label>Time</label>
                            <value>{{ $order->created_at->format('h:i A') }}</value>
                        </div>
                        <div class="info-row">
                            <label>Status</label>
                            <value><span class="status-badge status-{{ $order->status }}">{{ ucfirst($order->status) }}</span></value>
                        </div>
                    </div>

                    <div class="info-section">
                        <h3>Payment Information</h3>
                        <div class="info-row">
                            <label>Payment Method</label>
                            <value>
                                @if($order->payment_method === 'visa')
                                    <i class="fas fa-credit-card"></i> Visa Card
                                @elseif($order->payment_method === 'paypal')
                                    <i class="fab fa-paypal"></i> PayPal
                                @elseif($order->payment_method === 'cod')
                                    <i class="fas fa-money-bill"></i> Cash on Delivery
                                @else
                                    {{ ucfirst($order->payment_method) }}
                                @endif
                            </value>
                        </div>
                        <div class="info-row">
                            <label>Total Amount</label>
                            <value style="font-weight: 700; color: #667eea;">Rs. {{ number_format(($order->total_amount ?? 0) + ($order->cod_fee ?? 0), 2) }}</value>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        @if($order->status === 'pending')
                        <form action="{{ route('admin.order.update-status', $order->id) }}" method="POST" style="flex: 1;">
                            @csrf
                            <input type="hidden" name="status" value="processing">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-play"></i> Mark as Processing
                            </button>
                        </form>
                        @endif

                        @if($order->status === 'processing')
                        <form action="{{ route('admin.order.update-status', $order->id) }}" method="POST" style="flex: 1;">
                            @csrf
                            <input type="hidden" name="status" value="completed">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check"></i> Mark as Completed
                            </button>
                        </form>
                        @endif

                        @if(in_array($order->status, ['pending', 'processing']))
                        <form action="{{ route('admin.order.update-status', $order->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="cancelled">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this order?');">
                                <i class="fas fa-times"></i> Cancel Order
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
