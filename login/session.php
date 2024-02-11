<?php
header("Access-Control-Allow-Origin: *");
include '../con/con.php';

$session_token = $_POST['session_token'];
if (isset($session_token)) {
    try {
        $statement = $database_connection->prepare("SELECT id, name, profile_image FROM users WHERE session_token = ?");
        $statement->execute([$session_token]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'id' => $user['id'], 'name' => $user['name'], 'profile_image' => $user['profile_image']]);
        } else {
            http_response_code(401); // Unauthorized
            echo json_encode(['status' => 'error', 'message' => 'Invalid session']);
        }
    } catch (PDOException $e) {
        http_response_code(500); // Internal Server Error
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
} else {
    http_response_code(400); // Bad Request
    echo json_encode(['status' => 'error', 'message' => 'Invalid session']);
}
?>
