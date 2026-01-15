<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crops - SpasilaLahanPetani</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            background-color: #f5f3ed;
        }

        .container {
            max-width: 100%;
            padding: 2rem 0;
        }

        .header-section {
            padding: 2rem 2rem;
            text-align: center;
            background: white;
            margin-bottom: 1rem;
        }

        .header-section h1 {
            margin-bottom: 1rem;
            color: #2d5016;
            font-size: 2.5rem;
            font-weight: 700;
        }

        .header-section p {
            color: #4a7c2c;
            font-size: 1.125rem;
            margin: 0;
        }

        /* Horizontal Scroll Container */
        .crop-scroll-container {
            overflow-x: auto;
            overflow-y: hidden;
            padding: 2rem;
            background: white;
            margin: 0;
            scroll-behavior: smooth;
            position: relative;
        }

        /* Custom Scrollbar */
        .crop-scroll-container::-webkit-scrollbar {
            height: 8px;
        }

        .crop-scroll-container::-webkit-scrollbar-track {
            background: #ede8dc;
            border-radius: 10px;
        }

        .crop-scroll-container::-webkit-scrollbar-thumb {
            background: #84994F;
            border-radius: 10px;
        }

        .crop-scroll-container::-webkit-scrollbar-thumb:hover {
            background: #75B06F;
        }

        /* Crops Row Container */
        .crop-row {
            display: flex;
            gap: 1.5rem;
            min-width: min-content;
            padding-bottom: 1rem;
        }

        /* Crop Card */
        .crop-card {
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

        .crop-card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
            border-color: #6ba545;
        }

        .crop-card-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #6ba545 0%, #4a7c2c 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            overflow: hidden;
        }

        .crop-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .crop-carousel {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .crop-carousel-images {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .crop-carousel-image {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.4s ease-in-out;
        }

        .crop-carousel-image.active {
            opacity: 1;
        }

        .crop-carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 8px;
            z-index: 5;
        }

        .crop-carousel-btn {
            background: rgba(255, 255, 255, 0.85);
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #4a7c2c;
            transition: all 0.3s ease;
            pointer-events: all;
            box-shadow: 0 2px 8px rgba(74, 124, 44, 0.2);
            font-weight: bold;
        }

        .crop-carousel-btn:hover {
            background: rgba(255, 255, 255, 1);
            transform: scale(1.1);
        }

        .crop-carousel-dots {
            position: absolute;
            bottom: 8px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 6px;
            z-index: 5;
        }

        .crop-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .crop-dot.active {
            background: #6ba545;
            width: 24px;
            border-radius: 4px;
        }

        .crop-dot:hover {
            background: rgba(255, 255, 255, 0.9);
        }

        .crop-card-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .crop-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #4a7c2c;
            margin-bottom: 0.75rem;
        }

        .crop-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
            font-size: 0.85rem;
        }

        .crop-stars {
            display: flex;
            gap: 0.2rem;
            color: #8bc34a;
        }

        .crop-rating-text {
            color: #8b6f47;
            font-size: 0.8rem;
        }

        .crop-description {
            font-size: 0.85rem;
            color: #5a5a5a;
            line-height: 1.4;
            margin-bottom: 1rem;
            flex-grow: 1;
        }

        .crop-description strong {
            color: #4a7c2c;
        }

        .crop-type {
            font-size: 0.8rem;
            background: #e8f5e0;
            color: #4a7c2c;
            padding: 0.3rem 0.6rem;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 0.75rem;
            font-weight: 500;
        }

        .crop-price {
            font-size: 1.5rem;
            color: #2d5016;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .crop-status {
            font-size: 0.85rem;
            color: #4a7c2c;
            margin-bottom: 1rem;
        }

        .crop-status.in-stock {
            color: #6ba545;
        }

        .crop-status.limited {
            color: #8bc34a;
        }

        .crop-buttons {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-top: auto;
        }

        .crop-btn {
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

        .crop-btn-primary {
            background: linear-gradient(135deg, #6ba545 0%, #4a7c2c 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(107, 165, 69, 0.3);
        }

        .crop-btn-primary:hover {
            box-shadow: 0 6px 16px rgba(107, 165, 69, 0.4);
            transform: translateY(-2px);
        }

        .crop-btn-outline {
            background: white;
            color: #4a7c2c;
            border: 2px solid #6ba545;
        }

        .crop-btn-outline:hover {
            background: #e8f5e0;
            border-color: #4a7c2c;
            color: #2d5016;
        }

        /* Scroll Indicators */
        .crop-scroll-indicator {
            position: absolute;
            top: 50%;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #6ba545 0%, #4a7c2c 100%);
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
            box-shadow: 0 4px 12px rgba(107, 165, 69, 0.3);
        }

        .crop-scroll-indicator:hover {
            box-shadow: 0 6px 16px rgba(107, 165, 69, 0.4);
            transform: scale(1.1);
        }

        .crop-scroll-left {
            left: 1rem;
        }

        .crop-scroll-right {
            right: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .crop-card {
                flex: 0 0 280px;
            }

            .header-section h1 {
                font-size: 1.75rem;
            }

            .header-section p {
                font-size: 1rem;
            }

            .crop-scroll-container {
                padding: 1.5rem;
            }

            .crop-scroll-indicator {
                width: 35px;
                height: 35px;
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .crop-card {
                flex: 0 0 240px;
            }

            .header-section {
                padding: 1.5rem 1rem;
            }

            .header-section h1 {
                font-size: 1.5rem;
            }

            .crop-card-body {
                padding: 1rem;
            }

            .crop-scroll-indicator {
                width: 32px;
                height: 32px;
                font-size: 0.9rem;
            }
        }
</style>

<div class="header-section">
    <h1>Premium Crops Selection</h1>
    <p>Explore our curated collection of high-quality crops - Scroll Right to Discover More!</p>
</div>

<div class="crop-scroll-container" id="crop-container">
    <div class="crop-row">
        <!-- Crop 1: black cowpea -->
        <div class="crop-card">
            <div class="crop-card-image">
                <div class="crop-carousel" data-crop-carousel="0">
                    <div class="crop-carousel-images">
                        <img src="{{ asset('images/crop/black cowpea/1.jpg') }}" alt="Black Cowpea" class="crop-carousel-image active">
                        <img src="{{ asset('images/crop/black cowpea/2.jpg') }}" alt="Black Cowpea" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/black cowpea/3.webp') }}" alt="Black Cowpea" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/black cowpea/4.jpg') }}" alt="Black Cowpea" class="crop-carousel-image">
                    </div>
                    <div class="crop-carousel-nav">
                        <button class="crop-carousel-btn prev" onclick="CropApp.prevImage(0)">‹</button>
                        <button class="crop-carousel-btn next" onclick="CropApp.nextImage(0)">›</button>
                    </div>
                    <div class="crop-carousel-dots">
                        <span class="crop-dot active" onclick="CropApp.goToImage(0, 0)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(0, 1)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(0, 2)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(0, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="crop-card-body">
                <h5 class="crop-title">Black Cowpea</h5>
                <span class="crop-type">Legume Crop</span>
                <div class="crop-rating">
                    <div class="crop-stars">★★★★★</div>
                    <span class="crop-rating-text">(328 reviews)</span>
                </div>
                <p class="crop-description">
                    <strong>Nitrogen-fixing legume</strong> improves soil fertility and provides high protein content. Excellent for crop rotation and sustainable farming practices.
                </p>
                <div class="crop-price">$45.99</div>
                <p class="crop-status in-stock">✓ In Stock</p>
                <div class="crop-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="1">
                        <input type="hidden" name="name" value="Black Cowpea">
                        <input type="hidden" name="type" value="crop">
                        <input type="hidden" name="price" value="45.99">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="crop-btn crop-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Fertilizer" target="_blank" class="crop-btn crop-btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- crop 2: chikpea -->
        <div class="crop-card">
            <div class="crop-card-image">
                <div class="crop-carousel" data-crop-carousel="1">
                    <div class="crop-carousel-images">
                        <img src="{{ asset('images/crop/chikpea/1.jpg') }}" alt="Chikpea" class="crop-carousel-image active">
                        <img src="{{ asset('images/crop/chikpea/2.webp') }}" alt="Chikpea" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/chikpea/3.webp') }}" alt="Chikpea" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/chikpea/4.jpg') }}" alt="Chikpea" class="crop-carousel-image">
                    </div>
                    <div class="crop-carousel-nav">
                        <button class="crop-carousel-btn prev" onclick="CropApp.prevImage(1)">‹</button>
                        <button class="crop-carousel-btn next" onclick="CropApp.nextImage(1)">›</button>
                    </div>
                    <div class="crop-carousel-dots">
                        <span class="crop-dot active" onclick="CropApp.goToImage(1, 0)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(1, 1)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(1, 2)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(1, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="crop-card-body">
                <h5 class="crop-title">Chikpea</h5>
                <span class="crop-type">Pulse Crop</span>
                <div class="crop-rating">
                    <div class="crop-stars">★★★★☆</div>
                    <span class="crop-rating-text">(245 reviews)</span>
                </div>
                <p class="crop-description">
                    <strong>Rich protein source</strong> with excellent nutritional value. Drought-tolerant and improves soil quality through nitrogen fixation in crop rotation systems.
                </p>
                <div class="crop-price">$32.50</div>
                <p class="crop-status in-stock">✓ In Stock</p>
                <div class="crop-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="2">
                        <input type="hidden" name="name" value="Chikpea">
                        <input type="hidden" name="type" value="crop">
                        <input type="hidden" name="price" value="32.50">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="crop-btn crop-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Urea" target="_blank" class="crop-btn crop-btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- crop 3: corn -->
        <div class="crop-card">
            <div class="crop-card-image">
                <div class="crop-carousel" data-crop-carousel="2">
                    <div class="crop-carousel-images">
                        <img src="{{ asset('images/crop/corn/1.jpg') }}" alt="Corn" class="crop-carousel-image active">
                        <img src="{{ asset('images/crop/corn/2.jpg') }}" alt="Corn" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/corn/3.webp') }}" alt="Corn" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/corn/4.webp') }}" alt="Corn" class="crop-carousel-image">
                    </div>
                    <div class="crop-carousel-nav">
                        <button class="crop-carousel-btn prev" onclick="CropApp.prevImage(2)">‹</button>
                        <button class="crop-carousel-btn next" onclick="CropApp.nextImage(2)">›</button>
                    </div>
                    <div class="crop-carousel-dots">
                        <span class="crop-dot active" onclick="CropApp.goToImage(2, 0)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(2, 1)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(2, 2)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(2, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="crop-card-body">
                <h5 class="crop-title">Corn</h5>
                <span class="crop-type">Cereal Crop</span>
                <div class="crop-rating">
                    <div class="crop-stars">★★★★★</div>
                    <span class="crop-rating-text">(412 reviews)</span>
                </div>
                <p class="crop-description">
                    <strong>Versatile grain crop</strong> with high yield potential and multiple uses. Suitable for food, feed, and industrial applications with good market demand.
                </p>
                <div class="crop-price">$38.75</div>
                <p class="crop-status in-stock">✓ In Stock</p>
                <div class="crop-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="3">
                        <input type="hidden" name="name" value="Corn">
                        <input type="hidden" name="type" value="crop">
                        <input type="hidden" name="price" value="38.75">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="crop-btn crop-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Phosphate_fertilizer" target="_blank" class="crop-btn crop-btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- crop 4:  cowpea -->
        <div class="crop-card">
            <div class="crop-card-image">
                <div class="crop-carousel" data-crop-carousel="3">
                    <div class="crop-carousel-images">
                        <img src="{{ asset('images/crop/cowpea/1.jpg') }}" alt="Cowpea" class="crop-carousel-image active">
                        <img src="{{ asset('images/crop/cowpea/2.png') }}" alt="Cowpea" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/cowpea/3.jpg') }}" alt="Cowpea" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/cowpea/4.jpg') }}" alt="Cowpea" class="crop-carousel-image">
                    </div>
                    <div class="crop-carousel-nav">
                        <button class="crop-carousel-btn prev" onclick="CropApp.prevImage(3)">‹</button>
                        <button class="crop-carousel-btn next" onclick="CropApp.nextImage(3)">›</button>
                    </div>
                    <div class="crop-carousel-dots">
                        <span class="crop-dot active" onclick="CropApp.goToImage(3, 0)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(3, 1)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(3, 2)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(3, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="crop-card-body">
                <h5 class="crop-title">Cowpea</h5>
                <span class="crop-type">Legume Crop</span>
                <div class="crop-rating">
                    <div class="crop-stars">★★★★☆</div>
                    <span class="crop-rating-text">(189 reviews)</span>
                </div>
                <p class="crop-description">
                    <strong>Drought-tolerant pulse</strong> with high protein content for nutrition and livestock feed. Improves soil fertility and yields well in arid regions.
                </p>
                <div class="crop-price">$29.99</div>
                <p class="crop-status in-stock">✓ In Stock</p>
                <div class="crop-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="4">
                        <input type="hidden" name="name" value="Cowpea">
                        <input type="hidden" name="type" value="crop">
                        <input type="hidden" name="price" value="29.99">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="crop-btn crop-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Potassium_chloride" target="_blank" class="crop-btn crop-btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- crop 5:  field pea -->
        <div class="crop-card">
            <div class="crop-card-image">
                <div class="crop-carousel" data-crop-carousel="4">
                    <div class="crop-carousel-images">
                        <img src="{{ asset('images/crop/field pea/1.webp') }}" alt="Field Pea" class="crop-carousel-image active">
                        <img src="{{ asset('images/crop/field pea/2.jpg') }}" alt="Field Pea" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/field pea/3.webp') }}" alt="Field Pea" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/field pea/4.jpg') }}" alt="Field Pea" class="crop-carousel-image">
                    </div>
                    <div class="crop-carousel-nav">
                        <button class="crop-carousel-btn prev" onclick="CropApp.prevImage(4)">‹</button>
                        <button class="crop-carousel-btn next" onclick="CropApp.nextImage(4)">›</button>
                    </div>
                    <div class="crop-carousel-dots">
                        <span class="crop-dot active" onclick="CropApp.goToImage(4, 0)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(4, 1)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(4, 2)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(4, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="crop-card-body">
                <h5 class="crop-title">Field Pea</h5>
                <span class="crop-type">Pulse Crop</span>
                <div class="crop-rating">
                    <div class="crop-stars">★★★★★</div>
                    <span class="crop-rating-text">(267 reviews)</span>
                </div>
                <p class="crop-description">
                    <strong>Cold-season legume</strong> with high protein content and excellent market value. Enriches soil with nitrogen and reduces disease pressure in rotation.
                </p>
                <div class="crop-price">$18.50</div>
                <p class="crop-status in-stock">✓ In Stock</p>
                <div class="crop-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="5">
                        <input type="hidden" name="name" value="Field Pea">
                        <input type="hidden" name="type" value="crop">
                        <input type="hidden" name="price" value="18.50">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="crop-btn crop-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Compost" target="_blank" class="crop-btn crop-btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- crop 6:  mung  -->
        <div class="crop-card">
            <div class="crop-card-image">
                <div class="crop-carousel" data-crop-carousel="5">
                    <div class="crop-carousel-images">
                        <img src="{{ asset('images/crop/mung/1.webp') }}" alt="Mung" class="crop-carousel-image active">
                        <img src="{{ asset('images/crop/mung/2.webp') }}" alt="Mung" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/mung/3.webp') }}" alt="Mung" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/mung/4.jpg') }}" alt="Mung" class="crop-carousel-image">
                    </div>
                    <div class="crop-carousel-nav">
                        <button class="crop-carousel-btn prev" onclick="CropApp.prevImage(5)">‹</button>
                        <button class="crop-carousel-btn next" onclick="CropApp.nextImage(5)">›</button>
                    </div>
                    <div class="crop-carousel-dots">
                        <span class="crop-dot active" onclick="CropApp.goToImage(5, 0)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(5, 1)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(5, 2)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(5, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="crop-card-body">
                <h5 class="crop-title">Mung</h5>
                <span class="crop-type">Pulse Crop</span>
                <div class="crop-rating">
                    <div class="crop-stars">★★★★☆</div>
                    <span class="crop-rating-text">(156 reviews)</span>
                </div>
                <p class="crop-description">
                    <strong>Fast-growing legume</strong> with high protein and mineral content. Perfect for hot climates with minimal water requirements and quick harvest cycle.
                </p>
                <div class="crop-price">$41.75</div>
                <p class="crop-status in-stock">✓ In Stock</p>
                <div class="crop-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="6">
                        <input type="hidden" name="name" value="Mung">
                        <input type="hidden" name="type" value="crop">
                        <input type="hidden" name="price" value="41.75">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="crop-btn crop-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Diammonium_phosphate" target="_blank" class="crop-btn crop-btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- crop 7: peanut -->
        <div class="crop-card">
            <div class="crop-card-image">
                <div class="crop-carousel" data-crop-carousel="6">
                    <div class="crop-carousel-images">
                        <img src="{{ asset('images/crop/peanut/1.jpg') }}" alt="Peanut" class="crop-carousel-image active">
                        <img src="{{ asset('images/crop/peanut/2.jpg') }}" alt="Peanut" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/peanut/3.avif') }}" alt="Peanut" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/peanut/4.webp') }}" alt="Peanut" class="crop-carousel-image">
                    </div>
                    <div class="crop-carousel-nav">
                        <button class="crop-carousel-btn prev" onclick="CropApp.prevImage(6)">‹</button>
                        <button class="crop-carousel-btn next" onclick="CropApp.nextImage(6)">›</button>
                    </div>
                    <div class="crop-carousel-dots">
                        <span class="crop-dot active" onclick="CropApp.goToImage(6, 0)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(6, 1)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(6, 2)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(6, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="crop-card-body">
                <h5 class="crop-title">Peanut</h5>
                <span class="crop-type">Oil & Nut Crop</span>
                <div class="crop-rating">
                    <div class="crop-stars">★★★★★</div>
                    <span class="crop-rating-text">(334 reviews)</span>
                </div>
                <p class="crop-description">
                    <strong>High-value cash crop</strong> with excellent oil and protein content for multiple uses. Improves soil structure and nitrogen content through nodulation.
                </p>
                <div class="crop-price">$24.99</div>
                <p class="crop-status in-stock">✓ In Stock</p>
                <div class="crop-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="7">
                        <input type="hidden" name="name" value="Peanut">
                        <input type="hidden" name="type" value="crop">
                        <input type="hidden" name="price" value="24.99">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="crop-btn crop-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Micronutrient" target="_blank" class="crop-btn crop-btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- crop 8: red pepper -->
        <div class="crop-card">
            <div class="crop-card-image">
                <div class="crop-carousel" data-crop-carousel="7">
                    <div class="crop-carousel-images">
                        <img src="{{ asset('images/crop/red pepper/1.webp') }}" alt="Red Pepper" class="crop-carousel-image active">
                        <img src="{{ asset('images/crop/red pepper/2.jpg') }}" alt="Red Pepper" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/red pepper/3.webp') }}" alt="Red Pepper" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/red pepper/4.webp') }}" alt="Red Pepper" class="crop-carousel-image">
                    </div>
                    <div class="crop-carousel-nav">
                        <button class="crop-carousel-btn prev" onclick="CropApp.prevImage(7)">‹</button>
                        <button class="crop-carousel-btn next" onclick="CropApp.nextImage(7)">›</button>
                    </div>
                    <div class="crop-carousel-dots">
                        <span class="crop-dot active" onclick="CropApp.goToImage(7, 0)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(7, 1)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(7, 2)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(7, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="crop-card-body">
                <h5 class="crop-title">Red Pepper</h5>
                <span class="crop-type">Vegetable Crop</span>
                <div class="crop-rating">
                    <div class="crop-stars">★★★★☆</div>
                    <span class="crop-rating-text">(298 reviews)</span>
                </div>
                <p class="crop-description">
                    <strong>High-value vegetable</strong> rich in vitamins and antioxidants with strong market demand. Requires good sunlight and warm temperatures for optimal growth.
                </p>
                <div class="crop-price">$19.99</div>
                <p class="crop-status in-stock">✓ In Stock</p>
                <div class="crop-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="8">
                        <input type="hidden" name="name" value="Red Pepper">
                        <input type="hidden" name="type" value="crop">
                        <input type="hidden" name="price" value="19.99">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="crop-btn crop-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Calcium_nitrate" target="_blank" class="crop-btn crop-btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- crop 9: sorghum -->
        <div class="crop-card">
            <div class="crop-card-image">
                <div class="crop-carousel" data-crop-carousel="8">
                    <div class="crop-carousel-images">
                        <img src="{{ asset('images/crop/sorghum/1.png') }}" alt="Sorghum" class="crop-carousel-image active">
                        <img src="{{ asset('images/crop/sorghum/2.jpg') }}" alt="Sorghum" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/sorghum/3.webp') }}" alt="Sorghum" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/sorghum/4.jpg') }}" alt="Sorghum" class="crop-carousel-image">
                    </div>
                    <div class="crop-carousel-nav">
                        <button class="crop-carousel-btn prev" onclick="CropApp.prevImage(8)">‹</button>
                        <button class="crop-carousel-btn next" onclick="CropApp.nextImage(8)">›</button>
                    </div>
                    <div class="crop-carousel-dots">
                        <span class="crop-dot active" onclick="CropApp.goToImage(8, 0)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(8, 1)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(8, 2)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(8, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="crop-card-body">
                <h5 class="crop-title">Sorghum</h5>
                <span class="crop-type">Cereal Crop</span>
                <div class="crop-rating">
                    <div class="crop-stars">★★★★★</div>
                    <span class="crop-rating-text">(521 reviews)</span>
                </div>
                <p class="crop-description">
                    <strong>Drought-resistant grain</strong> used for food, feed, and biofuel production. Highly adaptable to poor soils and arid conditions with excellent yield.
                </p>
                <div class="crop-price">$22.75</div>
                <p class="crop-status in-stock">✓ In Stock</p>
                <div class="crop-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="9">
                        <input type="hidden" name="name" value="Sorghum">
                        <input type="hidden" name="type" value="crop">
                        <input type="hidden" name="price" value="22.75">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="crop-btn crop-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Foliar_feeding" target="_blank" class="crop-btn crop-btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- crop 10: sunflower -->
        <div class="crop-card">
            <div class="crop-card-image">
                <div class="crop-carousel" data-crop-carousel="9">
                    <div class="crop-carousel-images">
                        <img src="{{ asset('images/crop/sunflower/1.webp') }}" alt="Sunflower" class="crop-carousel-image active">
                        <img src="{{ asset('images/crop/sunflower/2.jpg') }}" alt="Sunflower" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/sunflower/3.webp') }}" alt="Sunflower" class="crop-carousel-image">
                        <img src="{{ asset('images/crop/sunflower/4.jpg') }}" alt="Sunflower" class="crop-carousel-image">
                    </div>
                    <div class="crop-carousel-nav">
                        <button class="crop-carousel-btn prev" onclick="CropApp.prevImage(9)">‹</button>
                        <button class="crop-carousel-btn next" onclick="CropApp.nextImage(9)">›</button>
                    </div>
                    <div class="crop-carousel-dots">
                        <span class="crop-dot active" onclick="CropApp.goToImage(9, 0)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(9, 1)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(9, 2)"></span>
                        <span class="crop-dot" onclick="CropApp.goToImage(9, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="crop-card-body">
                <h5 class="crop-title">Sunflower</h5>
                <span class="crop-type">Oil Crop</span>
                <div class="crop-rating">
                    <div class="crop-stars">★★★★☆</div>
                    <span class="crop-rating-text">(403 reviews)</span>
                </div>
                <p class="crop-description">
                    <strong>High-oil producing crop</strong> with multiple industrial and food applications. Adaptable to various soils and climates with relatively low input requirements.
                </p>
                <div class="crop-price">$52.99</div>
                <p class="crop-status limited">⚠ Limited Stock</p>
                <div class="crop-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="10">
                        <input type="hidden" name="name" value="Sunflower">
                        <input type="hidden" name="type" value="crop">
                        <input type="hidden" name="price" value="52.99">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="crop-btn crop-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Slow-release_fertilizer" target="_blank" class="crop-btn crop-btn-outline">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Fertilizer Page - Isolated Functions
    const CropApp = {
        container: null,
        scrollAmount: 350,
        currentImageIndex: {},
        touchStartX: 0,
        touchEndX: 0,

        init() {
            this.container = document.getElementById('crop-container');
            this.setupTouchListeners();
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
        },

        nextImage(carouselId) {
            const carousel = document.querySelector(`[data-crop-carousel="${carouselId}"]`);
            if (!carousel) return;

            const images = carousel.querySelectorAll('.crop-carousel-image');
            if (images.length === 0) return;

            if (!this.currentImageIndex[carouselId]) {
                this.currentImageIndex[carouselId] = 0;
            }

            this.currentImageIndex[carouselId] = (this.currentImageIndex[carouselId] + 1) % images.length;
            this.updateCarousel(carousel, this.currentImageIndex[carouselId]);
        },

        prevImage(carouselId) {
            const carousel = document.querySelector(`[data-crop-carousel="${carouselId}"]`);
            if (!carousel) return;

            const images = carousel.querySelectorAll('.crop-carousel-image');
            if (images.length === 0) return;

            if (!this.currentImageIndex[carouselId]) {
                this.currentImageIndex[carouselId] = 0;
            }

            this.currentImageIndex[carouselId] = (this.currentImageIndex[carouselId] - 1 + images.length) % images.length;
            this.updateCarousel(carousel, this.currentImageIndex[carouselId]);
        },

        goToImage(carouselId, index) {
            const carousel = document.querySelector(`[data-crop-carousel="${carouselId}"]`);
            if (!carousel) return;

            this.currentImageIndex[carouselId] = index;
            this.updateCarousel(carousel, index);
        },

        updateCarousel(carousel, index) {
            const images = carousel.querySelectorAll('.crop-carousel-image');
            const dots = carousel.querySelectorAll('.crop-dot');

            images.forEach(img => img.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));

            if (images[index]) images[index].classList.add('active');
            if (dots[index]) dots[index].classList.add('active');
        },

        setupTouchListeners() {
            const carousels = document.querySelectorAll('.crop-carousel');

            carousels.forEach((carousel, index) => {
                carousel.setAttribute('data-crop-carousel', index);

                carousel.addEventListener('touchstart', (e) => {
                    this.touchStartX = e.changedTouches[0].screenX;
                }, false);

                carousel.addEventListener('touchend', (e) => {
                    this.touchEndX = e.changedTouches[0].screenX;
                    this.handleSwipe(index);
                }, false);
            });
        },

        handleSwipe(carouselId) {
            if (this.touchStartX - this.touchEndX > 50) {
                this.nextImage(carouselId);
            }
            if (this.touchEndX - this.touchStartX > 50) {
                this.prevImage(carouselId);
            }
        }
    };

    // Expose functions globally for inline onclick handlers
    window.CropApp = CropApp;

    document.addEventListener('DOMContentLoaded', function() {
        CropApp.init();
    });
</script>

</body>
</html>
