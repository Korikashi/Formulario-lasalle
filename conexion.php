<?php

$host = "localhost"; // cambiar cuando se suba a InfinityFree
$user = "root";
$password = "";
$db = "contacto_lasalle";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>