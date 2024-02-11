<?php
header("Access-Control-Allow-Origin: *");
include '../con/con.php';

function getProtocol()
{
    $protocol = isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    return $protocol . "://" . $_SERVER['HTTP_HOST'];
}

$keyword = isset($_GET["key"]) ? $_GET["key"] : '';

$statement = $database_connection->prepare("SELECT * FROM `news_catalog` WHERE `title` LIKE ?");
$statement->execute(["%$keyword%"]);

$data = array();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $row["img"] = getProtocol() . "/" . $row["img"];
    $data[] = $row;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
?>
