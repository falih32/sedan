<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);
$pdf->AddPage();
$last=-11;
//Header
$tanggalK=$tglklarifikasi;

		$pdf->Ln(45);
		
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
		
		$pdf->MultiCell(0,5,'Pada hari ini, '.$pdf->tanggal("D",$tanggalK).' tanggal'.$pdf->Terbilang($pdf->tanggal("j",$tanggalK)).' bulan'.$pdf->tanggal(" M ",$tanggalK).'tahun'.$pdf->Terbilang($pdf->tanggal("Y",$tanggalK)).', bertempat di Kementerian Kelautan dan Perikanan Jalan Medan Merdeka Timur No.16 Jakarta Pusat Pejabat Pengadaan Barang/Jasa dan Petugas Pembantu Administrasi dilingkungan Biro Umum yang dibentuk berdasarkan Keputusan Kuasa Pengguna Anggaran Satuan Kerja Biro Umum Sekretariat Jenderal KKP Nomor : '.$nokepkuas.' tanggal '.$pdf->tanggal("j M Y",$tglkepkuas).' telah mengadakan Klarifikasi dan Negosiasi penawaran harga atas Pekerjaan '.$d->pgd_perihal.', yang diajukan oleh perusahaan yaitu '.$d->spl_nama.' yang beralamat di '.$d->spl_alamat.',dengan surat penawaran Nomor : '.$d->pgd_no_srt_penawaran.' tertanggal '.$pdf->tanggal("j M Y",$d->pgd_tgl_pemasukkan_pnr).', dengan harga penawaran sebesar Rp. '.$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_pnr).',- ('.$pdf->Terbilang($d->pgd_jml_ssdh_ppn_pnr).'rupiah ) sudah termasuk pajak.',0,'J');
		$pdf->Ln(5);
		$pdf->MultiCell(0,5,'Setelah diadakan penelitian serta penilaian bersama dengan seksama dan hasil negosiasi atas surat penawaran yang diajukan dapat diturunkan menjadi Rp. '.$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_fix).',- ('.$pdf->Terbilang($d->pgd_jml_ssdh_ppn_fix).'rupiah ), sehingga dapat diusulkan pengadaan langsung untuk melaksanakan pekerjaan tersebut.',0,'J');
		$pdf->Ln(5);
		$pdf->MultiCell(0,5,'Demikian Berita Acara  Klarifikasi dan Negosiasi Harga ini  dibuat untuk dapat dipergunakan seperlunya.',0,'J');
		$pdf->Ln(10);
		$pdf->Cell(90,6,'Setuju dan sanggup melaksanakan ',0,0,'L');	$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,1,'L'); 
		$pdf->Cell(90,6,'pekejaan sesuai dengan negosiasi',0,0,'L');	$pdf->Cell(90,6,'Satker Biro Umum Sekretariat Jenderal',0,1,'L');
		$pdf->Cell(90,6,$d->spl_nama,0,0,'L');                         $pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,1,'L');
		$pdf->Cell(90,6,'',0,0,'L');	
		$pdf->Ln(15);
		$pdf->SetFont('Arial','U',12);
		$pdf->Cell(90,6,$d->pgd_perwakilan_spl,0,0,'L');	$pdf->SetFont('Arial','',12); $pdf->Cell(90,6,$d->pgd_nama_pejpeng,0,1,'L');
		$pdf->Cell(90,6,$d->pgd_jbt_perwakilan_spl,0,0,'L');


		
	//-------------------------------barang dan jasa------------------------------------------------------	

             if($tipepengadaan!=2){
 $pdf->AddPage('p');                
                 //Header
                $pdf->SetLineWidth(0.5);
		$pdf->Cell(80);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(30,6,'Lampiran Berita Acara Klarifikasi dan Negoisasi Harga',0,3,'C');
		$pdf->Cell(30,6,$d->pgd_perihal,0,3,'C');
		$pdf->Cell(30,6,'Setker Biro Umum Sekretariat Jenderal Kementerian Kelautan dan Perikanan',0,3,'C');
		$pdf->Cell(30,6,'Nomor. '.$nomor,0,3,'C');
		$pdf->Ln(10);
   
                //header	
		$w = array(12,51,25,26,25,26,25);
		$pdf->SetWidths($w);
		$pdf->Cell($w[0],7,' ','LTR',0,'L',0); $pdf->Cell($w[1],7,'','LTR',0,'C',0); $pdf->Cell($w[2],7,'','LTR',0,'C',0); $pdf->Cell(51,7,'Harga Penawaran','LTR',0,'C',0); $pdf->Cell(51,7,'Harga Negoisasi','LRT',1,'C',0);
		$pdf->Cell($w[0],7,'No','LR',0,'c',0); $pdf->Cell($w[1],7,'Uraian Pekerjaan','LR',0,'C',0); $pdf->Cell($w[2],7,'Volume','LR',0,'C',0); $pdf->Cell($w[3],7,'Harga Satuan',1,0,'C',0); $pdf->Cell($w[4],7,'Jumlah',1,0,'C',0);$pdf->Cell($w[5],7,'Harga Satuan',1,0,'C',0); $pdf->Cell($w[6],7,'Jumlah',1,1,'C',0);		
		$pdf->Cell($w[0],7,'','LBR',0,'L',0); $pdf->Cell($w[1],7,'','LBR',0,'L',0); $pdf->Cell($w[2],7,'','LBR',0,'L',0); $pdf->Cell($w[3],7,'(Rp.)','LR',0,'C',0); $pdf->Cell($w[4],7,'(Rp.)','LR',0,'C',0);$pdf->Cell($w[5],7,'(Rp.)','LR',0,'C',0); $pdf->Cell($w[6],7,'(Rp.)','LBR',1,'C',0);
		
		$pdf->SetAligns('L');
                $pdf->SetRataKanan(2);
		$no=0;
                $subno=0; 
		foreach ($listpeng as $row) {
		if(($row->dtp_sub_judul != '-99')&&($row->dtp_sub_judul !=$last)){$no++; $last=$row->dtp_sub_judul; $subno=0; $pdf->Row(array($no.'.',$row->sjd_sub_judul,'', '' ,'','', '' ));}
		$subno++;
                if($no!=0 && $row->dtp_sub_judul != '-99') {$nomor=$no.'.'.$subno;} else {$nomor=$subno;}
			$pdf->Row(array($nomor.'.',$row->dtp_pekerjaan,($row->dtp_volume+0).' '.$row->dtp_satuan,$pdf->formatrupiah($row->dtp_hargasatuan_pnr) ,$pdf->formatrupiah($row->dtp_jumlahharga_pnr),$pdf->formatrupiah($row->dtp_hargasatuan_fix) ,$pdf->formatrupiah($row->dtp_jumlahharga_fix))); 
		}
                //$pdf->SetFont('Arial','B',11);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'R',0); $pdf->Cell($w[4],7,$pdf->formatrupiah($d->pgd_jml_sblm_ppn_pnr),1,0,'R',0);$pdf->Cell($w[5],7,'',1,0,'R',0); $pdf->Cell($w[6],7,$pdf->formatrupiah($d->pgd_jml_sblm_ppn_fix),1,1,'R',0);
		if($d->pgd_dgn_pajak==0){
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'PPN 10%',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'R',0); $pdf->Cell($w[4],7,$pdf->formatrupiah(0.1*$d->pgd_jml_sblm_ppn_pnr),1,0,'R',0);$pdf->Cell($w[5],7,'',1,0,'R',0); $pdf->Cell($w[6],7,$pdf->formatrupiah(0.1*$d->pgd_jml_sblm_ppn_fix),1,1,'R',0);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'R',0); $pdf->Cell($w[4],7,$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_pnr),1,0,'R',0);$pdf->Cell($w[5],7,'',1,0,'R',0); $pdf->Cell($w[6],7,$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_fix),1,1,'R',0);
                }
                //$pdf->SetFont('Arial','',11);
                $pdf->Ln(6);
		if($d->pgd_dgn_pajak==0){
		$pdf->Cell(100,6,'Harga diatas sudah termasuk Pajak',0,3,'L');
		$pdf->Ln(5);
                }
 
		$pdf->Cell(120,6,'',0,0,'L');$pdf->Cell(70,6,'Jakarta,'.$pdf->tanggal(" j M Y", $tanggalK),0,1,'L');
		$pdf->Cell(120,6,$d->spl_nama,0,0,'L');$pdf->Cell(70,6,'Pejabat Pengadaan Barang / Jasa',0,3,'L');
		$pdf->Cell(120,6,'',0,0,'L');$pdf->Cell(70,6,'Satker Biro Umum Sekretariat Jenderal KKP',0,3,'L');
                $pdf->Cell(120,6,'',0,0,'L');$pdf->Cell(70,6,'Kementerian Kelautan dan Perikanan',0,3,'L');
		$pdf->Ln(20); 
		$pdf->SetFont('Arial','U',11); $pdf->Cell(120,5,$d->pgd_perwakilan_spl,0,0,'L'); $pdf->SetFont('Arial','',11); $pdf->Cell(70,5,$d->pgd_nama_pejpeng,0,1,'L');
		$pdf->Cell(130,5,$d->pgd_jbt_perwakilan_spl,0,3,'L');  
                
                
             }else {
             
    //-----------------------------------------konsultan------------------------------------------------------------         
$pdf->AddPage('l');
//Header
$pdf->SetLineWidth(0.5);
		$pdf->Cell(120);
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(30,6,'Lampiran Berita Acara Klarifikasi dan Negoisasi Harga',0,3,'C');
		$pdf->Cell(30,6,$d->pgd_perihal,0,3,'C');
		$pdf->Cell(30,6,'Setker Biro Umum Sekretariat Jenderal Kementerian Kelautan dan Perikanan',0,3,'C');
		$pdf->Cell(30,6,'Nomor. '.$nomor,0,3,'C');
		$pdf->Ln(10);    
               //header 
              $pdf->Cell(100,6,'1. BIAYA LANGSUNG PERSONIL',0,3,'L');      
              $header = array('No', 'Jabatan', 'Kualifikasi Pendidikan','Jumlah Orang','Jumlah Bulan','Intensitas','Kuantitas','Satuan','Biaya Personil (Rp.)','Jumlah Biaya (Rp.)','Biaya Personil (Rp.)','Jumlah Biaya (Rp.)');                 
              $w = array(10,35,40,16,16,14,14,15,25,25,25,25);
		$pdf->SetWidths($w);
		//$pdf->SetFont('Arial','B',11);
		$pdf->SetAligns('C');
                $pdf->Cell($w[0],7,' ','LTR',0,'L',0); $pdf->Cell($w[1],7,'','LTR',0,'C',0); $pdf->Cell($w[2],7,'','LTR',0,'C',0);$pdf->Cell($w[3],7,'','LTR',0,'C',0);$pdf->Cell($w[4],7,'','LTR',0,'C',0);$pdf->Cell($w[5],7,'','LTR',0,'C',0);$pdf->Cell($w[6],7,'','LTR',0,'C',0);$pdf->Cell($w[7],7,'','LTR',0,'C',0); $pdf->Cell(50,7,'Harga Penawaran','LTR',0,'C',0); $pdf->Cell(50,7,'Harga Negoisasi','LRT',1,'C',0);
		for($i=0;$i<1;$i++){
			$pdf->Row1($header); 
		}
		
		$pdf->SetAligns('L');
                $pdf->SetRataKanan(3);
		$no=0;
                
                //isi    
                $jumBLPpnr=0; $jumBLPfix=0;
                foreach ($listpengK as $rowk) {
                if(($rowk->dtk_sub_judul != '-99')&&($rowk->dtk_sub_judul !=$last)){$pdf->SetFont('Arial','B',11);$last=$rowk->dtk_sub_judul; $no++; $pdf->Row(array($no.'.',$rowk->sjd_sub_judul,'', '' ,'','','','','','','','')); $subno=0;}
		$subno++;
                if($no!=0 && $rowk->dtk_sub_judul != '-99'){$nomor=$no.'.'.$subno;} else {$nomor=$subno;}
		$pdf->SetFont('Arial','',11);	
                $pdf->Row(array($nomor,$rowk->dtk_jabatan,$rowk->dtk_kualifikasi_pendidikan,$rowk->dtk_jml_org,$rowk->dtk_jml_bln+0,$rowk->dtk_intensitas+0,$rowk->dtk_kuantitas+0,$rowk->dtk_satuan,$pdf->formatrupiah($rowk->dtk_biaya_personil_pnr),$pdf->formatrupiah($rowk->dtk_jml_biaya_pnr),$pdf->formatrupiah($rowk->dtk_biaya_personil_fix),$pdf->formatrupiah($rowk->dtk_jml_biaya_fix))); 
		$jumBLPpnr+=$rowk->dtk_jml_biaya_pnr; $jumBLPfix+=$rowk->dtk_jml_biaya_fix;        
                }
                $pdf->SetFont('Arial','B',11);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'',1,0,'C',0); $pdf->Cell($w[2],7,'SUBTOTAL-1',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'',1,0,'C',0); $pdf->Cell($w[5],7,'',1,0,'C',0);$pdf->Cell($w[6],7,'',1,0,'C',0);$pdf->Cell($w[7],7,'',1,0,'C',0);$pdf->Cell($w[8],7,'',1,0,'R',0); $pdf->Cell($w[9],7,$pdf->formatrupiah($jumBLPpnr),1,0,'R',0);$pdf->Cell($w[8],7,'',1,0,'R',0); $pdf->Cell($w[9],7,$pdf->formatrupiah($jumBLPfix),1,1,'R',0);
