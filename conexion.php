<?php
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "avicola_bd";

// Crear conexión
$conexion = new mysqli($servername, $username_db, $password_db, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}


?>

