<?php

class M_konsultan extends CI_Model{
    function __construct(){
        parent::__construct();
        	$this->load->library('Datatables');
    }
    
    function insertKons1($data){
        $this->db->insert('t_detail_konsultan1', $data);
    }
    
    function insertKons2($data){
        $this->db->insert('t_detail_konsultan2', $data);
    }
    
    function insertPengalamanPerusahaan($data){
        $this->db->insert('t_pengalaman_prs', $data);
    }
    
    function insertMetodePerusahaan($data){
        $this->db->insert('t_metode', $data);
    }
    
    function insertKualifikasiTenagaAhli($data){
        $this->db->insert('t_personal_inti', $data);
    }
    
    function insertPengalamanTenagaAhli($data){
        $this->db->insert('t_pengalaman_kerja', $data);
    }
    
    function deleteDetailKons1($id){
        $this->db->where('dtk_id', $id);
        $this->db->delete('t_detail_konsultan1');
    }
    
    function deleteKualifikasiPersonilByUnp($id){
        $this->db->where('psi_id', $id);
        $this->db->delete('t_personal_inti');
    }
    
    function deletePengalamanPersonilByUnp($id){
        $this->db->where('pnk_id', $id);
        $this->db->delete('t_pengalaman_kerja');
    }
    
     function deleteDetailKons2($id){
        $this->db->where('dtk2_id', $id);
        $this->db->delete('t_detail_konsultan2');
    }
    
    function HitungTotalHargaKonsultan($id,$pajak){
        $this->db->query("call sum_total_pengadaan_konsultan($id,$pajak)");
    }
    
    function selectUnsurPenilaianTeknisByPgd($idPengadaan){
        $this->db->select('*');
        $this->db->from('t_unsur_penilaian');
        $this->db->where('unp_pgd', $idPengadaan);
        return $this->db->get()->row();
    }
    
    function updateHargaPenawaranKonsultan1($id, $data){
        $this->db->where('dtk_id', $id);
        $this->db->update('t_detail_konsultan1', $data);
    }
    function updateHargaPenawaranKonsultan2($id, $data){
        $this->db->where('dtk2_id', $id);
        $this->db->update('t_detail_konsultan2', $data);
    }
    function updateUnsurPenilaianTeknis($id, $data){
        $this->db->where('unp_id', $id);
        $this->db->update('t_unsur_penilaian', $data);
    }
    function insertUnsurPenilaianTeknis($dat){
        $this->db->insert('t_unsur_penilaian', $dat);
    }
    
    function getTotalHargaKonsultan1($id){
        return $this->db->query(""
                . "SELECT IFNULL(SUM(dtk_jml_biaya_hps),'0') as jml_biaya_hps, "
                . "IFNULL(SUM(dtk_jml_biaya_pnr),'0') as jml_biaya_pnr, "
                . "IFNULL(SUM(dtk_jml_biaya_fix),'0') as jml_biaya_fix "
                . "FROM t_detail_konsultan1 "
                . "WHERE dtk_pgd = '$id'")->row();
    }
    
   function getTotalHargaKonsultan2($id){
        return $this->db->query(""
                . "SELECT IFNULL(SUM(dtk2_jumlahharga_hps),'0') as jml_biaya_hps, "
                . "IFNULL(SUM(dtk2_jumlahharga_pnr),'0') as jml_biaya_pnr, "
                . "IFNULL(SUM(dtk2_jumlahharga_fix),'0') as jml_biaya_fix "
                . "FROM t_detail_konsultan2 "
                . "WHERE dtk2_pengadaan = '$id'")->row();
    }
    
    function getTotalPengalamanByIdPersonal($id){
        return $this->db->query(""
                . "SELECT IFNULL((SUM(pnk_perhitungan_bln_kerja)/12),'0') as jml_pengalaman "
                . "FROM t_pengalaman_kerja "
                . "WHERE pnk_psi = '$id'")->row();
    }
    
    function selectDrawTableKons1($id){
        return $this->db->query(""
                . "SELECT sjd_sub_judul, t_detail_konsultan1.* "
                . "FROM t_detail_konsultan1 "
                . "LEFT JOIN t_sub_judul "
                . "ON dtk_sub_judul = sjd_id "
                . "WHERE dtk_pgd = '$id' "
                . "ORDER BY sjd_id IS NULL, dtk_id")->result();
    }
    
