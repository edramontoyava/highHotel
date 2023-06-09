<?php
  include('../../php/db.php');
  require_once '../../php/validar_sesion.php';
  require_once '../../php/validar_rol.php';
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HH</title>
    <link rel="stylesheet" href="/highHotel/css/hoteleria_style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  </head>
  <body>
  <?php
    include('../includes/menu.php');
    ?>
    <?php
    include('../includes/header.php');
    ?>

      <h3 class="i-name">Tablero de encuestas contestadas</h3>
      <div class="values">
        <div class="val-box">
          <i class="fas fa-users"></i>
          <div>
            <?php
              if($_SESSION['rol']==='Master'){
                $conexion = mysqli_connect('localhost', 'root', '', 'hh');
                $sql="SELECT  encuesta, COUNT(*) as 'Total' FROM empleado WHERE encuesta = 'Si';";
                $result=mysqli_query($conexion,$sql);
                $renglon=mysqli_fetch_array($result);
                $total = $renglon['Total'];
                echo "<h3>$total</h3>";
              }else{
                $conexion = mysqli_connect('localhost', 'root', '', 'hh');
                $claveHotel = $_SESSION['claveH'];
                $sql="SELECT  encuesta, COUNT(*) as 'Total' FROM empleado WHERE encuesta = 'Si' and claveHotel = '$claveHotel';";
                $result=mysqli_query($conexion,$sql);
                $renglon=mysqli_fetch_array($result);
                $total = $renglon['Total'];
                echo "<h3>$total</h3>";
              }
            ?>
            <span>Total de Encuestas contestadas</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fas fa-hotel"></i>
          <div>
          <?php
              if($_SESSION['rol'] === 'Master'){
                $conexion = mysqli_connect('localhost', 'root', '', 'hh');
                $claveHotel = $_SESSION['claveH'];
                $sql="SELECT  encuesta, COUNT(*) as 'Total' FROM empleado WHERE encuesta = 'No';";
                $result=mysqli_query($conexion,$sql);
                $renglon=mysqli_fetch_array($result);
                $total = $renglon['Total'];
              echo "<h3>$total</h3>";
              }else{
                $conexion = mysqli_connect('localhost', 'root', '', 'hh');
                $claveHotel = $_SESSION['claveH'];
                $sql="SELECT  encuesta, COUNT(*) as 'Total' FROM empleado WHERE encuesta = 'No' and claveHotel = '$claveHotel';";
                $result=mysqli_query($conexion,$sql);
                $renglon=mysqli_fetch_array($result);
                $total = $renglon['Total'];
              echo "<h3>$total</h3>";
              }         

            ?>
            <span>Total de encuestas no contestadas</span>
          </div>
        </div>
      <?php
        include('../includes/board.php');
      ?>
    <script>
      $("#menu-btn").click(function () {
        $("#menu").toggleClass("active");
      });
    </script>
  </body>
</html>
