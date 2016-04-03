<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);
$pdf->AddPage();
$tanggalK=$tglKudg;
//Header		
		$pdf->Ln(45);
		
		$pdf->SetFont('Arial','',12);
				
		$pdf->SetLineWidth(0.2);
		$w = array(90,95);
		$pdf->SetWidths($w);
		$pdf->SetAligns('C');
		//header
		$pdf->SetFont('Arial','B',12);
			for($i=0;$i<1;$i++){
			$pdf->Row1(array('Satuan Kerja Biro Umum Sekretariat Jenderal Kementerian Kelautan dan Perikanan Tahun Anggaran '.$pdf->tanggal("Y",$tanggalK),'Berita Acara Evaluasi Teknis')); 
			}
		//isi
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('L');
		for($i=0;$i<1;$i++){
			$pdf->Row1(array('Pekerjaan : '.$d->pgd_perihal,'Nomor   : '.$noevateknis.'
Tanggal : '.$pdf->tanggal("j M Y", $tanggalK))); 
			}
		$pdf->Ln(5);
		$pdf->MultiCell(0,5,'Pada hari ini, '.$pdf->tanggal("D",$tanggalK).' tanggal '.$pdf->Terbilang($pdf->tanggal("j",$tanggalK)).' bulan '.$pdf->tanggal(" M ",$tanggalK).' tahun '.$pdf->Terbilang($pdf->tanggal("Y",$tanggalK)).', yang bertanda tangan dibawah ini Pejabat Pengadaan Barang / Jasa Satker Biro Umum telah melaksanakan evaluasi teknis terhadap 1 (satu) perusahaan yang memenuhi syarat evaluasi administrasi, dengan hasil berikut :',0,'J');
		$pdf->Ln(5);
		$w = array(10,40,45,45,45);
		$pdf->SetWidths($w);
		$pdf->SetAligns('C');
		//header
		$pdf->SetFont('Arial','B',12);
                if($d->pgd_tipe_pengadaan==2){ 
                    for($i=0;$i<1;$i++){
                                    $pdf->Row1(array('No','Nama Perusahaan','Pengalaman perusahaan (Sejenis)','Pendekatan dan metodologi','Kualifikasi Tenaga Ahli')); 
                                }
                }else {	
                        for($i=0;$i<1;$i++){
                                    $pdf->Row1(array('No','Nama Perusahaan','Spesifikasi Teknis yang ditawarkan sesuai yang ditetapkan dalam dokumen pengadaan','Jadwal pelaksanaan pekerjaan yang ditawarkan tidak melampaui batas waktu sebagaimana tercantum dalam LDP','Identitas (jenis, type dan merk) yang ditawarkan sebagaimana tercantum dalam LDP')); 
                                }
                }
		//isi
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('L');
		$no=0;

		for($i=0;$i<1;$i++){
			$no++;
			$pdf->Row1(array($no,$d->spl_nama,$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+70, $pdf->GetY()+1, 4),$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+115, $pdf->GetY()+1, 4),$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+160, $pdf->GetY()+1, 4))); 
			}
		$pdf->Ln(5);
		
		$pdf->MultiCell(0,5,'Demikian Berita Acara ini dibuat oleh Pejabat Pengadaan Barang / Jasa Satker Biro Umum Setjen KKP untuk dapat dipergunakan sebagaimana mestinya.',0,'J');
		$pdf->Ln(15);
		$pdf->Cell(100);
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,2,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum Sekretariat Jenderal ',0,2,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,2,'L');
		$pdf->Ln(15);
		$pdf->Cell(100);
		$pdf->Cell(90,6,$d->pgd_nama_pejpeng,0,1,'L');
                
 if($d->pgd_tipe_pengadaan==2){                
                $pdf->AddPage();

//Header
		
		$pdf->Ln(45);
		
		$pdf->SetFont('Arial','B',12);
	
		$pdf->Cell(0,6,'LAMPIRAN BERITA ACARA EVALUASI TEKNIS',0,2,'C');
		$pdf->MultiCell(0,6, strtoupper($d->pgd_perihal),0,'C');
//		$pdf->Cell(0,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Ln(8);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(0,6,'NOMOR : '.$noevateknis,0,2,'L');
		$pdf->Cell(0,6,'Tanggal  : '.$pdf->tanggal("j M Y", $tanggalK),0,2,'L');
		$pdf->Ln(5);
				
		$pdf->SetLineWidth(0.2);
                //header
                $pdf->SetFont('Arial','B',12); 
                $x=$pdf->GetX(); $y=$pdf->GetY();$pdf->MultiCell(8, 5, 'No','LTR'); $pdf->SetXY($x+8,$y); $pdf->MultiCell(38, 5, 'Nama','LTR','C');$pdf->SetXY($x+46,$y); $pdf->MultiCell(139, 5, 'Nilai Konsultan','LTR','C');
                $y1=$pdf->GetY();$pdf->MultiCell(8, 5, '               ','LR'); $pdf->SetXY($x+8,$y1);  $pdf->MultiCell(38, 5, '     Perusahaan               ','LR','C'); $pdf->SetXY($x+46,$y1);  $pdf->MultiCell(30, 5, 'Pengalaman perusahaan (Sejenis)','LTR','C'); $pdf->SetXY($x+76,$y1);  $pdf->MultiCell(30, 5, 'Pendekatan dan metodologi','LTR','C'); 
                $pdf->SetXY($x+106,$y1);  $pdf->MultiCell(30, 5, 'Kualifikasi   Tenaga Ahli     ','LTR','C');
                $pdf->SetXY($x+136,$y1);  $pdf->MultiCell(22, 5, 'Jumlah   Nilai   ','LTR','C');$pdf->SetXY($x+158,$y1);  $pdf->MultiCell(27, 5, 'Keterangan                         ','LTR','C');
                 
                $w = array(8,38,30,30,30,22,27);
		$pdf->SetWidths($w);
		

		//isi
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('L');
			$n=0;
		for($i=0;$i<1;$i++){
		$n++;
			$pdf->Row1(array($n,$d->spl_nama,$up->unp_jml_png_prs,$up->unp_jml_pnd_mtd,$up->unp_jml_kua_tna,$up->unp_jml_png_prs+$up->unp_jml_pnd_mtd+$up->unp_jml_kua_tna,'Lulus')); 
			}
                $pdf->Ln(10);        
                $w = array(10,100,50);
		$pdf->SetWidths($w);
		$a='C';
		$pdf->SetAligns($a);
		//header
		$pdf->SetFont('Arial','B',12);
			for($i=0;$i<1;$i++){
			$pdf->Row1(array('No','Dokumen Penawaran Teknis','Keterangan')); 
			}
                //isi
                $dok= array('Pengalaman perusahaan','Pendekatan dan metodologi','Kualifikasi Tenaga Ahli');      
                $pdf->SetFont('Arial','',12); 
                $pdf->SetAligns('L');
                $n=0;
                for($i=0;$i<3;$i++){
		$n++;
			$pdf->Row1(array($n,$dok[$i],'Lengkap (terlampir)')); 
                }
                        
                        
		$pdf->Ln(7);
                
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,1,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum Sekretariat Jenderal',0,1,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,1,'L');
		$pdf->Ln(15);
		$pdf->Cell(90,6,$d->pgd_nama_pejpeng,0,1,'L');
     
                
 $pdf->AddPage();
//Header	
		$pdf->Ln(45);		
		$pdf->SetFont('Arial','B',12);	
		$pdf->Cell(0,6,'LAMPIRAN BERITA ACARA EVALUASI TEKNIS',0,2,'C');
		$pdf->MultiCell(0,6, strtoupper($d->pgd_perihal),0,'C');
$pdf->Ln(8);
		$pdf->SetFont('Arial','',11);                
                $pdf->Cell(0,6,'Tahun Anggaran '.$pdf->tanggal("Y",$d->pgd_tanggal_input),0,3,'L');
                $pdf->Cell(0,6,'NOMOR : '.$noevateknis,0,2,'L');
		$pdf->Cell(0,6,'Tanggal  : '.$pdf->tanggal("j M Y", $tanggalK),0,2,'L');
		$pdf->Ln(5);
                $w = array(10,80,30,30,30);
		$pdf->SetWidths($w);
		$a='C';
		$pdf->SetAligns($a);
		//header
		$pdf->SetFont('Arial','B',12);
                $pdf->Cell($w[0],7,'No','LTR',0,'L',0); $pdf->Cell($w[1],7,'Unsur Penilaian','LTR',0,'C',0);$pdf->Cell($w[2],7,'Bobot Unsur','LTR',0,'C',0); $pdf->Cell(60,7,'Nama Perusahaan','LTR',1,'C',0);    
                $pdf->Cell($w[0],7,'','LTR',0,'L',0); $pdf->Cell($w[1],7,'','LTR',0,'C',0);$pdf->Cell($w[2],7,'','LTR',0,'C',0); $pdf->Cell(60,7,$d->spl_nama,'LTR',1,'C',0); 
			for($i=0;$i<1;$i++){
			$pdf->Row1(array('','','','Nilai','Jumlah Nilai')); 
			} 
              $pdf->SetFont('Arial','',11);
              $pdf->SetAligns('L');
              $pdf->SetRataKanan(2);
              $n= array('1','2','3');   
              $upn= array('Pengalaman Perusahaan','Pendekatan dan Metodologi','Kualifikasi Tenaga Ahli');
              $bu= array($up->unp_bobot_png_prs,$up->unp_bobot_pnd_mtd,$up->unp_bobot_kua_tna);   
              $nilai= array($up->unp_nilai_png_prs,$up->unp_nilai_pnd_mtd,$up->unp_nilai_kua_tna); 
              $jn= array($up->unp_jml_png_prs,$up->unp_jml_pnd_mtd,$up->unp_jml_kua_tna); 
                 for($i=0;$i<3;$i++){
			$pdf->Row(array($n[$i],$upn[$i],$bu[$i],$nilai[$i],$jn[$i])); 
			}
            $pdf->SetFont('Arial','B',11);  
              
            $pdf->Cell($w[0],7,'',1,0,'L',0); $pdf->Cell($w[1],7,'JUMLAH',1,0,'L',0);$pdf->Cell($w[2],7,'1.00',1,0,'R',0);$pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,$up->unp_jml_png_prs+$up->unp_jml_pnd_mtd+$up->unp_jml_kua_tna,1,1,'R',0);    
            $pdf->SetFont('Arial','',11); 
            $pdf->Ln(10);
            $pdf->Cell(105); 
		$pdf->Cell(100,6,'Jakarta, '.$pdf->tanggal("j M Y", $tanggalK) ,0,3,'L');
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,3,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum Sekretariat Jenderal',0,3,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,3,'L');
		$pdf->Ln(15);
	
		$pdf->Cell(105); 
                $pdf->Cell(90,6,$d->pgd_nama_pejpeng,0,3,'L');