    function selectDrawTableKons2($id){
        return $this->db->query(""
                . "SELECT sjd_sub_judul, t_detail_konsultan2.* "
                . "FROM t_detail_konsultan2 "
                . "LEFT JOIN t_sub_judul "
                . "ON dtk2_sub_judul = sjd_id "
                . "WHERE dtk2_pengadaan = '$id' "
                . "ORDER BY sjd_id IS NULL, dtk2_id")->result();
    }
    
    function selectKualifikasiPersonilByUnp($id){
        return $this->db->query(""
                . "SELECT dtk_jabatan, t_personal_inti.* "
                . "FROM t_personal_inti "
                . "LEFT JOIN t_detail_konsultan1 "
                . "ON dtk_id = psi_dtk "
                . "WHERE psi_uns = '$id' "
                . "ORDER BY dtk_id ")->result();
    }
    
    function selectPengalamanPersonilByUnp($id){
        return $this->db->query(""
                . "SELECT t_pengalaman_kerja.* "
                . "FROM t_pengalaman_kerja "
                . "WHERE pnk_psi = '$id' "
                . "ORDER BY pnk_id ")->result();
    }
    
    function select2All($search){
        
        $search = '%'.$search.'%';
        return $this->db->query("select ang_kode as id, CONCAT(ang_kode,' - ', ang_nama) as 'text' "
                . "From t_anggaran "
                . "where ang_deleted = 0 "
                . "and ((ang_kode like '$search') OR (ang_nama like '$search')) "
                . "order by ang_kode LIMIT 0,40")->result();
       
    }
    
    function selectPengadaanKonsultanById($id){
        $this->db
		->select('*')
                ->from('t_pengadaan')
                ->where('pgd_id', $id)
		->where('pgd_deleted', '0')
		->join('t_anggaran', 'pgd_anggaran = ang_kode', 'left')
                ->join('t_supplier', 'pgd_supplier = spl_id', 'left')
                ->join('t_user', 'pgd_user_update = usr_id', 'left')
                ->join('t_unsur_penilaian', 'pgd_id = unp_pgd', 'left')
		->join('t_pegawai', 'usr_pegawai = pgw_id', 'left');	
        return $this->db->get()->row();
    }
    
    
    
    function selectPengalamanPerusahaanByUnp($id){
        $this->db
		->select('*')
                ->from('t_pengalaman_prs')
                ->where('pnp_unp', $id)
		;	
        return $this->db->get()->result();
    }
    
    function selectKualifikasiPersonalById($id){
        $this->db
		->select('*')
                ->from('t_personal_inti')
                ->join('t_detail_konsultan1', 'dtk_id = psi_dtk', 'left')
                ->where('psi_id', $id)
		;	
        return $this->db->get()->row();
    }
    
    function selectMetodePerusahaanByUnp($id){
        $this->db
		->select('*')
                ->from('t_metode')
                ->where('mtd_unp', $id)
		;	
        return $this->db->get()->result();
    }
    
    function selectByIdUnsurPenilaian($id){
        $this->db->select('*');
        $this->db->from('t_unsur_penilaian');
        $this->db->where('unp_id', $id);
        return $this->db->get()->row();
    }
    
    function selectByIdKons1($id){
        $this->db->select('*');
        $this->db->from('t_detail_konsultan1');
        $this->db->where('dtk_id', $id);
        return $this->db->get()->row();
    }
    
    function selectByIdKons2($id){
        $this->db->select('*');
        $this->db->from('t_detail_konsultan2');
        $this->db->where('dtk2_id', $id);
        return $this->db->get()->row();
    }
    
    function select2AllJabatanNamaPersonil($search, $id){
        
        $search = '%'.strtolower($search).'%';
        return $this->db->query("select dtk_id as id, dtk_jabatan as 'text' "
                . "From t_detail_konsultan1 "
                . "where LOWER(dtk_jabatan) like '$search'  "
                . "and dtk_pgd = '$id' "
                . "order by dtk_jabatan LIMIT 0,40")->result();
       
    }
  
