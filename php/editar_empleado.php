<?php
    include('db.php');
    $claveEmpleado=validar($_POST['claveEmpleado']);
    $claveHotel=validar($_POST['claveHotel']);
    $claveArea=validar($_POST['claveArea']);
    $nombre=validar($_POST['nombre']);
    $apellido=validar($_POST['apellido']);
    $nacimiento=validar($_POST['nacimiento']);
    $nss=validar($_POST['nss']);
    $antiguedad=validar($_POST['antiguedad']);
    $estatus=validar($_POST['estatus']);

    $conexion = conectar();

    $sql = "update empleado set nombreEmpleado='$nombre',apellidoEmpleado='$apellido',fechaNac='$nacimiento',NSS='$nss',antiguedad='$antiguedad',status='$estatus' WHERE claveEmpleado='$claveEmpleado'";

    $resultado = mysqli_query($conexion, $sql);

    if($resultado){
        redireccionar('Datos editados exitósamente','../pages/empleado/empleados.php?p=emp');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../pages/empleado/empleados.php?p=emp');
    }

    mysqli_close($conexion);

?>