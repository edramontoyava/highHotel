<?php
    include('db.php');
    $claveEmpleado=validar($_POST['claveEmpleado']);
    $claveHotel=validar($_POST['claveHotel']);
    $claveArea=validar($_POST['claveArea']);
    $area=validar($_POST['claveArea']);
    $fecha = date('Y-m-d');

    $conexion = conectar();

    $sql = "update empleado set claveArea='$area',fecha='$fecha' WHERE claveEmpleado='$claveEmpleado'";

    $resultado = mysqli_query($conexion, $sql);

    if($resultado){
        redireccionar('Datos editados exitósamente','../pages/empleado/empleados.php?p=emp');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../pages/empleado/empleados.php?p=emp');
    }

    mysqli_close($conexion);

?>