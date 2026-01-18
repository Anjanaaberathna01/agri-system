<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Management - Admin Panel</title>
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
            max-width: 1400px;
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
        }

        .header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .header p {
            opacity: 0.9;
        }

        .filters {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .filter-group {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .filter-group label {
            font-weight: 600;
            color: #555;
        }

        .filter-group select {
            padding: 0.6rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #f8f9fa;
        }

        th {
            padding: 1.2rem;
            text-align: left;
            font-weight: 700;
            color: #333;
            border-bottom: 2px solid #dee2e6;
            font-size: 0.95rem;
        }

        td {
            padding: 1.2rem;
            border-bottom: 1px solid #dee2e6;
            color: #555;
        }

        tbody tr:hover {
            background-color: #f8f9fa;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .order-number {
            font-weight: 600;
            color: #667eea;
        }

        .customer-name {
            font-weight: 500;
            color: #333;
        }

        .customer-email {
            font-size: 0.85rem;
            color: #888;
        }

        .status-badge {
            display: inline-block;
            padding: 0.4rem 0.9rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
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

        .amount {
            font-weight: 600;
            color: #28a745;
        }

        .date {
            font-size: 0.9rem;
            color: #666;
        }

        .actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .btn-view {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-view:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(102, 126, 234, 0.3);
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #888;
        }

        .empty-state i {
            font-size: 3rem;
            color: #ddd;
            margin-bottom: 1rem;
            display: block;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
            padding: 0 1.5rem 1.5rem;
        }

        .pagination a,
        .pagination span {
            padding: 0.6rem 0.9rem;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            text-decoration: none;
            color: #667eea;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .pagination a:hover {
            background: #667eea;
            color: white;
        }

        .pagination .active {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .header h1 {
                font-size: 1.5rem;
            }

            .filters {
                flex-direction: column;
            }

            .filter-group {
                width: 100%;
            }

            table {
                font-size: 0.85rem;
            }

            th, td {
                padding: 0.8rem;
            }

            .actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    @include('layouts.admin_nav')

    <div class="container">
        <div class="header">
            <h1><i class="fas fa-shopping-bag"></i> Orders Management</h1>
            <p>View and manage all customer orders</p>
        </div>

        <div class="filters">
            <div class="filter-group">
                <label>Filter by Status:</label>
                <select onchange="window.location.href='?status=' + this.value">
                    <option value="">All Orders</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processing" {{ request('status') === 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
        </div>

        <div class="table-container">
            @if($orders->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Payment Method</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>
                                <span class="order-number">{{ $order->order_number }}</span>
                            </td>
                            <td>
                                <div class="customer-name">{{ $order->user->first_name ?? 'N/A' }} {{ $order->user->last_name ?? '' }}</div>
                                <div class="customer-email">{{ $order->user->email ?? 'N/A' }}</div>
                            </td>
                            <td>
                                <span class="amount">Rs. {{ number_format(($order->total_amount ?? 0) + ($order->cod_fee ?? 0), 2) }}</span>
                            </td>
                            <td>
                                <span class="status-badge status-{{ $order->status }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>
                                @if($order->payment_method === 'visa')
                                    <i class="fas fa-credit-card"></i> Visa
                                @elseif($order->payment_method === 'paypal')
                                    <i class="fab fa-paypal"></i> PayPal
                                @elseif($order->payment_method === 'cod')
                                    <i class="fas fa-money-bill"></i> COD
                                @else
                                    {{ ucfirst($order->payment_method) }}
                                @endif
                            </td>
                            <td>
                                <span class="date">{{ $order->created_at->format('M d, Y') }}</span>
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('admin.order.view', $order->id) }}" class="btn btn-view">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="pagination">
                    {{ $orders->links() }}
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <h3>No Orders Found</h3>
                    <p>There are no orders to display at the moment.</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
