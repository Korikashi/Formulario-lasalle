<?php

include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Acceso no permitido");
}

if(empty($_POST["nombre"]) || empty($_POST["email"]) || empty($_POST["mensaje"])){
    die("Todos los campos son obligatorios");
}

$nombre   = htmlspecialchars(trim($_POST["nombre"]));
$apellido = htmlspecialchars(trim($_POST["apellido"]));
$email    = htmlspecialchars(trim($_POST["email"]));
$telefono = htmlspecialchars(trim($_POST["telefono"]));
$programa = htmlspecialchars(trim($_POST["programa"]));
$asunto   = htmlspecialchars(trim($_POST["asunto"]));
$mensaje  = htmlspecialchars(trim($_POST["mensaje"]));

// Prepared statement - protege contra SQL injection
$stmt = $conn->prepare("INSERT INTO mensajes (nombre, apellido, email, telefono, programa, asunto, mensaje) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $nombre, $apellido, $email, $telefono, $programa, $asunto, $mensaje);

if ($stmt->execute()) {
    header("Location: contacto.html?enviado=1");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>