<?php
    if($_GET['p']=='emp'){
        if($_SESSION['rol']=='Master'){
            echo 
            "<div class='board'>
                <table width='100%'>
                    <thead>
                        <tr>
                            <td></td>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Area</td>
                            <td>Antiguedad(Meses)</td>
                            <td>Estatus</td>
                            <td>¿Contesto encuesta?</td>
                            <td>Usuario</td>
                            <td>Contraseña</td>
                            <td>Herramientas</td>

                        </tr>
                    </thead>
                    <tbody>";
                            $conexion = mysqli_connect('localhost', 'root', '', 'hh');
                            $hotel = $_SESSION['claveH'];
                            $sql="SELECT e.claveEmpleado as claveEmpleado, e.foto as foto, e.nombreEmpleado as nombreEmpleado,
                            e.apellidoEmpleado as apellidoEmpleado, e.claveArea as claveArea, e.antiguedad as antiguedad, 
                            e.status as estatus, e.encuesta as encuesta, u.usuario as usuario, u.passwrd as pass, 
                            u.sesion as sesion from empleado e LEFT JOIN usuario u ON e.claveEmpleado = u.claveEmpleado";
                            $result=mysqli_query($conexion,$sql);
                            if (mysqli_num_rows($result) > 0) {
                                while($renglon = mysqli_fetch_assoc($result)) {
                                    $id=$renglon['claveEmpleado'];
                                    $foto=$renglon['foto'];
                                    $nombre=$renglon['nombreEmpleado'];
                                    $apellido=$renglon['apellidoEmpleado'];
                                    $area=$renglon['claveArea'];
                                    $antiguedad=$renglon['antiguedad'];
                                    $status=$renglon['estatus'];
                                    $encuesta=$renglon['encuesta'];
                                    $usuario=$renglon['usuario'];
                                    $pass=$renglon['pass'];
                                    $sesion=$renglon['sesion'];
                                    $foto = '../'.$foto;
    
                                    echo 
                                    "<tr>
                                        <td class='user'>
                                            <img src='$foto' alt=''/>
                                        </td>
                                        <td class='text'>$nombre</td>
                                        <td class='text'>$apellido</td>
                                        <td class='text'>$area</td>
                                        <td class='text'>$antiguedad</td>                               
                                        <td class='text'>$status</td>";
    
    
    
    
    
                                        $sql2="SELECT COUNT(*) as total FROM empleado WHERE claveHotel = '$hotel' and Encuesta = 'Si'";
                                        $result2=mysqli_query($conexion,$sql2);
                                        $row = $result2->fetch_assoc();
                                        if($result2->num_rows > 0){
                                            $total = $row['total'];
                                        }
    
                                        $sql3="SELECT COUNT(*) as total FROM empleado WHERE claveHotel = '$hotel'";
                                        $result3=mysqli_query($conexion,$sql3);
                                        $row2 = $result3->fetch_assoc();
                                        if($result2->num_rows > 0){
                                            $totalc = $row['total'];
                                        }
    
    
    
                                        if($total>10 && $totalc>$totalc-10){
                                            echo "<td class='text'>$encuesta</td>";
                                        }else{
                                            echo "<td class='text'>No</td>";
                                        }
                                        echo
                                        "<td class='text'>$usuario</td>";
                                        $com=0;
                                        if(intval($sesion)===$com){
                                            echo "<td class='address'>$pass</td>";
                                          }else{

                                            echo "<td class='address'>Contraseña actualizada</td>
                                            <td class='address'><p class='edit'><a href='/highHotel/pages/form_actualizarE.php?id=$id'>Editar contraseña del Empleado</a></p></td>";

                                          }
                                }
                            }else{
                                echo "<tr><td colspan='8'>No se encontraron empleados registrados.</td></tr>";
                            }
                            echo"
                </table>
            </div>
            </section> ";
        }else{
            echo 
            "<div class='board'>
                <table width='100%'>
                    <thead>
                        <tr>
                            <td></td>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Area</td>
                            <td>Antiguedad(Meses)</td>
                            <td>Estatus</td>
                            <td>¿Contesto encuesta?</td>
                            <td>Usuario</td>
                            <td>Contraseña</td>
                            <td class='edit'><i class='fas fa-add'></i><a href='empleado_add.php'>Añadir Empleado</a></td>
                            <td></td>
                            <td class='edit'><i class='fas fa-file-pdf'></i><a href='/highHotel/lib/fpdf/ReporteEmpleado.php' target=_blank>Generar Reporte</a></td> 
                        </tr>
                    </thead>
                    <tbody>";
                            $conexion = mysqli_connect('localhost', 'root', '', 'hh');
                            $hotel = $_SESSION['claveH'];
                            $sql="SELECT e.claveEmpleado as claveEmpleado, e.foto as foto, e.nombreEmpleado as nombreEmpleado,
                            e.apellidoEmpleado as apellidoEmpleado, e.claveArea as claveArea, e.antiguedad as antiguedad, 
                            e.status as estatus, e.encuesta as encuesta, u.usuario as usuario, u.passwrd as pass, 
                            u.sesion as sesion from empleado e LEFT JOIN usuario u ON e.claveEmpleado = u.claveEmpleado WHERE e.claveHotel = '$hotel'";
                            $result=mysqli_query($conexion,$sql);
                            if (mysqli_num_rows($result) > 0) {
                                while($renglon = mysqli_fetch_assoc($result)) {
                                    $id=$renglon['claveEmpleado'];
                                    $foto=$renglon['foto'];
                                    $nombre=$renglon['nombreEmpleado'];
                                    $apellido=$renglon['apellidoEmpleado'];
                                    $area=$renglon['claveArea'];
                                    $antiguedad=$renglon['antiguedad'];
                                    $status=$renglon['estatus'];
                                    $encuesta=$renglon['encuesta'];
                                    $usuario=$renglon['usuario'];
                                    $pass=$renglon['pass'];
                                    $sesion=$renglon['sesion'];
                                    $foto = '../'.$foto;
    
                                    echo 
                                    "<tr>
                                        <td class='user'>
                                            <img src='$foto' alt=''/>
                                        </td>
                                        <td class='text'>$nombre</td>
                                        <td class='text'>$apellido</td>
                                        <td class='text'>$area</td>
                                        <td class='text'>$antiguedad</td>                               
                                        <td class='text'>$status</td>";
    
    
    
    
    
                                        $sql2="SELECT COUNT(*) as total FROM empleado WHERE claveHotel = '$hotel' and Encuesta = 'Si'";
                                        $result2=mysqli_query($conexion,$sql2);
                                        $row = $result2->fetch_assoc();
                                        if($result2->num_rows > 0){
                                            $total = $row['total'];
                                        }
    
                                        $sql3="SELECT COUNT(*) as total FROM empleado WHERE claveHotel = '$hotel'";
                                        $result3=mysqli_query($conexion,$sql3);
                                        $row2 = $result3->fetch_assoc();
                                        if($result2->num_rows > 0){
                                            $totalc = $row['total'];
                                        }
    
    
    
                                        if($total>10 && $totalc>$totalc-10){
                                            echo "<td class='text'>$encuesta</td>";
                                        }else{
                                            echo "<td class='text'>No</td>";
                                        }
                                        echo
                                        "<td class='text'>$usuario</td>";
                                        $com=0;
                                        if(intval($sesion)===$com){
                                            echo "<td class='address'>$pass</td>";
                                          }else{
                                            echo "<td class='address'>Contraseña actualizada</td>";
                                          }
                                        echo"<td class='herramientas'>
                                            <p class='edit'><a href='empleado_edit.php?id=$id'>Editar datos de Empleado</a></p>
                                            <hr>
                                            <p class='edit'><a href='empleado_edit_area.php?id=$id'>Editar area</a></p>
                                            <hr>
                                            <p class='edit'><a href='empleado_edit_foto.php?id=$id'>Editar foto</a></p>";
                                            echo"
                                            <hr>
                                            <p class='delete'><a href='/highHotel/php/eliminar_empleado.PHP?id=$id'>Eliminar</a></p>
                                            <hr>
                                        </td>
                                    </tr>";
                                }
                            }else{
                                echo "<tr><td colspan='8'>No se encontraron empleados registrados.</td></tr>";
                            }
                            echo"
                </table>
            </div>
            </section> ";
        }
        }elseif($_GET['p']=='hot'){
            echo 
            "<div class='board'>
                <table width='100%'>
                    <thead>
                        <tr>
                            <td>Datos Hoteleria</td>
                            <td>Domicilio</td>
                            <td>Status</td>";
                            if($_SESSION['rol']=='Master'){
                                echo"<td>Contraseña</td>";
                                echo "<td class='edit'><i class='fas fa-add'></i><a href='hoteleria_empleado_add.php'>Añadir Hotel</a></td>";
                            }else{
                                echo "<td class='edit'><i class='fas fa-file-pdf'></i><a href='/highHotel/lib/fpdf/ReporteHoteleria.php' target='_blank'>Generar Reporte</a></td>";
                                
                            }
                            echo 
                        "</tr>
                    </thead>
                    <tbody>";
                            $hotel = $_SESSION['claveH'];           
                            $conexion = mysqli_connect('localhost', 'root', '', 'hh');
                            $sql='SELECT h.claveHotel as claveHotel, h.logo as logo, h.nombreHotel as nombreHotel, h.propietario as propietario, 
                            h.domicilio as domicilio, h.estatus as estatus, u.usuario as usuario, u.passwrd as pass, u.sesion as sesion from hoteleria h LEFT JOIN usuario u ON h.claveHotel = u.claveHotel';
                            
                            $sqlh='SELECT h.claveHotel as claveHotel, h.logo as logo, h.nombreHotel as nombreHotel, h.propietario as propietario, 
                            h.domicilio as domicilio, h.estatus as estatus, u.usuario as usuario from hoteleria h LEFT JOIN usuario u ON h.claveHotel = u.claveHotel WHERE h.claveHotel= "$hotel" ';

                            $result=mysqli_query($conexion,$sql);
                            $result1=mysqli_query($conexion,$sqlh);

                            if (mysqli_num_rows($result) > 0) {
                                while($renglon = mysqli_fetch_assoc($result)) {
                                    if($_SESSION['rol']=='Administrador'){
                                        $id=$renglon['claveHotel'];
                                        $logo = $renglon['logo'];
                                        $nombreHotel = $renglon['nombreHotel'];
                                        $propietario = $renglon['propietario'];
                                        $domicilio = $renglon['domicilio'];
                                        $estatus = $renglon['estatus'];
                                        $logo = "../".$logo;
                                        echo
                                        "<tr>
                                          <td class='hotel'>
                                            <img src='$logo' alt=''>
                                            <div class='hotel-de'>
                                              <h5>$nombreHotel</h5>
                                              <p>$propietario</p>
                                            </div>
                                          </td>
                                          <td class='address'>$domicilio</td>
                                          <td class='active'>$estatus</td>
                                        </tr>";
                                    }elseif($_SESSION['rol']=='Master'){
                                        $id=$renglon['claveHotel'];
                                        $logo = $renglon['logo'];
                                        $nombreHotel = $renglon['nombreHotel'];
                                        $propietario = $renglon['propietario'];
                                        $domicilio = $renglon['domicilio'];
                                        $estatus = $renglon['estatus'];
                                        $logo = "../".$logo;
                                        $usuario = $renglon['usuario'];
                                        $pass = $renglon['pass'];
                                        $sesion = $renglon['sesion'];
                                        $com = 0;
                                        echo
                                        "<tr>
                                          <td class='hotel'>
                                            <img src='$logo' alt=''>
                                            <div class='hotel-de'>
                                              <h5>$nombreHotel</h5>
                                              <p>$propietario</p>
                                            </div>
                                          </td>
                                          <td class='address'>$domicilio</td>
                                          <td class='active'>$estatus</td>
                                          <td class='active'>$usuario</td>";
                                          if(intval($sesion)===$com){
                                            echo "<td class='address'>$pass</td>";
                                          }else{
                                            echo "<td class='address'>Contraseña actualizada</td>";
                                          }
                                         echo "<td class='herramientas'>
                                            <p class='edit'><a href='/highHotel/pages/form_ActualizarHM.php?id=$id'>Cambiar contraseña del hotel</a></p>
                                          </td>
                                        </tr>";
                                    }
                                    
                                }
                            }else {
                                echo "<tr><td colspan='8'>No se encontraron hoteles registrados.</td></tr>";
                            }
                            echo"
                </table>
            </div>
            </section> ";
            }elseif($_GET['p']=='enc'){
                if($_SESSION['rol']=='Master'){
                    echo 
                    "<div class='board'>
                        <table width='100%'>
                            <thead>
                                <tr>
                                    <td>Clave de la encuesta</td>
                                    <td>Area</td>
                                    <td>Fecha de encuesta</td>
                                </tr>
                            </thead>
                            <tbody>";
                                    $conexion = mysqli_connect('localhost', 'root', '', 'hh');
                                    $hotel = $_SESSION['claveH'];
                                    $sql="SELECT en.claveEmpleado as claveEmpleado, en.claveEncuesta as claveEncuesta, en.fechaEncuesta as fechaEncuesta, en.claveEmpleado ,e.claveArea, a.nombreArea as area from encuesta en INNER JOIN empleado e ON en.claveEmpleado = e.claveEmpleado INNER JOIN area a ON e.claveArea = a.claveArea";
                                    $result=mysqli_query($conexion,$sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while($renglon = mysqli_fetch_assoc($result)) {
                                            if($_SESSION['rol']=='Administrador'||$_SESSION['rol']=='Master'){
                                                $id=$renglon['claveEmpleado'];
                                                $clave=$renglon['claveEncuesta'];
                                                $area = $renglon['area'];
                                                $fecha = $renglon['fechaEncuesta'];
                                                echo
                                                "<tr>
                                                  <td class='address'>$clave</td>
                                                  <td class='address'>$area</td>
                                                  <td class='active'>$fecha</td>
                                                </tr>";
                                            }
                                        }
                                    }else {
                                        echo "<tr><td colspan='8'>No se encontraron hoteles registrados.</td></tr>";
                                    }
                                    echo"
                        </table>
                    </div>
                    </section> ";
                }else{
                    echo 
                    "<div class='board'>
                        <table width='100%'>
                            <thead>
                                <tr>
                                    <td>Clave de la encuesta</td>
                                    <td>Area</td>
                                    <td>Fecha de encuesta</td>
                                    <td class='edit'><i class='fas fa-file-pdf'></i><a href='/highHotel/pages/graficas.php' target='_blank'>Generar Reporte</a></td>
                                    <td class='edit'><i class='fas fa-file-pdf'></i><a href='/highHotel/pages/resultados.php' target='_blank'>Ver Resultados</a></td>
                                </tr>
                            </thead>
                            <tbody>";
                                    $conexion = mysqli_connect('localhost', 'root', '', 'hh');
                                    $hotel = $_SESSION['claveH'];
                                    $sql="SELECT en.claveEmpleado as claveEmpleado, en.claveEncuesta as claveEncuesta, en.fechaEncuesta as fechaEncuesta, en.claveEmpleado ,e.claveArea, a.nombreArea as area from encuesta en INNER JOIN empleado e ON en.claveEmpleado = e.claveEmpleado INNER JOIN area a ON e.claveArea = a.claveArea WHERE en.claveHotel = '$hotel'";
                                    $result=mysqli_query($conexion,$sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while($renglon = mysqli_fetch_assoc($result)) {
                                            if($_SESSION['rol']=='Administrador'||$_SESSION['rol']=='Master'){
                                                $id=$renglon['claveEmpleado'];
                                                $clave=$renglon['claveEncuesta'];
                                                $area = $renglon['area'];
                                                $fecha = $renglon['fechaEncuesta'];
                                                echo
                                                "<tr>
                                                  <td class='address'>$clave</td>
                                                  <td class='address'>$area</td>
                                                  <td class='active'>$fecha</td>
                                                  <td class='herramientas'>
                                                    <p class='edit'><a href='/highHotel/lib/fpdf/ReporteEncuestaInd.php?id=$id' target='_blank'>Ver Encuesta</a></p>
                                                  </td>
                                                </tr>";
                                            }
                                        }
                                    }else {
                                        echo "<tr><td colspan='8'>No se encontraron hoteles registrados.</td></tr>";
                                    }
                                    echo"
                        </table>
                    </div>
                    </section> ";
                }
                }elseif($_GET['p']=='en'){
                   /* echo "<section class='encuesta'>
                        <!--PARTE DE LAS ENCUESTAS-->
                        <h2 class='titulo-encuesta'>BIENVENIDO A LA ENCUESTA NOM-035</h2> 
                        <div class='imagenNom'>
                            <img src='../img/utils/stps.png' alt='logostps' width=180px>
                            <img src='../img/utils/nom.jpg' alt='nom35' width=90px> 
                        </div>";
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            if ($_POST['accion'] == 'Empezar') {
                            include('../pages/encuesta/encuesta_add1.php');
                            }
                            if ($_POST['accion'] == 'Capturar1') {
                            include('../pages/encuesta/encuesta_add2.php');
                            }
                            if ($_POST['accion'] == 'Capturar2') {
                            include('../pages/encuesta/encuesta_add3.php');
                            }
                        }
                            if (!isset($_SESSION['claveE'])) {
                            
                            $claveEm=$_SESSION['claveE'];
                            $sqldata = "SELECT * FROM empleado WHERE claveEmpleado = '$claveEm'";
                            $resultdata = mysqli_query($conexion, $sqldata);
                            $rowdata = mysqli_fetch_assoc($resultdata);
                            $claveHotel=$rowdata['claveHotel'];
                            $sql = 'SELECT MAX(claveEncuesta) AS maxclave FROM encuesta';
                            $result = mysqli_query($conexion, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $maxclave = $row['maxclave'];
                            if ($maxclave == null) {
                                $claveEncuesta = 1;
                            } else {
                                $claveEncuesta = crearEncuesta(10);
                            }
                            // Obtener la fecha actual en formato yyyy-mm-dd
                            $fechaActual = date('Y-m-d');
                            
                            // Inserción del nuevo registro en la tabla encuesta
                            $sql = "INSERT INTO encuesta VALUES ('$claveEncuesta', '$claveHotel', '$claveEm', '$fechaActual')";
                            if (mysqli_query($conexion, $sql)) {
                                echo 'Registro insertado correctamente.';
                            } else {
                                echo 'Error al insertar registro: ' . mysqli_error($conexion);
                            }
                            
                            // Almacenar la clave de encuesta en la variable de sesión
                            $_SESSION['claveE'] = $claveEncuesta;
                            }
                        
                            //Metodo insert respuestas
                            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $claveEncuesta = $_SESSION['claveE']; // Se obtiene la clave de encuesta almacenada en la variable de sesión
                        
                            $respuestas = array();
                            
                            foreach($_POST as $name => $value) {
                                if(is_numeric($name)) {
                                $clavePregunta = $name;
                                $respuesta = $value;
                            
                                $respuestas[] = array('claveEncuesta' => $claveEncuesta, 'clavePregunta' => $clavePregunta, 'respuesta' => $respuesta);
                                }
                                elseif(substr($name, 0, 1) == 'p'){
                                    $clavePregunta = substr($name, 1);
                                    $opciones = explode('_', $value);
                                    $opcion = $opciones[0];
                                    $texto = count($opciones) > 1 ? $opciones[1] : null;
                                
                                    $respuestas[] = array('claveEncuesta' => $claveEncuesta, 'clavePregunta' => $clavePregunta, 'respuesta' => $opcion, 'texto' => $texto);
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
            
                   echo "<form action='' METHOD='POST'>
                     <div class='boton-encuesta'><input type='submit' value='Empezar' name='accion' class='btn-encuesta'></div>
                   </form>
                </section>  
                </section>";*/



echo "<section class='encuesta'>
    <!--PARTE DE LAS ENCUESTAS-->
    <h2 class='titulo-encuesta'>BIENVENIDO A LA ENCUESTA NOM-035</h2> 
    <div class='imagenNom'>
        <img src='../img/utils/stps.png' alt='logostps' width=180px>
        <img src='../img/utils/nom.jpg' alt='nom35' width=90px> 
    </div>";

/*if (isset($_SESSION['claveE'])) {
    // Si ya existe la clave de encuesta en la sesión, se recupera
    $claveEncuesta = $_SESSION['claveE'];
    echo $claveEncuesta;
} else {
  */  // Si no existe, se crea y se inserta en la base de datos
    $claveEm = $_SESSION['claveE'];
    /*$sqldata = "SELECT * FROM empleado WHERE claveEmpleado = '$claveEm'";
    $resultdata = mysqli_query($conexion, $sqldata);
    $rowdata = mysqli_fetch_assoc($resultdata);
    $claveHotel = $rowdata['claveHotel'];
    $sql = 'SELECT MAX(claveEncuesta) AS maxclave FROM encuesta';
    $result = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_assoc($result);
    $maxclave = $row['maxclave'];
    if ($maxclave == null) {
        $claveEncuesta = 1;
    } else {
        $claveEncuesta = crearEncuesta(10);
    }
    // Obtener la fecha actual en formato yyyy-mm-dd
    $fechaActual = date('Y-m-d');

    // Inserción del nuevo registro en la tabla encuesta
    $sql = "INSERT INTO encuesta VALUES ('$claveEncuesta', '$claveHotel', '$claveEm', '$fechaActual')";
    if (mysqli_query($conexion, $sql)) {
        echo 'Registro insertado correctamente.';
    } else {
        echo 'Error al insertar registro: ' . mysqli_error($conexion);
    }

    // Almacenar la clave de encuesta en la variable de sesión
    $_SESSION['claveE'] = $claveEncuesta;
}*/
$sqldata = "SELECT * FROM empleado WHERE claveEmpleado = '$claveEm'";
$resultdata = mysqli_query($conexion, $sqldata);
$rowdata = mysqli_fetch_assoc($resultdata);
$claveHotel = $rowdata['claveHotel'];
$fechaActual = date('Y-m-d');






$sql = "SELECT COUNT(*) AS count FROM encuesta WHERE claveEmpleado = '$claveEm'";
$result = mysqli_query($conexion, $sql);
$row = mysqli_fetch_assoc($result);
$count = $row['count'];
if ($count == 0) {
    //header("Location: index.php"); // Redirigir al usuario a la página principal
    //exit();
    $claveEncuesta = crearEncuesta(10);
    $sql = "INSERT INTO encuesta VALUES ('$claveEncuesta', '$claveHotel', '$claveEm', '$fechaActual')";
    if (mysqli_query($conexion, $sql)) {
       // echo 'Registro insertado correctamente.';
    } else {
        echo 'Error al insertar registro: ' . mysqli_error($conexion);
    }
}else{
    $sql = "SELECT * FROM encuesta WHERE claveEmpleado = '$claveEm'";
    $result = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_assoc($result);
    $claveEncuesta = $row['claveEncuesta'];

    $sql = "SELECT COUNT(clavePregunta) AS count1 FROM respuesta WHERE claveEncuesta = '$claveEncuesta'";
    $result = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_assoc($result);
    $count1 = $row['count1'];
    if($count1>=75){
        
        echo "<script type='text/javascript'>";
        echo "alert('Actualmente ya se encuentra registrada tu encuesta, muchas gracias');";
        echo "</script>";
        header("Location: ../pages/inicio.php"); // Redirigir al usuario a la página principal
        exit();
    }
    //echo $claveEncuesta;
}


// Obtener la claveHotel y crear la nueva encuesta


$sql = 'SELECT MAX(claveEncuesta) AS maxclave FROM encuesta';
$result = mysqli_query($conexion, $sql);
$row = mysqli_fetch_assoc($result);
$maxclave = $row['maxclave'];

if ($maxclave == null) {
    //$claveEncuesta = 1;
} else {
    //$claveEncuesta = crearEncuesta(10);
}

// Obtener la fecha actual en formato yyyy-mm-dd


// Inserción del nuevo registro en la tabla encuesta


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['accion'] == 'Empezar') {
        include('../pages/encuesta/encuesta_add1.php');
    }
    if ($_POST['accion'] == 'Capturar1') {
        include('../pages/encuesta/encuesta_add2.php');
    }
    if ($_POST['accion'] == 'Capturar2') {
        include('../pages/encuesta/encuesta_add3.php');
    }
}

