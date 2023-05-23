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
          <form action="/highHotel/php/agregar_hotel.php" method="post" enctype="multipart/form-data">
              <h2>Registro de hoteles</h2>
              <label for="nomrbre">Nombre del hotel</label>
              <input type="text" id="nombre" name="nombre" required>

              <label for="propietario">Nombre del propietario</label>
              <input type="text" id="propietario" name="propietario" required>

              <label for="domicilio">Domicilio del hotel</label>
              <textarea name="domicilio" id="domicilio" cols="30" rows="3" required></textarea>

              <label for="estatus">Estatus del hotel</label>
              <select name="estatus" id="estatus">
                  <option value="Activo">Activo</option>
                  <option value="Baja">Baja</option>
              </select>

              <label for="logotipo">Logotipo del hotel</label>
              <input type="file" id="logotipo" name="logotipo" required>
              
              <input type="submit" value="Registra el hotel" name="guardar" class="boton">   
                  <button type="button" class="boton-cancelar" onclick="cancelar()">Cancelar</button>  
            </form>
            <script>
                function cancelar() {
                  window.location.href = "hoteleria.php?p=hot";
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
