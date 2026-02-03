<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crops - Govi Saviya LK</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>


<style>
                    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
                    body { background-color: #f5f3ed; }
                    .container { max-inline-size: 100%; padding: 2rem 0; }
                    .header-section { padding: 2rem 2rem; text-align: center; background: white; margin-block-end: 1rem; }
                    .header-section h1 { margin-block-end: 1rem; color: #2d5016; font-size: 2.5rem; font-weight: 700; }
                    .header-section p { color: #4a7c2c; font-size: 1.125rem; margin: 0; }

                    .crop-scroll-container { overflow-x: auto; overflow-y: hidden; padding: 2rem; background: white; margin: 0; scroll-behavior: smooth; position: relative; }
                    .crop-scroll-container::-webkit-scrollbar { block-size: 8px; }
                    .crop-scroll-container::-webkit-scrollbar-track { background: #ede8dc; border-radius: 10px; }
                    .crop-scroll-container::-webkit-scrollbar-thumb { background: #84994F; border-radius: 10px; }
                    .crop-scroll-container::-webkit-scrollbar-thumb:hover { background: #75B06F; }

                    .crop-row { display: flex; gap: 1.5rem; min-inline-size: min-content; padding-block-end: 1rem; }

                    .crop-card { flex: 0 0 320px; background: white; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: all 0.3s ease; display: flex; flex-direction: column; overflow: hidden; border: 2px solid transparent; }
                    .crop-card:hover { box-shadow: 0 8px 20px rgba(0,0,0,0.15); transform: translateY(-5px); border-color: #6ba545; }

                    .crop-card-image-nav { position: absolute; inset-block-start: 50%; transform: translateY(-50%); inline-size: 36px; block-size: 36px; border-radius: 50%; border: none; background: rgba(0,0,0,0.35); color: #fff; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.2s ease; z-index: 2; }
                    .crop-card-image-nav:hover { background: rgba(0,0,0,0.55); }
                    .crop-card-image-nav.left { inset-inline-start: 10px; }
                    .crop-card-image-nav.right { inset-inline-end: 10px; }

                    .crop-card-image-wrapper { position: relative; inline-size: 100%; block-size: 200px; background: linear-gradient(135deg, #6ba545 0%, #4a7c2c 100%); display: flex; align-items: center; justify-content: center; font-size: 4rem; overflow: hidden; }
                    .crop-card-image { inline-size: 100%; block-size: 100%; }
                    .crop-card-image img { inline-size: 100%; block-size: 100%; object-fit: cover; }

                    .crop-card-body { padding: 1.5rem; display: flex; flex-direction: column; flex-grow: 1; }
                    .crop-title { font-size: 1.125rem; font-weight: 600; color: #4a7c2c; margin-block-end: 0.75rem; }
                    .crop-description { font-size: 0.85rem; color: #5a5a5a; line-height: 1.4; margin-block-end: 1rem; flex-grow: 1; }
                    .crop-price { font-size: 1.5rem; color: #2d5016; font-weight: 700; margin-block-end: 0.5rem; }
                    .crop-status { font-size: 0.85rem; color: #4a7c2c; margin-block-end: 1rem; }
                    .crop-status.in_stock { color: #6ba545; }
                    .crop-status.limited { color: #8bc34a; }

                    .crop-buttons { display: flex; flex-direction: column; gap: 0.75rem; margin-block-start: auto; }
                    .crop-btn { padding: 0.75rem 1rem; border: none; border-radius: 8px; font-size: 0.9rem; font-weight: 600; cursor: pointer; transition: all 0.3s ease; font-family: 'Poppins', sans-serif; text-decoration: none; display: block; text-align: center; }
                    .crop-btn-primary { background: linear-gradient(135deg, #6ba545 0%, #4a7c2c 100%); color: white; box-shadow: 0 4px 12px rgba(107,165,69,0.3); }
                    .crop-btn-primary:hover { box-shadow: 0 6px 16px rgba(107,165,69,0.4); transform: translateY(-2px); }
                    .crop-btn-outline { background: white; color: #4a7c2c; border: 2px solid #6ba545; }
                    .crop-btn-outline:hover { background: #e8f5e0; border-color: #4a7c2c; color: #2d5016; }

                    .quantity-input { inline-size: 60px; padding: 0.5rem; border: 1px solid #ddd; border-radius: 4px; font-family: 'Poppins', sans-serif; text-align: center; }
                    .cart-form { display: flex; gap: 0.75rem; }

                    .empty-state { text-align: center; padding: 3rem 2rem; color: #666; inline-size: 100%; }
                    .empty-state i { font-size: 3.5rem; color: #ddd; margin-block-end: 1rem; display: block; }

                    @media (max-inline-size: 768px) {
                        .crop-card { flex: 0 0 280px; }
                        .header-section h1 { font-size: 1.75rem; }
                        .header-section p { font-size: 1rem; }
                        .crop-scroll-container { padding: 1.5rem; }
                    }
                    @media (max-inline-size: 480px) {
                        .crop-card { flex: 0 0 240px; }
                        .header-section { padding: 1.5rem 1rem; }
                        .header-section h1 { font-size: 1.5rem; }
                        .crop-card-body { padding: 1rem; }
                    }
            </style>

            <div class="header-section">
                <h1>Premium Crops Selection</h1>
                <p>High-quality crops for your farm - Scroll Right to Explore More!</p>
            </div>

            <div class="crop-scroll-container" id="cropContainer">
                <div class="crop-row">
                    @forelse($crops as $index => $crop)
                    <div class="crop-card">
                        @php
                            $galleryFolder = $crop->image_folder ?: $crop->name;
                            $galleryFiles = [];
                            foreach (['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'] as $ext) {
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
                        @endphp

                        <a href="{{ route('crops.show', $crop->id) }}" style="text-decoration: none; color: inherit;">
                        <div class="crop-card-image-wrapper">
                            @if(count($galleryUrls) > 1)
                                <button type="button" class="crop-card-image-nav left" onclick="event.preventDefault(); event.stopPropagation(); changeCropImage('crop-image-{{ $crop->id }}', -1);">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                            @endif

                            @if($primaryImage)
                                <img
                                    id="crop-image-{{ $crop->id }}"
                                    class="crop-card-image"
                                    data-gallery="true"
                                    data-images='@json($galleryUrls)'
                                    data-index="0"
                                    src="{{ $primaryImage }}"
                                    alt="{{ $crop->name }}"
                                >
                            @else
                                <i class="fas fa-image"></i>
                            @endif

                            @if(count($galleryUrls) > 1)
                                <button type="button" class="crop-card-image-nav right" onclick="event.preventDefault(); event.stopPropagation(); changeCropImage('crop-image-{{ $crop->id }}', 1);">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            @endif
                        </div>
                        </a>

                        <div class="crop-card-body">
                            <a href="{{ route('crops.show', $crop->id) }}" style="text-decoration: none; color: inherit;">
                            <h5 class="crop-title">{{ $crop->name }}</h5>
                            </a>
                            <p class="crop-description">{{ Str::limit($crop->description, 100) }}</p>
                            <div class="crop-price">Rs {{ number_format($crop->price, 2) }}</div>
                            <p class="crop-status {{ str_replace('-', '_', $crop->status) }}">
                                @php $status = str_replace('-', '_', $crop->status); @endphp
                                @if($status === 'in_stock')
                                    ✓ In Stock
                                @elseif($status === 'limited')
                                    ⚠ Limited Stock
                                @else
                                    ✗ Out of Stock
                                @endif
                            </p>
                            <div class="crop-buttons">
                                <form action="{{ route('cart.add') }}" method="POST" class="cart-form">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $crop->id }}">
                                    <input type="hidden" name="name" value="{{ $crop->name }}">
                                    <input type="hidden" name="type" value="crop">
                                    <input type="hidden" name="price" value="{{ $crop->price }}">
                                    <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                                    <button type="submit" class="crop-btn crop-btn-primary" style="flex: 1;">
                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                    </button>
                                </form>
                                <a href="#" class="crop-btn crop-btn-outline" onclick="event.preventDefault(); event.stopPropagation();">
                                    <i class="fas fa-heart"></i> Wishlist
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="empty-state">
                        <i class="fas fa-leaf"></i>
                        <h3>No Crops Available</h3>
                        <p>No crops are currently available. Please check back later!</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <script>
                // Crops Page - Scroll Functions
                const CropApp = {
                    container: null,
                    scrollAmount: 350,

                    init() {
                        this.container = document.getElementById('cropContainer');
                        if (this.container) {
                            // Ensure smooth scrolling without relying on physical axes properties
                            this.container.style.scrollBehavior = 'smooth';
                        }
                        initCropGalleries();
                    },

                    scrollLeft() {
                        if (this.container) {
                            this.container.scrollBy(-this.scrollAmount, 0);
                        }
                    },

                    scrollRight() {
                        if (this.container) {
                            this.container.scrollBy(this.scrollAmount, 0);
                        }
                    }
                };

                // Expose CropApp globally
                window.CropApp = CropApp;

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

                document.addEventListener('DOMContentLoaded', function() {
                    CropApp.init();
                });
            </script>

            </body>
            </html>
