<?php
header("Access-Control-Allow-Origin: *");

include '../con/con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["pwd"];

    $hashedPassword = sha1($password);

    // File upload handling
    $targetDir = "uploads/";
    $targetFile = $targetDir . uniqid() . '_' . basename($_FILES["profile_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is a valid image
    if (!getimagesize($_FILES["profile_image"]["tmp_name"])) {
        echo json_encode(['status' => 'error', 'message' => 'File bukan gambar.']);
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["profile_image"]["size"] > 500000) {
        echo json_encode(['status' => 'error', 'message' => 'Ukuran file terlalu besar.']);
        $uploadOk = 0;
    }

    // If all validations pass, update user information
    if ($uploadOk == 1) {
        // Update user information in the database
        $updateStatement = $database_connection->prepare("UPDATE users SET name=?, email=?, password=?, profile_image=? WHERE id=?");
        $updateStatement->execute([$name, $email, $hashedPassword, $targetFile, $id]);

        // Move uploaded image to the target directory
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFile)) {
            echo json_encode(['status' => 'success', 'message' => 'Perubahan berhasil disimpan']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal mengunggah gambar.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal mengunggah gambar.']);
    }
} else {
    // If not a POST method, send an error message
    echo json_encode(['status' => 'error', 'message' => 'Metode tidak diizinkan']);
}
?>
