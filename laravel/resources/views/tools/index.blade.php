<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tools - SpasilaLahanPetani</title>
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
            height: 8px;
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
            min-width: min-content;
            padding-bottom: 1rem;
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

        .tool-card-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #ee9944 0%, #FF9013 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            overflow: hidden;
        }

        .tool-card-image img {
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
        }

        .carousel-btn {
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
            color: #F87B1B;
            transition: all 0.3s ease;
            pointer-events: all;
            box-shadow: 0 2px 8px rgba(248, 123, 27, 0.2);
            font-weight: bold;
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

        .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dot.active {
            background: #FF9013;
            width: 24px;
            border-radius: 4px;
        }

        .dot:hover {
            background: rgba(255, 255, 255, 0.9);
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
            margin-bottom: 0.75rem;
        }

        .tool-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
            font-size: 0.85rem;
        }

        .tool-stars {
            display: flex;
            gap: 0.2rem;
            color: #ffc107;
        }

        .tool-rating-text {
            color: #666;
            font-size: 0.8rem;
        }

        .tool-description {
            font-size: 0.85rem;
            color: #666;
            line-height: 1.4;
            margin-bottom: 1rem;
            flex-grow: 1;
        }

        .tool-description strong {
            color: #333;
        }

        .tool-price {
            font-size: 1.5rem;
            color: #F25912;
;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .tool-status {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 1rem;
        }

        .tool-status.in-stock {
            color: #F87B1B;
        }

        .tool-status.limited {
            color: #ff9800;
        }

        .tool-buttons {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-top: auto;
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

        /* Scroll Indicators */
        .scroll-indicator {
            position: absolute;
            top: 50%;
            width: 40px;
            height: 40px;
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
            left: 1rem;
        }

        .scroll-right {
            right: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
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
                width: 35px;
                height: 35px;
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
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
                width: 32px;
                height: 32px;
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
        <!-- Tool 1: Rake -->
        <div class="tool-card">
            <div class="tool-card-image">
                <div class="image-carousel" data-carousel="0">
                    <div class="carousel-images">
                        <img src="{{ asset('images/tools/rake/1.jpg') }}" alt="Rake" class="carousel-image active">
                        <img src="{{ asset('images/tools/rake/2.webp') }}" alt="Rake" class="carousel-image">
                        <img src="{{ asset('images/tools/rake/3.webp') }}" alt="Rake" class="carousel-image">
                        <img src="{{ asset('images/tools/rake/4.jpg') }}" alt="Rake" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="ToolsApp.prevImage(0)">‹</button>
                        <button class="carousel-btn next" onclick="ToolsApp.nextImage(0)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="dot active" onclick="ToolsApp.goToImage(0, 0)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(0, 1)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(0, 2)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(0, 3)"></span>
                    </div>
                </div>
            </div>

            <!-- tool card body -->
            <div class="tool-card-body">
                <a href="{{ route('tools.rake') }}" style="text-decoration: none; color: inherit;">
                <h5 class="tool-title">Rake</h5>
                <div class="tool-rating">
                    <div class="tool-stars">★★★★★</div>
                    <span class="tool-rating-text">(328 reviews)</span>
                </div>
                <p class="tool-description">
                    A tool that turns over and breaks up soil before planting. Prepares the soil, buries residues, and controls weeds for optimal seed sowing.
                </p>
                <div class="tool-price">Rs 1450.00</div>
                <p class="tool-status in-stock">✓ In Stock</p>
                <div class="tool-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="1">
                        <input type="hidden" name="name" value="Rake">
                        <input type="hidden" name="type" value="tool">
                        <input type="hidden" name="price" value="1450.00">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Plough" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>
        </a>

        <!-- Tool 2: spading fork -->

        <div class="tool-card">
            <div class="tool-card-image">
                <div class="image-carousel" data-carousel="1">
                    <div class="carousel-images">
                        <img src="{{ asset('images/tools/spading fork/1.jpg') }}" alt="spading fork" class="carousel-image active">
                        <img src="{{ asset('images/tools/spading fork/2.jpg') }}" alt="spading fork" class="carousel-image">
                        <img src="{{ asset('images/tools/spading fork/3.jpg') }}" alt="spading fork" class="carousel-image">
                        <img src="{{ asset('images/tools/spading fork/4.webp') }}" alt="spading fork" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="ToolsApp.prevImage(1)">‹</button>
                        <button class="carousel-btn next" onclick="ToolsApp.nextImage(1)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="dot active" onclick="ToolsApp.goToImage(1, 0)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(1, 1)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(1, 2)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(1, 3)"></span>
                    </div>
                </div>
            </div>

            <!-- tool card body -->
            <div class="tool-card-body">
                <a href="{{ route('tools.spading_fork') }}" style="text-decoration: none; color: inherit;">
                <h5 class="tool-title">spading fork</h5>
                <div class="tool-rating">
                    <div class="tool-stars">★★★★☆</div>
                    <span class="tool-rating-text">(245 reviews)</span>
                </div>
                <p class="tool-description">
                    A traditional hand tool with a flat blade for breaking soil, removing weeds, shaping beds, and digging shallow furrows for planting.
                </p>
                <div class="tool-price">Rs 1,250.00</div>
                <p class="tool-status in-stock">✓ In Stock</p>
                <div class="tool-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="2">
                        <input type="hidden" name="name" value="Spading Fork">
                        <input type="hidden" name="type" value="tool">
                        <input type="hidden" name="price" value="1250.00">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Hoe_(tool)" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>
        </a>

        <!-- Tool 3: Scythe -->

        <div class="tool-card">
            <div class="tool-card-image">
                <div class="image-carousel" data-carousel="2">
                    <div class="carousel-images">
                        <img src="{{ asset('images/tools/scythe/1.webp') }}" alt="Scythe" class="carousel-image active">
                        <img src="{{ asset('images/tools/scythe/2.webp') }}" alt="Scythe" class="carousel-image">
                        <img src="{{ asset('images/tools/scythe/3.webp') }}" alt="Scythe" class="carousel-image">
                        <img src="{{ asset('images/tools/scythe/4.avif') }}" alt="Scythe" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="ToolsApp.prevImage(2)">‹</button>
                        <button class="carousel-btn next" onclick="ToolsApp.nextImage(2)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="dot active" onclick="ToolsApp.goToImage(2, 0)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(2, 1)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(2, 2)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(2, 3)"></span>
                    </div>
                </div>
            </div>


            <div class="tool-card-body">
                <a href="{{ route('tools.scythe') }}" style="text-decoration: none; color: inherit;">
                <h5 class="tool-title">scythe </h5>
                <div class="tool-rating">
                    <div class="tool-stars">★★★★★</div>
                    <span class="tool-rating-text">(412 reviews)</span>
                </div>
                <p class="tool-description">
                    A planting machine that places seeds at precise depth and spacing for even distribution and better germination with higher yields.
                </p>
                <div class="tool-price">Rs 1,299.00</div>
                <p class="tool-status in-stock">✓ In Stock</p>
                <div class="tool-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="3">
                        <input type="hidden" name="name" value="Scythe">
                        <input type="hidden" name="type" value="tool">
                        <input type="hidden" name="price" value="1299.00">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://en.wikipedia.org/wiki/Seed_drill" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>
        </a>

        <!-- Tool 4: weeding hoe -->

        <div class="tool-card">
            <div class="tool-card-image">
                <div class="image-carousel" data-carousel="3">
                    <div class="carousel-images">
                        <img src="{{ asset('images/tools/weeding hoe/1.png') }}" alt="Weeding Hoe" class="carousel-image active">
                        <img src="{{ asset('images/tools/weeding hoe/2.jpg') }}" alt="Weeding Hoe" class="carousel-image">
                        <img src="{{ asset('images/tools/weeding hoe/3.jpg') }}" alt="Weeding Hoe" class="carousel-image">
                        <img src="{{ asset('images/tools/weeding hoe/4.jpg') }}" alt="Weeding Hoe" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="ToolsApp.prevImage(3)">‹</button>
                        <button class="carousel-btn next" onclick="ToolsApp.nextImage(3)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="dot active" onclick="ToolsApp.goToImage(3, 0)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(3, 1)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(3, 2)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(3, 3)"></span>
                    </div>
                </div>
            </div>


            <div class="tool-card-body">
                <a href={{ route('tools.weeding_hoe') }} style="text-decoration: none; color: inherit;">
                <h5 class="tool-title">weeding hoe</h5>
                <div class="tool-rating">
                    <div class="tool-stars">★★★★☆</div>
                    <span class="tool-rating-text">(189 reviews)</span>
                </div>
                <p class="tool-description">
                    A one-wheel manually pushed container for transporting soil, compost, seeds, fertilizers, tools, and crops around the farm.
                </p>
                <div class="tool-price">Rs 1,890.00</div>
                <p class="tool-status in-stock">✓ In Stock</p>
                <div class="tool-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="4">
                        <input type="hidden" name="name" value="Weeding Hoe">
                        <input type="hidden" name="type" value="tool">
                        <input type="hidden" name="price" value="1890.00">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://www.legit.ng" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>
        </a>

        <!-- Tool 5: sickle -->

        <div class="tool-card">
            <div class="tool-card-image">
                <div class="image-carousel" data-carousel="4">
                    <div class="carousel-images">
                        <img src="{{ asset('images/tools/sickle/1.webp') }}" alt="sickle" class="carousel-image active">
                        <img src="{{ asset('images/tools/sickle/2.avif') }}" alt="sickle" class="carousel-image">
                        <img src="{{ asset('images/tools/sickle/3.jpg') }}" alt="sickle" class="carousel-image">
                        <img src="{{ asset('images/tools/sickle/4.avif') }}" alt="sickle" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="ToolsApp.prevImage(4)">‹</button>
                        <button class="carousel-btn next" onclick="ToolsApp.nextImage(4)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="dot active" onclick="ToolsApp.goToImage(4, 0)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(4, 1)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(4, 2)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(4, 3)"></span>
                    </div>
                </div>
            </div>

            <div class="tool-card-body">
                <a href="{{ route('tools.sickle') }}" style="text-decoration: none; color: inherit;">
                <h5 class="tool-title">sickle</h5>
                <div class="tool-rating">
                    <div class="tool-stars">★★★★★</div>
                    <span class="tool-rating-text">(267 reviews)</span>
                </div>
                <p class="tool-description">
                    A tool with metal tines for leveling soil, gathering debris, removing weeds, and spreading mulch after ploughing or planting.
                </p>
                <div class="tool-price">Rs 1,800.00</div>
                <p class="tool-status in-stock">✓ In Stock</p>
                <div class="tool-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="5">
                        <input type="hidden" name="name" value="Sickle">
                        <input type="hidden" name="type" value="tool">
                        <input type="hidden" name="price" value="1800.00">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://www.legit.ng" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>
        </a>

        <!-- Tool 6: spreyer -->

        <div class="tool-card">
            <div class="tool-card-image">
                <div class="image-carousel" data-carousel="5">
                    <div class="carousel-images">
                        <img src="{{ asset('images/tools/spreyer/1.jpg') }}" alt="Spreyer" class="carousel-image active">
                        <img src="{{ asset('images/tools/spreyer/2.jpg') }}" alt="Spreyer" class="carousel-image">
                        <img src="{{ asset('images/tools/spreyer/3.png') }}" alt="Spreyer" class="carousel-image">
                        <img src="{{ asset('images/tools/spreyer/4.jpg') }}" alt="Spreyer" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="ToolsApp.prevImage(5)">‹</button>
                        <button class="carousel-btn next" onclick="ToolsApp.nextImage(5)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="dot active" onclick="ToolsApp.goToImage(5, 0)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(5, 1)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(5, 2)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(5, 3)"></span>
                    </div>
                </div>
            </div>

            <div class="tool-card-body">
                <a href="{{ route('tools.spreyer') }}" style="text-decoration: none; color: inherit;">
                <h5 class="tool-title">Backpack Spreyer</h5>
                <div class="tool-rating">
                    <div class="tool-stars">★★★★☆</div>
                    <span class="tool-rating-text">(156 reviews)</span>
                </div>
                <p class="tool-description">
                    A hand tool with a curved blade for cutting grasses, harvesting cereals, and trimming vegetation with precision and efficiency.
                </p>
                <div class="tool-price">Rs 1,500.99</div>
                <p class="tool-status in-stock">✓ In Stock</p>
                <div class="tool-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="6">
                        <input type="hidden" name="name" value="Backpack Sprayer">
                        <input type="hidden" name="type" value="tool">
                        <input type="hidden" name="price" value="1500.99">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://www.legit.ng" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>
        </a>

        <!-- Tool 7: irregration pump -->

        <div class="tool-card">
            <div class="tool-card-image">
                <div class="image-carousel" data-carousel="6">
                    <div class="carousel-images">
                        <img src="{{ asset('images/tools/irrigation pump/1.png') }}" alt="Irrigation Pump" class="carousel-image active">
                        <img src="{{ asset('images/tools/irrigation pump/2.jpg') }}" alt="Irrigation Pump" class="carousel-image">
                        <img src="{{ asset('images/tools/irrigation pump/3.jpg') }}" alt="Irrigation Pump" class="carousel-image">
                        <img src="{{ asset('images/tools/irrigation pump/4.jpg') }}" alt="Irrigation Pump" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="ToolsApp.prevImage(6)">‹</button>
                        <button class="carousel-btn next" onclick="ToolsApp.nextImage(6)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="dot active" onclick="ToolsApp.goToImage(6, 0)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(6, 1)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(6, 2)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(6, 3)"></span>
                    </div>
                </div>
            </div>

            <div class="tool-card-body">
                <a href="{{ route('tools.irrigation_pump') }}" style="text-decoration: none; color: inherit;">
                <h5 class="tool-title">Irrigation Pump</h5>
                <div class="tool-rating">
                    <div class="tool-stars">★★★★★</div>
                    <span class="tool-rating-text">(334 reviews)</span>
                </div>
                <p class="tool-description">
                    Tools with broad blades for digging holes, lifting soil, mixing compost, and planting. Essential for soil preparation tasks.
                </p>
                <div class="tool-price">Rs 3,299.00</div>
                <p class="tool-status in-stock">✓ In Stock</p>
                <div class="tool-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="7">
                        <input type="hidden" name="name" value="Irrigation Pump">
                        <input type="hidden" name="type" value="tool">
                        <input type="hidden" name="price" value="3299.00">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://www.legit.ng" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>
        </a>

        <!-- Tool 8: lawn mower -->

        <div class="tool-card">
            <div class="tool-card-image">
                <div class="image-carousel" data-carousel="7">
                    <div class="carousel-images">
                        <img src="{{ asset('images/tools/lawn mower/1.jpg') }}" alt="Lawn Mower" class="carousel-image active">
                        <img src="{{ asset('images/tools/lawn mower/2.webp') }}" alt="Lawn Mower" class="carousel-image">
                        <img src="{{ asset('images/tools/lawn mower/3.jpg') }}" alt="Lawn Mower" class="carousel-image">
                        <img src="{{ asset('images/tools/lawn mower/4.jpg') }}" alt="Lawn Mower" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="ToolsApp.prevImage(7)">‹</button>
                        <button class="carousel-btn next" onclick="ToolsApp.nextImage(7)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="dot active" onclick="ToolsApp.goToImage(7, 0)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(7, 1)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(7, 2)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(7, 3)"></span>
                    </div>
                </div>
            </div>

            <div class="tool-card-body">
                <a href="{{ route('tools.lawn_mower') }}" style="text-decoration: none; color: inherit;">
                <h5 class="tool-title">Lawn Mower</h5>
                <div class="tool-rating">
                    <div class="tool-stars">★★★★☆</div>
                    <span class="tool-rating-text">(298 reviews)</span>
                </div>
                <p class="tool-description">
                    Tools or machines that spray water, pesticides, or fertilizers to protect crops from pests and apply nutrients for better growth.
                </p>
                <div class="tool-price">Rs 14,999.99</div>
                <p class="tool-status in-stock">✓ In Stock</p>
                <div class="tool-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="8">
                        <input type="hidden" name="name" value="Lawn Mower">
                        <input type="hidden" name="type" value="tool">
                        <input type="hidden" name="price" value="14999.99">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://www.legit.ng" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>
        </a>

        <!-- Tool 9: sprinkler -->

        <div class="tool-card">
            <div class="tool-card-image">
                <div class="image-carousel" data-carousel="8">
                    <div class="carousel-images">
                        <img src="{{ asset('images/tools/sprinkler/1.jpg') }}" alt="Sprinkler" class="carousel-image active">
                        <img src="{{ asset('images/tools/sprinkler/2.jpg') }}" alt="Sprinkler" class="carousel-image">
                        <img src="{{ asset('images/tools/sprinkler/3.jpg') }}" alt="Sprinkler" class="carousel-image">
                        <img src="{{ asset('images/tools/sprinkler/4.jpeg') }}" alt="Sprinkler" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="ToolsApp.prevImage(8)">‹</button>
                        <button class="carousel-btn next" onclick="ToolsApp.nextImage(8)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="dot active" onclick="ToolsApp.goToImage(8, 0)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(8, 1)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(8, 2)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(8, 3)"></span>
                    </div>
                </div>
            </div>

            <div class="tool-card-body">
                <a href="{{ route('tools.sprinkler') }}" style="text-decoration: none; color: inherit;">
                <h5 class="tool-title">Sprinkler</h5>
                <div class="tool-rating">
                    <div class="tool-stars">★★★★★</div>
                    <span class="tool-rating-text">(521 reviews)</span>
                </div>
                <p class="tool-description">
                    A powerful vehicle used to pull and power multiple farm implements for tilling, ploughing, planting, and hauling on large farms.
                </p>
                <div class="tool-price">Rs 3,999.00</div>
                <p class="tool-status in-stock">✓ In Stock</p>
                <div class="tool-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="9">
                        <input type="hidden" name="name" value="Sprinkler">
                        <input type="hidden" name="type" value="tool">
                        <input type="hidden" name="price" value="3999.00">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://www.legit.ng" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>
        </a>

        <!-- Tool 10: seed drill -->

        <div class="tool-card">
            <div class="tool-card-image">
                <div class="image-carousel" data-carousel="9">
                    <div class="carousel-images">
                        <img src="{{ asset('images/tools/seed drill/1.jpg') }}" alt="Seed Drill" class="carousel-image active">
                        <img src="{{ asset('images/tools/seed drill/2.jpg') }}" alt="Seed Drill" class="carousel-image">
                        <img src="{{ asset('images/tools/seed drill/3.png') }}" alt="Seed Drill" class="carousel-image">
                        <img src="{{ asset('images/tools/seed drill/4.jpg') }}" alt="Seed Drill" class="carousel-image">
                    </div>
                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="ToolsApp.prevImage(9)">‹</button>
                        <button class="carousel-btn next" onclick="ToolsApp.nextImage(9)">›</button>
                    </div>
                    <div class="carousel-dots">
                        <span class="dot active" onclick="ToolsApp.goToImage(9, 0)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(9, 1)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(9, 2)"></span>
                        <span class="dot" onclick="ToolsApp.goToImage(9, 3)"></span>
                    </div>
                </div>
            </div>
            
            <div class="tool-card-body">
                <a href="{{ route('tools.seed_drill') }}" style="text-decoration: none; color: inherit;">
                <h5 class="tool-title">Seed Drill (manually)</h5>
                <div class="tool-rating">
                    <div class="tool-stars">★★★★☆</div>
                    <span class="tool-rating-text">(403 reviews)</span>
                </div>
                <p class="tool-description">
                    A machine with rotating blades that breaks soil into fine particles, mixes residues, and prepares seedbeds quickly and efficiently.
                </p>
                <div class="tool-price">Rs 20,499.00</div>
                <p class="tool-status limited">⚠ Limited Stock</p>
                <div class="tool-buttons">
                    <form action="{{ route('cart.add') }}" method="POST" style="width: 100%;">
                        @csrf
                        <input type="hidden" name="id" value="10">
                        <input type="hidden" name="name" value="Seed Drill">
                        <input type="hidden" name="type" value="tool">
                        <input type="hidden" name="price" value="20499.00">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Add to Cart</button>
                    </form>
                    <a href="https://www.farmonaut.com" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>
</a>

<script>
    // Tools Page - Isolated Functions
    const ToolsApp = {
        container: null,
        scrollAmount: 350,
        currentImageIndex: {},
        touchStartX: 0,
        touchEndX: 0,

        init() {
            this.container = document.getElementById('toolsContainer');
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
            const carousel = document.querySelector(`[data-carousel="${carouselId}"]`);
            if (!carousel) return;

            const images = carousel.querySelectorAll('.carousel-image');
            if (images.length === 0) return;

            if (!this.currentImageIndex[carouselId]) {
                this.currentImageIndex[carouselId] = 0;
            }

            this.currentImageIndex[carouselId] = (this.currentImageIndex[carouselId] + 1) % images.length;
            this.updateCarousel(carousel, this.currentImageIndex[carouselId]);
        },

        prevImage(carouselId) {
            const carousel = document.querySelector(`[data-carousel="${carouselId}"]`);
            if (!carousel) return;

            const images = carousel.querySelectorAll('.carousel-image');
            if (images.length === 0) return;

            if (!this.currentImageIndex[carouselId]) {
                this.currentImageIndex[carouselId] = 0;
            }

            this.currentImageIndex[carouselId] = (this.currentImageIndex[carouselId] - 1 + images.length) % images.length;
            this.updateCarousel(carousel, this.currentImageIndex[carouselId]);
        },

        goToImage(carouselId, index) {
            const carousel = document.querySelector(`[data-carousel="${carouselId}"]`);
            if (!carousel) return;

            this.currentImageIndex[carouselId] = index;
            this.updateCarousel(carousel, index);
        },

        updateCarousel(carousel, index) {
            const images = carousel.querySelectorAll('.carousel-image');
            const dots = carousel.querySelectorAll('.dot');

            images.forEach(img => img.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));

            if (images[index]) images[index].classList.add('active');
            if (dots[index]) dots[index].classList.add('active');
        },

        setupTouchListeners() {
            const carousels = document.querySelectorAll('.image-carousel');

            carousels.forEach((carousel, index) => {
                carousel.setAttribute('data-carousel', index);

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

    // Expose ToolsApp globally for inline onclick handlers
    window.ToolsApp = ToolsApp;

    document.addEventListener('DOMContentLoaded', function() {
        ToolsApp.init();
    });
</script>

</body>
</html>
