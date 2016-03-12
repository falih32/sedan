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
                $pdf->SetXY(82, $posy+1); $pdf->MultiCell(103,5,'Nama pekerjaan : '.$d->pgd_perihal,'','');
                $pdf->Ln(5);
                $w = array(7,50,113);
                $pdf->SetWidths($w);
                $huruf1 = array('B.','C.','D.','E.','F.','G.');
                $a1= array('Jangka Waktu Penyelesaian   Pekerjaan','Sumber Dana','Pemberian Penjelasan Dokumen Pemilihan','Mata Uang Penawaran dan Cara Pembayaran ','Masa Berlaku Penawaran dan Jangka Waktu Pelaksanaan','Pemasukan dan Pembukaan Dokumen Penawaran');
                $b1= array($d->pgd_lama_pekerjaan.' ('.$pdf->Terbilang($d->pgd_lama_pekerjaan).' ) hari kalender','Pekerjaan ini dibiayai dari sumber pendanaan APBN Tahun Anggaran'.$pdf->tanggal("Y",$d->pgd_tanggal_input),'-','1.	Bentuk mata uang penawaran : Rupiah
2.	Pembayaran dilakukan dengan cara sekaligus','1.	Masa berlaku penawaran selama '.$d->pgd_lama_penawaran.' ('.$pdf->Terbilang($d->pgd_lama_penawaran).') hari kalender sejak batas akhir waktu pemasukan penawaran.
2.	Jangka waktu pelaksanaan pekerjaan: '.$d->pgd_lama_pekerjaan.' ('.$pdf->Terbilang($d->pgd_lama_pekerjaan).' ) hari kalender sejak penandatangan kontrak','Hari         :   xxxxxx
Tanggal   :   xxxxxx
Pukul       :  xxxxxx WIB s.d selesai
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
Nama Perusahaan         : ..................
Alamat Perusahaan       : ..................','Ditujukan kepada      : Pejabat Pengadaan Barang/ Jasa Satker Biro Umum Setjen KKP
Alamat Pejabat Pengadaan Barang/Jasa : Jalan Medan Merdeka Timur No.16 Jakarta Pusat

Diterima pada  : 
    Hari         : ______________
    Tanggal   : ______________
    Bulan       : ______________
    Tahun      : ______________
    Jam         : ______________','Pada sampul penutup diberi tanda "ASLI" untuk Dokumen Penawaran asli.','Dalam hal Dokumen Penawaran disampaikan melalui pos/jasa pengiriman, maka sampul luar ditulis :
Nama Paket Pekerjaan Jasa Konsultan Perencanaan Desain Partisi dan Interior Gedung KantorKKP
Ditujukan kepada   : Pejabat Pengadaan Barang/Jasa Satker Biro Umum Setjen KKP 
Alamat Pejabat Pengadaan Barang/Jasa : Jalan Medan Merdeka Timur No.16 Jakarta Pusat','Bobot unsur-unsur pokok yang dinilai :','Unsur Pengalaman Perusahaan : 20 %');
                for($i=0;$i<7;$i++){
			$pdf->RowNoLines1(array($huruf2[$i],$a2[$i],$b2[$i],$c2[$i]));
                        $pdf->Ln(5);
		}
                
$w = array(7,50,7,6,100);
$pdf->SetWidths($w);
$huruf2 = array('','','','','','','','');
$a2= array('','','','','','','','');
$b2= array('','','','','','','','');
$c2= array('a.','b.','c.','d.','e.','f.','g.','h.');
$d2= array('Pengalaman perusahaan peserta harus dilengkapi dengan referensi atau bukti kontrak, yang menunjukkan kinerja perusahaan peserta yang bersangkutan selama 10 (sepuluh) tahun terakhir dan dapat dibuktikan kebenarannya dengan menghubungi penerbit referensi.','Apabila tidak dilengkapi referensi atau bukti kontrak maka tidak dinilai.','c.	Apabila dilengkapi referensi atau bukti kontrak namun terbukti tidak benar, maka penawaran digugurkan dan peserta dikenakan Daftar Hitam.','Sub unsur pengalaman melaksanakan proyek/kegiatan sejenis, dengan bobot sub unsur 85 %, dan ketentuan penilaian sub unsur :
5)	memiliki ≥ 4 paket pekerjaan sejenis dalam waktu 10 (sepuluh) tahun diberi nilai : 100
6)	memiliki 3 paket pekerjaan sejenis dalam waktu 10 (sepuluh) tahun diberi nilai : 80
7)	memiliki 2 paket pekerjaan sejenis dalam waktu 10 (sepuluh) tahun diberi nilai : 60
8)	memiliki  1 paket pekerjaan sejenis dalam waktu 10 (sepuluh) tahun diberi nilai : 40
-	nilai yang didapatkan X bobot sub unsur pengalaman melaksanakan proyek/kegiatan sejenis = NILAI BOBOT sub unsur pengalaman melaksanakan proyek/kegiatan sejenis
-	proyek/kegiatan yang sejenis adalah : pekerjaan jasa konsultansi pengawasan pembangunan gedung bertingkat','Sub unsur pengalaman melaksanakan di lokasi proyek/kegiatan, dengan bobot sub unsur 5 %, dan ketentuan penilaian sub unsur :
1)	memiliki ≥ 3 paket pekerjaan di lokasi proyek/kegiatan dalam waktu 10 (sepuluh) tahun diberi nilai : 100
2)	memiliki < 3 paket pekerjaan di lokasi proyek/kegiatan dalam waktu 10 (sepuluh) tahun diberi nilai : 80
-	nilai yang didapatkan X bobot sub unsur pengalaman melaksanakan di lokasi proyek/kegiatan = NILAI BOBOT sub unsur pengalaman melaksanakan di lokasi proyek/kegiatan.','Sub unsur kapasitas perusahaan dengan memperhatikan jumlah tenaga ahli tetap, dengan bobot sub unsur 10%, dan ketentuan penilaian sub unsur :
1)	memiliki ≥ 2 orang tenaga ahli tetap yang digunakan untuk melakukan pekerjaan sejenis dalam waktu 10 (sepuluh) tahun diberi nilai : 100
2)	memiliki 1 orang tenaga ahli tetap yang digunakan untuk melakukan pekerjaan sejenis dalam waktu 10 (sepuluh) tahun diberi nilai : 70
3)	tidak memiliki tenaga ahli tetap yang digunakan untuk melakukan pekerjaan sejenis dalam waktu 10 (sepuluh) tahun diberi nilai : 0
-	nilai yang didapatkan X bobot sub unsur kapasitas perusahaan dengan memperhatikan jumlah tenaga ahli tetap = NILAI BOBOT sub unsur pengalaman manajerial dan fasilitas utama.','Total bobot seluruh sub unsur = 100 %','Total NILAI BOBOT seluruh sub unsur X bobot unsur Pengalaman Perusahaan = NILAI PENGALAMAN PERUSAHAAN.');
for($i=0;$i<8;$i++){
			$pdf->RowNoLines1(array($huruf2[$i],$a2[$i],$b2[$i],$c2[$i],$d2[$i]));
                        $pdf->Ln(5);
		}
$pdf->Output();
?>