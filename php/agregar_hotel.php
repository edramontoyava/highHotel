<?php
    include('db.php');
    $nombre = validar($_POST['nombre']);
    $propietario = validar($_POST['propietario']);
    $domicilio = validar($_POST['domicilio']);
    $estatus = validar($_POST['estatus']);
    

  
    $user = crearUsuario(5);
    
    $claveHotel = $user.str_replace(' ','',$nombre);

    
    $conexion = conectar();

    $password = crearPass(8);

    $logo = subir_imagen($_FILES['logotipo']);

    $sql = "insert into hoteleria values ('$claveHotel','$logo', '$nombre', '$propietario','$domicilio','$estatus')";

    $sql2 = "insert into usuario values ('$claveHotel','$claveHotel',NULL,'$password','ADM',0)";

    $resultado = mysqli_multi_query($conexion, $sql);
    $resultado = mysqli_multi_query($conexion, $sql2);

    if($resultado ){
        redireccionar('Datos guardados exitósamente','../pages/hoteleria/hoteleria.php?p=hot');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../pages/hoteleria/hoteleria.php?p=hot');
    }

    mysqli_close($conexion);

?>