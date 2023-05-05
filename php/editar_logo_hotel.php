<?php
    include('db.php');
    $claveHotel = $_POST['claveHotel'];
    $conexion = conectar();

    $logo = subir_imagen($_FILES['logo']);
    $sql = "update hoteleria set logo='$logo' WHERE claveHotel='$claveHotel'";

    $resultado = mysqli_query($conexion, $sql);

    if($resultado){
        redireccionar('Datos editados exitósamente','../pages/hoteleria/hoteleria.php?p=hot');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../pages/hoteleria/hoteleria.php?p=hot');
    }

    mysqli_close($conexion);

?>