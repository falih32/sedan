<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);
$pdf->AddPage();

//Header
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(30,6,'DAFTAR KUANTITAS DAN HARGA',0,3,'L');
                $pdf->Cell(0,6,strtoupper($perihal),0,3,'l');
		$pdf->Cell(30,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,3,'L');
		$pdf->Cell(30,6,'TAHUN '.$pdf->tanggal("Y",$tgl),0,3,'L');
		$pdf->Ln(6);
		$pdf->SetFont('Arial','',12);
                $header = array('No', 'Uraian Pekerjaan', 'Volume','Harga Satuan (Rp.)','     Jumlah      (Rp.)');
		$w = array(10,75,35,30,35);
		$pdf->SetWidths($w);
		
		$pdf->SetAligns('C');
		for($i=0;$i<1;$i++){
			$pdf->Row1($header); 
		}
		
		$pdf->SetAligns('L');
		$no=0;
		foreach ($listpeng as $row) {
		$no++;	
			$pdf->Row(array('  '.$no,$row->dtp_pekerjaan,$row->dtp_volume.' '.$row->dtp_satuan, ' ' , ' ')); 
		}
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'',1,1,'C',0);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'PPN 10%',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'',1,1,'C',0);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'',1,1,'C',0);		
		$pdf->Ln(6);
		
		$pdf->MultiCell(100,6,'Sebesar : ',0,'L');
		$pdf->Cell(100,6,'Harga diatas sudah termasuk Pajak',0,3,'L');
		$pdf->Ln(10);
		
		$pdf->Cell(105); 
		$pdf->Cell(100,6,'Jakarta,'.$pdf->tanggal("j M Y",$tgl),0,3,'L');
		$pdf->Cell(100,6,'Mengetahui / Menyetujui',0,3,'L');
		$pdf->Cell(100,6,'Pejabat Pengadaan Barang / Jasa',0,3,'L');
                $pdf->Cell(100,6,'Satker Biro Umum Sekretariat Jenderal',0,3,'L');
                $pdf->Cell(100,6,'Kementerian Kelautan dan Perikanan',0,3,'L');
		$pdf->Ln(20);
		$pdf->Cell(105); 
		$pdf->Cell(100,10,$namapejpeng,0,3,'L');
		
	$pdf->Output();	
?>		