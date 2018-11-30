<?php
	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('images/logoeLibris.gif', 5, 5, 22 );
                          $this->SetTextColor(0,0,128);
			$this->SetFont('Arial','B',20);                                         
			$this->Cell(30);                        
			$this->Cell(120,10,utf8_decode('Reporte de Préstamos'),0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>