<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Requests Management</title>
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
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            box-shadow: 0 8px 16px rgba(76, 175, 80, 0.3);
        }

        .page-header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .tabs {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            border-bottom: 2px solid #e0e0e0;
        }

        .tab {
            padding: 1rem 2rem;
            cursor: pointer;
            border: none;
            background: none;
            font-weight: 600;
            color: #666;
            position: relative;
            transition: all 0.3s ease;
        }

        .tab.active {
            color: #4CAF50;
        }

        .tab.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 3px;
            background: #4CAF50;
        }

        .tab-count {
            background: #e0e0e0;
            padding: 0.2rem 0.6rem;
            border-radius: 12px;
            font-size: 0.85rem;
            margin-left: 0.5rem;
        }

        .tab.active .tab-count {
            background: #4CAF50;
            color: white;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 2rem;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
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

        .product-image {
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

        .btn {
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
        }

        .btn-success {
            background: #28a745;
            color: white;
        }

        .btn-success:hover {
            background: #218838;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
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
            margin: 5% auto;
            padding: 2rem;
            border-radius: 12px;
            width: 90%;
            max-width: 500px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .modal-header h3 {
            font-size: 1.5rem;
            color: #333;
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: #000;
        }

        textarea {
            width: 100%;
            padding: 0.9rem;
            border: 1px solid #dfe3e8;
            border-radius: 10px;
            min-height: 100px;
            resize: vertical;
        }
    </style>
</head>
<body>
    @include('layouts.admin_nav')

    <div class="container">
        <div class="page-header">
            <h1><i class="fas fa-tasks"></i> Product Requests Management</h1>
            <p>Review and manage supplier product submissions</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="tabs">
            <button class="tab active" onclick="switchTab('pending')">
                <i class="fas fa-clock"></i> Pending
                <span class="tab-count">{{ $pending->count() }}</span>
            </button>
            <button class="tab" onclick="switchTab('approved')">
                <i class="fas fa-check-circle"></i> Approved
                <span class="tab-count">{{ $approved->count() }}</span>
            </button>
            <button class="tab" onclick="switchTab('rejected')">
                <i class="fas fa-times-circle"></i> Rejected
                <span class="tab-count">{{ $rejected->count() }}</span>
            </button>
        </div>

        <!-- Pending Tab -->
        <div id="pending-tab" class="tab-content active">
            <div class="card">
                <h2 style="margin-bottom: 1.5rem;"><i class="fas fa-hourglass-half"></i> Pending Requests</h2>
                @if($pending->count() > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Supplier</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Submitted</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pending as $request)
                            <tr>
                                <td>
                                    @if($request->image)
                                        <img src="{{ asset('storage/' . $request->image) }}" alt="{{ $request->title }}" class="product-image">
                                    @else
                                        <div class="product-image" style="background: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-image" style="color: #ccc;"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $request->title }}</strong>
                                    <p style="color: #666; font-size: 0.85rem; margin: 0.25rem 0 0 0;">{{ Str::limit($request->description, 50) }}</p>
                                </td>
                                <td>{{ $request->supplier->full_name }}</td>
                                <td><span class="status-badge pending">{{ ucfirst($request->product_type) }}</span></td>
                                <td><strong>Rs {{ number_format($request->price, 2) }}</strong></td>
                                <td>{{ $request->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <button onclick="approveRequest({{ $request->id }})" class="btn btn-success btn-sm">
                                            <i class="fas fa-check"></i> Approve
                                        </button>
                                        <button onclick="rejectRequest({{ $request->id }})" class="btn btn-danger btn-sm">
                                            <i class="fas fa-times"></i> Reject
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <p>No pending requests</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Approved Tab -->
        <div id="approved-tab" class="tab-content">
            <div class="card">
                <h2 style="margin-bottom: 1.5rem;"><i class="fas fa-check-circle"></i> Approved Requests</h2>
                @if($approved->count() > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Supplier</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Approved</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($approved as $request)
                            <tr>
                                <td>
                                    @if($request->image)
                                        <img src="{{ asset('storage/' . $request->image) }}" alt="{{ $request->title }}" class="product-image">
                                    @else
                                        <div class="product-image" style="background: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-image" style="color: #ccc;"></i>
                                        </div>
                                    @endif
                                </td>
                                <td><strong>{{ $request->title }}</strong></td>
                                <td>{{ $request->supplier->full_name }}</td>
                                <td><span class="status-badge approved">{{ ucfirst($request->product_type) }}</span></td>
                                <td><strong>Rs {{ number_format($request->price, 2) }}</strong></td>
                                <td>{{ $request->reviewed_at->format('M d, Y') }}</td>
                                <td>{{ $request->admin_notes ?? '—' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <p>No approved requests</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Rejected Tab -->
        <div id="rejected-tab" class="tab-content">
            <div class="card">
                <h2 style="margin-bottom: 1.5rem;"><i class="fas fa-times-circle"></i> Rejected Requests</h2>
                @if($rejected->count() > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Supplier</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Rejected</th>
                                <th>Reason</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rejected as $request)
                            <tr>
                                <td>
                                    @if($request->image)
                                        <img src="{{ asset('storage/' . $request->image) }}" alt="{{ $request->title }}" class="product-image">
                                    @else
                                        <div class="product-image" style="background: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-image" style="color: #ccc;"></i>
                                        </div>
                                    @endif
                                </td>
                                <td><strong>{{ $request->title }}</strong></td>
                                <td>{{ $request->supplier->full_name }}</td>
                                <td><span class="status-badge rejected">{{ ucfirst($request->product_type) }}</span></td>
                                <td><strong>Rs {{ number_format($request->price, 2) }}</strong></td>
                                <td>{{ $request->reviewed_at->format('M d, Y') }}</td>
                                <td>{{ $request->admin_notes }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <p>No rejected requests</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Approve Modal -->
    <div id="approveModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-check-circle"></i> Approve Request</h3>
                <span class="close" onclick="closeModal('approveModal')">&times;</span>
            </div>
            <form id="approveForm" method="POST">
                @csrf
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Admin Notes (Optional)</label>
                    <textarea name="admin_notes" placeholder="Add any notes..."></textarea>
                </div>
                <div style="display: flex; justify-content: flex-end; gap: 0.5rem;">
                    <button type="button" class="btn" onclick="closeModal('approveModal')" style="background: #e0e0e0;">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Approve</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Reject Modal -->
    <div id="rejectModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-times-circle"></i> Reject Request</h3>
                <span class="close" onclick="closeModal('rejectModal')">&times;</span>
            </div>
            <form id="rejectForm" method="POST">
                @csrf
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Reason for Rejection *</label>
                    <textarea name="admin_notes" placeholder="Explain why this request is being rejected..." required></textarea>
                </div>
                <div style="display: flex; justify-content: flex-end; gap: 0.5rem;">
                    <button type="button" class="btn" onclick="closeModal('rejectModal')" style="background: #e0e0e0;">Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Reject</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function switchTab(tab) {
            // Hide all tabs
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });
            document.querySelectorAll('.tab').forEach(btn => {
                btn.classList.remove('active');
            });

            // Show selected tab
            document.getElementById(tab + '-tab').classList.add('active');
            event.target.classList.add('active');
        }

        function approveRequest(id) {
            document.getElementById('approveForm').action = `/admin/product-requests/${id}/approve`;
            document.getElementById('approveModal').style.display = 'block';
        }

        function rejectRequest(id) {
            document.getElementById('rejectForm').action = `/admin/product-requests/${id}/reject`;
            document.getElementById('rejectModal').style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        }
    </script>
</body>
</html>
