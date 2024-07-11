<?php
// add_subcategory.php

require_once 'db_connection.php'; // Include your database connection script

// Check if the request method is POST and if 'name' and 'category_id' parameters are set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['category_id'])) {
    $name = $_POST['name'];
    $categoryId = $_POST['category_id'];

    try {
        // Insert the new subcategory into the database
        $stmt = $pdo->prepare("INSERT INTO subcategories (name, category_id) VALUES (:name, :category_id)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':category_id', $categoryId);
        $stmt->execute();

        // Retrieve the ID of the newly inserted subcategory
        $subcategoryId = $pdo->lastInsertId();

        // Return success response with the ID of the new subcategory
        echo json_encode(['success' => true, 'id' => $subcategoryId]);
        exit();
    } catch (PDOException $e) {
        // Return error message if insertion fails
        echo json_encode(['success' => false, 'message' => 'Failed to add subcategory: ' . $e->getMessage()]);
        exit();
    }
} else {
    // Return error if request method or parameters are invalid
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
    exit();
}
?>
