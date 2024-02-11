<?php
header("Access-Control-Allow-Origin: *");
include '../con/con.php';

$email = $_POST["email"];
$password = $_POST["pwd"];

if (isset($email) && isset($password)) {
    // Mengambil data pengguna dari database berdasarkan email
    $statement = $database_connection->prepare("SELECT id, email, password FROM users WHERE email = ?");
    $statement->execute([$email]);
    $email = $statement->fetch(PDO::FETCH_ASSOC);
    
    // Verifikasi kata sandi dengan menggunakan SHA1
    if ($email && sha1($password) == $email['password']) {
        // Jika verifikasi berhasil, buat token sesi baru
        $session_token = bin2hex(random_bytes(16));
        
        // Perbarui token sesi di database
        $updateStatement = $database_connection->prepare("UPDATE users SET session_token = ? WHERE id = ?");
        $updateStatement->execute([$session_token, $email['id']]);
        
        // Mengembalikan respons JSON sukses dengan token sesi
        echo json_encode(['status' => 'success', 'session_token' => $session_token]);
    } else {
        // Jika verifikasi gagal, kirim pesan kesalahan
        echo json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
    }
} else {
    // Jika permintaan tidak valid, kirim pesan kesalahan
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
