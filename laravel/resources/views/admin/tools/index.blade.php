<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tools - Admin Panel</title>
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
            max-width: 1600px;
            margin: 0 auto;
            padding: 2rem;
        }

        .page-header {
            background: linear-gradient(135deg, #FA891A 0%, #FF9013 100%);
            color: white;
            padding: 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            box-shadow: 0 4px 12px rgba(250, 137, 26, 0.3);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-header h1 {
            font-size: 2rem;
            font-weight: 700;
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
            background: white;
            color: #FA891A;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(255, 255, 255, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: white;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(76, 175, 80, 0.4);
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

        .btn-sm {
            padding: 0.6rem 1.2rem;
            font-size: 0.9rem;
        }

        .tools-section {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f0f0f0;
        }

        .section-header h2 {
            font-size: 1.5rem;
            color: #333;
            font-weight: 700;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .management-table {
            width: 100%;
            border-collapse: collapse;
        }

        .management-table thead {
            background-color: #f8f9fa;
        }

        .management-table th {
            padding: 1.2rem;
            text-align: left;
            font-weight: 700;
            color: #333;
            border-bottom: 2px solid #dee2e6;
            font-size: 0.95rem;
        }

        .management-table td {
            padding: 1.2rem;
            border-bottom: 1px solid #dee2e6;
            color: #555;
        }

        .management-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .item-image {
            width: 50px;
            height: 50px;
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

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #666;
        }

        .empty-state i {
            font-size: 3.5rem;
            color: #ddd;
            margin-bottom: 1rem;
            display: block;
        }

        .alert {
            padding: 1.2rem 1.5rem;
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

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .page-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .management-table {
                font-size: 0.875rem;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    @include('layouts.admin_nav')

    <div class="container">
        <div class="page-header">
            <h1><i class="fas fa-tools"></i> All Agricultural Tools</h1>
            <div style="display: flex; gap: 1rem;">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
                <a href="{{ route('admin.tools.create') }}" class="btn btn-secondary">
                    <i class="fas fa-plus"></i> Add New Tool
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="tools-section">
            <div class="section-header">
                <h2>Total Tools: {{ $tools->count() }}</h2>
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
                            @foreach($tools as $tool)
                            <tr>
                                <td>
                                    @if($tool->image)
                                        @php
                                            // Check if image path starts with 'images/' (static files) or use storage path
                                            $imagePath = (strpos($tool->image, 'images/') === 0)
                                                ? asset($tool->image)
                                                : asset('storage/' . $tool->image);
                                        @endphp
                                        <img src="{{ $imagePath }}" alt="{{ $tool->title }}" class="item-image">
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
                                <td>{{ Str::limit($tool->description, 60) }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.tools.edit', $tool->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.tools.destroy', $tool->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this tool?');">
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
            @else
                <div class="empty-state">
                    <i class="fas fa-tools"></i>
                    <h3>No Tools Found</h3>
                    <p>No agricultural tools have been added yet.</p>
                    <a href="{{ route('admin.tools.create') }}" class="btn btn-secondary" style="margin-top: 1rem;">
                        <i class="fas fa-plus"></i> Add Your First Tool
                    </a>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
