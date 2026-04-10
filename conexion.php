// Cuarto cambio - conexión verificada por Humberto
<?php

$host = "127.0.0.1"; // cambiar cuando se suba a InfinityFree
$user = "root";
$password = "";
$db = "lasalle_contacto";
$port = 3307;

$conn = new mysqli($host, $user, $password, $db, $port);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>