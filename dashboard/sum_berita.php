<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=utf-8');
include '../con/con.php';

    $statement = $database_connection->prepare("SELECT COUNT(*) AS `jumlah_berita` FROM `news_catalog`;");
    $statement->execute();
    $data = array();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
    }
echo json_encode($data);
?>

