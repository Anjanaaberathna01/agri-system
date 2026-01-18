# SpasilaLahanPetani

A Laravel-based agriculture marketplace for tools, fertilizers, and crops with modern user/admin flows, cart, and curated product browsing.

## Features

- Product catalogs for tools, fertilizers, and crops with image galleries and status badges
- Modern auth screens (login/register) with user/admin switch for sign-in
- Cart add-to-cart flow and pricing display
- Seeded demo data for quick exploration (users, crops, tools, fertilizers)
- Responsive UI built with Blade, custom CSS, and Font Awesome

## Tech Stack

- PHP 8.x, Laravel 10
- Blade templating, Vite asset pipeline
- MySQL (or any Laravel-supported DB)
- PHPUnit for tests

## Quick Start

1. Install PHP 8.x, Composer, and a database (e.g., MySQL). Ensure `php` and `composer` are on PATH.
2. Clone the repo and install deps:
   ```bash
   cd laravel
   composer install
   npm install
   ```
3. Copy env and set DB creds:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Update `.env` with your DB connection.
4. Run migrations and seed demo data:
   ```bash
   php artisan migrate --seed
   ```
5. Serve the app:
   ```bash
   php artisan serve
   npm run dev   # or npm run build for production assets
   ```
6. Visit `http://localhost:8000` and log in with seeded users (see `database/seeders`).

## Auth Notes

- Login screen supports switching between user and admin login types.
- Registration collects basic profile fields; validation handled by Laravel.

## Media

- Product images live under `public/images/{tool|fertilizer|crop}/<folder>` with fallbacks to storage when uploaded.

## Tests

Run the test suite from `laravel/`:

```bash
php artisan test
```

## Project Structure (high level)

- `laravel/` main application
- `laravel/app/` controllers, models, middleware
- `laravel/resources/views/` Blade templates (auth, products, layouts)
- `laravel/public/` public assets and images
- `laravel/database/` migrations and seeders

## Deployment

- Build assets: `npm run build`
- Configure web server to point the document root to `laravel/public`
- Ensure `.env` is set with production DB and mail credentials

## Contributing

- Use feature branches and PRs
- Run tests before submitting: `php artisan test`
- Follow PSR-12 for PHP and keep Blade templates tidy
