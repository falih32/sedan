<?php

class M_laporan extends CI_Model{
    function __construct(){
        parent::__construct();
        	$this->load->library('Datatables');
    }

    function jabatanpegawai() {
       $data = $this->db->query("SELECT pgw_id, pgw_nama, jbt_id, jbt_nama, A.dpt_nama as dep1, B.dpt_nama as dep2 "
                . "FROM t_jabatan "
                . "LEFT JOIN t_pegawai ON jbt_id = pgw_jabatan "
                . "LEFT JOIN t_departemen A ON jbt_departemen=A.dpt_id "
                . "LEFT JOIN t_departemen B ON A.dpt_parent=B.dpt_id ")->result();
       return $data;

    }   
    function insertdsrt($data){
        $this->db->insert('tr_detail_surat', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
    }
    function insertdknt($data){
        $this->db->insert('tr_detail_konten', $data);
    }
    function jabatanpegawaibyid($id) {
       $data = $this->db->query("SELECT pgw_nama,jbt_nama, A.dpt_nama as dep1, B.dpt_nama as dep2 "
                . "FROM t_jabatan "
                . "LEFT JOIN t_pegawai ON jbt_id = pgw_jabatan "
                . "LEFT JOIN t_departemen A ON jbt_departemen=A.dpt_id "
                . "LEFT JOIN t_departemen B ON A.dpt_parent=B.dpt_id "
                . "WHERE pgw_id = '$id' ")->row();
       return $data;
    }   
     function angpgd($id) {
       $data = $this->db->query("SELECT * "
                . "FROM t_pengadaan "
                . "LEFT JOIN t_anggaran ON ang_kode = pgd_anggaran "
                . "WHERE pgd_id = '$id' ")->row();
       return $data;
    }   
    
    function selectPPK(){
        $data = $this->db->query("SELECT pgw_nama "
                . "FROM t_pegawai "
                . "LEFT JOIN t_jabatan ON jbt_id = pgw_jabatan "
                . "WHERE jbt_id = '33' ")->row();
       return $data;
    }
     function detpengbyid($id) {
       $data = $this->db->query("SELECT dtp_pekerjaan, dtp_volume, dtp_satuan, dtp_hargasatuan_hps, dtp_jumlahharga_hps, dtp_spesifikasi "
                . "FROM t_detail_pengadaan "
                . "LEFT JOIN t_pengadaan ON dtp_pengadaan = pgd_id "
                . "WHERE pgd_id = '$id' ")->result();
       return $data;
    }   
     function selectpengbyid($id) {
        $this->db->select('*');
        $this->db->from('t_pengadaan');
        $this->db->where('pgd_id', $id);
        return $this->db->get();
     }
     function selecttimpny($id) {
        $data = $this->db->query("SELECT pgw_nama, lsp_jabatan "
                . "FROM t_kelompok_penyusun "
                . "LEFT JOIN t_list_penyusun ON lsp_kelompok = klp_id "
                . "LEFT JOIN t_pegawai ON pgw_id = lsp_pegawai "
                . "WHERE klp_pengadaan = '$id' ")->result();
       return $data;
     }
    function selectPejPeng(){
        $data = $this->db->query("SELECT pgw_nama "
                . "FROM t_pegawai "
                . "LEFT JOIN t_jabatan ON jbt_id = pgw_jabatan "
                . "WHERE jbt_id = '30' ")->row();
       return $data;
    }
     function selectsizbypgd($id) {
        $data = $this->db->query("SELECT siz_nama "
                . "FROM t_suratizin "
                . "LEFT JOIN tr_pgd_suratizin ON psr_surat_izin = siz_id "
                . "WHERE psr_pengadaan = '$id' ")->result();
       return $data;
     }
     function selectPengSUP($id){
        $data = $this->db->query("SELECT * "
                . "FROM t_pengadaan "
                . "LEFT JOIN t_supplier ON spl_id = pgd_supplier "
                . "LEFT JOIN t_perwakilan_supplier ON spl_id = pws_idsup "
                . "WHERE pgd_id = '$id' ");
       return $data;
    }
     function selectNoUndangan($id) {
        $data = $this->db->query("SELECT dknt_isi "
                . "FROM tr_detail_konten "
                . "LEFT JOIN tr_detail_surat ON dsrt_id = dknt_detailsurat "
                . "WHERE dsrt_idpengadaan = '$id' and dsrt_jenis_surat='6'  ")->result();
       return $data;
     }
}
