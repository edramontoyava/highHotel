<?php
$roles =['Administrador', 'Empleado', 'Master'];
if(!array_key_exists('rol',$_SESSION) || !in_array($_SESSION['rol'], $roles)){
    header("Location: ../pages/index.php");
}
?>