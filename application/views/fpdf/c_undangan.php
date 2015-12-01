<?php

$pdf=new PDF_MC_Table();
$pdf->AddPage();
$pdf->SetMargins(15,10,10);
$pdf->SetAutoPageBreak(5);
//Header
		$pdf->Image(base_url().'assets/logokelautan.png',15,8,-400);
		//Arial bold 15
		$pdf->SetFont('Arial','B',14);
				$pdf->Cell(85);
		//judul
		$pdf->Cell(30,6,'KEMENTRIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Cell(30,6,'SEKRETARIAT JENDRAL',0,2,'C');
		$pdf->Cell(30,6,'SATUAN KERJA BIRO UMUM',0,2,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(30,5,'JALAN MEDAN MERDEKA TIMUR NOMOR 16',0,2,'C');
		$pdf->Cell(30,5,'JAKARTA 10110,KOTAK POS 4130 JKP 10041',0,2,'C');
		$pdf->Cell(30,5,'TELEPON (021) 3519070, FAKSIMILE (021) 3520351',0,2,'C');
		$pdf->Ln(1);$pdf->Cell(70);$pdf->Cell(20,5,'LAMAN',0,0,'L');
		$pdf->SetFont('Arial','UI',12);
		$pdf->Cell(30,5,'www.kkp.go.id',0,2,'L');
		//buat garis horisontal
		$pdf->Line(15,50,200,50);
		$pdf->SetLineWidth(1.5);
		$pdf->Line(15,52,200,52);
		
		$pdf->Ln(7);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(20,5,'Nomor',0,0,'L'); $pdf->Cell(100,5,': xxxxxx/PPK.5/XX/XXXX',0,0,'L'); $pdf->Cell(40,5,'Jakarta, XX XXXX XXXX',0,1,'L');
		$pdf->Cell(20,5,'Lampiran',0,0,'L'); $pdf->Cell(70,5,': x(xxxx) berkas',0,2,'L');
		$pdf->Ln(3);
		
		$pdf->Cell(30,5,'Kepada Yth.',0,2,'L');
		$pdf->Cell(100,5,'xxxxxxxxx xxxx xxxxx',0,2,'L');
		$pdf->Cell(100,5,'di Jakarta',0,2,'L');
		$pdf->Ln(3);
		$pdf->Cell(20,5,'Perihal :',0,0,'L'); $pdf->MultiCell(0,5,'Pengadaan Langsung Untuk Paket Pekerjaan xxxxxxxxxxxx xxxxxxxxxxxxx xxxxxxxxx xxxxxx pada Satker Biro Umum Setjen KKP Tahun Anggaran xxxx',0,'L');
											 
		$pdf->Ln(3);
		$pdf->MultiCell(0,5,'Dengan ini Saudara kami undang untuk mengikuti proses Pengadaan Langsung paket Pekerjaan xxxxxxxx sebagai berikut :',0,'J');
		$pdf->Ln(3);

		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(5,5,'1.',0,0,'L'); $pdf->Cell(100,5,'Paket Pekerjaan',0,2,'L'); $pdf->SetFont('Arial','',11);
									  $pdf->Cell(45,5,'Nama paket pekerjaan',0,0,'L'); $pdf->Cell(3,5,':',0,0,'L'); $pdf->MultiCell(0,5,'Pekerjaan xxxxx xxxx xxxxx xxxxx xxxx xxxxxxx xxxxxxxxxxxx xxxxxxxxxx xxxxxxxxxx xxxxxxxxx xxxxxx',0,'L');
									  $pdf->Cell(5); $pdf->Cell(45,5,'Lingkup Pekerjaan',0,0,'L'); $pdf->Cell(3,5,':',0,0,'L'); $pdf->Cell(0,5,'Kementrian Kelautan dan Perikanan',0,1,'L');
									  $pdf->Cell(5); $pdf->Cell(45,5,'Nilai total HPS',0,0,'L'); $pdf->Cell(3,5,':',0,0,'L'); $pdf->MultiCell(0,5,'Rp. xxxxxxxxxxxxxxx,- (xxxxxxxx xxxxxx xxxxx xxxxxxx xxxxxx xxxxxx xxxxxx xxxxxxx xxxxxx xxxxxx)',0,'L');
									  $pdf->Cell(5); $pdf->Cell(45,5,'Sumber pendanaan',0,0,'L'); $pdf->Cell(3,5,':',0,0,'L'); $pdf->Cell(0,5,'xxxx xxxxx xxxx xxxxx',0,1,'L');
		$pdf->Ln(3);
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(5,5,'2.',0,0,'L'); $pdf->Cell(100,5,'Pelaksanaan Pengadaan',0,2,'L'); $pdf->SetFont('Arial','',11);
									  $pdf->Cell(45,5,'Tempat dan alamat',0,0,'L'); $pdf->Cell(3,5,':',0,0,'L'); $pdf->MultiCell(0,5,'xxxxxxxx xxxxx xxxx xxxxx xxxxx xxxx xxxxxxx xxxxxxxxxxxx xxxxxxxxxx xxxxxxxxxx xxxxxxxxx xxxxxx',0,'L');
									  $pdf->Cell(5); $pdf->Cell(45,5,'Telepon/Fax',0,0,'L'); $pdf->Cell(3,5,':',0,0,'L'); $pdf->Cell(0,5,'(021) 3519070 / (021) 3520351',0,1,'L');
									  $pdf->Cell(5); $pdf->Cell(45,5,'Website',0,0,'L'); $pdf->Cell(3,5,':',0,0,'L'); $pdf->SetFont('Arial','U',11); $pdf->Cell(0,5,'www.kkp.go.id',0,2,'L');				
		$pdf->Ln(3);
		
		$pdf->SetFont('Arial','',11);
		$pdf->MultiCell(0,5,'Saudara diminta untuk memasukkan penawaran administrasi, teknis dan harga, secara langsung sesuai dengan jadwal pelaksanaan sebagai berikut :',0,'J');
		$pdf->Ln(3);
		$pdf->SetLineWidth(0.2);
		
		$w = array(10,100,40,35);
		$pdf->SetWidths($w);
		$header = array('No', 'Kegiatan', 'Hari/Tanggal','Waktu');
                $kegiatan= array('Pemasukan Dokumen Penawaranxxxxxxxxxxxxxxxxxxxxxxxxxxxxx','Pembukaan Dokumen Penawaran', 'Klarifikasi Teknis dan Negoisasi Harga', 'Penandatanganan SPK');
		$pdf->SetHeaders($header,$w);
		$n=0;
		for($i=0;$i<4;$i++){
			$n++;
			$pdf->Row1(array($n.'.',$kegiatan[$i],'xxxxxxxxxxxxxx','xxxxxxxxxxxxxx')); 
			}
		$pdf->Ln(3);	
		$pdf->MultiCell(0,5,'Apabila Saudara butuh keterangan dan penjelasan lebih lanjut, dapat menghubungi kami sesuai alamat tersebut di atas sampai dengan batas akhir pemasukan Dokumen Penawaran.',0,'J');
		$pdf->Ln(3);
		$pdf->MultiCell(0,5,'Demikian disampaikan untuk diketahui.',0,'J');
		$pdf->Ln(3);
		$pdf->Cell(100,6,'Pejabat Pengadaan pada Satuan Kerja Biro Umum',0,2,'L');
		$pdf->Cell(100,6,'Setjen Kementrian Kelautan dan Perikanan',0,2,'L');
		$pdf->Ln(11); 
		$pdf->Cell(100,10,'MAS NOPA',0,3,'L');
		
	$pdf->Output();	
?>		