<?php
// Reset database by dropping and recreating it
require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

$dbName = env('DB_DATABASE', 'agri_system');

try {
    // Connect to MySQL without selecting a database
    $pdo = new PDO(
        'mysql:host=' . env('DB_HOST', '127.0.0.1') . ';port=' . env('DB_PORT', '3306'),
        env('DB_USERNAME', 'root'),
        env('DB_PASSWORD', '')
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Dropping database {$dbName}...\n";
    $pdo->exec("DROP DATABASE IF EXISTS `{$dbName}`");

    echo "Creating database {$dbName}...\n";
    $pdo->exec("CREATE DATABASE `{$dbName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

    echo "Database reset successfully!\n";
    echo "Now run: php artisan migrate\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
