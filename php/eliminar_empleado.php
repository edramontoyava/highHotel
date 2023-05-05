<?php
    include("db.php");
    $conexion = conectar();

    $claveEmpleado=$_GET['id'];

    $sql = "DELETE FROM empleado WHERE claveEmpleado='$claveEmpleado'";
    $resultado = mysqli_query($conexion,$sql);

    if($resultado){
        redireccionar('Datos editados exitósamente','../pages/empleado/empleados.php?p=emp');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../pages/empleado/empleados.php?p=emp');
    }

?>