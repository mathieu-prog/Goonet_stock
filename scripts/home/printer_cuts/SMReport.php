<?php 
require"scripts/home/printer_cuts/SDReport_script.php";
require"./fpdf/fpdf.php";

$yearvalue=date("Y");
if ($_GET['year']==1) {
	$yearvalue = date("Y")-1;
}
		$dates[]=array();
		$nb;
		$article;
		$time;
		$qte;
		$pa;
		$pt;
		$id;
		$total=0;
		$totalGlobal=0;
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
		$pdf->Cell(180,10,'Rapport des ventes par mois('.$yearvalue.')',0,0,'C');
		$pdf->Ln(10);

		$pdf->setFont('Arial','',10);
		$query0=$pdo->prepare("select DATE_FORMAT(date_sortie, '%M-%Y') date from sorties where date_sortie LIKE ? group by DATE_FORMAT(date_sortie, '%m-%Y') order by date_sortie asc");
		$query0->execute(array('%'.$yearvalue.'%'));
		$valuerow=$query0->rowCount();
		if ($valuerow>0) {
			while ($dateData=$query0->fetch()){ 
				$pdf->setFont('Arial','B',13);
		$pdf->Cell(180,10,''.$dateData['date'],0,0,'C');
		$pdf->Ln(10);
			$pdf->setFont('Arial','B',12);
		$pdf->setFillColor(0,0,0);
		$pdf->Cell(15,7,'No',1,0,'L');
		$pdf->Cell(35,7,'Date',1,0,'C');
		$pdf->Cell(55,7,'Article',1,0,'C');
		$pdf->Cell(20,7,'Qte',1,0,'C');
		$pdf->Cell(25,7,'PA',1,0,'C');
		$pdf->Cell(40,7,'PT',1,0,'C');
		$pdf->Ln(7);

			$query=$pdo->prepare("select id_article,DATE_FORMAT(date_sortie, '%d-%m-%Y %H:%i') as temps,quantite from sorties where DATE_FORMAT(date_sortie, '%M-%Y') LIKE ?");
		$query->execute(array('%'.$dateData['date'].'%'));
		$subrow=$query->rowCount();
	
		

	if ($subrow>0) {
		$index=0;
		$nb=1;
		while ($data=$query->fetch()) {
		$qte=$data['quantite'];
		$id=$data['id_article'];
		$time=$data['temps'];

		$subquery1=$pdo->prepare("select pa_article from entree where id_article=?");
		$subquery1->execute([$id]);
		$subData1=$subquery1->fetch();
		$pa=$subData1['pa_article'];
		$pt=$pa*$qte;
		$total=$total+$pt;
		$subquery2=$pdo->prepare("select nom_article from article where id_article=?");
		$subquery2->execute([$id]);
		$rows=$subquery2->rowCount();
		if ($rows>0) {
			$subData2=$subquery2->fetch();
		$article=$subData2['nom_article'];
		} else {
			$article="Non trouve";
		}
		$pdf->setFont('Arial','',10);
		$pdf->Cell(15,5,''.$nb,1,0,'L');
		$pdf->Cell(35,5,''.$time,1,0,'L');
		$pdf->Cell(55,5,''.$article,1,0,'L');
		$pdf->Cell(20,5,''.$qte,1,0,'R');
		$pdf->Cell(25,5,''.$pa,1,0,'R');
		$pdf->Cell(40,5,''.$pt,1,0,'R');
		
		$pdf->Ln(5);
		$nb++;
		}
		$totalGlobal=$totalGlobal+$total;
	}

			$pdf->Cell(15,7,'',0,0);
		$pdf->Cell(20,7,'',0,0);
		$pdf->Cell(55,7,'',0,0);
		$pdf->Cell(15,7,'',0,0);
		$pdf->setFont('Arial','',12);
		$pdf->Cell(20,7,'Total',1,0,'L');
		$pdf->Cell(65,7,''.$total,1,0,'R');
		$pdf->Ln(15);
		$total=0;
			
}
	$pdf->setFont('Arial','B',13);
		$pdf->Cell(190,7,'Total global: '.$totalGlobal,0,0,'R');
		$pdf->Ln(15);	
	
	
		}else{
			$pdf->setFont('Arial','',13);
		$pdf->Cell(180,100,'Aucun mouvement fait lors de cet annee ',0,0,'C');
		$pdf->Ln(10);
		}

		$pdf->Output();

 ?>