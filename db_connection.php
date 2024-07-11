<?php
$host = 'localhost';
$db = 'inventory_db'; // Your database name
$user = 'postgres'; // Your database user
$pass = 'sahil'; // Your database password
$port = '5432'; // Default PostgreSQL port

// DSN (Data Source Name)
$dsn = "pgsql:host=$host;port=$port;dbname=$db";

try {
    // Create a PDO instance
    $pdo = new PDO($dsn, $user, $pass);

    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
