<?php

class M_laporan extends CI_Model{
    function __construct(){
        parent::__construct();
        	$this->load->library('Datatables');
    }

    function cetakmemo1($data) {
        $this->db->select('*');
        $this->db->from('t_draftjabatan');
        $this->db->where('jbt_id', $id);
        return $this->db->get();

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
     function angdrppgd($id) {
       $data = $this->db->query("SELECT ang_kode, ang_nama, pgd_perihal "
                . "FROM t_draft_pengadaan "
                . "LEFT JOIN t_anggaran ON ang_kode = drp_anggaran "
                . "LEFT JOIN t_pengadaan ON pgd_id=drp_pengadaan "
                . "WHERE drp_id = '$id' ")->row();
       return $data;
    }   
    
    function selectPPK(){
        $data = $this->db->query("SELECT pgw_nama "
                . "FROM t_pegawai "
                . "LEFT JOIN t_jabatan ON jbt_id = pgw_jabatan "
                . "WHERE jbt_id = '33' ")->row();
       return $data;
    }
     function detpengbyiddarft($id) {
       $data = $this->db->query("SELECT dtp_pekerjaan, dtp_volume, dtp_satuan, dtp_hargasatuan, dtp_jumlahharga  "
                . "FROM t_detail_pengadaan "
                . "LEFT JOIN t_draft_pengadaan ON dtp_draft = drp_id "
                . "WHERE drp_id = '$id' ")->result();
       return $data;
    }   
    
    
    
    
}
