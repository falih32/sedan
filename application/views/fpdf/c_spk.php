<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);
$pdf->AddPage();

		$pdf->Ln(45);
		$pdf->SetFont('Arial','B',12);
                $posy=$pdf->GetY(); $pdf->MultiCell(60,5,'','LTR','C'); 
                $pdf->MultiCell(60,5,'SURAT PERINTAH KERJA (SPK)','LR','C');
                $pdf->MultiCell(60,5,'','LR','C');
                $pdf->SetFont('Arial','',12);
                $pdf->MultiCell(60,5,'Halaman 1 dari 6',1,'L'); $x1=$pdf->GetX(); $y1=$pdf->GetY();
                $pdf->MultiCell(60,5,'Paket Pekerjaan : '.$d->pgd_perihal,'LR','L');
                $pdf->SetXY(75, $posy);
                $pdf->MultiCell(125,5,'SATUAN KERJA : SATKER BIRO UMUM SETJEN KEMENTERIAN KELAUTAN DAN PERIKANAN',1,'J');
                $pdf->SetXY(75, $posy+10);
                $pdf->MultiCell(125,5,'Nomor SPK : '.$nospk.'
Tanggal '.$pdf->tanggal("j M Y",$tglspk),'LR','L');
				$pdf->SetXY(75, $posy+20); $pdf->MultiCell(125,5,'','LR','C');
				$pdf->SetXY(75, $posy+25);$pdf->MultiCell(125,5,'Nomor dan Tanggal Surat Undangan Pengadaan Langsung '.$noundangan->dknt_isi.' tanggal '.$pdf->tanggal("j M Y",$tglundangan->dknt_isi),'LTR','J');
				$pdf->SetXY(75, $posy+35);$pdf->MultiCell(125,5,'Nomor dan Tanggal Berita Acara Hasil Pengadaan Langsung '.$nohasilP->dknt_isi.' tanggal '.$pdf->tanggal("j M Y",$tglhasilP->dknt_isi),'LTR','J');
                                $pdf->SetXY(75, $posy+45);$pdf->MultiCell(125,5,'SPK ini mulai berlaku efektif terhitung sejak tanggal diterbitkannya SP dan penyelesaian keseluruhan pekerjaan sebagaimana diatur dalam SPK ini.',1,'J');
                                $x2=$pdf->GetX(); $y2=$pdf->GetY();
                $pdf->Line($x1, $y1, $x2, $y2);
                $pdf->Line($x2, $y2, $x2+60, $y2);
                
                $pdf->MultiCell(0,5,'Sumber Dana : dibebankan atas DIPA '.$dipa->dipa_nomor.' Tanggal '.$pdf->tanggal("j M Y",$dipa->dipa_tanggal).' untuk mata anggaran kegiatan '.$d->pgd_anggaran,1,'J');
                $pdf->MultiCell(0,5,'Waktu Pelaksanaan Pekerjaan: '.$d->pgd_lama_pekerjaan.' Hari Kalender terhitung sejak tanggal '.$pdf->tanggal("j M Y",$tglawal).' s.d '.$pdf->tanggal("j M Y",$tglakhir),1,'J');
                $pdf->MultiCell(0,5,'NILAI PEKERJAAN',1,'C');
                $header = array('No', 'Uraian Pekerjaan', 'Kuantitas','Satuan Ukuran','Harga Satuan (Rp.)','Total (Rp.)');
                $w = array(10,60,25,30,30,30);
		$pdf->SetWidths($w);
                $pdf->SetAligns('C');
		for($i=0;$i<1;$i++){
			$pdf->Row1($header); 
		}
                $pdf->SetAligns('L');
                $pdf->SetRataKanan(4);
//		foreach ($listpeng as $row) {
                for($i=0;$i<1;$i++){
			$pdf->Row(array('1',$d->pgd_perihal, 'terlampir' ,'terlampir',$pdf->formatrupiah($d->pgd_jml_sblm_ppn_fix) ,$pdf->formatrupiah($d->pgd_jml_sblm_ppn_fix))); 
		}
                if($d->pgd_dgn_pajak==0){
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'L',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'',1,0,'R',0);$pdf->Cell($w[5],7,$pdf->formatrupiah($d->pgd_jml_sblm_ppn_fix),1,1,'R',0);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'PPN 10%',1,0,'L',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'',1,0,'R',0); $pdf->Cell($w[5],7,$pdf->formatrupiah(0.1*$d->pgd_jml_sblm_ppn_fix),1,1,'R',0);
                }
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'L',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'',1,0,'R',0); $pdf->SetFont('Arial','B',12); $pdf->Cell($w[5],7,$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_fix),1,1,'R',0);		
                $pdf->SetFont('Arial','',12);
                $cAngka = $pdf->Terbilang($d->pgd_jml_ssdh_ppn_fix);
		$b = ucfirst(strtolower($cAngka));
		$pdf->MultiCell(0,5,'Terbilang : ('.$b.' rupiah )',1,'L');
                $pdf->MultiCell(0,5,'Instruksi Kepada Penyedia : Penagihan hanya dapat dilakukan setelah penyelesaian pekerjaan yang diperintahkan dalam SPK ini dan dibuktikan dengan Berita Acara Serah Terima. Jika pekerjaan tidak dapat diselesaikan dalam jangka waktu pelaksanaan pekerjaan karena kesalahan atau kelalaian Penyedia maka Penyedia berkewajiban untuk membayar denda kepada PPK sebesar 1/1000 (satu per seribu) dari nilai SPK atau nilai bagian SPK untuk setiap hari keterlambatan.',1,'J');
                $xb1=$pdf->GetX(); $yb1=$pdf->GetY();
                $pdf->Cell(95,6,'Untuk dan atas nama Satker Biro Umum Setjen','LR',0,'L');	$pdf->Cell(90,6,'Untuk dan atas nama penyedia','LR',1,'L'); 
		$pdf->Cell(95,6,'Kementerian Kelautan dan Perikanan',0,0,'L');	$pdf->Cell(90,6,'','LR',1,'L');
		$pdf->Cell(95,6,'Pejabat Pembuat Komitmen',0,0,'L'); $pdf->Cell(90,6,$d->spl_nama,'LR',1,'L');
		$pdf->Ln(15);
		$pdf->Cell(95,6,$d->pgd_nama_ppk,0,0,'L');	$pdf->Cell(90,6,$d->pgd_perwakilan_spl,0,1,'L');
                $pdf->Cell(95,5,'','B',0,'L');	$pdf->Cell(90,5,$d->pgd_jbt_perwakilan_spl,'B',1,'L');
                $xb2=$pdf->GetX(); $yb2=$pdf->GetY();
                $pdf->Line($xb1, $yb1, $xb2, $yb2); $pdf->Line($xb1+95, $yb1, $xb2+95, $yb2); $pdf->Line($xb1+185, $yb1, $xb2+185, $yb2);

