<?php

$env_file = __DIR__ . '/.env';
if (file_exists($env_file)) {
    $lines = file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
            list($key, $value) = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
        }
    }
}

$host     = $_ENV['DB_HOST'] ?? '';
$user     = $_ENV['DB_USER'] ?? '';
$password = $_ENV['DB_PASSWORD'] ?? '';
$db       = $_ENV['DB_NAME'] ?? '';
$port     = (int)($_ENV['DB_PORT'] ?? 3306);

$conn = new mysqli($host, $user, $password, $db, $port);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>