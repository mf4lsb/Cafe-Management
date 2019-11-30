<?php

include_once 'connection.php';

$addMenu = $_POST['addMenu'];
$addPrice = $_POST['addPrice'];

$sql = "INSERT INTO tb_menu (menu, harga) VALUES ('$addMenu', '$addPrice')";

mysqli_query($conn, $sql);

header("Location: ../menu.php");

?>