<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->AddPage();

$header = array('No', 'Item Pekerjaan', 'Spesifikasi Teknis');
$pdf->SetMargins(15,10,10);
$last=-11;
//Header
		
		$pdf->Ln(7);
		$pdf->SetFont('Arial','B',12);
		//$pdf->Cell(75);
		$pdf->Cell(0,5,'SPESIFIKASI TEKNIS',0,2,'C');
		$pdf->MultiCell(0,5,strtoupper($perihal),0,'C');
		$pdf->Cell(0,5,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Cell(0,5,'TAHUN '.date("Y"),0,2,'C');
		$pdf->Ln(10);
		
		$pdf->SetLineWidth(0.2);
		//$pdf->SetFont('Arial','',12);
		$w = array(12,85,87);
		$pdf->SetWidths($w);
		
		$pdf->SetAligns('C');
		for($i=0;$i<1;$i++){
			$pdf->Row1($header); 
		}
		 $pdf->SetRataKanan(2);
		$pdf->SetAligns('L');
		$no=0;
                $subno=0; 
		foreach ($listpeng as $row) {
		if(($row->dtp_sub_judul != '-99')&&($row->dtp_sub_judul !=$last)){$pdf->SetFont('Arial','B',12);$last=$row->dtp_sub_judul; $subno=0;$no++; $pdf->Row(array($no.'.',$row->sjd_sub_judul,''));}
		$subno++;
                    if($no!=0 && $row->dtp_sub_judul != '-99') {$nomor=$no.'.'.$subno;} else {$nomor=$subno;}
		$pdf->SetFont('Arial','',12);	$pdf->Row(array($nomor.'.',$row->dtp_pekerjaan,$row->dtp_spesifikasi));     
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
		
	$pdf->Output('Spesifikasi Teknis '.$perihal.'.pdf','I');	
?>		