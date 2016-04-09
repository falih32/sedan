<?php

class M_laporan extends CI_Model{
    function __construct(){
        parent::__construct();
        	$this->load->library('Datatables');
    }

    function jabatanpegawai() {
       $data = $this->db->query("SELECT pgw_id, pgw_nama, jbt_id, jbt_nama, A.dpt_nama as dep1, B.dpt_nama as dep2 "
                . "FROM t_jabatan "
                . "JOIN t_pegawai ON jbt_id = pgw_jabatan "
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
    function updatedknt($idkonten,$idsurat, $data){
        $this->db->where('dknt_idkonten', $idkonten);
        $this->db->where('dknt_detailsurat', $idsurat);
        $this->db->update('tr_detail_konten', $data);
    }
    function updatedsrt($idsurat,$idpeng, $data){
        $this->db->where('dsrt_jenis_surat', $idsurat);
        $this->db->where('dsrt_idpengadaan', $idpeng);
        $this->db->update('tr_detail_surat', $data);
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
    
//    function selectPPK(){
//        $data = $this->db->query("SELECT pgw_nama "
//                . "FROM t_pegawai "
//                . "LEFT JOIN t_jabatan ON jbt_id = pgw_jabatan "
//                . "WHERE jbt_id = '33' ")->row();
//       return $data;
//    }
     function detpengbyid($id) {
       $data = $this->db->query("SELECT * "
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
     function selectdetsurat($idsurat,$idpeng) {
        $this->db->select('*');
        $this->db->from('tr_detail_surat');
        $this->db->where('dsrt_jenis_surat', $idsurat);
        $this->db->where('dsrt_idpengadaan', $idpeng);
        return $this->db->get();
     }
     
     function selecttimpnyketua($id) {
        $data = $this->db->query("SELECT pgw_nama "
                . "FROM t_master_penyusun "
                . "LEFT JOIN t_pengadaan ON pgd_penyusun = msp_id "
                . "LEFT JOIN t_pegawai ON pgw_id = msp_ketua "
                . "WHERE pgd_id = '$id' ")->row();
       return $data;
     }
     function selecttimpnyanggota1($id) {
        $data = $this->db->query("SELECT pgw_nama "
                . "FROM t_master_penyusun "
                . "LEFT JOIN t_pengadaan ON pgd_penyusun = msp_id "
                . "LEFT JOIN t_pegawai ON pgw_id = msp_anggota1 "
                . "WHERE pgd_id = '$id' ")->row();
       return $data;
     }
     function selecttimpnyanggota2($id) {
        $data = $this->db->query("SELECT pgw_nama "
                . "FROM t_master_penyusun "
                . "LEFT JOIN t_pengadaan ON pgd_penyusun = msp_id "
                . "LEFT JOIN t_pegawai ON pgw_id = msp_anggota2 "
                . "WHERE pgd_id = '$id' ")->row();
       return $data;
     }
     function selecttimpnyanggota3($id) {
        $data = $this->db->query("SELECT pgw_nama "
                . "FROM t_master_penyusun "
                . "LEFT JOIN t_pengadaan ON pgd_penyusun = msp_id "
                . "LEFT JOIN t_pegawai ON pgw_id = msp_anggota3 "
                . "WHERE pgd_id = '$id' ")->row();
       return $data;
     }
     function selecttimpnyanggota4($id) {
        $data = $this->db->query("SELECT pgw_nama "
                . "FROM t_master_penyusun "
                . "LEFT JOIN t_pengadaan ON pgd_penyusun = msp_id "
                . "LEFT JOIN t_pegawai ON pgw_id = msp_anggota4 "
                . "WHERE pgd_id = '$id' ")->row();
       return $data;
     }
//    function selectPejPeng(){
//        $data = $this->db->query("SELECT pgw_nama "
//                . "FROM t_pegawai "
//                . "LEFT JOIN t_jabatan ON jbt_id = pgw_jabatan "
//                . "WHERE jbt_id = '30' ")->row();
//       return $data;
//    }
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
                . "WHERE pgd_id = '$id' ");
       return $data;
    }
     function selectNoUndangan($id) {
        $data = $this->db->query("SELECT dknt_isi "
                . "FROM tr_detail_konten "
                . "LEFT JOIN tr_detail_surat ON dsrt_id = dknt_detailsurat "
                . "WHERE dsrt_idpengadaan = '$id' and dsrt_jenis_surat='6' and dknt_idkonten='9' ")->row();
       return $data;
     }
//     function selecttglPmbkUndangan($id) {
//        $data = $this->db->query("SELECT dknt_isi "
//                . "FROM tr_detail_konten "
//                . "LEFT JOIN tr_detail_surat ON dsrt_id = dknt_detailsurat "
//                . "WHERE dsrt_idpengadaan = '$id' and dsrt_jenis_surat='6' and dknt_idkonten='10' ")->row();
//       return $data;
//     }
      function selecttglklarifikasiUndangan($id) {
        $data = $this->db->query("SELECT dknt_isi "
                . "FROM tr_detail_konten "
                . "LEFT JOIN tr_detail_surat ON dsrt_id = dknt_detailsurat "
                . "WHERE dsrt_idpengadaan = '$id' and dsrt_jenis_surat='6' and dknt_idkonten='11' ")->row();
       return $data;
     }
     function selecttglUndangan($id) {
        $data = $this->db->query("SELECT dknt_isi "
                . "FROM tr_detail_konten "
                . "LEFT JOIN tr_detail_surat ON dsrt_id = dknt_detailsurat "
                . "WHERE dsrt_idpengadaan = '$id' and dsrt_jenis_surat='6' and dknt_idkonten='3' ")->row();
       return $data;
     }
     
     function selectpegawaikepada($idpeng) {
        $data = $this->db->query("SELECT * "
                . "FROM t_pegawai "
                . "LEFT JOIN tr_detail_konten ON pgw_id = dknt_isi "
                . "LEFT JOIN tr_detail_surat ON dsrt_id = dknt_detailsurat "
                . "WHERE dsrt_idpengadaan = '$idpeng' and dknt_idkonten='2' ")->row();
        return  $data;
     }
     function selectpegawaidari($idpeng) {
        $data = $this->db->query("SELECT * "
                . "FROM t_pegawai "
                . "LEFT JOIN tr_detail_konten ON pgw_id = dknt_isi "
                . "LEFT JOIN tr_detail_surat ON dsrt_id = dknt_detailsurat "
                . "WHERE dsrt_idpengadaan = '$idpeng' and dknt_idkonten='1' ")->row();
        return  $data;
     }
     function selectkonten($idpeng,$idkonten,$idsurat) {
        $data = $this->db->query("SELECT dknt_isi "
                . "FROM tr_detail_konten "
                . "LEFT JOIN tr_detail_surat ON dsrt_id = dknt_detailsurat "
                . "WHERE dsrt_idpengadaan = '$idpeng' and dsrt_jenis_surat='$idsurat' and dknt_idkonten='$idkonten' ")->row();
       return $data;
     }
    function selectdipa() {
        $data = $this->db->query("SELECT * "
                . "FROM t_dipa "
                . "order by dipa_id desc ")->result();
        return  $data;
     }
     function pilihdipa($no) {
        $data = $this->db->query("SELECT * "
                . "FROM t_dipa "
                . "where dipa_nomor='$no' and dipa_deleted=0 ")->row();
        return  $data;
     }
     function selectUP($id) { //unsurpenilaian
        $data = $this->db->query("SELECT * "
                . "FROM t_unsur_penilaian "
                . "where unp_pgd='$id'")->row();
        return  $data;
     }
    function selectKualifikasiPersonilByUnp($id){
        return $this->db->query(""
                . "SELECT dtk_sub_judul,sjd_sub_judul, dtk_jabatan, t_personal_inti.* "
                . "FROM t_personal_inti "
                . "LEFT JOIN t_detail_konsultan1 "
                . "ON dtk_id = psi_dtk "
                . "LEFT JOIN t_sub_judul "
                . "ON dtk_sub_judul = sjd_id "
                . "WHERE psi_uns = '$id' "
                . "ORDER BY sjd_id IS NULL, sjd_sub_judul, dtk_id ")->result();
    }
    function selectPengalamanKerjaByUnp($id){
        return $this->db->query("SELECT dtk_sub_judul, sjd_sub_judul, dtk_jabatan, psi_nama, psi_masa_kerja, psi_bobot, t_pengalaman_kerja.* "
                . "FROM t_pengalaman_kerja "
                . "LEFT JOIN t_personal_inti ON psi_id = pnk_psi "
                . "LEFT JOIN t_detail_konsultan1 ON dtk_id = psi_dtk "
                . "LEFT JOIN t_sub_judul ON dtk_sub_judul = sjd_id "
                . "WHERE psi_uns = '$id' ORDER BY sjd_id IS NULL, sjd_sub_judul, pnk_id ")->result();
    }
    
    function selectPengSelesai($thn){
        $data = $this->db->query("SELECT pgd_perihal, spl_nama, pgd_jml_ssdh_ppn_fix, pgd_lama_pekerjaan, "
                . "(SELECT dknt_isi FROM tr_detail_konten LEFT JOIN tr_detail_surat ON dsrt_id = dknt_detailsurat WHERE dsrt_idpengadaan = pgd_id and dsrt_jenis_surat='18' and dknt_idkonten='9')as no_spk, "
                . "(SELECT dknt_isi FROM tr_detail_konten LEFT JOIN tr_detail_surat ON dsrt_id = dknt_detailsurat WHERE dsrt_idpengadaan = pgd_id and dsrt_jenis_surat='18' and dknt_idkonten='3')as tgl_spk "
                . "FROM t_pengadaan "
                . "LEFT JOIN t_supplier ON spl_id = pgd_supplier "
                . "WHERE YEAR(pgd_tanggal_input)='$thn' and pgd_deleted='0' and pgd_status_selesai='1' ORDER BY tgl_spk");
       return $data;
    }
    
    
}

