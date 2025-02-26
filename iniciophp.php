<?php
session_start();
include 'conexion.php'; 

if (isset($_POST['login'])) {
    $username = trim($_POST['nombre']);
    $password = trim($_POST['password']);

    // Consulta a la base de datos
    $stmt = $conexion->prepare("SELECT * FROM usuario WHERE nombre = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verificar si el usuario existe y la contraseña es correcta
    if ($user && $password === $user['password']) { 
        $_SESSION['id_usuario'] = $user['id_Usuario'];
        $_SESSION['nombre'] = $user['nombre'];
        $_SESSION['id_rol'] = $user['id_Rol'];

    // Redireccionar según el rol
    switch ($user['id_Rol']) {
        case 1:
            header("Location: GerenteAvicola/accesogeren.php");
            break;
        case 2:
            header("Location: EncargadoProduccion/accesoencarg.php");
            break;
        case 3:
            header("Location: Veterinario/accesoveter.php");
            break;
        default:
            header("Location: IniciodeSesion.php?error=Rol no definido");
            break;
    }
    } else {
        header("Location: IniciodeSesion.php?error=Usuario o contraseña incorrectos");
        exit();
    }
} else {
    header("Location: IniciodeSesion.php");
    exit();
}
// Cerrar conexión
$stmt->close();
$conexion->close();
?>
