<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengadaan extends CI_Controller{
    //put your code here
    public function __construct(){
        parent::__construct();
        $level = $this->session->userdata('id_level');
        if($this->session->userdata('id_user') == ''){
            $this->session->set_flashdata('message', array('msg' => 'Silahkan <strong>login</strong> untuk melanjutkan','class' => 'danger'));
            $this->session->set_flashdata('history', $this->uri->uri_string());
            redirect('login');
        }
        else
        {
            $this->load->helper('url');
            $this->load->helper('date');
            $this->load->database();
            $this->load->model('m_pengadaan');
            $this->load->model('M_anggaran');
            $this->load->model('m_user');
            $this->load->model('M_supplier');
            $this->load->model('M_suratizin');
            $this->load->model('M_pegawai');
            $this->load->model('M_penyusun');
       
        }
    }
  
	
    function writeLog($tabel, $aksi){
        $data['log_user'] = $this->session->userdata('id_user');
        $data['log_nama_tabel'] = $tabel;
        $data['log_aksi'] = $aksi;
        $this->m_log->insert($data);
    }

    function limitRole($limit){
        $role = $this->session->userdata('id_role');
        $access = false;
        foreach ($limit as $row){
            if ($row == $role){$access = true;}
        }
        if(!$access){
                $this->session->set_flashdata('message', array('msg' => 'Anda <strong>tidak memiliki akses</strong> ke fitur yang anda pilih','class' => 'danger'));
                redirect('Dashboard');
        }
    }
    
    public function index(){
//        $level = $this->session->userdata('id_level');
//        if($level != 1){$this->limitRole(array(1, 2, 3));}
        $data['content'] = 'l_pengadaan';
        $data['title']= 'Daftar Pengadaan';
        $this->load->view('layout',$data);
    }
    
    public function PengadaanBarang(){
//        $level = $this->session->userdata('id_level');
//        if($level != 1){$this->limitRole(array(1, 2, 3));}
        $data['content'] = 'l_pengadaan_barang';
        $data['title']= 'Daftar Pengadaan Barang (HPS)';
        $data['jenisPengadaan']= '0';
        $data['statusPengadaan']= '-1';
        $this->load->view('layout',$data);
    }
    
    public function PengadaanBarangHPS(){
//        $level = $this->session->userdata('id_level');
//        if($level != 1){$this->limitRole(array(1, 2, 3));}
        $data['content'] = 'l_pengadaan_barang';
        $data['title']= 'Daftar Pengadaan Barang (HPS)';
        $data['jenisPengadaan']= '0';
        $data['statusPengadaan']= '0';
        $this->load->view('layout',$data);
    }
    
    public function PengadaanBarangPenawaran(){
//        $level = $this->session->userdata('id_level');
//        if($level != 1){$this->limitRole(array(1, 2, 3));}
        $data['content'] = 'l_pengadaan_barang';
        $data['title']= 'Daftar Pengadaan Barang (Penawaran)';
        $data['jenisPengadaan']= '0';
        $data['statusPengadaan']= '1';
        $this->load->view('layout',$data);
    }
    
    public function PengadaanBarangFix(){
//        $level = $this->session->userdata('id_level');
//        if($level != 1){$this->limitRole(array(1, 2, 3));}
        $data['content'] = 'l_pengadaan_barang';
        $data['title']= 'Daftar Pengadaan Barang (Fix)';
        $data['jenisPengadaan']= '0';
        $data['statusPengadaan']= '2';
        $this->load->view('layout',$data);
    }
    
     public function PengadaanJasa(){
//        $level = $this->session->userdata('id_level');
//        if($level != 1){$this->limitRole(array(1, 2, 3));}
        $data['content'] = 'l_pengadaan_jasa';
        $data['title']= 'Daftar Pengadaan Jasa';
        $data['jenisPengadaan']= '1';
        $data['statusPengadaan']= '-1';
        $this->load->view('layout',$data);
    }
    
    public function PengadaanJasaHPS(){
//        $level = $this->session->userdata('id_level');
//        if($level != 1){$this->limitRole(array(1, 2, 3));}
        $data['content'] = 'l_pengadaan_jasa';
        $data['title']= 'Daftar Pengadaan Jasa (HPS)';
        $data['jenisPengadaan']= '1';
        $data['statusPengadaan']= '0';
        $this->load->view('layout',$data);
    }
    
    public function PengadaanJasaPenawaran(){
//        $level = $this->session->userdata('id_level');
//        if($level != 1){$this->limitRole(array(1, 2, 3));}
        $data['content'] = 'l_pengadaan_jasa';
        $data['title']= 'Daftar Pengadaan Jasa (Penawaran)';
        $data['jenisPengadaan']= '1';
        $data['statusPengadaan']= '1';
        $this->load->view('layout',$data);
    }
    
    public function PengadaanJasaFix(){
//        $level = $this->session->userdata('id_level');
//        if($level != 1){$this->limitRole(array(1, 2, 3));}
        $data['content'] = 'l_pengadaan_jasa';
        $data['title']= 'Daftar Pengadaan Jasa (Fix)';
        $data['jenisPengadaan']= '1';
        $data['statusPengadaan']= '2';
        $this->load->view('layout',$data);
    }
		
    public function ajaxProcess(){
        $min=$this->input->post('min');
        $max=$this->input->post('max');
        if($min == '') $min = '0000-01-01';
        if($max == '') $max = '9999-12-31';
        $result = $this->m_pengadaan->ajaxProcess($min,$max);
        echo $result;
    }
    
    public function ajaxProcessBarang($status){
        $min=$this->input->post('min');
        $max=$this->input->post('max');
        if($min == '') $min = '0000-01-01';
        if($max == '') $max = '9999-12-31';
        $result = $this->m_pengadaan->ajaxProcessBarang($min,$max,$status);
        echo $result;
    }
    
    public function ajaxProcessJasa($status){
        $min=$this->input->post('min');
        $max=$this->input->post('max');
        if($min == '') $min = '0000-01-01';
        if($max == '') $max = '9999-12-31';
        $result = $this->m_pengadaan->ajaxProcessJasa($min,$max,$status);
        echo $result;
    }
    
    public function detail_pengadaan($id){
        $data['content'] = 'v_pengadaan';
        $data['title']= 'Detail Pengadaan'; 
        $data['dataPengadaan']= $this->m_pengadaan->selectById($id);
        $data['pekerjaanList']= $this->m_pengadaan->selectDetailPengadaan($id);
        $terpilih = 1;
        $data['penyusunList']= $this->m_pengadaan->selectListPenyusun($id,$terpilih);
        $data['suratList']= $this->m_pengadaan->selectListSyaratPenyedia($id);
        $data['modeView']= "pengadaan";
        $this->load->view('layout',$data);
    }
    
     public function add_pengadaan($tipePengadaan){
        switch ($tipePengadaan) {
        case "barang":
            $data['title']= 'Tambah Pengadaan Barang'; 
            $data['Judul']= 'Barang';
            $data['lbl_detail_pengadaan']= 'Barang';
            $data['pgd_tipe_pengadaan'] = 0;
            break;
        case "jasa":
            $data['title']= 'Tambah Pengadaan Jasa'; 
            $data['Judul']= 'Jasa';
            $data['lbl_detail_pengadaan']= 'Pekerjaan';
            $data['pgd_tipe_pengadaan'] = 1;
            break;
        case "konsultan":
            $data['title']= 'Tambah Pengadaan Konsultan'; 
            $data['Judul']= 'Konsultan';
            $data['lbl_detail_pengadaan']= 'Pekerjaan';
            $data['pgd_tipe_pengadaan'] = 2;
            break;
        default:
            $data['title']= 'Tambah Pengadaan'; 
            $data['Judul']= '';
            $data['lbl_detail_pengadaan']= 'Pekerjaan/Barang';
            $data['pgd_tipe_pengadaan'] = -1;
        } 
        
        $data['content'] = 'f_pengadaan';
        $data['anggaranList']= $this->M_anggaran->selectAll()->result();
        $data['supplierList']= $this->M_supplier->selectAll()->result();
        $data['pegawaiList']= $this->M_pegawai->selectAllWithJabatan()->result();
        $data['suratList']= $this->M_suratizin->selectAll()->result();
       
        $this->load->view('layout',$data);
    }
    
    public function proses_add_pengadaan1(){
        //1. insert pgd
        $pgd['pgd_perihal']            = $this->input->post('pgd_perihal');
        $pgd['pgd_uraian_pekerjaan']            = $this->input->post('pgd_uraian_pekerjaan');
        $pgd['pgd_anggaran']   = $this->input->post('ang_kode');
        $pgd['pgd_user_update'] = $this->session->userdata('id_user');
        $pgd['pgd_lama_pekerjaan']   = $this->input->post('pgd_lama_pekerjaan');
        $pgd['pgd_lama_penawaran']        = $this->input->post('pgd_lama_penawaran');
        $pgd['pgd_supplier'] = $this->input->post('pgd_supplier');
        $pgd['pgd_wkt_awal_penawaran'] = $this->input->post('pgd_wkt_awal_penawaran');
        $pgd['pgd_wkt_akhir_penawaran'] = $this->input->post('pgd_wkt_akhir_penawaran');
        $pgd['pgd_tipe_pengadaan'] = $this->input->post('pgd_tipe_pengadaan');
        $pgd['pgd_dgn_pajak'] = $this->input->post('chkBoxPajak');
        //4. insert Penyusun
        $pgd['pgd_penyusun'] = $this->M_penyusun->selectLastPenyusun()->row()->msp_id;
    
        $idPengadaan = $this->m_pengadaan->insertPengadaan($pgd);
        $barang = $data['Judul']= $this->input->post('Judul');
        
        $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
        redirect(site_url('Pengadaan/add_pengadaan1/'.$barang.'/'.$idPengadaan));
    }
    
    public function add_pengadaan1($tipe,$id){
        $row = $this->m_pengadaan->selectById($id);
        $data['content'] = 'f_pengadaan_1';
        $data['title']= "Tambah Pengadaan ".$tipe;
        $data['Judul']= $tipe;
        $data['suratList']= $this->M_suratizin->selectAll()->result();
        $data['pgd_tipe_pengadaan'] = $row->pgd_tipe_pengadaan;
        $data['dtp_pengadaan']= $id;
        $data['pgd_perihal']= $row->pgd_perihal;
        $data['pgd_dgn_pajak']= $row->pgd_dgn_pajak;
        $this->load->view('layout',$data); 
    }
    public function proses_add_detail_pgd(){
        $dtp['dtp_pengadaan'] = $this->input->post('dtp_pengadaan');
        $dtp['dtp_pekerjaan'] = $this->input->post('dtp_pekerjaan');
        $dtp['dtp_spesifikasi'] = $this->input->post('dtp_spesifikasi');
        $dtp['dtp_volume'] = $this->input->post('dtp_volume');
        $dtp['dtp_satuan'] = $this->input->post('dtp_satuan');
        $dtp['dtp_hargasatuan_hps'] = $this->input->post('dtp_hargasatuan_hps');
        $dtp['dtp_jumlahharga_hps'] = $dtp['dtp_volume'] * $dtp['dtp_hargasatuan_hps'];
        $status="";
        $msg="";
        $this->upload_config();
        if($this->upload->do_upload('dtp_file')){
                $updata = $this->upload->data();
                $dtp['dtp_file'] = $updata['file_name'];
                $upload = true;
        }else{
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
        }
        $id = $this->m_pengadaan->insertPekerjaan($dtp);
        if($upload){
               $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
        } else{
             $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan tanpa ada file yang berhasil diunggah. <br> Jika ingin mengunggah file silahkan gunakan menu Ubah','class' => 'warning'));
        }
        echo json_encode(array('status' => $status, 'id' => $id));
    }
    
    public function proses_del_detail_pgd($id){
        
        //$dtp['dtp_jumlahharga_hps'] = $dtp['dtp_volume'] * $dtp['dtp_hargasatuan_hps'];
        $id = $this->m_pengadaan->deleteDetailPengadaan($id);
          
    }
    
    public function proses_add_pengadaan2(){
         $idPengadaan = $this->input->get('dtp_pengadaan2');
//        
//        //5. insert Syarat penyedia
        $data['listSurat']   = $this->input->get('list_suratizin');
        $tableDataSrt = json_decode($data['listSurat'],TRUE); 
        $countSrt = count($tableDataSrt);
        for ($i = 0; $i < $countSrt; $i++) {
            $psr['psr_pengadaan'] = $idPengadaan;
            $psr['psr_surat_izin'] = $tableDataSrt[$i]['psr_surat_izin'];
            $this->m_pengadaan->insertSuratIzin($psr);
        }
        
        //cek dengan pajak atau ngga
        if($statusPajak == 1){
            $pajak = 0.1;
        }else{
            $pajak = 0;
        }
        
        
        $this->m_pengadaan->HitungTotalHargaPengadaan($idPengadaan,$pajak);
        $pgd['pgd_tipe_pengadaan'] = $this->input->post('pgd_tipe_pengadaan');
        if ($pgd['pgd_tipe_pengadaan'] == 0){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanBarangHPS'));
        } else if ($pgd['pgd_tipe_pengadaan'] == 1 ){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanJasaHPS'));
        } else if ($pgd['pgd_tipe_pengadaan'] == 2 ){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanKonsultanHPS'));
       
        }
    }
    
    public function edit_pengadaan($id,$tipe,$status){
        switch ($tipe) {
        case "0":
            $data['title']= 'Tambah Pengadaan Barang'; 
            $data['Judul']= 'Barang';
            $data['lbl_detail_pengadaan']= 'Barang';
            break;
        case "1":
            $data['title']= 'Tambah Pengadaan Jasa'; 
            $data['Judul']= 'Jasa';
            $data['lbl_detail_pengadaan']= 'Pekerjaan';
            break;
        case "2":
            $data['title']= 'Tambah Pengadaan Konsultan'; 
            $data['Judul']= 'Konsultan';
            $data['lbl_detail_pengadaan']= 'Pekerjaan';
            break;
        default:
            $data['title']= 'Tambah Pengadaan'; 
            $data['Judul']= '';
            $data['lbl_detail_pengadaan']= 'Pekerjaan/Barang';

        } 
        $data['content'] = 'f_pengadaan_ubah';
        $data['title']= 'Detail Pengadaan'; 
        $data['dataPengadaan']= $this->m_pengadaan->selectById($id);
        $data['pekerjaanList']= $this->m_pengadaan->selectDetailPengadaan($id);
        $terpilih = 1;
        $data['penyusunList']= $this->m_pengadaan->selectListPenyusun($id,$terpilih);
        $data['suratList']= $this->m_pengadaan->selectListSyaratPenyedia($id);
        $data['anggaranList']= $this->M_anggaran->selectAll()->result();
        $data['supplierList']= $this->M_supplier->selectAll()->result();
        $data['pegawaiList']= $this->M_pegawai->selectAllWithJabatan()->result();
        $data['suratList']= $this->M_suratizin->selectAll()->result();
        $data['modeView']= "pengadaan";
        $this->load->view('layout',$data);
        
    }
    
    public function proses_edit_pengadaan($idPengadaan){
        //1. update pgd
        $pgd['pgd_id']            = $this->input->get('pgd_id');
        $pgd['pgd_perihal']            = $this->input->get('pgd_perihal');
        $pgd['pgd_uraian_pekerjaan']            = $this->input->get('pgd_uraian_pekerjaan');
        $pgd['pgd_anggaran']   = $this->input->get('ang_kode');
        $pgd['pgd_tgl_mulai_pengadaan']   = $this->input->get('pgd_tgl_mulai_pengadaan');
        $pgd['pgd_user_update'] = $this->session->userdata('id_user');
        $pgd['pgd_lama_pekerjaan']   = $this->input->get('pgd_lama_pekerjaan');
        $pgd['pgd_lama_penawaran']        = $this->input->get('pgd_lama_penawaran');
        $pgd['pgd_supplier'] = $this->input->get('pgd_supplier');
        if ($pgd['pgd_status_pengadaan'] == 1){
            $pgd['pgd_jml_sblm_ppn_hps'] = $this->input->get('pgd_jml_sblm_ppn_hps');
            $pgd['pgd_jml_ssdh_ppn_hps'] = $this->input->get('pgd_jml_ssdh_ppn_hps');
        }
        $pgd['pgd_wkt_awal_penawaran'] = $this->input->get('pgd_wkt_awal_penawaran');
        $pgd['pgd_wkt_akhir_penawaran'] = $this->input->get('pgd_wkt_akhir_penawaran');
        
        $pgd['pgd_status_pengadaan'] = $this->input->get('pgd_status_pengadaan');
        $pgd['pgd_tipe_pengadaan'] = $this->input->get('pgd_tipe_pengadaan');
        $this->m_pengadaan->update($pgd['pgd_id'],$pgd);
        $idPengadaan = $pgd['pgd_id']  ;
        if ($pgd['pgd_status_pengadaan'] == 0){
            //3. delete Pekerjaan
            $this->m_pengadaan->deletePekerjaan($idPengadaan);
            //3. insert Pekerjaan
            $data['listPekerjaan']        = $this->input->get('list_pekerjaan');
            // echo $data['listPekerjaan'];
            $tableDataPkj = json_decode($data['listPekerjaan'],TRUE); 
            $countPkj = count($tableDataPkj);
            for ($i = 0; $i < $countPkj; $i++) {
                $dtp['dtp_pengadaan'] = $idPengadaan;
                $dtp['dtp_pekerjaan'] = $tableDataPkj[$i]['dtp_pekerjaan'];
                $dtp['dtp_spesifikasi'] = $tableDataPkj[$i]['dtp_spesifikasi'];
                $dtp['dtp_volume'] = $tableDataPkj[$i]['dtp_volume'];
                $dtp['dtp_satuan'] = $tableDataPkj[$i]['dtp_satuan'];
                $dtp['dtp_hargasatuan_hps'] = $tableDataPkj[$i]['dtp_hargasatuan_hps'];
                //$dtp['dtp_jumlahharga_hps'] = $dtp['dtp_volume'] * $dtp['dtp_hargasatuan_hps'];
                $this->m_pengadaan->insertPekerjaan($dtp);
            }

            //3. delete penyusun
            $this->m_pengadaan->deletePenyusun($idPengadaan);

             //4. insert Penyusun
            $klp['klp_pengadaan'] = $idPengadaan;
            $klp['klp_terpilih'] = 1;
            $idKelompok = $this->m_pengadaan->insertKelompokPenyusun($klp);
            $data['listPenyusun']            = $this->input->get('list_penyusun');
            $tableDataPys = json_decode($data['listPenyusun'],TRUE); 
            $countPys = count($tableDataPys);
            for ($i = 0; $i < $countPys; $i++) {
                $dpy['lsp_kelompok'] = $idKelompok;
                $dpy['lsp_pegawai'] = $tableDataPys[$i]['lsp_pegawai'];
                $dpy['lsp_jabatan'] = $tableDataPys[$i]['lsp_jabatan'];
                $this->m_pengadaan->insertPenyusun($dpy);
            }
    //        delete syarat penyedia
            $this->m_pengadaan->deleteSyaratPenyedia($idPengadaan);
    //        //5. insert Syarat penyedia
            $data['listSurat']   = $this->input->get('list_suratizin');
            $tableDataSrt = json_decode($data['listSurat'],TRUE); 
            $countSrt = count($tableDataSrt);
            for ($i = 0; $i < $countSrt; $i++) {
                $psr['psr_pengadaan'] = $idPengadaan;
                $psr['psr_surat_izin'] = $tableDataSrt[$i]['psr_surat_izin'];
                $this->m_pengadaan->insertSuratIzin($psr);
            }

            //totalkan harga semua
            $pajak = 0.1;
            $this->m_pengadaan->HitungTotalHargaPengadaan($idPengadaan,$pajak);
            
        }
        if ($pgd['pgd_tipe_pengadaan'] == 0 && $pgd['pgd_status_pengadaan']==0){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanBarangHPS'));
        }else if ($pgd['pgd_tipe_pengadaan'] == 0 && $pgd['pgd_status_pengadaan']==1){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanBarangPenawaran'));
        }else if ($pgd['pgd_tipe_pengadaan'] == 0 && $pgd['pgd_status_pengadaan']==2){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanBarangFix'));
        }else if ($pgd['pgd_tipe_pengadaan'] == 0 && $pgd['pgd_status_pengadaan']==3){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanBarang'));
        }
        
        if ($pgd['pgd_tipe_pengadaan'] == 1 && $pgd['pgd_status_pengadaan']==0){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanJasaHPS'));
        }else if ($pgd['pgd_tipe_pengadaan'] == 1 && $pgd['pgd_status_pengadaan']==1){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanJasaPenawaran'));
        }else if ($pgd['pgd_tipe_pengadaan'] == 1 && $pgd['pgd_status_pengadaan']==2){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanJasaFix'));
        }else if ($pgd['pgd_tipe_pengadaan'] == 1 && $pgd['pgd_status_pengadaan']==3){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanJasa'));
        }
        
        if ($pgd['pgd_tipe_pengadaan'] == 2 && $pgd['pgd_status_pengadaan']==0){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanKonsultanHPS'));
        }else if ($pgd['pgd_tipe_pengadaan'] == 2 && $pgd['pgd_status_pengadaan']==1){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanKonsultanPenawaran'));
        }else if ($pgd['pgd_tipe_pengadaan'] == 2 && $pgd['pgd_status_pengadaan']==2){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanKonsultanFix'));
        }else if ($pgd['pgd_tipe_pengadaan'] == 2 && $pgd['pgd_status_pengadaan']==3){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/Pengadaankonsultan'));
        }
        
    }
  	
    public function prosesInputAnggaran(){
        $data['ang_kode']               = $this->input->post('ang_kode1');
        $data['ang_nama']                = $this->input->post('ang_name');
        
        $kode = trim($data['ang_kode'],' ');
        $nama = trim($data['ang_nama'],' ');
        
        try {
            if($kode != '' && $nama != ''){
                $count = count($this->M_anggaran->selectById($data['ang_kode'])->row());
                echo $count;
                if($count > 0){
                    echo "duplicate";
                }else{
                    $this->M_anggaran->insert($data);
                    echo "success";
                }
            }else{
                echo "empty";
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function add_penawaran($id){
        $data['content'] = 'f_penawaran';
        $data['title']= 'Input Penawaran'; 
        $data['dataPengadaan']= $this->m_pengadaan->selectById($id);
        $data['pekerjaanList']= $this->m_pengadaan->selectDetailPengadaan($id);
        $terpilih = 1;
        $data['penyusunList']= $this->m_pengadaan->selectListPenyusun($id,$terpilih);
        $data['suratList']= $this->m_pengadaan->selectListSyaratPenyedia($id);
        $data['modeView']= "pengadaan";
        $this->load->view('layout',$data);
    }
    
    public function add_penawaran_barang($id){
        $data['content'] = 'f_penawaran';
        $data['title']= 'Input Penawaran Barang'; 
        $data['judul']= 'Barang';
        $data['dataPengadaan']= $this->m_pengadaan->selectById($id);
        $data['pekerjaanList']= $this->m_pengadaan->selectDetailPengadaan($id);
        $terpilih = 1;
        $data['penyusunList']= $this->m_pengadaan->selectListPenyusun($id,$terpilih);
        $data['suratList']= $this->m_pengadaan->selectListSyaratPenyedia($id);
        $data['modeView']= "pengadaan";
        $this->load->view('layout',$data);
    }
    
    public function add_penawaran_jasa($id){
        $data['content'] = 'f_penawaran';
        $data['title']= 'Input Penawaran Jasa'; 
        $data['judul']= 'Pekerjaan';
        $data['dataPengadaan']= $this->m_pengadaan->selectById($id);
        $data['pekerjaanList']= $this->m_pengadaan->selectDetailPengadaan($id);
        $terpilih = 1;
        $data['penyusunList']= $this->m_pengadaan->selectListPenyusun($id,$terpilih);
        $data['suratList']= $this->m_pengadaan->selectListSyaratPenyedia($id);
        $data['modeView']= "pengadaan";
        $this->load->view('layout',$data);
    }
    
    public function proses_add_penawaran(){
        
        
        // post idPengadaan
        $idPengadaan = $this->input->get('pgd_id');
        //5. update status pgd
        $xx['pgd_status_pengadaan'] = '1';
        $this->m_pengadaan->update($idPengadaan,$xx);
        //1. post data syarat
        $data2 = $this->input->get('psr_penawaran');
         //3. Update data syarat
        foreach((array)$data2 as $row){
            $in['psr_id'] = $row;
            $on['psr_status_penawaran'] = '1';
            $this->m_pengadaan->updateSyaratPenyedia($in['psr_id'],$on);
        }
        //2. post data pekerjaan
        $data3 = $this->input->get('dtp_id') ;
        $data4 = $this->input->get('dtp_hargasatuan_pnr');
        $length = count($data3);
        echo $length;
         //3. Update data pekerjaan
        for( $i = 0; $i < $length; $i++ ) {
            $ax['dtp_id'] = $data3[$i];
            echo $ax['dtp_id'];
            $ex['dtp_hargasatuan_pnr'] = $data4[$i];
            echo $ex['dtp_hargasatuan_pnr'];
            $this->m_pengadaan->updateHargaPenawaran( $ax['dtp_id'],$ex);
        }

        //4. Call procedure jumlah total
      
        //totalkan harga semua
        $pajak = 0.1;
        $this->m_pengadaan->HitungTotalHargaPengadaan($idPengadaan,$pajak);

        $tipe = $this->input->get('pgd_tipe_pengadaan');
        if($tipe == 0){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanBarangPenawaran'));
        }else if($tipe == 1){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanJasaPenawaran'));
        }else if($tipe == 2){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanKonsultanPenawaran'));
        }
        
    }
    
    public function add_hargafix_barang($id){
        $data['content'] = 'f_pengadaan_fix';
        $data['title']= 'Input Harga Deal Pengadaan Barang'; 
        $data['judul']= 'Barang';
        $data['dataPengadaan']= $this->m_pengadaan->selectById($id);
        $data['pekerjaanList']= $this->m_pengadaan->selectDetailPengadaan($id);
        $terpilih = 1;
        $data['penyusunList']= $this->m_pengadaan->selectListPenyusun($id,$terpilih);
        $data['suratList']= $this->m_pengadaan->selectListSyaratPenyedia($id);
        $data['modeView']= "pengadaan";
        $this->load->view('layout',$data);
    }
    
    public function add_hargafix_jasa($id){
        $data['content'] = 'f_pengadaan_fix';
        $data['title']= 'Input Harga Deal Pengadaan Jasa'; 
        $data['judul']= 'Pekerjaan';
        $data['dataPengadaan']= $this->m_pengadaan->selectById($id);
        $data['pekerjaanList']= $this->m_pengadaan->selectDetailPengadaan($id);
        $terpilih = 1;
        $data['penyusunList']= $this->m_pengadaan->selectListPenyusun($id,$terpilih);
        $data['suratList']= $this->m_pengadaan->selectListSyaratPenyedia($id);
        $data['modeView']= "pengadaan";
        $this->load->view('layout',$data);
    }
    
    public function proses_add_fix(){
        
        
        // post idPengadaan
        $idPengadaan = $this->input->get('pgd_id');
        //5. update status pgd
        $xx['pgd_status_pengadaan'] = '2';
        $this->m_pengadaan->update($idPengadaan,$xx);
        //2. post data pekerjaan
        $data3 = $this->input->get('dtp_id') ;
        $data4 = $this->input->get('dtp_hargasatuan_fix');
        $length = count($data3);
        echo $length;
         //3. Update data pekerjaan
        for( $i = 0; $i < $length; $i++ ) {
            $ax['dtp_id'] = $data3[$i];
            echo $ax['dtp_id'];
            $ex['dtp_hargasatuan_fix'] = $data4[$i];
            echo $ex['dtp_hargasatuan_fix'];
            $this->m_pengadaan->updateHargaFix( $ax['dtp_id'],$ex);
        }

        //4. Call procedure jumlah total
      
        //totalkan harga semua
        $pajak = 0.1;
        $this->m_pengadaan->HitungTotalHargaPengadaan($idPengadaan,$pajak);

        $tipe = $this->input->get('pgd_tipe_pengadaan');
        if($tipe == 0){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanBarangFix'));
        }else if($tipe == 1){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanJasaFix'));
        }else if($tipe == 2){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanKonsultanFix'));
        }
        
    }
    
    function delete_pengadaan($id){
        $this->m_pengadaan->delete($id);
        $tipe = $this->input->get('pgd_tipe_pengadaan');
        if($tipe == 0){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanBarangPenawaran'));
        }else if($tipe == 1){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanJasaPenawaran'));
        }else if($tipe == 2){
            $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
            redirect(site_url('Pengadaan/PengadaanKonsultanPenawaran'));
        }
    }
    
    function KonfirmasiSelesai($id){
        $data['pgd_status_selesai']   = 1;
        $this->m_pengadaan->update( $id,$data);  
    }
    
    function batal_konfirmasi($id){
        $data['pgd_status_selesai']   = 0;
        $this->m_pengadaan->update( $id,$data);  
    }
    
    function historiPercetakan($id){
        $data['content'] = 'v_histori_percetakan';
        $data['title']= 'Histori Percetakan Pengadaan'; 
        $data['dataPengadaan']= $this->m_pengadaan->selectById($id);
        $data['histori_surat'] = $this->m_pengadaan->historiSurat($id);
        $data['modeView']= "pengadaan";
        $this->load->view('layout',$data);
        
    }
    
    function postVariableTable(){
        $data['pgd_status_pengadaan']   = 3;
        $this->m_pengadaan->update( $ax['dtp_id'],$ex);
    }
    
    function postVariabel(){
        $data['sms_nomor_surat']        = $this->input->post('sms_nomor_surat');
        $data['sms_tgl_srt']            = $this->input->post('sms_tgl_srt');
        $data['sms_tgl_srt_diterima']   = $this->input->post('sms_tgl_srt_diterima');
        $data['sms_tgl_srt_dtlanjut']   = $this->input->post('sms_tgl_srt_dtlanjut');
        $data['sms_tenggat_wkt']        = $this->input->post('sms_tenggat_wkt');
        $data['sms_perihal']            = $this->input->post('sms_perihal');
        $data['sms_jenis_surat']        = $this->input->post('sms_jenis_surat');
        $data['sms_tkt_aman']           = $this->input->post('sms_tkt_aman');
        $data['sms_sifat']              = $this->input->post('sms_sifat');
        $data['sms_no_agenda']          = $this->input->post('sms_no_agenda');
        $data['sms_unit_tujuan']        = $this->input->post('sms_unit_tujuan');
        $data['sms_keterangan']         = $this->input->post('sms_keterangan');
        $data['sms_edited_by']          = $this->session->userdata('id_user');
        $data['sms_status_terkirim']    = $this->input->post('sms_status_terkirim');
        $data['sms_file']               = $this->input->post('sms_file');
        $data['sms_pengirim']           = $this->input->post('sms_pengirim');
        $data['sms_indek']              = $this->input->post('sms_indek');
        $data['sms_kode']               = $this->input->post('sms_kode');
        $data['sms_lampiran']           = $this->input->post('sms_lampiran');
        return $data;
    }
    
    public function upload_config(){
        $config['upload_path'] = './uploads/file_pengadaan';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
        $config['max_size']	= '10000';

        $this->load->library('upload', $config);
    }
     
    public function tambah_surat_masuk(){
        $this->limitRole(array(1,2,3));
        $data['content'] = 'f_suratmasuk';
        $data['title']= 'Daftar surat masuk';          
        $data['jenisList'] = $this->getAllJenisSurat();
        $data['unitList'] = $this->getAllUnitTujuan();
        $data['tingkatList']=$this->getAllTingkatAman();
        $data['sifatList']=$this->getAllSifat();
        $this->load->view('layout',$data);
    }
    public function proses_tambah_smasuk(){  
        $this->limitRole(array(1, 2));    
        $data = $this->postVariabel();
        $this->upload_config();
        if($this->upload->do_upload('sms_file')){
                $updata = $this->upload->data();
                $data['sms_file'] = $updata['file_name'];
                $upload = true;
        }
        
        $this->m_surat_masuk->insert($data);
        if($upload){
               $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
        } else{
             $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan tanpa ada file yang berhasil diunggah. <br> Jika ingin mengunggah file silahkan gunakan menu Ubah','class' => 'warning'));
        }
        $this->writeLog('Surat Masuk','Create');
        redirect(site_url('SuratMasuk'));
    }
    
    public function detail_surat_masuk($id){
        $this->limitRole(array(1, 2, 3, 4));
        $level = $this->session->userdata('id_level');
        if($level==1){
            $this->m_surat_masuk->setStatusToRead($id);
        }
        $data['dataSurat'] = $this->m_surat_masuk->selectById($id);
        $data['id'] = $id;
        $data['mode'] = 'edit';
        $data['content'] = 'v_suratmasuk';
        $data['title'] = 'Detail surat masuk';
        $data['jenisList'] = $this->getAllJenisSurat();
        $data['tingkatList'] = $this->getAllTingkatAman();
        $data['sifatList'] = $this->getAllSifat();
        $data['unitList'] = $this->getAllUnitTujuan();
        if($data['dataSurat']->sms_deleted == '0'){
            $this->load->view('layout', $data);
        }else{
            redirect(site_url('Sidoel404'));
        }
    }
    
    public function edit_surat_masuk($id){
        $this->limitRole(array(1, 2, 3));
        $data['dataSurat'] = $this->m_surat_masuk->selectByIdEdit($id);
        if($data['dataSurat']->sms_sudah_disposisi == 0 || $this->session->userdata('id_role')<=1){
            $data['id'] = $id;
            $data['mode'] = 'edit';
            $data['content'] = 'f_suratmasuk';
            $data['title'] = 'Edit surat masuk';
            $data['jenisList'] = $this->getAllJenisSurat();
            $data['tingkatList'] = $this->getAllTingkatAman();
            $data['sifatList'] = $this->getAllSifat();
            $data['unitList'] = $this->getAllUnitTujuan();
            if($data['dataSurat']->sms_deleted == '0'){
                $this->load->view('layout', $data);
            }else{
                redirect(site_url('Sidoel404'));
            }
        }
        else{
            $this->session->set_flashdata('message', array('msg' => 'Surat yang sudah didisposisi tidak dapat diubah','class' => 'danger'));
            redirect(site_url('SuratMasuk'));
        }
    }
    
    public function proses_edit_smasuk(){
        $this->limitRole(array(1, 2, 3));
        $data = $this->postVariabel();
        $this->upload_config();
        if($this->upload->do_upload('sms_file')){
                $updata = $this->upload->data();
                $data['sms_file'] = $updata['file_name'];
        }
        $id_edit=$this->input->post('id');
        $this->m_surat_masuk->update($id_edit, $data);
        $this->session->set_flashdata('message', array('msg' => 'Data telah diperbarui','class' => 'success'));
        $this->writeLog('Surat Masuk','Update');
        redirect(site_url('SuratMasuk'));
    }
    
    public function delete_smasuk($id){
        $this->limitRole(array(1, 2));
        $surat = $this->m_surat_masuk->selectById($id);
        if($surat->sms_sudah_disposisi == 0 || $this->session->userdata('id_role')<=1){
            $this->m_surat_masuk->delete($id);
            $this->session->set_flashdata('message', array('msg' => 'Data telah dihapus','class' => 'warning'));
            $this->writeLog('Surat Masuk','Delete');
            redirect('SuratMasuk');
        }
        else{
            $this->session->set_flashdata('message', array('msg' => 'Surat yang sudah didisposisi tidak dapat dihapus','class' => 'danger'));
            redirect(site_url('SuratMasuk'));
        }
    }
	
    public function konfirmasi($id){
        $this->limitRole(array(1, 3));
        $data['sms_confirm_by'] = $this->session->userdata("id_user");
        $data['sms_confirm_status'] = '1';
        $this->m_surat_masuk->update($id, $data);
        $this->sms_konfirmasi($id);
    }
    
    public function sms_konfirmasi($id){
        $surat = $this->m_surat_masuk->selectById($id);
        $sekertaris = $this->m_user->selectById($surat->sms_confirm_by)->row();
        $karo = $this->m_user->selectKaro()->row();
        /*
        $userkey="andhika1988"; // userkey di SMS Notifikasi //

        $passkey="211188"; // passkey di SMS Notifikasi //

        $message='Surat masuk dengan No. surat: '.$surat->sms_nomor_surat.' telah diterima oleh sekretaris. '.base_url().'SuratMasuk/detail_surat_masuk/'.$id;

        $url = "http://reguler.sms-notifikasi.com/apps/smsapi.php";$curlHandle = curl_init();

        curl_setopt($curlHandle, CURLOPT_URL, $url);

        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, "userkey=".$userkey."&passkey=".$passkey."&nohp=".$karo->usr_no_telp.
        "&pesan=".urlencode($message));

        curl_setopt($curlHandle, CURLOPT_HEADER, 0);

        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);

        curl_setopt($curlHandle, CURLOPT_POST, 1);

        $results = curl_exec($curlHandle);

        curl_close($curlHandle);*/
        
        /*$to = $karo->usr_email;
        $message='Surat masuk dengan No. surat: '.$surat->sms_nomor_surat.' telah diterima oleh sekretaris. '.base_url().'SuratMasuk/detail_surat_masuk/'.$id;
        $subject = "Link untuk reset password";
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	// More headers
	$headers .= 'From: <webmaster@sidoel.esy.es>' . "\r\n";
		
	mail($to,$subject,$message,$headers);
		
	$this->session->set_flashdata('message', array('msg' => 'Surat masuk terkonfirmasi dan Kepala Biro telah dinotifikasikan via email','class' => 'warning'));
        */
    }

   
    
    public function disposisi_cetak($id) {
        $data['suratMasuk']=  $this->m_surat_masuk->selectById($id);
        $data['instruksi'] = $this->m_instruksi->selectAll()->result();
        $data['disposisiInstruksi'] = '';
        $data['unitTerusan'] = $this->m_unit_terusan->selectAll()->result();
        $data['disposisiUnitTerusan'] = '';
        if($data['suratMasuk']->sms_deleted == '0'){
            $this->load->view('v_cetakdisposrmasuk',$data);
        }else{
            redirect(site_url('Sidoel404'));
        }
    }
    
    public function cetak_all($id){
        $disposisiInstruksi = array();
        $unitTerusan = array();
        $subBagian = array();
        $catatan = array();
        $data['disposisiUnitTerusanX'] = array();
        $data['suratMasuk']=  $this->m_surat_masuk->selectById($id);
        $data['instruksi'] = $this->m_instruksi->selectAll()->result();
        $data['unitTerusan'] = $this->m_unit_terusan->selectAll()->result();
        $all = $this->m_surat_masuk->selectTracking($id);
        foreach ($all as $row){
            if($row->din_id){array_push($disposisiInstruksi, $row->din_id_instruksi);}
            if($row->dpt_id){
                array_push($unitTerusan, $row->dpt_id);
                array_push($unitTerusan, $row->dpt_parent);
            }
            if($row->dpt_parent > '0'){array_push($subBagian, $row->dpt_nama);}
            if($row->fds_catatan){array_push($catatan, "<b>".$row->jnama."</b>: ".$row->fds_catatan."<br><sub>(".$row->fds_tgl_disposisi_show.")</sub>");}
            array_push($data['disposisiUnitTerusanX'], $this->m_disposisi_user->selectByDisposisi($row->fds_id)->result());
        }
        $data['disposisiInstruksi'] = array_unique($disposisiInstruksi);
        $data['disposisiUnitTerusan'] = array_unique($unitTerusan);
        $data['subBagian'] = array_unique($subBagian);
        $data['catatan'] = array_unique($catatan);
        //echo print_r($data['disposisiUnitTerusan']);
        if($data['suratMasuk']->sms_deleted == '0'){
            $this->load->view('v_cetaktrack',$data);
        }else{
            redirect(site_url('Sidoel404'));
        }
    }
    
    public function tracking($id){
        $countDispoParent = $this->m_disposisi->countParentBySurat($id)->row()->total;
        if($countDispoParent == 1){
            $dispo = $this->m_disposisi->getDispoParentBySurat($id);
            redirect(site_url('Disposisi/trackingDisposisi')."/".$dispo->fds_id);
        }elseif ($countDispoParent > 1) {
            redirect(site_url('Disposisi/MultiParentsTracking')."/".$id);
        }else{
            $this->session->set_flashdata('message', array('msg' => 'Tidak ada disposisi untuk surat masuk yang anda pilih','class' => 'danger'));
            redirect(site_url('dashboard'));
       }
    }
    
    public function set_status(){
        $surat = $this->input->post('sms_id');
        $data['sms_status'] = $this->input->post('sms_status');
        $this->m_surat_masuk->update($surat, $data);
        redirect(site_url('SuratMasuk').'/detail_surat_masuk/'.$surat);    
    }
    
    /*public function normalize_status(){
        $status = -1;
        $list_surat = $this->m_surat_masuk->selectAll();
        foreach ($list_surat as $row){
            $list_dispo = $this->m_disposisi->selectBySuratParent($row->sms_id)->result();
            $instat = 0;
            $adadispo = 0;
            foreach ($list_dispo as $row2){
                $adadispo = 1;
                $list_dus = $this->m_disposisi_user->selectByDisposisi($row2->fds_id)->result();
                foreach ($list_dus as $row3){
                    if($row3->dus_status != 1){
                       $instat = 1;
                       break;
                    }
                }
            }
            if($adadispo == 1){
                if($instat == 1){$status = 0;}
                else{$status = 1;}
            }else{
                $status = -1;
            }
            $data['sms_status'] = $status;
            $this->m_surat_masuk->update($row->sms_id, $data);
        }
    }*/

    public function scan($namafile){
        $target_dir='C:\sidoel'; 
        chdir($target_dir); 
        $target_file= "upload.exe $namafile surat_masuk"; 
        exit( (shell_exec($target_file)!=NULL?'SUKSES':'GAGAL')); 
    }
    
    public function delete_scan($file){
        //$base = base_url();
        $base = 'sidoel.kkp.go.id/';
        $target = $base.'uploads/surat_masuk/'.$file;
        if(file_exists($target)){
            unlink($target);
        }
    }
    
}
?>