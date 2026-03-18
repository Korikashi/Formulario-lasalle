CREATE DATABASE IF NOT EXISTS lasalle_contacto
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;


USE lasalle_contacto;


CREATE TABLE IF NOT EXISTS mensajes (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  nombre     VARCHAR(100) NOT NULL,
  apellido   VARCHAR(100) NOT NULL,
  email      VARCHAR(150) NOT NULL,
  telefono   VARCHAR(20),
  programa   VARCHAR(100),
  asunto     VARCHAR(200),
  mensaje    TEXT,
  fecha      TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);