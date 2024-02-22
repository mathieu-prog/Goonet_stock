<?php 
require"scripts/home/printer_cuts/EReport_script.php";
require"./fpdf/fpdf.php";

		class PDF extends FPDF
		{
			
			function Header()
			{
				$this->Image('logo1.jpg',10,6,35);
				$this->setFont('Arial','B',17);
				$this->Cell(80);
				$this->Cell(30,10,'Goonet Burundi',0,0,'C');
				$this->Ln(20);	
				
			}
			function Footer()
			{
				$this->SetY(-10);
				$this->SetFont('Arial','I',9);
				$this->Cell(0,10,"Page: ".$this->PageNo().'/{nb}',0,0,'C');
			}
		}

		$pdf=new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();

		$pdf->setFont('Arial','',13);
		$pdf->Cell(190,10,'Date',0,0,'R');
		$pdf->Ln(5);	
		$pdf->Cell(190,10,'Le '.date('d-m-Y'),0,0,'R');
		$pdf->Ln(15);

		$pdf->setFont('Arial','B',17);
		$pdf->Cell(180,10,'Rapport des achats de l`annee '.$yearvalue,0,0,'C');
		$pdf->Ln(10);

		$pdf->setFont('Arial','',10);
		if ($subrow>0) {
			$pdf->setFont('Arial','B',12);
		$pdf->Cell(20,7,'No',1,0,'L');
		$pdf->Cell(65,7,'Article',1,0,'C');
		$pdf->Cell(20,7,'Qte',1,0,'C');
		$pdf->Cell(40,7,'PA',1,0,'C');
		$pdf->Cell(45,7,'PT',1,0,'C');
		$pdf->Ln(7);

		
						for ($j=0; $j < $subrow; $j++) { 
					$pdf->setFont('Arial','',10);
		$pdf->Cell(20,5,''.$no[$j],1,0,'L');
		$pdf->Cell(65,5,''.$articles[$j],1,0,'L');
		$pdf->Cell(20,5,''.$qtes[$j],1,0,'R');
		$pdf->Cell(40,5,''.$pas[$j],1,0,'R');
		$pdf->Cell(45,5,''.$pts[$j],1,0,'R');
		
		$pdf->Ln(5);
		}
	
			$pdf->Cell(15,7,'',0,0);
		$pdf->Cell(20,7,'',0,0);
		$pdf->Cell(50,7,'',0,0);
		$pdf->setFont('Arial','',12);
		$pdf->Cell(20,7,'Total',1,0,'L');
		$pdf->Cell(85,7,''.$total,1,0,'R');
		$pdf->Ln(15);
		}else{
		$pdf->setFont('Arial','',13);
		$pdf->Cell(180,100,'Aucun mouvement fait lors de cet annee ',0,0,'C');
		$pdf->Ln(10);	
		}
			
	


		$pdf->Output();
		
	




 ?>