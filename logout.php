<?php
session_start();
session_unset(); // Очистити всі змінні сесії
session_destroy(); // Знищити сесію
header('Content-Type: application/json');
echo json_encode(["status" => "success", "message" => "Logged out successfully."]);
?>
