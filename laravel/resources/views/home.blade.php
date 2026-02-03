<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Govi Saviya LK</title>
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
            color: #333;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Hero Section */
        .hero-section {
            display: flex;
            min-height: 50vh;
            width: 100%;
            background-color: #f3f4f6;
        }

        .hero-left {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 4rem 2rem;
            background: linear-gradient(to bottom, #15803d, #16a34a);
            color: #fff;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .hero-title span {
            font-weight: 800;
            color: #dcfce7;
        }

        .hero-description {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            line-height: 1.6;
            color: #e0f2f1;
        }

        .hero-button {
            background-color: #fff;
            color: #15803d;
            padding: 0.75rem 2rem;
            border-radius: 9999px;
            font-weight: 600;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .hero-button:hover {
            background-color: #dcfce7;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }

        .hero-right {
            flex: 1;
            position: relative;
            overflow: hidden;
        }

        .hero-right img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
        }

        .hero-right img:hover {
            transform: scale(1.05);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section {
                flex-direction: column;
            }
            .hero-left, .hero-right {
                flex: none;
                width: 100%;
                min-height: 50vh;
            }
            .hero-title {
                font-size: 2rem;
            }
            .hero-description {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

@include('layouts.nav')

<!-- Success Message -->
@if ($message = Session::get('success'))
<div style="background-color: #10b981; color: white; padding: 1rem 2rem; margin: 1rem 0; border-radius: 8px; font-weight: 500; animation: slideDown 0.3s ease;">
    <div style="max-width: 1200px; margin: 0 auto;">
        {{ $message }}
    </div>
</div>
<style>
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endif

<!-- Hero Section -->
<div class="hero-section">
    <!-- Left Column: Text -->
    <div class="hero-left">
        <h1 class="hero-title">
            Creating a more <span>fertile future</span>
        </h1>
        <p class="hero-description">
            Supporting Sri Lankan farmers with high-quality tools and sustainable solutions.
            Our mission is to empower every grower from Anuradhapura to Matara.
        </p>
        <a href="{{ route('tools.index') }}" class="hero-button">Explore Tools</a>
    </div>

    <!-- Right Column: Image -->
    <div class="hero-right">
        <img src="{{ asset('images/home/back.jpg') }}" alt="Featured Tool">
    </div>
</div>

<!-- Tools Section -->
<div class="tools-section" id="tools-section">
    @include('tools.index')
</div>

<!-- Fertilizers Section -->
<div class="fertilizers-section" id="fertilizers-section">
    @include('fertilizers.index')
</div>

<!-- crop Section -->
<div class="crop-section" id="crop-section">
    @include('crop.index')
</div>

</body>
</html>
