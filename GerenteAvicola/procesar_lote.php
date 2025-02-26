<?php
session_start();
include("../conexion.php");

if (!isset($_SESSION['id_usuario'])) {
    die("Error: No hay un usuario autenticado.");
}

$idUsuario = $_SESSION['id_usuario']; // Obtiene el ID del usuario logueado

$cantidad = $_POST['cantidad'];
$detalle = $_POST['detalle'];
$fechaAdquisicion = $_POST['fechaAdquisicion'];

$sql = "INSERT INTO loteingreso (cantidad, detalle, fechaAdquisicion, id_Usuario) 
        VALUES ('$cantidad', '$detalle', '$fechaAdquisicion', '$idUsuario')";

if ($conexion->query($sql) === TRUE) {
    header("Location: registrar_lote.php?success=1");
} else {
    header("Location: registrar_lote.php?error=" . urlencode($conexion->error));
}
exit();

?>


