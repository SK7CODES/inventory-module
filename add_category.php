<?php
// add_category.php

require_once 'db_connection.php'; // Include your database connection script

// Check if the request method is POST and if 'name' parameter is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    $name = $_POST['name'];

    try {
        // Insert the new category into the database
        $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (:name)");
        $stmt->bindParam(':name', $name);
        $stmt->execute();

        // Retrieve the ID of the newly inserted category
        $categoryId = $pdo->lastInsertId();

        // Return success response with the ID of the new category
        echo json_encode(['success' => true, 'id' => $categoryId, 'name' => $name]);
        exit();
    } catch (PDOException $e) {
        // Return error message if insertion fails
        echo json_encode(['success' => false, 'message' => 'Failed to add category: ' . $e->getMessage()]);
        exit();
    }
} else {
    // Return error if request method or parameters are invalid
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
    exit();
}
?>
