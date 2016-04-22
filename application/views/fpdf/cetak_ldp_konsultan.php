<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(25,15,15);
$pdf->AddPage();
//Header
		//Arial bold 15
		$pdf->SetFont('Arial','B',14);
				$pdf->Cell(70);
		//judul
		$pdf->Cell(30,10,'BAB III. LEMBAR DATA PEMILIHAN',0,3,'C');
		//buat garis horisontal
		$pdf->Line(25,25,195,25);
		$pdf->Ln(10);
		$pdf->SetFont('Arial','',12);
		$w = array(7,50,55,3,55);
                $huruf = array('A.','','','');
                $a= array('Lingkup Pekerjaan','','');
                $b= array('Nama Panitia ULP','Alamat Panitia ULP','Alamat Website');
                $c= array('Pejabat Pengadaan Barang/Jasa Satuan Kerja Biro Umum Setjen KKP','Jalan Medan Merdeka Timur No.16 Jakarta Pusat','www.kkp.go.id');
		$pdf->SetWidths($w);
                for($i=0;$i<3;$i++){
			$pdf->RowNoLines1(array($huruf[$i],$a[$i],$b[$i],':',$c[$i])); 
		}
                $posy=$pdf->GetY();
                $pdf->SetXY(82, $posy-4); $pdf->MultiCell(125,5,'Alamat Website LPSE'); $pdf->SetXY(137, $posy-4); $pdf->MultiCell(3,5,':'); $pdf->SetXY(140, $posy-4); $pdf->MultiCell(55,5,'www.lpse.kkp.go.id');
                $pdf->SetXY(82, $posy+1); $pdf->Cell(55,5,'Nama pekerjaan  ',0,0,'L');$pdf->MultiCell(103,5,':  '.$d->pgd_perihal,'','');
                $pdf->Ln(5);
                $w = array(7,50,113);
                $pdf->SetWidths($w);
                $huruf1 = array('B.','C.','D.','E.','F.','G.');
                $a1= array('Jangka Waktu Penyelesaian   Pekerjaan','Sumber Dana','Pemberian Penjelasan Dokumen Pemilihan','Mata Uang Penawaran dan Cara Pembayaran ','Masa Berlaku Penawaran dan Jangka Waktu Pelaksanaan','Pemasukan dan Pembukaan Dokumen Penawaran');
                $b1= array($d->pgd_lama_pekerjaan.' ('.$pdf->Terbilang($d->pgd_lama_pekerjaan).' ) hari kalender','Pekerjaan ini dibiayai dari sumber pendanaan APBN Tahun Anggaran '.$d->pgd_smbr_dana,'-','1.	Bentuk mata uang penawaran : Rupiah
2.	Pembayaran dilakukan dengan cara sekaligus','1.	Masa berlaku penawaran selama '.$d->pgd_lama_penawaran.' ('.$pdf->Terbilang($d->pgd_lama_penawaran).') hari kalender sejak batas akhir waktu pemasukan penawaran.
2.	Jangka waktu pelaksanaan pekerjaan: '.$d->pgd_lama_pekerjaan.' ('.$pdf->Terbilang($d->pgd_lama_pekerjaan).' ) hari kalender sejak penandatangan kontrak','Hari         : '.$pdf->tanggal("D ",$d->pgd_pembukaan_dok_pnr).'
Tanggal   : '.$pdf->tanggal("j M Y",$d->pgd_pembukaan_dok_pnr).'
Pukul       : '.$pdf->tanggal("H:i",$d->pgd_pembukaan_dok_pnr).' WIB s.d selesai
Tempat    : Ruang Rapat Biro Umum Lantai 2 GMB I KKP
Jl. Medan Merdeka Timur No.16 Jakarta Pusat');
                for($i=0;$i<6;$i++){
			$pdf->RowNoLines1(array($huruf1[$i],$a1[$i],$b1[$i]));
                        $pdf->Ln(5);
		}
                $w = array(7,50,7,106);
                $pdf->SetWidths($w);
$huruf2 = array('H.','','','','','I.','');
                $a2= array('Penyampulan dan Penandaan Sampul Penawaran','','','','','Evaluasi Teknis','');
                $b2= array('1.','2.','','3.','4.','','1.');
                $c2= array('Sampul penutup Dokumen Penawaran Administrasi, Teknis, dan Biaya ditandai: "PENAWARAN ADMINISTRASI, TEKNIS, BIAYA DAN KUALIFIKASI"','Sampul penutup ditulis :
Nama Paket Pekerjaan  : '.$d->pgd_perihal.'
Nama Perusahaan         : '.$supplier->spl_nama.'
Alamat Perusahaan       : '.$supplier->spl_alamat,'Ditujukan kepada      : Pejabat Pengadaan Barang/ Jasa Satker Biro Umum Setjen KKP
Alamat Pejabat Pengadaan Barang/Jasa : Jalan Medan Merdeka Timur No.16 Jakarta Pusat

Diterima pada  : 
    Hari         : '.$pdf->tanggal("D",$tgl).'
    Tanggal   : '.$pdf->tanggal("j",$tgl).' ('.$pdf->Terbilang($pdf->tanggal("j",$tgl)).' )
    Bulan       : '.$pdf->tanggal("M",$tgl).'
    Tahun      : '.$pdf->tanggal("Y",$tgl).' ('.$pdf->Terbilang($pdf->tanggal("Y",$tgl)).' )
    Jam         : '.$pdf->tanggal("H:i",$tgl).' WIB','Pada sampul penutup diberi tanda "ASLI" untuk Dokumen Penawaran asli.','Dalam hal Dokumen Penawaran disampaikan melalui pos/jasa pengiriman, maka sampul luar ditulis :
Nama Paket Pekerjaan Jasa Konsultan Perencanaan Desain Partisi dan Interior Gedung KantorKKP
Ditujukan kepada   : Pejabat Pengadaan Barang/Jasa Satker Biro Umum Setjen KKP 
Alamat Pejabat Pengadaan Barang/Jasa : Jalan Medan Merdeka Timur No.16 Jakarta Pusat','Bobot unsur-unsur pokok yang dinilai :','Unsur Pengalaman Perusahaan : 20 %');
                for($i=0;$i<7;$i++){
			$pdf->RowNoLines1(array($huruf2[$i],$a2[$i],$b2[$i],$c2[$i]));
                        $pdf->Ln(5);
		}
$posy=$pdf->GetY();
$pdf->SetXY(85, $posy); $pdf->MultiCell(110,5,'a. Pengalaman perusahaan peserta harus dilengkapi dengan referensi atau bukti kontrak, yang menunjukkan kinerja perusahaan peserta yang bersangkutan selama 10 (sepuluh) tahun terakhir dan dapat dibuktikan kebenarannya dengan menghubungi penerbit referensi.
b.	Apabila tidak dilengkapi referensi atau bukti kontrak maka tidak dinilai.
c.	Apabila dilengkapi referensi atau bukti kontrak namun terbukti tidak benar, maka penawaran digugurkan dan peserta dikenakan Daftar Hitam.
d.	Sub unsur pengalaman melaksanakan proyek/kegiatan sejenis, dengan bobot sub unsur 85 %, dan ketentuan penilaian sub unsur :
',0,'J');
$posy1=$pdf->GetY();
$pdf->SetXY(90, $posy1); $pdf->MultiCell(105,5,'1) Memiliki >= 4 paket pekerjaan sejenis dalam waktu 10 (sepuluh) tahun diberi nilai : 100
2) memiliki 3 paket pekerjaan sejenis dalam waktu 10 (sepuluh) tahun diberi nilai : 80
3) memiliki 2 paket pekerjaan sejenis dalam waktu 10 (sepuluh) tahun diberi nilai : 60
4) memiliki  1 paket pekerjaan sejenis dalam waktu 10 (sepuluh) tahun diberi nilai : 40
-	nilai yang didapatkan X bobot sub unsur pengalaman melaksanakan proyek/kegiatan sejenis = NILAI BOBOT sub unsur pengalaman melaksanakan proyek/kegiatan sejenis
-	proyek/kegiatan yang sejenis adalah : pekerjaan jasa konsultansi pengawasan pembangunan gedung bertingkat
',0,'J');
$posy2=$pdf->GetY();
$pdf->SetXY(85, $posy2); $pdf->MultiCell(110,5,'e.	Sub unsur pengalaman melaksanakan di lokasi proyek/kegiatan, dengan bobot sub unsur 5 %, dan ketentuan penilaian sub unsur :',0,'J');
$posy3=$pdf->GetY();
$pdf->SetXY(90, $posy3); $pdf->MultiCell(105,5,'1)	memiliki >= 3 paket pekerjaan di lokasi proyek/kegiatan dalam waktu 10 (sepuluh) tahun diberi nilai : 100
2)	memiliki < 3 paket pekerjaan di lokasi proyek/kegiatan dalam waktu 10 (sepuluh) tahun diberi nilai : 80
-	nilai yang didapatkan X bobot sub unsur pengalaman melaksanakan di lokasi proyek/kegiatan = NILAI BOBOT sub unsur pengalaman melaksanakan di lokasi proyek/kegiatan.
',0,'J');
$posy4=$pdf->GetY();
$pdf->SetXY(85, $posy4); $pdf->MultiCell(110,5,'f.	Sub unsur kapasitas perusahaan dengan memperhatikan jumlah tenaga ahli tetap, dengan bobot sub unsur 10%, dan ketentuan penilaian sub unsur :',0,'J');
$posy4=$pdf->GetY();
$pdf->SetXY(90, $posy4); $pdf->MultiCell(105,5,'1)	memiliki >= 2 orang tenaga ahli tetap yang digunakan untuk melakukan pekerjaan sejenis dalam waktu 10 (sepuluh) tahun diberi nilai : 100
2)	memiliki 1 orang tenaga ahli tetap yang digunakan untuk melakukan pekerjaan sejenis dalam waktu 10 (sepuluh) tahun diberi nilai : 70
3)	tidak memiliki tenaga ahli tetap yang digunakan untuk melakukan pekerjaan sejenis dalam waktu 10 (sepuluh) tahun diberi nilai : 0
-	nilai yang didapatkan X bobot sub unsur kapasitas perusahaan dengan memperhatikan jumlah tenaga ahli tetap = NILAI BOBOT sub unsur pengalaman manajerial dan fasilitas utama.
',0,'J');
$posy5=$pdf->GetY();
$pdf->SetXY(85, $posy5); $pdf->MultiCell(110,5,'g.	Total bobot seluruh sub unsur = 100 %
h.	Total NILAI BOBOT seluruh sub unsur X bobot unsur Pengalaman Perusahaan = NILAI PENGALAMAN PERUSAHAAN.
',0,'J');
$pdf->Ln(5);
$pdf->SetX(80); $pdf->MultiCell(105,5,'2.	Unsur Pendekatan dan Metodologi : 20 %',0,'J');
$pdf->Ln(5);
$pdf->SetX(85); $pdf->MultiCell(110,5,'a.	Sub unsur pemahaman atas jasa layanan yang tercantum dalam KAK, dengan bobot sub unsur 30 %, dan ketentuan penilaian sub unsur :',0,'J');
$pdf->SetX(90); $pdf->MultiCell(105,5,'1)	apabila menyajikan dengan baik sesuai tujuan yang akan dicapai, diberi nilai : 100
2)	apabila menyajikan dengan cukup sesuai tujuan yang akan dicapai, diberi nilai : 70
3)	apabila menyajikan namun dinilai kurang sesuai tujuan yang akan dicapai, diberi nilai : 40
4)	apabila tidak menyajikan, diberi nilai : 0
5)	kriteria penilaian sebagai berikut:
-	baik : uraian tentang tujuan, substansi, dan sasaran  sesuai dengan KAK
-	cukup : uraian tentang tujuan, substansi, dan sasaran  mendekati KAK
-	uraian tentang tujuan substansi dan sasaran  kurang sesuai dengan KAK
6)	nilai yang didapatkan X bobot sub unsur pemahaman atas jasa layanan yang tercantum dalam KAK = NILAI BOBOT sub unsur pemahaman atas jasa layanan yang tercantum dalam KAK.
',0,'J');
$pdf->SetX(85); $pdf->MultiCell(110,5,'b.	Sub unsur kualitas metodologi, dengan bobot sub unsur 35%, dan ketentuan penilaian sub unsur :',0,'J');
$pdf->SetX(90); $pdf->MultiCell(105,5,'1)	apabila menyajikan dengan baik sesuai dengan tujuan yang akan dicapai, diberi nilai : 100
2)	apabila menyajikan dengan cukup sesuai dengan tujuan yang akan dicapai, diberi nilai : 70
3)	apabila menyajikan namun dinilai kurang sesuai dengan tujuan yang akan dicapai, diberi nilai : 40
4)	apabila tidak menyajikan, diberi nilai : 0
5)	kriteria penilaian sebagai berikut:
-	baik : menyajikan metodologi pengawasan yang berkaitan dengan mobilisasi alat, tenaga kerja, dan bahan, serta metode pelaksanaan pekerjaan di lapangan secara lengkap. 
-	cukup : menyajikan metodologi pengawasan yang berkaitan dengan mobilisasi alat, tenaga kerja, dan bahan, serta metode pelaksanaan pekerjaan di lapangan secara cukup lengkap.
-	kurang : menyajikan metodologi pengawasan yang berkaitan dengan mobilisasi alat, tenaga kerja, dan bahan, serta metode pelaksanaan pekerjaan di lapangan secara kurang lengkap.
6)	nilai yang didapatkan X bobot sub unsur kualitas metodologi = NILAI BOBOT sub unsur kualitas metodologi.
',0,'J');
$pdf->SetX(85); $pdf->MultiCell(110,5,'c.	Sub unsur hasil kerja (deliverable), dengan bobot sub unsur 10%, dan ketentuan penilaian sub unsur :',0,'J');
$pdf->SetX(90); $pdf->MultiCell(105,5,'1)	apabila menyajikan dengan baik sesuai dengan tujuan yang akan dicapai, diberi nilai : 100
2)	apabila menyajikan namun dinilai kurang sesuai dengan tujuan yang akan dicapai, diberi nilai : 70
3)	apabila menyajikan namun dinilai kurang sesuai dengan tujuan yang akan dicapai, diberi nilai : 40
4)	apabila tidak menyajikan, diberi nilai : 0
5)	kriteria penilaian sebagai berikut:
-	baik : menyampaikan uraian kegiatan pada saat rapat mingguan, pelaporan, progress fisik dan segala kejadian di lapangan secara lengkap
-	cukup : menyampaikan uraian kegiatan pada saat rapat mingguan, pelaporan, progress fisik dan segala kejadian di lapangan kurang lengkap
-	kurang : menyampaikan uraian kegiatan pada saat rapat mingguan, pelaporan, progress fisik dan segala kejadian di lapangan tidak lengkap
6)	nilai yang didapatkan X bobot sub unsur hasil kerja (deliverable) = NILAI BOBOT sub unsur hasil kerja (deliverable).
',0,'J');
$pdf->SetX(85); $pdf->MultiCell(110,5,'d.	Sub unsur gagasan baru yang diajukan oleh peserta untuk meningkatkan kualitas keluaran yang diinginkan dalam KAK, dengan bobot sub unsur 25%, dan ketentuan penilaian sub unsur :',0,'J');
$pdf->SetX(90); $pdf->MultiCell(105,5,'1)	apabila menyajikan dengan baik sesuai dengan tujuan yang akan dicapai, diberi nilai : 100
2)	apabila menyajikan cukup sesuai dengan tujuan yang akan dicapai, diberi nilai : 70
3)	apabila menyajikan namun dinilai kurang sesuai dengan tujuan yang akan dicapai, diberi nilai : 40
4)	apabila tidak menyajikan, diberi nilai : 0
5)	kriteria penilaian sebagai berikut:
-	baik : apabila menyajikan gagasan baru berupa masukan dan solusi terhadap kendala yang mungkin terjadi di lapangan berkaitan dengan percepatan pekerjaan, bahan/alat/tenaga kerja, cuaca serta kendala non teknis secara lengkap.
-	cukup : apabila menyajikan gagasan baru berupa masukan dan solusi terhadap kendala yang mungkin terjadi di lapangan berkaitan dengan percepatan pekerjaan, bahan/alat/tenaga kerja, cuaca serta kendala non teknis cukup lengkap
-	kurang : apabila menyajikan gagasan baru berupa masukan dan solusi terhadap kendala yang mungkin terjadi di lapangan berkaitan dengan percepatan pekerjaan, bahan/alat/tenaga kerja, cuaca serta kendala non teknis kurang lengkap
6)	nilai yang didapatkan X bobot sub unsur gagasan baru yang diajukan oleh peserta untuk meningkatkan kualitas keluaran yang diinginkan dalam KAK = NILAI BOBOT sub unsur gagasan baru yang diajukan oleh peserta untuk meningkatkan kualitas keluaran yang diinginkan dalam KAK.
',0,'J');
$pdf->SetX(85); $pdf->MultiCell(110,5,'e.	Total bobot seluruh sub unsur = 100 %
f.	Total NILAI BOBOT seluruh sub unsur X bobot unsur Pendekatan dan Metodologi = NILAI PENDEKATAN DAN METODOLOGI.
',0,'J');
$pdf->Ln(5);
$pdf->SetX(80); $pdf->MultiCell(115,5,'3.	Unsur Kualifikasi Tenaga Ahli 60 %',0,'J');
$pdf->Ln(5);
$pdf->SetX(85); $pdf->MultiCell(110,5,'a.	Sub unsur tingkat pendidikan, dengan bobot sub unsur 40 %, dan ketentuan penilaian sub unsur :',0,'J');
$pdf->SetX(90); $pdf->MultiCell(105,5,'1)	>= tingkat pendidikan yang disyaratkan dalam KAK, diberi nilai : 100
2)	< tingkat pendidikan yang disyaratkan dalam KAK, diberi nilai : 50',0,'J');
$pdf->SetX(85); $pdf->MultiCell(110,5,'Nilai yang didapatkan X bobot sub unsur tingkat pendidikan = NILAI BOBOT sub unsur tingkat pendidikan.
b.	Sub unsur pengalaman kerja profesional seperti yang disyaratkan dalam KAK, dengan bobot sub unsur 40 %, dan ketentuan penilaian sub unsur :',0,'J');
$pdf->SetX(90); $pdf->MultiCell(105,5,'1)	Dukungan referensi  : bobot 30',0,'J');
$pdf->SetX(95); $pdf->MultiCell(100,5,'a)	apabila melampirkan seluruh referensi dan dapat dibuktikan kebenarannya dengan menghubungi penerbit referensi sesuai jumlah pengalaman yang ada, maka diberikan nilai 100
b)	apabila melampirkan referensi kurang dari jumlah pengalaman dan dapat dibuktikan kebenarannya dengan menghubungi penerbit referensi sesuai jumlah pengalaman yang ada, maka diberikan nilai jumlah referensi yang dilampirkan dibagi jumlah pengalaman dikalikan dengan nilai bobot 100
c)	apabila tidak dilengkapi referensi maka tidak diberikan nilai 
d)	apabila melampirkan referensi namun terbukti tidak benar, maka penawaran digugurkan dan peserta dikenakan Daftar Hitam.',0,'J');
$pdf->SetX(90); $pdf->MultiCell(105,5,'2)	perhitungan bulan kerja tenaga ahli, yang dihitung berdasarkan ketentuan yang tercantum dalam IKP,
3)	 lingkup pekerjaan : bobot 20',0,'J');
$pdf->SetX(95); $pdf->MultiCell(100,5,'a.	sesuai, diberi nilai : 100
b.	menunjang, diberi nilai : 80
c.	terkait, diberi nilai : 60
d.	lingkup pekerjaan yang :',0,'J');
$pdf->SetX(100); $pdf->MultiCell(95,5,'i.sesuai adalah : pekerjaan sejenis
ii.	menunjang adalah : pekerjaan satu bidang
iii.	terkait adalah : pekerjaan satu kelompok',0,'J');
$pdf->SetX(90); $pdf->MultiCell(105,5,'4)	posisi : bobot 20',0,'J');
$pdf->SetX(95); $pdf->MultiCell(100,5,'a)	sesuai, diberi nilai : 100
b)	cukup sesuai, diberi nilai : 80
c)	tidak sesuai, diberi nilai : 60
d)	posisi yang :',0,'J');
$pdf->SetX(100); $pdf->MultiCell(95,5,'i.	sesuai adalah : sesuai dengan posisi
ii.	cukup adalah : terkait dengan posisi
iii.	tidak sesuai adalah : tidak terkait dengan posisi',0,'J');
$pdf->SetX(90); $pdf->MultiCell(105,5,'5)	perhitungan bulan kerja X nilai lingkup pekerjaan X nilai posisi = jumlah bulan kerja profesional
6)	nilai total seluruh jumlah bulan kerja profesional dibagi angka 12 = jangka waktu pengalaman kerja profesional
7)	nilai jangka waktu pengalaman kerja profesional : bobot 30',0,'J');
$pdf->SetX(95); $pdf->MultiCell(100,5,'a)	memiliki >= 7 tahun pengalaman kerja profesional untuk Team Leader, diberi nilai : 100
b)	memiliki >= 6 tahun pengalaman kerja profesional untuk TA. Arsitekur dan Ahli Desain Grafis, diberi nilai : 100
c)	memiliki < 7 tahun pengalaman kerja profesional untuk Team Leader dan <6tahun untuk TA. Arsitekur dan Ahli Desain Grafis, diberi nilai : 60',0,'J');
$pdf->SetX(90); $pdf->MultiCell(105,5,'8)	nilai jangka waktu pengalaman kerja profesional yang didapatkan X bobot sub unsur pengalaman kerja profesional seperti yang disyaratkan dalam KAK = NILAI BOBOT sub unsur pengalaman kerja profesional seperti yang disyaratkan dalam KAK.',0,'J');

