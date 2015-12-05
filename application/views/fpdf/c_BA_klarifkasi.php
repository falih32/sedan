<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);
$pdf->AddPage();

//Header
$tanggalK=$tglklarifikasi->dknt_isi;
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
	
		$pdf->Cell(0,6,'BERITA ACARA KLARIFIKASI DAN NEGOISASI HARGA',0,2,'C');
		$pdf->MultiCell(0,6,strtoupper($d->pgd_perihal),0,'C');
		$pdf->Cell(0,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Ln(3);
		$pdf->SetFont('Arial','UB',12);
		$pdf->Cell(0,6,'NOMOR : '.$nomor,0,2,'C');
		$pdf->Ln(3);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(0,6,'TANGGAL '.$pdf->tanggal("j M Y", $tanggalK),0,2,'C');
		$pdf->Ln(5);
		
		$pdf->MultiCell(0,5,'Pada hari ini, '.$pdf->tanggal("D",$tanggalK).' tanggal'.$pdf->Terbilang($pdf->tanggal("j",$tanggalK)).' bulan'.$pdf->tanggal(" M ",$tanggalK).'tahun'.$pdf->Terbilang($pdf->tanggal("Y",$tanggalK)).', bertempat di Kementerian Kelautan dan Perikanan Jalan Medan Merdeka Timur No.16 Jakarta Pusat Pejabat Pengadaan Barang/Jasa dan Petugas Pembantu Administrasi dilingkungan Biro Umum yang dibentuk berdasarkan Keputusan Pejabat Pembuat Komitmen Satuan Kerja Biro Umum Sekretariat Jenderal KKP Nomor: '.$nokepkuas.' tanggal '.$pdf->tanggal("j M Y",$tglkepkuas).' telah mengadakan Klarifikasi dan Negosiasi penawaran harga atas Pekerjaan '.$d->pgd_perihal.', yang diajukan oleh perusahaan yaitu '.$d->spl_nama.' yang beralamat di '.$d->spl_alamat.',dengan surat penawaran Nomor : '.$nosp.' tertanggal '.$pdf->tanggal("j M Y",$tglsp).', dengan harga penawaran sebesar Rp. '.$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_pnr).',- ('.$pdf->Terbilang($d->pgd_jml_ssdh_ppn_pnr).'rupiah ) sudah termasuk pajak.',0,'J');
		$pdf->Ln(5);
		$pdf->MultiCell(0,5,'Setelah diadakan penelitian serta penilaian bersama dengan seksama dan hasil negosiasi atas surat penawaran yang diajukan dapat diturunkan menjadi Rp. '.$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_fix).',- ('.$pdf->Terbilang($d->pgd_jml_ssdh_ppn_fix).'rupiah ), sehingga dapat diusulkan pengadaan langsung untuk melaksanakan pekerjaan tersebut.',0,'J');
		$pdf->Ln(5);
		$pdf->MultiCell(0,5,'Demikian Berita Acara  Klarifikasi dan Negosiasi Harga ini  dibuat untuk dapat dipergunakan seperlunya.',0,'J');
		$pdf->Ln(10);
		$pdf->Cell(90,6,'Setuju dan sanggup melaksanakan ',0,0,'L');	$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,1,'L'); 
		$pdf->Cell(90,6,'pekejaan sesuai dengan negosiasi',0,0,'L');	$pdf->Cell(90,6,'Satker Biro Umum',0,1,'L');
		$pdf->Cell(90,6,$d->spl_nama,0,0,'L');	$pdf->Cell(90,6,'Sekretariat Jenderal',0,1,'L');
		$pdf->Cell(90,6,'',0,0,'L');	$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,1,'L');
		$pdf->Ln(15);
	//	$pdf->SetFont('Arial','U',12);
		$pdf->Cell(90,6,$pwk,0,0,'L');	$pdf->SetFont('Arial','',12); $pdf->Cell(90,6,$pejpeng->pgw_nama,0,1,'L');
	//	$pdf->Cell(90,6,'XXXXXX',0,0,'L');

