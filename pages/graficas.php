<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hh";

$conn = new mysqli($servername, $username, $password, $dbname);

require_once '../php/validar_sesion.php';
require_once '../php/validar_rol.php';

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Obtener el hotel específico (por ejemplo, claveHotel = 'hotel1')
$hotel = $_SESSION['claveH'];

// Obtener las preguntas y sus respuestas para el hotel especificado
$sql = "SELECT p.clavePregunta, p.pregunta, r.respuesta, COUNT(r.respuesta) as cantidad
        FROM pregunta p
        JOIN respuesta r ON p.clavePregunta = r.clavePregunta
        JOIN encuesta e ON r.claveEncuesta = e.claveEncuesta
        WHERE e.claveHotel = '$hotel'
        GROUP BY p.clavePregunta, r.respuesta";
$result = $conn->query($sql);

// Crear un arreglo para almacenar los datos de la gráfica
$data = array();

// Agregar los datos al arreglo
while ($row = $result->fetch_assoc()) {
    $pregunta = $row['pregunta'];
    $respuesta = $row['respuesta'];
    $cantidad = $row['cantidad'];

    // Agregar la respuesta como una categoría y la cantidad como dato
    if (!isset($data[$pregunta])) {
        $data[$pregunta] = array();
    }

    $data[$pregunta][] = array(
        'respuesta' => $respuesta,
        'cantidad' => intval($cantidad)
    );
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!-- HTML y JavaScript para generar la gráfica de pastel -->
<!DOCTYPE html>
<html>
<head>
    <title>Reporte</title>
    <!-- Incluir la librería de Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            // Convertir los datos del arreglo PHP a un arreglo JavaScript
            var data = <?php echo json_encode($data); ?>;

            // Recorrer los datos y crear una gráfica de pastel en 3D por cada pregunta
            for (var pregunta in data) {
                var preguntaData = data[pregunta];

                var chartData = new google.visualization.DataTable();
                chartData.addColumn('string', 'Respuesta');
                chartData.addColumn('number', 'Cantidad');

                for (var i = 0; i < preguntaData.length; i++) {
                    var respuesta = preguntaData[i].respuesta;
                    var cantidad = preguntaData[i].cantidad;
                    chartData.addRow([respuesta, cantidad]);
                }

                var chartTitle = '' + pregunta;

                // Crear un contenedor para cada gráfica
                var chartContainer = document.createElement('div');
                document.body.appendChild(chartContainer);

                // Dibujar la gráfica de pastel en 3D en el contenedor
                var chart = new google.visualization.PieChart(chartContainer);
               
                var options = {
                    title: chartTitle,
                    is3D: true,
                };

                chart.draw(chartData, options);
            }
        }
    </script>
</head>
<body>
    <!-- Contenedor para las gráficas de pastel -->
    <div id="charts-container"></div>
</body>
</html>
