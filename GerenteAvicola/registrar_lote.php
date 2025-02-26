
<!DOCTYPE html>
<html>
<head>
    <title>Registrar Lote de Gallinas</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
/* Estilo básico de la página */
body {
    margin: 0;
    font-family: 'Arial', sans-serif;
    background-color: #e0e7ff;
    display: flex;
    flex-direction: column;
    height: 100vh;
    overflow: hidden;
}

.navbar {
    width: 100%;
    height: 60px;
    background-color: #e2630f;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.main {
    display: flex;
    flex: 1;
    overflow: hidden;
}

/* Sidebar */
.sidebar {
    width: 80px;
    height: calc(100vh - 60px);
    background-color: #fff;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0,0,0,0.1);
    transition: width 0.3s;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.sidebar:hover {
    width: 250px;
}

.sidebar .menu {
    list-style: none;
    padding: 0;
    color: #e2630f;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Estilo del área principal */
.content {
    flex: 1;
    padding: 20px;
    display: flex;
    justify-content: space-between; /* Para separar el formulario de los lotes */
    overflow: auto;
}

/* Formulario y lista de lotes */
.form-container {
    width: 48%; /* Asegura que el formulario ocupe menos del 50% */
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.lotes-container {
    width: 48%; /* Asegura que la lista de lotes ocupe menos del 50% */
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    overflow-y: auto;
}

.lotes-container ul {
    list-style: none;
    padding: 0;
}

.lotes-container ul li {
    padding: 8px;
    border-bottom: 1px solid #ddd;
}

/* Estilo para los elementos pequeños como iconos */
.sidebar .menu li a i {
    font-size: 24px;
}

/* Responsividad */
@media (max-width: 768px) {
    .sidebar {
        width: 60px;
    }

    .content {
        flex-direction: column; /* Cambiar a columna cuando la pantalla sea pequeña */
    }

    .form-container, .lotes-container {
        width: 100%;
    }
}

</style>
</head>
<body>
<?php

include("../conexion.php");

if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<p style='color: green; font-weight: bold;'>Lote registrado exitosamente.</p>";
} elseif (isset($_GET['error'])) {
    echo "<p style='color: red; font-weight: bold;'>{$_GET['error']}</p>";
}
?>
<h2>Registrar Lote de Gallinas</h2>

<div class="content">  <!-- Contenedor principal -->
    <div class="form-container">
        <form action="procesar_lote.php" method="POST">
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" required>

            <label for="detalle">Detalle:</label>
            <input type="text" name="detalle" id="detalle" required>

            <label for="fechaAdquisicion">Fecha de Adquisición:</label>
            <input type="date" name="fechaAdquisicion" id="fechaAdquisicion" required>

            <button type="submit">Registrar</button>
        </form>
    </div>

    <div class="lotes-container">
        <h2>Lotes Registrados</h2>
        <table>
            <tr>
                <th>ID Lote</th>
                <th>Cantidad</th>
                <th>Detalle</th>
                <th>Fecha de Adquisición</th>
                <th>ID Usuario</th>
            </tr>
        <?php
if (isset($conexion)) {  // Verifica que la conexión existe
    $sql = "SELECT id_LoteIngreso, cantidad, detalle, fechaAdquisicion, id_Usuario FROM loteingreso";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td>{$fila['id_LoteIngreso']}</td>
                    <td>{$fila['cantidad']}</td>
                    <td>{$fila['detalle']}</td>
                    <td>{$fila['fechaAdquisicion']}</td>
                    <td>{$fila['id_Usuario']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No hay lotes registrados.</td></tr>";
    }
    } else {
    echo "<tr><td colspan='5' style='color:red;'>Error de conexión con la base de datos.</td></tr>";
            }

        ?>

        </table>
</div>

</body>
</html>
