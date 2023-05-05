<?php
    include("db.php");
    $conexion = conectar();

    $claveHotel=$_GET['id'];

    $sql = "DELETE FROM hoteleria WHERE claveHotel='$claveHotel'";
    $resultado = mysqli_query($conexion,$sql);

    if($resultado){
        redireccionar('Datos editados exitósamente','../pages/hoteleria/hoteleria.php?p=hot');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../pages/hoteleria/hoteleria.php?p=hot');
    }

?>