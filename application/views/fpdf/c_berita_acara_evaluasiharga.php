<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);
$pdf->AddPage();
$tanggalK=$tglKudg;
$cAngka = $pdf->Terbilang($d->pgd_jml_ssdh_ppn_pnr);
$b = ucfirst(strtolower($cAngka));

		$pdf->Ln(45);
		

		$pdf->SetFont('Arial','',12);
				
		$pdf->SetLineWidth(0.2);
		$w = array(90,95);
		$pdf->SetWidths($w);
		$pdf->SetAligns('C');
		//header
		$pdf->SetFont('Arial','B',12);
			for($i=0;$i<1;$i++){
			$pdf->Row1(array('Satuan Kerja Biro Umum Sekretariat Jenderal Kementerian Kelautan dan Perikanan Tahun Anggaran '.$pdf->tanggal("Y",$tanggalK),'Berita Acara Evaluasi Harga')); 
			}

		//isi
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('L');
		for($i=0;$i<1;$i++){
			$pdf->Row1(array('Pekerjaan : '.$d->pgd_perihal,'Nomor   : '.$noevaharga.'
Tanggal : '.$pdf->tanggal("j M Y", $tanggalK))); 
			}
		$pdf->Ln(5);
		$pdf->MultiCell(0,5,'Pada hari ini, '.$pdf->tanggal("D",$tanggalK).' tanggal '.$pdf->Terbilang($pdf->tanggal("j",$tanggalK)).' bulan '.$pdf->tanggal(" M ",$tanggalK).' tahun '.$pdf->Terbilang($pdf->tanggal("Y",$tanggalK)).', yang bertanda tangan dibawah ini Pejabat Pengadaan Barang / Jasa Satker Biro Umum telah melaksanakan evaluasi harga terhadap 1 (satu) perusahaan yang memasukkan dokumen penawaran, dengan hasil berikut :',0,'J');
		$pdf->Ln(5);
		
		$w = array(10,40,45,45,45);
		$pdf->SetWidths($w);
		$pdf->SetAligns('C');
		$pdf->SetFont('Arial','B',12);
		//header
			for($i=0;$i<1;$i++){
			$pdf->Row1(array('No','Nama Perusahaan','Harga Penawaran','Harga Terkoreksi','Keterangan')); 
			}

		//isi
		//$pdf->SetAligns('L');
		$pdf->SetFont('Arial','',12);
		$n=0;
		for($i=0;$i<1;$i++){
		$n++;
			$pdf->Row1(array($n,$d->spl_nama,'Rp. '.$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_pnr).',- ('.$b.'rupiah)','Rp. '.$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_pnr).',- ('.$b.'rupiah)','Harga Penawaran terkoreksi tidak melebihi HPS (memenuhi syarat)')); 
			}
		$pdf->Ln(5);
		
		$pdf->MultiCell(0,5,'Demikian Berita Acara ini dibuat oleh Pejabat Pengadaan Barang / Jasa Satker Biro Umum Setjen KKP untuk dapat dipergunakan sebagaimana mestinya.',0,'J');
		$pdf->Ln(15);
		$pdf->Cell(100);
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,2,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum Sekretariat Jenderal ',0,2,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,2,'L');
		$pdf->Ln(15);
		$pdf->Cell(100);
		$pdf->Cell(90,6,$d->pgd_nama_pejpeng,0,1,'L');                
		
	$pdf->Output('BA evaluasi harga '.$d->pgd_perihal.'.pdf','I');	
?>		