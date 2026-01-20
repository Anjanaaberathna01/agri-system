<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Dashboard</title>
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

        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar h1 {
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .navbar .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .btn {
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-logout {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 1px solid white;
        }

        .btn-logout:hover {
            background: white;
            color: #667eea;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .welcome-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .stat-icon.pending {
            background: linear-gradient(135deg, #FFA726 0%, #FB8C00 100%);
        }

        .stat-icon.approved {
            background: linear-gradient(135deg, #66BB6A 0%, #43A047 100%);
        }

        .stat-icon.rejected {
            background: linear-gradient(135deg, #EF5350 0%, #E53935 100%);
        }

        .stat-info h3 {
            font-size: 2rem;
            color: #2c3e50;
            margin-bottom: 0.3rem;
        }

        .stat-info p {
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        .btn-add-product {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 2rem;
            font-size: 1rem;
            margin-bottom: 2rem;
        }

        .btn-add-product:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        .btn-view-all {
            background: linear-gradient(135deg, #42a5f5 0%, #1e88e5 100%);
            color: white;
            padding: 0.8rem 1.5rem;
            font-size: 0.9rem;
        }

        .btn-view-all:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(66, 165, 245, 0.4);
        }
        }

        .welcome-card h2 {
            color: #333;
            margin-bottom: 0.5rem;
        }

        .welcome-card p {
            color: #666;
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.8rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .stat-icon.purple {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .stat-content h3 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 0.3rem;
        }

        .stat-content p {
            color: #666;
            font-size: 0.9rem;
        }

        .info-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .info-card h3 {
            color: #333;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .info-row {
            display: grid;
            grid-template-columns: 200px 1fr;
            padding: 1rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 600;
            color: #555;
        }

        .info-value {
            color: #333;
        }

        .badge {
            padding: 0.4rem 0.9rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
        }

        .badge-tools {
            background-color: #fff3e0;
            color: #e65100;
        }

        .badge-fertilizer {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .badge-crops {
            background-color: #e3f2fd;
            color: #1565c0;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1><i class="fas fa-truck"></i> Supplier Portal</h1>
        <div class="user-info">
            <span>Welcome, {{ auth()->guard('supplier')->user()->full_name }}</span>
            <form action="{{ route('supplier.logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="welcome-card">
            <h2>Welcome to Your Supplier Dashboard</h2>
            <p>Manage your supplier profile and track your product supplies for SpasilaLahanPetani platform.</p>
        </div>

        <!-- Add Product Request Button -->
        <a href="{{ route('supplier.requests.create') }}" class="btn btn-add-product">
            <i class="fas fa-plus-circle"></i> Add Product Request
        </a>

        <!-- Request Statistics -->
        @php
            $supplier = auth()->guard('supplier')->user();
            $pendingCount = \App\Models\ProductRequest::where('supplier_id', $supplier->id)->where('status', 'pending')->count();
            $approvedCount = \App\Models\ProductRequest::where('supplier_id', $supplier->id)->where('status', 'approved')->count();
            $rejectedCount = \App\Models\ProductRequest::where('supplier_id', $supplier->id)->where('status', 'rejected')->count();
        @endphp

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon pending">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $pendingCount }}</h3>
                    <p>Pending Requests</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon approved">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $approvedCount }}</h3>
                    <p>Approved Requests</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon rejected">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $rejectedCount }}</h3>
                    <p>Rejected Requests</p>
                </div>
            </div>
        </div>

        <!-- View All Requests Button -->
        <a href="{{ route('supplier.requests.index') }}" class="btn btn-view-all">
            <i class="fas fa-list"></i> View All My Requests
        </a>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon purple">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="stat-content">
                    <h3>Active</h3>
                    <p>Account Status</p>
                </div>
            </div>
        </div>

        <div class="info-card">
            <h3><i class="fas fa-id-card"></i> Your Information</h3>

            <div class="info-row">
                <div class="info-label">Full Name:</div>
                <div class="info-value">{{ $supplier->full_name }}</div>
            </div>

            <div class="info-row">
                <div class="info-label">Email:</div>
                <div class="info-value">{{ $supplier->email }}</div>
            </div>

            <div class="info-row">
                <div class="info-label">Phone:</div>
                <div class="info-value">{{ $supplier->phone }}</div>
            </div>

            <div class="info-row">
                <div class="info-label">Product Type:</div>
                <div class="info-value">
                    @if($supplier->product_type === 'tools')
                        <span class="badge badge-tools">Tools</span>
                    @elseif($supplier->product_type === 'fertilizer')
                        <span class="badge badge-fertilizer">Fertilizer</span>
                    @else
                        <span class="badge badge-crops">Crops</span>
                    @endif
                </div>
            </div>

            <div class="info-row">
                <div class="info-label">ID Number:</div>
                <div class="info-value">{{ $supplier->id_number }}</div>
            </div>

            <div class="info-row">
                <div class="info-label">Country:</div>
                <div class="info-value">{{ $supplier->country }}</div>
            </div>

            @if($supplier->password_changed_at)
            <div class="info-row">
                <div class="info-label">Password Last Changed:</div>
                <div class="info-value">{{ $supplier->password_changed_at->format('M d, Y H:i A') }}</div>
            </div>
            @endif
        </div>
    </div>
</body>
</html>
