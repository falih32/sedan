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
		
		$pdf->SetFont('Arial','B',12);
	
		$pdf->Cell(190,6,'LAMPIRAN BERITA ACARA EVALUASI ADMINISTRASI',0,2,'C');
		$pdf->MultiCell(190,6,'XXXXXXX XXXXXX XXXXXXXXXXX XXXXXXXX XXXXXXXXXX XXXXXXXXX XXXXXXX',0,'C');
		$pdf->Cell(190,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Ln(5);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(190,6,'NOMOR : XX.XXX.X/XXX.X/XXX/XXXX',0,2,'L');
		$pdf->Cell(190,6,'Tanggal : XX XXXXX XXXX',0,2,'L');
		$pdf->Ln(5);
				
		$pdf->SetLineWidth(0.2);
		$w = array(8,38,29,38,27,25,25);
		$pdf->SetWidths($w);
		$a='C';
		$pdf->SetAligns($a);
		//header
		$pdf->SetFont('Arial','B',12);
			for($i=0;$i<1;$i++){

			$pdf->Row(array('No','Nama Perusahaan','Penanda tanganan Direktur/Surat Kuasa','Harga Penawaran','Jangka Waktu Pelaksanaan','Bertanggal','Keterangan')); 
			}

		//isi
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('L');
			$n=0;
		for($i=0;$i<2;$i++){
		$n++;
			$pdf->Row(array($n,GenerateSentence(),GenerateSentence(),GenerateSentence(),GenerateSentence(),GenerateSentence(),GenerateSentence())); 
			}
		$pdf->Ln(5);

		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,1,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum',0,1,'L');
		$pdf->Cell(90,6,'Setjen KKP',0,1,'L');
		$pdf->Ln(15);
		$pdf->Cell(90,6,'MAs Nopa',0,1,'L');
		
	$pdf->Output();	
?>		