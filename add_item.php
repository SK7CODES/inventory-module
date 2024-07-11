<?php
require 'db_connection.php';

$category_id = $_POST['primary_category'];
$subcategory_id = $_POST['sub_category'];
$item_name = $_POST['item_name'];
$quantity = $_POST['quantity'];
$unit = $_POST['unit'];
$expiry_date = $_POST['expiry_date'];
$description = $_POST['description'];
$storage_location = $_POST['storage_location'];
$perishable = $_POST['perishable'];

try {
    $sql = "INSERT INTO items (category_id, subcategory_id, name, quantity, unit, expiry_date, description, storage_location, perishable) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$category_id, $subcategory_id, $item_name, $quantity, $unit, $expiry_date, $description, $storage_location, $perishable]);
    echo "Item added successfully!";
    // Redirect to a page showing the added item or a success message
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
