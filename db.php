<?php
$host = 'localhost';  // Адреса сервера
$user = 'root';       // Ім'я користувача
$password = 'dRamon_2006';       // Пароль (за замовчуванням порожній у XAMPP)
$dbname = 'electronic_store';  // Назва бази даних

// Створення з'єднання
$db = new mysqli($host, $user, $password, $dbname);

// Перевірка з'єднання
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
