<?php
    include('db.php');
    $claveHotel=validar($_POST['claveHotel']);
    $contrasena=validar($_POST['contrasena']);

    $conexion = conectar();

    $sql = "update usuario set passwrd='$contrasena',sesion='0' WHERE claveHotel='$claveHotel'";

    $resultado = mysqli_query($conexion, $sql);

    if($resultado){
        
        redireccionar('Datos editados exitósamente','../pages/hoteleria/hoteleria.php?p=hot');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../php/cerrar_sesion.php');
    }

    mysqli_close($conexion);

?>