//-----------------------------------------------------------------------------pengalaman perusahaan------------------------------------------------ 
 $pdf->AddPage();
//Header	
		$pdf->Ln(45);		
		$pdf->SetFont('Arial','B',12);	
		$pdf->Cell(0,6,'EVALUASI DAN PENILAIAN DOKUMEN TEKNIS',0,2,'C');
                $pdf->Cell(0,6,'UNSUR PENGALAMAN PERUSAHAAN BOBOT '.($up->unp_bobot_png_prs+0),0,2,'C');
		$pdf->MultiCell(0,6, strtoupper($d->pgd_perihal),0,'C');
                $pdf->Cell(0,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
                $pdf->Ln(6);

                $w = array(10,70,40,30,30);
		$pdf->SetWidths($w);
                $pdf->SetAligns('C');
                $j = array('Jumlah Paket Pengalaman Sejenis','Jumlah Pengalaman Pada Lokasi Yang Sama','Jumlah Pengalaman','Nilai Paket Pengalaman Sejenis','Kriteria Fasilitas utama','Jumlah Tenaga Ahli Tetap');
                $q=0;
                foreach ($pp as $rowpp) {
                $pdf->SetFont('Arial','B',11);
                if($q==2){ $pdf->Cell(0,6,'Sub unsur pengalaman manajerial dan fasilitas utama',0,2,'L'); }
                if($q>1 && $q<5){ $pdf->SetFont('Arial','',11); }
                $pdf->Cell(0,6,$rowpp->pnp_nm_sub,0,2,'L');    
                if($q>1 && $q<5){ $pdf->SetFont('Arial','B',11); }
                $pdf->Row1(array('No','Nama Perusahaan',$j[$q],'Bobot ('.($rowpp->pnp_bobot+0).'%)','Nilai'));
                $pdf->SetFont('Arial','',11);
                $pdf->Row1(array('1',$d->spl_nama,$rowpp->pnp_jml_sub,($rowpp->pnp_bobot+0).'%',$rowpp->pnp_nilai));
                $nilai[$q]=$rowpp->pnp_nilai;
                $pdf->Ln(5);
                $q++;
                }
                
                $pdf->SetFont('Arial','B',11);
                $w = array(10,60,15,15,15,15,15,15,17);
		$pdf->SetWidths($w);
                $pdf->SetAligns('C');
                $pdf->Cell(0,6,'Rekapitulasi Nilai Pengalaman Perusahaan ',0,2,'L');
                $pdf->Row1(array('No','Nama Perusahaan','NP','NPL','NPLF','NPK','NFU','KP','Total'));
                $pdf->SetFont('Arial','',11);
                $pdf->Row1(array('1',$d->spl_nama,$nilai[0],$nilai[1],$nilai[2],$nilai[3],$nilai[4],$nilai[5],'100.000'));
            
                if($pdf->getY()>221) {
		$pdf->AddPage();	
		}
            $pdf->Ln(10);
            $pdf->Cell(105); 
		$pdf->Cell(100,6,'Jakarta, '.$pdf->tanggal("j M Y", $tanggalK) ,0,3,'L');
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,3,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum Sekretariat Jenderal',0,3,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,3,'L');
		$pdf->Ln(15);
	
		$pdf->Cell(105); 
                $pdf->Cell(90,6,$d->pgd_nama_pejpeng,0,3,'L');
//-----------------------------------------------------------------metode--------------------------------------------------                
 $pdf->AddPage();
//Header	
		$pdf->Ln(45);		
		$pdf->SetFont('Arial','B',12);	
		$pdf->Cell(0,6,'EVALUASI DAN PENILAIAN DOKUMEN TEKNIS',0,2,'C');
                $pdf->Cell(0,6,'UNSUR PENDEKATAN DAN METODOLOGI BOBOT '.($up->unp_bobot_pnd_mtd+0),0,2,'C');
		$pdf->MultiCell(0,6, strtoupper($d->pgd_perihal),0,'C');
                $pdf->Cell(0,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
                $pdf->Ln(8);

                $pdf->SetFont('Arial','B',11);
                $pdf->Cell(0,6,$d->spl_nama,0,2,'L');
                $pdf->Ln(3);
                $w = array(10,60,20,15,15,17,50);
                $no = array('1.','','','','','','','','','','','','','4.');
		$pdf->SetWidths($w);
                $pdf->SetAligns('C');
                $pdf->Row1(array('No','Subunsur','Penilaian','Nilai','Bobot','Jumlah Nilai','Keterangan'));
                $i=0;
                $k='Penilaian:
Sangat Baik (A) =100 
Baik (B) =80 
Cukup Baik (C) =60 
Kurang (D) =40 
Sangat Kurang (E) =20 
Tidak memberikan tanggapan (F) =0 
';
                $pdf->SetAligns('L');
                foreach ($mtd as $rowmtd) {
                $pdf->SetFont('Arial','',11);
                if($i==1){ $pdf->Row1(array('2.','kualitas metodologi','','','0.35','','')); }
                if($i==10){ $pdf->Row1(array('3.','hasil kerja (deliverable)','','','0.1','','')); }
                  $pdf->Row1(array($no[$i],$rowmtd->mtd_nm_sub,$rowmtd->mtd_penilaian,$rowmtd->mtd_nilai,$rowmtd->mtd_bobot+0,$rowmtd->mtd_jml_nilai+0,$k));                
                  $i++;
                }
                $pdf->SetFont('Arial','B',11);
                $pdf->Cell(120,7,'JUMLAH NILAI UNSUR',1,0,'C',0);  $pdf->Cell($w[5],7,$up->unp_nilai_pnd_mtd,1,1,'C',0);		
            $pdf->SetFont('Arial','',11);
            
            if($pdf->getY()>221) {
		$pdf->AddPage();	
		}
                
            $pdf->Ln(10);
            $pdf->Cell(105); 
		$pdf->Cell(100,6,'Jakarta, '.$pdf->tanggal("j M Y", $tanggalK) ,0,3,'L');
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,3,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum Sekretariat Jenderal',0,3,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,3,'L');
		$pdf->Ln(15);
	
		$pdf->Cell(105); 
                $pdf->Cell(90,6,$d->pgd_nama_pejpeng,0,3,'L');                
 //----------------------------------------------personal inti-----------------------------------------               
 $pdf->AddPage('l');
//Header	
		//$pdf->Ln(45);		
		$pdf->SetFont('Arial','B',12);	
		$pdf->Cell(0,6,'EVALUASI DAN PENILAIAN DOKUMEN TEKNIS',0,2,'C');
                $pdf->Cell(0,6,'UNSUR KUALIFIKASI TENAGA AHLI BOBOT '.($up->unp_bobot_kua_tna+0),0,2,'C');
		$pdf->MultiCell(0,6, strtoupper($d->pgd_perihal),0,'C');
                $pdf->Cell(0,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
                $pdf->Ln(8);

                $pdf->SetFont('Arial','B',10);
                $pdf->Cell(0,6,$d->spl_nama,0,2,'L');
                $pdf->Ln(3);
                $w = array(8,40,15,27,56,51,51,15,16);
                //$no = array('1.','','','','','','','','','','','','','4.');
		$pdf->SetWidths($w);
                $pdf->SetAligns('C');
                $pdf->Row1(array('No','Nama','Bobot','Jabatan','TINGKAT PENDIDIKAN (Bobot 40%)','PENGALAMAN KERJA PROFESIONAL (Bobot 40%)','SERTIFIKASI KEAHLIAN/PELATIHAN (Bobot 20%)','Nilai','Jumlah'));
               
                $w = array(8,40,15,27,25,15,16,20,15,16,20,15,16,15,16);
                $pdf->SetWidths($w);
                $pdf->Row1(array('','','','','Ijasah Sesuai (S)/sesuai tetapi tingkat pendidikan tidak (SB)/Tidak Sesuai (TS)/Kurang dari yang disyaratkan (K)','Nilai','Jumlah Nilai Sub Unsur','Masa Kerja','Nilai','Jumlah Nilai','Memiliki (M) /Tidak Memiliki (TM) Sertifikat','Nilai','Jumlah Nilai','',''));
                
  //header 
		$pdf->SetFont('Arial','',11);
		$pdf->SetAligns('L');
                $pdf->SetRataKanan(4);
		$last=0;
                $no=0;                
                //isi    
                $jum=0;
                foreach ($pi as $rowpi) {
                if(($rowpi->dtk_sub_judul != '-99')&&($rowpi->dtk_sub_judul !=$last)){ $pdf->SetFont('Arial','B',11); $last=$rowpi->dtk_sub_judul; $pdf->Row(array('',$rowpi->sjd_sub_judul,'', '' ,'','','','','','','','','','','')); $no=0;}
		$no++;                
        	$pdf->SetFont('Arial','',11);
                $pdf->Row(array($no.'.',$rowpi->psi_nama,$rowpi->psi_bobot,$rowpi->dtk_jabatan,$rowpi->psi_kesesuaian_ijasah,$rowpi->psi_nilai_ks_ijasah,$rowpi->psi_jml_nilai_ks_ijasah,$rowpi->psi_masa_kerja,$rowpi->psi_nilai_kerja,$rowpi->psi_jml_nilai_kerja,$rowpi->psi_memiliki_sertifikat,$rowpi->psi_nilai_sertifikat,$rowpi->psi_jml_nilai_sertifikat,$rowpi->psi_nilai,$rowpi->psi_jumlah)); 
		$jum+=$rowpi->psi_jumlah;        
                }
                $pdf->SetFont('Arial','B',11);
		$pdf->Cell($w[0],7,'','LTB',0,'c',0); $pdf->Cell($w[1],7,'Total','TB',0,'C',0); $pdf->Cell($w[2],7,'','TB',0,'C',0); $pdf->Cell($w[3],7,'','TB',0,'C',0); $pdf->Cell($w[4],7,'','TB',0,'C',0); $pdf->Cell($w[5],7,'','TB',0,'C',0);$pdf->Cell($w[6],7,'','TB',0,'C',0);$pdf->Cell($w[7],7,'','TB',0,'C',0);$pdf->Cell($w[8],7,'','TB',0,'R',0);$pdf->Cell($w[9],7,'','TB',0,'R',0);$pdf->Cell($w[10],7,'','TB',0,'R',0);$pdf->Cell($w[11],7,'','TB',0,'R',0);$pdf->Cell($w[12],7,'','TB',0,'R',0);$pdf->Cell($w[13],7,'','TB',0,'R',0); $pdf->Cell($w[14],7,$pdf->formatrupiah($jum),1,1,'R',0);

if($pdf->getY()>134) {
		$pdf->AddPage('L');	
		}
                $pdf->Ln(10);
            
                $pdf->Cell(100,6,'Jakarta, '.$pdf->tanggal("j M Y", $tanggalK) ,0,3,'L');
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,3,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum Sekretariat Jenderal',0,3,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,3,'L');
		$pdf->Ln(15);
	
                $pdf->Cell(90,6,$d->pgd_nama_pejpeng,0,3,'L');                
//--------------------------------------------------------pengalaman--------------------------------------------------------                                
		$pdf->AddPage('L');	

                $pdf->SetFont('Arial','B',10);
                $pdf->Cell(0,6,'Sub unsur pengalaman kerja profesional',0,2,'L');
                $pdf->Ln(3);
                $w = array(8,35,15,27,56,23,73,15,23);
                $pdf->Cell($w[0],5,'No','LTR',0,'c',0); $pdf->Cell($w[1],5,'Nama','LTR',0,'C',0); $pdf->Cell($w[2],5,'Bobot','LTR',0,'C',0); $pdf->Cell($w[3],5,'Jabatan','LTR',0,'C',0); $pdf->Cell($w[4],5,'URAIAN PENGALAMAN','LTR',0,'C',0); $pdf->Cell($w[5],5,'Jangka','LTR',0,'C',0);$pdf->Cell($w[6],5,'PENGALAMAN KERJA PROFESIONAL','LTR',0,'C',0);$pdf->Cell($w[7],5,'Perhitu','LTR',0,'C',0);$pdf->Cell($w[8],5,'Jangka','LTR',1,'C',0);
                $pdf->Cell($w[0],5,'','LR',0,'c',0); $pdf->Cell($w[1],5,'','LR',0,'C',0); $pdf->Cell($w[2],5,'','LR',0,'C',0); $pdf->Cell($w[3],5,'','LR',0,'C',0); $pdf->Cell($w[4],5,'','LR',0,'C',0); $pdf->Cell($w[5],5,'Waktu','LR',0,'C',0);$pdf->Cell($w[6],5,'(Bobot 40%)','LR',0,'C',0);$pdf->Cell($w[7],5,'ngan','LR',0,'C',0);$pdf->Cell($w[8],5,'Waktu','LR',1,'C',0);
                 $w = array(8,35,15,27,56,23,38,35,15,23);
                $pdf->Cell($w[0],5,'','LR',0,'c',0); $pdf->Cell($w[1],5,'','LR',0,'C',0); $pdf->Cell($w[2],5,'','LR',0,'C',0); $pdf->Cell($w[3],5,'','LR',0,'C',0); $pdf->Cell($w[4],5,'','LR',0,'C',0); $pdf->Cell($w[5],5,'Bulan Kerja','LR',0,'C',0);$pdf->Cell($w[6],5,'LINGKUP','LTR',0,'C',0); $pdf->Cell($w[7],5,'POSISI','LTR',0,'C',0);$pdf->Cell($w[8],5,'Bulan','LR',0,'C',0);$pdf->Cell($w[9],5,'Pengalaman','LR',1,'C',0);
                $pdf->Cell($w[0],5,'','LR',0,'c',0); $pdf->Cell($w[1],5,'','LR',0,'C',0); $pdf->Cell($w[2],5,'','LR',0,'C',0); $pdf->Cell($w[3],5,'','LR',0,'C',0); $pdf->Cell($w[4],5,'','LR',0,'C',0); $pdf->Cell($w[5],5,'','LR',0,'C',0);$pdf->Cell($w[6],5,'PEKERJAAN','LR',0,'C',0); $pdf->Cell($w[7],5,'','LR',0,'C',0);$pdf->Cell($w[8],5,'Kerja','LR',0,'C',0);$pdf->Cell($w[9],5,'Kerja','LR',1,'C',0);
                  $w = array(8,35,15,27,56,23,23,15,20,15,15,23);
                $pdf->Cell($w[0],5,'','LR',0,'c',0); $pdf->Cell($w[1],5,'','LR',0,'C',0); $pdf->Cell($w[2],5,'','LR',0,'C',0); $pdf->Cell($w[3],5,'','LR',0,'C',0); $pdf->Cell($w[4],5,'','LR',0,'C',0); $pdf->Cell($w[5],5,'','LR',0,'C',0);$pdf->Cell($w[6],5,'Sesuai (S) /','LTR',0,'C',0);$pdf->Cell($w[7],5,'Nilai','LTR',0,'C',0); $pdf->Cell($w[8],5,'Sesuai (S) /','LTR',0,'C',0);$pdf->Cell($w[9],5,'Nilai','LTR',0,'C',0);$pdf->Cell($w[10],5,'','LR',0,'C',0);$pdf->Cell($w[11],5,'Profesional','LR',1,'C',0);
                $pdf->Cell($w[0],5,'','LR',0,'c',0); $pdf->Cell($w[1],5,'','LR',0,'C',0); $pdf->Cell($w[2],5,'','LR',0,'C',0); $pdf->Cell($w[3],5,'','LR',0,'C',0); $pdf->Cell($w[4],5,'','LR',0,'C',0); $pdf->Cell($w[5],5,'','LR',0,'C',0);$pdf->Cell($w[6],5,'Menunjang/','LR',0,'C',0);$pdf->Cell($w[7],5,'','LR',0,'C',0); $pdf->Cell($w[8],5,'Tidak','LR',0,'C',0);$pdf->Cell($w[9],5,'','LR',0,'C',0);$pdf->Cell($w[10],5,'','LR',0,'C',0);$pdf->Cell($w[11],5,'','LR',1,'C',0);
                $pdf->Cell($w[0],5,'','LRB',0,'c',0); $pdf->Cell($w[1],5,'','LRB',0,'C',0); $pdf->Cell($w[2],5,'','LRB',0,'C',0); $pdf->Cell($w[3],5,'','LRB',0,'C',0); $pdf->Cell($w[4],5,'','LRB',0,'C',0); $pdf->Cell($w[5],5,'','LRB',0,'C',0);$pdf->Cell($w[6],5,'Terkait (M)','LRB',0,'C',0);$pdf->Cell($w[7],5,'','LRB',0,'C',0); $pdf->Cell($w[8],5,'Sesuai (T)','LRB',0,'C',0);$pdf->Cell($w[9],5,'','LRB',0,'C',0);$pdf->Cell($w[10],5,'','LRB',0,'C',0);$pdf->Cell($w[11],5,'','LRB',1,'C',0);

		$pdf->SetFont('Arial','',11);
		$pdf->SetAligns('L');
                $pdf->SetWidths($w);
                $pdf->SetRataKanan(5);
		$last=0;
                $lastname='empty';
                $no=0;                
                //isi    
                $jum=0;
                $masakerja=-99;
                $first = -99;
                foreach ($pk as $rowpk) {
                    if(($rowpk->dtk_sub_judul != '-99')&&($rowpk->dtk_sub_judul !=$last)){
                        if($masakerja!=-99){
                            $pdf->Row(array('','','', '' ,'','','','','','','',$masakerja)); 
                            $masakerja=-99;    
                        }
                        $pdf->SetFont('Arial','B',11); $last=$rowpk->dtk_sub_judul; 
                        $pdf->Row(array('',$rowpk->sjd_sub_judul,'', '' ,'','','','','','','','')); 
                        $no=0; 
                                              
                    }
		                
        	$pdf->SetFont('Arial','',11);
                    if($rowpk->psi_nama==$lastname){
                        $first = 1;
                        $nomor='';$nama='';$bobot='';$jabatan='';                        
                    } else {  
                        if($first!=-99 && $masakerja!=-99){
                            $pdf->Row(array('','','', '' ,'','','','','','','',$masakerja)); 
                            $first = -99;
                        }
                        
                     $no++; $nomor=$no; $nama=$rowpk->psi_nama;$bobot=$rowpk->psi_bobot; $jabatan=$rowpk->dtk_jabatan;
                
                    }
                 $masakerja=$rowpk->psi_masa_kerja;   
                $pdf->Row(array($nomor,$nama,$bobot,$jabatan,$rowpk->pnk_uraian_pengalaman,$rowpk->pnk_jangka_wkt_bln+0,$rowpk->pnk_kesesuaian_pekerjaan,$rowpk->pnk_nilai_pekerjaan+0,$rowpk->pnk_kesesuaian_posisi,$rowpk->pnk_nilai_posisi+0,$rowpk->pnk_perhitungan_bln_kerja,'')); 
		  //if($rowpk->psi_nama==$lastname){ }
                $lastname=$rowpk->psi_nama;
              
                //$jum+=$rowpi->psi_jumlah;        
                }
                $pdf->Row(array('','','', '' ,'','','','','','','',$masakerja));
//                $pdf->SetFont('Arial','B',11);
//		$pdf->Cell($w[0],7,'','LTB',0,'c',0); $pdf->Cell($w[1],7,'Total','TB',0,'C',0); $pdf->Cell($w[2],7,'','TB',0,'C',0); $pdf->Cell($w[3],7,'','TB',0,'C',0); $pdf->Cell($w[4],7,'','TB',0,'C',0); $pdf->Cell($w[5],7,'','TB',0,'C',0);$pdf->Cell($w[6],7,'','TB',0,'C',0);$pdf->Cell($w[7],7,'','TB',0,'C',0);$pdf->Cell($w[8],7,'','TB',0,'R',0);$pdf->Cell($w[9],7,'','TB',0,'R',0);$pdf->Cell($w[10],7,'','TB',0,'R',0);$pdf->Cell($w[11],7,'','TB',0,'R',0);$pdf->Cell($w[12],7,'','TB',0,'R',0);$pdf->Cell($w[13],7,'','TB',0,'R',0); $pdf->Cell($w[14],7,$pdf->formatrupiah($jum),1,1,'R',0);
//
//                if($pdf->getY()>134) {
//		$pdf->AddPage('L');	
//		}
//                $pdf->Ln(10);
//            
//                $pdf->Cell(100,6,'Jakarta, '.$pdf->tanggal("j M Y", $tanggalK) ,0,3,'L');
//		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,3,'L'); 
//		$pdf->Cell(90,6,'Satker Biro Umum Sekretariat Jenderal',0,3,'L');
//		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,3,'L');
//		$pdf->Ln(15);
//	
//                $pdf->Cell(90,6,$d->pgd_nama_pejpeng,0,3,'L');                
                
}               
                                
	$pdf->Output();	
?>		