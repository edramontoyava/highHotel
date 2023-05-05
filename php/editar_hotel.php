<?php
    include('db.php');
    $claveHotel = $_POST['claveHotel'];
    $nombre = validar($_POST['nombre']);
    $propietario = validar($_POST['propietario']);
    $domicilio = validar($_POST['domicilio']);
    $estatus = validar($_POST['estatus']);

    $conexion = conectar();

    $sql = "update hoteleria set nombreHotel='$nombre', propietario='$propietario', domicilio='$domicilio', estatus='$estatus' WHERE claveHotel='$claveHotel'";

    $resultado = mysqli_query($conexion, $sql);

    if($resultado){
        redireccionar('Datos editados exitósamente','../pages/hoteleria/hoteleria.php?p=hot');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../pages/hoteleria/hoteleria.php?p=hot');
    }

    mysqli_close($conexion);

?>