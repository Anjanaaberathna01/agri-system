<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Product Requests</title>
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

        .btn-white {
            background: white;
            color: #667eea;
        }

        .btn-white:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }

        .btn-back {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 1px solid white;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 2rem;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        h2 {
            font-size: 1.75rem;
            color: #333;
            display: flex;
            align-items: center;
            gap: 0.6rem;
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

        .status-badge {
            padding: 0.4rem 0.9rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
        }

        .status-badge.pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-badge.approved {
            background-color: #d4edda;
            color: #155724;
        }

        .status-badge.rejected {
            background-color: #f8d7da;
            color: #721c24;
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

        .product-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .btn-action {
            padding: 0.5rem 0.8rem;
            border: none;
            border-radius: 6px;
            font-size: 0.85rem;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            transition: all 0.2s ease;
            font-weight: 600;
        }

        .btn-view {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-view:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
        }

        .btn-edit {
            background: linear-gradient(135deg, #42a5f5 0%, #1e88e5 100%);
            color: white;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(66, 165, 245, 0.3);
        }

        .btn-delete {
            background: linear-gradient(135deg, #EF5350 0%, #E53935 100%);
            color: white;
            border: none;
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(239, 83, 80, 0.3);
        }

        .btn-disabled {
            background: #ccc;
            color: white;
            cursor: not-allowed;
            opacity: 0.6;
        }

        .btn-disabled:hover {
            transform: none;
            box-shadow: none;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: white;
            margin: 20% auto;
            padding: 1.5rem;
            border-radius: 12px;
            width: 90%;
            max-width: 350px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }

        .modal-footer {
            display: flex;
            gap: 0.8rem;
            margin-top: 1.5rem;
        }

        .modal-footer button {
            flex: 1;
            padding: 0.6rem 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .modal-cancel {
            background: #ccc;
            color: #333;
        }

        .modal-confirm {
            background: linear-gradient(135deg, #EF5350 0%, #E53935 100%);
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1><i class="fas fa-list"></i> My Product Requests</h1>
        <div style="display: flex; gap: 1rem;">
            <a href="{{ route('supplier.dashboard') }}" class="btn btn-back">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
            <a href="{{ route('supplier.requests.create') }}" class="btn btn-white">
                <i class="fas fa-plus"></i> New Request
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if($requests->count() > 0)
                @php
                    $imageUrl = function ($path) {
                        if (!$path) return null;
                        if (\Illuminate\Support\Str::startsWith($path, ['http://', 'https://'])) return $path;
                        $normalized = ltrim(str_replace('storage/', '', str_replace('\\', '/', $path)), '/');
                        return asset('storage/' . $normalized);
                    };
                @endphp
                <div style="overflow-x: auto;">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Submitted</th>
                                <th>Admin Notes</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                            <tr>
                                <td>
                                    @php
                                        $primaryImage = $request->image ?? $request->image2 ?? $request->image3 ?? $request->image4;
                                    @endphp
                                    @if($primaryImage)
                                        <img src="{{ $imageUrl($primaryImage) }}" alt="{{ $request->title }}" class="product-image">
                                    @else
                                        <div class="product-image" style="background: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-image" style="color: #ccc;"></i>
                                        </div>
                                    @endif
                                </td>
                                <td><strong>{{ $request->title }}</strong></td>
                                <td><strong>Rs {{ number_format($request->price, 2) }}</strong></td>
                                <td>
                                    <span class="status-badge {{ $request->status }}">
                                        <i class="fas
                                            @if($request->status === 'pending') fa-clock
                                            @elseif($request->status === 'approved') fa-check-circle
                                            @else fa-times-circle
                                            @endif
                                        "></i>
                                        {{ ucfirst($request->status) }}
                                    </span>
                                </td>
                                <td>{{ $request->created_at->format('M d, Y') }}</td>
                                <td>
                                    @if($request->admin_notes)
                                        <span style="color: #666;">{{ Str::limit($request->admin_notes, 50) }}</span>
                                    @else
                                        <span style="color: #aaa;">—</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('supplier.requests.show', $request->id) }}" class="btn-action btn-view">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        @if($request->status === 'pending')
                                            <a href="{{ route('supplier.requests.edit', $request->id) }}" class="btn-action btn-edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <button type="button" class="btn-action btn-delete" onclick="openDeleteModal({{ $request->id }}, '{{ $request->title }}')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        @else
                                            <button class="btn-action btn-disabled" title="Cannot edit {{ $request->status }} requests">
                                                <i class="fas fa-lock"></i> Locked
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-box-open"></i>
                    <p>No product requests yet. Click "New Request" to submit your first product!</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <h3 style="color: #333; margin-bottom: 1rem;">Delete Request?</h3>
            <p id="modalMessage" style="color: #666; margin-bottom: 1.5rem;"></p>
            <p style="color: #999; font-size: 0.85rem;">This action cannot be undone.</p>

            <form id="deleteForm" method="POST" style="display: inline-width: 100%;">
                @csrf
                @method('DELETE')
                <div class="modal-footer">
                    <button type="button" class="modal-cancel" onclick="closeDeleteModal()">Cancel</button>
                    <button type="submit" class="modal-confirm">Delete</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openDeleteModal(requestId, productTitle) {
            document.getElementById('modalMessage').textContent = `Are you sure you want to delete "${productTitle}"?`;
            document.getElementById('deleteForm').action = `/supplier/requests/${requestId}`;
            document.getElementById('deleteModal').style.display = 'block';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        window.onclick = function(event) {
            const modal = document.getElementById('deleteModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html>
