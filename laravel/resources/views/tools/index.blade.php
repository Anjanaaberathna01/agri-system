<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agricultural Tools - SpasilaLahanPetani</title>
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
            background: #667eea;
            border-radius: 10px;
        }

        .tools-scroll-container::-webkit-scrollbar-thumb:hover {
            background: #764ba2;
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
            border-color: #667eea;
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

        .tool-description {
            font-size: 0.9rem;
            color: #666;
            line-height: 1.5;
            margin-bottom: 1rem;
            flex-grow: 1;
        }

        .tool-description strong {
            color: #333;
        }

        .tool-price {
            font-size: 1.5rem;
            color: #28a745;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .tool-status {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 1rem;
        }

        .tool-status.in-stock {
            color: #28a745;
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
            transform: translateY(-2px);
        }

        .btn-outline {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-outline:hover {
            background: #f0f0ff;
            border-color: #764ba2;
            color: #764ba2;
        }

        /* Scroll Indicators */
        .scroll-indicator {
            position: absolute;
            top: 50%;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .scroll-indicator:hover {
            box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
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
</head>
<body>

<div class="header-section">
    <h1>Agricultural Tools & Equipment Store</h1>
    <p>Quality farming tools for modern agriculture - Scroll Right to Explore More!</p>
</div>

<div class="tools-scroll-container" id="toolsContainer">
    <div class="tools-row">
        <!-- Tool 1: Plough -->
        <div class="tool-card">
            <div class="tool-card-body">
                <h5 class="tool-title">🌾 Plough (Plow)</h5>
                <p class="tool-description">
                    <strong>What it is:</strong> A tool or machine that turns over and breaks up soil before planting.<br>
                    <strong>Uses:</strong> Prepares the soil by loosening it, burying crop residues, and controlling weeds — making land ready for sowing seeds.<br>
                    <strong>Type:</strong> Can be simple (animal-drawn) or tractor-mounted.
                </p>
                <div class="tool-price">$450.00</div>
                <p class="tool-status in-stock">✓ In Stock</p>
                <div class="tool-buttons">
                    <button class="btn btn-primary">Add to Cart</button>
                    <a href="https://en.wikipedia.org/wiki/Plough" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Tool 2: Hoe -->
        <div class="tool-card">
            <div class="tool-card-body">
                <h5 class="tool-title">🔧 Hoe</h5>
                <p class="tool-description">
                    <strong>What it is:</strong> A traditional hand tool with a flat blade attached to a long handle.<br>
                    <strong>Uses:</strong> Breaking up soil, removing weeds, shaping beds, and digging shallow furrows for planting.<br>
                    <strong>Type:</strong> Manual tool, widely used in gardens and small farms.
                </p>
                <div class="tool-price">$25.99</div>
                <p class="tool-status in-stock">✓ In Stock</p>
                <div class="tool-buttons">
                    <button class="btn btn-primary">Add to Cart</button>
                    <a href="https://en.wikipedia.org/wiki/Hoe_(tool)" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Tool 3: Seed Drill -->
        <div class="tool-card">
            <div class="tool-card-body">
                <h5 class="tool-title">🌱 Seed Drill</h5>
                <p class="tool-description">
                    <strong>What it is:</strong> A planting machine that places seeds at a specific depth and spacing.<br>
                    <strong>Uses:</strong> Ensures even seed distribution, better seed germination, and higher yields than hand broadcasting.<br>
                    <strong>Type:</strong> Tractor-mounted or walk-behind models.
                </p>
                <div class="tool-price">$1,299.00</div>
                <p class="tool-status in-stock">✓ In Stock</p>
                <div class="tool-buttons">
                    <button class="btn btn-primary">Add to Cart</button>
                    <a href="https://en.wikipedia.org/wiki/Seed_drill" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Tool 4: Wheelbarrow -->
        <div class="tool-card">
            <div class="tool-card-body">
                <h5 class="tool-title">🛠 Wheelbarrow</h5>
                <p class="tool-description">
                    <strong>What it is:</strong> A one-wheel, manually pushed container.<br>
                    <strong>Uses:</strong> Transporting soil, compost, seeds, fertilizers, tools, and crops around the farm easily.<br>
                    <strong>Type:</strong> Manual tool useful for small farms and gardens.
                </p>
                <div class="tool-price">$89.99</div>
                <p class="tool-status in-stock">✓ In Stock</p>
                <div class="tool-buttons">
                    <button class="btn btn-primary">Add to Cart</button>
                    <a href="https://www.legit.ng" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Tool 5: Rake -->
        <div class="tool-card">
            <div class="tool-card-body">
                <h5 class="tool-title">🌾 Rake</h5>
                <p class="tool-description">
                    <strong>What it is:</strong> A tool with a row of metal or plastic tines on a handle.<br>
                    <strong>Uses:</strong> Leveling soil, gathering debris, removing weeds, and spreading mulch.<br>
                    <strong>Type:</strong> Manual tool used after ploughing or planting.
                </p>
                <div class="tool-price">$18.50</div>
                <p class="tool-status in-stock">✓ In Stock</p>
                <div class="tool-buttons">
                    <button class="btn btn-primary">Add to Cart</button>
                    <a href="https://www.legit.ng" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Tool 6: Sickle -->
        <div class="tool-card">
            <div class="tool-card-body">
                <h5 class="tool-title">🔪 Sickle</h5>
                <p class="tool-description">
                    <strong>What it is:</strong> A hand tool with a curved blade.<br>
                    <strong>Uses:</strong> Cutting grasses, harvesting cereals, and trimming vegetation.<br>
                    <strong>Type:</strong> Traditional handheld tool.
                </p>
                <div class="tool-price">$15.99</div>
                <p class="tool-status in-stock">✓ In Stock</p>
                <div class="tool-buttons">
                    <button class="btn btn-primary">Add to Cart</button>
                    <a href="https://www.legit.ng" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Tool 7: Shovel and Spade -->
        <div class="tool-card">
            <div class="tool-card-body">
                <h5 class="tool-title">🪓 Shovel and Spade</h5>
                <p class="tool-description">
                    <strong>What they are:</strong> Tools with broad blades for digging and soil handling.<br>
                    <strong>Uses:</strong> Digging holes, lifting soil, mixing compost, and planting.<br>
                    <strong>Type:</strong> Manual tools essential in planting and soil preparation.
                </p>
                <div class="tool-price">$32.99</div>
                <p class="tool-status in-stock">✓ In Stock</p>
                <div class="tool-buttons">
                    <button class="btn btn-primary">Add to Cart</button>
                    <a href="https://www.legit.ng" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Tool 8: Sprayers -->
        <div class="tool-card">
            <div class="tool-card-body">
                <h5 class="tool-title">🌿 Sprayers</h5>
                <p class="tool-description">
                    <strong>What it is:</strong> Tools or machines that spray liquids like water, pesticide, or fertilizer.<br>
                    <strong>Uses:</strong> Protecting crops from pests, applying nutrients, and increasing growth.<br>
                    <strong>Type:</strong> Handheld, backpack, or tractor-mounted.
                </p>
                <div class="tool-price">$149.99</div>
                <p class="tool-status in-stock">✓ In Stock</p>
                <div class="tool-buttons">
                    <button class="btn btn-primary">Add to Cart</button>
                    <a href="https://www.legit.ng" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Tool 9: Tractor -->
        <div class="tool-card">
            <div class="tool-card-body">
                <h5 class="tool-title">🚜 Tractor</h5>
                <p class="tool-description">
                    <strong>What it is:</strong> A powerful vehicle used to pull and power multiple farm implements.<br>
                    <strong>Uses:</strong> Tilling, ploughing, planting, hauling, and powering modern tools like seed drills and sprayers.<br>
                    <strong>Type:</strong> Mechanized equipment for large farms and heavy tasks.
                </p>
                <div class="tool-price">$35,999.00</div>
                <p class="tool-status limited">⚠ Limited Stock</p>
                <div class="tool-buttons">
                    <button class="btn btn-primary">Add to Cart</button>
                    <a href="https://www.legit.ng" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Tool 10: Rotavator -->
        <div class="tool-card">
            <div class="tool-card-body">
                <h5 class="tool-title">⚙️ Rotavator (Rotary Tiller)</h5>
                <p class="tool-description">
                    <strong>What it is:</strong> A machine with rotating blades.<br>
                    <strong>Uses:</strong> Breaking soil into fine particles, mixing residues, and preparing seedbeds quickly.<br>
                    <strong>Type:</strong> Tractor-driven tillage tool.
                </p>
                <div class="tool-price">$2,499.00</div>
                <p class="tool-status in-stock">✓ In Stock</p>
                <div class="tool-buttons">
                    <button class="btn btn-primary">Add to Cart</button>
                    <a href="https://www.farmonaut.com" target="_blank" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Scroll functionality
    const container = document.getElementById('toolsContainer');
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

    // Add scroll buttons if needed
    document.addEventListener('DOMContentLoaded', function() {
        // You can use this for dynamic button creation if needed
    });
</script>

</body>
</html>
