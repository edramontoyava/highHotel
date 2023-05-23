
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
    <link rel="stylesheet" href="/highHotel/css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  </head>
  <body>
    <?php
    
    include('includes/header.php');
    include('includes/menu.php');
    
    ?>
      <h3 class="i-name">Tablero de inicio</h3>
      <div class="board">
      <?php
// Conexión a la base de datos
$mysqli = new mysqli("localhost", "root", "", "hh");

// Comprobar si hay errores en la conexión
if ($mysqli->connect_errno) {
    echo "Error al conectar a MySQL: " . $mysqli->connect_error;
    exit();
}

$claveHotel = $_SESSION['claveH'];
// Consulta SQL para la primera tabla
$query = "SELECT p.item, p.pregunta, r.respuesta,
                 COUNT(r.respuesta) AS cantidad,
                 CASE WHEN p.item = 1 THEN 
                          CASE WHEN r.respuesta = 'Siempre' THEN COUNT(r.respuesta)*0
                               WHEN r.respuesta = 'Casi_siempre' THEN COUNT(r.respuesta)*1
                               WHEN r.respuesta = 'Algunas_veces' THEN COUNT(r.respuesta)*2
                               WHEN r.respuesta = 'Casi_nunca' THEN COUNT(r.respuesta)*3
                               WHEN r.respuesta = 'Nunca' THEN COUNT(r.respuesta)*4
                               ELSE NULL
                          END
                      WHEN p.item = 2 THEN 
                          CASE WHEN r.respuesta = 'Siempre' THEN COUNT(r.respuesta)*4
                               WHEN r.respuesta = 'Casi_siempre' THEN COUNT(r.respuesta)*3
                               WHEN r.respuesta = 'Algunas_veces' THEN COUNT(r.respuesta)*2
                               WHEN r.respuesta = 'Casi_nunca' THEN COUNT(r.respuesta)*1
                               WHEN r.respuesta = 'Nunca' THEN COUNT(r.respuesta)*0
                               ELSE NULL
                          END
                      ELSE NULL
                 END AS calificacion
          FROM pregunta p
          JOIN respuesta r ON p.clavePregunta = r.clavePregunta
          JOIN encuesta e ON r.claveEncuesta = e.claveEncuesta
          WHERE e.claveHotel = '$claveHotel'
          GROUP BY p.item, p.pregunta, r.respuesta";

// Ejecutar la consulta
$resultado = $mysqli->query($query);

// Comprobar si hay errores en la consulta
if (!$resultado) {
    echo "Error al ejecutar la consulta: " . $mysqli->error;
    exit();
}

// Imprimir la primera tabla HTML con los datos obtenidos
echo "<table style='border-collapse: separate; border-spacing: 20px;'>";
echo "<tr><th>Item</th><th>Pregunta</th><th>Respuesta</th><th>Cantidad</th><th>Calificación</th></tr>";
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . $fila["item"] . "</td>";
    echo "<td>" . $fila["pregunta"] . "</td>";
    echo "<td>" . $fila["respuesta"] . "</td>";
    echo "<td>" . $fila["cantidad"] . "</td>";
    echo "<td>" . $fila["calificacion"] . "</td>";
    echo "</tr>";
}
echo "</table>";