    function ajaxProcessKonsultan($min, $max, $status){
        $this->db->query("SET lc_time_names = 'id_ID'");
	$this->datatables
                ->select("t_pengadaan.*,pgd_id, pgd_perihal, pgd_anggaran,IF(pgd_status_selesai = '-1', 'penawaran tidak berhasil','') as pnr_gagal, pgd_status_pengadaan, "
                        . "DATE_FORMAT(pgd_tanggal_input,'%e %M %Y') as pgd_tanggal_input, "
                        . "spl_nama as supplier_name, "
                        . "pgd_tipe_pengadaan,pgd_status_pengadaan, "
                        . "CONCAT('Rp. ',FORMAT(pgd_jml_ssdh_ppn_hps,'2')) as pgd_jml_ssdh_ppn_hps, "
                        . "CONCAT('Rp. ',FORMAT(pgd_jml_ssdh_ppn_pnr,'2')) as pgd_jml_ssdh_ppn_pnr,"
                        . "CONCAT('Rp. ',FORMAT(pgd_jml_ssdh_ppn_fix,'2')) as pgd_jml_ssdh_ppn_fix ")
                ->from('t_pengadaan')
               
                ->join('t_supplier', 'spl_id = pgd_supplier','left')
                ->where('pgd_deleted', '0')
                ->where('YEAR(pgd_tanggal_input)', $this->session->tahun)
                ->where('pgd_tanggal_input >= ', $min)
		->where('pgd_tanggal_input <= ', $max)
                ->where('pgd_tipe_pengadaan = 2')      //Jasa
                ->add_column('nmpengadaan_tglbuat', '$1<br>$2', 'pgd_perihal, pgd_tanggal_input')
                ->add_column('ketua', 'aw');
               
        switch ($status) {
            case "0":
                $this->datatables->add_column('total', '$1', 'pgd_jml_ssdh_ppn_hps');
                
                $this->datatables->where('pgd_status_pengadaan = 0');      //status
                $this->datatables->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a type ='button' class='btn btn-danger btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Anda yakin akan menghapus ini?' href='delete_pengadaan/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Hapus</a>".
			"<a type ='button' class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Edit' href='edit_pengadaan/$1/$2/$3'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah</a>".
                        "<a type ='button' class='btn btn-warning btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Cetak Laporan Setelah HPS' href='".base_url()."Laporan/cetaklaporan/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Cetak(HPS)</a>".
                        "<a type ='button' class='btn btn-success btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Input Penawaran' href='add_penawaran_konsultan/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Penawaran</a>".
			"</div>".
			"</form>".
                         "",'pgd_id, pgd_tipe_pengadaan,pgd_status_pengadaan');
                $this->datatables->add_column('konfirm_selesai', '<?php '
                        . 'if($2 == 3){'
                        . 'echo "fak";}?>'
                        . '<a class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>'
                        , 'pgd_id, pgd_status_pengadaan');
                break;
            case "1":
                $this->datatables->add_column('total', '$1', 'pgd_jml_ssdh_ppn_pnr');
               $this->datatables->where('pgd_status_pengadaan = 1');      //status
                $this->datatables->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			
			"<a class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Edit' href='edit_pengadaan/$1/$2/$3'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah</a>".
                        "<a class='btn btn-warning btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Cetak Laporan Setelah Penawaran' href='".base_url()."Laporan/LaporanPenawaran/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Cetak(PNR)</a>".
                        "<a class='btn btn-success btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Input Harga Terakhir Barang' href='add_hargafix_konsultan/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Negosiasi</a>".
			"</div>".
			"</form>".
                        "",'pgd_id, pgd_tipe_pengadaan,pgd_status_pengadaan');
                $this->datatables->add_column('konfirm_selesai', '<?php '
                        . 'if($2 == 3){'
                        . 'echo "fak";}?>'
                        . '<a class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>'
                        , 'pgd_id, pgd_status_pengadaan');
                break;
            case "2":
                $this->datatables->add_column('total', '$1', 'pgd_jml_ssdh_ppn_fix');
                $this->datatables->where('pgd_status_pengadaan = 2');      //status
                $this->datatables->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			
			"<a class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Edit' href='edit_pengadaan/$1/$2/$3'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah</a>".
                        "<a class='btn btn-warning btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Cetak Laporan Setelah Negosiasi' href='".base_url()."Laporan/LaporanFix/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Cetak(Nego)</a>".
			"</div>".
			"</form>".
                         "",'pgd_id, pgd_tipe_pengadaan,pgd_status_pengadaan');
                 $this->datatables->add_column('konfirm_selesai', '<?php '
                        . 'if($2 == 3){'
                        . 'echo "fak";}?>'
                        . '<a class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>'
                        , 'pgd_id, pgd_status_pengadaan');
                break;
            case "3":
                $this->datatables->add_column('total', '$1', 'pgd_jml_ssdh_ppn_fix');
                $this->datatables->where('pgd_status_pengadaan = 3');      //status
                $this->datatables->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			
			"<a class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Edit' href='edit_pengadaan/$1/$2/$3'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah</a>".
                        "<a class='btn btn-warning btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Cetak Laporan Setelah Pengumuman' href='".base_url()."Laporan/LaporanAkhir/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Cetak</a>".
			"</div>".
			"</form>".
                         "",'pgd_id, pgd_tipe_pengadaan,pgd_status_pengadaan');
               $this->datatables->add_column('konfirm_selesai', '<?php '
                        . 'if($2 == 3){'
                        . 'echo "fak";}?>'
                        . '<a class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>'
                        , 'pgd_id, pgd_status_pengadaan');
                
                break;
            case "4":
                $this->datatables->add_column('total', '$1', 'pgd_jml_ssdh_ppn_fix');
                $this->datatables->where('pgd_status_pengadaan = 4');      //status
                $this->datatables->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			
			"<a class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Edit' href='edit_pengadaan/$1/$2/$3'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah</a>".
                        
			"</div>".
			"</form>".
                         "",'pgd_id, pgd_tipe_pengadaan,pgd_status_pengadaan');
               // jika ada role status selesai pengen dibalikan pake if disini
                $this->datatables->add_column('konfirm_selesai', '<?php '
                        . 'if($2 == 1){'
                        . 'echo "fak";}?>'
                        . '<a class="btn btn-danger btn-sm confirm" data-toggle="tooltip" data-placement="top" title="Konfirmasi Selesai Pengadaan" data-confirm="Anda yakin Pengadaan ini telah selesai?" data-href="KonfirmasiSelesai/$1"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>'
                        , 'pgd_id, pgd_status_pengadaan');
                
                break;
            case "5":
                $this->datatables->add_column('total', '$1', 'pgd_jml_ssdh_ppn_fix');
                $this->datatables->where('pgd_status_pengadaan = 5');      //status
                $this->datatables->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Edit' href='edit_pengadaan/$1/$2/$3'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah</a>".
			"</div>".
			"</form>".
                         "",'pgd_id, pgd_tipe_pengadaan,pgd_status_pengadaan');
                // jika ada role status selesai pengen dibalikan pake if disini
                $this->datatables->add_column('konfirm_selesai', '<?php '
                        . 'if($2 == 1){'
                        . 'echo "fak";}?>'
                        . '<a class="btn btn-danger btn-sm confirm" data-toggle="tooltip" data-placement="top" title="Konfirmasi Selesai Pengadaan" data-confirm="Anda yakin Pengadaan ini telah selesai?" data-href="KonfirmasiSelesai/$1"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>'
                        , 'pgd_id, pgd_status_pengadaan');
                
                break;
            default:
                $this->datatables->add_column('total', 'HPS: $1 <br> Penawaran: $2 <br> Fix/Deal: $3', 'pgd_jml_ssdh_ppn_hps, pgd_jml_ssdh_ppn_pnr, pgd_jml_ssdh_ppn_fix');
                $this->datatables->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			
			"------".
                        
			"</div>".
			"</form>".
                         "",'pgd_id, pgd_tipe_pengadaan,pgd_status_pengadaan');
                // jika ada role status selesai pengen dibalikan pake if disini
                $this->datatables->add_column('konfirm_selesai', ''
                        . '<a class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>'
                        . '<?php }?>'
                        , 'pgd_id, pgd_status_pengadaan');
                
                break;
        }
        return $this->datatables->generate();
    }
    
}
