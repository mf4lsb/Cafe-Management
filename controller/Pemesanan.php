<?php

include_once 'connection.php';
session_start();

$namaPemesanan = $_POST['namaPemesanan'];
$pelayan = $_POST['pelayan'];
$jmlPesanan = $_POST['jmlPesanan'];

$sql = "SELECT * FROM tb_pelayan";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
    if($row['pelayan'] == $pelayan)
    {
        $pelayan_id = $row['id_pelayan'];
    }
}

$sql = "INSERT INTO tb_pemesanan (nama_pemesan, jumlah_pesanan, pelayan_id) VALUES ('$namaPemesanan', '$jmlPesanan', $pelayan_id)";

mysqli_query($conn, $sql);
$_SESSION['jmlPesanan'] = $jmlPesanan;

header("Location: ../pemesanan2.php");

?>