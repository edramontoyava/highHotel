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
    <link rel="stylesheet" href="../../css/hoteleria_form_style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  </head>
  <body>
  <?php
      include('../includes/menu.html');
    ?>
    <?php
      include('../includes/header.html');
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
          <form action="../../php/editar_empleado.php" method="post" enctype="multipart/form-data">
              <h2>Editar Empleado</h2>

              <label for="claveEmpleado">Clave del empleado</label>
              <input type="text" id="claveEmpleado" name="claveEmpleado" value="<?php echo $row['claveEmpleado'] ?>" readonly >

              <label for="claveHotel">Clave del hotel</label>
              <input type="text" id="claveHotel" name="claveHotel" value="<?php echo $row['claveHotel'] ?>" readonly >

              <label for="claveArea">Clave del area</label>
              <input type="text" id="claveArea" name="claveArea" value="<?php echo $row['claveArea'] ?>" readonly >

              <label for="nombre">Nombre del empelado</label>
              <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombreEmpleado'] ?>" required>

              <label for="apellido">Apellido del empelado</label>
              <input type="text" id="apellido" name="apellido" value="<?php echo $row['apellidoEmpleado'] ?>" required>

              <label for="nacimiento">Fecha de nacimiento</label>
              <input type="date" id="nacimiento" name="nacimiento" value="<?php echo $row['fechaNac'] ?>" required>

              <label for="nss">No. seguro social</label>
              <input type="text" id="nss" name="nss" value="<?php echo $row['NSS'] ?>" required>

              <label for="antiguedad">Antiguedad</label>
              <input type="text" id="antiguedad" name="antiguedad" value="<?php echo $row['antiguedad'] ?>" required>

              <label for="estatus">Estatus del Empleado</label>
              <select name="estatus" id="estatus">
                  <option <?php echo $row['status']==='Activo' ? "selected='selected'":""?>value='Activo'>Activo</option>
                  <option <?php echo $row['status']==='Baja' ? "selected='selected'":""?>value='Baja'>Baja</option>
              </select>

              <input type="submit" value="Actualizar datos del empleado" name="guardar" class="boton">   
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
