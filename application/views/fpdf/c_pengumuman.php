<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);

$pdf->AddPage();

//Header
		$pdf->Image(base_url().'assets/logokelautan.png',15,8,-400);
		//Arial bold 15
		$pdf->SetFont('Arial','B',16);
				$pdf->Cell(80);
		//judul
		$pdf->Cell(30,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Cell(30,6,'SEKRETARIAT Jenderal',0,2,'C');
		$pdf->Cell(30,6,'SATUAN KERJA BIRO UMUM',0,2,'C');
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(30,5,'JALAN MEDAN MERDEKA TIMUR NOMOR 16',0,2,'C');
		$pdf->Cell(30,5,'JAKARTA 10110,KOTAK POS 4130 JKP 10041',0,2,'C');
		$pdf->Cell(30,5,'TELEPON (021) 3519070, FAKSIMILE (021) 3520351',0,2,'C');
		$pdf->Ln(1);$pdf->Cell(70);$pdf->Cell(20,5,'LAMAN',0,0,'L');
		$pdf->SetFont('Arial','UI',14);
		$pdf->Cell(30,5,'www.kkp.go.id',0,2,'L');
		//buat garis horisontal
                $pdf->SetLineWidth(0.5);
		$pdf->Line(10,50,200,50);
		$pdf->SetLineWidth(1.5);
		$pdf->Line(10,52,200,52);
		$pdf->Ln(7);
		$pdf->SetFont('Arial','B',12);
	
		$pdf->Cell(190,6,'PENGUMUMAN PENYEDIA BARANG/JASA',0,2,'C');
		$pdf->MultiCell(190,6,  strtoupper($d->pgd_perihal),0,'C');
		$pdf->Cell(190,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Ln(5);
		$pdf->SetLineWidth(0.7);
		$pdf->Line(10,77,200,77);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(30); $pdf->Cell(30,6,'NOMOR',0,0,'L');$pdf->Cell(0,6,': '.$nopeng,0,1,'L');
		$pdf->Cell(30); $pdf->Cell(30,6,'TANGGAL',0,0,'L'); $pdf->Cell(0,6,': '.$pdf->tanggal("j M Y",$tanggalSPeng),0,2,'L');
		$pdf->SetFont('Arial','',12);
		$pdf->Ln(10);

		$pdf->MultiCell(0,5,'Berdasarkan penetapan Nomor '.$nopet->dknt_isi.', tanggal '.$pdf->tanggal("j M Y",$tglSP->dknt_isi).', dengan ini diumumkan bahwa penyedia '.$d->pgd_perihal.' adalah : ',0,'J');
		$pdf->Ln(5);
		$pdf->Cell(5); $pdf->Cell(70,5,'Nama Perusahaan',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(0,5,$d->spl_nama,0,'J');
		$pdf->Ln(3);
		$pdf->Cell(5); $pdf->Cell(70,5,'Alamat Perusahaan',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(0,5,$d->spl_alamat,0,'J');
		$pdf->Ln(3);
		$pdf->Cell(5); $pdf->Cell(70,5,'NPWP',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(0,5,$d->spl_NPWP,0,'J');
		$pdf->Ln(3);
		$pdf->Cell(5); $pdf->Cell(70,5,'Harga Penawaran',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(0,5,'Rp.'.$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_pnr).',- ('.$pdf->Terbilang($d->pgd_jml_ssdh_ppn_pnr).')',0,'J');
		$pdf->Ln(3);
		$pdf->Cell(5); $pdf->Cell(70,5,'Harga Negoisasi',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(0,5,'Rp.'.$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_fix).',- ('.$pdf->Terbilang($d->pgd_jml_ssdh_ppn_fix).')',0,'J');
		$pdf->Ln(5);
		$pdf->MultiCell(0,5,'Demikian pengumuman ini untuk diketahui, atas perhatiannya diucapkan terima kasih.',0,'J');
		$pdf->Ln(10);
		$pdf->Cell(110);
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,2,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum Sekretariat Jenderal',0,2,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,2,'L');
		$pdf->Ln(15);
	   $pdf->Cell(110); $pdf->Cell(90,6,$pejpeng->pgw_nama,0,2,'L');           
           
	$pdf->Output();	
?>		