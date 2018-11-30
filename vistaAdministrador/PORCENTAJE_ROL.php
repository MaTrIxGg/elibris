<?php

include 'plantilla.php';
require 'conexion.php';
//PORCENTAJE
$query = "select U.rol As tipousuario, 
(SELECT COUNT(U.idusuario) * 100 / COUNT(P.idprestamo) FROM prestamos p WHERE  U.rol =2  OR U.rol =3) AS porcentaje
from prestamos P 
inner join usuario U 
on P.idusuario = U.idusuario 
WHERE U.rol =2 OR U.rol =3 
GROUP BY U.rol";
$resultado = $mysqli->query($query);
//total de prestamos de estudiantes 
$query2 = "select COUNT(idprestamo) AS Prestamos_Estudiantes, U.rol as Rol
from prestamos P 
inner join usuario U 
on P.idusuario = U.idusuario 
WHERE U.rol =2 
GROUP BY U.rol";
$resultado2 = $mysqli->query($query2);
//total de prestamos dedocentes
$query3 = "select COUNT(idprestamo) AS Docentes, U.rol as Rol
from prestamos P 
inner join usuario U 
on P.idusuario = U.idusuario 
WHERE U.rol =3 
GROUP BY U.rol";
$resultado3 = $mysqli->query($query3);

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'I', 12);
$pdf->MultiCell(0, 5, utf8_decode('En este documento se puede evidenciar el porcentaje de los préstamos que fueron solicitados por los Docentes y Estudiantes Lleristas, teniendo en cuenta el rol al que cada uno pertenece.'), 0, 'L', 0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 14);
$pdf->MultiCell(0, 5, utf8_decode('PORCETAJE DE PRÉSTAMOS'), 0, 'C', 0);
$pdf->Ln();
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(80, 6, 'Rol', 1, 0, 'C', 1);
$pdf->Cell(80, 6, 'Porcentaje %', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);

while ($row = $resultado->fetch_assoc()) {
  $pdf->Cell(80, 6, $row['tipousuario'], 1, 0, 'C');
  $pdf->Cell(80, 6, $row['porcentaje'], 1, 1, 'C');
}

$pdf->Ln();
$pdf->SetFont('Arial', 'B', 14);
$pdf->MultiCell(0, 5, utf8_decode('TOTAL DE PRÉSTAMOS POR ESTUDIANTES'), 0, 'C', 0);
$pdf->Ln();
$pdf->SetFont('Arial', 'I', 12);
$pdf->MultiCell(0, 5, utf8_decode('En la siguiente tabla se puede evidencia el total de préstamos solicitados por los Estudiantes Lleristas.'), 0, 'L', 0);
$pdf->Ln();
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(80, 6, 'Rol Estudiante', 1, 0, 'C', 1);
$pdf->Cell(80, 6, 'Total', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);

while ($row = $resultado2->fetch_assoc()) {
  $pdf->Cell(80, 6, $row['Rol'], 1, 0, 'C');
  $pdf->Cell(80, 6, $row['Prestamos_Estudiantes'], 1, 1, 'C');
}
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 14);
$pdf->MultiCell(0, 5, utf8_decode('TOTAL DE PRÉSTAMOS POR DOCENTES'), 0, 'C', 0);
$pdf->Ln();
$pdf->SetFont('Arial', 'I', 12);
$pdf->MultiCell(0, 5, utf8_decode('En la siguiente tabla se puede evidencia el total de préstamos solicitados por los Docentes Lleristas.'), 0, 'L', 0);
$pdf->Ln();
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(80, 6, utf8_decode('Rol Docente'), 1, 0, 'C', 1);
$pdf->Cell(80, 6, 'Total', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);

while ($row = $resultado3->fetch_assoc()) {
  $pdf->Cell(80, 6, $row['Rol'], 1, 0, 'C');
  $pdf->Cell(80, 6, $row['Docentes'], 1, 1, 'C');
}
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 14);
$pdf->MultiCell(0, 5, utf8_decode('Ayuda'), 0, 'L', 0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(80, 10, utf8_decode('Código'), 1, 0, 'C', 1);
$pdf->Cell(80, 10, 'Rol', 1, 1, 'C', 1);
$pdf->SetFont('Arial', 'I', 12);
$pdf->Cell(80, 6, '2', 1, 0, 'C');
$pdf->Cell(80, 6, 'Estudiante', 1, 0, 'C');
$pdf->Ln();
$pdf->Cell(80, 6, '3', 1, 0, 'C');
$pdf->Cell(80, 6, 'Docente', 1, 1, 'C');

$pdf->Output();
?>