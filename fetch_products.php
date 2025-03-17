<?php
require 'db.php';

$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;

$query = "SELECT products.id, products.name, products.description, products.price, products.image, categories.name AS category 
          FROM products 
          INNER JOIN categories ON products.category_id = categories.id";

if ($category_id > 0) {
    $query .= " WHERE products.category_id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('i', $category_id);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $db->query($query);
}

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

echo json_encode($products);
?>
