<?php
require 'db.php'; // Підключення до бази даних

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);

    if (empty($name)) {
        echo json_encode(['status' => 'error', 'message' => 'Category name is required.']);
        exit;
    }

    $stmt = $db->prepare('SELECT COUNT(*) AS count FROM categories WHERE name = ?');
    $stmt->bind_param('s', $name);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Category name must be unique.']);
        exit;
    }

    $stmt = $db->prepare('INSERT INTO categories (name) VALUES (?)');
    $stmt->bind_param('s', $name);
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Category added successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database error.']);
    }
    $stmt->close();
}
?>
