<?php
require_once '../../php/validar_sesion.php';
require_once '../../php/validar_rol.php';
require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "hh";

      $conexion = mysqli_connect($servername, $username, $password, $dbname);
      $claveHotel=$_SESSION['claveH'];

      $consulta_info = $conexion->query("select * from hoteleria WHERE claveHotel = '$claveHotel'");//traemos datos de la empresa desde BD
      $dato_info = $consulta_info->fetch_object();
      $this->Image('../'. $dato_info->logo, 270, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(95); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode($dato_info->nombreHotel), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* ClaveHotel */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("ClaveHotel : " . $dato_info->claveHotel), 0, 0, '', 0);
      $this->Ln(5);

      /* Domicilio */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Domicilio :  " . $dato_info->domicilio), 0, 0, '', 0);
      $this->Ln(5);

      /* Propietario */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Propietario : " . $dato_info->propietario), 0, 0, '', 0);
      $this->Ln(7);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(180, 44, 44);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE EMPLEADOS REGISTRADOS EN EL HOTEL: ".$dato_info->nombreHotel), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(164, 156, 116); //colorFondo
      $this->SetTextColor(0, 0, 0); //colorTexto
      $this->SetDrawColor(204, 196, 172); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(40, 10, utf8_decode('CLAVE EMPLEADO'), 1, 0, 'C', 1);
      $this->Cell(50, 10, utf8_decode('NOMBRES'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('APELLIDOS'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('AREA'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('ANTIGUEDAD'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('ESTATUS'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

/* CONSULTA INFORMACION DEL HOSPEDAJE */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hh";

$conexion = mysqli_connect($servername, $username, $password, $dbname);
$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$claveHotel=$_SESSION['claveH'];
$consulta_reporte_empleado = $conexion->query(" SELECT * FROM EMPLEADO WHERE claveHotel = '$claveHotel'");

while ($datos_reporte = $consulta_reporte_empleado->fetch_object()) {   
   /* TABLA */
   $pdf->Cell(40, 10, utf8_decode("$datos_reporte->claveEmpleado"), 1, 0, 'C', 0);
   $pdf->Cell(50, 10, utf8_decode("$datos_reporte->nombreEmpleado"), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode("$datos_reporte->apellidoEmpleado"), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode("$datos_reporte->claveArea"), 1, 0, 'C', 0);
   $pdf->Cell(35, 10, utf8_decode("$datos_reporte->antiguedad"), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode("$datos_reporte->status"), 1, 1, 'C', 0);
}
$date = date("d M Y");
$pdf->Output('ReporteHoteleria_'.$date.'.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
