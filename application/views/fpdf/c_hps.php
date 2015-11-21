<?php

$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->AddPage();

$header = array('No', 'Uraian Pekerjaan', 'Volume','Harga Satuan','Jumlah');

//Header
		$pdf->Cell(80);
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(30,6,'HARGA PERKIRAAN SENDIRI (HPS)',0,3,'C');
		$pdf->Cell(30,6,'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',0,3,'C');
		$pdf->Cell(30,6,'KEMENTRIAN KELAUTAN DAN PERIKANAN',0,3,'C');
		$pdf->Cell(30,6,'TAHUN 2015',0,3,'C');
		$pdf->Ln(10);
		
		$pdf->SetFont('Arial','',12);
		$w = array(10,75,35,35,35);
		$pdf->SetWidths($w);
		
		$pdf->SetAligns('C');
		for($i=0;$i<1;$i++){
			$pdf->Row($header); 
		}
		
		$pdf->SetAligns('L');
		$no=0;
		foreach ($listpeng as $row) {
		$no++;	
			$pdf->Row(array('  '.$no,$row->dtp_pekerjaan,$row->dtp_volume.' '.$row->dtp_satuan,$row->dtp_hargasatuan_hps,$row->dtp_jumlahharga_hps)); 
		}
		$jum=124451250;
		//$format = number_format($jum, 0, '','.');
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'xxxxxxxx',1,1,'C',0);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'PPN 10%',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'xxxxxxxx',1,1,'C',0);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'Rp.'.$pdf->formatrupiah($jum).',-',1,1,'C',0);		
		$pdf->Ln(6);
		$cAngka = $pdf->Terbilang($jum);
		$b = ucfirst(strtolower($cAngka));
		$pdf->MultiCell(200,6,'Sebesar : '.$b.'rupiah',0,'L');
		$pdf->Cell(100,6,'Harga diatas sudah termasuk Pajak',0,3,'L');
		$pdf->Ln(10);
		$pdf->Cell(100,6,'TIM PENYUSUN HARGA PERKIRAAN SENDIRI (HPS)',0,1,'L');
		$pdf->Ln(5);
		$w = array(10,70,30);
		$pdf->SetWidths($w);
		$no=0;
		for($i=0;$i<5;$i++){
		$no++;	
			$pdf->RowNoLines(array($no,'xxxxxxxx xxxxxxxxx xxxxxxxx
jabatan','
			.........'));
			$pdf->Ln(5);
		}
		
		$pdf->Cell(115); 
		$pdf->Cell(100,6,'Jakarta, '.$pdf->tanggal("j M Y"),0,3,'L');
		$pdf->Cell(100,6,'Mengetahui / Menyetujui',0,3,'L');
		$pdf->Cell(100,6,'Pejabat Pembuat Komitmen',0,3,'L');
		$pdf->Ln(15);
		$pdf->Cell(115); 
		$pdf->Cell(100,10,$namappk,0,3,'L');
		
	$pdf->Output();	
?>		