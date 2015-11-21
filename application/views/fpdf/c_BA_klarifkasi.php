<?php
require('mc_table.php');

function GenerateWord()
{
    //Get a random word
    $nb=rand(3,10);
    $w='';
    for($i=1;$i<=$nb;$i++)
        $w.=chr(rand(ord('a'),ord('z')));
    return $w;
}

function GenerateSentence()
{
    //Get a random sentence
    $nb=rand(1,10);
    $s='';
    for($i=1;$i<=$nb;$i++)
        $s.=GenerateWord().' ';
    return substr($s,0,-1);
}

$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->AddPage();

//Header
		$pdf->Image('logokelautan.png',10,8,-400);
		//Arial bold 15
		$pdf->SetFont('Arial','B',16);
				$pdf->Cell(80);
		//judul
		$pdf->Cell(30,6,'KEMENTRIAN KELAUTAN DAN PERIKANAN',0,2,'C');
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
		$pdf->Line(10,50,200,50);
		$pdf->SetLineWidth(1.5);
		$pdf->Line(10,52,200,52);
		$pdf->Ln(7);
		
		$pdf->SetFont('Arial','B',12);
	
		$pdf->Cell(190,6,'BERITA ACARA KLARIFIKASI DAN NEGOISASI HARGA',0,2,'C');
		$pdf->MultiCell(190,6,'PEKERJAAN XXXXXXX XXXXXXXXX XXXXXX XXXXXXXX XXX XXXXXX XXXX XXXXX',0,'C');
		$pdf->Cell(190,6,'KEMENTRIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Ln(3);
		$pdf->SetFont('Arial','UB',12);
		$pdf->Cell(190,6,'NOMOR : XX.XXX.X/XXX.X/XXX/XXXX',0,2,'C');
		$pdf->Ln(3);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(190,6,'TANGGAL XX XXXXX XXXX',0,2,'C');
		$pdf->Ln(10);
		
		$pdf->MultiCell(190,5,'Pada hari ini xxxxx tanggal xxxxxx bulan xxxxxx tahun xxxxxxxx xxxxxxx (xx-x-xxxx), bertempat di xxxxxxxxxxxxxx xxxxxxxxxx xxxxxxxxxxxxxxx xxxxxxxxxxxx,  Pejabat  Pengadaan Barang/Jasa dan Petugas Pembantu Administrasi dilingkungan Biro Umum yang dibentuk berdasarkan Keputusan Pejabat Pembuat Komitmen Satuan Kerja Biro Umum Sekretariat Jenderal KKP Nomor: xx.xx/xxx/x/xxxx tanggal x xxxxx xxxx telah mengadakan Klarifikasi dan Negosiasi penawaran harga atas Pekerjaan xxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx, yang diajukan oleh perusahaan yaitu xxxxxx xxxxxx xxxxxxxx xxxxxxx yang beralamat di xxxxxxxx xxxxxxxxxxxxx xxxxxx , xxxxxxxxxxxxxxx,dengan surat penawaran Nomor : xx.x /xxx/xx/xx/xxxx   tertanggal xx xxxx xxxx, dengan harga penawaran sebesar Rp. xxx.xxxx.xxxx,- (xxxxxx xxxx xxxxxxx xxxxxxx xxxxxx rupiah ) sudah termasuk pajak.',0,'J');
		$pdf->Ln(5);
		$pdf->MultiCell(190,5,'Setelah diadakan penelitian serta penilaian bersama dengan seksama dan hasil negosiasi atas surat penawaran yang diajukan dapat diturunkan menjadi Rp. xxxxxx.xxxx.xxxxxxxxx,- (xxxxx xxxxx xxxxx xxxxx rupiah ) sudah termasuk pajak, sehingga dapat diusulkan pengadaan langsung untuk melaksanakan pekerjaan tersebut.',0,'J');
		$pdf->Ln(5);
		$pdf->MultiCell(190,5,'Demikian Berita Acara  Klarifikasi dan Negosiasi Harga ini  dibuat untuk dapat dipergunakan seperlunya.',0,'J');
		$pdf->Ln(10);
		$pdf->Cell(90,6,'Setuju dan sanggup melaksanakan ',0,0,'L');	$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,1,'L'); 
		$pdf->Cell(90,6,'pekejaan sesuai dengan negosiasi',0,0,'L');	$pdf->Cell(90,6,'Satker Biro Umum',0,1,'L');
		$pdf->Cell(90,6,'XX XXXXXXX XXXXXXXX XXXX',0,0,'L');	$pdf->Cell(90,6,'Sekretariat Jenderal',0,1,'L');
		$pdf->Cell(90,6,'',0,0,'L');	$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,1,'L');
		$pdf->Ln(15);
		$pdf->SetFont('Arial','U',12);
		$pdf->Cell(90,6,'XXXXXX',0,0,'L');	$pdf->SetFont('Arial','',12); $pdf->Cell(90,6,'xxxx xxxxx xxxxx xxxxx xxxxx',0,1,'L');
		$pdf->Cell(90,6,'XXXXXX',0,0,'L');
		
	$pdf->Output();	
?>		