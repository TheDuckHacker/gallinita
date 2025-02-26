<?php
include("../conexion.php");

if ($conexion) {
    echo "Conexión exitosa a la base de datos.";
} else {
    echo "Error de conexión.";
}
?>
