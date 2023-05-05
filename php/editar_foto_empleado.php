<?php
    include('db.php');
    $claveEmpleado = $_POST['claveEmpleado'];
    $conexion = conectar();

    $foto = subir_imagen($_FILES['foto']);
    $sql = "update empleado set foto='$foto' WHERE claveEmpleado='$claveEmpleado'";

    $resultado = mysqli_query($conexion, $sql);

    if($resultado){
        redireccionar('Datos editados exitósamente','../pages/empleado/empleados.php?p=emp');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../pages/empleado/empleados.php?p=emp');
    }

    mysqli_close($conexion);

?>