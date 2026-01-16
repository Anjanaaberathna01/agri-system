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
        background-color: #f0f8f5;
    }

    .detail-header {
        background: white;
        padding: 2rem;
        margin-bottom: 2rem;
        border-bottom: 2px solid #43a047;
    }

    .detail-header h1 {
        color: #1b5e20;
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
        background: linear-gradient(135deg, #66bb6a 0%, #43a047 100%);
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
        color: #43a047;
        transition: all 0.3s ease;
        pointer-events: all;
        box-shadow: 0 4px 12px rgba(67, 160, 71, 0.3);
        font-weight: bold;
    }

    .carousel-btn:hover {
        background: white;
        transform: scale(1.1);
        box-shadow: 0 6px 16px rgba(67, 160, 71, 0.4);
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
        background: #43a047;
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
        color: #1b5e20;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .description-card p {
        color: #558b2f;
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
        background: #f0f8f5;
        border-radius: 8px;
        color: #1b5e20;
        font-weight: 500;
    }

    .feature-item:before {
        content: "✓";
        color: #43a047;
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
        border-bottom: 2px solid #f0f0f0;
    }

    .price {
        font-size: 2.5rem;
        color: #2e7d32;
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
        border-bottom: 2px solid #f0f0f0;
    }

    .stars {
        color: #43a047;
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
    }

    .review-count {
        color: #558b2f;
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
        background: linear-gradient(135deg, #66bb6a 0%, #43a047 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(102, 187, 106, 0.3);
        padding: 1.5rem 2rem !important;
        font-size: 1.15rem !important;
        height: 55px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-primary:hover {
        box-shadow: 0 6px 16px rgba(102, 187, 106, 0.4);
        transform: translateY(-3px);
    }

    .btn-outline {
        background: white;
        color: #2e7d32;
        border: 2px solid #43a047;
        padding: 0.75rem 1rem !important;
        font-size: 0.95rem !important;
    }

    .btn-outline:hover {
        background: #f0f8f5;
        color: #2e7d32;
    }

    /* Specifications Grid */
    .specs-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin-top: 2rem;
    }

    .spec-item {
        background: #f0f8f5;
        padding: 1.25rem;
        border-radius: 8px;
        border-left: 4px solid #43a047;
    }

    .spec-label {
        color: #558b2f;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }

    .spec-value {
        color: #1b5e20;
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
    <h1>Urea 46% Nitrogen - Premium Nitrogen Fertilizer</h1>
</div>

<div class="detail-container">
    <!-- Image Carousel -->
    <div class="image-carousel-container">
        <div class="image-carousel-wrapper">
            <div class="carousel-images" id="ureaCarousel">
                <img src="{{ asset('images/fertilizer/nitrogen/1.webp') }}" alt="Urea Fertilizer" class="carousel-image active">
                <img src="{{ asset('images/fertilizer/nitrogen/2.webp') }}" alt="Urea Fertilizer" class="carousel-image">
                <img src="{{ asset('images/fertilizer/nitrogen/3.webp') }}" alt="Urea Fertilizer" class="carousel-image">
                <img src="{{ asset('images/fertilizer/nitrogen/4.jpg') }}" alt="Urea Fertilizer" class="carousel-image">
            </div>
            <div class="carousel-nav">
                <button class="carousel-btn prev" onclick="UreaFertilizerApp.prevImage()">‹</button>
                <button class="carousel-btn next" onclick="UreaFertilizerApp.nextImage()">›</button>
            </div>
            <div class="carousel-dots">
                <span class="dot active" onclick="UreaFertilizerApp.goToImage(0)"></span>
                <span class="dot" onclick="UreaFertilizerApp.goToImage(1)"></span>
                <span class="dot" onclick="UreaFertilizerApp.goToImage(2)"></span>
                <span class="dot" onclick="UreaFertilizerApp.goToImage(3)"></span>
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
                    Urea 46% is the world's most widely used nitrogen fertilizer, providing high-concentration nitrogen for vigorous plant growth and protein synthesis. Ideal for all crops, it promotes leaf development, photosynthesis, and yield potential. Cost-effective and easily soluble, it offers rapid nitrogen availability for maximum crop performance.
                </p>

                <h3>Key Features</h3>
                <div class="features-list">
                    <div class="feature-item">46% nitrogen content</div>
                    <div class="feature-item">Highly soluble</div>
                    <div class="feature-item">Rapid nutrient uptake</div>
                    <div class="feature-item">Cost-effective</div>
                    <div class="feature-item">All crop types</div>
                    <div class="feature-item">High yield potential</div>
                </div>

                <h3>Detailed Specifications</h3>
                <div class="specs-grid">
                    <div class="spec-item">
                        <div class="spec-label">Type</div>
                        <div class="spec-value">Nitrogen Fertilizer</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-label">Nitrogen (N)</div>
                        <div class="spec-value">46%</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-label">Form</div>
                        <div class="spec-value">Granules</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-label">Solubility</div>
                        <div class="spec-value">Very High</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-label">Application Rate</div>
                        <div class="spec-value">100-300 kg/ha</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-label">Shelf Life</div>
                        <div class="spec-value">24+ Months</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Sidebar -->
        <div>
            <div class="sidebar-card">
                <!-- Price Section -->
                <div class="price-section">
                    <div class="price">$32.50</div>
                </div>

                <!-- Rating Section -->
                <div class="rating-section">
                    <div class="stars">★★★★★</div>
                    <div class="review-count">(301 customer reviews)</div>
                </div>

                <!-- Stock Status -->
                <div style="text-align: center; margin-bottom: 1.5rem;">
                    <span class="stock-status">✓ In Stock</span>
                </div>

                <!-- Buttons -->
                <div class="button-group">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="2">
                        <input type="hidden" name="name" value="Urea 46% Nitrogen">
                        <input type="hidden" name="type" value="fertilizer">
                        <input type="hidden" name="price" value="32.50">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary">🛒 Add to Cart</button>
                    </form>
                    <a href="{{ route('auth.check_out') }}" class="btn btn-outline">Buy Now</a>
                    <a href="{{ route('fertilizers.index') }}" class="btn btn-outline">← Back to Fertilizers</a>
                </div>

                <!-- Additional Info -->
                <div style="margin-top: 2rem; padding-top: 1.5rem; border-top: 2px solid #f0f0f0;">
                    <p style="font-size: 0.85rem; color: #558b2f; line-height: 1.6;">
                        ✓ Free Delivery on orders above $100<br>
                        ✓ 30-day money-back guarantee<br>
                        ✓ 24/7 Customer support
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const UreaFertilizerApp = {
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
            const carousel = document.getElementById('ureaCarousel');
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
        if (e.key === 'ArrowRight') UreaFertilizerApp.nextImage();
        if (e.key === 'ArrowLeft') UreaFertilizerApp.prevImage();
    });
</script>

@endsection
