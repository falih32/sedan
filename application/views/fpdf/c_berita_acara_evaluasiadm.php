<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);
$pdf->AddPage();
$tanggalP=$tglpembukaan;
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
			$pdf->Row1(array('Satuan Kerja Biro Umum Sekretariat Jenderal Kementerian Kelautan dan Perikanan Tahun Anggaran '.$pdf->tanggal("Y",$tanggalP),'Berita Acara Evaluasi Administrasi')); 
			}

		//isi
		$pdf->SetAligns('L');
		$pdf->SetFont('Arial','',12);
		for($i=0;$i<1;$i++){
			$pdf->Row1(array('Pekerjaan : '.$d->pgd_perihal,'Nomor   : '.$noevadministrasi.'
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
		$pdf->Cell(90,6,'Satker Biro Umum Sekretariat Jenderal',0,2,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,2,'L');
		$pdf->Ln(15);
		$pdf->Cell(100);
		$pdf->Cell(90,6,$d->pgd_nama_pejpeng,0,1,'L');   
                
$pdf->AddPage();

//Header
		
		$pdf->Ln(45);
		
		$pdf->SetFont('Arial','B',12);
	
		$pdf->Cell(0,6,'LAMPIRAN BERITA ACARA EVALUASI ADMINISTRASI',0,2,'C');
		$pdf->MultiCell(0,6, strtoupper($d->pgd_perihal),0,'C');
		$pdf->Cell(0,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Ln(5);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(0,6,'NOMOR : '.$noevadministrasi,0,2,'L');
		$pdf->Cell(0,6,'Tanggal  : '.$pdf->tanggal("j M Y", $tanggalP),0,2,'L');
		$pdf->Ln(5);
if($tipepengadaan!=2){				
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
			$pdf->Row1(array($n,$d->spl_nama,$d->pgd_perwakilan_spl,'Rp.'.$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_pnr).',- ('.$b.'rupiah)',$d->pgd_lama_pekerjaan.' Hari Kalender',$pdf->tanggal("j M Y", $tanggalP),'Memenuhi Syarat')); 
			}
                }else {
                $w = array(10,80,60,20);
		$pdf->SetWidths($w);
		$a='C';
		$pdf->SetAligns($a);
		//header
		$pdf->SetFont('Arial','B',12);
                $pdf->Cell($w[0],7,' ','LTR',0,'L',0); $pdf->Cell($w[1],7,'','LTR',0,'C',0); $pdf->Cell(80,7,'NAMA PERUSAHAAN','LTR',1,'C',0);    

			for($i=0;$i<1;$i++){
			$pdf->Row1(array('NO','DOKUMEN / KRITERIA',$d->spl_nama,'MS/TMS')); 
			}                       
                $pdf->SetFont('Arial','',11);
		$pdf->SetAligns('L');
                $n=array('A','1','','','');
                $k=array('ADMINISTRASI','Surat Penawaran ','a. Bertanggal','b. Masa berlaku penawaran '.$d->pgd_lama_penawaran.' ('.$pdf->Terbilang($d->pgd_lama_penawaran).' ) hari kalender','c. Harga penawaran');
		$np=array('','',$pdf->tanggal("j M Y", $d->pgd_tgl_pemasukkan_pnr),$d->pgd_lama_penawaran.' ('.$pdf->Terbilang($d->pgd_lama_penawaran).' ) hari kalender','Rp.'.$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_pnr));
                $ms=array('','','MS','MS','MS');
                for($i=0;$i<5;$i++){
			$pdf->Row1(array($n[$i],$k[$i],$np[$i],$ms[$i])); 
			}
                        
                        
                }
                
		$pdf->Ln(5);

		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,1,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum Sekretariat Jenderal',0,1,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,1,'L');
		$pdf->Ln(15);
		$pdf->Cell(90,6,$d->pgd_nama_pejpeng,0,1,'L');
		
	$pdf->Output('BA evaluasi administrasi '.$d->pgd_perihal.'.pdf','I');	
?>		