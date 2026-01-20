# SpasilaLahanPetani - Agricultural Supply Management System

A modern web application for managing and selling agricultural products including crops, fertilizers, and farming tools.

## Features

- **Product Management**
    - Crops catalog with image galleries
    - Fertilizers & nutrients store
    - Farming tools marketplace
    - Product details with related items

- **Shopping Cart**
    - Add/remove items
    - Quantity management
    - Cart persistence

- **User Authentication**
    - User registration and login
    - Supplier authentication
    - Profile management
    - Password updates

- **Order Management**
    - Checkout process
    - Order history
    - Order cancellation

- **Admin Dashboard**
    - Product CRUD operations
    - Supplier management
    - Image gallery support
    - Inventory status tracking

## Tech Stack

- **Framework**: Laravel 11
- **Frontend**: HTML, CSS, JavaScript (Vanilla)
- **Database**: MySQL/SQLite
- **UI Components**: Font Awesome Icons, Poppins Font

## Installation

1. Clone the repository

```bash
git clone <repository-url>
cd laravel
```

2. Install dependencies

```bash
composer install
npm install
```

3. Setup environment

```bash
cp .env.example .env
php artisan key:generate
```

4. Configure database in `.env`

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=agri_system
DB_USERNAME=root
DB_PASSWORD=
```

5. Run migrations and seeders

```bash
php artisan migrate
php artisan db:seed
```

6. Build assets

```bash
npm run build
```

7. Start development server

```bash
php artisan serve
```

## Project Structure

- **app/Models** - Eloquent models (Crop, Fertilizer, Tool, User, Order, etc.)
- **app/Http/Controllers** - Application controllers
- **resources/views** - Blade templates
    - `crop/` - Crop pages
    - `fertilizers/` - Fertilizer pages
    - `tools/` - Tools pages
    - `admin/` - Admin dashboard pages
- **database/migrations** - Database schema
- **routes/web.php** - Application routes

## Key Routes

### Public Routes

- `/` - Home page with all products
- `/crops` - Crops catalog
- `/crops/{crop}` - Crop details
- `/fertilizers` - Fertilizers catalog
- `/fertilizers/{fertilizer}` - Fertilizer details
- `/tools` - Tools catalog
- `/tools/{tool}` - Tool details
- `/cart` - Shopping cart
- `/checkout` - Checkout page
- `/login` - User login
- `/register` - User registration

### Admin Routes (Protected)

- `/admin/dashboard` - Admin dashboard
- `/admin/crops` - Manage crops
- `/admin/fertilizers` - Manage fertilizers
- `/admin/tools` - Manage tools
- `/admin/suppliers` - Manage suppliers

## Database Models

- **Crop** - Agricultural crop products
- **Fertilizer** - Fertilizer products
- **Tool** - Farming tools
- **User** - Customer accounts
- **Supplier** - Supplier accounts
- **Order** - Customer orders
- **Cart** - Shopping cart items

## Features Implemented

- ✅ Product browsing and search
- ✅ Shopping cart functionality
- ✅ User authentication
- ✅ Admin product management
- ✅ Image gallery support
- ✅ Responsive design
- ✅ Order management
- ✅ Status tracking (In Stock, Limited, Out of Stock)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
