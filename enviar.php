<?php

include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Acceso no permitido");
}

if(empty($_POST["nombre"]) || empty($_POST["correo"]) || empty($_POST["mensaje"])){
    die("Todos los campos son obligatorios");
}

$nombre = trim($_POST["nombre"]);
$correo = trim($_POST["correo"]);
$mensaje = trim($_POST["mensaje"]);

$sql = "INSERT INTO mensajes (nombre, correo, mensaje)
VALUES ('$nombre','$correo','$mensaje')";

if ($conn->query($sql) === TRUE) {

    header("Location: contacto.html?enviado=1");
    exit();

} else {

    echo "Error: " . $conn->error;

}

$conn->close();

?>