<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product Request - Supplier</title>
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

        .form-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
        }

        .form-header {
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #f0f0f0;
        }

        .form-header h2 {
            color: #333;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: #666;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #333;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-group small {
            display: block;
            margin-top: 0.5rem;
            color: #999;
            font-size: 0.85rem;
        }

        .error {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }

        .image-preview {
            margin-top: 1rem;
        }

        .preview-img {
            max-width: 200px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .preview-info {
            margin-top: 0.5rem;
            font-size: 0.85rem;
            color: #666;
        }

        .form-footer {
            display: flex;
            gap: 1rem;
            padding-top: 2rem;
            border-top: 2px solid #f0f0f0;
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.8rem 2rem;
            text-decoration: none;
            cursor: pointer;
            flex: 1;
            justify-content: center;
            font-size: 1rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        .btn-cancel {
            background: linear-gradient(135deg, #90a4ae 0%, #78909c 100%);
            color: white;
            padding: 0.8rem 2rem;
            text-decoration: none;
            flex: 1;
            justify-content: center;
            font-size: 1rem;
        }

        .btn-cancel:hover {
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

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        .alert i {
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .required-note {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 1.5rem;
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

        .product-type-info {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            border-left: 4px solid #667eea;
            margin-bottom: 1.5rem;
        }

        .product-type-info p {
            margin: 0;
            color: #555;
        }

        @media (max-width: 768px) {
            .form-footer {
                flex-direction: column;
            }

            .container {
                padding: 0 1rem;
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
        <a href="{{ route('supplier.requests.show', $productRequest->id) }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to Request
        </a>

        <div class="form-card">
            <div class="form-header">
                <h2><i class="fas fa-edit"></i> Edit Product Request</h2>
                <p>Update your product details. Changes will be visible to the admin after submission.</p>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <div>
                        <strong>Please fix the following errors:</strong>
                        <ul style="margin-top: 0.5rem; margin-left: 1.5rem;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <p class="required-note"><span style="color: #dc3545;">*</span> indicates required field</p>

            <!-- Product Type Info -->
            <div class="product-type-info">
                <p>
                    <i class="fas fa-info-circle"></i>
                    <strong>Product Type:</strong>
                    @if($productRequest->product_type === 'tools')
                        <span class="badge badge-tools">Agricultural Tools</span>
                    @elseif($productRequest->product_type === 'fertilizer')
                        <span class="badge badge-fertilizer">Fertilizer</span>
                    @else
                        <span class="badge badge-crops">Crops</span>
                    @endif
                    (Cannot be changed)
                </p>
            </div>

            <form action="{{ route('supplier.requests.update', $productRequest->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="form-group">
                    <label for="title">
                        <i class="fas fa-heading"></i> Product Title <span style="color: #dc3545;">*</span>
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title', $productRequest->title) }}" required>
                    @error('title')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    <small>E.g., Premium Garden Trowel, Nitrogen-Rich Fertilizer</small>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">
                        <i class="fas fa-file-alt"></i> Description <span style="color: #dc3545;">*</span>
                    </label>
                    <textarea id="description" name="description" required>{{ old('description', $productRequest->description) }}</textarea>
                    @error('description')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    <small>Provide detailed information about your product</small>
                </div>

                <!-- Price -->
                <div class="form-group">
                    <label for="price">
                        <i class="fas fa-dollar-sign"></i> Price (Rs) <span style="color: #dc3545;">*</span>
                    </label>
                    <input type="number" id="price" name="price" value="{{ old('price', $productRequest->price) }}" step="0.01" min="0" required>
                    @error('price')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    <small>Enter the price in Pakistani Rupees (PKR)</small>
                </div>

                <!-- Image Uploads -->
                <div class="form-group">
                    <label>
                        <i class="fas fa-image"></i> Product Images (up to 4)
                    </label>
                    <small>Supported formats: JPEG, PNG, WebP. Max size: 2MB each</small>

                    @php
                        $existingImages = array_values(array_filter([
                            $productRequest->image,
                            $productRequest->image2,
                            $productRequest->image3,
                            $productRequest->image4,
                        ]));
                    @endphp

                    @if(count($existingImages))
                        <div class="image-preview" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); gap: 0.75rem; margin-top: 0.75rem;">
                            @foreach($existingImages as $img)
                                <div style="text-align: center;">
                                    <img src="{{ asset('storage/' . $img) }}" alt="{{ $productRequest->title }}" class="preview-img" style="max-width: 120px;">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem; margin-top: 1rem;">
                        @for($i = 1; $i <= 4; $i++)
                            @php $field = $i === 1 ? 'image' : 'image'.$i; @endphp
                            <div>
                                <label for="{{ $field }}" style="font-weight: 600;">Image {{ $i }}@if($i===1) (Primary)@endif</label>
                                <input type="file" id="{{ $field }}" name="{{ $field }}" accept="image/*" onchange="previewImage({{ $i }})">
                                @error($field)
                                    <span class="error">{{ $message }}</span>
                                @enderror
                                <div id="newPreview{{ $i }}" class="image-preview" style="display: none;">
                                    <p style="color: #666; font-weight: 600; margin-bottom: 0.5rem;">New Preview:</p>
                                    <img id="previewImg{{ $i }}" src="" alt="Preview" class="preview-img">
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Buttons -->
                <div class="form-footer">
                    <button type="submit" class="btn btn-submit">
                        <i class="fas fa-save"></i> Update Request
                    </button>
                    <a href="{{ route('supplier.requests.show', $productRequest->id) }}" class="btn btn-cancel">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(num) {
            const input = document.getElementById(num === 1 ? 'image' : 'image' + num);
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('newPreview' + num);
                    const img = document.getElementById('previewImg' + num);
                    img.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>
