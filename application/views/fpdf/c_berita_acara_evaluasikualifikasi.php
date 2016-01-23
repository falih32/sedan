<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);
$pdf->AddPage();
$tanggalK=$tglKudg;

		
		$pdf->Ln(45);
		

		$pdf->SetFont('Arial','',12);
				
		$pdf->SetLineWidth(0.2);
		$w = array(90,95);
		$pdf->SetWidths($w);
		$pdf->SetAligns('C');
		//header
		$pdf->SetFont('Arial','B',12);
			for($i=0;$i<1;$i++){
			$pdf->Row1(array('Satuan Kerja Biro Umum Sekretariat Jenderal Kementerian Kelautan dan Perikanan Tahun Anggaran '.$pdf->tanggal("Y",$tanggalK),'Berita Acara Evaluasi Kualifikasi')); 
			}

		//isi
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('L');
		for($i=0;$i<1;$i++){
			$pdf->Row1(array('Pekerjaan : '.$d->pgd_perihal,'Nomor   : '.$noevakualifikasi.'
Tanggal : '.$pdf->tanggal("j M Y", $tanggalK))); 
			}
		$pdf->Ln(5);
		$pdf->MultiCell(0,5,'Pada hari ini, '.$pdf->tanggal("D",$tanggalK).' tanggal '.$pdf->Terbilang($pdf->tanggal("j",$tanggalK)).' bulan '.$pdf->tanggal(" M ",$tanggalK).' tahun '.$pdf->Terbilang($pdf->tanggal("Y",$tanggalK)).', yang bertanda tangan dibawah ini Pejabat Pengadaan Barang / Jasa Satker Biro Umum telah melaksanakan evaluasi kualifikasi terhadap 1 (satu) perusahaan yang memenuhi syarat evaluasi dokumen harga, dengan hasil sebagai berikut :',0,'J');
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
		//$dkul = array('Surat Izin Usaha sesuai LDP','Pernyataan/pengakuan tertulis bahwa badan usaha yang bersangkutan dan manajemen tidak dalam pengawasan pengadilan, tidak pailit, kegiatan usaha tidak sedang dihentikan dan/atau direksi yang bertindak untuk dan atas nama perusahaan sedang tidak dalam menjalani sanksi pidana','Pernyataan salah satu dan/atau semua pengurus dan badan usaha tidak masuk dalam daftar hitam','Memiliki NPWP','Domisili perusahaan masih berlaku','Akta pendirian','Pajak 3 bulan terakhir','Pakta Integritas','KTP Pengurus');
		//$huruf= array('a','b','c','d','e','f','g','h','i');
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('L');
                $no=1;
		foreach ($listsiz as $row) {
			$pdf->Row1(array($no,$row->siz_nama,$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+130, $pdf->GetY()+1, 4),'')); 
			$no++;        
                }
		$pdf->Ln(5);
		
		$pdf->MultiCell(0,5,'Demikian Berita Acara Evaluasi Kualifikasi beserta lampirannya ini dibuat oleh Pejabat Pengadaan Barang / Jasa Satker Biro Umum Setjen KKP untuk selanjutnya akan dilakukan Klarifikasi dan negosiasi.',0,'J');
		$pdf->Ln(5);
                if($pdf->getY()>241) {
		$pdf->AddPage();	
		}
		$pdf->Cell(100);
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,2,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum Sekretariat Jenderal',0,2,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,2,'L');
		$pdf->Ln(11);
		$pdf->Cell(100);
		$pdf->Cell(90,6,$pejpeng->pgw_nama,0,1,'L');             
                
$pdf->AddPage();

//Header
		
		$pdf->Ln(45);
		
		$pdf->SetFont('Arial','B',12);
	
		$pdf->Cell(0,6,'LAMPIRAN BERITA ACARA EVALUASI KUALIFIKASI',0,2,'C');
		$pdf->MultiCell(0,6,  strtoupper($d->pgd_perihal),0,'C');
		$pdf->Cell(0,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Ln(5);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(0,6,'NOMOR : '.$noevakualifikasi,0,2,'L');
		$pdf->Cell(0,6,'Tanggal  : '.$pdf->tanggal("j M Y", $tanggalK),0,2,'L');
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
                //$dok=array('SIUP','TDP','PKP','Akte Perusahaan','NPWP','KTP Direksi','Pakta Integritas','Keterangan Domisili','Rekening Koran');        
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('L');
			$n=0;
		foreach ($listsiz as $row) {
		$n++;
			$pdf->Row1(array($n,$row->siz_nama,'             Ada','memenuhi syarat')); 
			}
		$pdf->Ln(5);

		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,1,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum Sekretariat Jenderal',0,1,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,1,'L');
		$pdf->Ln(15);
		$pdf->Cell(90,6,$pejpeng->pgw_nama,0,1,'L');                
                
	$pdf->Output();	
?>		