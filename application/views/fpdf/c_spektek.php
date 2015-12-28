<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->AddPage();

$header = array('No', 'Item Pekerjaan', 'Spesifikasi Teknis');
$pdf->SetMargins(15,10,10);
//Header
		
		$pdf->Ln(7);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(75);
		$pdf->Cell(30,5,'SPESIFIKASI TEKNIS',0,2,'C');
		$pdf->Cell(30,5,strtoupper($perihal),0,2,'C');
		$pdf->Cell(30,5,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Cell(30,5,'TAHUN '.date("Y"),0,2,'C');
		$pdf->Ln(10);
		
		$pdf->SetLineWidth(0.2);
		$pdf->SetFont('Arial','',12);
		$w = array(10,87,87);
		$pdf->SetWidths($w);
		
		$pdf->SetAligns('C');
		for($i=0;$i<1;$i++){
			$pdf->Row1($header); 
		}
		
		$pdf->SetAligns('L');
		$no=0;
		foreach ($listpeng as $row) {
		$no++;	
                    if($row->dtp_spesifikasi!=Null) {
			$pdf->Row1(array('  '.$no,$row->dtp_pekerjaan,$row->dtp_spesifikasi));
                    }
		}	
		
		$pdf->Ln(10);
		$pdf->Cell(105); 
		$pdf->Cell(100,6,'Jakarta, '.$pdf->tanggal("j M Y",$tgl) ,0,3,'L');
		$pdf->Cell(100,6,'Pejabat Pembuat Komitmen',0,3,'L');
                $pdf->Cell(100,6,'Satker Biro Umum Sekretariat Jenderal',0,3,'L');
                $pdf->Cell(100,6,'Kementerian Kelautan dan Perikanan',0,3,'L');
		$pdf->Ln(20);
		$pdf->Cell(105); 
		$pdf->Cell(100,10,$namappk,0,3,'L');
		
	$pdf->Output();	
?>		