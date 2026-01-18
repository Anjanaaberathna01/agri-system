<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* Navbar Styles */
    .navbar {
        background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
        color: white;
        padding: 1rem 2rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .navbar-content {
        max-width: 1600px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 1.6rem;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .navbar-brand i {
        font-size: 32px;
    }

    .navbar-menu {
        display: flex;
        align-items: center;
        gap: 2.5rem;
        flex: 1;
        justify-content: center;
    }

    .navbar-menu a {
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 500;
    }

    .navbar-menu a:hover {
        opacity: 0.8;
        transform: translateY(-2px);
    }

    .user-menu {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        background: rgba(255, 255, 255, 0.15);
        padding: 0.5rem 1rem;
        border-radius: 20px;
    }

    .user-avatar {
        width: 36px;
        height: 36px;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .logout-btn {
        padding: 0.6rem 1.2rem;
        background: rgba(255, 255, 255, 0.2);
        border: 1.5px solid white;
        color: white;
        border-radius: 8px;
        cursor: pointer;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 500;
    }

    .logout-btn:hover {
        background: white;
        color: #4CAF50;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
        background: white;
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

    .navbar-menu-mobile {
        display: none;
        position: fixed;
        top: 70px;
        left: 0;
        right: 0;
        background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
        flex-direction: column;
        padding: 20px;
        gap: 0;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        z-index: 999;
        max-height: calc(100vh - 70px);
        overflow-y: auto;
    }

    .navbar-menu-mobile.active {
        display: flex;
    }

    .navbar-menu-mobile a {
        color: white;
        text-decoration: none;
        padding: 12px 16px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        gap: 0.8rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .navbar-menu-mobile a:hover {
        background: rgba(255, 255, 255, 0.1);
        padding-left: 24px;
    }

    @media (max-width: 768px) {
        .navbar-content {
            flex-direction: row;
            justify-content: space-between;
            gap: 1rem;
        }

        .navbar-brand {
            font-size: 1.2rem;
            gap: 8px;
        }

        .navbar-brand i {
            font-size: 24px;
        }

        .navbar-menu {
            display: none;
        }

        .hamburger-menu {
            display: flex;
            order: 2;
        }

        .user-menu {
            order: 3;
            gap: 0.8rem;
        }

        .user-info {
            padding: 0.4rem 0.8rem;
        }

        .user-avatar {
            width: 30px;
            height: 30px;
            font-size: 14px;
        }

        .user-info span {
            display: none;
        }

        .logout-btn {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
        }

        .navbar-menu-mobile {
            display: none;
        }

        .navbar-menu-mobile.active {
            display: flex;
        }
    }

    @media (max-width: 480px) {
        .navbar {
            padding: 0.8rem 1rem;
        }

        .navbar-brand {
            font-size: 1rem;
        }

        .navbar-brand i {
            font-size: 20px;
        }

        .hamburger-menu span {
            width: 20px;
            height: 2.5px;
        }

        .logout-btn {
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
        }

        .navbar-menu-mobile {
            top: 55px;
        }
    }
</style>

<!-- Navbar -->
<nav class="navbar">
    <div class="navbar-content">
        <div class="navbar-brand">
            <i class="fas fa-tractor"></i>
            SpasilaLahan Admin
        </div>
        <div class="navbar-menu">
            <a href="{{ route('home') }}"><i class="fas fa-home"></i> Store</a>
            <a href="{{ route('admin.dashboard') }}"><i class="fas fa-th-large"></i> Dashboard</a>
        </div>
        <div class="user-menu">
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <span>{{ Auth::user()->first_name }}</span>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>

        <!-- Hamburger Menu (Mobile) -->
        <button class="hamburger-menu" onclick="toggleAdminMobileMenu()">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="navbar-menu-mobile" id="adminMobileMenu">
        <a href="{{ route('home') }}" onclick="closeAdminMobileMenu()"><i class="fas fa-home"></i> Store</a>
        <a href="{{ route('admin.dashboard') }}" onclick="closeAdminMobileMenu()"><i class="fas fa-th-large"></i> Dashboard</a>
        <a href="{{ route('admin.orders') }}" onclick="closeAdminMobileMenu()"><i class="fas fa-shopping-cart"></i> Orders</a>
        <form action="{{ route('logout') }}" method="POST" style="margin: 10px 16px;">
            @csrf
            <button type="submit" class="logout-btn" style="width: 100%; text-align: center;">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</nav>

<script>
    function toggleAdminMobileMenu() {
        const hamburger = document.querySelector('.hamburger-menu');
        const mobileMenu = document.getElementById('adminMobileMenu');
        hamburger.classList.toggle('active');
        mobileMenu.classList.toggle('active');
    }

    function closeAdminMobileMenu() {
        const hamburger = document.querySelector('.hamburger-menu');
        const mobileMenu = document.getElementById('adminMobileMenu');
        hamburger.classList.remove('active');
        mobileMenu.classList.remove('active');
    }

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const hamburger = document.querySelector('.hamburger-menu');
        const mobileMenu = document.getElementById('adminMobileMenu');
        const nav = document.querySelector('nav');

        if (!event.target.closest('nav') && hamburger && mobileMenu) {
            hamburger.classList.remove('active');
            mobileMenu.classList.remove('active');
        }
    });
</script>
