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
    function updateSyaratPenyedia($id, $data){
        $this->db->where('psr_id', $id);
        $this->db->update('tr_pgd_suratizin', $data);
    }
    function updateHargaPenawaran($id, $data){
        $this->db->where('dtp_id', $id);
        $this->db->update('t_detail_pengadaan', $data);
    }
    function updateHargaFix($id, $data){
        $this->db->where('dtp_id', $id);
        $this->db->update('t_detail_pengadaan', $data);
    }
    
    function deleteDetailPengadaan($id){
        $this->db->where('dtp_id', $id);
        $this->db->delete('t_detail_pengadaan');
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
    
    function ajaxProcessBarang($min, $max, $status){
        $this->db->query("SET lc_time_names = 'id_ID'");
	$this->datatables
                ->select("t_pengadaan.*,pgd_id, pgd_perihal, pgd_anggaran,IF(pgd_status_selesai = '-1', 'penawaran tidak berhasil','') as pnr_gagal, "
                        . "DATE_FORMAT(pgd_tanggal_input,'%e %M %Y') as pgd_tanggal_input, "
                        . "spl_nama as supplier_name,"
                        . "pgd_tipe_pengadaan,pgd_status_pengadaan, "
                        . 'CONCAT("Rp ",FORMAT(pgd_jml_ssdh_ppn_hps,"0")) as pgd_jml_ssdh_ppn_hps, '
                        . "CONCAT('Rp ',FORMAT(pgd_jml_ssdh_ppn_pnr,'0')) as pgd_jml_ssdh_ppn_pnr, "
                        . "CONCAT('Rp ',FORMAT(pgd_jml_ssdh_ppn_fix,'0')) as pgd_jml_ssdh_ppn_fix ")
                ->from('t_pengadaan')
                ->join('t_supplier', 'spl_id = pgd_supplier','left')
                ->where('pgd_deleted', '0')
                ->where('YEAR(pgd_tanggal_input)', $this->session->tahun)
                ->where('pgd_tanggal_input >= ', $min)
		->where('pgd_tanggal_input <= ', $max)
                ->where('pgd_tipe_pengadaan = 0')      //Barang
                ->add_column('nmpengadaan_tglbuat', '$1<br>$2', 'pgd_perihal, pgd_tanggal_input')
                ->add_column('ketua', 'aw');
               
        switch ($status) {
            case "0":
                $this->datatables->add_column('total', '$1', 'pgd_jml_ssdh_ppn_hps');
                
                $this->datatables->where('pgd_status_pengadaan = 0');      //status
                $this->datatables->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-danger btn-sm delete btn-aksi' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Anda yakin akan menghapus ini?' href='delete_pengadaan/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Hapus</a>".
			"<a class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Edit' href='edit_pengadaan/$1/$2/$3'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah</a>".
                        "<a class='btn btn-warning btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Cetak Laporan Setelah HPS' href='".base_url()."Laporan/cetaklaporan/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Cetak(HPS)</a>".
                        "<a class='btn btn-success btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Input Penawaran' href='add_penawaran_barang/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Penawaran</a>".
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
                        "<a class='btn btn-success btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Input Harga Terakhir Barang' href='add_hargafix_barang/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Negosiasi</a>".
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
                        "<a class='btn btn-warning btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Cetak Laporan Setelah Negosiasi' href='".base_url()."Laporan/LaporanFix/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Cetak</a>".
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
                $this->datatables->where('pgd_status_pengadaan = 2');      //status
                $this->datatables->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			
			"<a class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Edit' href='edit_pengadaan/$1/$2/$3'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah</a>".
                        "<a class='btn btn-warning btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Cetak Laporan Setelah Negosiasi' href='".base_url()."Laporan/LaporanFix/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Cetak(Fix)</a>".
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
                $this->datatables->where('pgd_status_pengadaan = 2');      //status
                $this->datatables->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			
			"<a class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Edit' href='edit_pengadaan/$1/$2/$3'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah</a>".
                        "<a class='btn btn-warning btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Cetak Laporan Setelah Negosiasi' href='".base_url()."Laporan/LaporanFix/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Cetak(Fix)</a>".
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
        }
        return $this->datatables->generate();
    }
    
    function ajaxProcessJasa($min, $max, $status){
        $this->db->query("SET lc_time_names = 'id_ID'");
	$this->datatables
                ->select("t_pengadaan.*,pgd_id, pgd_perihal, pgd_anggaran,IF(pgd_status_selesai = '-1', 'penawaran tidak berhasil','') as pnr_gagal, "
                        . "DATE_FORMAT(pgd_tanggal_input,'%e %M %Y') as pgd_tanggal_input, "
                        . "spl_nama as supplier_name, "
                        . "pgd_tipe_pengadaan,pgd_status_pengadaan, "
                        . "CONCAT('Rp. ',FORMAT(pgd_jml_ssdh_ppn_hps,'2')) as pgd_jml_ssdh_ppn_hps, "
                        . "CONCAT('Rp. ',FORMAT(pgd_jml_ssdh_ppn_pnr,'2')) as pgd_jml_ssdh_ppn_pnr,"
                        . "CONCAT('Rp. ',FORMAT(pgd_jml_ssdh_ppn_hps,'2')) as pgd_jml_ssdh_ppn_fix ")
                ->from('t_pengadaan')
               
                ->join('t_supplier', 'spl_id = pgd_supplier','left')
                ->where('pgd_deleted', '0')
                ->where('YEAR(pgd_tanggal_input)', $this->session->tahun)
                ->where('pgd_tanggal_input >= ', $min)
		->where('pgd_tanggal_input <= ', $max)
                ->where('pgd_tipe_pengadaan = 1')      //Jasa
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
                        "<a type ='button' class='btn btn-success btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Input Penawaran' href='add_penawaran_jasa/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Penawaran</a>".
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
                        "<a class='btn btn-success btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Input Harga Terakhir Barang' href='add_hargafix_jasa/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Negosiasi</a>".
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
                        "<a class='btn btn-warning btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Cetak Laporan Setelah Negosiasi' href='".base_url()."Laporan/LaporanFix/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Cetak(Fix)</a>".
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
        }
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
    
    function historiSurat($id){
        $this->db
		->select('*')
                ->from('tr_detail_surat, tr_detail_konten, t_konten, t_surat')
                ->where('dsrt_idpengadaan', $id)
                 ->where('dsrt_jenis_surat = srt_id')
                ->where('dknt_idkonten = knt_id')
                ->where('dknt_detailsurat = dsrt_id')
                ->order_by('srt_id'); 
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
     
    function update($id, $data){
        $this->db->where('pgd_id', $id);
        $this->db->update('t_pengadaan', $data);
    }
    
    function checkPNCFound($id){
        $this->db->select("pgd_id");
        $this->db->where('pgd_id', $id);
        return $this->db->get()->result();
    }
    
    function deletePekerjaan($id){
        $this->db->where('dtp_pengadaan', $id);
        $this->db->delete('t_detail_pengadaan');
    }
    
    function deletePenyusun($id){
        $this->db->where('klp_pengadaan', $id);
        $this->db->delete('t_kelompok_penyusun');
    }
    
    function deleteSyaratPenyedia($id){
        $this->db->where('psr_pengadaan', $id);
        $this->db->delete('tr_pgd_suratizin');
    }
    
    function delete($id){
	$data['pgd_deleted'] = '1';
        $this->db->where('pgd_id', $id);
        $this->db->update('t_pengadaan', $data);
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
