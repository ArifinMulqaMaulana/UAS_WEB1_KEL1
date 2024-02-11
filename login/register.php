<?php
header("Access-Control-Allow-Origin: *");
include '../con/con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["pwd"];

    // File upload handling
    $targetDir = "uploads/"; // Pastikan direktori ini ada dan dapat diakses
    $targetFile = $targetDir . basename($_FILES["profile_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Cek apakah file gambar valid
    if(isset($_FILES["profile_image"])) {
        $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo json_encode(['status' => 'error', 'message' => 'File bukan gambar.']);
            $uploadOk = 0;
        }
    }

    // Cek apakah file sudah ada
    if (file_exists($targetFile)) {
        echo json_encode(['status' => 'error', 'message' => 'File sudah ada.']);
        $uploadOk = 0;
    }

    // Cek ukuran file
    if ($_FILES["profile_image"]["size"] > 500000) {
        echo json_encode(['status' => 'error', 'message' => 'Ukuran file terlalu besar.']);
        $uploadOk = 0;
    }

    // Jika semua valid, lakukan pendaftaran
    if ($uploadOk == 1) {
        $hashedPassword = sha1($password);

        $registerStatement = $database_connection->prepare("INSERT INTO users (name, email, password, profile_image) VALUES (?, ?, ?, ?)");
        $registerStatement->execute([$name, $email, $hashedPassword, $targetFile]);

        // Pindahkan file gambar ke direktori target
        move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFile);

        echo json_encode(['status' => 'success', 'message' => 'Pendaftaran berhasil']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal mengunggah gambar.']);
    }
} else {
    // Jika bukan metode POST, kirim pesan kesalahan
    echo json_encode(['status' => 'error', 'message' => 'Metode tidak diizinkan']);
}
?>
