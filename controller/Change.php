<?php

include_once 'connection.php';

$dPesanan_id = $_POST['id_dPesanan'];

$sql = "UPDATE tb_daftar_pesanan SET status='1' WHERE id_dPesanan='$dPesanan_id'";
mysqli_query($conn, $sql);

header("Location: ../daftarpesanan.php");

?>