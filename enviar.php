<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Acceso no permitido");
}

if(empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["email"]) || empty($_POST["telefono"]) || empty($_POST["programa"]) || empty($_POST["asunto"]) || empty($_POST["mensaje"])){
    die("Todos los campos son requeridos");
}

// Función para detectar emojis u otros caracteres especiales no deseados
function contieneEmojis($texto) {
    $patron = '/[\x{1F600}-\x{1F64F}\x{1F300}-\x{1F5FF}\x{1F680}-\x{1F6FF}\x{2600}-\x{26FF}\x{2700}-\x{27BF}\x{1F900}-\x{1F9FF}\x{1FA70}-\x{1FAFF}]/u';
    return preg_match($patron, $texto);
}

if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s\']+$/', $_POST["nombre"]) || !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s\']+$/', $_POST["apellido"])) {
    die("Error: El nombre y apellido solo pueden contener letras.");
}

if (!preg_match('/^[0-9]+$/', $_POST["telefono"])) {
    die("Error: El teléfono solo puede contener números.");
}


if (contieneEmojis($_POST["nombre"]) || contieneEmojis($_POST["mensaje"])) {
    die("Error: No se permiten emojis en los campos del formulario.");
}

if (contieneEmojis($_POST["email"])) {
    die("Error: No se permiten emojis en el correo.");
}

$email_limpio = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
if (!filter_var($email_limpio, FILTER_VALIDATE_EMAIL)) {
    die("Error: Formato de correo electrónico inválido.");
}

include "conexion.php";

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