<?php
require_once '../../php/validar_sesion.php';
require_once '../../php/validar_rol.php';
// Establecer conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hh";

$conexion = mysqli_connect($servername, $username, $password, $dbname);

// Verificar si la conexión es exitosa
if (!$conexion) {
  die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta para recuperar los datos de la tabla empleado
$sql = "SELECT * FROM empleado";

$result = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HH</title>
    <link rel="stylesheet" href="/highHotel/css/hoteleria_style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
    <body>
        <?php
    include('../includes/menu.php');
    ?>
    <?php
    include('../includes/header.php');
    ?>

            <h3 class="i-name">Tablero de Empleados</h3>
            <div class="values">
                <div class="val-box">
                    <i class="fas fa-users"></i>
                    <div>
                        <?php
                            if($_SESSION['rol'] === 'Master'){
                                $conexion = mysqli_connect('localhost', 'root', '', 'hh');
                                $claveHotel = $_SESSION['claveH'];
                                $sql="SELECT COUNT(*) as 'Total' FROM empleado;";
                                $result=mysqli_query($conexion,$sql);
                                $renglon=mysqli_fetch_array($result);
                                $total = $renglon['Total'];
                                echo "<h3>$total</h3>";
                            }else{
                                $conexion = mysqli_connect('localhost', 'root', '', 'hh');
                                $claveHotel = $_SESSION['claveH'];
                                $sql="SELECT COUNT(*) as 'Total' FROM empleado WHERE claveHotel = '$claveHotel';";
                                $result=mysqli_query($conexion,$sql);
                                $renglon=mysqli_fetch_array($result);
                                $total = $renglon['Total'];
                                echo "<h3>$total</h3>";
                            }

                        ?>
                        <span>Empleados registrados</span>
                    </div>
                </div>
            </div>
            <?php
                include('../includes/board.php');
            ?>
        <script>
        $("#menu-btn").click(function () {
            $("#menu").toggleClass("active");
        });
        </script>
    </body>
</html>