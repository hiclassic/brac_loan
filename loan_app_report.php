<?php
include_once "inc/header.php";
require_once('assets/fpdf/fpdf.php');
require_once ('assets/fpdf/rotation.php');


class PDF extends PDF_Rotate
{
	function Header()
	{
		// Put the watermark
		// $this->SetFont('Arial','B',50);
		// $this->SetTextColor(255,192,203);
		// $this->RotatedText(65,190,'A p p r o v e d',45);
	}
	function RotatedText($x, $y, $txt, $angle)
	{
		//Text rotated around its origin
		$this->Rotate($angle,$x,$y);
		$this->Text($x,$y,$txt);
		$this->Rotate(0);
	}
}

if (isset($_GET['loan_id'])) {
        $loan_id = $_GET['loan_id'];
    }

//$pdf = new FPDF();
$pdf=new PDF();
$pdf->AddPage();



$iubat='LoanHub'; ;				



$pdf->Image('assets/loanhub.png',10,15,17);

$pdf->Ln();
$pdf-> Cell(20);
$pdf->SetFont('Times','',12);
$pdf->Write(4,'LoanHub is a private micro-credit management software developed by Hares Islam.');
$pdf->Ln();
$pdf-> Cell(20);
$pdf->SetFont('Times','',12);
$pdf->Write(4, 'Green Road, Dhaka 1205, Bangladesh');
$pdf->Ln();
$pdf-> Cell(20);
$pdf->SetFont('Times','',12);
$pdf->Write(4,'Phone: 0175465465, Email:hares.ahmed.319@gmail.com');
$pdf->Ln();
$pdf-> Cell(20);
$pdf->SetFont('Times','',12);
$pdf->Write(4,'Web: www.haresislam.top');
$pdf-> Cell(20);
$pdf->SetFont('Times','',8);
$pdf->Write(5, '__________________________________________________________________________________________________________________________________');
$pdf->Ln();
$pdf->Ln();

$pdf-> Cell(85);
$pdf->SetFont('Times','U',12);
$pdf->Write(5, 'Loan Application report');
$pdf->Ln();

$pdf->Ln(2);			


			$qry = $ml->getLoanById($loan_id);

			$rec = $qry->fetch_assoc();
				$pdf-> Cell(5);
				$pdf->SetFont('Times','',14);
				$pdf->Cell(60,10,'Name ', 1);
				$pdf->Cell(80,10,$rec['name'], 1);
				$pdf->Ln();

				$pdf-> Cell(5);
				$pdf->Cell(60,10,'Expected Loan', 1);
				$pdf->Cell(80,10,$rec['expected_loan']." tk", 1);
				$pdf->Ln();

				$pdf-> Cell(5);
				$pdf->Cell(60,10,'Loan percentage', 1);
				$pdf->Cell(80,10,$rec['loan_percentage']." %", 1);
				$pdf->Ln();

				$pdf-> Cell(5);
				$pdf->Cell(60,10,'Total Loan', 1);
				$pdf->Cell(80,10,$rec['total_loan']." tk", 1);
				$pdf->Ln();

				$pdf-> Cell(5);
				$pdf->Cell(60,10,'Installments', 1);
				$pdf->Cell(80,10,$rec['installments'], 1);
				$pdf->Ln();


				$pdf-> Cell(5);
				$pdf->Cell(60,10,'EMI', 1);
				$pdf->Cell(80,10,$rec['emi_loan']." tk/month", 1);
				$pdf->Ln();

				// $pdf->Cell(80,20,'National ID',1);
				// $pdf->Cell(80,20,'Mobile',1);
				// $pdf->Cell(80,20,'Date of Birth',1);
				// $pdf->Cell(80,20,'Total Loan',1);
				// $pdf->Cell(80,20,'EMI',1);
				// $pdf->Cell(80,20,'Status',1);
				// $pdf->Ln();
				
    			// 		$pdf-> Cell(5);
				// 		$pdf->SetFont('Times','',14);
				// 		$pdf->Cell(30,20,'Name ', 1);
				// 		$pdf->Cell(80,20,'National ID',1);
				// 		$pdf->Cell(80,20,'Mobile',1);
				// 		$pdf->Cell(80,20,'Date of Birth',1);
				// 		$pdf->Cell(80,20,'Total Loan',1);
				// 		$pdf->Cell(80,20,'EMI',1);
				// 		$pdf->Cell(80,20,'Status',1);
				// 		$pdf->Ln();
                
		
$pdf->Ln();
$pdf->Ln();		
ob_end_clean();
$pdf->Output();
