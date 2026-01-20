<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Crop - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Poppins',sans-serif; }
        body { background:#f5f7fa; padding:2rem; }
        .container { max-width:900px; margin:0 auto; }
        .header { background:linear-gradient(135deg,#6ba545 0%,#4a7c2c 100%); color:#fff; padding:2rem; border-radius:12px; margin-bottom:1.5rem; }
        .header h1 { font-size:2rem; margin-bottom:0.4rem; }
        .card { background:#fff; padding:2rem; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.08); }
        .form-group { margin-bottom:1.25rem; }
        label { display:block; margin-bottom:0.4rem; font-weight:600; color:#333; }
        .required { color:#dc3545; }
        input, textarea, select { width:100%; padding:0.75rem; border:2px solid #e9ecef; border-radius:8px; font-size:1rem; }
        input:focus, textarea:focus, select:focus { outline:none; border-color:#6ba545; }
        textarea { resize:vertical; min-height:120px; }
        .help { font-size:0.85rem; color:#6c757d; margin-top:0.25rem; }
        .actions { display:flex; gap:1rem; flex-wrap:wrap; margin-top:1.5rem; }
        .btn { padding:0.8rem 1.4rem; border:none; border-radius:8px; font-weight:600; cursor:pointer; text-decoration:none; display:inline-flex; align-items:center; gap:0.5rem; }
        .btn-primary { background:linear-gradient(135deg,#6ba545 0%,#4a7c2c 100%); color:#fff; }
        .btn-secondary { background:#6c757d; color:#fff; }
        .error-box { background:#f8d7da; color:#721c24; padding:1rem; border-radius:8px; margin-bottom:1.25rem; border:1px solid #f5c6cb; }
        .error-box ul { margin:0; padding-left:1.25rem; }
    </style>
</head>
<body>
    @include('layouts.admin_nav')
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-leaf"></i> Add New Crop</h1>
            <p style="opacity:0.9;">Create a crop entry for the catalog</p>
        </div>

        <div class="card">
            @if($errors->any())
                <div class="error-box">
                    <strong>Please fix the following:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.crops.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name <span class="required">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="e.g., Sunflower">
                </div>

                <div class="form-group">
                    <label for="type">Type <span class="required">*</span></label>
                    <input type="text" id="type" name="type" value="{{ old('type') }}" required placeholder="e.g., Oilseed, Pulse">
                </div>

                <div class="form-group">
                    <label for="price">Price (Rs) <span class="required">*</span></label>
                    <input type="number" step="0.01" min="0" id="price" name="price" value="{{ old('price') }}" required>
                </div>

                <div class="form-group" style="display:flex; gap:1rem; flex-wrap:wrap;">
                    <div style="flex:1; min-width:200px;">
                        <label for="rating">Rating (1-5)</label>
                        <input type="number" id="rating" name="rating" min="1" max="5" value="{{ old('rating', 5) }}">
                    </div>
                    <div style="flex:1; min-width:200px;">
                        <label for="reviews">Reviews Count</label>
                        <input type="number" id="reviews" name="reviews" min="0" value="{{ old('reviews', 0) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="status">Status <span class="required">*</span></label>
                    <select id="status" name="status" required>
                        <option value="in_stock" {{ old('status') === 'in_stock' ? 'selected' : '' }}>In Stock</option>
                        <option value="limited" {{ old('status') === 'limited' ? 'selected' : '' }}>Limited</option>
                        <option value="unavailable" {{ old('status') === 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description <span class="required">*</span></label>
                    <textarea id="description" name="description" required placeholder="Add key growing details, benefits, and usage">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Crop Images <span style="color: #999; font-weight: 400;">(Up to 4 images)</span></label>
                    <div style="color: #666; font-size: 0.9rem; margin-bottom: 1rem;">Upload up to 4 crop images to showcase from different angles</div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <!-- Image 1 -->
                        <div>
                            <label style="font-size: 0.9rem; margin-bottom: 0.4rem; font-weight: 500;">Image 1 (Primary)</label>
                            <input type="file" id="image1" name="image" accept="image/*" onchange="previewCropImage(1)" style="padding: 0.5rem; border: 2px dashed #dee2e6; border-radius: 8px; width: 100%;">
                            <div id="cropPreview1" style="margin-top: 0.5rem; text-align: center;"></div>
                        </div>

                        <!-- Image 2 -->
                        <div>
                            <label style="font-size: 0.9rem; margin-bottom: 0.4rem; font-weight: 500;">Image 2</label>
                            <input type="file" id="image2" name="image2" accept="image/*" onchange="previewCropImage(2)" style="padding: 0.5rem; border: 2px dashed #dee2e6; border-radius: 8px; width: 100%;">
                            <div id="cropPreview2" style="margin-top: 0.5rem; text-align: center;"></div>
                        </div>

                        <!-- Image 3 -->
                        <div>
                            <label style="font-size: 0.9rem; margin-bottom: 0.4rem; font-weight: 500;">Image 3</label>
                            <input type="file" id="image3" name="image3" accept="image/*" onchange="previewCropImage(3)" style="padding: 0.5rem; border: 2px dashed #dee2e6; border-radius: 8px; width: 100%;">
                            <div id="cropPreview3" style="margin-top: 0.5rem; text-align: center;"></div>
                        </div>

                        <!-- Image 4 -->
                        <div>
                            <label style="font-size: 0.9rem; margin-bottom: 0.4rem; font-weight: 500;">Image 4</label>
                            <input type="file" id="image4" name="image4" accept="image/*" onchange="previewCropImage(4)" style="padding: 0.5rem; border: 2px dashed #dee2e6; border-radius: 8px; width: 100%;">
                            <div id="cropPreview4" style="margin-top: 0.5rem; text-align: center;"></div>
                        </div>
                    </div>
                </div>

                <div class="actions">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Crop</button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
            </form>

            <script>
                function previewCropImage(imageNum) {
                    const input = document.getElementById(`image${imageNum}`);
                    const preview = document.getElementById(`cropPreview${imageNum}`);

                    if (input.files && input.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            preview.innerHTML = `<img src="${e.target.result}" style="max-width: 100%; height: auto; border-radius: 8px; max-height: 150px;">`;
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
        </div>
    </div>
</body>
</html>
