<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "restaurant_qr";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>