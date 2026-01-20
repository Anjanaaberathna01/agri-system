<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Tool - Admin Panel</title>
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
            padding: 2rem;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .header p {
            opacity: 0.9;
        }

        .form-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #333;
        }

        .form-group label .required {
            color: #dc3545;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: #FA891A;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        select.form-control {
            cursor: pointer;
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-wrapper input[type=file] {
            position: absolute;
            left: -9999px;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            background-color: #f8f9fa;
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-input-label:hover {
            border-color: #FA891A;
            background-color: #fff5ec;
        }

        .file-input-label i {
            margin-right: 0.5rem;
            color: #FA891A;
        }

        .image-preview {
            margin-top: 1rem;
            max-width: 200px;
            border-radius: 8px;
            display: none;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border: 1px solid #f5c6cb;
        }

        .error-message ul {
            margin: 0;
            padding-left: 1.5rem;
        }

        .button-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: #FA891A;
            color: white;
            flex: 1;
        }

        .btn-primary:hover {
            background: #FF9013;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(250, 137, 26, 0.3);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        .help-text {
            font-size: 0.875rem;
            color: #6c757d;
            margin-top: 0.25rem;
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }

            .header h1 {
                font-size: 1.5rem;
            }

            .form-card {
                padding: 1.5rem;
            }

            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-plus-circle"></i> Create New Tool</h1>
            <p>Add a new agricultural tool to your inventory</p>
        </div>

        <div class="form-card">
            @if ($errors->any())
                <div class="error-message">
                    <strong>Please fix the following errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.tools.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">
                        Tool Name <span class="required">*</span>
                    </label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="form-control"
                        value="{{ old('title') }}"
                        required
                        placeholder="e.g., Garden Rake, Lawn Mower"
                    >
                </div>

                <div class="form-group">
                    <label for="price">
                        Price ($) <span class="required">*</span>
                    </label>
                    <input
                        type="number"
                        id="price"
                        name="price"
                        class="form-control"
                        value="{{ old('price') }}"
                        step="0.01"
                        min="0"
                        required
                        placeholder="0.00"
                    >
                </div>

                <div class="form-group">
                    <label for="status">
                        Status <span class="required">*</span>
                    </label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="in_stock" {{ old('status') == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                        <option value="limited" {{ old('status') == 'limited' ? 'selected' : '' }}>Limited Stock</option>
                        <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">
                        Description <span class="required">*</span>
                    </label>
                    <textarea
                        id="description"
                        name="description"
                        class="form-control"
                        required
                        placeholder="Provide a detailed description of the tool..."
                    >{{ old('description') }}</textarea>
                    <div class="help-text">Describe the tool's features, uses, and specifications</div>
                </div>

                <div class="form-group">
                    <label>
                        Tool Images <span class="required">(Up to 4 images)</span>
                    </label>
                    <p style="color: #666; font-size: 0.9rem; margin-bottom: 1rem; font-weight: normal;">Upload up to 4 product images to showcase your tool from different angles</p>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                        <!-- Image 1 -->
                        <div>
                            <label style="font-size: 0.9rem; margin-bottom: 0.4rem; font-weight: 500;">Image 1 (Primary) <span class="required">*</span></label>
                            <div class="file-input-wrapper">
                                <input type="file" id="image1" name="image" accept="image/*" onchange="previewImage(1)">
                                <label for="image1" class="file-input-label" id="imageLabel1">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span style="font-size: 0.9rem;">Click to upload</span>
                                </label>
                            </div>
                            <div id="preview1" style="margin-top: 0.5rem; text-align: center;"></div>
                        </div>

                        <!-- Image 2 -->
                        <div>
                            <label style="font-size: 0.9rem; margin-bottom: 0.4rem; font-weight: 500;">Image 2</label>
                            <div class="file-input-wrapper">
                                <input type="file" id="image2" name="image2" accept="image/*" onchange="previewImage(2)">
                                <label for="image2" class="file-input-label" id="imageLabel2">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span style="font-size: 0.9rem;">Click to upload</span>
                                </label>
                            </div>
                            <div id="preview2" style="margin-top: 0.5rem; text-align: center;"></div>
                        </div>

                        <!-- Image 3 -->
                        <div>
                            <label style="font-size: 0.9rem; margin-bottom: 0.4rem; font-weight: 500;">Image 3</label>
                            <div class="file-input-wrapper">
                                <input type="file" id="image3" name="image3" accept="image/*" onchange="previewImage(3)">
                                <label for="image3" class="file-input-label" id="imageLabel3">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span style="font-size: 0.9rem;">Click to upload</span>
                                </label>
                            </div>
                            <div id="preview3" style="margin-top: 0.5rem; text-align: center;"></div>
                        </div>

                        <!-- Image 4 -->
                        <div>
                            <label style="font-size: 0.9rem; margin-bottom: 0.4rem; font-weight: 500;">Image 4</label>
                            <div class="file-input-wrapper">
                                <input type="file" id="image4" name="image4" accept="image/*" onchange="previewImage(4)">
                                <label for="image4" class="file-input-label" id="imageLabel4">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span style="font-size: 0.9rem;">Click to upload</span>
                                </label>
                            </div>
                            <div id="preview4" style="margin-top: 0.5rem; text-align: center;"></div>
                        </div>
                    </div>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Create Tool
                    </button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(imageNum) {
            const input = document.getElementById(`image${imageNum}`);
            const preview = document.getElementById(`preview${imageNum}`);
            const label = document.getElementById(`imageLabel${imageNum}`);

            if (input.files && input.files[0]) {
                const file = input.files[0];
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" style="max-width: 100%; height: auto; border-radius: 8px; max-height: 150px;">`;
                    label.innerHTML = `
                        <i class="fas fa-check-circle" style="color: #28a745;"></i>
                        <span style="font-size: 0.9rem; color: #28a745; font-weight: 600;">Selected</span>
                    `;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>
