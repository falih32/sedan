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
		$pdf->Line(10,50,200,50);
		$pdf->SetLineWidth(1.5);
		$pdf->Line(10,52,200,52);
		$pdf->Ln(7);
		

		$pdf->SetFont('Arial','',12);
				
		$pdf->SetLineWidth(0.2);
		$w = array(95,95);
		$pdf->SetWidths($w);
		$pdf->SetAligns('C');
		//header
		$pdf->SetFont('Arial','B',12);
			for($i=0;$i<1;$i++){
			$pdf->Row(array('Satuan Kerja Biro Umum Sekretariat Jendral Kementerian Kelautan dan Perikanan Tahun Anggaran XXXX','Berita Acara Evaluasi Administrasi')); 
			}

		//isi
		$pdf->SetAligns('L');
		$pdf->SetFont('Arial','',12);
		for($i=0;$i<1;$i++){
			$pdf->Row(array('Pekerjaan : xxxxx xxxxx xxxx xxxxxxx xxxxxxxxx xxxxxxxx xxxxxxxxx xxxxxxx','Nomor   : xx.xxx.x/xxx.x./xx/xxxx
Tanggal : xx xxxxx xxxx')); 
			}
		$pdf->Ln(5);
		$pdf->MultiCell(190,5,'Pada hari ini, XXXX tanggal xxxxx xxxx bulan xxxxxx tahun xxxx, yang bertanda tangan dibawah ini Pejabat Pengadaan Barang / Jasa Satker Biro Umum telah melaksanakan evaluasi administrasi terhadap x (xxxx) perusahaan yang memasukkan dokumen penawaran, dengan hasil berikut :',0,'J');
		$pdf->Ln(5);
		$w = array(10,75,75,30);
		$pdf->SetWidths($w);
		$pdf->SetAligns('C');
		$pdf->SetFont('Arial','B',12);
		//header
			for($i=0;$i<1;$i++){
			$pdf->Row(array('No','Nama Perusahaan','Alamat','Keterangan')); 
			}

		//isi
		$pdf->SetAligns('L');
		$pdf->SetFont('Arial','',12);
		$n=0;
		for($i=0;$i<2;$i++){
		$n++;
			$pdf->Row(array($n,GenerateSentence(),GenerateSentence(),'Memenuhi Syarat')); 
			}
		$pdf->Ln(5);
		
		$pdf->MultiCell(190,5,'Demikian Berita Acara ini dibuat oleh Pejabat Pengadaan Barang / Jasa Satker Biro Umum Setjen KKP untuk dapat dipergunakan sebagaimana mestinya.',0,'J');
		$pdf->Ln(15);
		$pdf->Cell(100);
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,2,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum',0,2,'L');
		$pdf->Cell(90,6,'Sekretariat Jendral KKP',0,2,'L');
		$pdf->Ln(15);
		$pdf->Cell(100);
		$pdf->Cell(90,6,'MAs Nopa',0,1,'L');
		
	$pdf->Output();	
?>		