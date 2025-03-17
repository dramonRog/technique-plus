<?php
require 'db.php'; // Підключення до бази даних

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];

    // Обробка завантаження зображення
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $imagePath = 'images/products/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Image upload failed']);
        exit;
    }

    // Вставлення продукту в базу даних
    $stmt = $db->prepare('INSERT INTO products (name, price, category_id, description, image) VALUES (?, ?, ?, ?, ?)');
    $stmt->bind_param('sdiss', $name, $price, $category_id, $description, $imagePath);
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
    $stmt->close();
}
?>
