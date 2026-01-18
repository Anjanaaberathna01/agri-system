<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Fertilizer - Admin Panel</title>
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

        .form-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
        }

        .form-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
        }

        .form-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #f0f0f0;
        }

        .form-header h1 {
            font-size: 1.8rem;
            color: #333;
            margin: 0;
        }

        .form-header i {
            color: #4CAF50;
            font-size: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            font-weight: 600;
            color: #333;
            margin-bottom: 0.6rem;
            font-size: 0.95rem;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.95rem;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .file-upload {
            position: relative;
            display: block;
        }

        .file-upload input[type="file"] {
            position: absolute;
            left: -9999px;
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            padding: 2rem;
            border: 2px dashed #4CAF50;
            border-radius: 8px;
            background: #f0f7f0;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            color: #4CAF50;
        }

        .file-upload-label:hover {
            background: #e8f5e9;
            border-color: #45a049;
        }

        .file-upload input[type="file"]:focus + .file-upload-label {
            border-color: #45a049;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
        }

        .image-preview {
            margin-top: 1rem;
            padding: 1rem;
            background: #f9f9f9;
            border-radius: 8px;
            display: none;
        }

        .image-preview.active {
            display: block;
        }

        .image-preview img {
            max-width: 200px;
            border-radius: 8px;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2.5rem;
            padding-top: 1.5rem;
            border-top: 2px solid #f0f0f0;
        }

        .btn {
            padding: 0.9rem 2rem;
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
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: white;
            flex: 1;
            justify-content: center;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(76, 175, 80, 0.4);
        }

        .btn-secondary {
            background: #f0f0f0;
            color: #333;
            flex: 1;
            justify-content: center;
        }

        .btn-secondary:hover {
            background: #e0e0e0;
        }

        .error-messages {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }

        .error-messages ul {
            margin: 0;
            padding-left: 1.5rem;
        }

        .error-messages li {
            margin-bottom: 0.3rem;
        }

        @media (max-width: 600px) {
            .form-container {
                padding: 1rem;
            }

            .form-card {
                padding: 1.5rem;
            }

            .form-header h1 {
                font-size: 1.4rem;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    @include('layouts.admin_nav')

    <div class="form-container">
        <div class="form-card">
            <div class="form-header">
                <i class="fas fa-plus-circle"></i>
                <h1>Add New Fertilizer</h1>
            </div>

            @if ($errors->any())
                <div class="error-messages">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.fertilizers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Fertilizer Name *</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Enter fertilizer name" required>
                </div>

                <div class="form-group">
                    <label for="price">Price (Rs) *</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" placeholder="Enter price" step="0.01" min="0" required>
                </div>

                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea id="description" name="description" placeholder="Enter detailed description of the fertilizer" required>{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Stock Status *</label>
                    <select id="status" name="status" required>
                        <option value="">-- Select Status --</option>
                        <option value="in_stock" {{ old('status') === 'in_stock' ? 'selected' : '' }}>In Stock</option>
                        <option value="limited" {{ old('status') === 'limited' ? 'selected' : '' }}>Limited Stock</option>
                        <option value="unavailable" {{ old('status') === 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Product Image</label>
                    <div class="file-upload">
                        <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                        <label for="image" class="file-upload-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Click to upload or drag and drop (JPG, PNG, GIF - Max 2MB)</span>
                        </label>
                    </div>
                    <div class="image-preview" id="imagePreview">
                        <img id="previewImg" src="" alt="Preview">
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Create Fertilizer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.classList.add('active');
                };
                reader.readAsDataURL(file);
            } else {
                preview.classList.remove('active');
            }
        }

        // Drag and drop
        const fileInput = document.getElementById('image');
        const fileLabel = document.querySelector('.file-upload-label');

        fileLabel.addEventListener('dragover', (e) => {
            e.preventDefault();
            fileLabel.style.background = '#e8f5e9';
        });

        fileLabel.addEventListener('dragleave', () => {
            fileLabel.style.background = '#f0f7f0';
        });

        fileLabel.addEventListener('drop', (e) => {
            e.preventDefault();
            fileLabel.style.background = '#f0f7f0';
            fileInput.files = e.dataTransfer.files;
            previewImage({ target: { files: e.dataTransfer.files } });
        });
    </script>
</body>
</html>
