<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $tool->title }} - SpasilaLahanPetani</title>
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
            background-color: #f8f9fa;
        }

        .container {
            max-inline-size: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .breadcrumb {
            margin-block-end: 2rem;
            display: flex;
            gap: 0.5rem;
            align-items: center;
            color: #666;
        }

        .breadcrumb a {
            color: #FF9013;
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .breadcrumb span {
            color: #999;
        }

        .product-section {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-block-end: 2rem;
        }

        .product-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: start;
        }

        .product-image {
            position: relative;
            inline-size: 100%;
            block-size: 400px;
            background: linear-gradient(135deg, #ee9944 0%, #FF9013 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-image img {
            inline-size: 100%;
            block-size: 100%;
            object-fit: cover;
        }

        .product-image-nav {
            position: absolute;
            inset-block-start: 50%;
            transform: translateY(-50%);
            inline-size: 42px;
            block-size: 42px;
            border-radius: 50%;
            border: none;
            background: rgba(0, 0, 0, 0.35);
            color: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            z-index: 2;
        }

        .product-image-nav:hover {
            background: rgba(0, 0, 0, 0.55);
        }

        .product-image-nav.left {
            inset-inline-start: 12px;
        }

        .product-image-nav.right {
            inset-inline-end: 12px;
        }

        .product-details h1 {
            font-size: 2rem;
            color: #333;
            margin-block-end: 1rem;
            font-weight: 700;
        }

        .price {
            font-size: 2rem;
            color: #F25912;
            font-weight: 700;
            margin-block-end: 1rem;
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            margin-block-end: 1.5rem;
            font-size: 0.9rem;
        }

        .status-badge.in_stock {
            background: #d4f4d8;
            color: #0d5a0d;
        }

        .status-badge.limited {
            background: #fff3cd;
            color: #664d00;
        }

        .status-badge.unavailable {
            background: #f8d7da;
            color: #721c24;
        }

        .description {
            color: #555;
            line-height: 1.8;
            margin-block-end: 2rem;
            font-size: 1rem;
        }

        .product-meta {
            display: flex;
            gap: 2rem;
            margin-block-end: 2rem;
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            flex-direction: column;
        }

        .meta-item label {
            font-size: 0.85rem;
            color: #999;
            margin-block-end: 0.3rem;
            font-weight: 600;
        }

        .meta-item value {
            font-size: 1.1rem;
            color: #333;
            font-weight: 500;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-block-end: 2rem;
            flex-wrap: wrap;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 0;
            border: 2px solid #FF9013;
            border-radius: 8px;
            overflow: hidden;
        }

        .qty-btn {
            inline-size: 40px;
            block-size: 40px;
            border: none;
            background: #f0f0f0;
            cursor: pointer;
            font-weight: 600;
            color: #333;
            transition: all 0.3s ease;
        }

        .qty-btn:hover {
            background: #FF9013;
            color: white;
        }

        .qty-input {
            inline-size: 60px;
            border: none;
            text-align: center;
            font-size: 1rem;
            font-weight: 600;
            background: white;
        }

        .qty-input:focus {
            outline: none;
        }

        .btn {
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #ee9944 0%, #FF9013 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(238, 153, 68, 0.3);
            flex: 1;
            justify-content: center;
            min-inline-size: 200px;
        }

        .btn-primary:hover {
            box-shadow: 0 6px 16px rgba(238, 153, 68, 0.4);
            transform: translateY(-2px);
        }

        .btn-outline {
            background: white;
            color: #F25912;
            border: 2px solid #F87B1B;
            flex: 1;
            justify-content: center;
            min-inline-size: 200px;
        }

        .btn-outline:hover {
            background: #f0f0ff;
        }

        .related-products {
            margin-block-start: 3rem;
        }

        .related-products h2 {
            font-size: 1.75rem;
            color: #333;
            margin-block-end: 1.5rem;
            font-weight: 700;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .product-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }

        .product-card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }

        .product-card-image {
            inline-size: 100%;
            block-size: 200px;
            background: linear-gradient(135deg, #ee9944 0%, #FF9013 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-card-image img {
            inline-size: 100%;
            block-size: 100%;
            object-fit: cover;
        }

        .product-card-body {
            padding: 1.5rem;
        }

        .product-card-title {
            font-size: 1rem;
            font-weight: 600;
            color: #333;
            margin-block-end: 0.5rem;
        }

        .product-card-price {
            font-size: 1.25rem;
            color: #F25912;
            font-weight: 700;
        }

        @media (max-inline-size: 768px) {
            .product-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .product-details h1 {
                font-size: 1.5rem;
            }

            .price {
                font-size: 1.5rem;
            }

            .product-image {
                block-size: 300px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                inline-size: 100%;
            }

            .quantity-selector {
                inline-size: 100%;
            }

            .container {
                padding: 1rem;
            }
        }

        @media (max-inline-size: 480px) {
            .product-section {
                padding: 1rem;
            }

            .product-details h1 {
                font-size: 1.25rem;
            }

            .price {
                font-size: 1.5rem;
            }

            .product-image {
                block-size: 250px;
            }

            .product-meta {
                flex-direction: column;
                gap: 1rem;
            }

            .breadcrumb {
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>
    @include('layouts.nav')

    <div class="container">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>></span>
            <a href="{{ route('home') }}#tools-section">Tools</a>
            <span>></span>
            <span>{{ $tool->title }}</span>
        </div>

        <!-- Product Section -->
        <div class="product-section">
            <div class="product-grid">
                <!-- Product Image -->
                @php
                    $galleryFolder = $tool->title;
                    $galleryFiles = [];
                    foreach (['jpg', 'jpeg', 'png', 'gif'] as $ext) {
                        $matches = glob(public_path('images/tools/' . $galleryFolder . '/*.' . $ext)) ?: [];
                        $galleryFiles = array_merge($galleryFiles, $matches);
                    }
                    $galleryUrls = array_map(function ($file) use ($galleryFolder) {
                        return asset('images/tools/' . rawurlencode($galleryFolder) . '/' . rawurlencode(basename($file)));
                    }, $galleryFiles);

                    $primaryImage = $galleryUrls[0] ?? null;
                    if (!$primaryImage && $tool->image) {
                        $primaryImage = strpos($tool->image, 'images/tools') !== false
                            ? asset($tool->image)
                            : asset('storage/' . $tool->image);
                    }
                @endphp

                <div class="product-image">
                    @if(count($galleryUrls) > 1)
                        <button type="button" class="product-image-nav left" onclick="changeToolImage('detail-image', -1)">
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
                            alt="{{ $tool->title }}"
                        >
                    @else
                        <i class="fas fa-image" style="font-size: 4rem;"></i>
                    @endif

                    @if(count($galleryUrls) > 1)
                        <button type="button" class="product-image-nav right" onclick="changeToolImage('detail-image', 1)">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    @endif
                </div>

                <!-- Product Details -->
                <div class="product-details">
                    <h1>{{ $tool->title }}</h1>

                    <div class="price">Rs {{ number_format($tool->price, 2) }}</div>

                    <span class="status-badge {{ $tool->status }}">
                        @if($tool->status === 'in_stock')
                            <i class="fas fa-check-circle"></i> In Stock
                        @elseif($tool->status === 'limited')
                            <i class="fas fa-exclamation-circle"></i> Limited Stock
                        @else
                            <i class="fas fa-times-circle"></i> Out of Stock
                        @endif
                    </span>

                    <p class="description">{{ $tool->description }}</p>

                    <div class="product-meta">
                        <div class="meta-item">
                            <label>Product ID</label>
                            <value>#{{ str_pad($tool->id, 5, '0', STR_PAD_LEFT) }}</value>
                        </div>
                        <div class="meta-item">
                            <label>Status</label>
                            <value>{{ ucfirst(str_replace('_', ' ', $tool->status)) }}</value>
                        </div>
                    </div>

                    <div class="action-buttons">
                        @if($tool->status !== 'unavailable')
                        <form action="{{ route('cart.add') }}" method="POST" style="flex: 1; display: flex; gap: 1rem;">
                            @csrf
                            <div class="quantity-selector">
                                <button type="button" class="qty-btn" onclick="decreaseQty()">−</button>
                                <input type="number" id="quantity" name="quantity" value="1" min="1" class="qty-input">
                                <button type="button" class="qty-btn" onclick="increaseQty()">+</button>
                            </div>
                            <input type="hidden" name="id" value="{{ $tool->id }}">
                            <input type="hidden" name="name" value="{{ $tool->title }}">
                            <input type="hidden" name="type" value="tool">
                            <input type="hidden" name="price" value="{{ $tool->price }}">
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

        <!-- Related Products -->
        @if($relatedTools->count() > 0)
        <div class="related-products">
            <h2>Related Products</h2>
            <div class="products-grid">
                @foreach($relatedTools as $relatedTool)
                <a href="{{ route('tools.show', $relatedTool->id) }}" class="product-card">
                    <div class="product-card-image">
                        @if($relatedTool->image)
                            @if(strpos($relatedTool->image, 'images/tools') !== false)
                                <img src="{{ asset($relatedTool->image) }}" alt="{{ $relatedTool->title }}">
                            @else
                                <img src="{{ asset('storage/' . $relatedTool->image) }}" alt="{{ $relatedTool->title }}">
                            @endif
                        @else
                            <i class="fas fa-image"></i>
                        @endif
                    </div>
                    <div class="product-card-body">
                        <div class="product-card-title">{{ $relatedTool->title }}</div>
                        <div class="product-card-price">Rs {{ number_format($relatedTool->price, 2) }}</div>
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
            input.value = parseInt(input.value) + 1;
        }

        function decreaseQty() {
            const input = document.getElementById('quantity');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            initToolGalleries();
        });

        function initToolGalleries() {
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

        function changeToolImage(imageId, delta) {
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
