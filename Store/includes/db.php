<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "online_store";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

?>