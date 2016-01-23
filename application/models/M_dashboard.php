<?php

class M_dashboard extends CI_Model{
    //put your code here
    function __construct(){
        parent::__construct();
		$this->load->library('Datatables');
    }
     
    function TotalPengadaanbyJenis($tahun){
        $data = $this->db->query(" SELECT pgd_tipe_pengadaan as 'jenis', COUNT(*) as 'total' "
                . "FROM `t_pengadaan`"
                . "WHERE YEAR(pgd_tanggal_input)=".$tahun." group by jenis  ")->result();
       return $data;
    }
    function TotalPengadaanPerBulan($tahun){
        $this->db->query("SET lc_time_names = 'id_ID'");
        $data = $this->db->query("SELECT MONTHname(pgd1.pgd_tanggal_input) as bulan, (SELECT COUNT(*) as 'total' FROM t_pengadaan a WHERE YEAR(a.pgd_tanggal_input)=".$tahun." and a.pgd_tipe_pengadaan=0 and MONTHname(a.pgd_tanggal_input) = bulan) as tot_pgd_barang, (SELECT COUNT(*) as 'total' FROM t_pengadaan b WHERE YEAR(b.pgd_tanggal_input)=".$tahun." and b.pgd_tipe_pengadaan=1 and MONTHname(b.pgd_tanggal_input) =  bulan) as tot_pgd_jasa, (SELECT COUNT(*) as 'total' FROM t_pengadaan c WHERE YEAR(c.pgd_tanggal_input)=".$tahun." and c.pgd_tipe_pengadaan=2 and MONTHname(c.pgd_tanggal_input) = bulan) as tot_pgd_konsultan FROM t_pengadaan pgd1 group by bulan order by MONTH(pgd1.pgd_tanggal_input) ")->result();
       return $data;
    }
}
