<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Request</title>
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
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar h1 {
            font-size: 1.5rem;
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 2rem;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        }

        h2 {
            font-size: 1.75rem;
            color: #333;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .subtitle {
            color: #666;
            margin-bottom: 1.5rem;
        }

        .info-badge {
            background: #e3f2fd;
            color: #1565c0;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            color: #555;
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        input, textarea {
            width: 100%;
            padding: 0.9rem 1rem;
            border: 1px solid #dfe3e8;
            border-radius: 10px;
            background: #fdfdfd;
            font-size: 0.95rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.12);
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
        }

        .file-input-label {
            background: #f8f9fa;
            border: 2px dashed #dee2e6;
            padding: 2rem;
            text-align: center;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-input-label:hover {
            border-color: #667eea;
            background: #f0f4ff;
        }

        .file-input-label i {
            font-size: 2rem;
            color: #667eea;
            margin-bottom: 0.5rem;
        }

        .error-text {
            color: #dc2626;
            font-size: 0.85rem;
            margin-top: 0.3rem;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 0.75rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.9rem 1.6rem;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            box-shadow: 0 8px 18px rgba(102, 126, 234, 0.25);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(102, 126, 234, 0.35);
        }

        .btn-secondary {
            background: #eceff1;
            color: #455a64;
        }

        .btn-secondary:hover {
            background: #dfe3e8;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1><i class="fas fa-plus-circle"></i> Submit Product Request</h1>
    </nav>

    <div class="container">
        <div class="card">
            <h2><i class="fas fa-box"></i> Add New Product</h2>
            <p class="subtitle">Submit a product for admin approval</p>

            <div class="info-badge">
                <i class="fas fa-info-circle" style="font-size: 1.5rem;"></i>
                <div>
                    <strong>Product Type: {{ ucfirst($supplier->product_type) }}</strong>
                    <p style="margin: 0; font-size: 0.9rem;">You can only add products in your category</p>
                </div>
            </div>

            @if($errors->any())
                <div style="background:#fee2e2; color:#991b1b; padding:1rem; border-radius:10px; margin-bottom:1.5rem;">
                    <strong>Error!</strong> Please fix the following:
                    <ul style="margin:0.5rem 0 0 1.25rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('supplier.requests.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Product Name *</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Enter product name" required>
                    @error('title')
                        <span class="error-text"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea name="description" id="description" placeholder="Describe the product features, benefits, and specifications" required>{{ old('description') }}</textarea>
                    @error('description')
                        <span class="error-text"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Price (Rs) *</label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}" placeholder="0.00" step="0.01" min="0" required>
                    @error('price')
                        <span class="error-text"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label><strong>Product Images</strong> <span style="color: #999;">(Up to 4 images)</span></label>
                    <p style="color: #666; font-size: 0.9rem; margin-bottom: 1rem;">Upload up to 4 product images to showcase your product from different angles</p>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                        <!-- Image 1 -->
                        <div>
                            <label style="font-size: 0.9rem; margin-bottom: 0.4rem;">Image 1 (Primary) *</label>
                            <div class="file-input-wrapper">
                                <div class="file-input-label" id="fileLabel1">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p style="margin: 0; font-weight: 600; font-size: 0.9rem;">Click to upload</p>
                                </div>
                                <input type="file" name="image" id="image1" accept="image/*" onchange="updateFileName(1)">
                            </div>
                            <div id="preview1" style="margin-top: 0.5rem; text-align: center;"></div>
                            @error('image')
                                <span class="error-text"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Image 2 -->
                        <div>
                            <label style="font-size: 0.9rem; margin-bottom: 0.4rem;">Image 2</label>
                            <div class="file-input-wrapper">
                                <div class="file-input-label" id="fileLabel2">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p style="margin: 0; font-weight: 600; font-size: 0.9rem;">Click to upload</p>
                                </div>
                                <input type="file" name="image2" id="image2" accept="image/*" onchange="updateFileName(2)">
                            </div>
                            <div id="preview2" style="margin-top: 0.5rem; text-align: center;"></div>
                            @error('image2')
                                <span class="error-text"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Image 3 -->
                        <div>
                            <label style="font-size: 0.9rem; margin-bottom: 0.4rem;">Image 3</label>
                            <div class="file-input-wrapper">
                                <div class="file-input-label" id="fileLabel3">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p style="margin: 0; font-weight: 600; font-size: 0.9rem;">Click to upload</p>
                                </div>
                                <input type="file" name="image3" id="image3" accept="image/*" onchange="updateFileName(3)">
                            </div>
                            <div id="preview3" style="margin-top: 0.5rem; text-align: center;"></div>
                            @error('image3')
                                <span class="error-text"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Image 4 -->
                        <div>
                            <label style="font-size: 0.9rem; margin-bottom: 0.4rem;">Image 4</label>
                            <div class="file-input-wrapper">
                                <div class="file-input-label" id="fileLabel4">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p style="margin: 0; font-weight: 600; font-size: 0.9rem;">Click to upload</p>
                                </div>
                                <input type="file" name="image4" id="image4" accept="image/*" onchange="updateFileName(4)">
                            </div>
                            <div id="preview4" style="margin-top: 0.5rem; text-align: center;"></div>
                            @error('image4')
                                <span class="error-text"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="actions">
                    <a href="{{ route('supplier.requests.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Submit Request
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function updateFileName(imageNum) {
            const input = document.getElementById(`image${imageNum}`);
            const label = document.getElementById(`fileLabel${imageNum}`);
            const preview = document.getElementById(`preview${imageNum}`);

            if (input.files && input.files[0]) {
                const fileName = input.files[0].name;
                const fileSize = (input.files[0].size / 1024 / 1024).toFixed(2);

                label.innerHTML = `
                    <i class="fas fa-check-circle" style="color: #28a745;"></i>
                    <p style="margin: 0; font-weight: 600; color: #28a745; font-size: 0.9rem;">Selected</p>
                    <p style="margin: 0.25rem 0 0 0; font-size: 0.8rem; color: #6c757d;">${fileName}</p>
                `;

                // Show image preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" style="max-width: 100%; height: auto; border-radius: 8px; max-height: 150px;">`;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
