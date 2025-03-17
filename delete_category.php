<?php
require 'db.php'; // Підключення до бази даних

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);

    // Перевірка: чи є продукти, прив'язані до категорії
    $stmt = $db->prepare('SELECT COUNT(*) AS product_count FROM products WHERE category_id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['product_count'] > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Category cannot be deleted because it has associated products.']);
        exit;
    }

    // Видалення категорії
    $stmt = $db->prepare('DELETE FROM categories WHERE id = ?');
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database error.']);
    }
    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
    