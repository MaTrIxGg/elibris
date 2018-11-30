<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	$query = "SELECT U.numerodocumento AS Documento, E.codigounico AS Codigo,P.fechaprestamo As Fecha, ES.idestado, ES.nombreestado as Estado_Actual
FROM prestamos P
INNER JOIN ejemplar E ON P.idejemplar = E.idejemplar
INNER JOIN usuario U ON P.idusuario = U.idusuario
INNER JOIN estado ES ON P.idestado = ES.idestado
WHERE P.fechaprestamo BETWEEN '20180101' AND '20181231'";
	$resultado = $mysqli->query($query);	
	$pdf = new PDF('P','mm','Letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();	
        $pdf->SetFont('Arial','I',12);          
     $pdf->MultiCell(0, 5, utf8_decode('En este documento se puede evidenciar los prestamos realizados durante el año escolar, teniendo en cuenta los siguientes datos (número de documento del estudiante o docente, el código del ejemplar que se préstamo, la fecha en que se hizo el préstamo y su estado actual.'), 0,'L',0);     
     $pdf->Ln();
     $pdf->SetFont('Arial','B',14);  
     $pdf->MultiCell(0, 5,utf8_decode('AÑO ESCOLAR 2018'), 0,'C',0);
     $pdf->Ln();        
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(40,6,'N. Documento',1,0,'C',1);       
        $pdf->Cell(20,6,'Codigo',1,0,'C',1);       
         $pdf->Cell(40,6,'Fecha Prestamo',1,0,'C',1);
         $pdf->Cell(40,6,'Estado Actual',1,1,'C',1);
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(40,6,$row['Documento'],1,0,'C');
		$pdf->Cell(20,6,$row['Codigo'],1,0,'C');		
                 $pdf->Cell(40,6,utf8_decode($row['Fecha']),1,0,'C');
                 $pdf->Cell(40,6,utf8_decode($row['Estado_Actual']),1,1,'C');
	}
	$pdf->Output();
?>