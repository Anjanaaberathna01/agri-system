<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers Management - Admin</title>
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

        .page-container {
            max-inline-size: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 2.5rem;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-block-end: 2rem;
            padding-block-end: 1.5rem;
            border-block-end: 2px solid #f0f0f0;
        }

        h1 {
            font-size: 1.9rem;
            color: #333;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .btn {
            padding: 0.85rem 1.5rem;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: #fff;
            box-shadow: 0 6px 14px rgba(76, 175, 80, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(76, 175, 80, 0.4);
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
        }

        table {
            inline-size: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #f8f9fa;
        }

        th {
            padding: 1.2rem;
            text-align: start;
            font-weight: 700;
            color: #333;
            border-block-end: 2px solid #dee2e6;
            font-size: 0.95rem;
        }

        td {
            padding: 1.2rem;
            border-block-end: 1px solid #dee2e6;
            color: #555;
        }

        tbody tr:hover {
            background-color: #f8f9fa;
        }

        .action-buttons {
            display: flex;
            gap: 0.6rem;
            flex-wrap: wrap;
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

        .table-responsive {
            overflow-x: auto;
        }

        @media (max-inline-size: 768px) {
            .page-container {
                padding: 1.25rem;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            table {
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

    <div class="page-container">
        <div class="card">
            <div class="header">
                <h1><i class="fas fa-users"></i> Suppliers Management</h1>
                <a href="{{ route('admin.suppliers.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Supplier
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if($suppliers->count() > 0)
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Product Type</th>
                                <th>ID Number</th>
                                <th>Country</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suppliers as $supplier)
                            <tr>
                                <td><strong>#{{ $supplier->id }}</strong></td>
                                <td><strong>{{ $supplier->first_name }} {{ $supplier->last_name }}</strong></td>
                                <td>{{ $supplier->email }}</td>
                                <td>{{ $supplier->phone }}</td>
                                <td>
                                    <span class="badge badge-{{ $supplier->product_type }}">
                                        {{ ucfirst($supplier->product_type) }}
                                    </span>
                                </td>
                                <td>{{ $supplier->id_number }}</td>
                                <td>{{ $supplier->country }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.suppliers.edit', $supplier->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.suppliers.destroy', $supplier->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this supplier?');">
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
                    <i class="fas fa-users"></i>
                    <p>No suppliers added yet. Click "Add New Supplier" to get started.</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
