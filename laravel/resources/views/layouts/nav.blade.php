<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        nav {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 30px;
            flex: 1;
        }

        .logo img {
            height: 50px;
            width: auto;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .logo img:hover {
            transform: scale(1.05);
        }

        .nav-links {
            display: flex;
            gap: 10px;
            list-style: none;
        }

        .nav-links a {
            color: #333;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 6px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: width 0.3s ease;
        }

        .nav-links a:hover {
            color: #667eea;
            background: rgba(102, 126, 234, 0.08);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-center {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .search-container {
            position: relative;
            width: 100%;
            max-width: 400px;
        }

        .search-input {
            width: 100%;
            padding: 12px 45px 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .search-input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .search-input::placeholder {
            color: #999;
        }

        .search-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            cursor: pointer;
            font-size: 16px;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
            flex: 1;
            justify-content: flex-end;
        }

        .nav-auth {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .login-btn {
            padding: 10px 24px;
            background: linear-gradient(135deg, #ff9500 0%, #ff7c00 100%);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 16px;
            border-radius: 8px;
            background: #f0f0f0;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .user-menu:hover {
            background: #e0e0e0;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff9500 0%, #ff7c00 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 14px;
        }

        .cart-icon {
            position: relative;
            cursor: pointer;
            font-size: 24px;
            transition: all 0.3s ease;
            color: #ff7c00;
        }

        .cart-icon:hover {
            transform: scale(1.1);
            color: #ff9500;
        }

        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: linear-gradient(135deg, #ff9500 0%, #ff7c00 100%);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 600;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            min-width: 180px;
            margin-top: 10px;
            display: none;
            z-index: 100;
            overflow: hidden;
        }

        .dropdown-menu.active {
            display: block;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dropdown-menu a {
            display: block;
            padding: 12px 16px;
            color: #333;
            text-decoration: none;
            font-size: 13px;
            border-bottom: 1px solid #f0f0f0;
            transition: all 0.3s ease;
        }

        .dropdown-menu a:last-child {
            border-bottom: none;
        }

        .dropdown-menu a:hover {
            background: #f8f9fa;
            color: #667eea;
            padding-left: 20px;
        }

        .hamburger-menu {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 6px;
            background: none;
            border: none;
            padding: 0;
            z-index: 1001;
        }

        .hamburger-menu span {
            width: 25px;
            height: 3px;
            background: #333;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .hamburger-menu.active span:nth-child(1) {
            transform: rotate(45deg) translate(10px, 10px);
        }

        .hamburger-menu.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger-menu.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        .nav-menu-mobile {
            display: none;
            position: fixed;
            top: 70px;
            left: 0;
            right: 0;
            background: white;
            flex-direction: column;
            padding: 20px;
            gap: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            z-index: 999;
            max-height: calc(100vh - 70px);
            overflow-y: auto;
        }

        .nav-menu-mobile.active {
            display: flex;
        }

        .nav-menu-mobile .nav-links {
            flex-direction: column;
            gap: 0;
            width: 100%;
        }

        .nav-menu-mobile .nav-links a {
            padding: 12px 16px;
            border-radius: 8px;
            width: 100%;
            border-bottom: 1px solid #f0f0f0;
        }

        .nav-menu-mobile .search-container {
            width: 100%;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            nav {
                padding: 12px 20px;
                gap: 12px;
                flex-wrap: nowrap;
                align-items: center;
                justify-content: space-between;
            }

            .hamburger-menu {
                display: flex;
                order: 3;
            }

            .nav-left {
                flex: 1;
                gap: 0;
                order: 1;
                display: flex;
                align-items: center;
            }

            .nav-links {
                display: none;
            }

            .nav-center {
                display: none;
            }

            .nav-menu-mobile {
                display: none;
            }

            .nav-menu-mobile.active {
                display: flex;
            }

            .nav-right {
                flex: 0;
                gap: 10px;
                order: 2;
                justify-content: flex-end;
            }

            .logo img {
                height: 40px;
            }

            .login-btn {
                padding: 8px 16px;
                font-size: 13px;
            }

            .cart-badge {
                width: 18px;
                height: 18px;
                font-size: 11px;
            }
        }

        @media (max-width: 480px) {
            nav {
                padding: 10px 15px;
            }

            .logo img {
                height: 35px;
            }

            .login-btn {
                padding: 8px 14px;
                font-size: 12px;
            }

            .user-menu {
                padding: 6px 12px;
                gap: 8px;
                font-size: 0;
            }

            .user-avatar {
                width: 30px;
                height: 30px;
                font-size: 12px;
            }

            .user-menu span:not(.user-avatar) {
                display: none;
            }

            .cart-icon {
                font-size: 20px;
            }

            .hamburger-menu span {
                width: 20px;
                height: 2.5px;
            }

            .nav-menu-mobile {
                top: 55px;
            }
        }
    </style>
</head>
<body>

<nav>
    <!-- LEFT SIDE: Logo -->
    <div class="nav-left">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo/logo.png') }}" alt="SpasilaLahanPetani Logo">
            </a>
        </div>

        <!-- Navigation Links (Desktop) -->
        <ul class="nav-links">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('home') }}#tools-section">Tools</a></li>
            <li><a href="{{ route('home') }}#fertilizers-section">Fertilizers</a></li>
            <li><a href="{{ route('home') }}#crop-section">Crops</a></li>
        </ul>
    </div>

    <!-- CENTER: Search Bar (Desktop) -->
    <div class="nav-center">
        <div class="search-container">
            <input
                type="text"
                class="search-input"
                placeholder="Search tools, fertilizers..."
            >
            <span class="search-icon">🔍</span>
        </div>
    </div>

    <!-- RIGHT SIDE: Cart & Login/User Menu -->
    <div class="nav-right">
        <!-- Cart Icon -->
        <a href="{{ route('cart.index') }}" class="cart-icon" title="Shopping Cart">
            🛒
            <span class="cart-badge">{{ count(session()->get('cart', [])) }}</span>
        </a>
        <div class="nav-auth">
            @auth
                <!-- User is logged in -->
                <div class="user-menu" onclick="toggleDropdown(event)">
                    <div class="user-avatar">
                        {{ substr(Auth::user()->first_name, 0, 1) }}
                    </div>
                    <span style="font-size: 14px; color: #333; font-weight: 500;">
                        {{ Auth::user()->first_name }}
                    </span>
                    <span style="color: #999; font-size: 12px;">▼</span>
                </div>

                <!-- Dropdown Menu -->
                <div class="dropdown-menu" id="dropdownMenu">
                    <a href="{{ route('profile.show') }}">My Profile</a>
                    <a href="{{ route('orders.index') }}">My Orders</a>
                    <a href="">Settings</a>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <!-- User is not logged in -->
                <a href="{{ route('login') }}" class="login-btn">Login</a>
            @endauth
        </div>
    </div>

    <!-- Hamburger Menu (Mobile) -->
    <button class="hamburger-menu" onclick="toggleMobileMenu()">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <!-- Mobile Menu -->
    <div class="nav-menu-mobile" id="mobileMenu">
        <div class="search-container">
            <input
                type="text"
                class="search-input"
                placeholder="Search tools, fertilizers..."
            >
            <span class="search-icon">🔍</span>
        </div>

        <ul class="nav-links">
            <li><a href="{{ route('home') }}" onclick="closeMobileMenu()">Home</a></li>
            <li><a href="{{ route('home') }}#tools-section" onclick="closeMobileMenu()">Tools</a></li>
            <li><a href="{{ route('home') }}#fertilizers-section" onclick="closeMobileMenu()">Fertilizers</a></li>
            <li><a href="{{ route('home') }}#crop-section" onclick="closeMobileMenu()">Crops</a></li>
        </ul>
    </div>
</nav>

<script>
    function toggleDropdown(event) {
        event.stopPropagation();
        const dropdownMenu = document.getElementById('dropdownMenu');
        dropdownMenu.classList.toggle('active');
    }

    function toggleMobileMenu() {
        const hamburger = document.querySelector('.hamburger-menu');
        const mobileMenu = document.getElementById('mobileMenu');
        hamburger.classList.toggle('active');
        mobileMenu.classList.toggle('active');
    }

    function closeMobileMenu() {
        const hamburger = document.querySelector('.hamburger-menu');
        const mobileMenu = document.getElementById('mobileMenu');
        hamburger.classList.remove('active');
        mobileMenu.classList.remove('active');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdownMenu = document.getElementById('dropdownMenu');
        if (dropdownMenu && !event.target.closest('.user-menu')) {
            dropdownMenu.classList.remove('active');
        }
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const hamburger = document.querySelector('.hamburger-menu');
        const mobileMenu = document.getElementById('mobileMenu');
        const nav = document.querySelector('nav');

        if (!event.target.closest('nav')) {
            hamburger.classList.remove('active');
            mobileMenu.classList.remove('active');
        }
    });

    // Search functionality
    const searchInputs = document.querySelectorAll('.search-input');
    searchInputs.forEach(input => {
        input.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const query = this.value;
                window.location.href = `/search?q=${encodeURIComponent(query)}`;
            }
        });
    });
</script>

</body>
</html>
