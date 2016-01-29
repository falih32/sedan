<?php

$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->AddPage();
$pdf->SetMargins(15,10,10);
$header = array('No', 'Uraian Pekerjaan', 'Volume','Harga Satuan (Rp.)','     Jumlah      (Rp.)');
$pdf->SetMargins(15,10,10);
//Header
		$pdf->Cell(82);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(30,6,'HARGA PERKIRAAN SENDIRI (HPS)',0,3,'C');
		$pdf->Cell(30,6,strtoupper($perihal),0,3,'C');
		$pdf->Cell(30,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,3,'C');
		$pdf->Cell(30,6,'TAHUN '.$pdf->tanggal("Y",$tgl),0,3,'C');
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
			$pdf->Row(array('  '.$no,$row->dtp_pekerjaan,($row->dtp_volume+0).' '.$row->dtp_satuan, $pdf->formatrupiah($row->dtp_hargasatuan_hps) ,$pdf->formatrupiah($row->dtp_jumlahharga_hps))); 
		}
		//$format = number_format($jum, 0, '','.');
		if($pgd_dgn_pajak==0){
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,$pdf->formatrupiah($jum_sblm_ppn),1,1,'R',0);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'PPN 10%',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,$pdf->formatrupiah(0.1*$jum_sblm_ppn),1,1,'R',0);
                }
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,$pdf->formatrupiah($jum_ssdh_ppn),1,1,'R',0);		
		$pdf->Ln(6);
		$cAngka = $pdf->Terbilang($jum_ssdh_ppn);
		$b = ucfirst(strtolower($cAngka));
		$pdf->MultiCell(185,6,'Sebesar : '.$b.'rupiah',0,'L');
                if($pgd_dgn_pajak==0){
		$pdf->Cell(100,6,'Harga diatas sudah termasuk Pajak',0,3,'L');
                }
                $pdf->Ln(10);
                if($pdf->GetY()>203){$pdf->AddPage();}
		$pdf->Cell(100,6,'TIM PENYUSUN HARGA PERKIRAAN SENDIRI (HPS)',0,1,'L');
		$pdf->Ln(5);
		$w = array(10,70,20);
		$pdf->SetWidths($w);
		$no=0;
                $namapeny=array($ketua->pgw_nama,$anggota1->pgw_nama,$anggota2->pgw_nama,$anggota3->pgw_nama,$anggota4->pgw_nama);
		$jabatan=array('Ketua','Anggota','Anggota','Anggota','Anggota');
                for ($i=0;$i<5;$i++) {
		$no++;
                ${"posx" . $no}=$pdf->GetX();
                ${"posy" . $no}=$pdf->Gety();
			$pdf->RowNoLines(array($no,$namapeny[$i],'',));
                        $pdf->RowNoLines(array('',$jabatan[$i],'.........'));
			$pdf->Ln(3);
		}
		
		$pdf->Cell(115); 
                $pdf->setxy($posx1+108,$posy1);
		$pdf->Cell(100,6,'Jakarta, '.$pdf->tanggal("j M Y",$tgl),0,3,'L');
		$pdf->Cell(100,6,'Pejabat Pembuat Komitmen',0,3,'L');
                $pdf->Cell(100,6,'Satker Biro Umum Sekretariat Jenderal',0,3,'L');
                $pdf->Cell(100,6,'Kementerian Kelautan dan Perikanan',0,3,'L');
		$pdf->Ln(15);
		$pdf->Cell(108); 
		$pdf->Cell(100,10,$namappk,0,3,'L');
		
	$pdf->Output();	
?>		