<?php
require_once '../../php/validar_sesion.php';
require_once '../../php/validar_rol.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HH</title>
    <link rel="stylesheet" href="/highHotel/css/hoteleria_form_style.css" />
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
      <div class="board">
        <?php
              $conexion = mysqli_connect('localhost', 'root', '', 'hh');

              $id=$_GET['id'];

              print_r($id);

              $sql="select * from empleado where claveEmpleado='$id'";
              $query=mysqli_query($conexion,$sql);

              $row=mysqli_fetch_array($query);

          ?>
        <div class="form">
          <form action="/highHotel/php/editar_area_empleado.php" method="post" enctype="multipart/form-data">
              <h2>Editar Empleado</h2>

              <label for="claveEmpleado">Clave del empleado</label>
              <input type="text" id="claveEmpleado" name="claveEmpleado" value="<?php echo $row['claveEmpleado'] ?>" readonly >

              <label for="claveHotel">Clave del hotel</label>
              <input type="text" id="claveHotel" name="claveHotel" value="<?php echo $row['claveHotel'] ?>" readonly >

              <label for="claveArea">Area</label>
              <select name="claveArea" id="claveArea" required>
                <?php
                  $conexion2 = mysqli_connect('localhost', 'root', '', 'hh');
                  $sql2="SELECT claveArea,nombreArea from area";
                  $result=mysqli_query($conexion2,$sql2);
                ?>
                <?php 
                  while ($fila = mysqli_fetch_assoc($result)) { 
                ?>
                  <option value="<?php echo $fila['claveArea']; ?>"><?php echo $fila['nombreArea']; ?></option>
                <?php } ?>
              </select> 
              

              <input type="submit" value="Actualizar area del empleado" name="guardar" class="boton">   
              <button type="button" class="boton-cancelar" onclick="cancelar()">Cancelar</button>  
          </form>
          <script>
                function cancelar() {
                  window.location.href = "empleados.php?p=emp";
                }
                </script>   
        </div>
      </div>
    </section>
    <script>
      $("#menu-btn").click(function () {
        $("#menu").toggleClass("active");
      });
    </script>
  </body>
</html>
