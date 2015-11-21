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
    
    function insertDraftPengadaan($data){
        $this->db->insert('t_draft_pengadaan', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    function insertPekerjaan($data){
        $this->db->insert('t_detail_pengadaan', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
     function insertPenyusun($data){
        $this->db->insert('tr_draft_penyusun', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    function insertSuratIzin($data){
        $this->db->insert('tr_draft_suratizin', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    function insertSupplierPengadaan($data){
        $this->db->insert('tr_draft_supplier', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function getFirstYearInput(){
        return $this->db->query("select ifnull((SELECT YEAR(pgd_tanggal_input) as tahun "
                . "FROM t_pengadaan ORDER BY tahun LIMIT 1),"
                . "(select year(NOW()) from dual)) as thn from dual")->row()->thn;
    }
    function ajaxProcess($min, $max){
        
	$this->datatables
                ->select('t_pengadaan.*, lst_ketua')
                ->from('t_pengadaan')
                ->join('t_kelompok_penyusun', 'klp_pengadaan = pgd_id AND klp_terpilih = 1','left')
                ->join('t_list_penyusun', 'lsp_kelompok = klp_id AND lsp_jabatan = 0','left')
                ->where('pgd_deleted', '0')
                ->where('YEAR(pgd_tanggal_input)', $this->session->tahun)
                ->where('pgd_tanggal_input >= ', $min)
		->where('pgd_tanggal_input <= ', $max);
        $this->datatables->add_column('nmpengadaan_tglbuat', '$1<br>$2', 'pgd_perihal, pgd_tanggal_input');
        $this->datatables->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-danger btn-sm delete btn-aksi' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Anda yakin akan menghapus ini?' href='Pengadaan/delete_pengadaan/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Hapus</a>".
			"<a class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Edit' href='Pengadaan/edit_pengadaan/$1'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah</a>".
                        "<a class='btn btn-warning btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Cetak Laporan' href='/addUser/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Cetak</a>".
                        "<a class='btn btn-warning btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Input Penawaran' href='/add_penawaran/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Penawaran</a>".
			"</div>".
			"</form>".
                        "",'pgd_id');
        return $this->datatables->generate();
    }	
    
    function selectById($id){
        $this->db
		->select('*')
                ->from('t_pengadaan')
                ->where('sms_id', $id)
		->where('sms_deleted', '0')
		->join('t_jenis_surat_masuk', 't_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id', 'left')
                ->join('t_tkt_aman', 't_surat_msk.sms_tkt_aman = t_tkt_aman.tkt_id', 'left')
                ->join('t_sifat', 't_surat_msk.sms_sifat = t_sifat.sifat_id', 'left')
		->join('t_unit_tujuan', 't_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id', 'left')
		->join('t_user','t_surat_msk.sms_unit_tujuan = t_user.usr_id', 'left')
                ->join('t_user as A','t_surat_msk.sms_edited_by = A.usr_id', 'left');
        return $this->db->get()->row();
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

    // function yang digunakan oleh paginationsample
    function selectAllPaging($limit=array()){
        // ganti pake procedure
//        $this->db->select('*');
//        $this->db->from('tf_surat_masuk');
//        $this->db->order_by('id', 'desc');
//        if ($limit != NULL)
//        $this->db->limit($limit['perpage'], $limit['offset']);
//        return $this->db->get();
         $this->db->query("SET lc_time_names = 'id_ID'");
        $lmt = $limit['perpage'];
        $ofs = $limit['offset']; 
        $data = $this->db->query("SELECT	t_surat_msk.sms_id, t_surat_msk.sms_nomor_surat, t_surat_msk.sms_tgl_srt, 
			t_surat_msk.sms_tgl_srt_diterima, t_surat_msk.sms_tgl_srt_dtlanjut,
			t_surat_msk.sms_tenggat_wkt, t_surat_msk.sms_perihal, t_surat_msk.sms_jenis_surat,t_surat_msk.sms_tkt_aman,t_surat_msk.sms_sifat, 
			t_surat_msk.sms_no_agenda, t_surat_msk.sms_unit_tujuan, t_surat_msk.sms_keterangan, 
			t_surat_msk.sms_edited_by, t_surat_msk.sms_status_terkirim, t_surat_msk.sms_file, 
			t_surat_msk.sms_pengirim, t_surat_msk.sms_deleted,
			t_unit_tujuan.utj_unit_tujuan, t_jenis_surat_masuk.jsm_nama_jenis,t_tkt_aman.tkt_nama,t_sifat.sifat_nama, 
			t_user.usr_userName		
	FROM t_surat_msk 
	LEFT JOIN t_jenis_surat_masuk 
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
        LEFT JOIN t_tkt_aman 
	ON t_surat_msk.sms_tkt_aman = t_tkt_aman.tkt_id
        LEFT JOIN t_sifat 
	ON t_surat_msk.sms_sifat = t_sifat.sifat_id
        LEFT JOIN t_unit_tujuan 
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id 
	LEFT JOIN t_user 
	ON t_surat_msk.sms_unit_tujuan = t_user.usr_id 
	WHERE t_surat_msk.sms_deleted = '0' 
	ORDER BY t_surat_msk.sms_id DESC
	LIMIT $ofs, $lmt")->result();
        //$this->db->free_db_resource();
        return $data;
    }
    
    function laporSuratMasuk1($dateAwal, $dateAkhir){
        $this->db->query("SET lc_time_names = 'id_ID'");
        $data = $this->db->query("SELECT	t_surat_msk.sms_id, t_surat_msk.sms_nomor_surat, 
                        DATE_FORMAT(sms_tgl_srt,'%e %M %Y') as sms_tgl_srt, 
			DATE_FORMAT(sms_tgl_srt_diterima,'%e %M %Y') as sms_tgl_srt_diterima, t_surat_msk.sms_tgl_srt_dtlanjut,
			t_surat_msk.sms_tenggat_wkt, t_surat_msk.sms_perihal, t_surat_msk.sms_jenis_surat, 
			t_surat_msk.sms_no_agenda, t_surat_msk.sms_unit_tujuan, t_surat_msk.sms_keterangan, 
			t_surat_msk.sms_edited_by, t_surat_msk.sms_status_terkirim, t_surat_msk.sms_file, 
			t_surat_msk.sms_pengirim, t_surat_msk.sms_deleted, t_surat_msk.sms_proses_level, 
			t_unit_tujuan.utj_unit_tujuan, t_jenis_surat_masuk.jsm_nama_jenis,t_tkt_aman.tkt_nama , t_sifat.sifat_nama,
			t_user.usr_userName		
	FROM t_surat_msk
	LEFT JOIN t_jenis_surat_masuk
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
	LEFT JOIN t_unit_tujuan
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id
	LEFT JOIN t_user
	ON t_surat_msk.sms_pengirim = t_user.usr_id
	LEFT JOIN t_tkt_aman
	ON t_surat_msk.sms_tkt_aman = t_tkt_aman.tkt_id
	LEFT JOIN t_sifat
	ON t_surat_msk.sms_sifat = t_sifat.sifat_id
	WHERE t_surat_msk.sms_tgl_srt_diterima >= '$dateAwal'
	AND t_surat_msk.sms_tgl_srt_diterima < '$dateAkhir'
	AND t_surat_msk.sms_deleted = '0'
        AND sms_sudah_disposisi = '0'
        ORDER BY t_surat_msk.sms_id DESC")->result();
        return $data;    
    }
    
    function laporSuratMasuk2($dateAwal, $dateAkhir){
        $this->db->query("SET lc_time_names = 'id_ID'");
        $data = $this->db->query("SELECT	t_surat_msk.sms_id, t_surat_msk.sms_nomor_surat, 
                        DATE_FORMAT(sms_tgl_srt,'%e %M %Y') as sms_tgl_srt, 
			DATE_FORMAT(sms_tgl_srt_diterima,'%e %M %Y') as sms_tgl_srt_diterima, t_surat_msk.sms_tgl_srt_dtlanjut,
			t_surat_msk.sms_tenggat_wkt, t_surat_msk.sms_perihal, t_surat_msk.sms_jenis_surat, 
			t_surat_msk.sms_no_agenda, t_surat_msk.sms_unit_tujuan, t_surat_msk.sms_keterangan, 
			t_surat_msk.sms_edited_by, t_surat_msk.sms_status_terkirim, t_surat_msk.sms_file, 
			t_surat_msk.sms_pengirim, t_surat_msk.sms_deleted, t_surat_msk.sms_proses_level, 
			t_unit_tujuan.utj_unit_tujuan, t_jenis_surat_masuk.jsm_nama_jenis,t_tkt_aman.tkt_nama , t_sifat.sifat_nama,
			t_user.usr_userName		
	FROM t_surat_msk
	LEFT JOIN t_jenis_surat_masuk
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
	LEFT JOIN t_unit_tujuan
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id
	LEFT JOIN t_user
	ON t_surat_msk.sms_pengirim = t_user.usr_id
	LEFT JOIN t_tkt_aman
	ON t_surat_msk.sms_tkt_aman = t_tkt_aman.tkt_id
	LEFT JOIN t_sifat
	ON t_surat_msk.sms_sifat = t_sifat.sifat_id
        LEFT JOIN t_form_disposisi
        ON sms_id = fds_id_surat
        LEFT JOIN tr_disposisi_user
        ON fds_id = dus_disposisi
	WHERE t_surat_msk.sms_tgl_srt_diterima >= '$dateAwal'
	AND t_surat_msk.sms_tgl_srt_diterima < '$dateAkhir'
	AND t_surat_msk.sms_deleted = '0'
        AND sms_sudah_disposisi = '1'
        AND dus_status != '1'
        GROUP BY sms_id
        ORDER BY t_surat_msk.sms_id DESC")->result();
        return $data;    
    }
    
    function laporSuratMasuk3($dateAwal, $dateAkhir){
        $this->db->query("SET lc_time_names = 'id_ID'");
        $data = $this->db->query("SELECT	t_surat_msk.sms_id, t_surat_msk.sms_nomor_surat, 
                        DATE_FORMAT(sms_tgl_srt,'%e %M %Y') as sms_tgl_srt, 
			DATE_FORMAT(sms_tgl_srt_diterima,'%e %M %Y') as sms_tgl_srt_diterima, t_surat_msk.sms_tgl_srt_dtlanjut,
			t_surat_msk.sms_tenggat_wkt, t_surat_msk.sms_perihal, t_surat_msk.sms_jenis_surat, 
			t_surat_msk.sms_no_agenda, t_surat_msk.sms_unit_tujuan, t_surat_msk.sms_keterangan, 
			t_surat_msk.sms_edited_by, t_surat_msk.sms_status_terkirim, t_surat_msk.sms_file, 
			t_surat_msk.sms_pengirim, t_surat_msk.sms_deleted, t_surat_msk.sms_proses_level, 
			t_unit_tujuan.utj_unit_tujuan, t_jenis_surat_masuk.jsm_nama_jenis,t_tkt_aman.tkt_nama , t_sifat.sifat_nama,
			t_user.usr_userName		
	FROM t_surat_msk
	LEFT JOIN t_jenis_surat_masuk
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
	LEFT JOIN t_unit_tujuan
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id
	LEFT JOIN t_user
	ON t_surat_msk.sms_pengirim = t_user.usr_id
	LEFT JOIN t_tkt_aman
	ON t_surat_msk.sms_tkt_aman = t_tkt_aman.tkt_id
	LEFT JOIN t_sifat
	ON t_surat_msk.sms_sifat = t_sifat.sifat_id
        LEFT JOIN t_form_disposisi
        ON sms_id = fds_id_surat
        LEFT JOIN tr_disposisi_user
        ON fds_id = dus_disposisi
	WHERE t_surat_msk.sms_tgl_srt_diterima >= '$dateAwal'
	AND t_surat_msk.sms_tgl_srt_diterima < '$dateAkhir'
	AND t_surat_msk.sms_deleted = '0'
        AND sms_sudah_disposisi = '1'
        AND dus_status = '1'
        AND sms_id NOT IN
        (SELECT sms_id
        FROM t_surat_msk
        LEFT JOIN t_user ON t_surat_msk.sms_edited_by = t_user.usr_id
        JOIN t_form_disposisi ON t_surat_msk.sms_id = t_form_disposisi.fds_id_surat
        JOIN tr_disposisi_user ON t_form_disposisi.fds_id = tr_disposisi_user.dus_disposisi
        WHERE sms_deleted = '0' AND sms_sudah_disposisi = '1'
        AND sms_tgl_srt_diterima >= '$dateAwal' AND sms_tgl_srt_diterima <= '$dateAkhir'
        AND t_form_disposisi.fds_id_parent = '-99' AND t_form_disposisi.fds_deleted = '0'
        AND tr_disposisi_user.dus_status != '1' GROUP BY sms_id)
        GROUP BY sms_id
        ORDER BY t_surat_msk.sms_id DESC")->result();
        return $data;    
    }
    
    function laporSuratMasukBagian1($dateAwal, $dateAkhir, $bagian){
        $this->db->query("SET lc_time_names = 'id_ID'");
        $data = $this->db->query("SELECT	t_surat_msk.sms_id, t_surat_msk.sms_nomor_surat, 
                        DATE_FORMAT(sms_tgl_srt,'%e %M %Y') as sms_tgl_srt, 
			DATE_FORMAT(sms_tgl_srt_diterima,'%e %M %Y') as sms_tgl_srt_diterima, t_surat_msk.sms_tgl_srt_dtlanjut,
			t_surat_msk.sms_tenggat_wkt, t_surat_msk.sms_perihal, t_surat_msk.sms_jenis_surat, 
			t_surat_msk.sms_no_agenda, t_surat_msk.sms_unit_tujuan, t_surat_msk.sms_keterangan, 
			t_surat_msk.sms_edited_by, t_surat_msk.sms_status_terkirim, t_surat_msk.sms_file, 
			t_surat_msk.sms_pengirim, t_surat_msk.sms_deleted, t_surat_msk.sms_proses_level, 
			t_unit_tujuan.utj_unit_tujuan, t_jenis_surat_masuk.jsm_nama_jenis,t_tkt_aman.tkt_nama , t_sifat.sifat_nama,
			t_user.usr_userName		
	FROM t_surat_msk
	LEFT JOIN t_jenis_surat_masuk
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
	LEFT JOIN t_unit_tujuan
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id
	LEFT JOIN t_tkt_aman
	ON t_surat_msk.sms_tkt_aman = t_tkt_aman.tkt_id
	LEFT JOIN t_sifat
	ON t_surat_msk.sms_sifat = t_sifat.sifat_id
        LEFT JOIN t_form_disposisi
        ON t_form_disposisi.fds_id_surat = t_surat_msk.sms_id
        LEFT JOIN tr_disposisi_user
        ON tr_disposisi_user.dus_disposisi = t_form_disposisi.fds_id
        LEFT JOIN t_user
        ON tr_disposisi_user.dus_user = t_user.usr_id
        LEFT JOIN t_jabatan
        ON t_jabatan.jbt_id = t_user.usr_jabatan
        LEFT JOIN t_departemen
        ON t_jabatan.jbt_departemen = t_departemen.dpt_id
	WHERE t_surat_msk.sms_tgl_srt_diterima >= '$dateAwal'
	AND t_surat_msk.sms_tgl_srt_diterima < '$dateAkhir'
	AND t_surat_msk.sms_deleted = '0'
        AND sms_sudah_disposisi = '0'
        AND (t_departemen.dpt_id = '$bagian' OR t_departemen.dpt_parent = '$bagian')
        ORDER BY t_surat_msk.sms_id DESC")->result();
        return $data;    
    }
    
    function laporSuratMasukBagian2($dateAwal, $dateAkhir, $bagian){
        $this->db->query("SET lc_time_names = 'id_ID'");
        $data = $this->db->query("SELECT	t_surat_msk.sms_id, t_surat_msk.sms_nomor_surat, 
                        DATE_FORMAT(sms_tgl_srt,'%e %M %Y') as sms_tgl_srt, 
			DATE_FORMAT(sms_tgl_srt_diterima,'%e %M %Y') as sms_tgl_srt_diterima, t_surat_msk.sms_tgl_srt_dtlanjut,
			t_surat_msk.sms_tenggat_wkt, t_surat_msk.sms_perihal, t_surat_msk.sms_jenis_surat, 
			t_surat_msk.sms_no_agenda, t_surat_msk.sms_unit_tujuan, t_surat_msk.sms_keterangan, 
			t_surat_msk.sms_edited_by, t_surat_msk.sms_status_terkirim, t_surat_msk.sms_file, 
			t_surat_msk.sms_pengirim, t_surat_msk.sms_deleted, t_surat_msk.sms_proses_level, 
			t_unit_tujuan.utj_unit_tujuan, t_jenis_surat_masuk.jsm_nama_jenis,t_tkt_aman.tkt_nama , t_sifat.sifat_nama,
			t_user.usr_userName		
	FROM t_surat_msk
	LEFT JOIN t_jenis_surat_masuk
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
	LEFT JOIN t_unit_tujuan
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id
	LEFT JOIN t_tkt_aman
	ON t_surat_msk.sms_tkt_aman = t_tkt_aman.tkt_id
	LEFT JOIN t_sifat
	ON t_surat_msk.sms_sifat = t_sifat.sifat_id
        JOIN t_form_disposisi
        ON sms_id = fds_id_surat
        JOIN tr_disposisi_user
        ON fds_id = dus_disposisi
        LEFT JOIN t_user
        ON tr_disposisi_user.dus_user = t_user.usr_id
        LEFT JOIN t_jabatan
        ON t_jabatan.jbt_id = t_user.usr_jabatan
        LEFT JOIN t_departemen
        ON t_jabatan.jbt_departemen = t_departemen.dpt_id
	WHERE t_surat_msk.sms_tgl_srt_diterima >= '$dateAwal'
	AND t_surat_msk.sms_tgl_srt_diterima < '$dateAkhir'
	AND t_surat_msk.sms_deleted = '0'
        AND sms_sudah_disposisi = '1'
        AND dus_status != '1'
        AND (t_departemen.dpt_id = '$bagian' OR t_departemen.dpt_parent = '$bagian')
        GROUP BY sms_id
        ORDER BY t_surat_msk.sms_id DESC")->result();
        return $data;    
    }
    
    function laporSuratMasukBagian3($dateAwal, $dateAkhir, $bagian){
        $this->db->query("SET lc_time_names = 'id_ID'");
        $data = $this->db->query("SELECT	t_surat_msk.sms_id, t_surat_msk.sms_nomor_surat, 
                        DATE_FORMAT(sms_tgl_srt,'%e %M %Y') as sms_tgl_srt, 
			DATE_FORMAT(sms_tgl_srt_diterima,'%e %M %Y') as sms_tgl_srt_diterima, t_surat_msk.sms_tgl_srt_dtlanjut,
			t_surat_msk.sms_tenggat_wkt, t_surat_msk.sms_perihal, t_surat_msk.sms_jenis_surat, 
			t_surat_msk.sms_no_agenda, t_surat_msk.sms_unit_tujuan, t_surat_msk.sms_keterangan, 
			t_surat_msk.sms_edited_by, t_surat_msk.sms_status_terkirim, t_surat_msk.sms_file, 
			t_surat_msk.sms_pengirim, t_surat_msk.sms_deleted, t_surat_msk.sms_proses_level, 
			t_unit_tujuan.utj_unit_tujuan, t_jenis_surat_masuk.jsm_nama_jenis,t_tkt_aman.tkt_nama , t_sifat.sifat_nama,
			t_user.usr_userName		
	FROM t_surat_msk
	LEFT JOIN t_jenis_surat_masuk
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
	LEFT JOIN t_unit_tujuan
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id
	LEFT JOIN t_tkt_aman
	ON t_surat_msk.sms_tkt_aman = t_tkt_aman.tkt_id
	LEFT JOIN t_sifat
	ON t_surat_msk.sms_sifat = t_sifat.sifat_id
        JOIN t_form_disposisi
        ON sms_id = fds_id_surat
        JOIN tr_disposisi_user
        ON fds_id = dus_disposisi
        LEFT JOIN t_user
        ON tr_disposisi_user.dus_user = t_user.usr_id
        LEFT JOIN t_jabatan
        ON t_jabatan.jbt_id = t_user.usr_jabatan
        LEFT JOIN t_departemen
        ON t_jabatan.jbt_departemen = t_departemen.dpt_id
	WHERE t_surat_msk.sms_tgl_srt_diterima >= '$dateAwal'
	AND t_surat_msk.sms_tgl_srt_diterima < '$dateAkhir'
	AND t_surat_msk.sms_deleted = '0'
        AND sms_sudah_disposisi = '1'
        AND dus_status = '1'
        AND (t_departemen.dpt_id = '$bagian' OR t_departemen.dpt_parent = '$bagian')
        AND sms_id NOT IN
        (SELECT sms_id
        FROM t_surat_msk
        LEFT JOIN t_user ON t_surat_msk.sms_edited_by = t_user.usr_id
        JOIN t_form_disposisi ON t_surat_msk.sms_id = t_form_disposisi.fds_id_surat
        JOIN tr_disposisi_user ON t_form_disposisi.fds_id = tr_disposisi_user.dus_disposisi
        WHERE sms_deleted = '0' AND sms_sudah_disposisi = '1'
        AND sms_tgl_srt_diterima >= '$dateAwal' AND sms_tgl_srt_diterima <= '$dateAkhir'
        AND t_form_disposisi.fds_id_parent = '-99' AND t_form_disposisi.fds_deleted = '0'
        AND tr_disposisi_user.dus_status != '1' GROUP BY sms_id)
        GROUP BY sms_id
        ORDER BY t_surat_msk.sms_id DESC")->result();
        return $data;    
    }
    
    function laporSuratMasukSubBagian1($dateAwal, $dateAkhir, $bagian){
        $this->db->query("SET lc_time_names = 'id_ID'");
        $data = $this->db->query("SELECT	t_surat_msk.sms_id, t_surat_msk.sms_nomor_surat, 
                        DATE_FORMAT(sms_tgl_srt,'%e %M %Y') as sms_tgl_srt, 
			DATE_FORMAT(sms_tgl_srt_diterima,'%e %M %Y') as sms_tgl_srt_diterima, t_surat_msk.sms_tgl_srt_dtlanjut,
			t_surat_msk.sms_tenggat_wkt, t_surat_msk.sms_perihal, t_surat_msk.sms_jenis_surat, 
			t_surat_msk.sms_no_agenda, t_surat_msk.sms_unit_tujuan, t_surat_msk.sms_keterangan, 
			t_surat_msk.sms_edited_by, t_surat_msk.sms_status_terkirim, t_surat_msk.sms_file, 
			t_surat_msk.sms_pengirim, t_surat_msk.sms_deleted, t_surat_msk.sms_proses_level, 
			t_unit_tujuan.utj_unit_tujuan, t_jenis_surat_masuk.jsm_nama_jenis,t_tkt_aman.tkt_nama , t_sifat.sifat_nama,
			t_user.usr_userName		
	FROM t_surat_msk
	LEFT JOIN t_jenis_surat_masuk
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
	LEFT JOIN t_unit_tujuan
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id
	LEFT JOIN t_tkt_aman
	ON t_surat_msk.sms_tkt_aman = t_tkt_aman.tkt_id
	LEFT JOIN t_sifat
	ON t_surat_msk.sms_sifat = t_sifat.sifat_id
        LEFT JOIN t_form_disposisi
        ON t_form_disposisi.fds_id_surat = t_surat_msk.sms_id
        LEFT JOIN tr_disposisi_user
        ON tr_disposisi_user.dus_disposisi = t_form_disposisi.fds_id
        LEFT JOIN t_user
        ON tr_disposisi_user.dus_user = t_user.usr_id
        LEFT JOIN t_jabatan
        ON t_jabatan.jbt_id = t_user.usr_jabatan
        LEFT JOIN t_departemen
        ON t_jabatan.jbt_departemen = t_departemen.dpt_id
	WHERE t_surat_msk.sms_tgl_srt_diterima >= '$dateAwal'
	AND t_surat_msk.sms_tgl_srt_diterima < '$dateAkhir'
	AND t_surat_msk.sms_deleted = '0'
        AND sms_sudah_disposisi = '0'
        AND (t_departemen.dpt_id = '$bagian')
        ORDER BY t_surat_msk.sms_id DESC")->result();
        return $data;    
    }
    
    function laporSuratMasukSubBagian2($dateAwal, $dateAkhir, $bagian){
        $this->db->query("SET lc_time_names = 'id_ID'");
        $data = $this->db->query("SELECT	t_surat_msk.sms_id, t_surat_msk.sms_nomor_surat, 
                        DATE_FORMAT(sms_tgl_srt,'%e %M %Y') as sms_tgl_srt, 
			DATE_FORMAT(sms_tgl_srt_diterima,'%e %M %Y') as sms_tgl_srt_diterima, t_surat_msk.sms_tgl_srt_dtlanjut,
			t_surat_msk.sms_tenggat_wkt, t_surat_msk.sms_perihal, t_surat_msk.sms_jenis_surat, 
			t_surat_msk.sms_no_agenda, t_surat_msk.sms_unit_tujuan, t_surat_msk.sms_keterangan, 
			t_surat_msk.sms_edited_by, t_surat_msk.sms_status_terkirim, t_surat_msk.sms_file, 
			t_surat_msk.sms_pengirim, t_surat_msk.sms_deleted, t_surat_msk.sms_proses_level, 
			t_unit_tujuan.utj_unit_tujuan, t_jenis_surat_masuk.jsm_nama_jenis,t_tkt_aman.tkt_nama , t_sifat.sifat_nama,
			t_user.usr_userName		
	FROM t_surat_msk
	LEFT JOIN t_jenis_surat_masuk
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
	LEFT JOIN t_unit_tujuan
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id
	LEFT JOIN t_tkt_aman
	ON t_surat_msk.sms_tkt_aman = t_tkt_aman.tkt_id
	LEFT JOIN t_sifat
	ON t_surat_msk.sms_sifat = t_sifat.sifat_id
        JOIN t_form_disposisi
        ON sms_id = fds_id_surat
        JOIN tr_disposisi_user
        ON fds_id = dus_disposisi
        LEFT JOIN t_user
        ON tr_disposisi_user.dus_user = t_user.usr_id
        LEFT JOIN t_jabatan
        ON t_jabatan.jbt_id = t_user.usr_jabatan
        LEFT JOIN t_departemen
        ON t_jabatan.jbt_departemen = t_departemen.dpt_id
	WHERE t_surat_msk.sms_tgl_srt_diterima >= '$dateAwal'
	AND t_surat_msk.sms_tgl_srt_diterima < '$dateAkhir'
	AND t_surat_msk.sms_deleted = '0'
        AND sms_sudah_disposisi = '1'
        AND dus_status != '1'
        AND (t_departemen.dpt_id = '$bagian')
        GROUP BY sms_id
        ORDER BY t_surat_msk.sms_id DESC")->result();
        return $data;    
    }
    
    function laporSuratMasukSubBagian3($dateAwal, $dateAkhir, $bagian){
        $this->db->query("SET lc_time_names = 'id_ID'");
        $data = $this->db->query("SELECT	t_surat_msk.sms_id, t_surat_msk.sms_nomor_surat, 
                        DATE_FORMAT(sms_tgl_srt,'%e %M %Y') as sms_tgl_srt, 
			DATE_FORMAT(sms_tgl_srt_diterima,'%e %M %Y') as sms_tgl_srt_diterima, t_surat_msk.sms_tgl_srt_dtlanjut,
			t_surat_msk.sms_tenggat_wkt, t_surat_msk.sms_perihal, t_surat_msk.sms_jenis_surat, 
			t_surat_msk.sms_no_agenda, t_surat_msk.sms_unit_tujuan, t_surat_msk.sms_keterangan, 
			t_surat_msk.sms_edited_by, t_surat_msk.sms_status_terkirim, t_surat_msk.sms_file, 
			t_surat_msk.sms_pengirim, t_surat_msk.sms_deleted, t_surat_msk.sms_proses_level, 
			t_unit_tujuan.utj_unit_tujuan, t_jenis_surat_masuk.jsm_nama_jenis,t_tkt_aman.tkt_nama , t_sifat.sifat_nama,
			t_user.usr_userName		
	FROM t_surat_msk
	LEFT JOIN t_jenis_surat_masuk
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
	LEFT JOIN t_unit_tujuan
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id
	LEFT JOIN t_tkt_aman
	ON t_surat_msk.sms_tkt_aman = t_tkt_aman.tkt_id
	LEFT JOIN t_sifat
	ON t_surat_msk.sms_sifat = t_sifat.sifat_id
        JOIN t_form_disposisi
        ON sms_id = fds_id_surat
        JOIN tr_disposisi_user
        ON fds_id = dus_disposisi
        LEFT JOIN t_user
        ON tr_disposisi_user.dus_user = t_user.usr_id
        LEFT JOIN t_jabatan
        ON t_jabatan.jbt_id = t_user.usr_jabatan
        LEFT JOIN t_departemen
        ON t_jabatan.jbt_departemen = t_departemen.dpt_id
	WHERE t_surat_msk.sms_tgl_srt_diterima >= '$dateAwal'
	AND t_surat_msk.sms_tgl_srt_diterima < '$dateAkhir'
	AND t_surat_msk.sms_deleted = '0'
        AND sms_sudah_disposisi = '1'
        AND dus_status = '1'
        AND (t_departemen.dpt_id = '$bagian')
        AND sms_id NOT IN
        (SELECT sms_id
        FROM t_surat_msk
        LEFT JOIN t_user ON t_surat_msk.sms_edited_by = t_user.usr_id
        JOIN t_form_disposisi ON t_surat_msk.sms_id = t_form_disposisi.fds_id_surat
        JOIN tr_disposisi_user ON t_form_disposisi.fds_id = tr_disposisi_user.dus_disposisi
        WHERE sms_deleted = '0' AND sms_sudah_disposisi = '1'
        AND sms_tgl_srt_diterima >= '$dateAwal' AND sms_tgl_srt_diterima <= '$dateAkhir'
        AND t_form_disposisi.fds_id_parent = '-99' AND t_form_disposisi.fds_deleted = '0'
        AND tr_disposisi_user.dus_status != '1' GROUP BY sms_id)
        GROUP BY sms_id
        ORDER BY t_surat_msk.sms_id DESC")->result();
        return $data;    
    }
    function searchSuratMasukBagian($dateAwal, $dateAkhir, $bagian){
        $this->db->query("SET lc_time_names = 'id_ID'");
        $data = $this->db->query("SELECT t_surat_msk.sms_id, t_surat_msk.sms_nomor_surat, 
                        DATE_FORMAT(sms_tgl_srt,'%e %M %Y') as sms_tgl_srt, 
			DATE_FORMAT(sms_tgl_srt_diterima,'%e %M %Y') as sms_tgl_srt_diterima, t_surat_msk.sms_tgl_srt_dtlanjut,
			t_surat_msk.sms_tenggat_wkt, t_surat_msk.sms_perihal, t_surat_msk.sms_jenis_surat, 
			t_surat_msk.sms_no_agenda, t_surat_msk.sms_unit_tujuan, t_surat_msk.sms_keterangan, 
			t_surat_msk.sms_edited_by, t_surat_msk.sms_status_terkirim, t_surat_msk.sms_file, 
			t_surat_msk.sms_pengirim, t_surat_msk.sms_deleted, t_surat_msk.sms_proses_level, 
			t_unit_tujuan.utj_unit_tujuan, t_jenis_surat_masuk.jsm_nama_jenis,t_tkt_aman.tkt_nama , t_sifat.sifat_nama
	FROM t_surat_msk
	LEFT JOIN t_jenis_surat_masuk
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
	LEFT JOIN t_unit_tujuan
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id
	LEFT JOIN t_tkt_aman
	ON t_surat_msk.sms_tkt_aman = t_tkt_aman.tkt_id
	LEFT JOIN t_sifat
	ON t_surat_msk.sms_sifat = t_sifat.sifat_id
        LEFT JOIN t_form_disposisi
        ON t_form_disposisi.fds_id_surat = t_surat_msk.sms_id
        LEFT JOIN tr_disposisi_user
        ON tr_disposisi_user.dus_disposisi = t_form_disposisi.fds_id
        LEFT JOIN t_user
        ON tr_disposisi_user.dus_user = t_user.usr_id
        LEFT JOIN t_jabatan
        ON t_jabatan.jbt_id = t_user.usr_jabatan
        LEFT JOIN t_departemen
        ON t_jabatan.jbt_departemen = t_departemen.dpt_id
	WHERE tr_disposisi_user.dus_time_edited >= '$dateAwal'
	AND tr_disposisi_user.dus_time_edited < '$dateAkhir'
	AND t_surat_msk.sms_deleted = '0'
        AND (t_departemen.dpt_id = '$bagian' OR t_departemen.dpt_parent = '$bagian')
        GROUP BY t_surat_msk.sms_id
        ORDER BY t_surat_msk.sms_id DESC")->result();
        return $data;    
    }
    
    function countAll($dateAwal, $dateAkhir){
        $this->db->query("SET lc_time_names = 'id_ID'");
        $data = $this->db->query("SELECT (SELECT COUNT(*)		
	FROM t_surat_msk
	WHERE t_surat_msk.sms_tgl_srt_diterima >= '$dateAwal'
	AND t_surat_msk.sms_tgl_srt_diterima < '$dateAkhir'
	AND t_surat_msk.sms_deleted = '0'
        ORDER BY t_surat_msk.sms_id DESC) AS count_total,
        
        (SELECT COUNT(*)		
	FROM t_surat_msk
	WHERE t_surat_msk.sms_tgl_srt_diterima >= '$dateAwal'
	AND t_surat_msk.sms_tgl_srt_diterima < '$dateAkhir'
	AND t_surat_msk.sms_deleted = '0'
        AND t_surat_msk.sms_sudah_disposisi = '1'
        ORDER BY t_surat_msk.sms_id DESC) AS count_proses,
        
        (SELECT COUNT(*)		
	FROM t_surat_msk
	WHERE t_surat_msk.sms_tgl_srt_diterima >= '$dateAwal'
	AND t_surat_msk.sms_tgl_srt_diterima < '$dateAkhir'
	AND t_surat_msk.sms_deleted = '0'
        AND t_surat_msk.sms_sudah_disposisi = '0'
        ORDER BY t_surat_msk.sms_id DESC) AS count_belum_proses
        ")->row();
        return $data;
    }
            
    function countAllBagian($dateAwal, $dateAkhir, $bagian){
        $this->db->query("SET lc_time_names = 'id_ID'");
        $data = $this->db->query("SELECT (SELECT COUNT(t_surat_msk.sms_id) as counting
	FROM t_surat_msk
	LEFT JOIN t_jenis_surat_masuk
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
	LEFT JOIN t_unit_tujuan
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id
	LEFT JOIN t_tkt_aman
	ON t_surat_msk.sms_tkt_aman = t_tkt_aman.tkt_id
	LEFT JOIN t_sifat
	ON t_surat_msk.sms_sifat = t_sifat.sifat_id
        LEFT JOIN t_form_disposisi
        ON t_form_disposisi.fds_id_surat = t_surat_msk.sms_id
        LEFT JOIN tr_disposisi_user
        ON tr_disposisi_user.dus_disposisi = t_form_disposisi.fds_id
        LEFT JOIN t_user
        ON tr_disposisi_user.dus_user = t_user.usr_id
        LEFT JOIN t_jabatan
        ON t_jabatan.jbt_id = t_user.usr_jabatan
        LEFT JOIN t_departemen
        ON t_jabatan.jbt_departemen = t_departemen.dpt_id
	WHERE tr_disposisi_user.dus_time_edited >= '$dateAwal'
	AND tr_disposisi_user.dus_time_edited < '$dateAkhir'
	AND t_surat_msk.sms_deleted = '0'
        AND (t_departemen.dpt_id = '$bagian' OR t_departemen.dpt_parent = '$bagian')
        
        ) AS count_total,
        
        (SELECT COUNT(t_surat_msk.sms_id) as counting
	FROM t_surat_msk
	LEFT JOIN t_jenis_surat_masuk
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
	LEFT JOIN t_unit_tujuan
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id
	LEFT JOIN t_tkt_aman
	ON t_surat_msk.sms_tkt_aman = t_tkt_aman.tkt_id
	LEFT JOIN t_sifat
	ON t_surat_msk.sms_sifat = t_sifat.sifat_id
        LEFT JOIN t_form_disposisi
        ON t_form_disposisi.fds_id_surat = t_surat_msk.sms_id
        LEFT JOIN tr_disposisi_user
        ON tr_disposisi_user.dus_disposisi = t_form_disposisi.fds_id
        LEFT JOIN t_user
        ON tr_disposisi_user.dus_user = t_user.usr_id
        LEFT JOIN t_jabatan
        ON t_jabatan.jbt_id = t_user.usr_jabatan
        LEFT JOIN t_departemen
        ON t_jabatan.jbt_departemen = t_departemen.dpt_id
	WHERE tr_disposisi_user.dus_time_edited >= '$dateAwal'
	AND tr_disposisi_user.dus_time_edited < '$dateAkhir'
	AND t_surat_msk.sms_deleted = '0'
        AND t_surat_msk.sms_sudah_disposisi = '1'
        AND (t_departemen.dpt_id = '$bagian' OR t_departemen.dpt_parent = '$bagian')
        
        ) AS count_proses,
        
        (SELECT COUNT(t_surat_msk.sms_id) as counting
	FROM t_surat_msk
	LEFT JOIN t_jenis_surat_masuk
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
	LEFT JOIN t_unit_tujuan
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id
	LEFT JOIN t_tkt_aman
	ON t_surat_msk.sms_tkt_aman = t_tkt_aman.tkt_id
	LEFT JOIN t_sifat
	ON t_surat_msk.sms_sifat = t_sifat.sifat_id
        LEFT JOIN t_form_disposisi
        ON t_form_disposisi.fds_id_surat = t_surat_msk.sms_id
        LEFT JOIN tr_disposisi_user
        ON tr_disposisi_user.dus_disposisi = t_form_disposisi.fds_id
        LEFT JOIN t_user
        ON tr_disposisi_user.dus_user = t_user.usr_id
        LEFT JOIN t_jabatan
        ON t_jabatan.jbt_id = t_user.usr_jabatan
        LEFT JOIN t_departemen
        ON t_jabatan.jbt_departemen = t_departemen.dpt_id
	WHERE tr_disposisi_user.dus_time_edited >= '$dateAwal'
	AND tr_disposisi_user.dus_time_edited < '$dateAkhir'
	AND t_surat_msk.sms_deleted = '0'
        AND t_surat_msk.sms_sudah_disposisi = '0'
        AND (t_departemen.dpt_id = '$bagian' OR t_departemen.dpt_parent = '$bagian')
        
        ) AS count_belum_proses
        ")->row();
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
