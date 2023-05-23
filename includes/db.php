<?php
// Configuración de la conexión a la base de datos
$host = 'localhost';
$dbname = 'hh';
$username = 'root';
$password = '';
$contador=1;
// Establecimiento de la conexión a la base de datos utilizando PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("No se pudo establecer la conexión a la base de datos: " . $e->getMessage());
}



// Comprobación de que se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST["accion"] == "Capturar") {
        $contador++;
    }
    // Recorrido de los datos enviados por el formulario
    foreach ($_POST as $clavePregunta => $respuesta) {
        // Actualización de los votos de la opción seleccionada
        $sql = "UPDATE respuesta SET votos = votos + 1 WHERE clavePregunta = :clavePregunta AND respuesta = :respuesta";
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(':clavePregunta' => $clavePregunta, ':respuesta' => $respuesta));
        } catch(PDOException $e) {
            die("Error al actualizar los votos: " . $e->getMessage());
        }
    }
}


// Consulta SQL para obtener las preguntas y opciones de respuesta
$sql = "SELECT pregunta.clavePregunta, pregunta.pregunta AS pregunta, respuesta.respuesta, respuesta.votos
        FROM pregunta
        JOIN respuesta ON pregunta.clavePregunta = respuesta.clavePregunta
        WHERE pregunta.categoriaPregunta = {$contador}
        ORDER BY pregunta.clavePregunta ASC";

// Ejecución de la consulta y obtención de los resultados
try {
    $stmt = $pdo->query($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Error en la consulta: " . $e->getMessage());
}

// Impresión de los resultados en un formulario
echo '<form METHOD= "POST" action="" class="encuestas">';
echo'<table border="1"><tbody>';

foreach ($results as $row) {
    // Impresión de la pregunta una sola vez
    
    
    if (!isset($pregunta_anterior) || $pregunta_anterior !== $row['clavePregunta']) {
        if (isset($pregunta_anterior)) {
            echo'</tr>';
            echo '</div>'; // Cierre del div para opciones de respuesta

        }
        echo'<tr class="fila">';
        echo '<td><p>' . $row['pregunta'] . '</p></td>';
        $pregunta_anterior = $row['clavePregunta'];
    }
    
    // Impresión de las opciones de respuesta
    echo '<td class="columna"><p><label class="opcion"><input type="radio" name="' . $row['clavePregunta'] . '" value="' . $row['respuesta'] . '"> ' . $row['respuesta'] . '</label></p></td>';
    
}

if (isset($pregunta_anterior)) {
    echo'</tr>';
    echo '</div>'; // Cierre del div para opciones de respuesta
    
}
echo'</tbody></table>';
echo '<div class="boton-encuesta"><input type="submit" value="Capturar" name="accion" class="btn-encuesta"></div>';

echo '</form>';

// Cierre de la conexión a la base de datos
$pdo = null;
?>