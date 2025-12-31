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
            padding: 15px 40px;
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
            gap: 30px;
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 14px;
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

        @media (max-width: 768px) {
            nav {
                flex-wrap: wrap;
                padding: 12px 20px;
                gap: 12px;
            }

            .nav-left {
                flex: 1;
                gap: 15px;
                order: 1;
            }

            .nav-center {
                order: 3;
                flex: 1 1 100%;
                margin-top: 12px;
            }

            .search-container {
                max-width: 100%;
            }

            .nav-right {
                flex: 1;
                gap: 10px;
                order: 2;
                justify-content: flex-end;
            }

            .nav-links {
                gap: 15px;
            }

            .nav-links a {
                font-size: 13px;
                padding: 6px 10px;
            }

            .logo img {
                height: 40px;
            }

            .login-btn {
                padding: 8px 16px;
                font-size: 13px;
            }
        }

        @media (max-width: 480px) {
            nav {
                padding: 10px 15px;
            }

            .nav-links {
                gap: 10px;
            }

            .nav-links a {
                font-size: 12px;
                padding: 5px 8px;
            }

            .logo img {
                height: 35px;
            }

            .search-input {
                padding: 10px 35px 10px 14px;
                font-size: 13px;
            }

            .login-btn {
                padding: 8px 14px;
                font-size: 12px;
            }

            .user-menu {
                padding: 6px 12px;
                gap: 8px;
            }

            .user-avatar {
                width: 30px;
                height: 30px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

<nav>
    <!-- LEFT SIDE: Logo -->
    <div class="nav-left">
        <div class="logo">
            <a href="{{ route('login') }}">
                <img src="{{ asset('images/logo/logo.png') }}" alt="SpasilaLahanPetani Logo">
            </a>
        </div>

        <!-- Navigation Links -->
        <ul class="nav-links">
            <li><a href="{{ route('login') }}">Home</a></li>
            <li><a href="{{ route('tools.index') }}">Tools</a></li>
            <li><a href="{{ route('fertilizers.index') }}">Fertilizers</a></li>
        </ul>
    </div>

    <!-- CENTER: Search Bar -->
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

    <!-- RIGHT SIDE: Login/User Menu -->
    <div class="nav-right">
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
                    <a href="{{ route('profile.index') }}">👤 My Profile</a>
                    <a href="{{ route('orders.index') }}">📦 My Orders</a>
                    <a href="{{ route('settings.index') }}">⚙️ Settings</a>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        🚪 Logout
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
</nav>

<script>
    function toggleDropdown(event) {
        event.stopPropagation();
        const dropdownMenu = document.getElementById('dropdownMenu');
        dropdownMenu.classList.toggle('active');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdownMenu = document.getElementById('dropdownMenu');
        if (dropdownMenu && !event.target.closest('.user-menu')) {
            dropdownMenu.classList.remove('active');
        }
    });

    // Search functionality
    document.querySelector('.search-input').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            const query = this.value;
            window.location.href = `/search?q=${encodeURIComponent(query)}`;
        }
    });
</script>

</body>
</html>