// Consulta SQL para la segunda tabla
$query2 = "SELECT SUM(calificacion) AS Calificacion_Final
FROM (
    SELECT p.item, p.pregunta, r.respuesta,
           COUNT(r.respuesta) AS cantidad,
           CASE WHEN p.item = 1 THEN 
                    CASE WHEN r.respuesta = 'Siempre' THEN COUNT(r.respuesta)*0
                         WHEN r.respuesta = 'Casi_siempre' THEN COUNT(r.respuesta)*1
                         WHEN r.respuesta = 'Algunas_veces' THEN COUNT(r.respuesta)*2
                         WHEN r.respuesta = 'Casi_nunca' THEN COUNT(r.respuesta)*3
                         WHEN r.respuesta = 'Nunca' THEN COUNT(r.respuesta)*4
                         ELSE NULL
                    END
                WHEN p.item = 2 THEN 
                    CASE WHEN r.respuesta = 'Siempre' THEN COUNT(r.respuesta)*4
                         WHEN r.respuesta = 'Casi_siempre' THEN COUNT(r.respuesta)*3
                         WHEN r.respuesta = 'Algunas_veces' THEN COUNT(r.respuesta)*2
                         WHEN r.respuesta = 'Casi_nunca' THEN COUNT(r.respuesta)*1
                         WHEN r.respuesta = 'Nunca' THEN COUNT(r.respuesta)*0
                         ELSE NULL
                    END
                ELSE NULL
           END AS calificacion
    FROM pregunta p
    JOIN respuesta r ON p.clavePregunta = r.clavePregunta
    JOIN encuesta e ON r.claveEncuesta = e.claveEncuesta
    WHERE e.claveHotel = '$claveHotel'
    GROUP BY p.item, p.pregunta, r.respuesta
) AS tabla_intermedia";


// Ejecutar la consulta
$resultado2 = $mysqli->query($query2);

// Comprobar si hay errores en la consulta
if (!$resultado2) {
echo "Error al ejecutar la consulta: " . $mysqli->error;
exit();
}

// Imprimir la segunda tabla HTML con el resultado de la consulta
echo "<br><br>";
echo "<table>";
while ($fila = mysqli_fetch_assoc($resultado2)) {
echo "<tr><th>Calificación Final:</th><td>" . $fila["Calificacion_Final"] . "</td></tr>";
}
echo "</table>";


// Consulta SQL para la tercera tabla
$query3 = "SELECT SUM(calificacion) AS Calificacion
FROM (
    SELECT p.item, p.pregunta, r.respuesta,
           COUNT(r.respuesta) AS cantidad,
           CASE WHEN p.item = 1 THEN 
                    CASE WHEN r.respuesta = 'Siempre' THEN COUNT(r.respuesta)*0
                         WHEN r.respuesta = 'Casi_siempre' THEN COUNT(r.respuesta)*1
                         WHEN r.respuesta = 'Algunas_veces' THEN COUNT(r.respuesta)*2
                         WHEN r.respuesta = 'Casi_nunca' THEN COUNT(r.respuesta)*3
                         WHEN r.respuesta = 'Nunca' THEN COUNT(r.respuesta)*4
                         ELSE NULL
                    END
                WHEN p.item = 2 THEN 
                    CASE WHEN r.respuesta = 'Siempre' THEN COUNT(r.respuesta)*4
                         WHEN r.respuesta = 'Casi_siempre' THEN COUNT(r.respuesta)*3
                         WHEN r.respuesta = 'Algunas_veces' THEN COUNT(r.respuesta)*2
                         WHEN r.respuesta = 'Casi_nunca' THEN COUNT(r.respuesta)*1
                         WHEN r.respuesta = 'Nunca' THEN COUNT(r.respuesta)*0
                         ELSE NULL
                    END
                ELSE NULL
           END AS calificacion
    FROM pregunta p
    JOIN respuesta r ON p.clavePregunta = r.clavePregunta
    JOIN encuesta e ON r.claveEncuesta = e.claveEncuesta
    WHERE e.claveHotel = '$claveHotel' AND p.categoria = 1
    GROUP BY p.item, p.pregunta, r.respuesta
) AS tabla_intermedia;";


// Ejecutar la consulta
$resultado3 = $mysqli->query($query3);

// Comprobar si hay errores en la consulta
if (!$resultado3) {
echo "Error al ejecutar la consulta: " . $mysqli->error;
exit();
}

