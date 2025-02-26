<?php
session_start();
// 1. Comprobar que el usuario esté logueado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../IniciodeSesion.php?error=Acceso no autorizado");
    exit();
}
// 2. Comprobar que el rol sea 3 (Veterinario)
if ($_SESSION['id_rol'] != 3) {
    header("Location: ../IniciodeSesion.php?error=No tienes permiso para acceder a esta sección");
    exit();
}
?>

<!DOCTYPE html>
<html>
 <head>
  <title>
   Dashboard Veterinario
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
    }
    .container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
    }
    .form-container {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        width: 40%;
    }
    .table-container {
        width: 55%;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    input, button {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    button {
        background-color: #4a90e2;
        color: white;
        cursor: pointer;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        border: 1px solid #ccc;
        text-align: left;
    }
    th {
        background-color: #f4f4f4;
    }
</style>

 </head>
 <body>
  <div class="navbar">
   <div class="date">
    San Sebastian
   </div>
   <div class="user">
    <a href="#">
     Inicio
    </a>
    <img alt="User Profile Picture" height="40" src="../icono.jpg" width="40"/>
    <a href="#">
     Cerrar Sesion
    </a>
   </div>
  </div>
  <div class="main">
   <div class="sidebar">
    
    <ul class="menu">
    
     <li>
      <a class="revenue" href="#">
       <i class="fas fa-cogs">
       </i>
       <span>
        Procesos
       </span>
      </a>
      <ul class="submenu">
        <li>
         <a href="#">
         Reg.Corral
       </a>
        </li>

       <li>
        <a href="#">
         Reg.Lotes Ingreso
        </a>
       </li>
       <li>
        <a href="#">
         Reg.Proceso Crianza
        </a>
       </li>
       <li>
        <a href="#">
         Reg.Estado Salud Fase Crianza
        </a>
       </li>
       <li>
        <a href="#">
         Reg.Cierre Proceso Crianza
        </a>
       </li>
       <li>
        <a href="#">
         Reg.Inventario Gallinas Ponedoras
        </a>
       </li>
       <li>
        <a href="#">
         Reg.Inventario Productos
            </a>
           </li>

        <li>
            <a href="#">
             Reg.Salida Productos
                </a>
        </li>
        <li>
            <a href="#">
             Reg.P.Transporte Asignado
                </a>
               </li>
               <li>
        <a href="#">
            Reg.Planilla Personal
        </a>
        </li>

       <li>
        <a href="#">
         G.Bajas Gallinas Ponedoras
        </a>
       </li>
       <li>
        <a href="#">
         G.Recepcion Diaria Huevos
        </a>
        <li>

      </ul>
     </li>
     <li>
      <a class="notifications" href="#">
       <i class="fas fa-file-alt">
       </i>
       <span>
        Reportes
       </span>
      </a>
      <ul class="submenu">
       <li>
        <a href="#">
         Reporte Vacuna Aplicada
        </a>
       </li>
       <li>
        <a href="#">
         Reporte Produccion Gallina
        </a>
       </li>
       <li>
        <a href="#">
         Reporte Lote Ingreso Aves
        </a>
       </li>
      </ul>
     </li>
     <li>
      <a href="#">
       <i class="fas fa-tags">
       </i>
       <span>
        Nuestras Marcas
       </span>
      </a>
     </li>
     <li>
      <a href="#">
       <i class="fas fa-box-open">
       </i>
       <span>
        Nuestros Productos
       </span>
      </a>
     </li>
     <li>
      <a href="#">
       <i class="fas fa-wallet">
       </i>
       <span>
        Platita
       </span>
      </a>
     </li>

    </ul>
   </div>
   <div class="content">
    <div>
     <h1>
      BIENVENIDO
     </h1>
     <p>
      Bienvenido Veterinario!!
     </p>
    </div>
   </div>
  </div>
 </body>
</html>