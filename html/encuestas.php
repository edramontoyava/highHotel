<?php
  include('../php/db.php');
  require_once '../php/validar_sesion.php';
  require_once '../php/validar_rol.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENCUESTA NOM-035</title>
    <link rel="stylesheet" href="../css/encuesta.css">
    <link rel="stylesheet" href="../css/style.css">
    
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
</head>
    <body>
    <?php
      include('../pages/includes/header.php');
      include('../pages/includes/menu.php');
      include('../pages/includes/board.php');

    if($_SESSION['rol']=='Empleado'){
      $claveEmpleado = $_SESSION['claveE'];
      $conexion = mysqli_connect('localhost', 'root', '', 'hh');

      $sql="SELECT * FROM empleado WHERE claveEmpleado ='$claveEmpleado'";
      $result=mysqli_query($conexion,$sql);
      $renglon=mysqli_fetch_array($result);
      //validar fechas
      $fecha = new DateTime($renglon['fecha']);
      $fechaHoy = new DateTime();
      $intervalo = $fecha->diff($fechaHoy);
      $numMeses = $intervalo->y * 12 + $intervalo->m;
      $sql2="UPDATE empleado set antiguedad='$numMeses' WHERE claveEmpleado ='$claveEmpleado'";
      $result=mysqli_query($conexion,$sql2);

      $sql3="SELECT * FROM empleado WHERE claveEmpleado ='$claveEmpleado'";
      $result3=mysqli_query($conexion,$sql3);
      $renglon3=mysqli_fetch_array($result3);
      $antiguedad = $renglon3['antiguedad'];
      $encuesta = $renglon3['Encuesta'];
      if($antiguedad >= 3 && $encuesta!='Si'){
       /* echo "<script type='text/javascript'>";
        echo "alert('Debes contestar la encuesta, ya cumpliste tus primeros tres meses de antigüedad en el puesto');";
        echo "</script>";*/
      }else{
        echo "<script type='text/javascript'>";
        echo "alert('Aún no cumples con los tres meses de antigüedad en el puesto');";
        echo "</script>";
        header("Location: ../pages/inicio.php");
        // Redirigir al usuario a la página principal
        exit();
      }

      $sql4="SELECT claveEncuesta FROM encuesta WHERE claveEmpleado ='$claveEmpleado'";
      $result4=mysqli_query($conexion,$sql);
      $row4=mysqli_fetch_array($result4);
      $claveEncuesta = $row4['claveEncuesta'];
      echo $claveEncuesta;
      $sql5 = "SELECT COUNT(clavePregunta) AS count1 FROM respuesta WHERE claveEncuesta = '$claveEncuesta'";
      $result5 = mysqli_query($conexion, $sql5);
      $row5 = mysqli_fetch_assoc($result5);
      $count1 = $row5['count1'];
      if($count1>=75){
        echo "<script type='text/javascript'>";
        echo "alert('Actualmente ya se encuentra registrada tu encuesta, muchas gracias');";
        echo "</script>";
      }
        
      }
    ?>
    <script>
      $("#menu-btn").click(function () {
        $("#menu").toggleClass("active");
      });
    </script>
  </body>
</html>