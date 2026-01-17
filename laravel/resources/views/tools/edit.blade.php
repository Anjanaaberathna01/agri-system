<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tool - Admin Panel</title>
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

        .current-image {
            margin-top: 0.5rem;
            padding: 1rem;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        .current-image img {
            max-width: 200px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .current-image p {
            margin: 0.5rem 0 0 0;
            font-size: 0.875rem;
            color: #6c757d;
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
            <h1><i class="fas fa-edit"></i> Edit Tool</h1>
            <p>Update tool information</p>
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

            <form action="{{ route('admin.tools.update', $tool->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">
                        Tool Name <span class="required">*</span>
                    </label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="form-control"
                        value="{{ old('title', $tool->title) }}"
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
                        value="{{ old('price', $tool->price) }}"
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
                        <option value="available" {{ old('status', $tool->status) == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="unavailable" {{ old('status', $tool->status) == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
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
                    >{{ old('description', $tool->description) }}</textarea>
                    <div class="help-text">Describe the tool's features, uses, and specifications</div>
                </div>

                <div class="form-group">
                    <label for="image">
                        Tool Image
                    </label>

                    @if($tool->image)
                        <div class="current-image">
                            <img src="{{ asset('storage/' . $tool->image) }}" alt="{{ $tool->title }}">
                            <p><i class="fas fa-info-circle"></i> Current image - upload a new one to replace it</p>
                        </div>
                    @endif

                    <div class="file-input-wrapper" style="margin-top: 1rem;">
                        <input
                            type="file"
                            id="image"
                            name="image"
                            accept="image/*"
                            onchange="previewImage(event)"
                        >
                        <label for="image" class="file-input-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Click to upload new image (JPEG, PNG, JPG, GIF - Max 2MB)</span>
                        </label>
                    </div>
                    <img id="imagePreview" class="image-preview" alt="New image preview">
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Tool
                    </button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const preview = document.getElementById('imagePreview');
            const file = event.target.files[0];
            const label = document.querySelector('.file-input-label span');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
                label.textContent = 'New image: ' + file.name;
            }
        }
    </script>
</body>
</html>
