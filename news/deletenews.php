<?php
header("Access-Control-Allow-Origin: *");
include '../con/con.php';

$id=$_POST["idnews"];

try{
    $statement= $database_connection->prepare("DELETE FROM news_catalog WHERE news_catalog.id=? ");
    $statement->execute([$id]);
    $pesan="Data berhasil dihapus";
    echo $pesan;
}catch(PDOException $cek_koneksi){ 
    die ($cek_koneksi->getMessage());
}
?>