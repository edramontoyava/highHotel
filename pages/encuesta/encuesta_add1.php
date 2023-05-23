
<?php
// Check if the form has been submitted
/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Connect to the database
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $dbname = 'hh';
  $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
  $pdo = new PDO($dsn, $user, $password);

  // Loop through all the POST parameters to insert the data into the database
  foreach ($_POST as $key => $value) {

    // Insert the data into the database
    $sql = "INSERT INTO respuesta (claveEncuesta, clavePregunta, respuesta) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['en1', $key, $value]);
  }*/
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $claveEncuesta = 'en2'; // Aquí se debe especificar la clave de la encuesta actual
  $respuestas = array();

  foreach($_POST as $name => $value) {
    if(is_numeric($name)) {
      $clavePregunta = $name;
      $respuesta = $value;

      $respuestas[] = array('claveEncuesta' => $claveEncuesta, 'clavePregunta' => $clavePregunta, 'respuesta' => $respuesta);
    }
  }

  // Guardar las respuestas en la base de datos
  $pdo = new PDO('mysql:host=localhost;dbname=hh', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $pdo->prepare('INSERT INTO respuesta (claveEncuesta, clavePregunta, respuesta) VALUES (:claveEncuesta, :clavePregunta, :respuesta)');

  foreach($respuestas as $respuesta) {
    $stmt->execute($respuesta);
  }
}
?>
<form METHOD="POST" action="" class="encuestas">

    
          <table border="1">
            <tbody>
            <tr>
              <th colspan="3">
                <h2 id="Seccion1"><b>Categoria 1</b></h2>
              </th>
            </tr>

            <br>
            <br>

            <tr>
              <td>
                <p name="p0" value="¿Ha presenciado o sufrido alguna vez, durante o con motivo del trabajo un acontecimiento como los siguientes:">¿Ha presenciado o sufrido alguna vez, durante o con motivo del trabajo un acontecimiento como los siguientes:</p>
              </td>
            </tr>
            <!--Pregunta 1-->
            <tr class="fila">
                <td class="columna">
                  <p name="p1" value="Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave?">Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave?</p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="1" value="SI" >SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="1" value="NO">NO</p></label>
                </td>
              </tr>
              <!--Pregunta 2-->
              <tr class="fila">
                <td class="columna">
                  <p name="p2" value="Asaltos?">Asaltos?</p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="2" value="SI">SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="2" value="NO">NO</p></label>
                </td>
              </tr>
              <!--Pregunta 3-->
              <tr class="fila">
                <td class="columna">
                  <p name="p3" value="Actos violentos que derivaron en lesiones graves?">Actos violentos que derivaron en lesiones graves?</p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="3" value="SI">SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="3" value="NO">NO</p></label>
                </td>
              </tr>
              <!--Pregunta 4-->
              <tr class="fila">
                <td class="columna">
                  <p name="p4" value="Secuestro?">Secuestro?</p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="4" value="SI">SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="4" value="NO">NO</p></label>
                </td>
              </tr>
            
              <!--Pregunta 5-->
              <tr class="fila">
                <td class="columna">
                  <p type="" name="p5" value="Amenazas?">Amenazas?</></p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="5" value="SI">SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="5" value="NO">NO</p></label>
                </td>
              </tr>
            
            
            <!--Pregunta 6-->
              <tr class="fila">
                <td class="columna">
                  <p name="p6" value="Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas?">Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas?</p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="6" value="SI">SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="6" value="NO">NO</p></label>
                </td>
              </tr>
            
            
            
            <!--Pregunta 7-->
              <tr class="fila">
                <td class="columna">
                  <p type="" name="p7" value="¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan malestares?">¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan malestares?</></p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="7" value="SI">SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="7" value="NO">NO</p></label>
                </td>
              </tr>

<!--Pregunta 8-->
              <tr class="fila">
                <td class="columna">
                  <p name="p8" value="¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar?">¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar?</p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="8" value="SI">SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="8" value="NO">NO</p></label>
                </td>
              </tr>


              <!--Pregunta 11-->
              <tr class="fila">
                <td class="columna">
                  <p name="p10" value="¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento?">¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento?</p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="10" value="SI">SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="10" value="NO">NO</p></label>
                </td>
              </tr>


