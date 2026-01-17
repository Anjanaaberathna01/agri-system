<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fertilizers - SpasilaLahanPetani</title>
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
            background-color: #f0f8f5;
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
            color: #1b5e20;
            font-size: 2.5rem;
            font-weight: 700;
        }

        .header-section p {
            color: #2e7d32;
            font-size: 1.125rem;
            margin: 0;
        }

        /* Horizontal Scroll Container */
        .fertilizer-scroll-container {
            overflow-x: auto;
            overflow-y: hidden;
            padding: 2rem;
            background: white;
            margin: 0;
            scroll-behavior: smooth;
            position: relative;
        }

        /* Custom Scrollbar */
        .fertilizer-scroll-container::-webkit-scrollbar {
            height: 8px;
        }

        .fertilizer-scroll-container::-webkit-scrollbar-track {
            background: #e8f5e9;
            border-radius: 10px;
        }

        .fertilizer-scroll-container::-webkit-scrollbar-thumb {
            background: #43a047;
            border-radius: 10px;
        }

        .fertilizer-scroll-container::-webkit-scrollbar-thumb:hover {
            background: #66bb6a;
        }

        /* Fertilizers Row Container */
        .fertilizer-row {
            display: flex;
            gap: 1.5rem;
            min-width: min-content;
            padding-bottom: 1rem;
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
            border-color: #43a047;
        }

        .fertilizer-card-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #66bb6a 0%, #43a047 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            overflow: hidden;
        }

        .fertilizer-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .fertilizer-carousel {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .fertilizer-carousel-images {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .fertilizer-carousel-image {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.4s ease-in-out;
        }

        .fertilizer-carousel-image.active {
            opacity: 1;
        }

        .fertilizer-carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 8px;
            z-index: 5;
        }

        .fertilizer-carousel-btn {
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
            color: #1b5e20;
            transition: all 0.3s ease;
            pointer-events: all;
            box-shadow: 0 2px 8px rgba(27, 94, 32, 0.2);
            font-weight: bold;
        }

        .fertilizer-carousel-btn:hover {
            background: rgba(255, 255, 255, 1);
            transform: scale(1.1);
        }

        .fertilizer-carousel-dots {
            position: absolute;
            bottom: 8px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 6px;
            z-index: 5;
        }

        .fertilizer-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .fertilizer-dot.active {
            background: #43a047;
            width: 24px;
            border-radius: 4px;
        }

        .fertilizer-dot:hover {
            background: rgba(255, 255, 255, 0.9);
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
            color: #1b5e20;
            margin-bottom: 0.75rem;
        }

        .fertilizer-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
            font-size: 0.85rem;
        }

        .fertilizer-stars {
            display: flex;
            gap: 0.2rem;
            color: #43a047;
        }

        .fertilizer-rating-text {
            color: #558b2f;
            font-size: 0.8rem;
        }

        .fertilizer-description {
            font-size: 0.85rem;
            color: #558b2f;
            line-height: 1.4;
            margin-bottom: 1rem;
            flex-grow: 1;
        }

        .fertilizer-description strong {
            color: #1b5e20;
        }

        .fertilizer-type {
            font-size: 0.8rem;
            background: #e8f5e9;
            color: #2e7d32;
            padding: 0.3rem 0.6rem;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 0.75rem;
            font-weight: 500;
        }

        .fertilizer-price {
            font-size: 1.5rem;
            color: #2e7d32;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .fertilizer-status {
            font-size: 0.85rem;
            color: #558b2f;
            margin-bottom: 1rem;
        }

        .fertilizer-status.in-stock {
            color: #43a047;
        }

        .fertilizer-status.limited {
            color: #7cb342;
        }

        .fertilizer-buttons {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-top: auto;
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
            background: linear-gradient(135deg, #66bb6a 0%, #43a047 100%);
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
            border: 2px solid #43a047;
        }

        .fertilizer-btn-outline:hover {
            background: #f1f8e9;
            border-color: #43a047;
            color: #2e7d32;
        }

        /* Scroll Indicators */
        .fertilizer-scroll-indicator {
            position: absolute;
            top: 50%;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #66bb6a 0%, #43a047 100%);
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
            box-shadow: 0 4px 12px rgba(102, 187, 106, 0.3);
        }

        .fertilizer-scroll-indicator:hover {
            box-shadow: 0 6px 16px rgba(102, 187, 106, 0.4);
            transform: scale(1.1);
        }

        .fertilizer-scroll-left {
            left: 1rem;
        }

        .fertilizer-scroll-right {
            right: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .fertilizer-card {
                flex: 0 0 280px;
            }

            .header-section h1 {
                font-size: 1.75rem;
            }

            .header-section p {
                font-size: 1rem;
            }

            .fertilizer-scroll-container {
                padding: 1.5rem;
            }

            .fertilizer-scroll-indicator {
                width: 35px;
                height: 35px;
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
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

            .fertilizer-scroll-indicator {
                width: 32px;
                height: 32px;
                font-size: 0.9rem;
            }
        }
</style>

<div class="header-section">
    <h1>Premium Fertilizers & Nutrients Store</h1>
    <p>High-quality fertilizers for optimal crop growth - Scroll Right to Explore More!</p>
</div>

<div class="fertilizer-scroll-container" id="fertilizer-container">
    <div class="fertilizer-row">
        <!-- Fertilizer 1: gypsum -->

        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="fertilizer-carousel" data-fertilizer-carousel="0">
                    <div class="fertilizer-carousel-images">
                        <img src="{{ asset('images/fertilizer/gypsum/1.jpg') }}" alt="Gypsum Fertilizer" class="fertilizer-carousel-image active">
                        <img src="{{ asset('images/fertilizer/gypsum/2.jpg') }}" alt="Gypsum Fertilizer" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/gypsum/3.jpg') }}" alt="Gypsum Fertilizer" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/gypsum/4.jpg') }}" alt="Gypsum Fertilizer" class="fertilizer-carousel-image">
                    </div>
                    <div class="fertilizer-carousel-nav">
                        <button class="fertilizer-carousel-btn prev" onclick="FertilizerApp.prevImage(0)">‹</button>
                        <button class="fertilizer-carousel-btn next" onclick="FertilizerApp.nextImage(0)">›</button>
                    </div>
                    <div class="fertilizer-carousel-dots">
                        <span class="fertilizer-dot active" onclick="FertilizerApp.goToImage(0, 0)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(0, 1)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(0, 2)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(0, 3)"></span>
                    </div>
                </div>
            </div>

            <div class="fertilizer-card-body">
                <a href="{{ route('fertilizers.gypsum') }}" style="text-decoration: none; color: inherit;">
                <h5 class="fertilizer-title">Gypsum Fertilizer</h5>
                <span class="fertilizer-type">Calcium Sulfate</span>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★★</div>
                    <span class="fertilizer-rating-text">(328 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    <strong>Calcium and sulfur source</strong> improves soil structure and provides essential minerals. Enhances root development and reduces soil compaction for better drainage.
                </p>
                <div class="fertilizer-price">Rs 1,599.00</div>
                <p class="fertilizer-status in-stock">✓ In Stock</p>
                <div class="fertilizer-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="1">
                        <input type="hidden" name="name" value="Gypsum Fertilizer">
                        <input type="hidden" name="type" value="fertilizer">
                        <input type="hidden" name="price" value="1599.00">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="fertilizer-btn fertilizer-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Fertilizer" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>
        </a>

        <!-- Fertilizer 2: Urea -->

        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="fertilizer-carousel" data-fertilizer-carousel="1">
                    <div class="fertilizer-carousel-images">
                        <img src="{{ asset('images/fertilizer/nitrogen/1.webp') }}" alt="Urea" class="fertilizer-carousel-image active">
                        <img src="{{ asset('images/fertilizer/nitrogen/2.webp') }}" alt="Urea" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/nitrogen/3.webp') }}" alt="Urea" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/nitrogen/4.jpg') }}" alt="Urea" class="fertilizer-carousel-image">
                    </div>
                    <div class="fertilizer-carousel-nav">
                        <button class="fertilizer-carousel-btn prev" onclick="FertilizerApp.prevImage(1)">‹</button>
                        <button class="fertilizer-carousel-btn next" onclick="FertilizerApp.nextImage(1)">›</button>
                    </div>
                    <div class="fertilizer-carousel-dots">
                        <span class="fertilizer-dot active" onclick="FertilizerApp.goToImage(1, 0)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(1, 1)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(1, 2)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(1, 3)"></span>
                    </div>
                </div>
            </div>

            <div class="fertilizer-card-body">
                <a href="{{ route('fertilizers.urea') }}" style="text-decoration: none; color: inherit;">
                <h5 class="fertilizer-title">Urea 46% Nitrogen</h5>
                <span class="fertilizer-type">Nitrogen Source</span>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★☆</div>
                    <span class="fertilizer-rating-text">(245 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    <strong>High nitrogen content</strong> for vigorous leaf and stem growth. Perfect for leafy vegetables and early-stage crop development.
                </p>
                <div class="fertilizer-price">Rs 1,250.00</div>
                <p class="fertilizer-status in-stock">✓ In Stock</p>
                <div class="fertilizer-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="2">
                        <input type="hidden" name="name" value="Urea 46% Nitrogen">
                        <input type="hidden" name="type" value="fertilizer">
                        <input type="hidden" name="price" value="1250.00">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="fertilizer-btn fertilizer-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Urea" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>
        </a>

        <!-- Fertilizer 3: boron -->

        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="fertilizer-carousel" data-fertilizer-carousel="2">
                    <div class="fertilizer-carousel-images">
                        <img src="{{ asset('images/fertilizer/boron/1.webp') }}" alt="Boron" class="fertilizer-carousel-image active">
                        <img src="{{ asset('images/fertilizer/boron/2.jpg') }}" alt="Boron" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/boron/3.webp') }}" alt="Boron" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/boron/4.jpeg') }}" alt="Boron" class="fertilizer-carousel-image">
                    </div>
                    <div class="fertilizer-carousel-nav">
                        <button class="fertilizer-carousel-btn prev" onclick="FertilizerApp.prevImage(2)">‹</button>
                        <button class="fertilizer-carousel-btn next" onclick="FertilizerApp.nextImage(2)">›</button>
                    </div>
                    <div class="fertilizer-carousel-dots">
                        <span class="fertilizer-dot active" onclick="FertilizerApp.goToImage(2, 0)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(2, 1)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(2, 2)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(2, 3)"></span>
                    </div>
                </div>
            </div>

            <div class="fertilizer-card-body">
                <a href="{{ route('fertilizers.boron') }}" style="text-decoration: none; color: inherit;">
                <h5 class="fertilizer-title">Boron Complex</h5>
                <span class="fertilizer-type">Trace Element</span>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★★</div>
                    <span class="fertilizer-rating-text">(412 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    <strong>Essential boron compound</strong> improves flowering and fruit set. Prevents bud necrosis and enhances pollination success significantly.
                </p>
                <div class="fertilizer-price">Rs 1,875.00</div>
                <p class="fertilizer-status in-stock">✓ In Stock</p>
                <div class="fertilizer-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="3">
                        <input type="hidden" name="name" value="Boron Complex">
                        <input type="hidden" name="type" value="fertilizer">
                        <input type="hidden" name="price" value="1875.00">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="fertilizer-btn fertilizer-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Phosphate_fertilizer" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>
        </a>

        <!-- Fertilizer 4: Potassium Chloride -->


        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="fertilizer-carousel" data-fertilizer-carousel="3">
                    <div class="fertilizer-carousel-images">
                        <img src="{{ asset('images/fertilizer/potassium/1.jpg') }}" alt="Potassium Chloride" class="fertilizer-carousel-image active">
                        <img src="{{ asset('images/fertilizer/potassium/2.jpg') }}" alt="Potassium Chloride" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/potassium/3.webp') }}" alt="Potassium Chloride" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/potassium/4.avif') }}" alt="Potassium Chloride" class="fertilizer-carousel-image">
                    </div>
                    <div class="fertilizer-carousel-nav">
                        <button class="fertilizer-carousel-btn prev" onclick="FertilizerApp.prevImage(3)">‹</button>
                        <button class="fertilizer-carousel-btn next" onclick="FertilizerApp.nextImage(3)">›</button>
                    </div>
                    <div class="fertilizer-carousel-dots">
                        <span class="fertilizer-dot active" onclick="FertilizerApp.goToImage(3, 0)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(3, 1)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(3, 2)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(3, 3)"></span>
                    </div>
                </div>
            </div>

            <div class="fertilizer-card-body">
                <a href="{{ route('fertilizers.potassium') }}" style="text-decoration: none; color: inherit;">
                <h5 class="fertilizer-title">Potassium Chloride 60% K₂O</h5>
                <span class="fertilizer-type">Potassium Source</span>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★☆</div>
                    <span class="fertilizer-rating-text">(189 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    <strong>High potassium content</strong> for disease resistance and crop quality. Improves color, taste, and shelf life of fruits and vegetables.
                </p>
                <div class="fertilizer-price">Rs 1,000.00</div>
                <p class="fertilizer-status in-stock">✓ In Stock</p>
                <div class="fertilizer-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="4">
                        <input type="hidden" name="name" value="Potassium Chloride 60% K₂O">
                        <input type="hidden" name="type" value="fertilizer">
                        <input type="hidden" name="price" value="1000.00">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="fertilizer-btn fertilizer-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Potassium_chloride" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>
        </a>

        <!-- Fertilizer 5: Organic sulfur -->


        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="fertilizer-carousel" data-fertilizer-carousel="4">
                    <div class="fertilizer-carousel-images">
                        <img src="{{ asset('images/fertilizer/sulphur/1.webp') }}" alt="Organic Compost" class="fertilizer-carousel-image active">
                        <img src="{{ asset('images/fertilizer/sulphur/2.webp') }}" alt="Organic Compost" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/sulphur/3.jpg') }}" alt="Organic Compost" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/sulphur/4.jpg') }}" alt="Organic Compost" class="fertilizer-carousel-image">
                    </div>
                    <div class="fertilizer-carousel-nav">
                        <button class="fertilizer-carousel-btn prev" onclick="FertilizerApp.prevImage(4)">‹</button>
                        <button class="fertilizer-carousel-btn next" onclick="FertilizerApp.nextImage(4)">›</button>
                    </div>
                    <div class="fertilizer-carousel-dots">
                        <span class="fertilizer-dot active" onclick="FertilizerApp.goToImage(4, 0)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(4, 1)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(4, 2)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(4, 3)"></span>
                    </div>
                </div>
            </div>

            <div class="fertilizer-card-body">
                <a href="{{ route('fertilizers.sulfur') }}" style="text-decoration: none; color: inherit;">
                <h5 class="fertilizer-title">Organic Sulfur Premium</h5>
                <span class="fertilizer-type">Sulfur Source</span>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★★</div>
                    <span class="fertilizer-rating-text">(267 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    <strong>100% organic sulfur</strong> enhances nutrient availability and soil health. Improves crop quality and supports beneficial microbial activity in soil.
                </p>
                <div class="fertilizer-price">Rs 1,250.00</div>
                <p class="fertilizer-status in-stock">✓ In Stock</p>
                <div class="fertilizer-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="5">
                        <input type="hidden" name="name" value="Organic Sulfur Premium">
                        <input type="hidden" name="type" value="fertilizer">
                        <input type="hidden" name="price" value="1250.00">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="fertilizer-btn fertilizer-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Compost" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>
        </a>

        <!-- Fertilizer 6: DAP (Diammonium Phosphate) -->


        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="fertilizer-carousel" data-fertilizer-carousel="5">
                    <div class="fertilizer-carousel-images">
                        <img src="{{ asset('images/fertilizer/phosphate/1.jpg') }}" alt="DAP" class="fertilizer-carousel-image active">
                        <img src="{{ asset('images/fertilizer/phosphate/2.webp') }}" alt="DAP" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/phosphate/3.jpg') }}" alt="DAP" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/phosphate/4.webp') }}" alt="DAP" class="fertilizer-carousel-image">
                    </div>
                    <div class="fertilizer-carousel-nav">
                        <button class="fertilizer-carousel-btn prev" onclick="FertilizerApp.prevImage(5)">‹</button>
                        <button class="fertilizer-carousel-btn next" onclick="FertilizerApp.nextImage(5)">›</button>
                    </div>
                    <div class="fertilizer-carousel-dots">
                        <span class="fertilizer-dot active" onclick="FertilizerApp.goToImage(5, 0)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(5, 1)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(5, 2)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(5, 3)"></span>
                    </div>
                </div>
            </div>

            <div class="fertilizer-card-body">
                <a href="{{ route('fertilizers.phosphate') }}" style="text-decoration: none; color: inherit;">
                <h5 class="fertilizer-title">Diammonium phosphate 18:46:0</h5>
                <span class="fertilizer-type">Complex NPK</span>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★☆</div>
                    <span class="fertilizer-rating-text">(156 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    <strong>Nitrogen and phosphorus blend</strong> ideal for early crop growth. Promotes root development and early flowering for increased yields.
                </p>
                <div class="fertilizer-price">Rs 1,175.00</div>
                <p class="fertilizer-status in-stock">✓ In Stock</p>
                <div class="fertilizer-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="6">
                        <input type="hidden" name="name" value="Diammonium phosphate 18:46:0">
                        <input type="hidden" name="type" value="fertilizer">
                        <input type="hidden" name="price" value="1175.00">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="fertilizer-btn fertilizer-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Diammonium_phosphate" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>
        </a>

        <!-- Fertilizer 7: zinc -->


        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="fertilizer-carousel" data-fertilizer-carousel="6">
                    <div class="fertilizer-carousel-images">
                        <img src="{{ asset('images/fertilizer/zinc/1.jpg') }}" alt="Micronutrients" class="fertilizer-carousel-image active">
                        <img src="{{ asset('images/fertilizer/zinc/2.webp') }}" alt="Micronutrients" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/zinc/3.jpg') }}" alt="Micronutrients" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/zinc/4.jpg') }}" alt="Micronutrients" class="fertilizer-carousel-image">
                    </div>
                    <div class="fertilizer-carousel-nav">
                        <button class="fertilizer-carousel-btn prev" onclick="FertilizerApp.prevImage(6)">‹</button>
                        <button class="fertilizer-carousel-btn next" onclick="FertilizerApp.nextImage(6)">›</button>
                    </div>
                    <div class="fertilizer-carousel-dots">
                        <span class="fertilizer-dot active" onclick="FertilizerApp.goToImage(6, 0)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(6, 1)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(6, 2)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(6, 3)"></span>
                    </div>
                </div>
            </div>

            <div class="fertilizer-card-body">
                <a href="{{ route('fertilizers.zinc') }}" style="text-decoration: none; color: inherit;">
                <h5 class="fertilizer-title">Zinc Complex</h5>
                <span class="fertilizer-type">Micronutrient</span>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★★</div>
                    <span class="fertilizer-rating-text">(334 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    <strong>Zinc-based micronutrient</strong> essential for enzyme function and plant growth. Prevents deficiency symptoms and improves overall crop productivity.
                </p>
                <div class="fertilizer-price">Rs 1,099.00</div>
                <p class="fertilizer-status in-stock">✓ In Stock</p>
                <div class="fertilizer-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="7">
                        <input type="hidden" name="name" value="Zinc Complex">
                        <input type="hidden" name="type" value="fertilizer">
                        <input type="hidden" name="price" value="1099.00">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="fertilizer-btn fertilizer-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Micronutrient" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>
        </a>

        <!-- Fertilizer 8: molybdenum -->


        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="fertilizer-carousel" data-fertilizer-carousel="7">
                    <div class="fertilizer-carousel-images">
                        <img src="{{ asset('images/fertilizer/molybdenum/1.jpg') }}" alt="Molybdenum" class="fertilizer-carousel-image active">
                        <img src="{{ asset('images/fertilizer/molybdenum/2.webp') }}" alt="Molybdenum" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/molybdenum/3.jpg') }}" alt="Molybdenum" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/molybdenum/4.jpg') }}" alt="Molybdenum" class="fertilizer-carousel-image">
                    </div>
                    <div class="fertilizer-carousel-nav">
                        <button class="fertilizer-carousel-btn prev" onclick="FertilizerApp.prevImage(7)">‹</button>
                        <button class="fertilizer-carousel-btn next" onclick="FertilizerApp.nextImage(7)">›</button>
                    </div>
                    <div class="fertilizer-carousel-dots">
                        <span class="fertilizer-dot active" onclick="FertilizerApp.goToImage(7, 0)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(7, 1)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(7, 2)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(7, 3)"></span>
                    </div>
                </div>
            </div>

            <div class="fertilizer-card-body">
                <a href="{{ route('fertilizers.molybdenum') }}" style="text-decoration: none; color: inherit;">
                <h5 class="fertilizer-title">Molybdenum Complex</h5>
                <span class="fertilizer-type">Trace Element</span>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★☆</div>
                    <span class="fertilizer-rating-text">(298 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    <strong>Molybdenum micronutrient</strong> essential for nitrogen fixation in legumes. Improves nitrogen utilization and enhances crop nodulation.
                </p>
                <div class="fertilizer-price">Rs 1199.00</div>
                <p class="fertilizer-status in-stock">✓ In Stock</p>
                <div class="fertilizer-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="8">
                        <input type="hidden" name="name" value="Molybdenum Complex">
                        <input type="hidden" name="type" value="fertilizer">
                        <input type="hidden" name="price" value="1199.00">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="fertilizer-btn fertilizer-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Calcium_nitrate" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>
        </a>

        <!-- Fertilizer 9: mixed -->


        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="fertilizer-carousel" data-fertilizer-carousel="8">
                    <div class="fertilizer-carousel-images">
                        <img src="{{ asset('images/fertilizer/mixed/1.webp') }}" alt="Mixed Fertilizer" class="fertilizer-carousel-image active">
                        <img src="{{ asset('images/fertilizer/mixed/2.jpg') }}" alt="Mixed Fertilizer" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/mixed/3.jpg') }}" alt="Mixed Fertilizer" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/mixed/4.avif') }}" alt="Mixed Fertilizer" class="fertilizer-carousel-image">
                    </div>
                    <div class="fertilizer-carousel-nav">
                        <button class="fertilizer-carousel-btn prev" onclick="FertilizerApp.prevImage(8)">‹</button>
                        <button class="fertilizer-carousel-btn next" onclick="FertilizerApp.nextImage(8)">›</button>
                    </div>
                    <div class="fertilizer-carousel-dots">
                        <span class="fertilizer-dot active" onclick="FertilizerApp.goToImage(8, 0)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(8, 1)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(8, 2)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(8, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="fertilizer-card-body">
                <a href="{{ route('fertilizers.mixed') }}" style="text-decoration: none; color: inherit;">
                <h5 class="fertilizer-title">Mixed Nutrient Blend</h5>
                <span class="fertilizer-type">All-Purpose Formula</span>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★★</div>
                    <span class="fertilizer-rating-text">(521 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    <strong>Complete nutrient mix</strong> with balanced NPK and micronutrients. Versatile formula suitable for all crop types and growing stages throughout the season.
                </p>
                <div class="fertilizer-price">Rs 1075.00</div>
                <p class="fertilizer-status in-stock">✓ In Stock</p>
                <div class="fertilizer-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="9">
                        <input type="hidden" name="name" value="Mixed Nutrient Blend">
                        <input type="hidden" name="type" value="fertilizer">
                        <input type="hidden" name="price" value="1075.00">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="fertilizer-btn fertilizer-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Foliar_feeding" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>
        </a>

        <!-- Fertilizer 10: magnesium -->

        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="fertilizer-carousel" data-fertilizer-carousel="9">
                    <div class="fertilizer-carousel-images">
                        <img src="{{ asset('images/fertilizer/magnesium/1.png') }}" alt="Magnesium" class="fertilizer-carousel-image active">
                        <img src="{{ asset('images/fertilizer/magnesium/2.webp') }}" alt="Magnesium" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/magnesium/3.jpg') }}" alt="Magnesium" class="fertilizer-carousel-image">
                        <img src="{{ asset('images/fertilizer/magnesium/4.jpg') }}" alt="Magnesium" class="fertilizer-carousel-image">
                    </div>
                    <div class="fertilizer-carousel-nav">
                        <button class="fertilizer-carousel-btn prev" onclick="FertilizerApp.prevImage(9)">‹</button>
                        <button class="fertilizer-carousel-btn next" onclick="FertilizerApp.nextImage(9)">›</button>
                    </div>
                    <div class="fertilizer-carousel-dots">
                        <span class="fertilizer-dot active" onclick="FertilizerApp.goToImage(9, 0)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(9, 1)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(9, 2)"></span>
                        <span class="fertilizer-dot" onclick="FertilizerApp.goToImage(9, 3)"></span>
                    </div>
                </div>
            </div>
            
            <div class="fertilizer-card-body">
                <a href="{{ route('fertilizers.magnesium') }}" style="text-decoration: none; color: inherit;"></a>
                <h5 class="fertilizer-title">Magnesium Sulfate</h5>
                <span class="fertilizer-type">Secondary Nutrient</span>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★☆</div>
                    <span class="fertilizer-rating-text">(403 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    <strong>Magnesium-rich compound</strong> prevents yellowing and enhances photosynthesis. Improves plant vigor and increases yield potential significantly.
                </p>
                <div class="fertilizer-price">Rs 1075.00</div>
                <p class="fertilizer-status limited">⚠ Limited Stock</p>
                <div class="fertilizer-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="10">
                        <input type="hidden" name="name" value="Magnesium Sulfate">
                        <input type="hidden" name="type" value="fertilizer">
                        <input type="hidden" name="price" value="1075.00">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="fertilizer-btn fertilizer-btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Slow-release_fertilizer" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>
</a>

<script>
    // Fertilizer Page - Isolated Functions
    const FertilizerApp = {
        container: null,
        scrollAmount: 350,
        currentImageIndex: {},
        touchStartX: 0,
        touchEndX: 0,

        init() {
            this.container = document.getElementById('fertilizer-container');
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
            const carousel = document.querySelector(`[data-fertilizer-carousel="${carouselId}"]`);
            if (!carousel) return;

            const images = carousel.querySelectorAll('.fertilizer-carousel-image');
            if (images.length === 0) return;

            if (!this.currentImageIndex[carouselId]) {
                this.currentImageIndex[carouselId] = 0;
            }

            this.currentImageIndex[carouselId] = (this.currentImageIndex[carouselId] + 1) % images.length;
            this.updateCarousel(carousel, this.currentImageIndex[carouselId]);
        },

        prevImage(carouselId) {
            const carousel = document.querySelector(`[data-fertilizer-carousel="${carouselId}"]`);
            if (!carousel) return;

            const images = carousel.querySelectorAll('.fertilizer-carousel-image');
            if (images.length === 0) return;

            if (!this.currentImageIndex[carouselId]) {
                this.currentImageIndex[carouselId] = 0;
            }

            this.currentImageIndex[carouselId] = (this.currentImageIndex[carouselId] - 1 + images.length) % images.length;
            this.updateCarousel(carousel, this.currentImageIndex[carouselId]);
        },

        goToImage(carouselId, index) {
            const carousel = document.querySelector(`[data-fertilizer-carousel="${carouselId}"]`);
            if (!carousel) return;

            this.currentImageIndex[carouselId] = index;
            this.updateCarousel(carousel, index);
        },

        updateCarousel(carousel, index) {
            const images = carousel.querySelectorAll('.fertilizer-carousel-image');
            const dots = carousel.querySelectorAll('.fertilizer-dot');

            images.forEach(img => img.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));

            if (images[index]) images[index].classList.add('active');
            if (dots[index]) dots[index].classList.add('active');
        },

        setupTouchListeners() {
            const carousels = document.querySelectorAll('.fertilizer-carousel');

            carousels.forEach((carousel, index) => {
                carousel.setAttribute('data-fertilizer-carousel', index);

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
    window.FertilizerApp = FertilizerApp;

    document.addEventListener('DOMContentLoaded', function() {
        FertilizerApp.init();
    });
</script>

</body>
</html>