//Metodo insert respuestas
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //$claveEncuesta = $_SESSION['claveE']; // Se obtiene la clave de encuesta almacenada en la variable de sesión

    $respuestas = array();

        foreach($_POST as $name => $value) {
            if(is_numeric($name)) {
                $clavePregunta = $name;
                $respuesta = $value;
                $respuestas[] = array('claveEncuesta' => $claveEncuesta, 'clavePregunta' => $clavePregunta, 'respuesta' => $respuesta);
            } elseif(substr($name, 0, 8) == 'comentario') {
                $clavePregunta = substr($name, 9);
                $comentario = $value;
                $respuestas[] = array('claveEncuesta' => $claveEncuesta, 'clavePregunta' => $clavePregunta, 'comentario' => $comentario);
            }
        }

        $pdo = new PDO('mysql:host=localhost;dbname=hh', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare('INSERT INTO respuesta (claveEncuesta, clavePregunta, respuesta) VALUES (:claveEncuesta, :clavePregunta, :respuesta)');
                    
        foreach($respuestas as $respuesta) {
            try {
                $stmt->execute($respuesta);
            } catch(PDOException $e) {
                // Omitir errores de inserción y continuar con los demás datos
                continue;

            }
        }

}

                }

// Inserción de las respuestas en la tabla respuesta


