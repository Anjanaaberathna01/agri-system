<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel Dashboard - SpasilaLahanPetani</title>
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
            min-block-size: 100vh;
        }

        /* Main Content */
        .dashboard-container {
            max-inline-size: 1600px;
            margin: 0 auto;
            padding: 2rem;
        }

        .dashboard-header {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: white;
            padding: 2.5rem;
            border-radius: 15px;
            margin-block-end: 2rem;
            box-shadow: 0 8px 16px rgba(76, 175, 80, 0.3);
        }

        .dashboard-header h1 {
            font-size: 2.5rem;
            margin-block-end: 0.5rem;
            font-weight: 700;
        }

        .dashboard-header p {
            opacity: 0.95;
            font-size: 1.1rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-block-end: 3rem;
        }

        .stat-card {
            background: white;
            padding: 1.8rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            gap: 1.5rem;
            transition: all 0.3s ease;
            border-block-start: 4px solid;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .stat-card.tools {
            border-block-start-color: #FA891A;
        }

        .stat-card.fertilizers {
            border-block-start-color: #4CAF50;
        }

        .stat-card.crops {
            border-block-start-color: #2196F3;
        }

        .stat-card.orders {
            border-block-start-color: #9C27B0;
        }

        .stat-card.suppliers {
            border-block-start-color: #3949ab;
        }

        .stat-icon {
            inline-size: 70px;
            block-size: 70px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
            flex-shrink: 0;
        }

        .stat-icon.tools {
            background: linear-gradient(135deg, #FA891A 0%, #FF9013 100%);
        }

        .stat-icon.fertilizers {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
        }

        .stat-icon.crops {
            background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
        }

        .stat-icon.orders {
            background: linear-gradient(135deg, #9C27B0 0%, #7B1FA2 100%);
        }

        .stat-icon.suppliers {
            background: linear-gradient(135deg, #3949ab 0%, #283593 100%);
        }

        .stat-content h3 {
            font-size: 2.2rem;
            color: #333;
            margin-block-end: 0.3rem;
            font-weight: 700;
        }

        .stat-content p {
            color: #666;
            font-size: 0.95rem;
        }

        .management-section {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-block-end: 2.5rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-block-end: 2rem;
            padding-block-end: 1.5rem;
            border-block-end: 2px solid #f0f0f0;
        }

        .section-header h2 {
            font-size: 1.6rem;
            color: #333;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            font-weight: 700;
        }

        .section-header h2 i {
            color: #4CAF50;
            font-size: 1.8rem;
        }

        .btn {
            padding: 0.8rem 1.6rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(76, 175, 80, 0.4);
        }

        .btn-sm {
            padding: 0.6rem 1.2rem;
            font-size: 0.9rem;
        }

        .btn-warning {
            background: #ffc107;
            color: #333;
        }

        .btn-warning:hover {
            background: #e0a800;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
        }

        .management-table {
            inline-size: 100%;
            border-collapse: collapse;
            margin-block-start: 0;
        }

        .management-table thead {
            background-color: #f8f9fa;
        }

        .management-table th {
            padding: 1.2rem;
            text-align: start;
            font-weight: 700;
            color: #333;
            border-block-end: 2px solid #dee2e6;
            font-size: 0.95rem;
        }

        .management-table td {
            padding: 1.2rem;
            border-block-end: 1px solid #dee2e6;
            color: #555;
        }

        .management-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .item-image {
            inline-size: 50px;
            block-size: 50px;
            object-fit: cover;
            border-radius: 8px;
        }

        .status-badge {
            padding: 0.4rem 0.9rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
        }

        .status-badge.available {
            background-color: #d4edda;
            color: #155724;
        }

        .status-badge.unavailable {
            background-color: #f8d7da;
            color: #721c24;
        }

        .action-buttons {
            display: flex;
            gap: 0.6rem;
            flex-wrap: wrap;
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            margin-block-start: 2rem;
        }

        .quick-action-card {
            background: white;
            padding: 1.8rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            text-align: center;
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
            border-block-start: 4px solid;
        }

        .quick-action-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .quick-action-card.tools {
            border-block-start-color: #FA891A;
        }

        .quick-action-card.fertilizers {
            border-block-start-color: #4CAF50;
        }

        .quick-action-card.crops {
            border-block-start-color: #2196F3;
        }

        .quick-action-card.orders {
            border-block-start-color: #9C27B0;
        }

        .quick-action-card i {
            font-size: 2.8rem;
            margin-block-end: 1rem;
            display: block;
        }

        .quick-action-card h3 {
            font-size: 1.1rem;
            color: #333;
            font-weight: 600;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #666;
        }

        .empty-state i {
            font-size: 3.5rem;
            color: #ddd;
            margin-block-end: 1rem;
            display: block;
        }

        .alert {
            padding: 1.2rem 1.5rem;
            border-radius: 8px;
            margin-block-end: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-inline-start: 4px solid #28a745;
        }

        .alert i {
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .view-all-link {
            color: #4CAF50;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .view-all-link:hover {
            color: #45a049;
            text-decoration: underline;
        }

        @media (max-inline-size: 768px) {
            .dashboard-container {
                padding: 1rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .management-table {
                font-size: 0.875rem;
            }

            .action-buttons {
                flex-direction: column;
            }

            .dashboard-header h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    @include('layouts.admin_nav')

    <div class="dashboard-container">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <h1><i class="fas fa-chart-bar"></i> Admin Control Panel</h1>
            <p>Welcome back! Manage your agricultural platform efficiently</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- Statistics Overview -->
        <div class="stats-grid">
            <div class="stat-card tools">
                <div class="stat-icon tools">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ \App\Models\Tool::count() }}</h3>
                    <p>Agricultural Tools</p>
                </div>
            </div>

            <div class="stat-card fertilizers">
                <div class="stat-icon fertilizers">
                    <i class="fas fa-droplet"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ \App\Models\Fertilizer::count() }}</h3>
                    <p>Fertilizers Available</p>
                </div>
            </div>

            <div class="stat-card crops">
                <div class="stat-icon crops">
                    <i class="fas fa-leaf"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ \App\Models\Crop::count() }}</h3>
                    <p>Crop Varieties</p>
                </div>
            </div>

            <div class="stat-card orders">
                <div class="stat-icon orders">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ \App\Models\Order::count() }}</h3>
                    <p>Total Orders</p>
                </div>
            </div>

            <div class="stat-card suppliers">
                <div class="stat-icon suppliers">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ \App\Models\Supplier::count() }}</h3>
                    <p>Registered Suppliers</p>
                </div>
            </div>

            <div class="stat-card" style="border-block-start-color: #ff9800;">
                <div class="stat-icon" style="background: linear-gradient(135deg, #ff9800 0%, #f57c00 100%); color: white;">
                    <i class="fas fa-inbox"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ \App\Models\ProductRequest::where('status', 'pending')->count() }}</h3>
                    <p>Pending Product Requests</p>
                    <a href="{{ route('admin.product-requests.index') }}" style="color: #ff9800; font-size: 0.85rem; text-decoration: none; font-weight: 600;">
                        <i class="fas fa-arrow-right"></i> Review Now
                    </a>
                </div>
            </div>
        </div>

        <!-- Product Requests Section -->
        @if(\App\Models\ProductRequest::where('status', 'pending')->count() > 0)
        <div class="management-section" style="border-left: 4px solid #ff9800;">
            <div class="section-header" style="background: linear-gradient(135deg, #ff9800 0%, #f57c00 100%); color: white; padding: 1.5rem; border-radius: 12px;">
                <h2><i class="fas fa-inbox"></i> Pending Product Requests</h2>
                <a href="{{ route('admin.product-requests.index') }}" class="btn" style="background: white; color: #ff9800; font-weight: 600;">
                    <i class="fas fa-list"></i> View All Requests
                </a>
            </div>

            <div class="table-responsive" style="margin-top: 1.5rem;">
                <table class="management-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Supplier</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Submitted</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\ProductRequest::where('status', 'pending')->latest()->take(5)->get() as $request)
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center; gap: 1rem;">
                                    @if($request->image)
                                        <img src="{{ asset('storage/' . $request->image) }}" alt="{{ $request->title }}" class="item-image">
                                    @else
                                        <div style="width: 50px; height: 50px; background: #f0f0f0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-image" style="color: #999;"></i>
                                        </div>
                                    @endif
                                    <strong>{{ $request->title }}</strong>
                                </div>
                            </td>
                            <td>{{ $request->supplier->full_name }}</td>
                            <td>
                                @if($request->product_type === 'tools')
                                    <span class="badge" style="background: #fff3e0; color: #e65100; padding: 0.4rem 0.9rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">Tools</span>
                                @elseif($request->product_type === 'fertilizer')
                                    <span class="badge" style="background: #e8f5e9; color: #2e7d32; padding: 0.4rem 0.9rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">Fertilizer</span>
                                @else
                                    <span class="badge" style="background: #e3f2fd; color: #1565c0; padding: 0.4rem 0.9rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">Crops</span>
                                @endif
                            </td>
                            <td>Rs {{ number_format($request->price, 2) }}</td>
                            <td>{{ $request->created_at->diffForHumans() }}</td>
                            <td>
                                <div style="display: flex; gap: 0.5rem;">
                                    <a href="{{ route('admin.product-requests.index') }}" class="btn btn-primary" style="font-size: 0.85rem; padding: 0.5rem 1rem;">
                                        <i class="fas fa-eye"></i> Review
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        <!-- Tools Management Section -->
        <div class="management-section">
            <div class="section-header">
                <h2><i class="fas fa-tools"></i> Tools Management</h2>
                <a href="{{ route('admin.tools.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Tool
                </a>
            </div>

            @if($tools->count() > 0)
                <div class="table-responsive">
                    <table class="management-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Tool Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tools->take(5) as $tool)
                            <tr>
                                <td>
                                    @if($tool->image)
                                        @if(strpos($tool->image, 'images/tools') !== false)
                                            <img src="{{ asset($tool->image) }}" alt="{{ $tool->title }}" class="item-image">
                                        @else
                                            <img src="{{ asset('storage/' . $tool->image) }}" alt="{{ $tool->title }}" class="item-image">
                                        @endif
                                    @else
                                        <div class="item-image" style="background: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-image" style="color: #ccc;"></i>
                                        </div>
                                    @endif
                                </td>
                                <td><strong>{{ $tool->title }}</strong></td>
                                <td><strong>Rs {{ number_format($tool->price, 2) }}</strong></td>
                                <td>
                                    <span class="status-badge {{ $tool->status === 'in_stock' ? 'available' : 'unavailable' }}">
                                        @if($tool->status === 'in_stock')
                                            In Stock
                                        @elseif($tool->status === 'limited')
                                            Limited
                                        @else
                                            Unavailable
                                        @endif
                                    </span>
                                </td>
                                <td>{{ Str::limit($tool->description, 40) }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.tools.edit', $tool->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.tools.destroy', $tool->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete this tool?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($tools->count() > 5)
                    <p style="text-align: end; margin-block-start: 1rem;">
                        <a href="{{ route('admin.tools.index') }}" class="view-all-link">View all {{ $tools->count() }} tools →</a>
                    </p>
                @endif
            @else
                <div class="empty-state">
                    <i class="fas fa-tools"></i>
                    <p>No tools added yet. Click "Add New Tool" to get started.</p>
                </div>
            @endif
        </div>

        <!-- Fertilizers Management Section -->
        <div class="management-section">
            <div class="section-header">
                <h2><i class="fas fa-droplet"></i> Fertilizers Management</h2>
                <a href="{{ route('admin.fertilizers.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Fertilizer
                </a>
            </div>

            @if($fertilizers->count() > 0)
                <div class="table-responsive">
                    <table class="management-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Fertilizer Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fertilizers->take(5) as $fertilizer)
                            <tr>
                                <td>
                                    @if($fertilizer->image)
                                        @if(strpos($fertilizer->image, 'images/') !== false)
                                            <img src="{{ asset($fertilizer->image) }}" alt="{{ $fertilizer->title }}" class="item-image">
                                        @else
                                            <img src="{{ asset('storage/' . $fertilizer->image) }}" alt="{{ $fertilizer->title }}" class="item-image">
                                        @endif
                                    @else
                                        <div class="item-image" style="background: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-image" style="color: #ccc;"></i>
                                        </div>
                                    @endif
                                </td>
                                <td><strong>{{ $fertilizer->title }}</strong></td>
                                <td><strong>Rs {{ number_format($fertilizer->price, 2) }}</strong></td>
                                <td>
                                    <span class="status-badge {{ $fertilizer->status === 'in_stock' ? 'available' : 'unavailable' }}">
                                        @if($fertilizer->status === 'in_stock')
                                            In Stock
                                        @elseif($fertilizer->status === 'limited')
                                            Limited
                                        @else
                                            Unavailable
                                        @endif
                                    </span>
                                </td>
                                <td>{{ Str::limit($fertilizer->description, 40) }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.fertilizers.edit', $fertilizer->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.fertilizers.destroy', $fertilizer->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete this fertilizer?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($fertilizers->count() > 5)
                    <p style="text-align: end; margin-block-start: 1rem;">
                        <a href="{{ route('admin.fertilizers.index') }}" class="view-all-link">View all {{ $fertilizers->count() }} fertilizers →</a>
                    </p>
                @endif
            @else
                <div class="empty-state">
                    <i class="fas fa-droplet"></i>
                    <p>No fertilizers added yet. Click "Add New Fertilizer" to get started.</p>
                </div>
            @endif
        </div>

        <!-- Crops Management Section -->
        <div class="management-section">
            <div class="section-header">
                <h2><i class="fas fa-leaf"></i> Crops Management</h2>
                <a href="{{ route('admin.crops.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Crop
                </a>
            </div>

            @if($crops->count() > 0)
                <div class="table-responsive">
                    <table class="management-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Crop Name</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Rating</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($crops->take(5) as $crop)
                            <tr>
                                @php
                                    $cropStatus = str_replace('-', '_', $crop->status);
                                    $primaryImage = null;
                                    if ($crop->image_folder) {
                                        if (str_contains($crop->image_folder, '/')) {
                                            $primaryImage = asset('storage/' . $crop->image_folder);
                                        } else {
                                            foreach (['jpg', 'jpeg', 'png', 'webp', 'gif'] as $ext) {
                                                $path = public_path('images/crop/' . $crop->image_folder . '/1.' . $ext);
                                                if (file_exists($path)) {
                                                    $primaryImage = asset('images/crop/' . $crop->image_folder . '/1.' . $ext);
                                                    break;
                                                }
                                            }
                                        }
                                    }
                                @endphp
                                <td>
                                    @if($primaryImage)
                                        <img src="{{ $primaryImage }}" alt="{{ $crop->name }}" class="item-image">
                                    @else
                                        <div class="item-image" style="background: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-image" style="color: #ccc;"></i>
                                        </div>
                                    @endif
                                </td>
                                <td><strong>{{ $crop->name }}</strong></td>
                                <td>{{ $crop->type }}</td>
                                <td><strong>Rs {{ number_format($crop->price, 2) }}</strong></td>
                                <td>
                                    <span class="status-badge {{ $cropStatus }}">
                                        @if($cropStatus === 'in_stock')
                                            In Stock
                                        @elseif($cropStatus === 'limited')
                                            Limited
                                        @else
                                            Unavailable
                                        @endif
                                    </span>
                                </td>
                                <td>{{ $crop->rating ?? '—' }} ★ ({{ $crop->reviews ?? 0 }})</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.crops.edit', $crop) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.crops.destroy', $crop) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete this crop?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($crops->count() > 5)
                    <p style="text-align: end; margin-block-start: 1rem;">
                        <a href="{{ route('admin.crops.index') }}" class="view-all-link">View all {{ $crops->count() }} crops →</a>
                    </p>
                @endif
            @else
                <div class="empty-state">
                    <i class="fas fa-leaf"></i>
                    <p>No crops added yet. Click "Add New Crop" to get started.</p>
                </div>
            @endif
        </div>

        <!-- Suppliers Management Section -->
        <div class="management-section">
            <div class="section-header">
                <h2><i class="fas fa-users"></i> Suppliers Management</h2>
                <a href="{{ route('admin.suppliers.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Supplier
                </a>
            </div>

            @if($suppliers->count() > 0)
                <div class="table-responsive">
                    <table class="management-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Product Type</th>
                                <th>Country</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suppliers->take(5) as $supplier)
                            <tr>
                                <td><strong>#{{ $supplier->id }}</strong></td>
                                <td><strong>{{ $supplier->first_name }} {{ $supplier->last_name }}</strong></td>
                                <td>{{ $supplier->email }}</td>
                                <td>{{ $supplier->phone }}</td>
                                <td>
                                    @if($supplier->product_type === 'tools')
                                        <span class="status-badge" style="background-color: #fff3e0; color: #e65100;">Tools</span>
                                    @elseif($supplier->product_type === 'fertilizer')
                                        <span class="status-badge" style="background-color: #e8f5e9; color: #2e7d32;">Fertilizer</span>
                                    @else
                                        <span class="status-badge" style="background-color: #e3f2fd; color: #1565c0;">Crops</span>
                                    @endif
                                </td>
                                <td>{{ $supplier->country }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.suppliers.edit', $supplier->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.suppliers.destroy', $supplier->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete this supplier?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($suppliers->count() > 5)
                    <p style="text-align: end; margin-block-start: 1rem;">
                        <a href="{{ route('admin.suppliers.index') }}" class="view-all-link">View all {{ $suppliers->count() }} suppliers →</a>
                    </p>
                @endif
            @else
                <div class="empty-state">
                    <i class="fas fa-users"></i>
                    <p>No suppliers added yet. Click "Add New Supplier" to get started.</p>
                </div>
            @endif
        </div>

        <!-- Quick Actions Section -->
        <div class="management-section">
            <h2 style="margin-block-end: 2rem; font-size: 1.6rem; color: #333;"><i class="fas fa-bolt" style="color: #4CAF50; margin-inline-end: 0.8rem;"></i> Quick Management</h2>

            <div class="quick-actions">
                <a href="{{ route('admin.tools.index') }}" class="quick-action-card tools">
                    <i class="fas fa-plus-circle" style="color: #FA891A;"></i>
                    <h3>Add Tools</h3>
                    <p style="font-size: 0.85rem; color: #666; margin-block-start: 0.5rem;">Add new agricultural tools</p>
                </a>

                <a href="{{ route('admin.suppliers.index') }}" class="quick-action-card" style="border-block-start-color:#3949ab;">
                    <i class="fas fa-users" style="color: #3949ab;"></i>
                    <h3>Manage Suppliers</h3>
                    <p style="font-size: 0.85rem; color: #666; margin-block-start: 0.5rem;">View and manage suppliers</p>
                </a>

                <a href="{{ route('admin.fertilizers.index') }}" class="quick-action-card fertilizers">
                    <i class="fas fa-droplet" style="color: #4CAF50;"></i>
                    <h3>Add Fertilizers</h3>
                    <p style="font-size: 0.85rem; color: #666; margin-block-start: 0.5rem;">Add new fertilizer products</p>
                </a>

                <a href="{{ route('admin.crops.index') }}" class="quick-action-card crops">
                    <i class="fas fa-leaf" style="color: #2196F3;"></i>
                    <h3>Manage Crops</h3>
                    <p style="font-size: 0.85rem; color: #666; margin-block-start: 0.5rem;">Control crop information</p>
                </a>

                <a href="{{ route('admin.orders') }}" class="quick-action-card orders">
                    <i class="fas fa-shopping-cart" style="color: #9C27B0;"></i>
                    <h3>View Orders</h3>
                    <p style="font-size: 0.85rem; color: #666; margin-block-start: 0.5rem;">Check customer orders</p>
                </a>
            </div>
        </div>

        <!-- Footer Quick Links -->
        <div style="text-align: center; padding: 2rem; color: #666; font-size: 0.95rem;">
            <p>Need help? <a href="#" style="color: #4CAF50; text-decoration: none; font-weight: 600;">Contact Support</a> | <a href="#" style="color: #4CAF50; text-decoration: none; font-weight: 600;">Documentation</a></p>
        </div>
    </div>
</body>
</html>
