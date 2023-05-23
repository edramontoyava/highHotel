<?php
require_once '../php/validar_sesion.php';
require_once '../php/validar_rol.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HH</title>
    <link rel="stylesheet" href="/highHotel/css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  </head>
  <body>
    <?php
    include('includes/menu.php');
    include('includes/header.php');
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
      
      $sql22="SELECT * FROM usuario WHERE claveEmpleado ='$claveEmpleado'";
      $result22=mysqli_query($conexion,$sql22);
      $renglon22=mysqli_fetch_array($result22);
      $sesion = $renglon22['sesion'];
      $com = 0;
      if(intval($sesion)===$com){
        header("Location: ../pages/form_actualizar.php");
      }
      $sql3="SELECT * FROM empleado WHERE claveEmpleado ='$claveEmpleado'";
      $result3=mysqli_query($conexion,$sql3);
      $renglon3=mysqli_fetch_array($result3);
      $antiguedad = $renglon3['antiguedad'];
      $encuesta = $renglon3['Encuesta'];
      if($antiguedad >= 3 && $encuesta!='Si'){
        echo "<script type='text/javascript'>";
        echo "alert('Debes contestar la encuesta, ya cumpliste tus primeros tres meses de antigüedad en el puesto');";
        echo "</script>";
      }else{
        /*echo "<script type='text/javascript'>";
        echo "alert('Aún no cumples con los tres meses de antigüedad en el puesto');";
        echo "</script>";*/
        //header("Location: ../pages/inicio.php"); // Redirigir al usuario a la página principal
        //exit();
      }

      /*$sql4="SELECT claveEncuesta FROM encuesta WHERE claveEmpleado ='$claveEmpleado'";
      $result4=mysqli_query($conexion,$sql);
      $row4=mysqli_fetch_array($result4);
      $claveEncuesta = $row4['claveEncuesta'];
      $sql5 = "SELECT COUNT(clavePregunta) AS count1 FROM respuesta WHERE claveEncuesta = '$claveEncuesta'";
      $result5 = mysqli_query($conexion, $sql5);
      $row5 = mysqli_fetch_assoc($result5);
      $count1 = $row5['count1'];
      if($count1>=75){
        echo "<script type='text/javascript'>";
        echo "alert('Actualmente ya se encuentra registrada tu encuesta, muchas gracias');";
        echo "</script>";
      }*/
      
    }elseif($_SESSION['rol']=='Administrador'){
      //validar fechas
      $conexion = mysqli_connect('localhost', 'root', '', 'hh');
      $hotel = $_SESSION['claveH'];
      $sql="SELECT * from empleado WHERE claveHotel = '$hotel'";
      $result=mysqli_query($conexion,$sql);
      while ($fila = mysqli_fetch_assoc($result)) {
        $claveEmpleado = $fila['claveEmpleado'];
        $fecha = new DateTime($fila['fecha']);
        $fechaHoy = new DateTime();
        $intervalo = $fecha->diff($fechaHoy);
        $numMeses = $intervalo->y * 12 + $intervalo->m; 
        $sqlUpdate="UPDATE empleado SET antiguedad = '$numMeses' WHERE claveEmpleado = '$claveEmpleado'";  
        mysqli_query($conexion, $sqlUpdate);
      }
      $sql22="SELECT * FROM usuario WHERE claveHotel ='$hotel'";
      $result22=mysqli_query($conexion,$sql22);
      $renglon22=mysqli_fetch_array($result22);
      $sesion = $renglon22['sesion'];
      $com = 0;
      if(intval($sesion)===$com){
        header("Location: ../pages/form_actualizarH.php");
      }
    }else{
      $conexion = mysqli_connect('localhost', 'root', '', 'hh');
      $sql="SELECT * from empleado";
      $result=mysqli_query($conexion,$sql);
      while ($fila = mysqli_fetch_assoc($result)) {
        $claveEmpleado = $fila['claveEmpleado'];
        $fecha = new DateTime($fila['fecha']);
        $fechaHoy = new DateTime();
        $intervalo = $fecha->diff($fechaHoy);
        $numMeses = $intervalo->y * 12 + $intervalo->m; 
        $sqlUpdate="UPDATE empleado SET antiguedad = '$numMeses' WHERE claveEmpleado = '$claveEmpleado'";  
        mysqli_query($conexion, $sqlUpdate);
      }
    }
    ?>
      <h3 class="i-name">Tablero de inicio</h3>
      <div class="board">
        <div class="informative">
          <div class="text-informative">
            <h2>¿Qué es la NOM-035?</h2>
            <p>Las Normas Oficiales Mexicanas que emite la Secretaría del Trabajo y Previsión Social determinan las condiciones mínimas necesarias en materia de seguridad, salud y medio ambiente de trabajo, a efecto de prevenir accidentes y enfermedades laborales.</p>
            <p>De acuerdo con el campo de aplicación, la NOM 035 rige en todo el territorio nacional y aplica en todos los centros de trabajo.  Sin embargo, las disposiciones de esta norma aplican de acuerdo con el número de trabajadores que laboran en el centro de trabajo. Derivado de lo anterior, existen tres niveles:</p>
            <br>
            <p>
              <ul>
                <li>Centros de trabajo donde laboran hasta 15 trabajadores</li>
                <li>Centros de trabajo donde laboran entre 16 y 50 trabajadores</li>
                <li>Centros de trabajo donde laboran más de 50 trabajadores</li>
              </ul>
            </p>
          </div>
          <br>
          <img src="../img/utils/cartel_nom.PNG" alt="">
        </div>
      </div>
    </section>
    <script>
      $("#menu-btn").click(function () {
        $("#menu").toggleClass("active");
      });
    </script>
  </body>
</html>