$pdf->Ln(6);
$pdf->Cell(100,6,'2. BIAYA LANGSUNG NON PERSONIL',0,3,'L');      
              $header = array('No', 'Uraian', 'Unit','Volume','Kuantitas','Satuan','Harga Satuan (Rp.)','Jumlah (Rp.)','Harga Satuan (Rp.)','Jumlah (Rp.)');                 
              $w = array(10,40,15,20,20,20,30,30,30,30);
		$pdf->SetWidths($w);
		//$pdf->SetFont('Arial','',11);
		$pdf->SetAligns('C');
                $pdf->Cell($w[0],7,' ','LTR',0,'L',0); $pdf->Cell($w[1],7,'','LTR',0,'C',0); $pdf->Cell($w[2],7,'','LTR',0,'C',0);$pdf->Cell($w[3],7,'','LTR',0,'C',0);$pdf->Cell($w[4],7,'','LTR',0,'C',0);$pdf->Cell($w[5],7,'','LTR',0,'C',0);$pdf->Cell(60,7,'Harga Penawaran','LTR',0,'C',0); $pdf->Cell(60,7,'Harga Negoisasi','LRT',1,'C',0);
		for($i=0;$i<1;$i++){
			$pdf->Row1($header); 
		}
		
		$pdf->SetAligns('L');
                $pdf->SetRataKanan(3);
		$no=0;
               
                //isi
                $jumBLNPpnr=0; $jumBLNPfix=0;
                foreach ($listpengK2 as $rowk2) {
                if(($rowk2->dtk2_sub_judul != '-99')&&($rowk2->dtk2_sub_judul !=$last)){$pdf->SetFont('Arial','B',11);$last=$rowk2->dtk2_sub_judul; $no++; $pdf->Row(array($no.'.',$rowk2->sjd_sub_judul,'', '' ,'','','','','','')); $subno=0;}
		$subno++;
                if($no!=0 && $rowk2->dtk2_sub_judul != '-99'){$nomor=$no.'.'.$subno;} else {$nomor=$subno;}
		$pdf->SetFont('Arial','',11);
                $pdf->Row(array($nomor,$rowk2->dtk2_pekerjaan,$rowk2->dtk2_volume+0,$rowk2->dtk2_volume+0,$rowk2->dtk2_volume+0,$rowk2->dtk2_satuan,$pdf->formatrupiah($rowk2->dtk2_hargasatuan_pnr+0),$pdf->formatrupiah($rowk2->dtk2_jumlahharga_pnr+0),$pdf->formatrupiah($rowk2->dtk2_hargasatuan_fix+0),$pdf->formatrupiah($rowk2->dtk2_jumlahharga_fix+0))); 
		$jumBLNPpnr+=$rowk2->dtk2_jumlahharga_pnr;$jumBLNPfix+=$rowk2->dtk2_jumlahharga_fix;        
                }
                $pdf->SetFont('Arial','B',11);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'SUBTOTAL-2',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'',1,0,'C',0); $pdf->Cell($w[5],7,'',1,0,'C',0);$pdf->Cell($w[6],7,'',1,0,'R',0);$pdf->Cell($w[7],7,$pdf->formatrupiah($jumBLNPpnr),1,0,'R',0);$pdf->Cell($w[6],7,'',1,0,'R',0);$pdf->Cell($w[7],7,$pdf->formatrupiah($jumBLNPfix),1,0,'R',0);
 
                $pdf->AddPage();
                
                //Header
		$pdf->Cell(82);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(30,6,'REKAPITULASI HARGA PERKIRAAN SENDIRI',0,3,'C');
		$pdf->Cell(30,6,strtoupper($d->pgd_perihal),0,3,'C');
		$pdf->Cell(30,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,3,'C');
		$pdf->Cell(30,6,'TAHUN '.$pdf->tanggal("Y",$d->pgd_tanggal_input),0,3,'C');
		$pdf->Ln(10);
		
		$pdf->SetFont('Arial','',12);
                    
                
