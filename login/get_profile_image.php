<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
include '../con/con.php';

$session_token = $_POST['session_token'];

if (isset($session_token)) {
    $statement = $database_connection->prepare("SELECT name, profile_image FROM users WHERE session_token = ?");
    $statement->execute([$session_token]);
    $user_data = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user_data) {
        $response = [
            'status' => 'success',
            'name' => $user_data['name'],
            'profile_image' => $user_data['profile_image'],
        ];
        echo json_encode($response);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid session']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid session']);
}
?>
