<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
	function LoadData($file)
	{
		$lines = file($file);
		$data = array();
		foreach($lines as $line)
			$data[] = explode(';',trim($line));
		return $data;
	}
	function Header()
	{
		$this->SetTextColor(255,10,22);
		$this->SetFont('Arial','B',14);
		$this->Cell(10);
		$this->Cell('',10,'Liste des taches',0,0,'C');
		$this->Ln(20);
	}

	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'AGM');
		$this->Cell(0,10,'Page '.$this->PageNo().'',0,0,'C');
	}

	function FancyTable($header, $data)
	{
		$this->SetFillColor(255,255,255);
		$this->SetTextColor(0);
		$this->SetDrawColor(0,0,0);
		$this->SetLineWidth(.1);
		$this->SetFont('','B');
		$w = array(30, 40, 40, 40, 50, 30, 30);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],6,$header[$i],1,0,'C',true);
		$this->Ln();
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		$fill = false;
		foreach($data as $row)
		{
			$this->Cell($w[0],6,$row[0],'LRTB',0,'L',$fill);
			$this->Cell($w[1],6,$row[1],'LRTB',0,'L',$fill);
			$this->Cell($w[2],6,$row[2],'LRTB',0,'L',$fill);
			$this->Cell($w[3],6,$row[3],'LRTB',0,'L',$fill);
			$this->Cell($w[4],6,$row[4],'LRTB',0,'L',$fill);
			$this->Cell($w[5],6,$row[5],'LRTB',0,'L',$fill);
			$this->Cell($w[6],6,$row[6],'LRTB',0,'L',$fill);
			$this->Ln();
			$fill = !$fill;
		}
		$this->Cell(array_sum($w),0,'','T');
	}
}

$pdf = new PDF();
$header = array('Id tache', 'titre tache', 'ddt', 'dftt', 'dfrt', 'idemploye', 'idemploye');

$data = $pdf->LoadData('tache.txt');
$pdf->SetFont('Arial','',12);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();
?>