//-------------------------------------terusan---------------------------------------------------
 $pdf->AddPage();
 $pdf->Line(15, 10, 200, 10);//horizontal atas
 $pdf->Line(15, 10, 15, 280);//vertikal kiri
 $pdf->Line(200, 10, 200, 280);//vertikal kanan
 $pdf->Line(15, 280, 200, 280);//horizon bawah
 $pdf->SetFont('Arial','BU',11);
 $pdf->Cell(0,5,'SYARAT UMUM',0,3,'C');
 $pdf->SetFont('Arial','B',11);
 $pdf->Cell(0,5,'SURAT PERINTAH KERJA (SPK)',0,3,'C');
 $pdf->Ln(5);
 $pdf->SetFont('Arial','',11);
 $pdf->Cell(10,5,'1.',0,0,'L'); $pdf->MultiCell(170,5,'LINGKUP PEKERJAAN
Penyedia yang ditunjuk berkewajiban untuk menyelesaikan pekerjaan dalam jangka waktu yang ditentukan, sesuai dengan volume, spesifikasi teknis dan harga yang tercantum dalam SPK.',0,'J');
 $pdf->Ln(3);
 $pdf->Cell(10,5,'2.',0,0,'L'); $pdf->MultiCell(170,5,'HUKUM YANG BERLAKU 
Keabsahan, interpretasi, dan pelaksanaan SPK ini didasarkan kepada hukum Republik Indonesia.',0,'J');
 $pdf->Ln(3);
 $pdf->Cell(10,5,'3.',0,0,'L'); $pdf->Cell(170,5,'HARGA SPK',0,3,'L');$pdf->Cell(7,5,'a.',0,0,'L');$pdf->MultiCell(163,5,'PPK membayar kepada penyedia atas pelaksanaan pekerjaan dalam SPK sebesar harga SPK.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'b.',0,0,'L');$pdf->MultiCell(163,5,'Harga SPK telah memperhitungkan keuntungan, beban pajak dan biaya overhead serta biaya asuransi (apabila dipersyaratkan).',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'c.',0,0,'L');$pdf->MultiCell(163,5,'Rincian harga SPK sesuai dengan rincian yang tercantum dalam daftar kuantitas dan harga ',0,'J');
 $pdf->Ln(3);
 $pdf->Cell(10,5,'4.',0,0,'L'); $pdf->Cell(170,5,'HAK KEPEMILIKAN',0,3,'L');$pdf->Cell(7,5,'a.',0,0,'L');$pdf->MultiCell(163,5,'PPK berhak atas kepemilikan semua barang/bahan yang terkait langsung atau disediakan sehubungan dengan jasa yang diberikan oleh penyedia kepada PPK. Jika diminta oleh PPK maka penyedia berkewajiban untuk membantu secara optimal pengalihan hak kepemilikan tersebut kepada PPK sesuai dengan hukum yang berlaku.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'b.',0,0,'L');$pdf->MultiCell(163,5,'Hak kepemilikan atas peralatan dan barang/bahan yang disediakan oleh PPK tetap pada PPK, dan semua peralatan tersebut harus dikembalikan kepada PPK pada saat SPK berakhir atau jika tidak diperlukan lagi oleh penyedia. Semua peralatan tersebut harus dikembalikan dalam kondisi yang sama pada saat diberikan kepada penyedia dengan pengecualian keausan akibat pemakaian yang wajar.',0,'J');
 $pdf->Ln(3);
 $pdf->Cell(10,5,'5.',0,0,'L'); $pdf->MultiCell(170,5,'CACAT MUTU
PPK akan memeriksa setiap hasil pekerjaan penyedia dan memberitahukan secara tertulis penyedia atas setiap cacat mutu yang ditemukan. PPK dapat memerintahkan penyedia untuk menemukan dan mengungkapkan cacat mutu, serta menguji pekerjaan yang dianggap oleh PPK mengandung cacat mutu. Penyedia bertanggung jawab atas cacat mutu selama 6 (enam) bulan setelah serah terima hasil pekerjaan.',0,'J');
 $pdf->Ln(3);
 $pdf->Cell(10,5,'6.',0,0,'L'); $pdf->MultiCell(170,5,'PERPAJAKAN 
Penyedia berkewajiban untuk membayar semua pajak, bea, retribusi, dan pungutan lain yang sah yang dibebankan oleh hukum yang berlaku atas pelaksanaan SPK. Semua pengeluaran perpajakan ini dianggap telah termasuk dalam harga SPK.',0,'J');
$pdf->Ln(3);
$pdf->Cell(10,5,'7.',0,0,'L'); $pdf->MultiCell(170,5,'PENGALIHAN DAN/ATAU SUBKONTRAK 
Penyedia dilarang untuk mengalihkan dan/atau mensubkontrakkan sebagian atau seluruh pekerjaan, kecuali kepada penyedia spesialis untuk bagian pekerjaan tertentu. Pengalihan seluruh pekerjaan hanya diperbolehkan dalam hal pergantian nama penyedia, baik sebagai akibat peleburan (merger) atau akibat lainnya.',0,'J');
$pdf->Ln(3);
 $pdf->Cell(10,5,'8.',0,0,'L'); $pdf->Cell(170,5,'JADWAL',0,3,'L');$pdf->Cell(7,5,'a.',0,0,'L');$pdf->MultiCell(163,5,'SPK ini berlaku efektif pada tanggal penandatanganan oleh para pihak atau pada tanggal yang ditetapkan dalam SPMK.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'b.',0,0,'L');$pdf->MultiCell(163,5,'Waktu pelaksanaan SPK adalah sejak tanggal mulai kerja yang tercantum dalam SPMK.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'c.',0,0,'L');$pdf->MultiCell(163,5,'Penyedia harus menyelesaikan pekerjaan sesuai jadwal yang ditentukan',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'d.',0,0,'L');$pdf->MultiCell(163,5,'Apabila penyedia berpendapat tidak dapat menyelesaikan pekerjaan sesuai jadwal karena keadaan diluar pengendaliannya dan penyedia telah melaporkan kejadian tersebut kepada PPK, maka PPK dapat melakukan penjadwalan kembali pelaksanaan tugas penyedia dengan adendum SPK.',0,'J');
 $pdf->Ln(3);
 $pdf->AddPage();
 $pdf->Line(15, 10, 200, 10);//horizontal atas
 $pdf->Line(15, 10, 15, 280);//vertikal kiri
 $pdf->Line(200, 10, 200, 280);//vertikal kanan
 $pdf->Line(15, 280, 200, 280);//horizon bawah
 $pdf->Cell(10,5,'9.',0,0,'L'); $pdf->Cell(170,5,'ASURANSI',0,3,'L');$pdf->Cell(7,5,'a.',0,0,'L');$pdf->MultiCell(163,5,'Apabila dipersyaratkan, penyedia wajib menyediakan asuransi sejak SP sampai dengan tanggal selesainya pemeliharaan untuk:',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'1)',0,0,'L');$pdf->MultiCell(156,5,'semua Jasa Lainnya dan peralatan yang mempunyai risiko tinggi terjadinya kecelakaan, pelaksanaan pekerjaan, serta pekerja untuk pelaksanaan pekerjaan, atas segala risiko terhadap kecelakaan, kerusakan, kehilangan, serta risiko lain yang tidak dapat diduga;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'2)',0,0,'L');$pdf->MultiCell(156,5,'pihak ketiga sebagai akibat kecelakaan di tempat kerjanya; dan',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'b.',0,0,'L');$pdf->MultiCell(163,5,'Besarnya asuransi sudah diperhitungkan dalam penawaran dan termasuk dalam harga SPK',0,'J');
 $pdf->Ln(3);
 $pdf->Cell(10,5,'10.',0,0,'L'); $pdf->Cell(170,5,'PENANGGUNGAN DAN RISIKO',0,3,'L');$pdf->Cell(7,5,'a.',0,0,'L');$pdf->MultiCell(163,5,'Penyedia berkewajiban untuk melindungi, membebaskan, dan menanggung tanpa batas PPK beserta instansinya terhadap semua bentuk tuntutan, tanggung jawab, kewajiban, kehilangan, kerugian, denda, gugatan atau tuntutan hukum, proses pemeriksaan hukum, dan biaya yang dikenakan terhadap PPK beserta instansinya (kecuali kerugian yang mendasari tuntutan tersebut disebabkan kesalahan atau kelalaian berat PPK) sehubungan dengan klaim yang timbul dari hal-hal berikut terhitung sejak Tanggal Mulai Kerja sampai dengan tanggal penandatanganan berita acara penyerahan akhir:',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'1)',0,0,'L');$pdf->MultiCell(156,5,'kehilangan atau kerusakan peralatan dan harta benda penyedia dan Personil;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'2)',0,0,'L');$pdf->MultiCell(156,5,'cidera tubuh, sakit atau kematian Personil;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'3)',0,0,'L');$pdf->MultiCell(156,5,'3)	kehilangan atau kerusakan harta benda, dan cidera tubuh, sakit atau kematian pihak ketiga;',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'b.',0,0,'L');$pdf->MultiCell(163,5,'Terhitung sejak Tanggal Mulai Kerja sampai dengan tanggal penandatanganan berita acara penyerahan awal, semua risiko kehilangan atau kerusakan Hasil Pekerjaan ini, Bahan dan Perlengkapan merupakan risiko penyedia, kecuali kerugian atau kerusakan tersebut diakibatkan oleh kesalahan atau kelalaian PPK.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'c.',0,0,'L');$pdf->MultiCell(163,5,'Pertanggungan asuransi yang dimiliki oleh penyedia tidak membatasi kewajiban penanggungan dalam syarat ini.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'d.',0,0,'L');$pdf->MultiCell(163,5,'Kehilangan atau kerusakan terhadap Hasil Pekerjaan atau Bahan yang menyatu dengan Hasil Pekerjaan selama Tanggal Mulai Kerja dan batas akhir Masa Pemeliharaan harus diganti atau diperbaiki oleh penyedia atas tanggungannya sendiri jika kehilangan atau kerusakan tersebut terjadi akibat tindakan atau kelalaian penyedia.',0,'J');
 $pdf->Ln(3);
 $pdf->Cell(10,5,'11.',0,0,'L'); $pdf->MultiCell(170,5,'PENGAWASAN DAN PEMERIKSAAN
PPK berwenang melakukan pengawasan dan pemeriksaan terhadap pelaksanaan pekerjaan yang dilaksanakan oleh penyedia. Apabila diperlukan, PPK dapat memerintahkan kepada pihak ketiga untuk melakukan pengawasan dan pemeriksaan atas semua pelaksanaan pekerjaan yang dilaksanakan oleh penyedia.',0,'J');
 $pdf->Ln(3);
 $pdf->Cell(10,5,'12.',0,0,'L'); $pdf->MultiCell(170,5,'PENGUJIAN
Jika PPK atau Pengawas Pekerjaan memerintahkan penyedia untuk melakukan pengujian Cacat Mutu yang tidak tercantum dalam Spesifikasi Teknis dan Gambar, dan hasil uji coba menunjukkan adanya Cacat Mutu maka penyedia berkewajiban untuk menanggung biaya pengujian tersebut. Jika tidak ditemukan adanya Cacat Mutu maka uji coba tersebut dianggap sebagai Peristiwa Kompensasi.',0,'J');
 $pdf->Ln(3);
 $pdf->Cell(10,5,'13.',0,0,'L'); $pdf->Cell(170,5,'LAPORAN HASIL PEKERJAAN',0,3,'L');$pdf->Cell(7,5,'a.',0,0,'L');$pdf->MultiCell(163,5,'Pemeriksaan pekerjaan dilakukan selama pelaksanaan SPK untuk menetapkan volume pekerjaan atau kegiatan yang telah dilaksanakan guna pembayaran hasil pekerjaan. Hasil pemeriksaan pekerjaan dituangkan dalam laporan kemajuan hasil pekerjaan.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'b.',0,0,'L');$pdf->MultiCell(163,5,'Untuk merekam kegiatan pelaksanaan proyek, PPK menugaskan Pejabat Penerima Hasil Pekerjaan membuat foto-foto dokumentasi pelaksanaan pekerjaan di lokasi pekerjaan.',0,'J');
 $pdf->Ln(3);
 $pdf->AddPage();
 $pdf->Line(15, 10, 200, 10);//horizontal atas
 $pdf->Line(15, 10, 15, 280);//vertikal kiri
 $pdf->Line(200, 10, 200, 280);//vertikal kanan
 $pdf->Line(15, 280, 200, 280);//horizon bawah
 $pdf->Cell(10,5,'14.',0,0,'L'); $pdf->Cell(170,5,'WAKTU PENYELESAIAN PEKERJAAN',0,3,'L');$pdf->Cell(7,5,'a.',0,0,'L');$pdf->MultiCell(163,5,'Kecuali SPK diputuskan lebih awal, penyedia berkewajiban untuk memulai pelaksanaan pekerjaan pada Tanggal Mulai Kerja, dan melaksanakan pekerjaan sesuai dengan program mutu, serta menyelesaikan pekerjaan selambat-lambatnya pada Tanggal Penyelesaian yang ditetapkan dalam SP.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'b.',0,0,'L');$pdf->MultiCell(163,5,'Jika pekerjaan tidak selesai pada Tanggal Penyelesaian bukan akibat Keadaan Kahar atau Peristiwa Kompensasi atau karena kesalahan atau kelalaian penyedia maka penyedia dikenakan denda.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'c.',0,0,'L');$pdf->MultiCell(163,5,'Jika keterlambatan tersebut semata-mata disebabkan oleh Peristiwa Kompensasi maka PPK dikenakan kewajiban pembayaran ganti rugi. Denda atau ganti rugi tidak dikenakan jika Tanggal Penyelesaian disepakati oleh Para Pihak untuk diperpanjang.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'d.',0,0,'L');$pdf->MultiCell(163,5,'Tanggal Penyelesaian yang dimaksud dalam ketentuan ini adalah tanggal penyelesaian semua pekerjaan.',0,'J');
 $pdf->Ln(3);
 $pdf->Cell(10,5,'15.',0,0,'L'); $pdf->Cell(170,5,'SERAH TERIMA PEKERJAAN',0,3,'L');$pdf->Cell(7,5,'a.',0,0,'L');$pdf->MultiCell(163,5,'Setelah pekerjaan selesai 100% (seratus perseratus), penyedia mengajukan permintaan secara tertulis kepada PPK untuk penyerahan pekerjaan.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'b.',0,0,'L');$pdf->MultiCell(163,5,'Dalam rangka penilaian hasil pekerjaan, PPK menugaskan Pejabat Penerima Hasil Pekerjaan.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'c.',0,0,'L');$pdf->MultiCell(163,5,'Pejabat Penerima Hasil Pekerjaan melakukan penilaian terhadap hasil pekerjaan yang telah diselesaikan oleh penyedia. Apabila terdapat kekurangan-kekurangan dan/atau cacat hasil pekerjaan, penyedia wajib memperbaiki/menyelesaikannya, atas perintah PPK.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'d.',0,0,'L');$pdf->MultiCell(163,5,'PPK menerima penyerahan pertama pekerjaan setelah seluruh hasil pekerjaan dilaksanakan sesuai dengan ketentuan SPK dan diterima oleh Pejabat Penerima Hasil Pekerjaan.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'e.',0,0,'L');$pdf->MultiCell(163,5,'Pembayaran dilakukan sebesar 100% (seratus perseratus) dari harga SPK dan penyedia harus menyerahkan Sertifikat Garansi sebesar 5% (lima perseratus) dari harga SPK.',0,'J');
 $pdf->Ln(3);
 $pdf->Cell(10,5,'16.',0,0,'L'); $pdf->Cell(170,5,'JAMINAN BEBAS CACAT MUTU/GARANSI',0,3,'L');$pdf->Cell(7,5,'a.',0,0,'L');$pdf->MultiCell(163,5,'Penyedia dengan jaminan pabrikan dari produsen pabrikan (jika ada) berkewajiban untuk menjamin bahwa selama penggunaan secara wajar oleh PPK, Jasa Lainnya tidak mengandung cacat mutu yang disebabkan oleh tindakan atau kelalaian Penyedia, atau cacat mutu akibat desain, bahan, dan cara kerja.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'b.',0,0,'L');$pdf->MultiCell(163,5,'PPK akan menyampaikan pemberitahuan cacat mutu kepada Penyedia segera setelah ditemukan cacat mutu tersebut selama Masa Layanan Purnajual.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'c.',0,0,'L');$pdf->MultiCell(163,5,'Terhadap pemberitahuan cacat mutu oleh PPK, Penyedia berkewajiban untuk memperbaiki atau mengganti Jasa Lainnya dalam jangka waktu yang ditetapkan dalam pemberitahuan tersebut.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'d.',0,0,'L');$pdf->MultiCell(163,5,'Jika Penyedia tidak memperbaiki atau mengganti Jasa Lainnya akibat cacat mutu dalam jangka waktu yang ditentukan maka PPK akan menghitung biaya perbaikan yang diperlukan, dan PPK secara langsung atau melalui pihak ketiga yang ditunjuk oleh PPK akan melakukan perbaikan tersebut. Penyedia berkewajiban untuk membayar biaya perbaikan atau penggantian tersebut sesuai dengan klaim yang diajukan secara tertulis oleh PPK. Biaya tersebut dapat dipotong oleh PPK dari nilai tagihan Penyedia.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'e.',0,0,'L');$pdf->MultiCell(163,5,'Terlepas dari kewajiban penggantian biaya,  PPK dapat memasukkan Penyedia yang lalai memperbaiki cacat mutu ke dalam daftar hitam.',0,'J');
 $pdf->Ln(3);
 $pdf->Cell(10,5,'17.',0,0,'L'); $pdf->Cell(170,5,'PERUBAHAN SPK',0,3,'L');$pdf->Cell(7,5,'a.',0,0,'L');$pdf->MultiCell(163,5,'SPK hanya dapat diubah melalui adendum SPK.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'b.',0,0,'L');$pdf->MultiCell(163,5,'Perubahan SPK bisa dilaksanakan apabila disetujui oleh para pihak, meliputi:',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'a.',0,0,'L');$pdf->MultiCell(156,5,'perubahan pekerjaan disebabkan oleh sesuatu hal yang dilakukan oleh para pihak dalam SPK sehingga mengubah lingkup pekerjaan dalam SPK;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'b.',0,0,'L');$pdf->MultiCell(156,5,'perubahan jadwal pelaksanaan pekerjaan akibat adanya perubahan pekerjaan; ',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'c.',0,0,'L');$pdf->MultiCell(156,5,'perubahan harga SPK akibat adanya perubahan pekerjaan dan/atau perubahan pelaksanaan pekerjaan.',0,'J');
 $pdf->AddPage();
 $pdf->Line(15, 10, 200, 10);//horizontal atas
 $pdf->Line(15, 10, 15, 280);//vertikal kiri
 $pdf->Line(200, 10, 200, 280);//vertikal kanan
 $pdf->Line(15, 280, 200, 280);//horizon bawah
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'c.',0,0,'L');$pdf->MultiCell(163,5,'Untuk kepentingan perubahan SPK, PA/KPA dapat membentuk Pejabat Peneliti Pelaksanaan Kontrak atas usul PPK.',0,'J');
 $pdf->Ln(3);
 $pdf->Cell(10,5,'18.',0,0,'L'); $pdf->Cell(170,5,'PERISTIWA KOMPENSASI',0,3,'L');$pdf->Cell(7,5,'a.',0,0,'L');$pdf->MultiCell(163,5,'Peristiwa Kompensasi dapat diberikan kepada penyedia dalam hal sebagai berikut:',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'1)',0,0,'L');$pdf->MultiCell(156,5,'PPK mengubah jadwal yang dapat mempengaruhi pelaksanaan pekerjaan;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'2)',0,0,'L');$pdf->MultiCell(156,5,'keterlambatan pembayaran kepada penyedia;  ',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'3)',0,0,'L');$pdf->MultiCell(156,5,'PPK tidak memberikan gambar-gambar, spesifikasi dan/atau instruksi sesuai jadwal yang dibutuhkan;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'4)',0,0,'L');$pdf->MultiCell(156,5,'penyedia belum bisa masuk ke lokasi sesuai jadwal;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'5)',0,0,'L');$pdf->MultiCell(156,5,'PPK menginstruksikan kepada pihak penyedia untuk melakukan pengujian tambahan yang setelah dilaksanakan pengujian ternyata tidak ditemukan kerusakan/kegagalan/penyimpangan;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'6)',0,0,'L');$pdf->MultiCell(156,5,'PPK memerintahkan penundaan pelaksanaan pekerjaan;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'7)',0,0,'L');$pdf->MultiCell(156,5,'PPK memerintahkan untuk mengatasi kondisi tertentu yang tidak dapat diduga sebelumnya dan disebabkan oleh PPK;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'8)',0,0,'L');$pdf->MultiCell(156,5,'ketentuan lain dalam SPK.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'b.',0,0,'L');$pdf->MultiCell(163,5,'Jika Peristiwa Kompensasi mengakibatkan pengeluaran tambahan dan/atau keterlambatan penyelesaian pekerjaan maka PPK berkewajiban untuk membayar ganti rugi dan/atau memberikan perpanjangan waktu penyelesaian pekerjaan.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'c.',0,0,'L');$pdf->MultiCell(163,5,'Ganti rugi hanya dapat dibayarkan jika berdasarkan data penunjang dan perhitungan kompensasi yang diajukan oleh penyedia kepada PPK, dapat dibuktikan kerugian nyata akibat Peristiwa Kompensasi.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'d.',0,0,'L');$pdf->MultiCell(163,5,'Perpanjangan waktu penyelesaian pekerjaan hanya dapat diberikan jika berdasarkan data penunjang dan perhitungan kompensasi yang diajukan oleh penyedia kepada PPK, dapat dibuktikan perlunya tambahan waktu akibat Peristiwa Kompensasi.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'e.',0,0,'L');$pdf->MultiCell(163,5,'Penyedia tidak berhak atas ganti rugi dan/atau perpanjangan waktu penyelesaian pekerjaan jika penyedia gagal atau lalai untuk memberikan peringatan dini dalam mengantisipasi atau mengatasi dampak Peristiwa Kompensasi.',0,'J');
 $pdf->Ln(3);
 $pdf->Cell(10,5,'19.',0,0,'L'); $pdf->Cell(170,5,'PERPANJANGAN WAKTU',0,3,'L');$pdf->Cell(7,5,'a.',0,0,'L');$pdf->MultiCell(163,5,'Jika terjadi Peristiwa Kompensasi sehingga penyelesaian pekerjaan akan melampaui Tanggal Penyelesaian maka penyedia berhak untuk meminta perpanjangan Tanggal Penyelesaian berdasarkan data penunjang. PPK berdasarkan pertimbangan Pengawas Pekerjaan memperpanjang Tanggal Penyelesaian Pekerjaan secara tertulis. Perpanjangan Tanggal Penyelesaian harus dilakukan melalui adendum SPK jika perpanjangan tersebut mengubah Masa SPK.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'b.',0,0,'L');$pdf->MultiCell(163,5,'PPK dapat menyetujui perpanjangan waktu pelaksanaan setelah melakukan penelitian terhadap usulan tertulis yang diajukan oleh penyedia.',0,'J');
$pdf->Ln(3);
 $pdf->Cell(10,5,'20.',0,0,'L'); $pdf->Cell(170,5,'PENGHENTIAN DAN PEMUTUSAN SPK',0,3,'L');$pdf->Cell(7,5,'a.',0,0,'L');$pdf->MultiCell(163,5,'Penghentian SPK dapat dilakukan karena pekerjaan sudah selesai atau terjadi Keadaan Kahar.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'b.',0,0,'L');$pdf->MultiCell(163,5,'Dalam hal SPK dihentikan, maka PPK wajib membayar kepada penyedia sesuai dengan prestasi pekerjaan yang telah dicapai, termasuk:',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'1)',0,0,'L');$pdf->MultiCell(156,5,'biaya langsung pengadaan bahan dan perlengkapan untuk pekerjaan ini. Bahan dan perlengkapan ini harus diserahkan oleh Penyedia kepada PPK, dan selanjutnya menjadi hak milik PPK;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'2)',0,0,'L');$pdf->MultiCell(156,5,'biaya langsung pembongkaran dan demobilisasi hasil pekerjaan sementara dan peralatan; ',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'3)',0,0,'L');$pdf->MultiCell(156,5,'biaya langsung demobilisasi personil.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'c.',0,0,'L');$pdf->MultiCell(163,5,'Pemutusan SPK dapat dilakukan oleh pihak penyedia atau pihak PPK.',0,'J');
 $pdf->AddPage();
 $pdf->Line(15, 10, 200, 10);//horizontal atas
 $pdf->Line(15, 10, 15, 280);//vertikal kiri
 $pdf->Line(200, 10, 200, 280);//vertikal kanan
 $pdf->Line(15, 280, 200, 280);//horizon bawah
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'d.',0,0,'L');$pdf->MultiCell(163,5,'Menyimpang dari Pasal 1266 dan 1267 Kitab Undang-Undang Hukum Perdata, pemutusan SPK melalui pemberitahuan tertulis dapat dilakukan apabila:',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'1)',0,0,'L');$pdf->MultiCell(156,5,'penyedia lalai/cidera janji dalam melaksanakan kewajibannya dan tidak memperbaiki kelalaiannya dalam jangka waktu yang telah ditetapkan;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'2)',0,0,'L');$pdf->MultiCell(156,5,'penyedia tanpa persetujuan Pengawas Pekerjaan, tidak memulai pelaksanaan pekerjaan;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'3)',0,0,'L');$pdf->MultiCell(156,5,'penyedia menghentikan pekerjaan selama 28 (dua puluh delapan) hari dan penghentian ini tidak tercantum dalam program mutu serta tanpa persetujuan Pengawas Pekerjaan;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'4)',0,0,'L');$pdf->MultiCell(156,5,'penyedia berada dalam keadaan pailit;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'5)',0,0,'L');$pdf->MultiCell(156,5,'penyedia selama Masa SPK gagal memperbaiki Cacat Mutu dalam jangka waktu yang ditetapkan oleh PPK;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'6)',0,0,'L');$pdf->MultiCell(156,5,'denda keterlambatan pelaksanaan pekerjaan akibat kesalahan penyedia sudah melampaui 5% (lima perseratus) dari harga SPK dan PPK menilai bahwa Penyedia tidak akan sanggup menyelesaikan sisa pekerjaan;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'7)',0,0,'L');$pdf->MultiCell(156,5,'Pengawas Pekerjaan memerintahkan penyedia untuk menunda pelaksanaan atau kelanjutan pekerjaan, dan perintah tersebut tidak ditarik selama 28 (dua puluh delapan) hari;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'8)',0,0,'L');$pdf->MultiCell(156,5,'PPK tidak menerbitkan SPP untuk pembayaran tagihan angsuran sesuai dengan yang disepakati sebagaimana tercantum dalam SPK;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'9)',0,0,'L');$pdf->MultiCell(156,5,'penyedia terbukti melakukan KKN, kecurangan dan/atau pemalsuan dalam proses Pengadaan yang diputuskan oleh instansi yang berwenang; dan/atau',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'10)',0,0,'L');$pdf->MultiCell(156,5,'pengaduan tentang penyimpangan prosedur, dugaan KKN dan/atau pelanggaran persaingan sehat dalam pelaksanaan pengadaan dinyatakan benar oleh instansi yang berwenang.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'e.',0,0,'L');$pdf->MultiCell(163,5,'Dalam hal pemutusan SPK dilakukan karena kesalahan penyedia:',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'1)',0,0,'L');$pdf->MultiCell(156,5,'penyedia membayar denda; dan/atau',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'2)',0,0,'L');$pdf->MultiCell(156,5,'penyedia dimasukkan dalam Daftar Hitam.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'f.',0,0,'L');$pdf->MultiCell(163,5,'Dalam hal pemutusan SPK dilakukan karena PPK terlibat penyimpangan prosedur, melakukan KKN dan/atau pelanggaran persaingan sehat dalam pelaksanaan pengadaan, maka PPK dikenakan sanksi berdasarkan peraturan perundang-undangan.',0,'J'); 
 $pdf->Ln(3);
 $pdf->Cell(10,5,'21.',0,0,'L'); $pdf->Cell(170,5,'PEMBAYARAN',0,3,'L');$pdf->Cell(7,5,'a.',0,0,'L');$pdf->MultiCell(163,5,'pembayaran prestasi hasil pekerjaan yang disepakati dilakukan oleh PPK, dengan ketentuan:',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'1)',0,0,'L');$pdf->MultiCell(156,5,'penyedia telah mengajukan tagihan disertai laporan kemajuan hasil pekerjaan;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'2)',0,0,'L');$pdf->MultiCell(156,5,'pembayaran dilakukan dengan pembayaran secara sekaligus;',0,'J');
 $pdf->Cell(17,5,'',0,0,'L');                                       $pdf->Cell(7,5,'3)',0,0,'L');$pdf->MultiCell(156,5,'pembayaran harus dipotong denda (apabila ada), dan pajak;',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'b.',0,0,'L');$pdf->MultiCell(163,5,'pembayaran terakhir hanya dilakukan setelah pekerjaan selesai 100% (seratus perseratus) dan Berita Acara penyerahan pekerjaan diterbitkan.',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'c.',0,0,'L');$pdf->MultiCell(163,5,'PPK dalam kurun waktu 7 (tujuh) hari kerja setelah pengajuan permintaan pembayaran dari penyedia harus sudah mengajukan surat permintaan pembayaran kepada Pejabat Penandatangan Surat Perintah Membayar (PPSPM).',0,'J');
 $pdf->Cell(10,5,'',0,0,'L');                                       $pdf->Cell(7,5,'d.',0,0,'L');$pdf->MultiCell(163,5,'bila terdapat ketidaksesuaian dalam perhitungan angsuran, tidak akan menjadi alasan untuk menunda pembayaran. PPK dapat meminta penyedia untuk menyampaikan perhitungan prestasi sementara dengan mengesampingkan hal-hal yang sedang menjadi perselisihan. ',0,'J');
 $pdf->Ln(3);
 $pdf->Cell(10,5,'22.',0,0,'L'); $pdf->MultiCell(170,5,'DENDA
Penyedia berkewajiban untuk membayar sanksi finansial berupa Denda sebagai akibat wanprestasi atau cidera janji terhadap kewajiban-kewajiban penyedia dalam SPK ini. PPK mengenakan Denda dengan memotong angsuran pembayaran prestasi pekerjaan penyedia. Pembayaran Denda tidak mengurangi tanggung jawab kontraktual penyedia.',0,'J');
 $pdf->Ln(3);
$pdf->AddPage();
 $pdf->Line(15, 10, 200, 10);//horizontal atas
 $pdf->Line(15, 10, 15, 280);//vertikal kiri
 $pdf->Line(200, 10, 200, 280);//vertikal kanan
 $pdf->Line(15, 280, 200, 280);//horizon bawah 
 $pdf->Cell(10,5,'23.',0,0,'L'); $pdf->MultiCell(170,5,'PENYELESAIAN PERSELISIHAN
PPK dan penyedia berkewajiban untuk berupaya sungguh-sungguh menyelesaikan secara damai semua perselisihan yang timbul dari atau berhubungan dengan SPK ini atau interpretasinya selama atau setelah pelaksanaan pekerjaan.  Jika perselisihan tidak dapat diselesaikan secara musyawarah maka perselisihan akan diselesaikan melalui pengadilan negeri dalam wilayah hukum Republik Indonesia.',0,'J');
 $pdf->Ln(3);
 $pdf->Cell(10,5,'24.',0,0,'L'); $pdf->MultiCell(170,5,'LARANGAN PEMBERIAN KOMISI 
Penyedia menjamin bahwa tidak satu pun personil satuan kerja PPK telah atau akan menerima komisi atau keuntungan tidak sah lainnya baik langsung maupun tidak langsung dari SPK ini. Penyedia menyetujui bahwa pelanggaran syarat ini merupakan pelanggaran yang mendasar terhadap SPK ini.',0,'J');
 $pdf->Ln(3);
 



//-------------------------------------lampiran---------------------------------------------------
 $pdf->AddPage();
 $pdf->Ln(7);
                $pdf->SetFont('Arial','',11);
                $pdf->Cell(0,6,'Lampiran Surat Perintah Kerja (SPK)',0,2,'C');
		$pdf->Cell(0,6,'Nomor : '.$nospk,0,2,'C');
                 $pdf->Ln(3);
$last=-11;
		$pdf->SetFont('Arial','B',11);

                if($tipepengadaan==2){
//pengadaan konsultan               //header 
              $pdf->Cell(100,6,'1. BIAYA LANGSUNG PERSONIL',0,3,'L');      
              $header = array('No', 'Jabatan', 'Kualifikasi Pendidikan','Jumlah Orang','Jumlah Bulan','Intensitas','Kuantitas','Satuan','Biaya Personil (Rp.)','Jumlah Biaya (Rp.)');                 
              $w = array(10,30,35,15,15,14,14,15,20,20);
		$pdf->SetWidths($w);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetAligns('C');
		for($i=0;$i<1;$i++){
			$pdf->Row1($header); 
		}
		
		$pdf->SetAligns('L');
                $pdf->SetRataKanan(3);
		$no=0;
                
                //isi    
                                $jumBLP=0;
                foreach ($listpengK as $rowk) {
                if(($rowk->dtk_sub_judul != '-99')&&($rowk->dtk_sub_judul !=$last)){ $pdf->SetFont('Arial','B',10); $last=$rowk->dtk_sub_judul; $no++; $pdf->Row(array($no.'.',$rowk->sjd_sub_judul,'', '' ,'','','','','','')); $subno=0;}
		$subno++;
                if($no!=0 && $rowk->dtk_sub_judul != '-99'){$nomor=$no.'.'.$subno;} else {$nomor=$subno;}
		$pdf->SetFont('Arial','',10);	
                $pdf->Row(array($nomor,$rowk->dtk_jabatan,$rowk->dtk_kualifikasi_pendidikan,$rowk->dtk_jml_org,$rowk->dtk_jml_bln+0,$rowk->dtk_intensitas+0,$rowk->dtk_kuantitas+0,$rowk->dtk_satuan,$pdf->formatrupiah($rowk->dtk_biaya_personil_hps),$pdf->formatrupiah($rowk->dtk_jml_biaya_hps))); 
		$jumBLP+=$rowk->dtk_jml_biaya_hps;        
                }
                $pdf->SetFont('Arial','B',10);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'',1,0,'C',0); $pdf->Cell($w[2],7,'SUBTOTAL-1',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'',1,0,'C',0); $pdf->Cell($w[5],7,'',1,0,'C',0);$pdf->Cell($w[6],7,'',1,0,'C',0);$pdf->Cell($w[7],7,'',1,0,'C',0);$pdf->Cell($w[8],7,'',1,0,'R',0); $pdf->Cell($w[9],7,$pdf->formatrupiah($jumBLP),1,1,'R',0);
$pdf->Ln(6);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(100,6,'2. BIAYA LANGSUNG NON PERSONIL',0,3,'L');      
              $header = array('No', 'Uraian', 'Unit','Volume','Kuantitas','Satuan','Harga Satuan (Rp.)','Jumlah (Rp.)');                 
              $w = array(10,40,15,20,20,20,30,30);
		$pdf->SetWidths($w);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetAligns('C');
		for($i=0;$i<1;$i++){
			$pdf->Row1($header); 
		}
		
		$pdf->SetAligns('L');
                $pdf->SetRataKanan(3);
		$no=0;
               
                //isi
                $jumBLNP=0;

                foreach ($listpengK2 as $rowk2) {
                if(($rowk2->dtk2_sub_judul != '-99')&&($rowk2->dtk2_sub_judul !=$last)){ $pdf->SetFont('Arial','B',10); $last=$rowk2->dtk2_sub_judul; $no++; $pdf->Row(array($no.'.',$rowk2->sjd_sub_judul,'', '' ,'','','','')); $subno=0;}
		$subno++;
                if($no!=0 && $rowk2->dtk2_sub_judul != '-99'){$nomor=$no.'.'.$subno;} else {$nomor=$subno;}
		$pdf->SetFont('Arial','',10);	
                $pdf->Row(array($nomor,$rowk2->dtk2_pekerjaan,$rowk2->dtk2_volume+0,$rowk2->dtk2_volume+0,$rowk2->dtk2_volume+0,$rowk2->dtk2_satuan,$pdf->formatrupiah($rowk2->dtk2_hargasatuan_hps+0),$pdf->formatrupiah($rowk2->dtk2_jumlahharga_hps+0))); 
		$jumBLNP+=$rowk2->dtk2_jumlahharga_hps;        
                }
                $pdf->SetFont('Arial','B',10);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'SUBTOTAL-2',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'',1,0,'C',0); $pdf->Cell($w[5],7,'',1,0,'C',0);$pdf->Cell($w[6],7,'',1,0,'R',0);$pdf->Cell($w[7],7,$pdf->formatrupiah($jumBLNP),1,0,'R',0);
 
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
                    
                
$header = array('No', 'Uraian Pekerjaan', 'Jumlah');                 
              $w = array(10,100,50);
		$pdf->SetWidths($w);
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('C');
              
		for($i=0;$i<1;$i++){
			$pdf->Row1($header); 
		}
                
                $pdf->Cell($w[0],7,'1.',1,0,'c',0); $pdf->Cell($w[1],7,'Biaya Langsung Personil',1,0,'L',0); $pdf->Cell($w[2],7,$pdf->formatrupiah($jumBLP),1,1,'R',0);
                $pdf->Cell($w[0],7,'2.',1,0,'c',0); $pdf->Cell($w[1],7,'Biaya Langsung Non Personil',1,0,'L',0); $pdf->Cell($w[2],7,$pdf->formatrupiah($jumBLNP),1,1,'R',0);
                if($d->pgd_dgn_pajak==0){
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'TOTAL',1,0,'C',0); $pdf->Cell($w[2],7,$pdf->formatrupiah($d->pgd_jml_sblm_ppn_fix),1,1,'R',0);
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'PPN 10%',1,0,'C',0); $pdf->Cell($w[2],7,$pdf->formatrupiah(0.1*$d->pgd_jml_ssdh_ppn_fix),1,1,'R',0);                
                }
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'TOTAL',1,0,'C',0); $pdf->Cell($w[2],7,$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_fix),1,1,'R',0);
                
                }else{                                  
//----------------------------------------------------------------------------pengadaan barang/jasa-------------------------------------------------                 
                $header = array('No', 'Uraian Pekerjaan', 'Volume','Harga Satuan (Rp.)','     Jumlah      (Rp.)');
                $w = array(10,75,35,30,35);
		$pdf->SetWidths($w);
		
		$pdf->SetAligns('C');
		for($i=0;$i<1;$i++){
			$pdf->Row1($header); 
		}
		$pdf->SetFont('Arial','',11);
		$pdf->SetAligns('L');
		$no=0;
                $subno=0;
		foreach ($listpeng as $row) {
		 if(($row->dtp_sub_judul != '-99')&&($row->dtp_sub_judul !=$last)){$last=$row->dtp_sub_judul; $subno=0;$no++; $pdf->Row(array($no.'.',$row->sjd_sub_judul,'', '' ,''));}
		$subno++;
                if($no!=0 && $row->dtp_sub_judul != '-99') {$nomor=$no.'.'.$subno;} else {$nomor=$subno;}
			$pdf->Row(array($nomor.'.',$row->dtp_pekerjaan,($row->dtp_volume+0).' '.$row->dtp_satuan, $pdf->formatrupiah($row->dtp_hargasatuan_fix) ,$pdf->formatrupiah($row->dtp_jumlahharga_fix))); 
		}
		//$format = number_format($jum, 0, '','.');
		if($d->pgd_dgn_pajak==0){
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,$pdf->formatrupiah($d->pgd_jml_sblm_ppn_fix),1,1,'R',0);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'PPN 10%',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,$pdf->formatrupiah(0.1*$d->pgd_jml_sblm_ppn_fix),1,1,'R',0);
                }
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_fix),1,1,'R',0);		
                }	
//--------------------------------------------------endif------------------------------------------------                
                
                $pdf->Ln(6);
		$cAngka = $pdf->Terbilang($d->pgd_jml_ssdh_ppn_fix);
		$b = ucfirst(strtolower($cAngka));
		$pdf->MultiCell(185,6,'Sebesar : '.$b.'rupiah',0,'L');
                if($d->pgd_dgn_pajak==0){
		$pdf->Cell(100,6,'Harga diatas sudah termasuk Pajak',0,3,'L');
                }
                
                
                $pdf->Output();         
?>		