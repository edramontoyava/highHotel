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

              $sql="select * from hoteleria where claveHotel='$id'";
              $query=mysqli_query($conexion,$sql);

              $row=mysqli_fetch_array($query);

          ?>
        <div class="form">
          <form action="/highHotel/php/editar_hotel.php" method="post" enctype="multipart/form-data">
              <h2>Editar hoteleria</h2>
              <label for="nombre">Clave del hotel</label>
              <input type="text" id="claveHotel" name="claveHotel" value="<?php echo $row['claveHotel'] ?>" readonly >

              <label for="nombre">Nombre del hotel</label>
              <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombreHotel'] ?>" required>

              <label for="propietario">Nombre del propietario</label>
              <input type="text" id="propietario" name="propietario" value="<?php echo $row['propietario'] ?>" required>

              <label for="domicilio">Domicilio del hotel</label>
              <textarea name="domicilio" id="domicilio" cols="30" rows="3"required><?php echo $row['domicilio'] ?></textarea>

              <label for="estatus">Estatus del hotel</label>
              <select name="estatus" id="estatus">
                  <option <?php echo $row['estatus']==='Activo' ? "selected='selected'":""?>value='Activo'>Activo</option>
                  <option <?php echo $row['estatus']==='Baja' ? "selected='selected'":""?>value='Baja'>Baja</option>
              </select>
              <input type="submit" value="Actualizar datos del hotel" name="guardar" class="boton">   
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
