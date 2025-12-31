@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4 text-center">Agricultural Tools & Equipment Store</h1>
            <p class="lead text-center mb-5">Quality farming tools for modern agriculture - Shop Now!</p>
        </div>
    </div>

    <div class="row">
        <!-- Tool 1: Plough -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">🌾 Plough (Plow)</h5>
                    <p class="card-text">
                        <strong>What it is:</strong> A tool or machine that turns over and breaks up soil before planting.<br>
                        <strong>Uses:</strong> Prepares the soil by loosening it, burying crop residues, and controlling weeds — making land ready for sowing seeds.<br>
                        <strong>Type:</strong> Can be simple (animal-drawn) or tractor-mounted.
                    </p>
                    <div class="mt-auto">
                        <h4 class="text-success mb-2">$450.00</h4>
                        <p class="text-muted small mb-2"><i class="bi bi-check-circle-fill text-success"></i> In Stock</p>
                        <button class="btn btn-primary w-100 mb-2">Add to Cart</button>
                        <a href="https://en.wikipedia.org/wiki/Plough" target="_blank" class="btn btn-sm btn-outline-secondary w-100">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tool 2: Hoe -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">🔧 Hoe</h5>
                    <p class="card-text">
                        <strong>What it is:</strong> A traditional hand tool with a flat blade attached to a long handle.<br>
                        <strong>Uses:</strong> Breaking up soil, removing weeds, shaping beds, and digging shallow furrows for planting.<br>
                        <strong>Type:</strong> Manual tool, widely used in gardens and small farms.
                    </p>
                    <div class="mt-auto">
                        <h4 class="text-success mb-2">$25.99</h4>
                        <p class="text-muted small mb-2"><i class="bi bi-check-circle-fill text-success"></i> In Stock</p>
                        <button class="btn btn-primary w-100 mb-2">Add to Cart</button>
                        <a href="https://en.wikipedia.org/wiki/Hoe_(tool)" target="_blank" class="btn btn-sm btn-outline-secondary w-100">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tool 3: Seed Drill -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">🌱 Seed Drill</h5>
                    <p class="card-text">
                        <strong>What it is:</strong> A planting machine that places seeds at a specific depth and spacing.<br>
                        <strong>Uses:</strong> Ensures even seed distribution, better seed germination, and higher yields than hand broadcasting.<br>
                        <strong>Type:</strong> Tractor-mounted or walk-behind models.
                    </p>
                    <div class="mt-auto">
                        <h4 class="text-success mb-2">$1,299.00</h4>
                        <p class="text-muted small mb-2"><i class="bi bi-check-circle-fill text-success"></i> In Stock</p>
                        <button class="btn btn-primary w-100 mb-2">Add to Cart</button>
                        <a href="https://en.wikipedia.org/wiki/Seed_drill" target="_blank" class="btn btn-sm btn-outline-secondary w-100">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tool 4: Wheelbarrow -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">🛠 Wheelbarrow</h5>
                    <p class="card-text">
                        <strong>What it is:</strong> A one-wheel, manually pushed container.<br>
                        <strong>Uses:</strong> Transporting soil, compost, seeds, fertilizers, tools, and crops around the farm easily.<br>
                        <strong>Type:</strong> Manual tool useful for small farms and gardens.
                    </p>
                    <div class="mt-auto">
                        <h4 class="text-success mb-2">$89.99</h4>
                        <p class="text-muted small mb-2"><i class="bi bi-check-circle-fill text-success"></i> In Stock</p>
                        <button class="btn btn-primary w-100 mb-2">Add to Cart</button>
                        <a href="https://www.legit.ng" target="_blank" class="btn btn-sm btn-outline-secondary w-100">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tool 5: Rake -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">🌾 Rake</h5>
                    <p class="card-text">
                        <strong>What it is:</strong> A tool with a row of metal or plastic tines on a handle.<br>
                        <strong>Uses:</strong> Leveling soil, gathering debris, removing weeds, and spreading mulch.<br>
                        <strong>Type:</strong> Manual tool used after ploughing or planting.
                    </p>
                    <div class="mt-auto">
                        <h4 class="text-success mb-2">$18.50</h4>
                        <p class="text-muted small mb-2"><i class="bi bi-check-circle-fill text-success"></i> In Stock</p>
                        <button class="btn btn-primary w-100 mb-2">Add to Cart</button>
                        <a href="https://www.legit.ng" target="_blank" class="btn btn-sm btn-outline-secondary w-100">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tool 6: Sickle -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">🔪 Sickle</h5>
                    <p class="card-text">
                        <strong>What it is:</strong> A hand tool with a curved blade.<br>
                        <strong>Uses:</strong> Cutting grasses, harvesting cereals, and trimming vegetation.<br>
                        <strong>Type:</strong> Traditional handheld tool.
                    </p>
                    <div class="mt-auto">
                        <h4 class="text-success mb-2">$15.99</h4>
                        <p class="text-muted small mb-2"><i class="bi bi-check-circle-fill text-success"></i> In Stock</p>
                        <button class="btn btn-primary w-100 mb-2">Add to Cart</button>
                        <a href="https://www.legit.ng" target="_blank" class="btn btn-sm btn-outline-secondary w-100">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tool 7: Shovel and Spade -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">🪓 Shovel and Spade</h5>
                    <p class="card-text">
                        <strong>What they are:</strong> Tools with broad blades for digging and soil handling.<br>
                        <strong>Uses:</strong> Digging holes, lifting soil, mixing compost, and planting.<br>
                        <strong>Type:</strong> Manual tools essential in planting and soil preparation.
                    </p>
                    <div class="mt-auto">
                        <h4 class="text-success mb-2">$32.99</h4>
                        <p class="text-muted small mb-2"><i class="bi bi-check-circle-fill text-success"></i> In Stock</p>
                        <button class="btn btn-primary w-100 mb-2">Add to Cart</button>
                        <a href="https://www.legit.ng" target="_blank" class="btn btn-sm btn-outline-secondary w-100">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tool 8: Sprayers -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">🌿 Sprayers</h5>
                    <p class="card-text">
                        <strong>What it is:</strong> Tools or machines that spray liquids like water, pesticide, or fertilizer.<br>
                        <strong>Uses:</strong> Protecting crops from pests, applying nutrients, and increasing growth.<br>
                        <strong>Type:</strong> Handheld, backpack, or tractor-mounted.
                    </p>
                    <div class="mt-auto">
                        <h4 class="text-success mb-2">$149.99</h4>
                        <p class="text-muted small mb-2"><i class="bi bi-check-circle-fill text-success"></i> In Stock</p>
                        <button class="btn btn-primary w-100 mb-2">Add to Cart</button>
                        <a href="https://www.legit.ng" target="_blank" class="btn btn-sm btn-outline-secondary w-100">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tool 9: Tractor -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">🚜 Tractor</h5>
                    <p class="card-text">
                        <strong>What it is:</strong> A powerful vehicle used to pull and power multiple farm implements.<br>
                        <strong>Uses:</strong> Tilling, ploughing, planting, hauling, and powering modern tools like seed drills and sprayers.<br>
                        <strong>Type:</strong> Mechanized equipment for large farms and heavy tasks.
                    </p>
                    <div class="mt-auto">
                        <h4 class="text-success mb-2">$35,999.00</h4>
                        <p class="text-warning small mb-2"><i class="bi bi-exclamation-circle-fill"></i> Limited Stock</p>
                        <button class="btn btn-primary w-100 mb-2">Add to Cart</button>
                        <a href="https://www.legit.ng" target="_blank" class="btn btn-sm btn-outline-secondary w-100">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tool 10: Rotavator -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">⚙️ Rotavator (Rotary Tiller)</h5>
                    <p class="card-text">
                        <strong>What it is:</strong> A machine with rotating blades.<br>
                        <strong>Uses:</strong> Breaking soil into fine particles, mixing residues, and preparing seedbeds quickly.<br>
                        <strong>Type:</strong> Tractor-driven tillage tool.
                    </p>
                    <div class="mt-auto">
                        <h4 class="text-success mb-2">$2,499.00</h4>
                        <p class="text-muted small mb-2"><i class="bi bi-check-circle-fill text-success"></i> In Stock</p>
                        <button class="btn btn-primary w-100 mb-2">Add to Cart</button>
                        <a href="https://www.farmonaut.com" target="_blank" class="btn btn-sm btn-outline-secondary w-100">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
