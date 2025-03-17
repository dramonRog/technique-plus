<?php
require 'db.php'; // Підключення до бази даних

$result = $db->query('SELECT id, name FROM categories');

$categories = [];
while ($row = $result->fetch_assoc()) {
    $categories[] = $row;
}

echo json_encode($categories);
?>
