# 🌾 Govi Saviya LK

> A modern Laravel-based agriculture marketplace connecting farmers with tools, fertilizers, and crops.

[![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=flat-square&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=flat-square&logo=php)](https://www.php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=flat-square&logo=mysql)](https://www.mysql.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg?style=flat-square)](LICENSE)

## ✨ Features

- 🛒 **Product Catalogs** - Browse tools, fertilizers, and crops with rich imagery and status indicators
- 👤 **Dual-role Authentication** - Seamless user/admin switching with modern login & registration flows
- 🛍️ **Smart Cart System** - Add-to-cart functionality with real-time pricing and inventory management
- 🎨 **Responsive Design** - Mobile-first UI built with Blade, custom CSS, and Font Awesome icons
- 📊 **Demo Data** - Pre-seeded database for instant exploration and testing
- 🔧 **Admin Panel** - Manage products, users, and orders effortlessly

## 🚀 Tech Stack

| Component           | Technology                          |
| ------------------- | ----------------------------------- |
| **Backend**         | PHP 8.x, Laravel 10                 |
| **Frontend**        | Blade Templates, Vite, Tailwind CSS |
| **Database**        | MySQL 8.0+                          |
| **Testing**         | PHPUnit, Laravel Test Suite         |
| **Package Manager** | Composer, NPM                       |

## 📋 Prerequisites

- **PHP** 8.1 or higher
- **Composer** 2.0+
- **Node.js** & npm
- **MySQL** 8.0+ or any Laravel-supported database
- **Git**

Ensure `php`, `composer`, and `npm` are available in your system PATH.

## 🔧 Installation

### 1. Clone the Repository

```bash
git clone https://github.com/Anjanaaberathna01/agri-system.git
cd agri-system
```

### 2. Install Dependencies

```bash
cd laravel
composer install
npm install
```

### 3. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

Update your database credentials in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=agri_system
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Database Setup

```bash
php artisan migrate --seed
```

This will create all tables and populate demo data.

### 5. Start Development Server

```bash
# Terminal 1: PHP Development Server
php artisan serve

# Terminal 2: Build Assets
npm run dev
```

Visit **http://localhost:8000** and explore!

## 👤 Demo Credentials

Check [ADMIN_LOGIN_GUIDE.md](ADMIN_LOGIN_GUIDE.md) for seeded user accounts and login instructions.

## 📁 Project Architecture

```
laravel/
├── app/
│   ├── Http/Controllers/        # Request handlers
│   ├── Models/                  # Eloquent models (User, Crop, Tool, etc.)
│   └── Middleware/              # Custom middleware
├── resources/
│   ├── views/                   # Blade templates
│   ├── css/                     # Stylesheets
│   └── js/                      # JavaScript assets
├── database/
│   ├── migrations/              # Schema definitions
│   └── seeders/                 # Demo data
├── public/
│   ├── images/                  # Product images
│   └── storage/                 # User uploads
├── routes/
│   └── web.php                  # Application routes
└── config/                      # Configuration files
```

## 🔐 Authentication

- **Unified Login** - Switch between User and Admin roles at sign-in
- **Registration** - Collect essential profile information with validation
- **Authorization** - Role-based access control for admin operations

## 🖼️ Media Management

Product images are stored in organized directories:

```
public/images/
├── tools/
├── fertilizers/
└── crops/
```

Fallback to cloud storage for user-uploaded content.

## ✅ Testing

Run the complete test suite:

```bash
php artisan test
```

For unit tests only:

```bash
php artisan test --unit
```

## 📦 Build & Deployment

### Production Build

```bash
npm run build
```

### Deployment Checklist

- [ ] Build frontend assets: `npm run build`
- [ ] Configure web server to point root to `laravel/public/`
- [ ] Set `.env` with production database credentials
- [ ] Configure mail driver (if sending emails)
- [ ] Run migrations: `php artisan migrate`
- [ ] Set proper file permissions: `chmod 775 storage bootstrap/cache`
- [ ] Enable caching: `php artisan config:cache`

## 📚 Documentation

- [Admin Login Guide](ADMIN_LOGIN_GUIDE.md) - User credentials and admin setup
- [Registration Setup](REGISTRATION_SETUP.md) - Registration configuration
- [Setup Tool Details](SETUP_TOOL_DETAILS.md) - Detailed setup instructions
- [Fix Page Expired](FIX_PAGE_EXPIRED.md) - Session troubleshooting

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch: `git checkout -b feature/amazing-feature`
3. Commit changes: `git commit -m 'Add amazing feature'`
4. Push to branch: `git push origin feature/amazing-feature`
5. Open a Pull Request

### Code Standards

- Follow **PSR-12** coding standards for PHP
- Format Blade templates consistently
- Write tests for new features: `php artisan test`
- Keep commits clean and descriptive

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

## 👨‍💻 Author

**Anjana Aberathna**  
[GitHub](https://github.com/Anjanaaberathna01) | [Repository](https://github.com/Anjanaaberathna01/agri-system)

---

**Happy farming! 🌱** Feel free to contribute and make this project even better.
