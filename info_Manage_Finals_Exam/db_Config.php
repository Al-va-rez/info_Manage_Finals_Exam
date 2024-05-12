<?php
    $user = "root";
    $password = "";

    $host = "localhost";
    $dbname = "info_manage_finals_exam";
    $dsn = "mysql:host={$host};dbname={$dbname}";

    $conn = new PDO($dsn, $user, $password);
    $conn->exec("SET time_zone = '+08:00';");
?>