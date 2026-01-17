@extends('layouts.app')

@section('content')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background-color: #f5f3ed;
    }

    .detail-header {
        background: white;
        padding: 2rem;
        margin-bottom: 2rem;
        border-bottom: 2px solid #6ba545;
    }

    .detail-header h1 {
        color: #2d5016;
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0;
    }

    .detail-container {
        padding: 0 2rem;
        margin-bottom: 3rem;
    }

    /* Image Carousel Styles */
    .image-carousel-container {
        background: white;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .image-carousel-wrapper {
        position: relative;
        width: 100%;
        height: 500px;
        background: linear-gradient(135deg, #6ba545 0%, #4a7c2c 100%);
    }

    .carousel-images {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .carousel-image {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 0.4s ease-in-out;
        object-fit: cover;
    }

    .carousel-image.active {
        opacity: 1;
    }

    .carousel-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 100%;
        display: flex;
        justify-content: space-between;
        padding: 0 20px;
        z-index: 5;
        pointer-events: none;
    }

    .carousel-btn {
        background: rgba(255, 255, 255, 0.9);
        border: none;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: #4a7c2c;
        transition: all 0.3s ease;
        pointer-events: all;
        box-shadow: 0 4px 12px rgba(74, 124, 44, 0.3);
        font-weight: bold;
    }

    .carousel-btn:hover {
        background: white;
        transform: scale(1.1);
        box-shadow: 0 6px 16px rgba(74, 124, 44, 0.4);
    }

    .carousel-dots {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 8px;
        z-index: 5;
    }

    .dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .dot.active {
        background: #6ba545;
        width: 32px;
        border-radius: 6px;
    }

    .dot:hover {
        background: rgba(255, 255, 255, 0.9);
    }

    /* Content Grid */
    .content-grid {
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 2rem;
        margin-bottom: 3rem;
    }

    /* Description Card */
    .description-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .description-card h3 {
        color: #4a7c2c;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .description-card p {
        color: #666;
        line-height: 1.8;
        margin-bottom: 1.5rem;
        font-size: 1rem;
    }

    .features-list {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 0.75rem;
        background: #e8f5e0;
        border-radius: 8px;
        color: #2d5016;
        font-weight: 500;
    }

    .feature-item:before {
        content: "✓";
        color: #6ba545;
        font-weight: bold;
        font-size: 1.25rem;
    }

    /* Sidebar Card */
    .sidebar-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        height: fit-content;
        position: sticky;
        top: 20px;
    }

    .price-section {
        text-align: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid #e8f5e0;
    }

    .price {
        font-size: 2.5rem;
        color: #2d5016;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .stock-status {
        display: inline-block;
        padding: 0.5rem 1rem;
        background: #d4edda;
        color: #155724;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .stock-status.limited {
        background: #fff3cd;
        color: #856404;
    }

    .rating-section {
        text-align: center;
        margin: 1rem 0;
        padding: 1rem 0;
        border-bottom: 2px solid #e8f5e0;
    }

    .stars {
        color: #8bc34a;
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
    }

    .review-count {
        color: #666;
        font-size: 0.9rem;
    }

    .button-group {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .btn {
        padding: 1rem;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Poppins', sans-serif;
        text-decoration: none;
        display: block;
        text-align: center;
    }

    .btn-primary {
        background: linear-gradient(135deg, #6ba545 0%, #4a7c2c 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(107, 165, 69, 0.3);
        padding: 1.5rem 2rem !important;
        font-size: 1.15rem !important;
        height: 55px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-primary:hover {
        box-shadow: 0 6px 16px rgba(107, 165, 69, 0.4);
        transform: translateY(-3px);
    }

    .btn-outline {
        background: white;
        color: #4a7c2c;
        border: 2px solid #6ba545;
        padding: 0.75rem 1rem !important;
        font-size: 0.95rem !important;
    }

    .btn-outline:hover {
        background: #e8f5e0;
        color: #2d5016;
    }

    /* Specifications Grid */
    .specs-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin-top: 2rem;
    }

    .spec-item {
        background: #e8f5e0;
        padding: 1.25rem;
        border-radius: 8px;
        border-left: 4px solid #6ba545;
    }

    .spec-label {
        color: #558b2f;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }

    .spec-value {
        color: #2d5016;
        font-size: 1.1rem;
        font-weight: 600;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .detail-header h1 {
            font-size: 1.75rem;
        }

        .content-grid {
            grid-template-columns: 1fr;
        }

        .image-carousel-wrapper {
            height: 350px;
        }

        .features-list {
            grid-template-columns: 1fr;
        }

        .specs-grid {
            grid-template-columns: 1fr;
        }

        .sidebar-card {
            position: relative;
            top: 0;
        }

        .detail-container {
            padding: 0 1rem;
        }

        .detail-header {
            padding: 1.5rem 1rem;
        }
    }

    @media (max-width: 480px) {
        .detail-header h1 {
            font-size: 1.5rem;
        }

        .image-carousel-wrapper {
            height: 280px;
        }

        .carousel-btn {
            width: 40px;
            height: 40px;
            font-size: 18px;
        }

        .price {
            font-size: 2rem;
        }
    }
</style>

<div class="detail-header">
    <h1>Sorghum - Premium Cereal Crop</h1>
</div>

<div class="detail-container">
    <!-- Image Carousel -->
    <div class="image-carousel-container">
        <div class="image-carousel-wrapper">
            <div class="carousel-images" id="sorghumCarousel">
                <img src="{{ asset('images/crop/sorghum/1.png') }}" alt="Sorghum" class="carousel-image active">
                <img src="{{ asset('images/crop/sorghum/2.jpg') }}" alt="Sorghum" class="carousel-image">
                <img src="{{ asset('images/crop/sorghum/3.webp') }}" alt="Sorghum" class="carousel-image">
                <img src="{{ asset('images/crop/sorghum/4.jpg') }}" alt="Sorghum" class="carousel-image">
            </div>
            <div class="carousel-nav">
                <button class="carousel-btn prev" onclick="SorghumApp.prevImage()">‹</button>
                <button class="carousel-btn next" onclick="SorghumApp.nextImage()">›</button>
            </div>
            <div class="carousel-dots">
                <span class="dot active" onclick="SorghumApp.goToImage(0)"></span>
                <span class="dot" onclick="SorghumApp.goToImage(1)"></span>
                <span class="dot" onclick="SorghumApp.goToImage(2)"></span>
                <span class="dot" onclick="SorghumApp.goToImage(3)"></span>
            </div>
        </div>
    </div>

    <!-- Content Grid -->
    <div class="content-grid">
        <!-- Left Column -->
        <div>
            <!-- Description Card -->
            <div class="description-card">
                <h3>Description</h3>
                <p>
                    Premium Sorghum is a drought-resistant cereal grain ideal for arid climates and sustainable agriculture. This versatile crop offers multiple uses including grain, fodder, and biofuel production, with excellent resilience to challenging growing conditions and reliable yields even in dry regions.
                </p>

                <h3>Key Features</h3>
                <div class="features-list">
                    <div class="feature-item">Drought resistant</div>
                    <div class="feature-item">Arid climate adapted</div>
                    <div class="feature-item">Multiple uses</div>
                    <div class="feature-item">Grain & fodder</div>
                    <div class="feature-item">Biofuel potential</div>
                    <div class="feature-item">Sustainable crop</div>
                </div>

                <h3>Detailed Specifications</h3>
                <div class="specs-grid">
                    <div class="spec-item">
                        <div class="spec-label">Type</div>
                        <div class="spec-value">Cereal Crop</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-label">Grain Content</div>
                        <div class="spec-value">65-70%</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-label">Maturity Period</div>
                        <div class="spec-value">95-130 Days</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-label">Yield Potential</div>
                        <div class="spec-value">2-3.5 tons/acre</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-label">Water Requirement</div>
                        <div class="spec-value">Low</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-label">Season</div>
                        <div class="spec-value">Kharif/Summer</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Sidebar -->
        <div>
            <div class="sidebar-card">
                <!-- Price Section -->
                <div class="price-section">
                    <div class="price">Rs 300.00</div>
                </div>

                <!-- Rating Section -->
                <div class="rating-section">
                    <div class="stars">★★★★☆</div>
                    <div class="review-count">(215 customer reviews)</div>
                </div>

                <!-- Stock Status -->
                <div style="text-align: center; margin-bottom: 1.5rem;">
                    <span class="stock-status">✓ In Stock</span>
                </div>

                <!-- Buttons -->
                <div class="button-group">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="9">
                        <input type="hidden" name="name" value="Sorghum">
                        <input type="hidden" name="type" value="crop">
                        <input type="hidden" name="price" value="300.00">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary">🛒 Add to Cart</button>
                    </form>
                    <a href="{{ route('auth.check_out') }}" class="btn btn-outline">Buy Now</a>
                    <a href="{{ route('crops.index') }}" class="btn btn-outline">← Back to Crops</a>
                </div>

                <!-- Additional Info -->
                <div style="margin-top: 2rem; padding-top: 1.5rem; border-top: 2px solid #e8f5e0;">
                    <p style="font-size: 0.85rem; color: #666; line-height: 1.6;">
                        ✓ Premium quality certified seeds<br>
                        ✓ Expert farming guidance included<br>
                        ✓ Free consultation on cultivation<br>
                        ✓ Sustainable farming practices
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const SorghumApp = {
        currentIndex: 0,
        totalImages: 4,

        nextImage() {
            this.currentIndex = (this.currentIndex + 1) % this.totalImages;
            this.updateCarousel();
        },

        prevImage() {
            this.currentIndex = (this.currentIndex - 1 + this.totalImages) % this.totalImages;
            this.updateCarousel();
        },

        goToImage(index) {
            this.currentIndex = index;
            this.updateCarousel();
        },

        updateCarousel() {
            const carousel = document.getElementById('sorghumCarousel');
            const images = carousel.querySelectorAll('.carousel-image');
            const dots = document.querySelectorAll('.dot');

            images.forEach(img => img.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));

            images[this.currentIndex].classList.add('active');
            dots[this.currentIndex].classList.add('active');
        }
    };

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowRight') SorghumApp.nextImage();
        if (e.key === 'ArrowLeft') SorghumApp.prevImage();
    });
</script>

@endsection
