<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);
$pdf->AddPage();

$tanggalK=$tglklarifikasi->dknt_isi;
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
		$pdf->Line(15,50,200,50);
		$pdf->SetLineWidth(1.5);
		$pdf->Line(15,52,200,52);
		$pdf->Ln(7);
		
		$pdf->SetFont('Arial','B',12);
	
		$pdf->Cell(0,6,'BERITA ACARA HASIL PENGADAAN LANGSUNG',0,2,'C');
		$pdf->MultiCell(0,6,strtoupper($d->pgd_perihal),0,'C');
		$pdf->Cell(0,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Ln(3);
		$pdf->SetFont('Arial','UB',12);
		$pdf->Cell(0,6,'NOMOR : '.$nomorBAH,0,2,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Ln(10);
		
		//$pdf->MultiCell(190,5,'Pada hari ini, '.$pdf->tanggal("D",$tanggalK).' tanggal'.$pdf->Terbilang($pdf->tanggal("j",$tanggalK)).' bulan'.$pdf->tanggal(" M ",$tanggalK).'tahun'.$pdf->Terbilang($pdf->tanggal("Y",$tanggalK)).', bertempat di Kementerian Kelautan dan Perikanan Jalan Medan Merdeka Timur No.16 Jakarta Pusat, berdasarkan Berita Acara Pemasukan dan Pembukaan Dokumen Penawaran Pengadaan Langsung Pekerjaan '.$d->pgd_perihal.' Nomor : '.$noBAPemasukan->dknt_isi.' Tanggal '.$pdf->tanggal("j M Y",$tglpembukaan->dknt_isi).', Pejabat Pengadaan Barang/Jasa Satker Biro Umum telah melaksanakan evaluasi administrasi, teknis, harga dan penilaian kualifikasi serta negosiasi harga terhadap dokumen penawaran pekerjaan tersebut diatas dengan hasil sebagai berikut :',0,'J');
		$pdf->Ln(5);
		$pdf->Cell(5,5,'1.',0,0,'L'); $pdf->MultiCell(0,5,'Nama Calon penyedia Barang / Jasa : '.$d->spl_nama,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(5,5,'2.',0,0,'L'); $pdf->MultiCell(0,5,'Evaluasi Administrasi terhadap penawaran yang diajukan oleh Calon penyedia Barang / Jasa '.$d->spl_nama.' berdasarkan ketentuan yang tercantum dalam dokumen pengadaan langsung telah memenuhi persyaratan administrasi dan selanjutnya dilakukan Evaluasi Teknis.',0,'J');
		$pdf->Ln(5);
		$pdf->Cell(5,5,'3.',0,0,'L'); $pdf->MultiCell(0,5,'Evaluasi Teknis dilaksanakan terhadap penawaran yang diajukan oleh Calon penyedia Barang / Jasa '.$d->spl_nama.'berdasarkan ketentuan yang tercantum dalam dokumen pengadaan langsung telah memenuhi persyaratan teknis dan selanjutnya dilakukan Evaluasi Harga.',0,'J');
		$pdf->Ln(5);
		$pdf->Cell(5,5,'4.',0,0,'L'); $pdf->MultiCell(0,5,'Evaluasi Harga dilaksanakan terhadap penawaran yang diajukan oleh Calon penyedia Barang / Jasa '.$d->spl_nama.' berdasarkan ketentuan yang tercantum dalam dokumen pengadaan langsung dan memperhatikan hasil evaluasi administrasi dan teknis serta membandingkan dengan Harga Perkiraan Sendiri (HPS), harga penawaran dapat dipertanggungjawabkan secara responsif dan selanjutnya dilakukan negosiasi harga terhadap penawaran dari Calon penyedia Barang / Jasa.',0,'J');		
		$pdf->Ln(5);
		$pdf->Cell(5,5,'5.',0,0,'L'); $pdf->MultiCell(0,5,'Setelah dilakukan Evaluasi Harga selanjutnya akan dilakukan negosiasi harga terhadap penawaran dari Calon penyedia Barang / Jasa '.$d->spl_nama.'.',0,'J');
		$pdf->Ln(5);
		$pdf->Cell(5,5,'6.',0,0,'L'); $pdf->MultiCell(0,5,'Penawaran hasil negosiasi harga terhadap Dokumen Penawaran dari '.$d->spl_nama.' untuk Pekerjaan '.$d->pgd_perihal.'  adalah sebagai berikut :',0,'J');
		$pdf->Ln(5);
		$pdf->Cell(5); $pdf->Cell(70,5,'Nama Perusahaan',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(0,5,$d->spl_nama,0,'J');
		$pdf->Cell(5); $pdf->Cell(70,5,'Alamat Perusahaan',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(0,5,$d->spl_alamat,0,'J');
		$pdf->Cell(5); $pdf->Cell(70,5,'NPWP',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(0,5,$d->spl_NPWP,0,'J');
		$pdf->Ln(5);
		$w = array(5,70,5,110);
		$pdf->SetWidths($w);
		$a=array('Harga Penawaran Sebelum Negoisasi','Harga Penawaran Setelah Negoisasi');
		$isi=array('Rp.'.$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_pnr).',- ('.$pdf->Terbilang($d->pgd_jml_ssdh_ppn_pnr).')','Rp.'.$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_fix).',- ('.$pdf->Terbilang($d->pgd_jml_ssdh_ppn_fix).')');
		for($i=0;$i<2;$i++){
			$pdf->RowNoLines(array('',$a[$i],':',$isi[$i])); 
			}
		$pdf->Ln(5);
		$pdf->MultiCell(0,5,'Selanjutnya akan dilaporkan kepada Pejabat Pembuat Komitmen sebagai bahan Penerbitan Surat Perintah Kerja (SPK).',0,'J');
		$pdf->MultiCell(0,5,'Demikian Berita Acara Hasil Pengadaan Langsung (BAHPL) dibuat untuk digunakan sebagaimana mestinya.',0,'J');
		$pdf->Ln(10);
		$pdf->Cell(110);
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,2,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum',0,2,'L');
		$pdf->Cell(90,6,'Sekretariat Jenderal',0,2,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,2,'L');
		$pdf->Ln(15);
	   $pdf->Cell(110); $pdf->Cell(90,6,$pejpeng->pgw_nama,0,2,'L');
		
//---------------------------------------------Penetapan----------------------------------------------------------------------------------

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
		$pdf->Line(15,50,200,50);
		$pdf->SetLineWidth(1.5);
		$pdf->Line(15,52,200,52);
		$pdf->Ln(7);
		
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(20,5,'Nomor',0,0,'L'); $pdf->Cell(100,5,': '.$nopet,0,0,'L'); $pdf->Cell(40,5,'Jakarta, '.$pdf->tanggal("j M Y",$tglklarifikasi->dknt_isi),0,1,'L');
		$pdf->Cell(20,5,'Sifat',0,0,'L'); $pdf->Cell(70,5,': Biasa',0,1,'L');
		$pdf->Cell(20,5,'Lampiran',0,0,'L'); $pdf->Cell(70,5,': Satu berkas',0,1,'L');
		$pdf->Cell(20,5,'Perihal',0,0,'L'); $pdf->SetFont('Arial','B',12); $pdf->Cell(70,5,': Penetapan Penyedia Barang/Jasa',0,1,'L');
		$pdf->Ln(10);
		
		$pdf->SetFont('Arial','',12);
		$pdf->MultiCell(0,5,'Berdasarkan Berita Acara Hasil Pengadaan Langsung Nomor '.$nomorBAH.', Evaluasi Administrasi, Evaluasi Teknis dan Penawaran Harga calon  Penyedia Barang/Jasa '.$d->pgd_perihal.' sebagaimana terlampir, maka Pejabat Pengadaan Barang/Jasa Satker Biro Umum menetapkan penyedia '.$d->pgd_perihal.' sebagai berikut :',0,'J');
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
		$pdf->Cell(90,6,'Satker Biro Umum',0,2,'L');
		$pdf->Cell(90,6,'Sekretariat Jenderal',0,2,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,2,'L');
		$pdf->Ln(15);
	   $pdf->Cell(110); $pdf->Cell(90,6,$pejpeng->pgw_nama,0,2,'L');
//-------------------------------------------------------------------penetapan--------------------------------------------------------------
           
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
		$pdf->Cell(30); $pdf->Cell(30,6,'TANGGAL',0,0,'L'); $pdf->Cell(0,6,': '.$pdf->tanggal("j M Y",$tglklarifikasi->dknt_isi),0,2,'L');
		$pdf->SetFont('Arial','',12);
		$pdf->Ln(10);

		$pdf->MultiCell(0,5,'Berdasarkan penetapan Nomor '.$nopet.', tanggal '.$pdf->tanggal("j M Y",$tglklarifikasi->dknt_isi).', dengan ini diumumkan bahwa penyedia '.$d->pgd_perihal.' adalah : ',0,'J');
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
		$pdf->Cell(90,6,'Satker Biro Umum',0,2,'L');
		$pdf->Cell(90,6,'Sekretariat Jenderal',0,2,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,2,'L');
		$pdf->Ln(15);
	   $pdf->Cell(110); $pdf->Cell(90,6,$pejpeng->pgw_nama,0,2,'L');           
           
	$pdf->Output();	
?>		