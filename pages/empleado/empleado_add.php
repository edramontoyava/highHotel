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
        <div class="form">
          <form action="/highHotel/php/agregar_empleado.php" method="post" enctype="multipart/form-data">
              <h2>Registro de empleados</h2>

              <label for="claveHotel">Clave del Hotel</label>
              <input type="text" id="claveHotel" name="claveHotel" value="<?php echo $_SESSION['claveH'] ?>" readonly >

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

              <label for="nombre">Nombre</label>
              <input type="text" id="nombre" name="nombre" required>

              <label for="apellido">Apellido</label>
              <input type="text" id="apellido" name="apellido" required>

              <label for="nacimiento">Fecha de nacimiento</label>
              <input type="date" id="nacimiento" name="nacimiento">

              <label for="nss">No. seguro social</label>
              <input type="text" id="nss" name="nss" required>

              <label for="antiguedad">Antiguedad</label>
              <input type="text" id="antiguedad" name="antiguedad" required>

              <label for="estatus">Estatus del Empleado</label>
              <select name="estatus" id="estatus">
                  <option value="Activo">Activo</option>
                  <option value="Baja">Baja</option>
              </select>

              <label for="foto">Foto</label>
              <input type="file" id="foto" name="foto" required>
              
              <input type="submit" value="Registra el empleado" name="guardar" class="boton">   
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
