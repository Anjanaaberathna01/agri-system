<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product Request - Supplier</title>
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
            text-align: center;
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
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #667eea;
            text-decoration: none;
            margin-bottom: 2rem;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #764ba2;
        }

        .detail-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
        }

        .detail-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #f0f0f0;
        }

        .detail-header h2 {
            color: #333;
            font-size: 1.8rem;
        }

        .status-badge {
            padding: 0.6rem 1.2rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-block;
        }

        .status-badge.pending {
            background: linear-gradient(135deg, #FFA726 0%, #FB8C00 100%);
            color: white;
        }

        .status-badge.approved {
            background: linear-gradient(135deg, #66BB6A 0%, #43A047 100%);
            color: white;
        }

        .status-badge.rejected {
            background: linear-gradient(135deg, #EF5350 0%, #E53935 100%);
            color: white;
        }

        .detail-row {
            display: grid;
            grid-template-columns: 200px 1fr;
            padding: 1.2rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: #555;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .detail-value {
            color: #333;
            font-size: 1rem;
        }

        .product-image {
            max-width: 300px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .price-display {
            font-size: 1.5rem;
            font-weight: 700;
            color: #667eea;
        }

        .description-text {
            line-height: 1.6;
            color: #555;
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }

        .admin-notes {
            background: #fff3cd;
            padding: 1rem;
            border-radius: 8px;
            border-left: 4px solid #ff9800;
            color: #856404;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid #f0f0f0;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.8rem 2rem;
            text-decoration: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        .btn-danger {
            background: linear-gradient(135deg, #EF5350 0%, #E53935 100%);
            color: white;
            padding: 0.8rem 2rem;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 83, 80, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #90a4ae 0%, #78909c 100%);
            color: white;
            padding: 0.8rem 2rem;
            text-decoration: none;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(144, 164, 174, 0.4);
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
            border-left: 4px solid #ffc107;
        }

        .alert i {
            font-size: 1.2rem;
            flex-shrink: 0;
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

        .delete-form {
            display: inline;
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
            margin: 10% auto;
            padding: 2rem;
            border-radius: 12px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f0f0f0;
        }

        .modal-header h3 {
            color: #333;
            font-size: 1.3rem;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 1.8rem;
            cursor: pointer;
            color: #999;
        }

        .close-btn:hover {
            color: #333;
        }

        .modal-footer {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 2px solid #f0f0f0;
        }

        .modal-footer .btn {
            flex: 1;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .detail-row {
                grid-template-columns: 1fr;
                gap: 0.5rem;
            }

            .detail-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .action-buttons {
                flex-direction: column;
            }

            .action-buttons .btn {
                justify-content: center;
            }
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
        <a href="{{ route('supplier.requests.index') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to All Requests
        </a>

        @if($productRequest->status === 'pending')
            <div class="alert alert-warning">
                <i class="fas fa-info-circle"></i>
                <span>This request is pending admin review. You can still <strong>edit</strong> or <strong>delete</strong> it before the admin makes a decision.</span>
            </div>
        @endif

        <div class="detail-card">
            <div class="detail-header">
                <h2>{{ $productRequest->title }}</h2>
                <span class="status-badge {{ $productRequest->status }}">
                    <i class="fas fa-circle" style="font-size: 0.6rem; margin-right: 0.3rem;"></i>
                    {{ ucfirst($productRequest->status) }}
                </span>
            </div>

            <div class="detail-row">
                <div class="detail-label">
                    <i class="fas fa-tag"></i> Product Type
                </div>
                <div class="detail-value">
                    @if($productRequest->product_type === 'tools')
                        <span class="badge badge-tools">Agricultural Tools</span>
                    @elseif($productRequest->product_type === 'fertilizer')
                        <span class="badge badge-fertilizer">Fertilizer</span>
                    @else
                        <span class="badge badge-crops">Crops</span>
                    @endif
                </div>
            </div>

            @php
                $images = array_values(array_filter([
                    $productRequest->image,
                    $productRequest->image2,
                    $productRequest->image3,
                    $productRequest->image4,
                ]));

                $toUrl = function ($path) {
                    if (!$path) {
                        return null;
                    }
                    if (\Illuminate\Support\Str::startsWith($path, ['http://', 'https://'])) {
                        return $path; // already an absolute URL
                    }

                    // Normalize leading storage|public and slashes, then let Storage build the URL
                    $normalized = ltrim(preg_replace('#^(storage|public)/#', '', str_replace('\\', '/', $path)), '/');
                    return \Illuminate\Support\Facades\Storage::url('public/' . $normalized);
                };
            @endphp

            @if(count($images))
            <div class="detail-row">
                <div class="detail-label">
                    <i class="fas fa-image"></i> Product Images
                </div>
                <div class="detail-value">
                    <div style="display: grid; grid-template-columns: 1fr; gap: 1rem;">
                        <img src="{{ $toUrl($images[0]) }}" alt="{{ $productRequest->title }}" class="product-image">
                        @if(count($images) > 1)
                            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                                @foreach($images as $img)
                                    <img src="{{ $toUrl($img) }}" alt="{{ $productRequest->title }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px; border: 2px solid #f0f0f0;">
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @else
            <div class="detail-row">
                <div class="detail-label">
                    <i class="fas fa-image"></i> Product Images
                </div>
                <div class="detail-value" style="color: #999;">No images uploaded.</div>
            </div>
            @endif

            <div class="detail-row">
                <div class="detail-label">
                    <i class="fas fa-dollar-sign"></i> Price
                </div>
                <div class="detail-value">
                    <span class="price-display">Rs {{ number_format($productRequest->price, 2) }}</span>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">
                    <i class="fas fa-file-alt"></i> Description
                </div>
                <div class="detail-value">
                    <div class="description-text">
                        {{ $productRequest->description }}
                    </div>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">
                    <i class="fas fa-calendar"></i> Submitted
                </div>
                <div class="detail-value">
                    {{ $productRequest->created_at->format('M d, Y H:i A') }}
                </div>
            </div>

            @if($productRequest->reviewed_at)
            <div class="detail-row">
                <div class="detail-label">
                    <i class="fas fa-check-circle"></i> Reviewed
                </div>
                <div class="detail-value">
                    {{ $productRequest->reviewed_at->format('M d, Y H:i A') }}
                </div>
            </div>
            @endif

            @if($productRequest->admin_notes)
            <div class="detail-row">
                <div class="detail-label">
                    <i class="fas fa-sticky-note"></i> Admin Notes
                </div>
                <div class="detail-value">
                    <div class="admin-notes">
                        {{ $productRequest->admin_notes }}
                    </div>
                </div>
            </div>
            @endif

            <!-- Action Buttons -->
            @if($productRequest->status === 'pending')
            <div class="action-buttons">
                <a href="{{ route('supplier.requests.edit', $productRequest->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Edit Request
                </a>

                <button type="button" class="btn btn-danger" onclick="openDeleteModal()">
                    <i class="fas fa-trash-alt"></i> Delete Request
                </button>

                <a href="{{ route('supplier.requests.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
            @else
            <div class="action-buttons">
                <a href="{{ route('supplier.requests.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to All Requests
                </a>
            </div>
            @endif
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Delete Request</h3>
                <button type="button" class="close-btn" onclick="closeDeleteModal()">&times;</button>
            </div>

            <p style="color: #555; margin-bottom: 1.5rem;">
                Are you sure you want to delete this product request? This action cannot be undone.
            </p>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">
                    <i class="fas fa-times"></i> Cancel
                </button>
                <form action="{{ route('supplier.requests.destroy', $productRequest->id) }}" method="POST" class="delete-form" style="flex: 1;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="width: 100%; justify-content: center;">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal() {
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
