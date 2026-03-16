<?php

include "conexion.php";

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$mensaje = $_POST["mensaje"];

$sql = "INSERT INTO mensajes (nombre, correo, mensaje)
VALUES ('$nombre','$correo','$mensaje')";

if ($conn->query($sql) === TRUE) {
    echo "Mensaje enviado correctamente";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

?>