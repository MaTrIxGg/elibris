<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	$query = "SELECT CAST(P.fechaprestamo AS DATE) as dia, COUNT(idusuario) as total
FROM prestamos P
GROUP BY CAST( P.fechaprestamo AS DATE )";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
        $pdf->SetFont('Arial','B',12);
     $pdf->MultiCell(0, 5, 'En este documento se puede evidenciar la cantidad de prestamos realizados en las ultimas fechas.', 0,'L',0);
     $pdf->Ln();
        
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,6,'Fecha',1,0,'C',1);
        $pdf->Cell(20,6,'Cantidad',1,1,'C',1);	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(70,6,utf8_decode($row['dia']),1,0,'C');
		$pdf->Cell(20,6,$row['total'],1,1,'C');		
	}
	$pdf->Output();
?>