// Imprimir la segunda tabla HTML con el resultado de la consulta
echo "<table>";
while ($fila = mysqli_fetch_assoc($resultado3)) {
echo "<tr><th>Calificación en ambiente de trabajo:</th><td>" . $fila["Calificacion"] . "</td></tr>";
}
echo "</table>";

// Consulta SQL para la cuarta tabla
$query4 = "SELECT SUM(calificacion) AS Calificacion
FROM (
    SELECT p.item, p.pregunta, r.respuesta,
           COUNT(r.respuesta) AS cantidad,
           CASE WHEN p.item = 1 THEN 
                    CASE WHEN r.respuesta = 'Siempre' THEN COUNT(r.respuesta)*0
                         WHEN r.respuesta = 'Casi_siempre' THEN COUNT(r.respuesta)*1
                         WHEN r.respuesta = 'Algunas_veces' THEN COUNT(r.respuesta)*2
                         WHEN r.respuesta = 'Casi_nunca' THEN COUNT(r.respuesta)*3
                         WHEN r.respuesta = 'Nunca' THEN COUNT(r.respuesta)*4
                         ELSE NULL
                    END
                WHEN p.item = 2 THEN 
                    CASE WHEN r.respuesta = 'Siempre' THEN COUNT(r.respuesta)*4
                         WHEN r.respuesta = 'Casi_siempre' THEN COUNT(r.respuesta)*3
                         WHEN r.respuesta = 'Algunas_veces' THEN COUNT(r.respuesta)*2
                         WHEN r.respuesta = 'Casi_nunca' THEN COUNT(r.respuesta)*1
                         WHEN r.respuesta = 'Nunca' THEN COUNT(r.respuesta)*0
                         ELSE NULL
                    END
                ELSE NULL
           END AS calificacion
    FROM pregunta p
    JOIN respuesta r ON p.clavePregunta = r.clavePregunta
    JOIN encuesta e ON r.claveEncuesta = e.claveEncuesta
    WHERE e.claveHotel = '$claveHotel' AND p.categoria = 2
    GROUP BY p.item, p.pregunta, r.respuesta
) AS tabla_intermedia;";


// Ejecutar la consulta
$resultado4 = $mysqli->query($query4);

// Comprobar si hay errores en la consulta
if (!$resultado3) {
echo "Error al ejecutar la consulta: " . $mysqli->error;
exit();
}

// Imprimir la segunda tabla HTML con el resultado de la consulta
echo "<table>";
while ($fila = mysqli_fetch_assoc($resultado4)) {
echo "<tr><th>Calificación en factores propios de la actividad:</th><td>" . $fila["Calificacion"] . "</td></tr>";
}
echo "</table>";

// Consulta SQL para la quinta tabla
$query5 = "SELECT SUM(calificacion) AS Calificacion
FROM (
    SELECT p.item, p.pregunta, r.respuesta,
           COUNT(r.respuesta) AS cantidad,
           CASE WHEN p.item = 1 THEN 
                    CASE WHEN r.respuesta = 'Siempre' THEN COUNT(r.respuesta)*0
                         WHEN r.respuesta = 'Casi_siempre' THEN COUNT(r.respuesta)*1
                         WHEN r.respuesta = 'Algunas_veces' THEN COUNT(r.respuesta)*2
                         WHEN r.respuesta = 'Casi_nunca' THEN COUNT(r.respuesta)*3
                         WHEN r.respuesta = 'Nunca' THEN COUNT(r.respuesta)*4
                         ELSE NULL
                    END
                WHEN p.item = 2 THEN 
                    CASE WHEN r.respuesta = 'Siempre' THEN COUNT(r.respuesta)*4
                         WHEN r.respuesta = 'Casi_siempre' THEN COUNT(r.respuesta)*3
                         WHEN r.respuesta = 'Algunas_veces' THEN COUNT(r.respuesta)*2
                         WHEN r.respuesta = 'Casi_nunca' THEN COUNT(r.respuesta)*1
                         WHEN r.respuesta = 'Nunca' THEN COUNT(r.respuesta)*0
                         ELSE NULL
                    END
                ELSE NULL
           END AS calificacion
    FROM pregunta p
    JOIN respuesta r ON p.clavePregunta = r.clavePregunta
    JOIN encuesta e ON r.claveEncuesta = e.claveEncuesta
    WHERE e.claveHotel = '$claveHotel' AND p.categoria = 3
    GROUP BY p.item, p.pregunta, r.respuesta
) AS tabla_intermedia;";


