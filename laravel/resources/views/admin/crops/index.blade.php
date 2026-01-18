<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Crops - Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background-color: #f5f7fa; min-height: 100vh; }
        .container { max-width: 1600px; margin: 0 auto; padding: 2rem; }
        .page-header { background: linear-gradient(135deg, #4CAF50 0%, #3b8d3f 100%); color: white; padding: 2rem; border-radius: 12px; margin-bottom: 2rem; box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3); display: flex; justify-content: space-between; align-items: center; }
        .page-header h1 { font-size: 2rem; font-weight: 700; }
        .btn { padding: 0.8rem 1.6rem; border: none; border-radius: 8px; font-size: 1rem; font-weight: 600; cursor: pointer; transition: all 0.3s ease; text-decoration: none; display: inline-flex; align-items: center; gap: 0.6rem; }
        .btn-primary { background: white; color: #4CAF50; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 12px rgba(255, 255, 255, 0.4); }
        .btn-secondary { background: linear-gradient(135deg, #4CAF50 0%, #3b8d3f 100%); color: white; }
        .btn-secondary:hover { transform: translateY(-2px); box-shadow: 0 6px 12px rgba(76, 175, 80, 0.35); }
        .btn-warning { background: #ffc107; color: #333; }
        .btn-danger { background: #dc3545; color: white; }
        .btn-sm { padding: 0.6rem 1.2rem; font-size: 0.9rem; }
        .crops-section { background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); }
        .section-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 2px solid #f0f0f0; }
        .section-header h2 { font-size: 1.5rem; color: #333; font-weight: 700; }
        .table-responsive { overflow-x: auto; }
        .management-table { width: 100%; border-collapse: collapse; }
        .management-table thead { background-color: #f8f9fa; }
        .management-table th { padding: 1.2rem; text-align: left; font-weight: 700; color: #333; border-bottom: 2px solid #dee2e6; font-size: 0.95rem; }
        .management-table td { padding: 1.2rem; border-bottom: 1px solid #dee2e6; color: #555; }
        .management-table tbody tr:hover { background-color: #f8f9fa; }
        .item-image { width: 50px; height: 50px; object-fit: cover; border-radius: 8px; }
        .status-badge { padding: 0.4rem 0.9rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600; display: inline-block; }
        .status-badge.in_stock { background-color: #d4edda; color: #155724; }
        .status-badge.limited { background-color: #fff3cd; color: #856404; }
        .status-badge.unavailable { background-color: #f8d7da; color: #721c24; }
        .action-buttons { display: flex; gap: 0.6rem; flex-wrap: wrap; }
        .empty-state { text-align: center; padding: 3rem 1rem; color: #666; }
        .empty-state i { font-size: 3.5rem; color: #ddd; margin-bottom: 1rem; display: block; }
        .alert { padding: 1.2rem 1.5rem; border-radius: 8px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 1rem; }
        .alert-success { background-color: #d4edda; color: #155724; border-left: 4px solid #28a745; }
        @media (max-width: 768px) { .container { padding: 1rem; } .page-header { flex-direction: column; gap: 1rem; align-items: flex-start; } .management-table { font-size: 0.875rem; } .action-buttons { flex-direction: column; } }
    </style>
</head>
<body>
    @include('layouts.admin_nav')

    <div class="container">
        <div class="page-header">
            <h1><i class="fas fa-leaf"></i> All Crops</h1>
            <div style="display: flex; gap: 1rem;">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
                <a href="{{ route('admin.crops.create') }}" class="btn btn-secondary">
                    <i class="fas fa-plus"></i> Add New Crop
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="crops-section">
            <div class="section-header">
                <h2>Total Crops: {{ $crops->count() }}</h2>
            </div>

            @if($crops->count())
                <div class="table-responsive">
                    <table class="management-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Rating</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($crops as $crop)
                            <tr>
                                @php
                                    $status = str_replace('-', '_', $crop->status);
                                    $primaryImage = null;

                                    if ($crop->image_folder) {
                                        if (str_contains($crop->image_folder, 'images/')) {
                                            $primaryImage = asset($crop->image_folder);
                                        } elseif (file_exists(storage_path('app/public/' . $crop->image_folder))) {
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
                                        <div class="item-image" style="background: #f0f0f0; display: flex; align-items: center; justify-content: center; color: #adb5bd;">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    @endif
                                </td>
                                <td><strong>{{ $crop->name }}</strong></td>
                                <td>{{ $crop->type }}</td>
                                <td><strong>Rs {{ number_format($crop->price, 2) }}</strong></td>
                                <td><span class="status-badge {{ $status }}">{{ str_replace('_', ' ', ucfirst($status)) }}</span></td>
                                <td>{{ $crop->rating ?? '—' }} ★ ({{ $crop->reviews ?? 0 }})</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.crops.edit', $crop) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                        <form action="{{ route('admin.crops.destroy', $crop) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this crop?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
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
                    <i class="fas fa-leaf"></i>
                    <h3>No Crops Found</h3>
                    <p>No crops have been added yet.</p>
                    <a href="{{ route('admin.crops.create') }}" class="btn btn-secondary" style="margin-top: 1rem;">
                        <i class="fas fa-plus"></i> Add Your First Crop
                    </a>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