<!--Pregunta 12-->
              <tr class="fila">
                <td class="columna">
                  <p name="p11" value="¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento?">¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento?</p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="11" value="SI">SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="11" value="NO">NO</p></label>
                </td>
              </tr>

              <!--Pregunta 13-->
              <tr class="fila">
                <td class="columna">
                  <p name="p12" value="¿Ha tenido dificultad para recordar alguna parte importante del evento?">¿Ha tenido dificultad para recordar alguna parte importante del evento?</p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="12" value="SI">SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="12" value="NO">NO</p></label>
                </td>
              </tr>

              <!--Pregunta 14-->
              <tr class="fila">
                <td class="columna">
                  <p name="p13" value="¿Ha disminuido su interés en sus actividades cotidianas?">¿Ha disminuido su interés en sus actividades cotidianas?</p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="13" value="SI">SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="13" value="NO">NO</p></label>
                </td>
              </tr>

<!--Pregunta 15-->
              <tr class="fila">
                <td class="columna">
                  <p name="p14" value="¿Se ha sentido usted alejado o distante de los demás?">¿Se ha sentido usted alejado o distante de los demás?</p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="14" value="SI">SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="14" value="NO">NO</p></label>
                </td>
              </tr>

              <!--Pregunta 16-->
              <tr class="fila">
                <td class="columna">
                  <p name="p15" value="¿Se ha sentido usted alejado o distante de los demás?">¿Ha notado que tiene dificultad para expresar sus sentimientos?</p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="15" value="SI">SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="15" value="NO">NO</p></label>
                </td>
              </tr>

              <!--Pregunta 16-->
              <tr class="fila">
                <td class="columna">
                  <p name="p16" value="¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado?">¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado?</p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="16" value="SI">SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="16" value="NO">NO</p></label>
                </td>
              </tr>

<!--Pregunta 17-->
              <tr class="fila">
                <td class="columna">
                  <p name="p17" value="¿Ha tenido usted dificultades para dormir?">¿Ha tenido usted dificultades para dormir?</p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="17" value="SI">SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="17" value="NO">NO</p></label>
                </td>
              </tr>

              <!--Pregunta 18-->
              <tr class="fila">
                <td class="columna">
                  <p name="p18" value="¿Ha estado particularmente irritable o le han dado arranques de coraje?">¿Ha estado particularmente irritable o le han dado arranques de coraje?</p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="18" value="SI">SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="18" value="NO">NO</p></label>
                </td>
              </tr>

              <!--Pregunta 19-->
              <tr class="fila">
                <td class="columna">
                  <p name="p19" value="¿Ha tenido dificultad para concentrarse?">¿Ha tenido dificultad para concentrarse?</p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="19" value="SI">SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="19" value="NO">NO</p></label>
                </td>
              </tr>

              <!--Pregunta 20-->
              <tr class="fila">
                <td class="columna">
                  <p name="p20" value="¿Ha estado nervioso o constantemente en alerta?">¿Ha estado nervioso o constantemente en alerta?</p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="20" value="SI">SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="20" value="NO">NO</p></label>
                </td>
              </tr>

              <!--Pregunta 21-->
              <tr class="fila">
                <td class="columna">
                  <p name="p21" value="¿Se ha sobresaltado fácilmente por cualquier cosa?">¿Se ha sobresaltado fácilmente por cualquier cosa?</p>
                </td>
                <td class="columna">
                  <p><label class="opcion"><input type="radio" name="21" value="SI">SI</p></label>
                </td>
                <td class="columna">
                <p><label class="opcion"><input type="radio" name="21" value="NO">NO</p></label>
                </td>
              </tr> 
            </tbody>
           </table>
           <div class="boton-encuesta"><input type="submit" value="Capturar1" name="accion" class="btn-encuesta"></div>
</form>