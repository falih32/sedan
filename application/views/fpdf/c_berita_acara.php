<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);
$pdf->AddPage();
$tanggalP=$tglpembukaan->dknt_isi;
//Header
		$pdf->Image(base_url().'assets/logokelautan.png',15,8,-400);
		//Arial bold 15
		$pdf->SetFont('Arial','B',16);
				$pdf->Cell(80);
		//judul
		$pdf->Cell(30,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
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
		
		$pdf->SetFont('Arial','B',12);
	
		$pdf->Cell(0,5,'BERITA ACARA PEMASUKAN DAN PEMBUKAAN DOKUMEN PENAWARAN',0,2,'C');
		$pdf->MultiCell(0,5,'PENGADAAN LANGSUNG '.strtoupper($d->pgd_perihal),0,'C');
		$pdf->Cell(0,5,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Ln(1);
                $pdf->SetFont('Arial','BU',12);
		$pdf->Cell(0,5,'NOMOR :'.$nomor,0,2,'C');
                $pdf->SetFont('Arial','',12);
                $t=$pdf->tanggal(" j ",$tanggalP);
		$pdf->Ln(2);
		$pdf->MultiCell(0,5,'Pada hari ini, '.$pdf->tanggal("D",$tanggalP).' tanggal '.$pdf->Terbilang($pdf->tanggal("j",$tanggalP)).' bulan '.$pdf->tanggal(" M ",$tanggalP).' tahun '.$pdf->Terbilang($pdf->tanggal("Y",$tanggalP)).', bertempat di Kementerian Kelautan dan Perikanan Gedung Mina Bahari I Lantai 2 Jalan Medan Merdeka Timur No.16 Jakarta Pusat berdasarkan surat undangan Pejabat Pengadaan Nomor '.$noundangan->dknt_isi.' tanggal '.$pdf->tanggal("j M Y",$tglundangan->dknt_isi).', telah diadakan pemasukan dan pembukaan dokumen penawaran pengadaan langsung '.$d->pgd_perihal.' pada Tahun Anggaran '.date(" Y "),0,'J');
		$pdf->Ln(2);
		$pdf->MultiCell(0,5,'Pihak Penyedia Barang / Jasa : '.$d->spl_nama,0,'J');
		$pdf->Ln(2);

		$pdf->Cell(5,5,'1.',0,0,'L'); $pdf->Cell(185,5,'Acara Pemasukan dan Pembukaan Dokumen Penawaran',0,2,'L');
									  $pdf->MultiCell(185,5,'Pemasukan Dokumen penawaran dimulai pukul '.$pdf->tanggal("H:i",$d->pgd_wkt_awal_penawaran).' WIB diawalai dengan pengisian daftar hadir / absen dan dilanjutkan dengan pembukaan dokumen penawaran.',0,'L');
		$pdf->Ln(2);
		
		$pdf->Cell(5,5,'2.',0,0,'L'); $pdf->MultiCell(185,5,'Acara Pembukaan Dokumen penawaran diawali dengan memeriksa dokumen penawaran, sebelum dilakukan pembukaan, terlebih dahulu Pejabat Pengadaan meminta calon penyedia barang / jasa untuk ikut meneliti kelengkapan Dokumen Penawaran.',0,'L');
		$pdf->Ln(2);
		
		$pdf->Cell(5,5,'3.',0,0,'L'); $pdf->Cell(185,5,'Dokumen Penawaran',0,2,'L');
		$pdf->Ln(2);
		
		$pdf->SetLineWidth(0.2);
		$w = array(50,20,20,20,20,55);
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
		$cAngka = $pdf->Terbilang($d->pgd_jml_ssdh_ppn_pnr);
		$b = ucfirst(strtolower($cAngka));
		for($i=0;$i<1;$i++){

			$pdf->Row(array($d->spl_nama,$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+55, $pdf->GetY()+1, 4),$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+77, $pdf->GetY()+1, 4),$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+99, $pdf->GetY()+1, 4),$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+118, $pdf->GetY()+1, 4),'Rp. '.$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_pnr).',- ('.$b.'rupiah)')); 
			}
		$pdf->Ln(4);
		//$pdf->Cell(90,6,$pdf->getY(),0,1,'L');
		if($pdf->getY()>228.00124) {
		$pdf->AddPage();	
		}
		$pdf->MultiCell(0,5,'Demikian Berita Acara Pemasukan dan Pembukaan Dokumen Penawaran pengadaan langsung '.$d->pgd_perihal.' dibuat untuk dapat dipergunakan sebagaimana mestinya.',0,'J');
		$pdf->Ln(2);
		$pdf->Cell(90,6,'Penyedia Barang / Jasa',0,0,'L');	$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,1,'L'); 
		$pdf->Cell(90,6,$d->spl_nama,0,0,'L');	$pdf->Cell(90,6,'Satker Biro Umum Setjen KKP',0,1,'L');
		$pdf->Cell(90,6,'Nama : '.$pwk,0,1,'L');
		$pdf->Ln(2);
		$pdf->Cell(90,6,'TTD  :.....................',0,0,'L');	$pdf->Cell(90,6,$pejpeng->pgw_nama,0,1,'L');
                
