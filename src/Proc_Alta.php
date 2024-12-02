<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "mysql";
$username = "root";
$password = "12345";
$dbname = "lamscruises";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $apellidos = $conn->real_escape_string($_POST['apellidos']);
    $email = $conn->real_escape_string($_POST['email']);
    $direccion = $conn->real_escape_string($_POST['direccion']);
    $fecha_nacimiento = $conn->real_escape_string($_POST['fecha_nacimiento']);

    if (empty($nombre) || empty($apellidos) || empty($email) || empty($direccion) || empty($fecha_nacimiento)) {
        header("Location: Formulario.html?mensaje=error_campos");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: Formulario.html?mensaje=error_email");
        exit();
    }

    $sql = $conn->prepare("INSERT INTO datos (nombre, apellidos, email, direccion, fecha_nacimiento) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("sssss", $nombre, $apellidos, $email, $direccion, $fecha_nacimiento);

    if ($sql->execute()) {
        header("Location: Formulario.html?mensaje=exito");
        exit();
    } else {
        header("Location: Formulario.html?mensaje=error_bd");
        exit();
    }

    $sql->close();
    $conn->close();
    exit();
}

$conn->close();
?>