echo "<form action='' METHOD='POST' class='encuestas'>
<div class='boton-encuesta'><input type='submit' value='Empezar' name='accion' class='btn-encuesta'></div>
</form>
</section>  
</section>";

            mysqli_close($conexion);





/* echo "<section class='encuesta'>
                    <!--PARTE DE LAS ENCUESTAS-->
                  <h2 class='titulo-encuesta'>BIENVENIDO A LA ENCUESTA NOM-035</h2> 
                  <div class='imagenNom'>
                  <img src='../img/utils/stps.png' alt='logostps' width=180px>
                    <img src='../img/utils/nom.jpg' alt='nom35' width=90px> 
                  </div>";
            
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                      if ($_POST['accion'] == 'Empezar') {
                        include('../pages/encuesta/encuesta_add1.php');
                      }
                        if ($_POST['accion'] == 'Capturar1') {
                          include('../pages/encuesta/encuesta_add2.php');
                        }
                        if ($_POST['accion'] == 'Capturar2') {
                            include('../pages/encuesta/encuesta_add3.php');
                        }
                    }
                    $claveEm=$_SESSION['claveE'];
                    $sqldata = "SELECT * FROM empleado WHERE claveEmpleado = '$claveEm'";
                    $resultdata = mysqli_query($conexion, $sqldata);
                    $rowdata = mysqli_fetch_assoc($resultdata);
                    $claveHotel=$rowdata['claveHotel'];
                    $sql = 'SELECT MAX(claveEncuesta) AS maxclave FROM encuesta';
                    $result = mysqli_query($conexion, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $maxclave = $row['maxclave'];
                    if ($maxclave == null) {
                        $claveEncuesta = 1;
                    } else {
                        
                        $claveEncuesta = crearEncuesta(10);
                    }
            
            
            // Obtener la fecha actual en formato yyyy-mm-dd
                    $fechaActual = date('Y-m-d');
                    
                    // Inserción del nuevo registro en la tabla encuesta
                    $sql = "INSERT INTO encuesta VALUES ('$claveEncuesta', '$claveHotel', '$claveEm', '$fechaActual')";
                    if (mysqli_query($conexion, $sql)) {
                        echo 'Registro insertado correctamente.';
                    } else {
                        echo 'Error al insertar registro: ' . mysqli_error($conexion);
                    }
            
                    //Metodo insert respuestas
                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    //$claveEncuesta = 'en7'; // Aquí se debe especificar la clave de la encuesta actual
                    
                    $respuestas = array();
                    
                    foreach($_POST as $name => $value) {
                        if(is_numeric($name)) {
                        $clavePregunta = $name;
                        $respuesta = $value;
                    
                        $respuestas[] = array('claveEncuesta' => $claveEncuesta, 'clavePregunta' => $clavePregunta, 'respuesta' => $respuesta);
                        }
                        elseif(substr($name, 0, 1) == 'p'){
                        $clavePregunta = '5';
                        $respuesta = $value;
                        echo '<p>'.$clavePregunta.'</p>';
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
            
                   echo "<form action='' METHOD='POST'>
                     <div class='boton-encuesta'><input type='submit' value='Empezar' name='accion' class='btn-encuesta'></div>
                   </form>
                </section>  
                </section>"; */
?>
