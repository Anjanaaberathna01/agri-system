# Database Reset Instructions

## Problem
Your database has corrupted tablespace files causing the error:
"Table 'agri_system.tools' doesn't exist in engine"

## Solution Steps

### Step 1: Stop XAMPP MySQL
1. Open XAMPP Control Panel
2. Click "Stop" button for MySQL/MariaDB

### Step 2: Delete Database Folder
1. Navigate to: `C:\xampp\mysql\data\`
2. Delete the folder named `agri_system`

### Step 3: Start XAMPP MySQL
1. In XAMPP Control Panel, click "Start" button for MySQL/MariaDB

### Step 4: Recreate Database and Run Migrations
Open your terminal in the Laravel project and run:
```bash
php artisan tinker --execute="DB::statement('CREATE DATABASE agri_system CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');"
php artisan migrate
```

## Alternative: Quick Fix Script
After steps 1-3, you can run:
```bash
php reset_db.php
php artisan migrate
```
