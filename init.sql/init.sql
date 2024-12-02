-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS lamscruises;

-- Usar la base de datos creada
USE lamscruises;

-- Crear la tabla "datos"
CREATE TABLE IF NOT EXISTS datos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellidos VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    direccion VARCHAR  (150),
    fecha_nacimiento DATE
);
