<?php
    if($_GET['p']=='emp'){
        echo 
        "<div class='board'>
            <table width='100%'>
                <thead>
                    <tr>
                        <td></td>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Fecha de nacimiento</td>
                        <td>NSS</td>
                        <td>Antiguedad</td>
                        <td>Status</td>
                        <td class='edit'><i class='fas fa-add'></i><a href='empleado_add.php'>Añadir Empleado</a></td>
                    </tr>
                </thead>
                <tbody>";
                        $conexion = mysqli_connect('localhost', 'root', '', 'hh');
                        $sql='SELECT * from empleado';
                        $result=mysqli_query($conexion,$sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($renglon = mysqli_fetch_assoc($result)) {
                                $id=$renglon['claveEmpleado'];
                                $foto=$renglon['foto'];
                                $nombre=$renglon['nombreEmpleado'];
                                $apellido=$renglon['apellidoEmpleado'];
                                $nacimiento=$renglon['fechaNac'];
                                $NSS=$renglon['NSS'];
                                $antiguedad=$renglon['antiguedad'];
                                $status=$renglon['status'];
                                $foto = '../'.$foto;

                                echo 
                                "<tr>
                                    <td class='user'>
                                        <img src='$foto' alt=''/>
                                    </td>
                                    <td class='text'>$nombre</td>
                                    <td class='text'>$apellido</td>
                                    <td class='text'>$nacimiento </td>
                                    <td class='text'>$NSS</td>
                                    <td class='text'>$antiguedad</td>
                                    <td class='text'>$status</td>
                                    <td class='herramientas'>
                                        <p class='edit'><a href='empleado_edit.php?id=$id'>Editar datos de Empleado</a></p>
                                        <p class='edit'><a href='empleado_edit_foto.php?id=$id'>Editar foto</a></p>
                                        <p class='delete'><a href='../../php/eliminar_empleado.PHP?id=$id'>Eliminar</a></p>
                                    </td>
                                </tr>";
                            }
                        }else {
                            echo "<tr><td colspan='8'>No se encontraron empleados registrados.</td></tr>";
                        }
                        echo"
            </table>
        </div>
        </section> ";
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
                                echo "<td class='edit'><i class='fas fa-add'></i><a href='hoteleria_empleado_add.php'>Añadir Hotel</a></td>";
                            }
                            echo 
                        "</tr>
                    </thead>
                    <tbody>";
                            $conexion = mysqli_connect('localhost', 'root', '', 'hh');
                            $sql='SELECT * from hoteleria';
                            $result=mysqli_query($conexion,$sql);
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
                                          <td class='herramientas'>
                                            <p class='edit'><a href='hoteleria_empleado_edit_logo.php?id=$id'>Editar logotipo</a></p>
                                          </td>
                                        </tr>";
                                    }elseif($_SESSION['rol']=='Master'){
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
                                          <td class='herramientas'>
                                            <p class='edit'><a href='hoteleria_empleado_edit.php?id=$id'>Editar datos de hotel</a></p>
                                            <p class='edit'><a href='hoteleria_empleado_edit_logo.php?id=$id'>Editar logotipo</a></p>
                                            <p class='delete'><a href='../../php/eliminar_hotel.php?id=$id'>Eliminar</a></p>
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
            mysqli_close($conexion);
?>


