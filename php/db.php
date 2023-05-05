<?php

    function redireccionar($mensaje, $dir){
        echo '<div class="formulario-div" style= "color:brown">';
        echo '<h1 style="text-aling:center">' . $mensaje . '</h1>';
        echo '<h4 style="text-aling:center"> Redireccionando... </h4>';
        echo '</div>';
        header('refresh:3,url=' . $dir);
    }
    function conectar() {
        DEFINE('SERVIDOR','localhost');
        DEFINE('USUARIO','root');
        DEFINE('PASSWORD','');
        DEFINE('BD','hh');
        $resultado = mysqli_connect(SERVIDOR, USUARIO, PASSWORD, BD);
        return $resultado;
    }
    function validar($texto){
        $texto = trim($texto);
        $texto = stripcslashes($texto);
        $texto = htmlspecialchars($texto);
        return $texto;
    }

    function subir_imagen($archivo){
        if(empty($archivo)){
            return null;
        }

        $nombre = $archivo['name'];
        $origen = $archivo['tmp_name'];
        $tama = $archivo['size'];
        $tipo = $archivo['type'];
        $error = $archivo['error'];

        $extensiones = array('jpg', 'jpeg', 'png');

        $nombre_y_ext = explode('.',$nombre);

        $extension = strtolower(end($nombre_y_ext));

        if(!in_array($extension,$extensiones)){
            echo 'Es un archivo no valido';
            return null;
        }else if($error > 0){
            echo 'Hubo un error al cargar la imagen';
            return null;
        }else if($tama > 1000000){
            echo 'El tamaño de la imagen excede 1MB';
            return null;
        }else{
            $nombre_nuevo = uniqid('',true). '.' . $extension;
            $destino = "../img/utils_img/" . $nombre_nuevo;
            move_uploaded_file($origen,$destino);

            return $destino;
        }

    }

    function crearPass($length)
    {
        $key = "";
        $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
        $max = strlen($pattern)-1;
        for($i = 0; $i < $length; $i++){
            $key .= substr($pattern, mt_rand(0,$max), 1);
        }
        return $key;
    }

?>