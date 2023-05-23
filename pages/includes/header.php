<?php
  if($_SESSION['rol']=='Administrador'){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hh";

    $conexion = mysqli_connect($servername, $username, $password, $dbname);
    $claveHotel = $_SESSION['claveH'];
    $query = "SELECT nombreHotel, logo FROM hoteleria WHERE claveHotel = '$claveHotel'";
    $result = $conexion->query($query);
    $row = $result->fetch_assoc();
    if($result->num_rows > 0){
        $nombreHotel = $row['nombreHotel'];
        $logo = $row['logo'];
    }
    $logoCad = substr($logo,2);
    $logoE = '/highHotel'.$logoCad;
    echo "<section id='interface'>
    <div class='navigation'>
      <div class='n1'>
        <div>
          <i id='menu-btn' class='fas fa-bars'></i>
        </div>
      </div>
      <div class='profile'>
          <p>$nombreHotel</p>
          <img src='$logoE' alt='' />
        </i>
      </div>
    </div>";
  }elseif($_SESSION['rol']=='Empleado'){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hh";

    $conexion = mysqli_connect($servername, $username, $password, $dbname);
    $claveEmpleado = $_SESSION['claveE'];
    $query = "SELECT nombreEmpleado, apellidoEmpleado, foto FROM empleado WHERE claveEmpleado = '$claveEmpleado'";
    $result = $conexion->query($query);
    $row = $result->fetch_assoc();
    if($result->num_rows > 0){
        $nombreEmpleado = $row['nombreEmpleado'];
        $apellidoEmpleado = $row['apellidoEmpleado'];
        $foto = $row['foto'];
    }
    $nombreCompleto = $nombreEmpleado." ".$apellidoEmpleado;
    $fotoCad = substr($foto,2);
    $fotoE = '/highHotel'.$fotoCad;
    echo "<section id='interface'>
    <div class='navigation'>
      <div class='n1'>
        <div>
          <i id='menu-btn' class='fas fa-bars'></i>
        </div>
      </div>
      <div class='profile'>
          <p>$nombreCompleto</p>
          <img src='$fotoE' alt='' />
        </i>
      </div>
    </div>";
  }elseif($_SESSION['rol']=='Master'){
    echo "<section id='interface'>
    <div class='navigation'>
      <div class='n1'>
        <div>
          <i id='menu-btn' class='fas fa-bars'></i>
        </div>
      </div>
      <div class='profile'>
          <p>Master</p>
          <img src='/highHotel/img/utils/imgP.jpg' alt='' />
        </i>
      </div>
    </div>";
  }
?>
