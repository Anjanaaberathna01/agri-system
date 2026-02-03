<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fertilizers - Govi Saviya LK</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

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
            max-inline-size: 100%;
            padding: 2rem 0;
        }

        .header-section {
            padding: 2rem 2rem;
            text-align: center;
            background: white;
            margin-block-end: 1rem;
        }

        .header-section h1 {
            margin-block-end: 1rem;
            color: #333;
            font-size: 2.5rem;
            font-weight: 700;
        }

        .header-section p {
            color: #666;
            font-size: 1.125rem;
            margin: 0;
        }

        /* Horizontal Scroll Container */
        .fertilizers-scroll-container {
            overflow-x: auto;
            overflow-y: hidden;
            padding: 2rem;
            background: white;
            margin: 0;
            scroll-behavior: smooth;
            position: relative;
        }

        /* Custom Scrollbar */
        .fertilizers-scroll-container::-webkit-scrollbar {
            block-size: 8px;
        }

        .fertilizers-scroll-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .fertilizers-scroll-container::-webkit-scrollbar-thumb {
            background: #4CAF50;
            border-radius: 10px;
        }

        .fertilizers-scroll-container::-webkit-scrollbar-thumb:hover {
            background: #45a049;
        }

        /* Fertilizers Row Container */
        .fertilizers-row {
            display: flex;
            gap: 1.5rem;
            min-inline-size: min-content;
            padding-block-end: 1rem;
        }

        /* Fertilizer Card */
        .fertilizer-card {
            flex: 0 0 320px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            border: 2px solid transparent;
        }

        .fertilizer-card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
            border-color: #4CAF50;
        }

        .fertilizer-card-image-nav {
            position: absolute;
            inset-block-start: 50%;
            transform: translateY(-50%);
            inline-size: 36px;
            block-size: 36px;
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

        .fertilizer-card-image-nav:hover {
            background: rgba(0, 0, 0, 0.55);
        }

        .fertilizer-card-image-nav.left {
            inset-inline-start: 10px;
        }

        .fertilizer-card-image-nav.right {
            inset-inline-end: 10px;
        }

        .fertilizer-card-image-wrapper {
            position: relative;
            inline-size: 100%;
            block-size: 200px;
            background: linear-gradient(135deg, #66bb6a 0%, #4CAF50 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            overflow: hidden;
        }

        .fertilizer-card-image {
            inline-size: 100%;
            block-size: 100%;
        }

        .fertilizer-card-image img {
            inline-size: 100%;
            block-size: 100%;
            object-fit: cover;
        }

        .fertilizer-card-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .fertilizer-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #333;
            margin-block-end: 0.75rem;
        }

        .fertilizer-description {
            font-size: 0.85rem;
            color: #666;
            line-height: 1.4;
            margin-block-end: 1rem;
            flex-grow: 1;
        }

        .fertilizer-price {
            font-size: 1.5rem;
            color: #2e7d32;
            font-weight: 700;
            margin-block-end: 0.5rem;
        }

        .fertilizer-status {
            font-size: 0.85rem;
            color: #666;
            margin-block-end: 1rem;
        }

        .fertilizer-status.in_stock {
            color: #4CAF50;
        }

        .fertilizer-status.limited {
            color: #ff9800;
        }

        .fertilizer-buttons {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-block-start: auto;
        }

        .fertilizer-btn {
            padding: 0.75rem 1rem;
            border: none;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
            display: block;
            text-align: center;
        }

        .fertilizer-btn-primary {
            background: linear-gradient(135deg, #66bb6a 0%, #4CAF50 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(102, 187, 106, 0.3);
        }

        .fertilizer-btn-primary:hover {
            box-shadow: 0 6px 16px rgba(102, 187, 106, 0.4);
            transform: translateY(-2px);
        }

        .fertilizer-btn-outline {
            background: white;
            color: #2e7d32;
            border: 2px solid #4CAF50;
        }

        .fertilizerbtn-outline:hover {
            background: #f0f0f0;
            border-color: #4CAF50;
            color: #2e7d32;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: #666;
            inline-size: 100%;
        }

        .empty-state i {
            font-size: 3.5rem;
            color: #ddd;
            margin-block-end: 1rem;
            display: block;
        }

        .quantity-input {
            inline-size: 60px;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: 'Poppins', sans-serif;
            text-align: center;
        }

        .cart-form {
            display: flex;
            gap: 0.75rem;
        }

        /* Responsive */
        @media (max-inline-size: 768px) {
            .fertilizer-card {
                flex: 0 0 280px;
            }

            .header-section h1 {
                font-size: 1.75rem;
            }

            .header-section p {
                font-size: 1rem;
            }

            .fertilizers-scroll-container {
                padding: 1.5rem;
            }
        }

        @media (max-inline-size: 480px) {
            .fertilizer-card {
                flex: 0 0 240px;
            }

            .header-section {
                padding: 1.5rem 1rem;
            }

            .header-section h1 {
                font-size: 1.5rem;
            }

            .fertilizer-card-body {
                padding: 1rem;
            }
        }
</style>

<div class="header-section">
    <h1>Premium Fertilizers & Nutrients Store</h1>
    <p>High-quality fertilizers for optimal crop growth - Scroll Right to Explore More!</p>
</div>

<div class="fertilizers-scroll-container" id="fertilizersContainer">
    <div class="fertilizers-row">
        @forelse($fertilizers as $index => $fertilizer)
        <div class="fertilizer-card">
            @php
                $galleryFolder = $fertilizer->title;
                $galleryFiles = [];
                foreach (['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'] as $ext) {
                    $matches = glob(public_path('images/fertilizer/' . $galleryFolder . '/*.' . $ext)) ?: [];
                    $galleryFiles = array_merge($galleryFiles, $matches);
                }
                $galleryUrls = array_map(function ($file) use ($galleryFolder) {
                    return asset('images/fertilizer/' . rawurlencode($galleryFolder) . '/' . rawurlencode(basename($file)));
                }, $galleryFiles);

                $primaryImage = $galleryUrls[0] ?? null;
                if (!$primaryImage && $fertilizer->image) {
                    $primaryImage = strpos($fertilizer->image, 'images/fertilizers') !== false
                        ? asset($fertilizer->image)
                        : asset('storage/' . $fertilizer->image);
                }
            @endphp

            <a href="{{ route('fertilizers.show', $fertilizer->id) }}" style="text-decoration: none; color: inherit; display: block;">
                <div class="fertilizer-card-image-wrapper">
                    @if(count($galleryUrls) > 1)
                        <button type="button" class="fertilizer-card-image-nav left" onclick="event.preventDefault(); event.stopPropagation(); changeFertilizerImage('fertilizer-image-{{ $fertilizer->id }}', -1);">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                    @endif

                    @if($primaryImage)
                        <img
                            id="fertilizer-image-{{ $fertilizer->id }}"
                            class="fertilizer-card-image"
                            data-gallery="true"
                            data-images='@json($galleryUrls)'
                            data-index="0"
                            src="{{ $primaryImage }}"
                            alt="{{ $fertilizer->title }}"
                        >
                    @else
                        <i class="fas fa-image"></i>
                    @endif

                    @if(count($galleryUrls) > 1)
                        <button type="button" class="fertilizer-card-image-nav right" onclick="event.preventDefault(); event.stopPropagation(); changeFertilizerImage('fertilizer-image-{{ $fertilizer->id }}', 1);">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    @endif
                </div>
            </a>

            <div class="fertilizer-card-body">
                <a href="{{ route('fertilizers.show', $fertilizer->id) }}" style="text-decoration: none; color: inherit;">
                    <h5 class="fertilizer-title">{{ $fertilizer->title }}</h5>
                    <p class="fertilizer-description">
                        {{ Str::limit($fertilizer->description, 100) }}
                    </p>
                </a>
                <div class="fertilizer-price">Rs {{ number_format($fertilizer->price, 2) }}</div>
                <p class="fertilizer-status {{ $fertilizer->status }}">
                    @if($fertilizer->status === 'in_stock')
                        ✓ In Stock
                    @elseif($fertilizer->status === 'limited')
                        ⚠ Limited Stock
                    @else
                        ✗ Out of Stock
                    @endif
                </p>
                <div class="fertilizer-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" class="cart-form">
                        @csrf
                        <input type="hidden" name="id" value="{{ $fertilizer->id }}">
                        <input type="hidden" name="name" value="{{ $fertilizer->title }}">
                        <input type="hidden" name="type" value="fertilizer">
                        <input type="hidden" name="price" value="{{ $fertilizer->price }}">
                        <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                        <button type="submit" class="fertilizer-btn fertilizer-btn-primary" style="flex: 1;">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </button>
                    </form>
                    <a href="#" class="fertilizer-btn fertilizer-btn-outline" onclick="event.preventDefault();">
                        <i class="fas fa-heart"></i> Wishlist
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <i class="fas fa-droplet"></i>
            <h3>No Fertilizers Available</h3>
            <p>No fertilizers are currently available. Please check back later!</p>
        </div>
        @endforelse
    </div>
</div>

<script>
    // Fertilizers Page - Scroll Functions
    const FertilizersApp = {
        container: null,
        scrollAmount: 350,

        init() {
            this.container = document.getElementById('fertilizersContainer');
            if (this.container) {
                // Ensure smooth scrolling without relying on physical axes properties
                this.container.style.scrollBehavior = 'smooth';
            }
            initFertilizerGalleries();
        },

        scrollLeft() {
            if (this.container) {
                this.container.scrollBy(this.scrollAmount, 0);
            }
        },

        scrollRight() {
            if (this.container) {
                this.container.scrollBy(-this.scrollAmount, 0);
            }
        }
    };

    // Expose FertilizersApp globally
    window.FertilizersApp = FertilizersApp;

    function initFertilizerGalleries() {
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

    function changeFertilizerImage(imageId, delta) {
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

    document.addEventListener('DOMContentLoaded', function() {
        FertilizersApp.init();
    });
</script>

</body>
</html>
