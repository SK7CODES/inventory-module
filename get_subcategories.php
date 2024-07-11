<?php
require 'db_connection.php';

if (isset($_GET['category'])) {
    $category_id = $_GET['category'];

    try {
        $sql = "SELECT * FROM subcategories WHERE category_id = :category_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
        $subcategories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($subcategories)) {
            // Provide default subcategories for predefined categories
            if ($category_id == 1) { // Food and Beverages
                $subcategories = [
                    ['id' => '1', 'name' => 'Dry Goods'],
                    ['id' => '2', 'name' => 'Dairy']
                ];
            } elseif ($category_id == 2) { // Equipments
                $subcategories = [
                    ['id' => '3', 'name' => 'Kitchen Appliances'],
                    ['id' => '4', 'name' => 'Tools']
                ];
            }
        }

        echo json_encode($subcategories);
    } catch (PDOException $e) {
        echo json_encode([]);
    }
}
?>