$header = array('No', 'Uraian Pekerjaan', 'Jumlah','Jumlah');                 
              $w = array(10,70,40,40);
		$pdf->SetWidths($w);
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('C');
                $pdf->Cell($w[0],7,' ','LTR',0,'L',0); $pdf->Cell($w[1],7,'','LTR',0,'C',0); $pdf->Cell(40,7,'Harga Penawaran','LTR',0,'C',0); $pdf->Cell(40,7,'Harga Negoisasi','LRT',1,'C',0);
		for($i=0;$i<1;$i++){
			$pdf->Row1($header); 
		}
                
                $pdf->Cell($w[0],7,'1.',1,0,'c',0); $pdf->Cell($w[1],7,'Biaya Langsung Personil',1,0,'L',0); $pdf->Cell($w[2],7,$pdf->formatrupiah($jumBLPpnr),1,0,'R',0);$pdf->Cell($w[2],7,$pdf->formatrupiah($jumBLPfix),1,1,'R',0);
                $pdf->Cell($w[0],7,'2.',1,0,'c',0); $pdf->Cell($w[1],7,'Biaya Langsung Non Personil',1,0,'L',0); $pdf->Cell($w[2],7,$pdf->formatrupiah($jumBLNPpnr),1,0,'R',0);$pdf->Cell($w[2],7,$pdf->formatrupiah($jumBLNPfix),1,1,'R',0);
                if($d->pgd_dgn_pajak==0){
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'TOTAL',1,0,'C',0); $pdf->Cell($w[2],7,$pdf->formatrupiah($d->pgd_jml_sblm_ppn_pnr),1,0,'R',0); $pdf->Cell($w[2],7,$pdf->formatrupiah($d->pgd_jml_sblm_ppn_fix),1,1,'R',0);
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'PPN 10%',1,0,'C',0); $pdf->Cell($w[2],7,$pdf->formatrupiah(0.1*$d->pgd_jml_sblm_ppn_pnr),1,0,'R',0); $pdf->Cell($w[2],7,$pdf->formatrupiah($d->pgd_jml_sblm_ppn_fix),1,1,'R',0);               
                }
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'TOTAL',1,0,'C',0); $pdf->Cell($w[2],7,$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_pnr),1,0,'R',0); $pdf->Cell($w[2],7,$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_fix),1,1,'R',0);
         
                 $pdf->Ln(6);
		if($d->pgd_dgn_pajak==0){
		$pdf->Cell(100,6,'Harga diatas sudah termasuk Pajak',0,3,'L');
		$pdf->Ln(5);
                }
 
		$pdf->Cell(120,6,'',0,0,'L');$pdf->Cell(70,6,'Jakarta,'.$pdf->tanggal(" j M Y", $tanggalK),0,1,'L');
		$pdf->Cell(120,6,$d->spl_nama,0,0,'L');$pdf->Cell(70,6,'Pejabat Pengadaan Barang / Jasa',0,3,'L');
		$pdf->Cell(120,6,'',0,0,'L');$pdf->Cell(70,6,'Satker Biro Umum Sekretariat Jenderal KKP',0,3,'L');
                $pdf->Cell(120,6,'',0,0,'L');$pdf->Cell(70,6,'Kementerian Kelautan dan Perikanan',0,3,'L');
		$pdf->Ln(20); 
		$pdf->SetFont('Arial','U',11); $pdf->Cell(120,5,$d->pgd_perwakilan_spl,0,0,'L'); $pdf->SetFont('Arial','',11); $pdf->Cell(70,5,$d->pgd_nama_pejpeng,0,1,'L');
		$pdf->Cell(130,5,$d->pgd_jbt_perwakilan_spl,0,3,'L');  
                 
                 
             }
                              
	$pdf->Output();	
?>		