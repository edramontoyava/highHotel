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
    <link rel="stylesheet" href="../css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  </head>
  <body>
    <?php
    include('includes/menu_i.php');
    ?>
    <?php
    include('includes/headeri.php');
    ?>

      <h3 class="i-name">Tablero de inicio</h3>
      <div class="values">
        <div class="val-box">
          <i class="fas fa-users"></i>
          <div>
            <h3>500</h3>
            <span>Usuarios registrados</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fas fa-hotel"></i>
          <div>
            <h3>30</h3>
            <span>Hoteles registrados</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fas fa-square-poll-vertical"></i>
          <div>
            <h3>300</h3>
            <span>Encuestas contestadas</span>
          </div>
        </div>
      </div>
      <div class="board">
        <div class="informative">
          <div class="text-informative">
            <h2>¿Qué es la NOM-035?</h2>
            <p>Las Normas Oficiales Mexicanas que emite la Secretaría del Trabajo y Previsión Social determinan las condiciones mínimas necesarias en materia de seguridad, salud y medio ambiente de trabajo, a efecto de prevenir accidentes y enfermedades laborales.</p>
            <p>De acuerdo con el campo de aplicación, la NOM 035 rige en todo el territorio nacional y aplica en todos los centros de trabajo.  Sin embargo, las disposiciones de esta norma aplican de acuerdo con el número de trabajadores que laboran en el centro de trabajo. Derivado de lo anterior, existen tres niveles:</p>
            <br>
            <p>
              <ul>
                <li>Centros de trabajo donde laboran hasta 15 trabajadores</li>
                <li>Centros de trabajo donde laboran entre 16 y 50 trabajadores</li>
                <li>Centros de trabajo donde laboran más de 50 trabajadores</li>
              </ul>
            </p>
          </div>
          <br>
          <img src="../img/utils/cartel_nom.PNG" alt="">
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
