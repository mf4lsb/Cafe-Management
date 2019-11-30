<?php

include_once 'connection.php';
session_start();
$jmlPesanan = $_SESSION['jumlahPesanan'];
// echo $jmlPesanan;
$pemesanan_id = 0;
$lastRow = "SELECT * FROM tb_pemesanan ORDER BY id_pemesanan DESC LIMIT 1";
$coba = mysqli_query($conn, $lastRow);
//var_dump($coba);
while($row = mysqli_fetch_assoc($coba))
{
    //echo "dfsdf";
    $pemesanan_id = $row['id_pemesanan'];
}
//$pemesanan_id = $coba['nama_pemesanan'];//
//echo $pemesanan_id;
//echo $pemesanan_id;

for($i=1;$i<=$jmlPesanan;$i++){
    $menu = $_POST['menu' . $i];

    $query = "SELECT * FROM  tb_menu";
    $result = mysqli_query($conn, $query);
    //var_dump($result);
    while($row = mysqli_fetch_assoc($result))
    {
        if($row['menu'] == $menu)
        {
            $menu_id = $row['id_menu']; //
//            echo $menu_id;
        }
    }

    $quantity = $_POST['quantity'.$i];//
//    echo $quantity;
    
    $sql = "INSERT INTO tb_pesanan_pemesan (menu_id, pemesanan_id, quantity) VALUES ('$menu_id', '$pemesanan_id', '$quantity')";
    mysqli_query($conn, $sql);
    $status = 0;

    $query = "SELECT * FROM tb_pesanan_pemesan ORDER BY id_pesanan DESC LIMIT 1";
    $masuk = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($masuk))
    {
        $pesanan_id = $row['id_pesanan'];
    }
    $sql = "INSERT INTO tb_daftar_pesanan (pesanan_id, pemesanan_id, status) VALUES ('$pesanan_id','$pemesanan_id', '$status')";
    mysqli_query($conn, $sql);
}


header("Location: ../index.php");

?>