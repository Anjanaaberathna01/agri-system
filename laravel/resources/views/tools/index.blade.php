<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tools - Govi Saviya LK</title>
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
        .tools-scroll-container {
            overflow-x: auto;
            overflow-y: hidden;
            padding: 2rem;
            background: white;
            margin: 0;
            scroll-behavior: smooth;
            position: relative;
        }

        /* Custom Scrollbar */
        .tools-scroll-container::-webkit-scrollbar {
            block-size: 8px;
        }

        .tools-scroll-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .tools-scroll-container::-webkit-scrollbar-thumb {
            background: #FA891A;
            border-radius: 10px;
        }

        .tools-scroll-container::-webkit-scrollbar-thumb:hover {
            background: #FF9013;
        }

        /* Tools Row Container */
        .tools-row {
            display: flex;
            gap: 1.5rem;
            min-inline-size: min-content;
            padding-block-end: 1rem;
        }

        /* Tool Card */
        .tool-card {
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

        .tool-card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
            border-color: #F87B1B;
        }

        .tool-card-image-nav {
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

        .tool-card-image-nav:hover {
            background: rgba(0, 0, 0, 0.55);
        }

        .tool-card-image-nav.left {
            inset-inline-start: 10px;
        }

        .tool-card-image-nav.right {
            inset-inline-end: 10px;
        }

        .tool-card-image-wrapper {
            position: relative;
            inline-size: 100%;
            block-size: 200px;
            background: linear-gradient(135deg, #ee9944 0%, #FF9013 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            overflow: hidden;
        }

        .tool-card-image {
            inline-size: 100%;
            block-size: 100%;
        }

        .tool-card-image img {
            inline-size: 100%;
            block-size: 100%;
            object-fit: cover;
        }

        .tool-card-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .tool-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #333;
            margin-block-end: 0.75rem;
        }

        .tool-description {
            font-size: 0.85rem;
            color: #666;
            line-height: 1.4;
            margin-block-end: 1rem;
            flex-grow: 1;
        }

        .tool-price {
            font-size: 1.5rem;
            color: #F25912;
            font-weight: 700;
            margin-block-end: 0.5rem;
        }

        .tool-status {
            font-size: 0.85rem;
            color: #666;
            margin-block-end: 1rem;
        }

        .tool-status.in_stock {
            color: #F87B1B;
        }

        .tool-status.limited {
            color: #ff9800;
        }

        .tool-buttons {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-block-start: auto;
        }

        .btn {
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

        .btn-primary {
            background: linear-gradient(135deg, #ee9944 0%, #FF9013 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(238, 153, 68, 0.3);
        }

        .btn-primary:hover {
            box-shadow: 0 6px 16px rgba(238, 153, 68, 0.4);
            transform: translateY(-2px);
        }

        .btn-outline {
            background: white;
            color: #F25912;
            border: 2px solid #F87B1B;
        }

        .btn-outline:hover {
            background: #f0f0ff;
            border-color: #F87B1B;
            color: #F25912;
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

        /* Scroll Indicators */
        .scroll-indicator {
            position: absolute;
            inset-block-start: 50%;
            inline-size: 40px;
            block-size: 40px;
            background: linear-gradient(135deg, #ee9944 0%, #FF9013 100%);
            border: none;
            border-radius: 50%;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            z-index: 10;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(238, 153, 68, 0.3);
        }

        .scroll-indicator:hover {
            box-shadow: 0 6px 16px rgba(238, 153, 68, 0.4);
            transform: scale(1.1);
        }

        .scroll-left {
            inset-inline-start: 1rem;
        }

        .scroll-right {
            inset-inline-end: 1rem;
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
            .tool-card {
                flex: 0 0 280px;
            }

            .header-section h1 {
                font-size: 1.75rem;
            }

            .header-section p {
                font-size: 1rem;
            }

            .tools-scroll-container {
                padding: 1.5rem;
            }

            .scroll-indicator {
                inline-size: 35px;
                block-size: 35px;
                font-size: 1rem;
            }
        }

        @media (max-inline-size: 480px) {
            .tool-card {
                flex: 0 0 240px;
            }

            .header-section {
                padding: 1.5rem 1rem;
            }

            .header-section h1 {
                font-size: 1.5rem;
            }

            .tool-card-body {
                padding: 1rem;
            }

            .scroll-indicator {
                inline-size: 32px;
                block-size: 32px;
                font-size: 0.9rem;
            }
        }
</style>

<div class="header-section">
    <h1>Agricultural Tools & Equipment Store</h1>
    <p>Quality farming tools for modern agriculture - Scroll Right to Explore More!</p>
</div>

<div class="tools-scroll-container" id="toolsContainer">
    <div class="tools-row">
        @forelse($tools as $index => $tool)
        <div class="tool-card">
            @php
                $galleryFolder = $tool->title;
                $galleryFiles = [];
                foreach (['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'] as $ext) {
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

            <a href="{{ route('tools.show', $tool->id) }}" style="text-decoration: none; color: inherit; display: block;">
                <div class="tool-card-image-wrapper">
                    @if(count($galleryUrls) > 1)
                        <button type="button" class="tool-card-image-nav left" onclick="event.preventDefault(); event.stopPropagation(); changeToolImage('tool-image-{{ $tool->id }}', -1);">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                    @endif

                    @if($primaryImage)
                        <img
                            id="tool-image-{{ $tool->id }}"
                            class="tool-card-image"
                            data-gallery="true"
                            data-images='@json($galleryUrls)'
                            data-index="0"
                            src="{{ $primaryImage }}"
                            alt="{{ $tool->title }}"
                        >
                    @else
                        <i class="fas fa-image"></i>
                    @endif

                    @if(count($galleryUrls) > 1)
                        <button type="button" class="tool-card-image-nav right" onclick="event.preventDefault(); event.stopPropagation(); changeToolImage('tool-image-{{ $tool->id }}', 1);">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    @endif
                </div>
            </a>

            <div class="tool-card-body">
                <a href="{{ route('tools.show', $tool->id) }}" style="text-decoration: none; color: inherit;">
                    <h5 class="tool-title">{{ $tool->title }}</h5>
                    <p class="tool-description">
                        {{ Str::limit($tool->description, 100) }}
                    </p>
                </a>
                <div class="tool-price">Rs {{ number_format($tool->price, 2) }}</div>
                <p class="tool-status {{ $tool->status }}">
                    @if($tool->status === 'in_stock')
                        ✓ In Stock
                    @elseif($tool->status === 'limited')
                        ⚠ Limited Stock
                    @else
                        ✗ Out of Stock
                    @endif
                </p>
                <div class="tool-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" class="cart-form">
                        @csrf
                        <input type="hidden" name="id" value="{{ $tool->id }}">
                        <input type="hidden" name="name" value="{{ $tool->title }}">
                        <input type="hidden" name="type" value="tool">
                        <input type="hidden" name="price" value="{{ $tool->price }}">
                        <input type="hidden" name="image" value="1.jpg">
                        <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                        <button type="submit" class="btn btn-primary" style="flex: 1;">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </button>
                    </form>
                    <a href="#" class="btn btn-outline" onclick="event.preventDefault();">
                        <i class="fas fa-heart"></i> Wishlist
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <i class="fas fa-tools"></i>
            <h3>No Tools Available</h3>
            <p>No agricultural tools are currently available. Please check back later!</p>
        </div>
        @endforelse
    </div>
</div>

<script>
    // Tools Page - Scroll Functions
    const ToolsApp = {
        container: null,
        scrollAmount: 350,

        init() {
            this.container = document.getElementById('toolsContainer');
            initToolGalleries();
        },

        scrollLeft() {
            if (this.container) {
                this.container.scrollBy({
                    left: -this.scrollAmount,
                    behavior: 'smooth'
                });
            }
        },

        scrollRight() {
            if (this.container) {
                this.container.scrollBy({
                    left: this.scrollAmount,
                    behavior: 'smooth'
                });
            }
        }
    };

    // Expose ToolsApp globally
    window.ToolsApp = ToolsApp;

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

    document.addEventListener('DOMContentLoaded', function() {
        ToolsApp.init();
    });
</script>

</body>
</html>
