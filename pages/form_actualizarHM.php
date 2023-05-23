<?php
require_once '../php/validar_sesion.php';
require_once '../php/validar_rol.php';
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
    include('includes/menu.php');
    include('includes/header.php');
    ?>
      <div class="board">
        <div class="form">
          <form action="/highHotel/php/actualizar_contrasenaHm.php" method="post" enctype="multipart/form-data">
              <h2>Actualiza tu contraseña</h2>

              <label for="claveHotel">Clave del hotel</label>
              <input type="text" id="claveHotel" name="claveHotel" value="<?php echo $_GET['id'] ?>" readonly >

              <label for="contrasena">Nueva contraseña del hotel</label>
              <input type="text" id="contrasena" name="contrasena" required>

              <input type="submit" value="Actualizar contraseña" name="guardar" class="boton">   
            </form>  
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
