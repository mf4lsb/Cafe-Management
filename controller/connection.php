<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "cafemanagement";
    $conn = mysqli_connect($hostname, $username, $password, $dbName);


    if($conn == false)
    {
        die("ERROR" . mysqli_connect_error());
    }
?>