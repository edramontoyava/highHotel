<?php
    include('db.php');
    $claveHotel=validar($_POST['claveHotel']);
    $claveArea=validar($_POST['claveArea']);
    $nombre=validar($_POST['nombre']);
    $apellido=validar($_POST['apellido']);
    $nacimiento=validar($_POST['nacimiento']);
    $nss=validar($_POST['nss']);
    $antiguedad=validar($_POST['antiguedad']);
    $estatus=validar($_POST['estatus']);
    $fecha = date('Y-m-d');
    

    $user = crearUsuario(5);

    $claveEmpleado = $user.str_replace(' ','',$nombre);

    $conexion = conectar();

    $password = crearPass(8);

    $foto = subir_imagen($_FILES['foto']);

    $sql = "insert into empleado values ('$claveEmpleado','$claveHotel', '$claveArea', '$nombre','$apellido','$nacimiento','$nss','$antiguedad','$estatus','$foto','No','$fecha')";

    $sql2 = "insert into usuario values ('$claveEmpleado',NULL,'$claveEmpleado','$password','EMP','0')";

    $resultado = mysqli_multi_query($conexion, $sql);
    $resultado = mysqli_multi_query($conexion, $sql2);

    if($resultado ){
        redireccionar('Datos guardados exitósamente','../pages/empleado/empleados.php?p=emp');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../pages/empleado/empleados.php?p=emp');
    }

    mysqli_close($conexion);

?>