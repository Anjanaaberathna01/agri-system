<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agricultural fertilizers - SpasilaLahanPetani</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            height: 8px;
        }

        .fertilizers-scroll-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .fertilizers-scroll-container::-webkit-scrollbar-thumb {
            background: #1afa38;
            border-radius: 10px;
        }

        .fertilizers-scroll-container::-webkit-scrollbar-thumb:hover {
            background: #2bff13;
        }

        /* Fertilizers Row Container */
        .fertilizers-row {
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
            border-color: #78C841;
        }

        .fertilizer-card-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #44ee7a 0%, #1fff13 100%);
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

        .image-carousel {
            position: relative;
            width: 100%;
            height: 100%;
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
            padding: 0 8px;
            z-index: 5;
            pointer-events: none;
        }

        .carousel-btn {
            background: rgba(255, 255, 255, 0.8);
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #333;
            transition: all 0.3s ease;
            pointer-events: all;
        }

        .carousel-btn:hover {
            background: rgba(255, 255, 255, 1);
            transform: scale(1.1);
        }

        .carousel-dots {
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
            background: #78C841;
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
            color: #333;
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
            color: #ffc107;
        }

        .fertilizer-rating-text {
            color: #666;
            font-size: 0.8rem;
        }

        .fertilizer-description {
            font-size: 0.85rem;
            color: #666;
            line-height: 1.4;
            margin-bottom: 1rem;
            flex-grow: 1;
        }

        .fertilizer-description strong {
            color: #333;
        }

        .fertilizer-price {
            font-size: 1.5rem;
            color: #F25912;
;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .fertilizer-status {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 1rem;
        }

        .fertilizer-status.in-stock {
            color: #F87B1B;
        }

        .fertilizer-status.limited {
            color: #ff9800;
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
            background: linear-gradient(135deg, #84c35a 0%, #78C841 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(119, 238, 68, 0.3);
        }

        .fertilizer-btn-primary:hover {
            box-shadow: 0 6px 16px rgba(119, 238, 68, 0.4);
            transform: translateY(-2px);
        }

        .fertilizer-btn-outline {
            background: white;
            color: #12f234d8;
            border: 2px solid #4ff81b;
        }

        .fertilizer-btn-outline:hover {
            background: #f0f0ff;
            border-color: #4ff81b;
            color: #3ff212;
        }

        /* Scroll Indicators */
        .scroll-indicator {
            position: absolute;
            top: 50%;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #266d2d 0%, #2ac654 100%);
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
            box-shadow: 0 4px 12px rgba(68, 238, 94, 0.3);
        }

        .scroll-indicator:hover {
            box-shadow: 0 6px 16px rgba(68, 238, 99, 0.4);
            transform: scale(1.1);
        }

        .scroll-left {
            left: 1rem;
        }

        .scroll-right {
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

            .fertilizers-scroll-container {
                padding: 1.5rem;
            }

            .scroll-indicator {
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

            .scroll-indicator {
                width: 32px;
                height: 32px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>

<div class="header-section">
    <h1>Agricultural Fertilizers & Store</h1>
    <p>Quality farming tools for modern agriculture - Scroll Right to Explore More!</p>
</div>

<div class="fertilizers-scroll-container" id="fertilizersContainer">
    <div class="fertilizers-row">
        <!-- Fertilizer 1: Mixed -->
        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="image-carousel" data-carousel="0">
                    <div class="carousel-images">
                        <img src="{{ asset('images/fertilizer/mixed/2.jpg') }}" alt="Mixed Fertilizer" class="carousel-image active">
                        <img src="{{ asset('images/fertilizer/mixed/1.webp') }}" alt="Mixed Fertilizer" class="carousel-image">
                        <img src="{{ asset('images/fertilizer/mixed/3.jpg') }}" alt="Mixed Fertilizer" class="carousel-image">
                        <img src="{{ asset('images/fertilizer/mixed/4.avif') }}" alt="Mixed Fertilizer" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="prevImage(0)">‹</button>
                        <button class="carousel-btn next" onclick="nextImage(0)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="fertilizer-dot active" onclick="goToImage(0, 0)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(0, 1)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(0, 2)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(0, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="fertilizer-card-body">
                <h5 class="fertilizer-title">Mixed Fertilizer</h5>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★★</div>
                    <span class="fertilizer-rating-text">(100 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    A tool that turns over and breaks up soil before planting. Prepares the soil, buries residues, and controls weeds for optimal seed sowing.
                </p>
                <div class="fertilizer-price">$450.00</div>
                <p class="fertilizer-status in-stock">In Stock</p>
                <div class="fertilizer-buttons">
                    <button class="fertilizer-btn fertilizer-btn-primary">Add to Cart</button>
                    <a href="https://en.wikipedia.org/wiki/Plough" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Fertilizer 2:  nitrogen fertilizer  -->
        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="image-carousel" data-carousel="1">
                    <div class="carousel-images">
                        <img src="{{ asset('images/fertilizer/nitrogen/1.webp') }}" alt="Nitrogen Fertilizer" class="carousel-image active">
                        <img src="{{ asset('images/fertilizer/nitrogen/2.webp') }}" alt="Nitrogen Fertilizer" class="carousel-image">
                        <img src="{{ asset('images/fertilizer/nitrogen/3.webp') }}" alt="Nitrogen Fertilizer" class="carousel-image">
                        <img src="{{ asset('images/fertilizer/nitrogen/4.jpg') }}" alt="Nitrogen Fertilizer" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="prevImage(1)">‹</button>
                        <button class="carousel-btn next" onclick="nextImage(1)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="fertilizer-dot active" onclick="goToImage(1, 0)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(1, 1)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(1, 2)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(1, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="fertilizer-card-body">
                <h5 class="fertilizer-title">Nitrogen Fertilizer</h5>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★☆</div>
                    <span class="fertilizer-rating-text">(445 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    A traditional hand tool with a flat blade for breaking soil, removing weeds, shaping beds, and digging shallow furrows for planting.
                </p>
                <div class="fertilizer-price">$25.99</div>
                <p class="fertilizer-status in-stock">In Stock</p>
                <div class="fertilizer-buttons">
                    <button class="fertilizer-btn fertilizer-btn-primary">Add to Cart</button>
                    <a href="https://en.wikipedia.org/wiki/Hoe_(tool)" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Fertilizer 3: Scythe -->
        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="image-carousel" data-carousel="2">
                    <div class="carousel-images">
                        <img src="{{ asset('images/fertilizers/scythe/1.webp') }}" alt="Scythe" class="carousel-image active">
                        <img src="{{ asset('images/fertilizers/scythe/2.webp') }}" alt="Scythe" class="carousel-image">
                        <img src="{{ asset('images/fertilizers/scythe/3.webp') }}" alt="Scythe" class="carousel-image">
                        <img src="{{ asset('images/fertilizers/scythe/4.avif') }}" alt="Scythe" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="prevImage(2)">‹</button>
                        <button class="carousel-btn next" onclick="nextImage(2)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="fertilizer-dot active" onclick="goToImage(2, 0)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(2, 1)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(2, 2)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(2, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="fertilizer-card-body">
                <h5 class="fertilizer-title">scythe </h5>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★★</div>
                    <span class="fertilizer-rating-text">(412 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    A planting machine that places seeds at precise depth and spacing for even distribution and better germination with higher yields.
                </p>
                <div class="fertilizer-price">$1,299.00</div>
                <p class="fertilizer-status in-stock">✓ In Stock</p>
                <div class="fertilizer-buttons">
                    <button class="fertilizer-btn fertilizer-btn-primary">Add to Cart</button>
                    <a href="https://en.wikipedia.org/wiki/Seed_drill" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Fertilizer 4: weeding hoe -->
        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="image-carousel" data-carousel="3">
                    <div class="carousel-images">
                        <img src="{{ asset('images/fertilizers/weeding hoe/1.png') }}" alt="Weeding Hoe" class="carousel-image active">
                        <img src="{{ asset('images/fertilizers/weeding hoe/2.jpg') }}" alt="Weeding Hoe" class="carousel-image">
                        <img src="{{ asset('images/fertilizers/weeding hoe/3.jpg') }}" alt="Weeding Hoe" class="carousel-image">
                        <img src="{{ asset('images/fertilizers/weeding hoe/4.jpg') }}" alt="Weeding Hoe" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="prevImage(3)">‹</button>
                        <button class="carousel-btn next" onclick="nextImage(3)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="fertilizer-dot active" onclick="goToImage(3, 0)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(3, 1)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(3, 2)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(3, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="fertilizer-card-body">
                <h5 class="fertilizer-title">weeding hoe</h5>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★☆</div>
                    <span class="fertilizer-rating-text">(189 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    A one-wheel manually pushed container for transporting soil, compost, seeds, fertilizers, tools, and crops around the farm.
                </p>
                <div class="fertilizer-price">$89.99</div>
                <p class="fertilizer-status in-stock">✓ In Stock</p>
                <div class="fertilizer-buttons">
                    <button class="fertilizer-btn fertilizer-btn-primary">Add to Cart</button>
                    <a href="https://www.legit.ng" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Fertilizer 5: sickle -->
        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="image-carousel" data-carousel="4">
                    <div class="carousel-images">
                        <img src="{{ asset('images/fertilizers/sickle/1.webp') }}" alt="sickle" class="carousel-image active">
                        <img src="{{ asset('images/fertilizers/sickle/2.avif') }}" alt="sickle" class="carousel-image">
                        <img src="{{ asset('images/fertilizers/sickle/3.jpg') }}" alt="sickle" class="carousel-image">
                        <img src="{{ asset('images/fertilizers/sickle/4.avif') }}" alt="sickle" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="prevImage(4)">‹</button>
                        <button class="carousel-btn next" onclick="nextImage(4)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="fertilizer-dot active" onclick="goToImage(4, 0)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(4, 1)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(4, 2)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(4, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="fertilizer-card-body">
                <h5 class="fertilizer-title">sickle</h5>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★★</div>
                    <span class="fertilizer-rating-text">(267 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    A tool with metal tines for leveling soil, gathering debris, removing weeds, and spreading mulch after ploughing or planting.
                </p>
                <div class="fertilizer-price">$18.50</div>
                <p class="fertilizer-status in-stock">✓ In Stock</p>
                <div class="fertilizer-buttons">
                    <button class="fertilizer-btn fertilizer-btn-primary">Add to Cart</button>
                    <a href="https://www.legit.ng" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Fertilizer 6: spreyer -->
        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="image-carousel" data-carousel="5">
                    <div class="carousel-images">
                        <img src="{{ asset('images/fertilizers/spreyer/1.jpg') }}" alt="Spreyer" class="carousel-image active">
                        <img src="{{ asset('images/fertilizers/spreyer/2.jpg') }}" alt="Spreyer" class="carousel-image">
                        <img src="{{ asset('images/fertilizers/spreyer/3.png') }}" alt="Spreyer" class="carousel-image">
                        <img src="{{ asset('images/fertilizers/spreyer/4.jpg') }}" alt="Spreyer" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="prevImage(5)">‹</button>
                        <button class="carousel-btn next" onclick="nextImage(5)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="fertilizer-dot active" onclick="goToImage(5, 0)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(5, 1)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(5, 2)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(5, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="fertilizer-card-body">
                <h5 class="fertilizer-title">Backpack Spreyer</h5>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★☆</div>
                    <span class="fertilizer-rating-text">(156 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    A hand tool with a curved blade for cutting grasses, harvesting cereals, and trimming vegetation with precision and efficiency.
                </p>
                <div class="fertilizer-price">$15.99</div>
                <p class="fertilizer-status in-stock">✓ In Stock</p>
                <div class="fertilizer-buttons">
                    <button class="fertilizer-btn fertilizer-btn-primary">Add to Cart</button>
                    <a href="https://www.legit.ng" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Fertilizer 7: irregration pump -->
        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="image-carousel" data-carousel="6">
                    <div class="carousel-images">
                        <img src="{{ asset('images/fertilizers/irrigation pump/1.png') }}" alt="Irrigation Pump" class="carousel-image active">
                        <img src="{{ asset('images/fertilizers/irrigation pump/2.jpg') }}" alt="Irrigation Pump" class="carousel-image">
                        <img src="{{ asset('images/fertilizers/irrigation pump/3.jpg') }}" alt="Irrigation Pump" class="carousel-image">
                        <img src="{{ asset('images/fertilizers/irrigation pump/4.jpg') }}" alt="Irrigation Pump" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="prevImage(6)">‹</button>
                        <button class="carousel-btn next" onclick="nextImage(6)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="fertilizer-dot active" onclick="goToImage(6, 0)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(6, 1)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(6, 2)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(6, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="fertilizer-card-body">
                <h5 class="fertilizer-title">Irrigation Pump</h5>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★★</div>
                    <span class="fertilizer-rating-text">(334 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    Tools with broad blades for digging holes, lifting soil, mixing compost, and planting. Essential for soil preparation tasks.
                </p>
                <div class="fertilizer-price">$32.99</div>
                <p class="fertilizer-status in-stock">✓ In Stock</p>
                <div class="fertilizer-buttons">
                    <button class="fertilizer-btn fertilizer-btn-primary">Add to Cart</button>
                    <a href="https://www.legit.ng" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Fertilizer 8: lawn mower -->
        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="image-carousel" data-carousel="7">
                    <div class="carousel-images">
                        <img src="{{ asset('images/fertilizers/lawn mower/1.jpg') }}" alt="Lawn Mower" class="carousel-image active">
                        <img src="{{ asset('images/fertilizers/lawn mower/2.webp') }}" alt="Lawn Mower" class="carousel-image">
                        <img src="{{ asset('images/fertilizers/lawn mower/3.jpg') }}" alt="Lawn Mower" class="carousel-image">
                        <img src="{{ asset('images/fertilizers/lawn mower/4.jpg') }}" alt="Lawn Mower" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="prevImage(7)">‹</button>
                        <button class="carousel-btn next" onclick="nextImage(7)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="fertilizer-dot active" onclick="goToImage(7, 0)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(7, 1)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(7, 2)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(7, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="fertilizer-card-body">
                <h5 class="fertilizer-title">Lawn Mower</h5>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★☆</div>
                    <span class="fertilizer-rating-text">(298 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    Tools or machines that spray water, pesticides, or fertilizers to protect crops from pests and apply nutrients for better growth.
                </p>
                <div class="fertilizer-price">$149.99</div>
                <p class="fertilizer-status in-stock">✓ In Stock</p>
                <div class="fertilizer-buttons">
                    <button class="fertilizer-btn fertilizer-btn-primary">Add to Cart</button>
                    <a href="https://www.legit.ng" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Fertilizer 9: sprinkler -->
        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="image-carousel" data-carousel="8">
                    <div class="carousel-images">
                        <img src="{{ asset('images/fertilizers/sprinkler/1.jpg') }}" alt="Sprinkler" class="carousel-image active">
                        <img src="{{ asset('images/fertilizers/sprinkler/2.jpg') }}" alt="Sprinkler" class="carousel-image">
                        <img src="{{ asset('images/fertilizers/sprinkler/3.jpg') }}" alt="Sprinkler" class="carousel-image">
                        <img src="{{ asset('images/fertilizers/sprinkler/4.jpeg') }}" alt="Sprinkler" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="prevImage(8)">‹</button>
                        <button class="carousel-btn next" onclick="nextImage(8)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="fertilizer-dot active" onclick="goToImage(8, 0)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(8, 1)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(8, 2)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(8, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="fertilizer-card-body">
                <h5 class="fertilizer-title">Sprinkler</h5>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★★</div>
                    <span class="fertilizer-rating-text">(521 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    A powerful vehicle used to pull and power multiple farm implements for tilling, ploughing, planting, and hauling on large farms.
                </p>
                <div class="fertilizer-price">$35,999.00</div>
                <p class="fertilizer-status in-stock">✓ In Stock</p>
                <div class="fertilizer-buttons">
                    <button class="fertilizer-btn fertilizer-btn-primary">Add to Cart</button>
                    <a href="https://www.legit.ng" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Fertilizer 10: seed drill -->
        <div class="fertilizer-card">
            <div class="fertilizer-card-image">
                <div class="image-carousel" data-carousel="9">
                    <div class="carousel-images">
                        <img src="{{ asset('images/fertilizers/seed drill/1.jpg') }}" alt="Seed Drill" class="carousel-image active">
                        <img src="{{ asset('images/fertilizers/seed drill/2.jpg') }}" alt="Seed Drill" class="carousel-image">
                        <img src="{{ asset('images/fertilizers/seed drill/3.png') }}" alt="Seed Drill" class="carousel-image">
                        <img src="{{ asset('images/fertilizers/seed drill/4.jpg') }}" alt="Seed Drill" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="prevImage(9)">‹</button>
                        <button class="carousel-btn next" onclick="nextImage(9)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="fertilizer-dot active" onclick="goToImage(9, 0)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(9, 1)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(9, 2)"></span>
                        <span class="fertilizer-dot" onclick="goToImage(9, 3)"></span>
                    </div>
                </div>
            </div>
            <div class="fertilizer-card-body">
                <h5 class="fertilizer-title">Seed Drill (manually)</h5>
                <div class="fertilizer-rating">
                    <div class="fertilizer-stars">★★★★☆</div>
                    <span class="fertilizer-rating-text">(403 reviews)</span>
                </div>
                <p class="fertilizer-description">
                    A machine with rotating blades that breaks soil into fine particles, mixes residues, and prepares seedbeds quickly and efficiently.
                </p>
                <div class="fertilizer-price">$2,499.00</div>
                <p class="fertilizer-status limited">⚠ Limited Stock</p>
                <div class="fertilizer-buttons">
                    <button class="fertilizer-btn fertilizer-btn-primary">Add to Cart</button>
                    <a href="https://www.farmonaut.com" target="_blank" class="fertilizer-btn fertilizer-btn-outline">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Scroll functionality
    const container = document.getElementById('fertilizersContainer');
    const scrollAmount = 350;

    function scrollLeft() {
        container.scrollBy({
            left: -scrollAmount,
            behavior: 'smooth'
        });
    }

    function scrollRight() {
        container.scrollBy({
            left: scrollAmount,
            behavior: 'smooth'
        });
    }

    // Carousel functionality
    let currentImageIndex = {};

    function nextImage(carouselId) {
        const carousel = document.querySelector(`[data-carousel="${carouselId}"]`);
        const images = carousel.querySelectorAll('.carousel-image');
        const dots = carousel.querySelectorAll('.dot');

        if (!currentImageIndex[carouselId]) {
            currentImageIndex[carouselId] = 0;
        }

        currentImageIndex[carouselId] = (currentImageIndex[carouselId] + 1) % images.length;
        updateCarousel(carousel, currentImageIndex[carouselId]);
    }

    function prevImage(carouselId) {
        const carousel = document.querySelector(`[data-carousel="${carouselId}"]`);
        const images = carousel.querySelectorAll('.carousel-image');
        const dots = carousel.querySelectorAll('.dot');

        if (!currentImageIndex[carouselId]) {
            currentImageIndex[carouselId] = 0;
        }

        currentImageIndex[carouselId] = (currentImageIndex[carouselId] - 1 + images.length) % images.length;
        updateCarousel(carousel, currentImageIndex[carouselId]);
    }

    function goToImage(carouselId, index) {
        const carousel = document.querySelector(`[data-carousel="${carouselId}"]`);
        currentImageIndex[carouselId] = index;
        updateCarousel(carousel, index);
    }

    function updateCarousel(carousel, index) {
        const images = carousel.querySelectorAll('.carousel-image');
        const dots = carousel.querySelectorAll('.dot');

        images.forEach(img => img.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));

        images[index].classList.add('active');
        dots[index].classList.add('active');
    }

    // Swipe functionality
    let touchStartX = 0;
    let touchEndX = 0;

    document.addEventListener('DOMContentLoaded', function() {
        const carousels = document.querySelectorAll('.image-carousel');

        carousels.forEach((carousel, index) => {
            carousel.setAttribute('data-carousel', index);

            carousel.addEventListener('touchstart', function(e) {
                touchStartX = e.changedTouches[0].screenX;
            }, false);

            carousel.addEventListener('touchend', function(e) {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe(index);
            }, false);
        });
    });

    function handleSwipe(carouselId) {
        if (touchStartX - touchEndX > 50) {
            nextImage(carouselId);
        }
        if (touchEndX - touchStartX > 50) {
            prevImage(carouselId);
        }
    }
</script>

</body>
</html>
