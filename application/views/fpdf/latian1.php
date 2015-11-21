<?php
function tanggal($format,$nilai="now"){
$en=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat","Jan","Feb",
"Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
$id=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu",
"Jan","Feb","Maret","April","Mei","Juni","Juli","Agustus","September",
"Oktober","November","Desember");
return str_replace($en,$id,date($format,strtotime($nilai)));
}

//menampilkan tanggal saat ini
//keluaran Sun, 13 Mar 2011
echo date("D, j M Y")."<br/>";

//menampilkan tanggal saat ini setelah di konversi
//keluaran Minggu, 13 Maret 2011
echo tanggal("D, j M Y")."<br/>";

//menampilkan bulan saat ini
//keluaran Maret
echo tanggal("M")."<br/>";

//menampilkan hari saat ini
//keluaran Minggu
echo tanggal("D")."<br/>";

//konversi tanggal dari format tanggal di mysql
//keluaran Kamis, 2 Juni 19688
echo tanggal("D, j M Y","1988-06-02")."<br/>";

//konversi tanggal dari format tanggal di mysql
//keluaran Kamis
echo tanggal("D","1988-06-02")."<br/>";

//konversi tanggal dari format tanggal di mysql
//keluaran Juni
echo tanggal("M","1988-06-02")."<br/>";
?>