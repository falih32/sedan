<?php

class M_pengadaan extends CI_Model{
    //put your code here
    function __construct(){
        parent::__construct();
		$this->load->library('Datatables');
    }
    
    function insertPengadaan($data){
        $this->db->insert('t_pengadaan', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    function insertPekerjaan($data){
        $this->db->insert('t_detail_pengadaan', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    function insertKelompokPenyusun($data){
        $this->db->insert('t_kelompok_penyusun', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
     function insertPenyusun($data){
        $this->db->insert('t_list_penyusun', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    function insertSuratIzin($data){
        $this->db->insert('tr_pgd_suratizin', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function HitungTotalHargaPengadaan($id,$pajak){
        $this->db->query("call sum_total_pengadaan ($id,$pajak)");
    }

    function getFirstYearInput(){
        return $this->db->query("select ifnull((SELECT YEAR(pgd_tanggal_input) as tahun "
                . "FROM t_pengadaan ORDER BY tahun LIMIT 1),"
                . "(select year(NOW()) from dual)) as thn from dual")->row()->thn;
    }
    function ajaxProcess($min, $max){
        $this->db->query("SET lc_time_names = 'id_ID'");
	$this->datatables
                ->select('t_pengadaan.*,pgd_id, pgd_perihal, DATE_FORMAT(pgd_tanggal_input,"%e %M %Y") as pgd_tanggal_input, spl_nama as supplier_name, pgw1.pgw_nama as ketua')
                ->from('t_pengadaan')
                ->join('t_kelompok_penyusun', 'klp_pengadaan = pgd_id AND klp_terpilih = 1','left')
                ->join('t_list_penyusun', 'lsp_kelompok = klp_id AND lsp_jabatan = 0','left')
                ->join('t_pegawai pgw1', 'pgw1.pgw_id = lsp_pegawai','left')
                ->join('t_supplier', 'spl_id = pgd_supplier','left')
                ->where('pgd_deleted', '0')
                ->where('YEAR(pgd_tanggal_input)', $this->session->tahun)
                ->where('pgd_tanggal_input >= ', $min)
		->where('pgd_tanggal_input <= ', $max)
                ->add_column('nmpengadaan_tglbuat', '$1<br>$2', 'pgd_perihal, pgd_tanggal_input')
                ->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<option><a class='btn btn-danger btn-sm delete btn-aksi' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Anda yakin akan menghapus ini?' href='Pengadaan/delete_pengadaan/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Hapus</a>".
			"<a class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Edit' href='Pengadaan/edit_pengadaan/$1'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah</a>".
                        "<a class='btn btn-warning btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Cetak Laporan' href='/addUser/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Cetak</a>".
                        "<a class='btn btn-success btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Input Penawaran' href='Pengadaan/add_penawaran/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Penawaran</a>".
			"</div>".
			"</form>".
                        "",'pgd_id');
        return $this->datatables->generate();
    }	
    
    function selectById($id){
        $this->db
		->select('*')
                ->from('t_pengadaan')
                ->where('pgd_id', $id)
		->where('pgd_deleted', '0')
		->join('t_anggaran', 'pgd_anggaran = ang_kode', 'left')
                ->join('t_supplier', 'pgd_supplier = spl_id', 'left')
                ->join('t_user', 'pgd_user_update = usr_id', 'left')
		->join('t_pegawai', 'usr_pegawai = pgw_id', 'left');	
        return $this->db->get()->row();
    }
    
    function selectDetailPengadaan($id){
        $this->db
		->select('*')
                ->from('t_detail_pengadaan')
                ->where('dtp_pengadaan', $id);
        return $this->db->get()->result();
    }
    
     function selectListPenyusun($id, $active){
        $this->db
		->select('t_list_penyusun.*, pgw_nama, jbt_nama')
                ->from('t_kelompok_penyusun')
                ->where('klp_pengadaan', $id)
                ->where('klp_terpilih', $active)
                ->join('t_list_penyusun', 'klp_id = lsp_kelompok', 'left')
                ->join('t_pegawai', 'pgw_id = lsp_pegawai', 'left')
                ->join('t_jabatan', 'jbt_id = pgw_jabatan', 'left');
        return $this->db->get()->result();
    }
    
    function selectListSyaratPenyedia($id){
        $this->db
		->select('tr_pgd_suratizin.*,t_suratizin.*')
                ->from('tr_pgd_suratizin')
                ->where('psr_pengadaan', $id)
                ->join('t_suratizin', 'psr_surat_izin = siz_id', 'left');
        return $this->db->get()->result();
    }
    
    function selectByIdEdit($id){
        // ganti pake procedure
        $this->db
		->select('*')
        ->from('t_surat_msk')
        ->where('sms_id', $id)
		->where('sms_deleted', '0')
		->join('t_jenis_surat_masuk', 't_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id', 'left')
		->join('t_tkt_aman', 't_surat_msk.sms_tkt_aman = t_tkt_aman.tkt_id', 'left')
                ->join('t_sifat', 't_surat_msk.sms_sifat = t_sifat.sifat_id', 'left')
                ->join('t_unit_tujuan', 't_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id', 'left')
		->join('t_user','t_surat_msk.sms_unit_tujuan = t_user.usr_id', 'left');
        return $this->db->get()->row();
    }
     
    function update($id, $data){
        $this->db->where('sms_id', $id);
        $this->db->update('t_surat_msk', $data);
    }
    
    function delete($id){
		$data['sms_deleted'] = '1';
        $this->db->where('sms_id', $id);
        $this->db->update('t_surat_msk', $data);
    }
    
    function selectTracking($id){
        $data = $this->db->query("SELECT *, ts.usr_nama as pnama, jbt.jbt_nama as jnama, DATE_FORMAT(fds_tgl_disposisi, '%e %M %Y %T') as fds_tgl_disposisi_show "
                . "FROM t_surat_msk "
                . "LEFT JOIN t_form_disposisi ON sms_id = fds_id_surat "
                . "LEFT JOIN tr_disposisi_user ON fds_id = dus_disposisi "
                . "LEFT JOIN tr_disposisi_instruksi ON fds_id = din_id_disposisi "
                . "LEFT JOIN t_user tst ON dus_user = tst.usr_id "
                . "LEFT JOIN t_user ts ON fds_pengirim = ts.usr_id "
                . "LEFT JOIN t_jabatan jbt1 ON dus_last_jabatan = jbt1.jbt_id "
                . "LEFT JOIN t_jabatan jbt ON ts.usr_jabatan = jbt.jbt_id "
                . "LEFT JOIN t_departemen ON jbt1.jbt_departemen = dpt_id "
                . "WHERE sms_id = '$id' "
                . "ORDER BY fds_id ASC")->result();
        return $data;
    }

    function getTimeStamp(){
        $this->db->query("SET lc_time_names = 'id_ID'");
        return $this->db->query("SELECT DATE_FORMAT(NOW(), '%e %M %Y %H:%i:%S') AS CurrentDateTime")->row();
    }
    function setStatusToRead($idSrt){
        $this->db->query("update t_surat_msk set sms_read = '1' where sms_id = '$idSrt'");
    
    }
}
