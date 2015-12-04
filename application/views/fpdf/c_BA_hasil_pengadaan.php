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
	
		$pdf->Cell(190,6,'BERITA ACARA HASIL PENGADAAN LANGSUNG',0,2,'C');
		$pdf->MultiCell(190,6,'PEKERJAAN XXXXXXX XXXXXXXXX XXXXXX XXXXXXXX XXX XXXXXX XXXX XXXXX',0,'C');
		$pdf->Cell(190,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Ln(3);
		$pdf->SetFont('Arial','UB',12);
		$pdf->Cell(190,6,'NOMOR : XX.XXX.X/XXX.X/XXX/XXXX',0,2,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Ln(10);
		
		$pdf->MultiCell(190,5,'Pada hari ini xxxxx tanggal xxxxxx bulan xxxxxx tahun xxxxxxxx xxxxxxx (xx-x-xxxx), bertempat di xxxxxxxxxxxxxx xxxxxxxxxx xxxxxxxxxxxxxxx xxxxxxxxxxxx, berdasarkan Berita Acara Pemasukan dan Pembukaan Dokumen Penawaran Pengadaan Langsung Pekerjaan xxxx xxxxx xxxxx xxx xxxxxxxxxx xxxxxxxxxxx Nomor : xx.xx/xxx.x/xx/xxxx Tanggal xx xxxxxx xxxx, Pejabat Pengadaan Barang/Jasa Satker Biro Umum telah melaksanakan evaluasi administrasi, teknis, harga dan penilaian kualifikasi serta negosiasi harga terhadap dokumen penawaran pekerjaan tersebut diatas dengan hasil sebagai berikut :',0,'J');
		$pdf->Ln(5);
		$pdf->Cell(5,5,'1.',0,0,'L'); $pdf->MultiCell(185,5,'Nama Calon penyedia Barang / Jasa : xxxxxxxxxxxxxxx',0,'L');
		$pdf->Ln(5);
		$pdf->Cell(5,5,'2.',0,0,'L'); $pdf->MultiCell(185,5,'Evaluasi Administrasi terhadap penawaran yang diajukan oleh Calon penyedia Barang / Jasa xxxxxxxxxxxx berdasarkan ketentuan yang tercantum dalam dokumen pengadaan langsung telah memenuhi persyaratan administrasi dan selanjutnya dilakukan Evaluasi Teknis.',0,'J');
		$pdf->Ln(5);
		$pdf->Cell(5,5,'3.',0,0,'L'); $pdf->MultiCell(185,5,'Evaluasi Teknis dilaksanakan terhadap penawaran yang diajukan oleh Calon penyedia Barang / Jasa xxxxxxxxxxx berdasarkan ketentuan yang tercantum dalam dokumen pengadaan langsung telah memenuhi persyaratan teknis dan selanjutnya dilakukan Evaluasi Harga.',0,'J');
		$pdf->Ln(5);
		$pdf->Cell(5,5,'4.',0,0,'L'); $pdf->MultiCell(185,5,'Evaluasi Harga dilaksanakan terhadap penawaran yang diajukan oleh Calon penyedia Barang / Jasa xxxxx xxxxxxxxx berdasarkan ketentuan yang tercantum dalam dokumen pengadaan langsung dan memperhatikan hasil evaluasi administrasi dan teknis serta membandingkan dengan Harga Perkiraan Sendiri (HPS), harga penawaran dapat dipertanggungjawabkan secara responsif dan selanjutnya dilakukan negosiasi harga terhadap penawaran dari Calon penyedia Barang / Jasa.',0,'J');		
		$pdf->Ln(5);
		$pdf->Cell(5,5,'5.',0,0,'L'); $pdf->MultiCell(185,5,'Setelah dilakukan Evaluasi Harga selanjutnya akan dilakukan negosiasi harga terhadap penawaran dari Calon penyedia Barang / Jasa xxxxxx.',0,'J');
		$pdf->Ln(5);
		$pdf->Cell(5,5,'6.',0,0,'L'); $pdf->MultiCell(185,5,'Penawaran hasil negosiasi harga terhadap Dokumen Penawaran dari xxxxxxxxx xxxxx untuk Pekerjaan xxxxxxxx xxxxx  adalah sebagai berikut :',0,'J');
		$pdf->Ln(5);
		$pdf->Cell(5); $pdf->Cell(70,5,'Nama Perusahaan',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(115,5,'xxxxxxxxxxx xxxxxxxx',0,'J');
		$pdf->Cell(5); $pdf->Cell(70,5,'Alamat Perusahaan',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(115,5,'xxxxxxxxxxx xxxxxxxx',0,'J');
		$pdf->Cell(5); $pdf->Cell(70,5,'NPWP',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(115,5,'xxxxxxxxxxx xxxxxxxx',0,'J');
		$pdf->Ln(5);
		$w = array(5,70,5,115);
		$pdf->SetWidths($w);
		$a=array('Harga Penawaran Sebelum Negoisasi','Harga Penawaran Setelah Negoisasi');
		$isi=array('Rp.xxxxxxxxxxxxx,- (xxxxxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxx xxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxx xxxxxxxxx)','Rp.xxxxxxxxxxxxx,- (xxxxxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxx xxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxx xxxxxxxxx)');
		for($i=0;$i<2;$i++){
			$pdf->RowNoLines(array('',$a[$i],':',$isi[$i])); 
			}
		$pdf->Ln(5);
		$pdf->MultiCell(190,5,'Selanjutnya akan dilaporkan kepada Pejabat Pembuat Komitmen sebagai bahan Penerbitan Surat Perintah Kerja (SPK).',0,'J');
		$pdf->MultiCell(190,5,'Demikian Berita Acara Hasil Pengadaan Langsung (BAHPL) dibuat untuk digunakan sebagaimana mestinya.',0,'J');
		$pdf->Ln(10);
		$pdf->Cell(110);
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,2,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum',0,2,'L');
		$pdf->Cell(90,6,'Sekretariat Jenderal',0,2,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,2,'L');
		$pdf->Ln(15);
	   $pdf->Cell(110); $pdf->Cell(90,6,'xxxx xxxxx xxxxx xxxxx xxxxx',0,2,'L');
		
		
	$pdf->Output();	
?>		