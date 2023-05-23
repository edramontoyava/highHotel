<?php
    include('db.php');
    $claveEmpleado=validar($_POST['claveEmpleado']);
    $contrasena=validar($_POST['contrasena']);

    $conexion = conectar();

    $sql = "update usuario set passwrd='$contrasena',sesion='0' WHERE claveEmpleado='$claveEmpleado'";

    $resultado = mysqli_query($conexion, $sql);

    if($resultado){
        
        redireccionar('Datos editados exitósamente','../pages/empleado/empleados.php?p=emp');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../php/cerrar_sesion.php');
    }

    mysqli_close($conexion);

?>