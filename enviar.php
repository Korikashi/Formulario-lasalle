<?php

include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Acceso no permitido");
}

if(empty($_POST["nombre"]) || empty($_POST["email"]) || empty($_POST["mensaje"])){
    die("Todos los campos son obligatorios");
}



$nombre = trim($_POST["nombre"]);
$apellido = trim($_POST["apellido"]);
$email = trim($_POST["email"]);
$telefono = trim($_POST["telefono"]);
$programa = trim($_POST["programa"]);
$asunto = trim($_POST["asunto"]);
$mensaje = trim($_POST["mensaje"]);


$sql = "INSERT INTO mensajes (nombre, apellido, email, telefono, programa, asunto, mensaje)
VALUES ('$nombre', '$apellido', '$email', '$telefono', '$programa', '$asunto', '$mensaje')";

if ($conn->query($sql) === TRUE) {

    header("Location: contacto.html?enviado=1");
    exit();

} else {

    echo "Error: " . $conn->error;

}

$conn->close();

?>