$pdf->AddPage();
//Header
$pdf->SetLineWidth(0.5);
		$pdf->Cell(80);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(30,6,'Lampiran Berita Acara Klarifikasi dan Negoisasi Harga',0,3,'C');
		$pdf->Cell(30,6,$d->pgd_perihal,0,3,'C');
		$pdf->Cell(30,6,'Setker Biro Umum Sekretariat Jendral Kementerian Kelautan dan Perikanan',0,3,'C');
		$pdf->Cell(30,6,'Nomor. '.$nomor,0,3,'C');
		$pdf->Ln(10);
		
		//header	
		$w = array(8,55,25,26,25,26,25);
		$pdf->SetWidths($w);
		$pdf->Cell($w[0],7,' ','LTR',0,'L',0); $pdf->Cell($w[1],7,'','LTR',0,'C',0); $pdf->Cell($w[2],7,'','LTR',0,'C',0); $pdf->Cell(51,7,'Harga Penawaran','LTR',0,'C',0); $pdf->Cell(51,7,'Harga Negoisasi','LRT',1,'C',0);
		$pdf->Cell($w[0],7,'No','LR',0,'c',0); $pdf->Cell($w[1],7,'Uraian Pekerjaan','LR',0,'C',0); $pdf->Cell($w[2],7,'Volume','LR',0,'C',0); $pdf->Cell($w[3],7,'Harga Satuan',1,0,'C',0); $pdf->Cell($w[4],7,'Jumlah',1,0,'C',0);$pdf->Cell($w[5],7,'Harga Satuan',1,0,'C',0); $pdf->Cell($w[6],7,'Jumlah',1,1,'C',0);		
		$pdf->Cell($w[0],7,'','LBR',0,'L',0); $pdf->Cell($w[1],7,'','LBR',0,'L',0); $pdf->Cell($w[2],7,'','LBR',0,'L',0); $pdf->Cell($w[3],7,'(Rp.)','LR',0,'C',0); $pdf->Cell($w[4],7,'(Rp.)','LR',0,'C',0);$pdf->Cell($w[5],7,'(Rp.)','LR',0,'C',0); $pdf->Cell($w[6],7,'(Rp.)','LBR',1,'C',0);
		
		$pdf->SetAligns('L');
		$no=0;
		foreach ($listpeng as $row) {
		$no++;	
			$pdf->Row(array($no,$row->dtp_pekerjaan,$row->dtp_volume.' '.$row->dtp_satuan,$pdf->formatrupiah($row->dtp_hargasatuan_pnr) ,$pdf->formatrupiah($row->dtp_jumlahharga_pnr),$pdf->formatrupiah($row->dtp_hargasatuan_fix) ,$pdf->formatrupiah($row->dtp_jumlahharga_fix))); 
		}
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,$pdf->formatrupiah($d->pgd_jml_sblm_ppn_pnr),1,0,'C',0);$pdf->Cell($w[5],7,'',1,0,'C',0); $pdf->Cell($w[6],7,$pdf->formatrupiah($d->pgd_jml_sblm_ppn_fix),1,1,'C',0);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'PPN 10%',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,$pdf->formatrupiah(0.1*$d->pgd_jml_sblm_ppn_pnr),1,0,'C',0);$pdf->Cell($w[5],7,'',1,0,'C',0); $pdf->Cell($w[6],7,$pdf->formatrupiah(0.1*$d->pgd_jml_sblm_ppn_fix),1,1,'C',0);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_pnr),1,0,'C',0);$pdf->Cell($w[5],7,'',1,0,'C',0); $pdf->Cell($w[6],7,$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_fix),1,1,'C',0);
		$pdf->Ln(6);
		
		$pdf->Cell(100,6,'Harga diatas sudah termasuk Pajak',0,3,'L');
		$pdf->Ln(5);

 
		$pdf->Cell(120,6,'',0,0,'L');$pdf->Cell(70,6,'Jakarta,'.$pdf->tanggal(" j M Y", $tanggalK),0,1,'L');
		$pdf->Cell(120,6,$d->spl_nama,0,0,'L');$pdf->Cell(70,6,'Pejabat Pembuat Komitmen',0,3,'L');
		$pdf->Cell(120,6,'',0,0,'L');$pdf->Cell(70,6,'Satker Biro Umum Setjen KKP',0,3,'L');
		$pdf->Ln(20); 
		$pdf->SetFont('Arial','U',11); $pdf->Cell(120,5,$pwk,0,0,'L'); $pdf->SetFont('Arial','',11); $pdf->Cell(70,5,$pejpeng->pgw_nama,0,1,'L');
		$pdf->Cell(130,5,'Direktur',0,3,'L');                
	$pdf->Output();	
?>		