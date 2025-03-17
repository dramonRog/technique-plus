<?php
session_start();
header('Content-Type: application/json');

if (isset($_SESSION['user_id'])) {
    echo json_encode([
        "status" => "success",
        "data" => [
            "username" => $_SESSION['username'],
            "email" => $_SESSION['email'],
            "birthdate" => $_SESSION['birthdate'],
            "gender" => $_SESSION['gender'],
            "profile_picture" => $_SESSION['profile_picture']
        ]
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "No user logged in."
    ]);
}
?>