// Ejecutar la consulta
$resultado5 = $mysqli->query($query5);

// Comprobar si hay errores en la consulta
if (!$resultado5) {
echo "Error al ejecutar la consulta: " . $mysqli->error;
exit();
}

// Imprimir la segunda tabla HTML con el resultado de la consulta
echo "<table>";
while ($fila = mysqli_fetch_assoc($resultado5)) {
echo "<tr><th>Calificación en organizacion del tiempo de trabajo:</th><td>" . $fila["Calificacion"] . "</td></tr>";
}
echo "</table>";

// Consulta SQL para la sexta tabla
$query6 = "SELECT SUM(calificacion) AS Calificacion
FROM (
    SELECT p.item, p.pregunta, r.respuesta,
           COUNT(r.respuesta) AS cantidad,
           CASE WHEN p.item = 1 THEN 
                    CASE WHEN r.respuesta = 'Siempre' THEN COUNT(r.respuesta)*0
                         WHEN r.respuesta = 'Casi_siempre' THEN COUNT(r.respuesta)*1
                         WHEN r.respuesta = 'Algunas_veces' THEN COUNT(r.respuesta)*2
                         WHEN r.respuesta = 'Casi_nunca' THEN COUNT(r.respuesta)*3
                         WHEN r.respuesta = 'Nunca' THEN COUNT(r.respuesta)*4
                         ELSE NULL
                    END
                WHEN p.item = 2 THEN 
                    CASE WHEN r.respuesta = 'Siempre' THEN COUNT(r.respuesta)*4
                         WHEN r.respuesta = 'Casi_siempre' THEN COUNT(r.respuesta)*3
                         WHEN r.respuesta = 'Algunas_veces' THEN COUNT(r.respuesta)*2
                         WHEN r.respuesta = 'Casi_nunca' THEN COUNT(r.respuesta)*1
                         WHEN r.respuesta = 'Nunca' THEN COUNT(r.respuesta)*0
                         ELSE NULL
                    END
                ELSE NULL
           END AS calificacion
    FROM pregunta p
    JOIN respuesta r ON p.clavePregunta = r.clavePregunta
    JOIN encuesta e ON r.claveEncuesta = e.claveEncuesta
    WHERE e.claveHotel = '$claveHotel' AND p.categoria = 4
    GROUP BY p.item, p.pregunta, r.respuesta
) AS tabla_intermedia;";


// Ejecutar la consulta
$resultado6 = $mysqli->query($query6);

// Comprobar si hay errores en la consulta
if (!$resultado6) {
echo "Error al ejecutar la consulta: " . $mysqli->error;
exit();
}

// Imprimir la segunda tabla HTML con el resultado de la consulta
echo "<table>";
while ($fila = mysqli_fetch_assoc($resultado6)) {
echo "<tr><th>Calificación en liderazgo y relaciones en el trabajo:</th><td>" . $fila["Calificacion"] . "</td></tr>";
}
echo "</table>";

$enlace = "https://www.dof.gob.mx/nota_detalle.php?codigo=5541828&fecha=23/10/2018#gsc.tab=0"; 

echo "<a href='$enlace'>Tomar acciones</a>";

// Cerrar la conexión
$mysqli->close();
?>

      </div>
    </section>
    <script>
      $("#menu-btn").click(function () {
        $("#menu").toggleClass("active");
      });
    </script>
  </body>
</html>
