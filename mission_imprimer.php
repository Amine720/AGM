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
		$this->Cell('',10,'Liste des missions',0,0,'C');
        $this->Ln(25);
        $this->SetX(-480);
        $this->Cell('',10,'ddm: Date debut de la mission',0,0,'C');
        $this->Ln(10);
        $this->SetX(-464);
        $this->Cell('',10,'dftm: Date fin theorique de la mission',0,0,'C');
        $this->Ln(10);
        $this->SetX(-473);
        $this->Cell('',10,'dfrm: Date fin reelle de la mission',0,0,'C');
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
        $this->Ln(20);
		$this->SetFillColor(255,255,255); 
		$this->SetTextColor(0); 
		$this->SetDrawColor(0,0,0); 
		$this->SetLineWidth(.1); 
		$this->SetFont('','B'); 
		$w = array(30, 120, 40, 40, 40);
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
			$this->Ln();
			$fill = !$fill;
		}
		$this->Cell(array_sum($w),0,'','T');
	}
}

$pdf = new PDF();
$header = array('Id mission', 'Titre mission', 'ddm', 'dftm', 'dfrm');

$data = $pdf->LoadData('mission.txt');
$pdf->SetFont('Arial','',12);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();
?>
