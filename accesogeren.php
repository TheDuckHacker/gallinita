<?php
session_start();
// 1. Comprobar que el usuario esté logueado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../IniciodeSesion.php?error=Acceso no autorizado");
    exit();
}
// 2. Comprobar que el rol sea 1 (Gerente Avicola)
if ($_SESSION['id_rol'] != 1) {
    header("Location: ../IniciodeSesion.php?error=No tienes permiso para acceder a esta sección");
    exit();
}
?>

<!DOCTYPE html>
<html>
 <head>
  <title>
   Dashboard Gerente
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style>
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
        .navbar .date {
            font-size: 18px;
            font-weight: bold;
            color: #fff;
        }
        .navbar .user {
            display: flex;
            align-items: center;
            margin-right: 40px;
        }
        .navbar .user a {
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: bold; /* Make the text bolder */
            display: flex;
            align-items: center;
            margin-right: 20px;
        }
        .navbar .user a:first-child {
            margin-right: 30px; /* Add a little more space between Inicio and the profile picture */
        }
        .navbar .user img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 20px;
        }
        .main {
            display: flex;
            flex: 1;
            overflow: hidden;
        }
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
        .sidebar .profile {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            overflow: hidden;
            white-space: nowrap;
            justify-content: center;
        }
        .sidebar .profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .sidebar .profile .name {
            font-size: 18px;
            font-weight: bold;
            display: none;
        }
        .sidebar .profile .role {
            font-size: 14px;
            color: #888;
            display: none;
        }
        .sidebar:hover .profile .name,
        .sidebar:hover .profile .role {
            display: block;
        }
        .sidebar .menu {
            list-style: none;
            padding: 0;
            color: #e2630f;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .sidebar .menu li {
            margin-bottom: 20px;
            overflow: hidden;
            white-space: nowrap;
            width: 100%;
        }
        .sidebar .menu li a {
            text-decoration: none;
            color: #e2630f;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .sidebar .menu li a i {
            margin-right: 10px;
            font-size: 24px; /* Increase the size of the icons */
        }
        .sidebar .menu li a span {
            display: none;
        }
        .sidebar:hover .menu li a span {
            display: inline;
        }
        .sidebar .menu li a:hover {
            color: #007bff;
        }
        .sidebar .menu li a.active {
            color: #e2630f;
        }
        .sidebar .menu li .submenu {
            display: none;
            list-style: none;
            padding-left: 20px;
        }
        .sidebar .menu li:hover .submenu {
            display: block;
        }
        .sidebar .menu li .submenu li {
            margin-bottom: 10px;
        }
        .sidebar .menu li .submenu li a {
            font-size: 14px;
            color: #e2630f;
        }
        .content {
            flex: 1;
            padding: 20px;
            overflow: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .content h1 {
            font-size: 24px;
            color: #333;
        }
        .content p {
            font-size: 18px;
            color: #666;
        }
        .menu li a.revenue {
            color: #e2630f;
        }
        .menu li a.notifications {
            color: #e2630f;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 60px;
            }
            .sidebar:hover {
                width: 200px;
            }
            .sidebar .menu li a i {
                font-size: 20px;
            }
            .navbar .user {
                margin-right: 20px;
            }
        }
        @media (max-width: 480px) {
            .sidebar {
                width: 50px;
            }
            .sidebar:hover {
                width: 150px;
            }
            .sidebar .menu li a i {
                font-size: 18px;
            }
            .navbar .user {
                margin-right: 10px;
            }
        }
  </style>
 </head>
 <body>
  <div class="navbar">
    <div class="date">
      San Sebastian
    </div>
    <div class="user">
      <a href="#">Inicio</a>
      <img alt="User Profile Picture" height="40" src="../icono.jpg" width="40"/>
      <a href="#">Cerrar Sesion</a>
    </div>
  </div>

  <div class="main">
    <div class="sidebar">
      <ul class="menu">
        <li>
          <a class="revenue" href="#">
            <i class="fas fa-cogs"></i>
            <span>Procesos</span>
          </a>
          <ul class="submenu">

            <li><a href="#">Reg.Corral</a></li>
            <li><a href="registrar_lote.php">Reg.Lotes Ingreso</a></li>

            <li><a href="#">Reg.Proceso Crianza</a></li>
            <li><a href="#">Reg.Cierre Proceso Crianza</a></li>
            <li><a href="#">Reg.Inventario Gallinas Ponedoras</a></li>
            <li><a href="#">Reg.Planilla Personal</a></li>
            <li><a href="#">G.Bajas Gallinas Ponedoras</a></li>
          </ul>
        </li>
        <li><a class="notifications" href="#"><i class="fas fa-file-alt"></i><span>Reportes</span></a></li>
        <li><a href="#"><i class="fas fa-tags"></i><span>Nuestras Marcas</span></a></li>
        <li><a href="#"><i class="fas fa-box-open"></i><span>Nuestros Productos</span></a></li>
        <li><a href="#"><i class="fas fa-wallet"></i><span>Platita</span></a></li>
      </ul>
    </div>
      <!-- Aquí insertas el formulario de registrar lote de gallinas, oculto por defecto -->
      <div id="formContainer" class="form-container" style="display: none;">
        <h2>Registrar Lote de Gallinas</h2>
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
    </div>
  </div>

  <script>
    // Función que muestra el formulario cuando se hace clic en el enlace
    document.getElementById('regLoteIngreso').addEventListener('click', function(event) {
      event.preventDefault();  // Prevenir el comportamiento por defecto del enlace
      var formContainer = document.getElementById('formContainer');
      
      // Alternar la visibilidad del formulario
      if (formContainer.style.display === "none" || formContainer.style.display === "") {
        formContainer.style.display = "block";
      } else {
        formContainer.style.display = "none";
      }
    });
  </script>
</body>

</html>