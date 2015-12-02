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
		$pdf->Cell(30,6,'KEMENTRIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Cell(30,6,'SEKRETARIAT JENDRAL',0,2,'C');
		$pdf->Cell(30,6,'SATUAN KERJA BIRO UMUM',0,2,'C');
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(30,5,'JALAN MEDAN MERDEKA TIMUR NOMOR 16',0,2,'C');
		$pdf->Cell(30,5,'JAKARTA 10110,KOTAK POS 4130 JKP 10041',0,2,'C');
		$pdf->Cell(30,5,'TELEPON (021) 3519070, FAKSIMILE (021) 3520351',0,2,'C');
		$pdf->Ln(1);$pdf->Cell(70);$pdf->Cell(20,5,'LAMAN',0,0,'L');
		$pdf->SetFont('Arial','UI',14);
		$pdf->Cell(30,5,'www.kkp.go.id',0,2,'L');
		//buat garis horisontal
		$pdf->Line(15,50,200,50);
		$pdf->SetLineWidth(1.5);
		$pdf->Line(15,52,200,52);
		$pdf->Ln(7);
		
		$pdf->SetFont('Arial','',12);
	
		$pdf->Cell(190,6,'BERITA ACARA PEMASUKAN DAN PEMBUKAAN DOKUMEN PENAWARAN',0,2,'C');
		$pdf->MultiCell(190,6,'PENGADAAN LANGSUNG PEKERJAAN XXXXXXXX XXX XXXXXX XXXX XXXXX',0,'C');
		$pdf->Cell(190,6,'KEMENTRIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Ln(3);
		$pdf->Cell(190,6,'NOMOR : XX.XXX.X/XXX.X/XXX/XXXX',0,2,'C');
	
		$pdf->Ln(5);
		$pdf->MultiCell(190,5,'Pada hari ini, XXXX tanggal xxxxx xxxx bulan xxxxxx tahun xxxx, bertempat di xxxxx xxxxx xxxxxx xxxxxx xxxxx  xxxx berdasarkan surat undangan Pejabat Pengadaan Nomor xxxxxx/xxx.x/xx/xxxx tanggal xx xxxx xxxx, telah diadakan pemasukan dan pembukaan dokumen penawaran pengadaan langsung Pekerjaan xxxxx xxxxx xxxx xxxxx xxxxxx xxxxx xxxxx pada Tahun Anggaran xxxx.',0,'J');
		$pdf->Ln(5);
		$pdf->MultiCell(190,5,'Pihak Penyedia Barang / Jasa : xxxxx xxxxxx xxxxxxx',0,'J');
		$pdf->Ln(5);

		$pdf->Cell(5,5,'1.',0,0,'L'); $pdf->Cell(185,5,'Acara Pemasukan dan Pembukaan Dokumen Penawaran',0,2,'L');
									  $pdf->MultiCell(185,5,'Pemasukan Dokumen penawaran dimulai pukul xxxxx WIB diawalai dengan pengisian daftar hadir / absen dan dilanjutkan dengan pembukaan dokumen penawaran.',0,'L');
		$pdf->Ln(5);
		
		$pdf->Cell(5,5,'2.',0,0,'L'); $pdf->MultiCell(185,5,'Acara Pembukaan Dokumen penawaran diawali dengan memeriksa dokumen penawaran, sebelum dilakukan pembukaan, terlebih dahulu Pejabat Pengadaan meminta calon penyedia barang / jasa untuk ikut meneliti kelengkapan Dokumen Penawaran.',0,'L');
		$pdf->Ln(5);
		
		$pdf->Cell(5,5,'3.',0,0,'L'); $pdf->Cell(185,5,'Dokumen Penawaran',0,2,'L');
		$pdf->Ln(5);
		
		$pdf->SetLineWidth(0.2);
		$w = array(50,20,20,20,20,60);
		$pdf->SetWidths($w);
		//header
		$pdf->Cell($w[0],7,' ','LTR',0,'L',0); $pdf->Cell(80,7,'Dokumen Perusahaan',1,0,'C',0); $pdf->Cell($w[5],7,'','LRT',1,'c',0);
		$pdf->Cell($w[0],7,' ','LR',0,'L',0); $pdf->Cell($w[1],7,' ','LR',0,'L',0); $pdf->Cell($w[2],7,' ','LR',0,'L',0); $pdf->Cell($w[3],7,' ','LR',0,'L',0); $pdf->Cell($w[4],7,' ','LR',0,'L',0); $pdf->Cell($w[5],7,'','LR',1,'C',0);
		$pdf->Cell($w[0],7,'Nama','LR',0,'C',0); $pdf->Cell($w[1],7,' ','LR',0,'L',0); $pdf->Cell($w[2],7,' ','LR',0,'L',0); $pdf->Cell($w[3],7,' ','LR',0,'L',0); $pdf->Cell($w[4],7,' ','LR',0,'L',0); $pdf->Cell($w[5],7,'Nilai Penawaran','LR',1,'C',0);
		$pdf->Cell($w[0],7,'Perusahaan','LR',0,'C',0); $pdf->Cell($w[1],7,' ','LR',0,'L',0); $pdf->Cell($w[2],7,' ','LR',0,'L',0); $pdf->Cell($w[3],7,' ','LR',0,'L',0); $pdf->Cell($w[4],7,' ','LR',0,'L',0); $pdf->Cell($w[5],7,'','LR',1,'C',0);		
		$pdf->Cell($w[0],7,'','LBR',0,'L',0); $pdf->Cell($w[1],7,' ','LBR',0,'L',0); $pdf->Cell($w[2],7,' ','LBR',0,'L',0); $pdf->Cell($w[3],7,' ','LBR',0,'L',0); $pdf->Cell($w[4],7,' ','LBR',0,'L',0); $pdf->Cell($w[5],7,'','LBR',1,'C',0);
		/*srand(microtime()*1000000);

		$n=0;
		for($i=0;$i<4;$i++){
			$n++;
			$pdf->Row(array($n.'.',GenerateSentence(),GenerateSentence(),GenerateSentence())); 
			}
		$pdf->Ln(5);	
		*/
		$x=$pdf->getX();
		$y=$pdf->getY();
		$pdf->RotatedText($x+58,$y-10,'Surat',90);$pdf->RotatedText($x+63,$y-5,'Penawaran',90);
		$pdf->RotatedText($x+76,$y-10,'Daftar',90); $pdf->RotatedText($x+81,$y-7,'Kuantitas',90); $pdf->RotatedText($x+86,$y-6,'dan Harga',90);
		$pdf->RotatedText($x+97,$y-7,'Dokumen',90);	$pdf->RotatedText($x+102,$y-5,'Penawaran',90); $pdf->RotatedText($x+107,$y-10,'Teknis',90);
		$pdf->RotatedText($x+117,$y-7,'Dokumen',90);	$pdf->RotatedText($x+122,$y-11,'Isian',90); $pdf->RotatedText($x+128,$y-7,'Kualifikasi',90);
		
		for($i=0;$i<1;$i++){

			$pdf->Row(array(GenerateSentence(),$pdf->Image('checkmark.jpeg', $pdf->GetX()+55, $pdf->GetY()+3, 4),$pdf->Image('checkmark.jpeg', $pdf->GetX()+77, $pdf->GetY()+3, 4),$pdf->Image('checkmark.jpeg', $pdf->GetX()+99, $pdf->GetY()+3, 4),$pdf->Image('checkmark.jpeg', $pdf->GetX()+118, $pdf->GetY()+3, 4),GenerateSentence())); 
			}
		$pdf->Ln(5);
		//$pdf->Cell(90,6,$pdf->getY(),0,1,'L');
		if($pdf->getY()>228.00124) {
		$pdf->AddPage();	
		}
		$pdf->MultiCell(190,5,'Demikian Berita Acara Pemasukan dan Pembukaan Dokumen Penawaran pengadaan langsung Pekerjaan XXXXX xxxx xxxxx xx xxx xxxxxxx XXXXX dibuat untuk dapat dipergunakan sebagaimana mestinya.',0,'J');
		$pdf->Ln(5);
		$pdf->Cell(90,6,'Penyedia Barang / Jasa',0,0,'L');	$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,1,'L'); 
		$pdf->Cell(90,6,'XX XXXXXXX XXXXXXXX XXXX',0,0,'L');	$pdf->Cell(90,6,'Satker Biro Umum Setjen KKP',0,1,'L');
		$pdf->Cell(90,6,'Nama : xxxxx xxxxx xxxxx',0,1,'L');
		$pdf->Ln(5);
		$pdf->Cell(90,6,'TTD  :.....................',0,0,'L');	$pdf->Cell(90,6,'xxxx xxxxx xxxxx xxxxx xxxxx',0,1,'L');
		
	$pdf->Output();	
?>		