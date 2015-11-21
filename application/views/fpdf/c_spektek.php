<?php
require('fpdf.php');

class PDF extends FPDF {
			// Load data
			function LoadData($file)
			{
				// Read file lines
				$lines = file($file);
				$data = array();
				foreach($lines as $line)
					$data[] = explode(';',trim($line));
				return $data;
			}

			// Better table
			function ImprovedTable($header, $data, $data2)
			{
				// Column widths
				$w = array(20, 80, 80);
				// Header
				for($i=0;$i<count($header);$i++)
					$this->Cell($w[$i],7,$header[$i],1,0,'C');
				$this->Ln();
				// Data
				$n=0;
				foreach($data as $row)
				{
					$n++;
					$this->Cell($w[0],6,$n,'LR',0,'C');
					$this->Cell($w[1],6,$row[1],'LRT');
					$first = true;
					foreach($data2 as $row) {
						if(!$first){
							$this->Cell($w[0],6,"",'LR');
							$this->Cell($w[1],6,"",'LR');
						}
						$this->Cell($w[2],6,$row[0],'LRT');
						$this->Ln();
						$first = false;
					}
					
				}
				// Closing line
				$this->Cell(array_sum($w),0,'','T');
			}
}


$pdf = new PDF('p','mm','A4');
$pdf->AddPage();

$data = $pdf->LoadData('countries.txt');
$data2 = $pdf->LoadData('countries2.txt');
$header = array('No', 'Item Pekerjaan', 'Spesifikasi Teknis');

//Header
		$pdf->Image('logokelautan.png',10,8,-400);
		//Arial bold 15
		$pdf->SetFont('Arial','B',16);
				$pdf->Cell(80);
				//judul
		$pdf->Cell(30,6,'KEMENTRIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Cell(30,6,'SEKRETARIAT JENDRAL',0,2,'C');
		$pdf->Cell(30,6,'SATUAN KERJA BIRO UMUM',0,2,'C');
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(30,5,'JALAN MEDAN MERDEKA TIMUR NOMOR 16',0,2,'C');
		$pdf->Cell(30,5,'JAKARTA 10110,KOTAK POS 4130 JKP 10041',0,2,'C');
		$pdf->Cell(30,5,'TELEPON (021) 3519070, FAKSIMILE (021) 3520351',0,2,'C');
		$pdf->Ln(1);$pdf->Cell(70);$pdf->Cell(20,5,'LAMAN',0,0,'L');
		$pdf->SetFont('Arial','UI',14);
		$pdf->Cell(30,5,'www.kkp.go.id',0,2,'L');
		//buat garis horisontal
		$pdf->Line(10,50,200,50);
		$pdf->SetLineWidth(1.5);
		$pdf->Line(10,52,200,52);
		
		$pdf->Ln(7);
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(80);
		$pdf->Cell(30,5,'SPESIFIKASI TEKNIS',0,2,'C');
		$pdf->Cell(30,5,'XXXXXXXXXXXXXXXXXXXXXXXXXXX',0,2,'C');
		$pdf->Cell(30,5,'KEMENTRIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Cell(30,5,'TAHUN XXXX',0,2,'C');
		$pdf->Ln(10);
		
		$pdf->SetLineWidth(0.2);
		$pdf->SetFont('Arial','',12);
		$pdf->ImprovedTable($header,$data, $data2 );	
		
		$pdf->Ln(10);
		$pdf->Cell(105); 
		$pdf->Cell(100,6,'Jakarta, XX XXXX XXXX',0,3,'L');
		$pdf->Cell(100,6,'Mengetahui / Menyetujui',0,3,'L');
		$pdf->Cell(100,6,'Pejabat Pembuat Komitmen',0,3,'L');
		$pdf->Ln(20);
		$pdf->Cell(105); 
		$pdf->Cell(100,10,'MAS NOPA',0,3,'L');
		
	$pdf->Output();	
?>		