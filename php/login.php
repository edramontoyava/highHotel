<?php
require_once 'db.php';
$usuario = $_POST['usuario'];
$passwrd = $_POST['passwrd'];

$conexion = conectar();

$query = "SELECT u.usuario, u.passwrd, t.tipo as rol, u.claveHotel as claveHotel, u.claveEmpleado as claveEmpleado FROM USUARIO u LEFT JOIN TIPO t ON u.idTipo = t.idTipo WHERE USUARIO = '$usuario' and passwrd = '$passwrd'";
$result = $conexion->query($query);
$row = $result->fetch_assoc();
if($result->num_rows > 0){
    session_start();
    $_SESSION['user'] = $usuario;
    $_SESSION['rol'] = $row['rol'];
    $_SESSION['claveH']  = $row['claveHotel'];
    $_SESSION['claveE']  = $row['claveEmpleado'];
    header("Location: ../pages/inicio.php");
}else{
    header("Location: ../pages/index.php");
}

?>