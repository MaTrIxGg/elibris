<?php

require 'fpdf/fpdf.php';

 //creamos un constructor 
$pdf = new FPDF('P','mm','Letter'); //La pagina va a ser Horizontal 
$pdf->SetMargins(20, 18); //Se definen las margenes
$pdf->AliasNbPages(); //alista las paginas automaticamente
$pdf->AddPage(); //funecion para agregra una nueva pagina

//DATOS Y ESTILO DEL TITULO 
$pdf->SetTextColor(60, 179, 113);
$pdf->SetFont('Arial','I','15'); 
//$pdf->Cell(0,10, 'DATOS DE LAS PERSONAS', 1, 0,'C');
$pdf->MultiCell(0, 10, 'PRESTAMOS REALIZADOS EN EL 2018', 0,'C',0);
$pdf->MultiCell(0, 10, 'En este documento se puede evidenciar la cantidad de prestamos realizados por los Estudiantes y los Docentes de la institucion.', 0,'L',0);

// DATOS DE CONEXION
$cnn = mysqli_connect("localhost","datos", "123")or die(mysql_error());
mysqli_select_db($cnn,"eLibris");

// MOSTRAR DATOS DE TABLA CON ENCABEZADOS
$pdf->Ln();
$pdf->Cell(40, 10, "Tipo Usuario", 1,0, 'C');
$pdf->Cell(40, 10, "N. Prestamo", 1,0, 'C');
$pdf->Cell(40, 10, "Porcentajes % ", 1,0, 'C');

$sql = "select U.rol As tipousuario, 
COUNT(P.idusuario) AS numeroPrestamos,
(SELECT COUNT(U.idusuario) * 100 / COUNT(P.idprestamo) FROM prestamos p WHERE  U.rol =2  ) AS porcentaje
from prestamos P 
inner join usuario U 
on P.idusuario = U.idusuario 
WHERE  U.rol =2
GROUP BY U.rol";
$datos = mysqli_query($cnn, $sql) or die("database error:".
mysqli_error($cnn));
while($row = mysqli_fetch_array($datos))
{
 $pdf->Ln();
$pdf->Cell(40, 6, "Estudiante", 1,0, 'L');
$pdf->Cell(40, 6, $row["numeroPrestamos"], 1,0, 'L');
$pdf->Cell(40, 6, $row["porcentaje"], 1,0, 'L');
//HACE 1,1 ESTE ULTIMO 1 HACE SALTO DE LINEA
}
$sqlD = "select U.rol As tipousuarioD, 
COUNT(P.idusuario) AS numeroPrestamosD,
(SELECT COUNT(U.idusuario) * 100 / COUNT(P.idprestamo) FROM prestamos p WHERE  U.rol =3  ) AS porcentajeD
from prestamos P 
inner join usuario U 
on P.idusuario = U.idusuario 
WHERE  U.rol =3
GROUP BY U.rol";

$datosD = mysqli_query($cnn, $sqlD) or die("database error:".
mysqli_error($cnn));
while($row = mysqli_fetch_array($datosD))
{
 $pdf->Ln();
$pdf->Cell(40, 6, "Docente", 1,0, 'L');
$pdf->Cell(40, 6, $row["numeroPrestamosD"], 1,0, 'L');
$pdf->Cell(40, 6, $row["porcentajeD"], 1,0, 'L');
//HACE 1,1 ESTE ULTIMO 1 HACE SALTO DE LINEA
}
$sqlT = "SELECT COUNT(idprestamo) AS Total FROM prestamos";

$datosT = mysqli_query($cnn, $sqlT) or die("database error:".
mysqli_error($cnn));
while($row = mysqli_fetch_array($datosT))
{
 $pdf->Ln();
$pdf->Cell(40, 6, "Toal", 1,0, 'L');
$pdf->Cell(40, 6, $row["Total"], 1,0, 'L');
//HACE 1,1 ESTE ULTIMO 1 HACE SALTO DE LINEA
}
$pdf->Output(); //ultima linea
?>


