<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);
$pdf->AddPage();

//Header
		
		$pdf->Ln(45);
		
		$pdf->SetFont('Arial','B',12);
	
		$pdf->Cell(0,6,'BERITA ACARA HASIL PENGADAAN LANGSUNG',0,2,'C');
		$pdf->MultiCell(0,6,strtoupper($d->pgd_perihal),0,'C');
		$pdf->Cell(0,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Ln(3);
		$pdf->SetFont('Arial','UB',12);
		$pdf->Cell(0,5,'NOMOR : '.$nomorBAH,0,2,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Ln(5);
		$pdf->MultiCell(0,5,'Pada hari ini, '.$pdf->tanggal("D",$tanggalH).' tanggal '.$pdf->Terbilang($pdf->tanggal("j",$tanggalH)).' bulan '.$pdf->tanggal(" M ",$tanggalH).' tahun '.$pdf->Terbilang($pdf->tanggal("Y",$tanggalH)).',bertempat di Kementerian Kelautan dan Perikanan Jalan Medan Merdeka Timur No.16 Jakarta Pusat, berdasarkan Berita Acara Pemasukan dan Pembukaan Dokumen Penawaran Pengadaan Langsung Pekerjaan '.$d->pgd_perihal.' Nomor : '.$noBAPemasukan->dknt_isi.' Tanggal '.$pdf->tanggal("j M Y",$tglBAP->dknt_isi).', Pejabat Pengadaan Barang/Jasa Satker Biro Umum telah melaksanakan evaluasi administrasi, teknis, harga dan penilaian kualifikasi serta negosiasi harga terhadap dokumen penawaran pekerjaan tersebut diatas dengan hasil sebagai berikut :',0,'J');
		$pdf->Ln(5);
		$pdf->Cell(5,5,'1.',0,0,'L'); $pdf->MultiCell(0,5,'Nama Calon penyedia Barang / Jasa : '.$d->spl_nama,0,'L');
		$pdf->Ln(2);
		$pdf->Cell(5,5,'2.',0,0,'L'); $pdf->MultiCell(0,5,'Evaluasi Administrasi terhadap penawaran yang diajukan oleh Calon penyedia Barang / Jasa '.$d->spl_nama.' berdasarkan ketentuan yang tercantum dalam dokumen pengadaan langsung telah memenuhi persyaratan administrasi dan selanjutnya dilakukan Evaluasi Teknis.',0,'J');
		$pdf->Ln(2);
		$pdf->Cell(5,5,'3.',0,0,'L'); $pdf->MultiCell(0,5,'Evaluasi Teknis dilaksanakan terhadap penawaran yang diajukan oleh Calon penyedia Barang / Jasa '.$d->spl_nama.' berdasarkan ketentuan yang tercantum dalam dokumen pengadaan langsung telah memenuhi persyaratan teknis dan selanjutnya dilakukan Evaluasi Harga.',0,'J');
		$pdf->Ln(2);
		$pdf->Cell(5,5,'4.',0,0,'L'); $pdf->MultiCell(0,5,'Evaluasi Harga dilaksanakan terhadap penawaran yang diajukan oleh Calon penyedia Barang / Jasa '.$d->spl_nama.' berdasarkan ketentuan yang tercantum dalam dokumen pengadaan langsung dan memperhatikan hasil evaluasi administrasi dan teknis serta membandingkan dengan Harga Perkiraan Sendiri (HPS), harga penawaran dapat dipertanggungjawabkan secara responsif dan selanjutnya dilakukan negosiasi harga terhadap penawaran dari Calon penyedia Barang / Jasa.',0,'J');		
		$pdf->Ln(2);
		$pdf->Cell(5,5,'5.',0,0,'L'); $pdf->MultiCell(0,5,'Setelah dilakukan Evaluasi Harga selanjutnya akan dilakukan negosiasi harga terhadap penawaran dari Calon penyedia Barang / Jasa '.$d->spl_nama.'.',0,'J');
		$pdf->Ln(2);
		$pdf->Cell(5,5,'6.',0,0,'L'); $pdf->MultiCell(0,5,'Penawaran hasil negosiasi harga terhadap Dokumen Penawaran dari '.$d->spl_nama.' untuk Pekerjaan '.$d->pgd_perihal.'  adalah sebagai berikut :',0,'J');
		$pdf->Ln(2);
		$pdf->Cell(5); $pdf->Cell(70,5,'Nama Perusahaan',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(0,5,$d->spl_nama,0,'J');
		$pdf->Cell(5); $pdf->Cell(70,5,'Alamat Perusahaan',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(0,5,$d->spl_alamat,0,'J');
		$pdf->Cell(5); $pdf->Cell(70,5,'NPWP',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(0,5,$d->spl_NPWP,0,'J');
		$pdf->Ln(2);
		$w = array(5,70,5,110);
		$pdf->SetWidths($w);
                if($pdf->getY()>256) {
		$pdf->AddPage();	
		}
		$a=array('Harga Penawaran Sebelum Negoisasi','Harga Penawaran Setelah Negoisasi');
		$isi=array('Rp.'.$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_pnr).',- ('.$pdf->Terbilang($d->pgd_jml_ssdh_ppn_pnr).')','Rp.'.$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_fix).',- ('.$pdf->Terbilang($d->pgd_jml_ssdh_ppn_fix).')');
		for($i=0;$i<2;$i++){
			$pdf->RowNoLines(array('',$a[$i],':',$isi[$i])); 
			}
		$pdf->Ln(2);
		$pdf->MultiCell(0,5,'Selanjutnya akan dilaporkan kepada Pejabat Pembuat Komitmen sebagai bahan Penerbitan Surat Perintah Kerja (SPK).',0,'J');
		$pdf->MultiCell(0,5,'Demikian Berita Acara Hasil Pengadaan Langsung (BAHPL) dibuat untuk digunakan sebagaimana mestinya.',0,'J');
		$pdf->Ln(5);
		$pdf->Cell(110);
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,2,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum Sekretariat Jenderal',0,2,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,2,'L');
		$pdf->Ln(15);
	   $pdf->Cell(110); $pdf->Cell(90,6,$d->pgd_nama_pejpeng,0,2,'L');
		
           
	$pdf->Output('BA hasil pengadaan '.$d->pgd_perihal.'.pdf','I');	
?>		