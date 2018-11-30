<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	$query = "SELECT U.numerodocumento AS Documento,U.nombresusuario AS Nombres,
U.apellidosusuario AS Apellidos, E.codigounico AS Codigo, 
E.descripcion AS Descripcion,P.fechaprestamo As Fecha 
FROM prestamos P
INNER JOIN ejemplar E ON P.idejemplar = E.idejemplar
INNER JOIN usuario U ON P.idusuario = U.idusuario
WHERE P.fechaprestamo BETWEEN '20180401' AND '20180430'";
	$resultado = $mysqli->query($query);	
	$pdf = new PDF('P','mm','Letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();	
        $pdf->SetFont('Arial','I',12);          
     $pdf->MultiCell(0, 5,utf8_decode('En este documento se puede evidenciar los préstamos realizados en el mes de Abril, teniendo en cuenta los siguientes datos (número de documento del estudiante o docente, los nombres y apellidos del mismo, el código del ejemplar que se préstamo y la fecha en que se hizo el préstamo '), 0,'L',0);     
     $pdf->Ln();
     $pdf->SetFont('Arial','B',14);  
     $pdf->MultiCell(0, 5, 'ABRIL', 0,'C',0);
     $pdf->Ln();        
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(40,6,'N. Documento',1,0,'C',1);
        $pdf->Cell(40,6,'Nombres',1,0,'C',1);
        $pdf->Cell(40,6,'Apellidos',1,0,'C',1);
        $pdf->Cell(20,6,'Codigo',1,0,'C',1);       
         $pdf->Cell(40,6,'Fecha Prestamo',1,1,'C',1);
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(40,6,$row['Documento'],1,0,'C');
                $pdf->Cell(40,6,utf8_decode($row['Nombres']),1,0,'C');
                 $pdf->Cell(40,6,utf8_decode($row['Apellidos']),1,0,'C');
		$pdf->Cell(20,6,$row['Codigo'],1,0,'C');		
                 $pdf->Cell(40,6,utf8_decode($row['Fecha']),1,1,'C');
	}
	$pdf->Output();
?>