$pdf->AddPage();
//Header
		$pdf->Image(base_url().'assets/logokelautan.png',15,8,-400);
		//Arial bold 15
		$pdf->SetFont('Arial','B',16);
				$pdf->Cell(80);
		//judul
		$pdf->Cell(30,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
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
		$pdf->Ln(8);
		$pdf->SetFont('Arial','',12);
		
		$pdf->MultiCell(0,5,'Daftar Hadir Peserta pengadaan langsung '.$d->pgd_perihal,0,'J');
		$pdf->Ln(5);

		$pdf->Cell(30,5,'Nomor',0,0,'L'); $pdf->Cell(3,5,':',0,0,'L'); $pdf->Cell(140,5,$nomor,0,1,'L');
		$pdf->Cell(30,5,'Tanggal',0,0,'L'); $pdf->Cell(3,5,':',0,0,'L'); $pdf->Cell(140,5,$pdf->tanggal("j M Y", $tanggalP),0,1,'L');
		$pdf->Ln(10);
		
		$pdf->SetLineWidth(0.2);
		$w = array(10,80,55,40);		
		$pdf->SetWidths($w);
		$header = array('No', 'Nama Perusahaan', 'Nama Yang Hadir','Tanda Tangan');
                $np = array($d->spl_nama, '', '');
                $p = array($pwk, '', '');
		$pdf->SetHeaders($header,$w);
		$n=0;
		for($i=0;$i<3;$i++){
			$n++;
			$pdf->Row1(array($n.'.',$np[$i],$p[$i],'')); 
			}
		$pdf->Ln(10);
		
		$pdf->Cell(105); 
		$pdf->Cell(100,6,'Pejabat Pengadaan Barang/Jasa',0,2,'L');
		$pdf->Cell(100,6,'Satker Biro Umum',0,2,'L');
		$pdf->Cell(100,6,'Sekretariat Jendral KKP',0,2,'L');
		$pdf->Ln(20);
		$pdf->Cell(105); 
		$pdf->Cell(100,10,$pejpeng->pgw_nama,0,3,'L');                
//-------------------------------------------------BA Evaluasi Administrasi-----------------------------------------------
$pdf->AddPage();

//Header
		$pdf->Image(base_url().'assets/logokelautan.png',15,8,-400);
		//Arial bold 15
		$pdf->SetFont('Arial','B',16);
				$pdf->Cell(80);
		//judul
		$pdf->Cell(30,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
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
				
		$pdf->SetLineWidth(0.2);
		$w = array(90,95);
		$pdf->SetWidths($w);
		$pdf->SetAligns('C');
		//header
		$pdf->SetFont('Arial','B',12);
			for($i=0;$i<1;$i++){
			$pdf->Row(array('Satuan Kerja Biro Umum Sekretariat Jendral Kementerian Kelautan dan Perikanan Tahun Anggaran '.date("Y"),'Berita Acara Evaluasi Administrasi')); 
			}

		//isi
		$pdf->SetAligns('L');
		$pdf->SetFont('Arial','',12);
		for($i=0;$i<1;$i++){
			$pdf->Row(array('Pekerjaan : '.$d->pgd_perihal,'Nomor   : '.$noevadministrasi.'
Tanggal : '.$pdf->tanggal("j M Y", $tanggalP))); 
			}
		$pdf->Ln(5);
		$pdf->MultiCell(0,5,'Pada hari ini, '.$pdf->tanggal("D",$tanggalP).' tanggal '.$pdf->Terbilang($pdf->tanggal("j",$tanggalP)).' bulan '.$pdf->tanggal(" M ",$tanggalP).' tahun '.$pdf->Terbilang($pdf->tanggal("Y",$tanggalP)).', yang bertanda tangan dibawah ini Pejabat Pengadaan Barang / Jasa Satker Biro Umum telah melaksanakan evaluasi administrasi terhadap 1 (satu) perusahaan yang memasukkan dokumen penawaran, dengan hasil berikut :',0,'J');
		$pdf->Ln(5);
		$w = array(10,70,75,30);
		$pdf->SetWidths($w);
		$pdf->SetAligns('C');
		$pdf->SetFont('Arial','B',12);
		//header
			for($i=0;$i<1;$i++){
			$pdf->Row1(array('No','Nama Perusahaan','Alamat','Keterangan')); 
			}

		//isi
		$pdf->SetAligns('L');
		$pdf->SetFont('Arial','',12);
		$n=0;
		for($i=0;$i<1;$i++){
		$n++;
			$pdf->Row1(array($n,$d->spl_nama,$d->spl_alamat,'Memenuhi Syarat')); 
			}
		$pdf->Ln(5);
		
		$pdf->MultiCell(0,5,'Demikian Berita Acara ini dibuat oleh Pejabat Pengadaan Barang / Jasa Satker Biro Umum Setjen KKP untuk dapat dipergunakan sebagaimana mestinya.',0,'J');
		$pdf->Ln(15);
		$pdf->Cell(100);
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,2,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum',0,2,'L');
		$pdf->Cell(90,6,'Sekretariat Jendral KKP',0,2,'L');
		$pdf->Ln(15);
		$pdf->Cell(100);
		$pdf->Cell(90,6,$pejpeng->pgw_nama,0,1,'L');   
                
$pdf->AddPage();

//Header
		$pdf->Image(base_url().'assets/logokelautan.png',15,8,-400);
		//Arial bold 15
		$pdf->SetFont('Arial','B',16);
				$pdf->Cell(80);
		//judul
		$pdf->Cell(30,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
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
		
		$pdf->SetFont('Arial','B',12);
	
		$pdf->Cell(0,6,'LAMPIRAN BERITA ACARA EVALUASI ADMINISTRASI',0,2,'C');
		$pdf->MultiCell(0,6, strtoupper($d->pgd_perihal),0,'C');
		$pdf->Cell(0,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Ln(5);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(0,6,'NOMOR : '.$noevadministrasi,0,2,'L');
		$pdf->Cell(0,6,'Tanggal  : '.$pdf->tanggal("j M Y", $tanggalP),0,2,'L');
		$pdf->Ln(5);
				
		$pdf->SetLineWidth(0.2);
		$w = array(8,38,31,36,27,25,20);
		$pdf->SetWidths($w);
		$a='C';
		$pdf->SetAligns($a);
		//header
		$pdf->SetFont('Arial','B',12);
			for($i=0;$i<1;$i++){

			$pdf->Row1(array('No','Nama Perusahaan','Penanda tanganan Direktur/Surat Kuasa','Harga Penawaran','Jangka Waktu Pelaksanaan','Bertanggal','Keterangan')); 
			}

		//isi
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('L');
			$n=0;
		for($i=0;$i<1;$i++){
		$n++;
			$pdf->Row1(array($n,$d->spl_nama,$pwk,'Rp.'.$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_pnr).',- ('.$b.'rupiah)',$d->pgd_lama_pekerjaan.' Hari Kalender','GenerateSentence()','Memenuhi Syarat')); 
			}
		$pdf->Ln(5);

		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,1,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum',0,1,'L');
		$pdf->Cell(90,6,'Setjen KKP',0,1,'L');
		$pdf->Ln(15);
		$pdf->Cell(90,6,$pejpeng->pgw_nama,0,1,'L');
                
//--------------------------------------------------------- Evaluasi Teknis--------------------------------------   
$pdf->AddPage();
//Header
		$pdf->Image(base_url().'assets/logokelautan.png',15,8,-400);
		//Arial bold 15
		$pdf->SetFont('Arial','B',16);
				$pdf->Cell(80);
		//judul
		$pdf->Cell(30,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
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
				
		$pdf->SetLineWidth(0.2);
		$w = array(90,95);
		$pdf->SetWidths($w);
		$pdf->SetAligns('C');
		//header
		$pdf->SetFont('Arial','B',12);
			for($i=0;$i<1;$i++){
			$pdf->Row1(array('Satuan Kerja Biro Umum Sekretariat Jendral Kementerian Kelautan dan Perikanan Tahun Anggaran '.date("Y"),'Berita Acara Evaluasi Teknis')); 
			}

		//isi
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('L');
		for($i=0;$i<1;$i++){
			$pdf->Row1(array('Pekerjaan : '.$d->pgd_perihal,'Nomor   : '.$noevateknis.'
Tanggal : '.$pdf->tanggal("j M Y", $tanggalP))); 
			}
		$pdf->Ln(5);
		$pdf->MultiCell(0,5,'Pada hari ini, '.$pdf->tanggal("D",$tanggalP).' tanggal '.$pdf->Terbilang($pdf->tanggal("j",$tanggalP)).' bulan '.$pdf->tanggal(" M ",$tanggalP).' tahun '.$pdf->Terbilang($pdf->tanggal("Y",$tanggalP)).', yang bertanda tangan dibawah ini Pejabat Pengadaan Barang / Jasa Satker Biro Umum telah melaksanakan evaluasi teknis terhadap 1 (satu) perusahaan yang memenuhi syarat evaluasi administrasi, dengan hasil berikut :',0,'J');
		$pdf->Ln(5);
		$w = array(10,40,45,45,45);
		$pdf->SetWidths($w);
		$pdf->SetAligns('C');
		//header
		$pdf->SetFont('Arial','B',12);
			for($i=0;$i<1;$i++){
			$pdf->Row1(array('No','Nama Perusahaan','Spesifikasi Teknis yang ditawarkan sesuai yang ditetapkan dalam dokumen pengadaan','Jadwal pelaksanaan pekerjaan yang ditawarkan tidak melampaui batas waktu sebagaimana tercantum dalam LDP','Identitas (jenis, type dan merk) yang ditawarkan sebagaimana tercantum dalam LDP')); 
			}

		//isi
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('L');
		$no=0;
//$pdf->Row(array($huruf[$i],$dkul[$i],$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+135, $pdf->GetY(), 4),'')); 

		for($i=0;$i<1;$i++){
			$no++;
			$pdf->Row1(array($no,$d->spl_nama,$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+70, $pdf->GetY()+1, 4),$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+115, $pdf->GetY()+1, 4),$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+160, $pdf->GetY()+1, 4))); 
			}
		$pdf->Ln(5);
		
		$pdf->MultiCell(0,5,'Demikian Berita Acara ini dibuat oleh Pejabat Pengadaan Barang / Jasa Satker Biro Umum Setjen KKP untuk dapat dipergunakan sebagaimana mestinya.',0,'J');
		$pdf->Ln(15);
		$pdf->Cell(100);
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,2,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum',0,2,'L');
		$pdf->Cell(90,6,'Sekretariat Jendral KKP',0,2,'L');
		$pdf->Ln(15);
		$pdf->Cell(100);
		$pdf->Cell(90,6,$pejpeng->pgw_nama,0,1,'L');            
//-----------------------------------------------------------Evaluasi Harga------------------------------------               
$pdf->AddPage();

//Header
		$pdf->Image(base_url().'assets/logokelautan.png',15,8,-400);
		//Arial bold 15
		$pdf->SetFont('Arial','B',16);
				$pdf->Cell(80);
		//judul
		$pdf->Cell(30,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
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
				
		$pdf->SetLineWidth(0.2);
		$w = array(90,95);
		$pdf->SetWidths($w);
		$pdf->SetAligns('C');
		//header
		$pdf->SetFont('Arial','B',12);
			for($i=0;$i<1;$i++){
			$pdf->Row(array('Satuan Kerja Biro Umum Sekretariat Jendral Kementerian Kelautan dan Perikanan Tahun Anggaran '.date("Y"),'Berita Acara Evaluasi Harga')); 
			}

		//isi
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('L');
		for($i=0;$i<1;$i++){
			$pdf->Row(array('Pekerjaan : '.$d->pgd_perihal,'Nomor   : '.$noevaharga.'
Tanggal : '.$pdf->tanggal("j M Y", $tanggalP))); 
			}
		$pdf->Ln(5);
		$pdf->MultiCell(0,5,'Pada hari ini, '.$pdf->tanggal("D",$tanggalP).' tanggal '.$pdf->Terbilang($pdf->tanggal("j",$tanggalP)).' bulan '.$pdf->tanggal(" M ",$tanggalP).' tahun '.$pdf->Terbilang($pdf->tanggal("Y",$tanggalP)).', yang bertanda tangan dibawah ini Pejabat Pengadaan Barang / Jasa Satker Biro Umum telah melaksanakan evaluasi harga terhadap 1 (satu) perusahaan yang memasukkan dokumen penawaran, dengan hasil berikut :',0,'J');
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
		$pdf->Cell(90,6,'Satker Biro Umum',0,2,'L');
		$pdf->Cell(90,6,'Sekretariat Jendral KKP',0,2,'L');
		$pdf->Ln(15);
		$pdf->Cell(100);
		$pdf->Cell(90,6,$pejpeng->pgw_nama,0,1,'L');                
 //-----------------------------------------------------kualifikasi--------------------------------------               
   $pdf->AddPage();

//Header
		$pdf->Image(base_url().'assets/logokelautan.png',15,8,-400);
		//Arial bold 15
		$pdf->SetFont('Arial','B',16);
				$pdf->Cell(80);
		//judul
		$pdf->Cell(30,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
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
				
		$pdf->SetLineWidth(0.2);
		$w = array(90,95);
		$pdf->SetWidths($w);
		$pdf->SetAligns('C');
		//header
		$pdf->SetFont('Arial','B',12);
			for($i=0;$i<1;$i++){
			$pdf->Row1(array('Satuan Kerja Biro Umum Sekretariat Jendral Kementerian Kelautan dan Perikanan Tahun Anggaran '.date("Y"),'Berita Acara Evaluasi Kualifikasi')); 
			}

		//isi
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('L');
		for($i=0;$i<1;$i++){
			$pdf->Row1(array('Pekerjaan : '.$d->pgd_perihal,'Nomor   : '.$noevakualifikasi.'
Tanggal : '.$pdf->tanggal("j M Y", $tanggalP))); 
			}
		$pdf->Ln(5);
		$pdf->MultiCell(0,5,'Pada hari ini, '.$pdf->tanggal("D",$tanggalP).' tanggal '.$pdf->Terbilang($pdf->tanggal("j",$tanggalP)).' bulan '.$pdf->tanggal(" M ",$tanggalP).' tahun '.$pdf->Terbilang($pdf->tanggal("Y",$tanggalP)).', yang bertanda tangan dibawah ini Pejabat Pengadaan Barang / Jasa Satker Biro Umum telah melaksanakan evaluasi kualifikasi terhadap 1 (satu) perusahaan yang memenuhi syarat evaluasi dokumen harga, dengan hasil sebagai berikut :',0,'J');
		$pdf->Ln(5);
		$w = array(10,105,35,35);
		$pdf->SetWidths($w);
		$pdf->SetAligns('C');
		//header
		$pdf->SetFont('Arial','B',12);
			for($i=0;$i<1;$i++){
			$pdf->Row1(array('No','Dokumentasi Kualifikasi','Ada','Tidak Ada')); 
			}
		//isi
		$dkul = array('Surat Izin Usaha sesuai LDP','Pernyataan/pengakuan tertulis bahwa badan usaha yang bersangkutan dan manajemen tidak dalam pengawasan pengadilan, tidak pailit, kegiatan usaha tidak sedang dihentikan dan/atau direksi yang bertindak untuk dan atas nama perusahaan sedang tidak dalam menjalani sanksi pidana','Pernyataan salah satu dan/atau semua pengurus dan badan usaha tidak masuk dalam daftar hitam','Memiliki NPWP','Domisili perusahaan masih berlaku','Akta pendirian','Pajak 3 bulan terakhir','Pakta Integritas','KTP Pengurus');
		$huruf= array('a','b','c','d','e','f','g','h','i');
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('L');
		for($i=0;$i<9;$i++){
			$pdf->Row1(array($huruf[$i],$dkul[$i],$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+130, $pdf->GetY()+1, 4),'')); 
			}
		$pdf->Ln(5);
		
		$pdf->MultiCell(0,5,'Demikian Berita Acara Evaluasi Kualifikasi beserta lampirannya ini dibuat oleh Pejabat Pengadaan Barang / Jasa Satker Biro Umum Setjen KKP untuk selanjutnya akan dilakukan Klasifikasi dan negosiasi.',0,'J');
		$pdf->Ln(10);
		$pdf->Cell(100);
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,2,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum',0,2,'L');
		$pdf->Cell(90,6,'Sekretariat Jendral KKP',0,2,'L');
		$pdf->Ln(10);
		$pdf->Cell(100);
		$pdf->Cell(90,6,$pejpeng->pgw_nama,0,1,'L');             
                
$pdf->AddPage();

//Header
		$pdf->Image(base_url().'assets/logokelautan.png',15,8,-400);
		//Arial bold 15
		$pdf->SetFont('Arial','B',16);
				$pdf->Cell(80);
		//judul
		$pdf->Cell(30,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
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
		
		$pdf->SetFont('Arial','B',12);
	
		$pdf->Cell(0,6,'LAMPIRAN BERITA ACARA EVALUASI KUALIFIKASI',0,2,'C');
		$pdf->MultiCell(0,6,  strtoupper($d->pgd_perihal),0,'C');
		$pdf->Cell(0,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Ln(5);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(0,6,'NOMOR : '.$noevakualifikasi,0,2,'L');
		$pdf->Cell(0,6,'Tanggal  : '.$pdf->tanggal("j M Y", $tanggalP),0,2,'L');
		$pdf->Ln(5);
				
		$pdf->SetLineWidth(0.2);
		$w = array(10,60,40,40);
		$pdf->SetWidths($w);
		$a='C';
		$pdf->SetAligns($a);
		//header
		$pdf->SetFont('Arial','B',12);
			for($i=0;$i<1;$i++){
			$pdf->Row1(array('No','Dokumen Kualifikasi','Kelengkapan','Keterangan')); 
			}

		//isi
                $dok=array('SIUP','TDP','PKP','Akte Perusahaan','NPWP','KTP Direksi','Pakta Integritas','Keterangan Domisili','Rekening Koran');        
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('L');
			$n=0;
		for($i=0;$i<9;$i++){
		$n++;
			$pdf->Row1(array($n,$dok[$i],'             Ada','memenuhi syarat')); 
			}
		$pdf->Ln(5);

		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,1,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum',0,1,'L');
		$pdf->Cell(90,6,'Setjen KKP',0,1,'L');
		$pdf->Ln(15);
		$pdf->Cell(90,6,$pejpeng->pgw_nama,0,1,'L');                
                
	$pdf->Output();	
?>		