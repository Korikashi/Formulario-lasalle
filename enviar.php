<?php

include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Acceso no permitido");
}

if(empty($_POST["nombre"]) || empty($_POST["email"]) || empty($_POST["mensaje"])){
    die("Todos los campos son obligatorios");
}

$nombre = trim($_POST["nombre"]);
$email = trim($_POST["email"]);
$mensaje = trim($_POST["mensaje"]);

$sql = "INSERT INTO mensajes (nombre, email, mensaje)
VALUES ('$nombre','$email','$mensaje')";

if ($conn->query($sql) === TRUE) {

    header("Location: contacto.html?enviado=1");
    exit();

} else {

    echo "Error: " . $conn->error;

}

$conn->close();

?>