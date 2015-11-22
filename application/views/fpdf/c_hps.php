<?php

$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->AddPage();
$pdf->SetMargins(15,10,10);

$header = array('No', 'Uraian Pekerjaan', 'Volume','Harga Satuan (Rp.)','     Jumlah      (Rp.)');
$pdf->SetMargins(15,10,10);
//Header
		$pdf->Cell(80);
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(30,6,'HARGA PERKIRAAN SENDIRI (HPS)',0,3,'C');
		$pdf->Cell(30,6,strtoupper($perihal),0,3,'C');
		$pdf->Cell(30,6,'KEMENTRIAN KELAUTAN DAN PERIKANAN',0,3,'C');
		$pdf->Cell(30,6,'TAHUN '.date("Y"),0,3,'C');
		$pdf->Ln(10);
		
		$pdf->SetFont('Arial','',12);
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
			$pdf->Row(array('  '.$no,$row->dtp_pekerjaan,$row->dtp_volume.' '.$row->dtp_satuan, $pdf->formatrupiah($row->dtp_hargasatuan_hps) ,$pdf->formatrupiah($row->dtp_jumlahharga_hps))); 
		}
		//$format = number_format($jum, 0, '','.');
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,$pdf->formatrupiah($jum_sblm_ppn),1,1,'R',0);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'PPN 10%',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,$pdf->formatrupiah(0.1*$jum_sblm_ppn),1,1,'R',0);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,$pdf->formatrupiah($jum_ssdh_ppn),1,1,'R',0);		
		$pdf->Ln(6);
		$cAngka = $pdf->Terbilang($jum_ssdh_ppn);
		$b = ucfirst(strtolower($cAngka));
		$pdf->MultiCell(185,6,'Sebesar : '.$b.'rupiah',0,'L');
		$pdf->Cell(100,6,'Harga diatas sudah termasuk Pajak',0,3,'L');
		$pdf->Ln(10);
		$pdf->Cell(100,6,'TIM PENYUSUN HARGA PERKIRAAN SENDIRI (HPS)',0,1,'L');
		$pdf->Ln(5);
		$w = array(10,70,30);
		$pdf->SetWidths($w);
		$no=0;
		foreach ($timpny as $baris) {
		$no++;
                $jabatan='Anggota';
                if($baris->lsp_jabatan==0) {$jabatan='Ketua';}
			$pdf->RowNoLines(array($no,$baris->pgw_nama,''));
                        $pdf->RowNoLines(array('',$jabatan,'.........'));
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