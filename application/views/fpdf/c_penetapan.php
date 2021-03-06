<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);

$pdf->AddPage();

//Header

		$pdf->Ln(45);
		
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(20,5,'Nomor',0,0,'L'); $pdf->Cell(100,5,': '.$nopet,0,0,'L'); $pdf->Cell(40,5,'Jakarta, '.$pdf->tanggal("j M Y",$tanggalSP),0,1,'L');
		$pdf->Cell(20,5,'Sifat',0,0,'L'); $pdf->Cell(70,5,': Biasa',0,1,'L');
		$pdf->Cell(20,5,'Lampiran',0,0,'L'); $pdf->Cell(70,5,': Satu berkas',0,1,'L');
		$pdf->Cell(20,5,'Perihal',0,0,'L'); $pdf->SetFont('Arial','B',12); $pdf->Cell(70,5,': Penetapan Penyedia Barang/Jasa',0,1,'L');
		$pdf->Ln(10);
		
		$pdf->SetFont('Arial','',12);
		$pdf->MultiCell(0,5,'Berdasarkan Berita Acara Hasil Pengadaan Langsung Nomor '.$nomorBAH->dknt_isi.', Evaluasi Administrasi, Evaluasi Teknis dan Penawaran Harga calon  Penyedia Barang/Jasa '.$d->pgd_perihal.' sebagaimana terlampir, maka Pejabat Pengadaan Barang/Jasa Satker Biro Umum menetapkan penyedia '.$d->pgd_perihal.' sebagai berikut :',0,'J');
		$pdf->Ln(5);
		$pdf->Cell(5); $pdf->Cell(70,5,'Nama Perusahaan',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(0,5,$d->spl_nama,0,'J');
		$pdf->Cell(5); $pdf->Cell(70,5,'Alamat Perusahaan',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(0,5,$d->spl_alamat,0,'J');
		$pdf->Cell(5); $pdf->Cell(70,5,'NPWP',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(0,5,$d->spl_NPWP,0,'J');
		$pdf->Cell(5); $pdf->Cell(70,5,'Harga Penawaran',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(0,5,'Rp.'.$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_pnr).',- ('.$pdf->Terbilang($d->pgd_jml_ssdh_ppn_pnr).')',0,'J');
		$pdf->Cell(5); $pdf->Cell(70,5,'Harga Negoisasi',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(0,5,'Rp.'.$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_fix).',- ('.$pdf->Terbilang($d->pgd_jml_ssdh_ppn_fix).')',0,'J');
		$pdf->Ln(5);
		$pdf->MultiCell(0,5,'Demikian disampaikan, atas perhatiannya diucapkan terima kasih.',0,'J');
		$pdf->Ln(10);
		$pdf->Cell(110);
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,2,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum Sekretariat Jenderal',0,2,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,2,'L');
		$pdf->Ln(15);
	   $pdf->Cell(110); $pdf->Cell(90,6,$d->pgd_nama_pejpeng,0,2,'L');
		
	$pdf->Output('surat penetapan '.$d->pgd_perihal.'.pdf','I');	
?>		