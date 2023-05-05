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

              $sql="select * from empleado where claveEmpleado='$id'";
              $query=mysqli_query($conexion,$sql);
              

              $row=mysqli_fetch_array($query);
          ?>
          
        <div class="form">
          <form action="../../php/editar_foto_empleado.php" method="post" enctype="multipart/form-data">
              <h2>Editar foto de: <?php echo $row['nombreEmpleado']?></h2>
              <label for="nombre">Clave del empleado</label>
              <input type="text" id="claveEmpleado" name="claveEmpleado" value="<?php echo $row['claveEmpleado'] ?>" readonly>
              <img src="<?php echo '../'.$row['foto'] ?>" alt="Imagen no encontrada">
              <label for="foto">Foto del empleado</label>
              <input type="file" id="foto" name="foto" value="<?php echo $row['foto'] ?>" required>

              <input type="submit" value="Cambiar foto del empleado" name="guardar" class="boton">   
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
