<?php
include 'db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'sendmail/src/Exception.php';
require 'sendmail/src/PHPMailer.php';
require 'sendmail/src/SMTP.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $profilePicture = $_FILES['profile_picture'];

    $profilePicturePath = null;
    if (!empty($profilePicture['name'])) {
        $uploadsDir = 'uploads/';
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }
        $profilePicturePath = $uploadsDir . basename($profilePicture['name']);
        move_uploaded_file($profilePicture['tmp_name'], $profilePicturePath);
    }

    try {
        $query = $db->prepare("SELECT * FROM users WHERE name = ? OR email = ?");
        $query->bind_param("ss", $name, $email);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            $existingUser = $result->fetch_assoc();
            $message = $existingUser['name'] === $name ? "Username already exists." : "Email already exists.";
            http_response_code(409);
            echo json_encode(["status" => "error", "message" => $message]);
            exit;
        }

        $insert = $db->prepare("INSERT INTO users (name, email, password, birthdate, gender, profile_picture) VALUES (?, ?, ?, ?, ?, ?)");
        $insert->bind_param("ssssss", $name, $email, $password, $birthdate, $gender, $profilePicturePath);

        if ($insert->execute()) {
            // Створити сесію для зареєстрованого користувача
            session_start();
            $_SESSION['user_id'] = $db->insert_id;
            $_SESSION['username'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['birthdate'] = $birthdate;
            $_SESSION['gender'] = $gender;
            $_SESSION['profile_picture'] = $profilePicturePath;

            http_response_code(200);
            echo json_encode([
                "status" => "success",
                "message" => "Registration successful!",
                "data" => [
                    "username" => $name,
                    "email" => $email,
                    "birthdate" => $birthdate,
                    "gender" => $gender,
                    "profile_picture" => $profilePicturePath
                ]
            ]);
        } else {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Failed to insert user data."]);
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>
