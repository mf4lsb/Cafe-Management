<?php

include_once 'connection.php';

$addWaiters = $_POST['addWaiters'];

$sql = "INSERT INTO tb_pelayan (pelayan) VALUES ('$addWaiters')";

mysqli_query($conn, $sql);

header("Location: ../pelayan.php");

?>