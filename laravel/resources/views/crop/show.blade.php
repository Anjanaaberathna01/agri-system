<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $crop->name }} - SpasilaLahanPetani</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background-color: #f8f9fa; }
        .container { max-width: 1200px; margin: 0 auto; padding: 2rem; }
        .breadcrumb { margin-bottom: 2rem; display: flex; gap: 0.5rem; align-items: center; color: #666; }
        .breadcrumb a { color: #4CAF50; text-decoration: none; font-weight: 500; }
        .breadcrumb a:hover { text-decoration: underline; }
        .breadcrumb span { color: #999; }

        .product-section { background: white; border-radius: 12px; padding: 2rem; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); margin-bottom: 2rem; }
        .product-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: start; }

        .product-image { position: relative; width: 100%; height: 400px; background: linear-gradient(135deg, #66bb6a 0%, #4CAF50 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; overflow: hidden; }
        .product-image img { width: 100%; height: 100%; object-fit: cover; }
        .product-image-nav { position: absolute; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 50%; border: none; background: rgba(0, 0, 0, 0.35); color: #fff; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.2s ease; z-index: 2; }
        .product-image-nav:hover { background: rgba(0, 0, 0, 0.55); }
        .product-image-nav.left { left: 12px; }
        .product-image-nav.right { right: 12px; }

        .product-details h1 { font-size: 2rem; color: #333; margin-bottom: 1rem; font-weight: 700; }
        .price { font-size: 2rem; color: #2e7d32; font-weight: 700; margin-bottom: 1rem; }
        .status-badge { display: inline-block; padding: 0.5rem 1rem; border-radius: 20px; font-weight: 600; margin-bottom: 1.5rem; font-size: 0.9rem; }
        .status-badge.in_stock { background: #d4f4d8; color: #0d5a0d; }
        .status-badge.limited { background: #fff3cd; color: #664d00; }
        .status-badge.unavailable { background: #f8d7da; color: #721c24; }

        .description { color: #555; line-height: 1.8; margin-bottom: 2rem; font-size: 1rem; }
        .product-meta { display: flex; gap: 2rem; margin-bottom: 2rem; flex-wrap: wrap; }
        .meta-item { display: flex; flex-direction: column; }
        .meta-item label { font-size: 0.85rem; color: #999; margin-bottom: 0.3rem; font-weight: 600; }
        .meta-item value { font-size: 1.1rem; color: #333; font-weight: 500; }

        .action-buttons { display: flex; gap: 1rem; margin-bottom: 2rem; flex-wrap: wrap; }
        .quantity-selector { display: flex; align-items: center; gap: 0; border: 2px solid #4CAF50; border-radius: 8px; overflow: hidden; }
        .qty-btn { width: 40px; height: 40px; border: none; background: #f0f0f0; cursor: pointer; font-weight: 600; color: #333; transition: all 0.3s ease; }
        .qty-btn:hover { background: #4CAF50; color: white; }
        .qty-input { width: 60px; border: none; text-align: center; font-size: 1rem; font-weight: 600; background: white; }
        .qty-input:focus { outline: none; }

        .btn { padding: 0.75rem 2rem; border: none; border-radius: 8px; font-size: 1rem; font-weight: 600; cursor: pointer; transition: all 0.3s ease; text-decoration: none; display: inline-flex; align-items: center; gap: 0.8rem; }
        .btn-primary { background: linear-gradient(135deg, #66bb6a 0%, #4CAF50 100%); color: white; box-shadow: 0 4px 12px rgba(102, 187, 106, 0.3); flex: 1; justify-content: center; min-width: 200px; }
        .btn-primary:hover { box-shadow: 0 6px 16px rgba(102, 187, 106, 0.4); transform: translateY(-2px); }
        .btn-outline { background: white; color: #2e7d32; border: 2px solid #4CAF50; flex: 1; justify-content: center; min-width: 200px; }
        .btn-outline:hover { background: #f0f0f0; }

        .related-products { margin-top: 3rem; }
        .related-products h2 { font-size: 1.75rem; color: #333; margin-bottom: 1.5rem; font-weight: 700; }
        .products-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; }
        .product-card { background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); transition: all 0.3s ease; cursor: pointer; text-decoration: none; color: inherit; }
        .product-card:hover { box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15); transform: translateY(-5px); }
        .product-card-image { width: 100%; height: 200px; background: linear-gradient(135deg, #66bb6a 0%, #4CAF50 100%); display: flex; align-items: center; justify-content: center; overflow: hidden; }
        .product-card-image img { width: 100%; height: 100%; object-fit: cover; }
        .product-card-body { padding: 1.5rem; }
        .product-card-title { font-size: 1rem; font-weight: 600; color: #333; margin-bottom: 0.5rem; }
        .product-card-price { font-size: 1.25rem; color: #2e7d32; font-weight: 700; }

        @media (max-width: 768px) {
            .product-grid { grid-template-columns: 1fr; gap: 1.5rem; }
            .product-details h1 { font-size: 1.5rem; }
            .price { font-size: 1.5rem; }
            .product-image { height: 300px; }
            .action-buttons { flex-direction: column; }
            .btn { width: 100%; }
            .quantity-selector { width: 100%; }
            .container { padding: 1rem; }
        }
        @media (max-width: 480px) {
            .product-section { padding: 1rem; }
            .product-details h1 { font-size: 1.25rem; }
            .price { font-size: 1.5rem; }
            .product-image { height: 250px; }
            .product-meta { flex-direction: column; gap: 1rem; }
            .breadcrumb { font-size: 0.85rem; }
        }
    </style>
</head>
<body>
    @include('layouts.nav')

    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>></span>
            <a href="{{ route('crops.index') }}">Crops</a>
            <span>></span>
            <span>{{ $crop->name }}</span>
        </div>

        <div class="product-section">
            <div class="product-grid">
                @php
                    $galleryFolder = $crop->image_folder ?: $crop->name;
                    $galleryFiles = [];
                    foreach (['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'] as $ext) {
                        $matches = glob(public_path('images/crop/' . $galleryFolder . '/*.' . $ext)) ?: [];
                        $galleryFiles = array_merge($galleryFiles, $matches);
                    }
                    $galleryUrls = array_map(function ($file) use ($galleryFolder) {
                        return asset('images/crop/' . rawurlencode($galleryFolder) . '/' . rawurlencode(basename($file)));
                    }, $galleryFiles);

                    $primaryImage = $galleryUrls[0] ?? null;
                    if (!$primaryImage && $crop->image_folder) {
                        if (str_contains($crop->image_folder, 'images/')) {
                            $primaryImage = asset($crop->image_folder);
                        } elseif (file_exists(storage_path('app/public/' . $crop->image_folder))) {
                            $primaryImage = asset('storage/' . $crop->image_folder);
                        }
                    }

                    $status = str_replace('-', '_', $crop->status);
                    $relatedCrops = \App\Models\Crop::where('id', '!=', $crop->id)->latest()->get();
                @endphp

                <div class="product-image">
                    @if(count($galleryUrls) > 1)
                        <button type="button" class="product-image-nav left" onclick="changeCropImage('detail-image', -1)">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                    @endif

                    @if($primaryImage)
                        <img
                            id="detail-image"
                            data-gallery="true"
                            data-images='@json($galleryUrls)'
                            data-index="0"
                            src="{{ $primaryImage }}"
                            alt="{{ $crop->name }}"
                        >
                    @else
                        <i class="fas fa-image" style="font-size: 4rem;"></i>
                    @endif

                    @if(count($galleryUrls) > 1)
                        <button type="button" class="product-image-nav right" onclick="changeCropImage('detail-image', 1)">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    @endif
                </div>

                <div class="product-details">
                    <h1>{{ $crop->name }}</h1>
                    <div class="price">Rs {{ number_format($crop->price, 2) }}</div>
                    <span class="status-badge {{ $status }}">
                        @if($status === 'in_stock')
                            <i class="fas fa-check-circle"></i> In Stock
                        @elseif($status === 'limited')
                            <i class="fas fa-exclamation-circle"></i> Limited Stock
                        @else
                            <i class="fas fa-times-circle"></i> Out of Stock
                        @endif
                    </span>

                    <p class="description">{{ $crop->description }}</p>

                    <div class="product-meta">
                        <div class="meta-item">
                            <label>Crop ID</label>
                            <value>#{{ str_pad($crop->id, 5, '0', STR_PAD_LEFT) }}</value>
                        </div>
                        <div class="meta-item">
                            <label>Status</label>
                            <value>{{ ucfirst(str_replace('_', ' ', $status)) }}</value>
                        </div>
                    </div>

                    <div class="action-buttons">
                        @if($status !== 'unavailable')
                        <form action="{{ route('cart.add') }}" method="POST" style="flex: 1; display: flex; gap: 1rem;">
                            @csrf
                            <div class="quantity-selector">
                                <button type="button" class="qty-btn" onclick="decreaseQty()">−</button>
                                <input type="number" id="quantity" name="quantity" value="1" min="1" class="qty-input">
                                <button type="button" class="qty-btn" onclick="increaseQty()">+</button>
                            </div>
                            <input type="hidden" name="crop_id" value="{{ $crop->id }}">
                            <input type="hidden" name="price" value="{{ $crop->price }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                        </form>
                        @else
                        <button class="btn btn-primary" disabled style="background: #ccc;">
                            <i class="fas fa-ban"></i> Out of Stock
                        </button>
                        @endif
                        <button class="btn btn-outline">
                            <i class="fas fa-heart"></i> Wishlist
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @if($relatedCrops->count() > 0)
        <div class="related-products">
            <h2>Related Crops</h2>
            <div class="products-grid">
                @foreach($relatedCrops as $relatedCrop)
                <a href="{{ route('crops.show', $relatedCrop->id) }}" class="product-card">
                    <div class="product-card-image">
                        @php
                            $relatedImage = null;
                            $relatedFolder = $relatedCrop->image_folder ?: $relatedCrop->name;

                            $relatedGalleryFiles = [];
                            foreach (['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'] as $ext) {
                                $matches = glob(public_path('images/crop/' . $relatedFolder . '/*.' . $ext)) ?: [];
                                $relatedGalleryFiles = array_merge($relatedGalleryFiles, $matches);
                            }

                            if (count($relatedGalleryFiles) > 0) {
                                $relatedImage = asset('images/crop/' . rawurlencode($relatedFolder) . '/' . rawurlencode(basename($relatedGalleryFiles[0])));
                            } elseif ($relatedCrop->image_folder) {
                                if (str_contains($relatedCrop->image_folder, 'images/')) {
                                    $relatedImage = asset($relatedCrop->image_folder);
                                } elseif (file_exists(storage_path('app/public/' . $relatedCrop->image_folder))) {
                                    $relatedImage = asset('storage/' . $relatedCrop->image_folder);
                                }
                            }
                        @endphp
                        @if($relatedImage)
                            <img src="{{ $relatedImage }}" alt="{{ $relatedCrop->name }}">
                        @else
                            <i class="fas fa-image"></i>
                        @endif
                    </div>
                    <div class="product-card-body">
                        <div class="product-card-title">{{ $relatedCrop->name }}</div>
                        <div class="product-card-price">Rs {{ number_format($relatedCrop->price, 2) }}</div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    <script>
        function increaseQty() {
            const input = document.getElementById('quantity');
            input.value = parseInt(input.value || '1', 10) + 1;
        }

        function decreaseQty() {
            const input = document.getElementById('quantity');
            const current = parseInt(input.value || '1', 10);
            if (current > 1) {
                input.value = current - 1;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            initCropGalleries();
        });

        function initCropGalleries() {
            document.querySelectorAll('[data-gallery="true"]').forEach(img => {
                try {
                    img._images = JSON.parse(img.dataset.images || '[]');
                } catch (e) {
                    img._images = [];
                }

                if (img._images.length > 0) {
                    img.dataset.index = 0;
                    img.src = img._images[0];
                }
            });
        }

        function changeCropImage(imageId, delta) {
            const img = document.getElementById(imageId);
            if (!img) return;

            if (!img._images) {
                try {
                    img._images = JSON.parse(img.dataset.images || '[]');
                } catch (e) {
                    img._images = [];
                }
            }

            const images = img._images;
            if (!images || images.length === 0) return;

            const currentIndex = parseInt(img.dataset.index || '0', 10);
            const nextIndex = (currentIndex + delta + images.length) % images.length;
            img.dataset.index = nextIndex;
            img.src = images[nextIndex];
        }
    </script>
</body>
</html>