$pdf->SetX(85); $pdf->MultiCell(110,5,'c.	Sub unsur sertifikat keahlian/profesi, dengan bobot sub unsur 20 %, dan ketentuan penilaian sub unsur :',0,'J');

$pdf->SetX(90); $pdf->MultiCell(105,5,'1)	memiliki dan sesuai, diberi nilai : 100
2)	memiliki tetapi tidak sesuai, diberi nilai : 50
3)	tidak memiliki, diberi nilai : 0
4)	nilai yang didapatkan X bobot sub unsur sertifikat keahlian/profesi = NILAI BOBOT sub unsur sertifikat keahlian/profesi.',0,'J');
$pdf->SetX(85); $pdf->MultiCell(110,5,'d.	Total bobot seluruh sub unsur = 100 %.
e.	Total NILAI BOBOT seluruh sub unsur = NILAI 1 (SATU) ORANG TENAGA AHLI.
f.	tenaga ahli yang dinilai lebih dari 1 (satu) maka setiap tenaga ahli harus diberi bobot: 100',0,'J');
$pdf->SetX(88); $pdf->MultiCell(107,5,'1)	Team Leader 1 orang bobot penilaian sebesar 60 %
2)	TA. Arsitektur 1 orang bobot penilaian sebesar 40 %',0,'J');
$pdf->SetX(85); $pdf->MultiCell(110,5,'g.	Nilai 1 (Satu) Orang Tenaga Ahli X bobot tenaga ahli = NILAI BOBOT tenaga ahli
h.	Total NILAI BOBOT seluruh tenaga ahli X bobot unsur Kualifikasi Tenaga Ahli = NILAI KUALIFIKASI TENAGA AHLI.',0,'J');
$pdf->ln(5);
$pdf->SetX(80); $pdf->MultiCell(115,5,'4.	Nilai Evaluasi Teknis = NILAI PENGALAMAN PERUSAHAAN + NILAI PENDEKATAN DAN METODOLOGI + NILAI KUALIFIKASI TENAGA AHLI

5.	Ambang batas nilai teknis (passing grade) = 70',0,'J');
$pdf->ln(5);
$w = array(7,50,113);
$pdf->SetWidths($w);
$hurufx = array('J.','K.');
$ax= array('Evaluasi Biaya','Unit Biaya Personil Berdasarkan Satuan Waktu');
$bx= array('Jangka waktu pelaksanaan Evaluasi Biaya: 1 (satu) hari','Unit biaya personil berdasarkan satuan waktu dihitung sebagai berikut:
1 (satu) bulan : 22 (dua puluh dua) hari kerja
1 (satu) hari kerja: 45 (empat puluh lima) jam kerja');
 for($i=0;$i<2;$i++){
			$pdf->RowNoLines1(array($hurufx[$i],$ax[$i],$bx[$i]));
                        $pdf->Ln(5);
		}


$pdf->Output();
?>