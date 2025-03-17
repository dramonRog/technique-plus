<?php
include 'db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    try {
        // Check if the user exists
        $query = $db->prepare("SELECT * FROM users WHERE email = ?");
        $query->bind_param("s", $email);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows === 0) {
            http_response_code(401);
            echo json_encode(["status" => "error", "emailError" => "Email does not exist."]);
            exit;
        }

        $user = $result->fetch_assoc();

        // Verify password
        if (!password_verify($password, $user['password'])) {
            http_response_code(401);
            echo json_encode(["status" => "error", "passwordError" => "Invalid password."]);
            exit;
        }

        // Successful login
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['birthdate'] = $user['birthdate'];
        $_SESSION['gender'] = $user['gender'];
        $_SESSION['profile_picture'] = $user['profile_picture'];

        http_response_code(200);
        echo json_encode([
            "status" => "success",
            "data" => [
                "username" => $user['name'],
                "email" => $user['email'],
                "birthdate" => $user['birthdate'],
                "gender" => $user['gender'],
                "profile_picture" => $user['profile_picture']
            ]
        ]);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>
