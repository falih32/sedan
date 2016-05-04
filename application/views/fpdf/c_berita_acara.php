<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);
$pdf->AddPage();
$tanggalP=$tglpembukaan;
//Header

		$pdf->Ln(45);
		
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
		$pdf->MultiCell(0,5,'Pada hari ini, '.$pdf->tanggal("D",$tanggalP).' tanggal '.$pdf->Terbilang($pdf->tanggal("j",$tanggalP)).' bulan '.$pdf->tanggal(" M ",$tanggalP).' tahun '.$pdf->Terbilang($pdf->tanggal("Y",$tanggalP)).', bertempat di Kementerian Kelautan dan Perikanan Gedung Mina Bahari I Lantai 2 Jalan Medan Merdeka Timur No.16 Jakarta Pusat berdasarkan surat undangan Pejabat Pengadaan Nomor '.$noundangan->dknt_isi.' tanggal '.$pdf->tanggal("j M Y",$tglundangan->dknt_isi).', telah diadakan pemasukan dan pembukaan dokumen penawaran pengadaan langsung '.$d->pgd_perihal.' pada Tahun Anggaran '.$pdf->tanggal("Y",$tanggalP),0,'J');
		$pdf->Ln(2);
		$pdf->MultiCell(0,5,'Pihak Penyedia Barang / Jasa : '.$d->spl_nama,0,'J');
		$pdf->Ln(2);

		$pdf->Cell(5,5,'1.',0,0,'L'); $pdf->Cell(185,5,'Acara Pemasukan dan Pembukaan Dokumen Penawaran',0,2,'L');
									  $pdf->MultiCell(185,5,'Pemasukan Dokumen penawaran dimulai pukul '.$pdf->tanggal("H:i",$d->pgd_wkt_awal_penawaran).' WIB diawali dengan pengisian daftar hadir / absen dan dilanjutkan dengan pembukaan dokumen penawaran.',0,'L');
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
	
		$x=$pdf->getX();
		$y=$pdf->getY();
		$pdf->RotatedText($x+58,$y-10,'Surat',90);$pdf->RotatedText($x+63,$y-5,'Penawaran',90);
		$pdf->RotatedText($x+76,$y-10,'Daftar',90); $pdf->RotatedText($x+81,$y-7,'Kuantitas',90); $pdf->RotatedText($x+86,$y-6,'dan Harga',90);
		$pdf->RotatedText($x+97,$y-7,'Dokumen',90);	$pdf->RotatedText($x+102,$y-5,'Penawaran',90); $pdf->RotatedText($x+107,$y-10,'Teknis',90);
		$pdf->RotatedText($x+117,$y-7,'Dokumen',90);	$pdf->RotatedText($x+122,$y-11,'Isian',90); $pdf->RotatedText($x+128,$y-7,'Kualifikasi',90);
		$cAngka = $pdf->Terbilang($d->pgd_jml_ssdh_ppn_pnr);
		$b = ucfirst(strtolower($cAngka));
		for($i=0;$i<1;$i++){

			$pdf->Row1(array($d->spl_nama,$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+55, $pdf->GetY()+1, 4),$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+77, $pdf->GetY()+1, 4),$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+99, $pdf->GetY()+1, 4),$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+118, $pdf->GetY()+1, 4),'Rp. '.$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_pnr).',- ('.$b.'rupiah)')); 
			}
		$pdf->Ln(4);
		//$pdf->Cell(90,6,$pdf->getY(),0,1,'L');
	
		$pdf->MultiCell(0,5,'Demikian Berita Acara Pemasukan dan Pembukaan Dokumen Penawaran pengadaan langsung '.$d->pgd_perihal.' dibuat untuk dapat dipergunakan sebagaimana mestinya.',0,'J');
		$pdf->Ln(2);
                if($pdf->getY()>250) {
		$pdf->AddPage();	
		}
		$pdf->Cell(90,6,'Penyedia Barang / Jasa',0,0,'L');	$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,1,'L'); 
		$pdf->Cell(90,6,$d->spl_nama,0,0,'L');	$pdf->Cell(90,6,'Satker Biro Umum Setjen KKP',0,1,'L');
		$pdf->Cell(90,6,'Nama : '.$d->pgd_perwakilan_spl,0,1,'L');
		$pdf->Ln(2);
		$pdf->Cell(90,6,'TTD  :.....................',0,0,'L');	$pdf->Cell(90,6,$d->pgd_nama_pejpeng,0,1,'L');
                
$pdf->AddPage();
//Header
		$pdf->Ln(45);
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
                $p = array($d->pgd_perwakilan_spl, '', '');
		$pdf->SetHeaders($header,$w);
		$n=0;
		for($i=0;$i<3;$i++){
			$n++;
			$pdf->Row1(array($n.'.',$np[$i],$p[$i],'')); 
			}
		$pdf->Ln(10);
		
		$pdf->Cell(105); 
		$pdf->Cell(100,6,'Pejabat Pengadaan Barang/Jasa',0,2,'L');
		$pdf->Cell(100,6,'Satker Biro Umum Sekretariat Jenderal',0,2,'L');
		$pdf->Cell(100,6,'Kementerian Kelautan dan Perikanan',0,2,'L');
		$pdf->Ln(20);
		$pdf->Cell(105); 
		$pdf->Cell(100,10,$d->pgd_nama_pejpeng,0,3,'L');                
	$pdf->Output('BA pemasukan & pembukaan dok pnr '.$d->pgd_perihal.'.pdf','I');	
?>		