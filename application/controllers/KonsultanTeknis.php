<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KonsultanTeknis extends CI_Controller {
    //put your code here
    
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('id_user') == ''){
            $this->session->set_flashdata('message', array('msg' => 'Please <strong>login</strong> to continue','class' => 'danger'));
            $this->session->set_flashdata('history', $this->uri->uri_string());
            redirect('login');
        }
        else
        {
            $this->load->helper('url');
            $this->load->database();
            $this->load->helper('date');
            $this->load->model('m_konsultan');
        }
    }

    public function getUnsurPenilaian($id){
        $dataPgd= $this->m_konsultan->selectByIdUnsurPenilaian($id);
        
        $unp_bobot_png_prs = $dataPgd->unp_bobot_png_prs;
        $unp_nilai_png_prs = $dataPgd->unp_nilai_png_prs;
        $unp_jml_png_prs = $dataPgd->unp_jml_png_prs;
        
        $unp_bobot_pnd_mtd = $dataPgd->unp_bobot_pnd_mtd;
        $unp_nilai_pnd_mtd = $dataPgd->unp_nilai_pnd_mtd;
        $unp_jml_pnd_mtd = $dataPgd->unp_jml_pnd_mtd;
        
        $unp_bobot_kua_tna = $dataPgd->unp_bobot_kua_tna;
        $unp_nilai_kua_tna = $dataPgd->unp_nilai_kua_tna;
        $unp_jml_kua_tna = $dataPgd->unp_jml_kua_tna;
        
        
        echo json_encode(array(
            'unp_bobot_png_prs' => $unp_bobot_png_prs,
            'unp_nilai_png_prs' => $unp_nilai_png_prs,
            'unp_jml_png_prs' => $unp_jml_png_prs,
            'unp_bobot_pnd_mtd' => $unp_bobot_pnd_mtd,
            'unp_nilai_pnd_mtd' => $unp_nilai_pnd_mtd,
            'unp_jml_pnd_mtd' => $unp_jml_pnd_mtd,
            'unp_bobot_kua_tna' => $unp_bobot_kua_tna,
            'unp_nilai_kua_tna' => $unp_nilai_kua_tna,
            'unp_jml_kua_tna' => $unp_jml_kua_tna
            ));
    }
    
     public function addKualifikasiTenagaAhli($unp_id){
        $dtp['psi_uns'] = $this->input->post('unp_id');
        $dtp['psi_dtk'] = $this->input->post('psi_dtk');
        $dtp['psi_bobot'] = $this->input->post('psi_bobot');
        $dtp['psi_nama'] = $this->input->post('psi_nama');
        
        $dtp['psi_kesesuaian_ijasah'] = $this->input->post('psi_kesesuaian_ijasah');
        if($dtp['psi_kesesuaian_ijasah'] == 'S'){
            $dtp['psi_nilai_ks_ijasah'] = 100;
        }elseif($dtp['psi_kesesuaian_ijasah'] == 'SB'){
            $dtp['psi_nilai_ks_ijasah'] = 75;
        }elseif($dtp['psi_kesesuaian_ijasah'] == 'TS'){
            $dtp['psi_nilai_ks_ijasah'] = 50;
        }elseif($dtp['psi_kesesuaian_ijasah'] == 'K'){
            $dtp['psi_nilai_ks_ijasah'] = 0;
        }else{
            $dtp['psi_nilai_ks_ijasah'] = 0;
        }
        
        $dtp['psi_jml_nilai_ks_ijasah'] = $dtp['psi_nilai_ks_ijasah']*0.4;
        
        $dtp['psi_memiliki_sertifikat'] = $this->input->post('psi_memiliki_sertifikat');
        if($dtp['psi_memiliki_sertifikat'] == 'M'){
            $dtp['psi_nilai_sertifikat']  = 100;
        }elseif($dtp['psi_memiliki_sertifikat'] == 'TM'){
            $dtp['psi_nilai_sertifikat']  = 0;
        }else{
            $dtp['psi_nilai_sertifikat']  = 0;
        }
        $dtp['psi_jml_nilai_sertifikat'] = $dtp['psi_nilai_sertifikat']*0.2;
         
        // Update total unsur penilaian
//        $data= $this->m_konsultan->selectByIdUnsurPenilaian($unp_id);
//        $up['unp_nilai_png_prs'] = $this->input->post('unp_nilai_png_prs');
//        $up['unp_jml_png_prs'] =$data->unp_bobot_png_prs*$up['unp_nilai_png_prs'];
//        $this->m_konsultan->updateUnsurPenilaianTeknis($unp_id,$up);
        
        $this->m_konsultan->insertKualifikasiTenagaAhli($dtp);
    }
    
    public function addPengalamanTenagaAhli($unp_id){
        $dtp['pnk_psi'] = $this->input->post('pnk_psi');
        $dtp['pnk_uraian_pengalaman'] = $this->input->post('pnk_uraian_pengalaman');
        $dtp['pnk_jangka_wkt_bln'] = $this->input->post('pnk_jangka_wkt_bln');
        $dtp['pnk_kesesuaian_pekerjaan'] = $this->input->post('pnk_kesesuaian_pekerjaan');
        $dtp['pnk_kesesuaian_posisi'] = $this->input->post('pnk_kesesuaian_posisi');
        
        if($dtp['pnk_kesesuaian_pekerjaan'] == 'S'){
            $dtp['pnk_nilai_pekerjaan'] = 1;
        }elseif($dtp['pnk_kesesuaian_pekerjaan'] == 'M'){
            $dtp['pnk_nilai_pekerjaan'] = 0.5;
        }elseif($dtp['pnk_kesesuaian_pekerjaan'] == 'TA'){
            $dtp['pnk_nilai_pekerjaan'] = 0;
        }else{
            $dtp['pnk_nilai_pekerjaan'] = 0;
        }
        
        if($dtp['pnk_kesesuaian_posisi'] == 'S'){
            $dtp['pnk_nilai_posisi']  = 1;
        }elseif($dtp['pnk_kesesuaian_posisi'] == 'TS'){
            $dtp['pnk_nilai_posisi']  = 0.5;
        }elseif($dtp['pnk_kesesuaian_posisi'] == 'TA'){
            $dtp['pnk_nilai_posisi']  = 0;
        }else{
            $dtp['pnk_nilai_posisi']  = 0;
        }
        $dtp['pnk_perhitungan_bln_kerja'] = $dtp['pnk_jangka_wkt_bln']*$dtp['pnk_nilai_pekerjaan']*$dtp['pnk_nilai_posisi'];
         
        // Update total unsur penilaian
//        $data= $this->m_konsultan->selectByIdUnsurPenilaian($unp_id);
//        $up['unp_nilai_png_prs'] = $this->input->post('unp_nilai_png_prs');
//        $up['unp_jml_png_prs'] =$data->unp_bobot_png_prs*$up['unp_nilai_png_prs'];
//        $this->m_konsultan->updateUnsurPenilaianTeknis($unp_id,$up);
        
        $this->m_konsultan->insertPengalamanTenagaAhli($dtp);
    }
    
    public function getTotalPersonal($unp_id){
        $data= $this->m_konsultan->selectByIdUnsurPenilaian($unp_id);
        $jmlPersonalTeknis =$data->unp_nilai_kua_tna;
        echo json_encode(array('jmlPersonalTeknis' => $jmlPersonalTeknis));
    }
    
     public function getTotalPengalaman($pnk_psi){
        $data= $this->m_konsultan->getTotalPengalamanByIdPersonal($pnk_psi);
        $jmlPengalaman =$data->jml_pengalaman;
        echo json_encode(array('jmlPengalaman' => $jmlPengalaman));
    }
    
    public function drawTableKualifikasi($unp_id){
        $data = $this->m_konsultan->selectKualifikasiPersonilByUnp($unp_id);
        echo json_encode(array('kons' => $data)); 
    }
    
    public function drawTablePengalaman($unp_id){
        $data = $this->m_konsultan->selectPengalamanPersonilByUnp($unp_id);
        echo json_encode(array('kons' => $data)); 
    }
    
    public function proses_del_KualifikasiPersonel($unp_id){
        $this->m_konsultan->deleteKualifikasiPersonilByUnp($unp_id);
    }
    
    public function proses_del_PengalamanPersonel($id){
        $this->m_konsultan->deletePengalamanPersonilByUnp($id);
    }
    
    public function select2AllDetailJabatanKonsultan($jabatan){
        $search = strip_tags(trim($this->input->get('q')));
        //$search = "";
        $result = $this->m_konsultan->select2AllJabatanNamaPersonil($search, $jabatan);

        echo json_encode($result); 
    }
	
    public function PengalamanPerusahaan($pnp_unp,$idPengadaan){
        $data['dataPengadaan']= $this->m_konsultan->selectPengadaanKonsultanById($idPengadaan);
        $data['dataPnp'] = $this->m_konsultan->selectPengalamanPerusahaanByUnp($pnp_unp);
        
        $data['content'] = 'f_pengadaan_konsultan_pp';
        $data['title']= 'Pengalaman Perusahaan';
        $this->load->view('layout',$data);
    }
    
    public function MetodologiPerusahaan($pnp_unp,$idPengadaan){
        $data['dataPengadaan']= $this->m_konsultan->selectPengadaanKonsultanById($idPengadaan);
        $data['dataPnp'] = $this->m_konsultan->selectMetodePerusahaanByUnp($pnp_unp);
        
        $data['content'] = 'f_pengadaan_konsultan_metode';
        $data['title']= 'Metodologi Perusahaan';
        $this->load->view('layout',$data);
    }
    
    public function PersonilPerusahaan($pnp_unp,$idPengadaan){
        $data['dataPengadaan']= $this->m_konsultan->selectPengadaanKonsultanById($idPengadaan);
        //$data['dataKonsultan']= $this->m_konsultan->selectDrawTableKons1($idPengadaan);
        $data['dataPnp'] = $this->m_konsultan->selectKualifikasiPersonilByUnp($pnp_unp);
        
        $data['content'] = 'f_pengadaan_konsultan_personel';
        $data['title']= 'Pengalaman Personel Perusahaan';
        $this->load->view('layout',$data);
    }
    
    public function PengalamanKerja($pnp_unp,$idPersonalInti,$idPengadaan){
        $data['dataPengadaan']= $this->m_konsultan->selectPengadaanKonsultanById($idPengadaan);
        $data['dataPersonal']= $this->m_konsultan->selectKualifikasiPersonalById($idPersonalInti);
        //$data['dataKonsultan']= $this->m_konsultan->selectDrawTableKons1($idPengadaan);
        $data['dataPnp'] = $this->m_konsultan->selectKualifikasiPersonilByUnp($pnp_unp);
        
        $data['content'] = 'f_pengadaan_konsultan_pengalaman';
        $data['title']= 'Personel Perusahaan';
        $this->load->view('layout',$data);
    }
    
    public function getJabatanNamaPersonil($pgd_id){
        $search = strip_tags(trim($this->input->get('q')));
            //$search = "";
        $result = $this->m_konsultan->select2AllJabatanNamaPersonil($search,$pgd_id);

        echo json_encode($result); 
    }
    public function proses_tambah_pengalamanPerusahaan($unp_id){
        // insert data
        $pp['pnp_unp'] = $unp_id;
        //a. NP
        $pp['pnp_kd_sub'] = 'NP';
        $pp['pnp_nm_sub'] = 'Sub unsur pengalaman melaksanakan kegiatan sejenis (NP)';
        $pp['pnp_jml_sub'] = $this->input->post('np_pnp_jml_sub');
        $pp['pnp_bobot'] = $this->input->post('np_pnp_bobot');
        $pp['pnp_nilai'] = $this->input->post('np_pnp_nilai');
        $this->m_konsultan->insertPengalamanPerusahaan($pp);
        
        //a. NPL
        $pp['pnp_kd_sub'] = 'NPL';
        $pp['pnp_nm_sub'] = 'Sub unsur pengalaman melaksanakan di lokasi kegiatan (NPL)';
        $pp['pnp_jml_sub'] = $this->input->post('npl_pnp_jml_sub');
        $pp['pnp_bobot'] = $this->input->post('npl_pnp_bobot');
        $pp['pnp_nilai'] = $this->input->post('npl_pnp_nilai');
        $this->m_konsultan->insertPengalamanPerusahaan($pp);
        
        //a. NPLF
        $pp['pnp_kd_sub'] = 'NPLF';
        $pp['pnp_nm_sub'] = 'Pengalaman sebagai lead firm (NPLF)';
        $pp['pnp_jml_sub'] = $this->input->post('nplf_pnp_jml_sub');
        $pp['pnp_bobot'] = $this->input->post('nplf_pnp_bobot');
        $pp['pnp_nilai'] = $this->input->post('nplf_pnp_nilai');
        $this->m_konsultan->insertPengalamanPerusahaan($pp);
        
        //a. NPK
        $pp['pnp_kd_sub'] = 'NPK';
        $pp['pnp_nm_sub'] = 'Pengalaman mengelola kontrak (NPK)';
        $pp['pnp_jml_sub'] = $this->input->post('npk_pnp_jml_sub');
        $pp['pnp_bobot'] = $this->input->post('npk_pnp_bobot');
        $pp['pnp_nilai'] = $this->input->post('npk_pnp_nilai');
        $this->m_konsultan->insertPengalamanPerusahaan($pp);
        
        //a. NFU
        $pp['pnp_kd_sub'] = 'NFU';
        $pp['pnp_nm_sub'] = 'Ketersediaan fasilitas utama (NFU)';
        $pp['pnp_jml_sub'] = $this->input->post('nfu_pnp_jml_sub');
        $pp['pnp_bobot'] = $this->input->post('nfu_pnp_bobot');
        $pp['pnp_nilai'] = $this->input->post('nfu_pnp_nilai');
        $this->m_konsultan->insertPengalamanPerusahaan($pp);
        
        //a. NFU
        $pp['pnp_kd_sub'] = 'KP';
        $pp['pnp_nm_sub'] = 'Sub unsur kapasitas perusahaan dengan memperhatikan jumlah tenaga ahli tetap (KP)';
        $pp['pnp_jml_sub'] = $this->input->post('kp_pnp_jml_sub');
        $pp['pnp_bobot'] = $this->input->post('kp_pnp_bobot');
        $pp['pnp_nilai'] = $this->input->post('kp_pnp_nilai');
        $this->m_konsultan->insertPengalamanPerusahaan($pp);
        
        // Update total unsur penilaian
        $data= $this->m_konsultan->selectByIdUnsurPenilaian($unp_id);
        $up['unp_nilai_png_prs'] = $this->input->post('unp_nilai_png_prs');
        $up['unp_jml_png_prs'] =$data->unp_bobot_png_prs*$up['unp_nilai_png_prs'];
        $this->m_konsultan->updateUnsurPenilaianTeknis($unp_id,$up);
        $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
        redirect(site_url('Pengadaan/PengadaanKonsultanHPS'));
    }
    
    public function proses_tambah_metodePerusahaan($unp_id){
        // insert data
        $pp['mtd_unp'] = $unp_id;
        //a. PEM
        $pp['mtd_kd_sub'] = 'PEM';
        $pp['mtd_nm_sub'] = 'pemahaman atas jasa layanan yang tercantum dalam KAK';
        $pp['mtd_penilaian'] = $this->input->post('pem_mtd_penilaian');
        $pp['mtd_nilai'] = $this->input->post('pem_mtd_nilai');
        $pp['mtd_bobot'] = $this->input->post('pem_mtd_bobot');
        $pp['mtd_jml_nilai'] = $this->input->post('pem_mtd_jml_nilai');
        $this->m_konsultan->insertMetodePerusahaan($pp);
        
        //a. PEM
        $pp['mtd_kd_sub'] = 'KET';
        $pp['mtd_nm_sub'] = 'ketepatan analisa yang disampaikan dan langkah pemecahan yang diusulkan';
        $pp['mtd_penilaian'] = $this->input->post('ket_mtd_penilaian');
        $pp['mtd_nilai'] = $this->input->post('ket_mtd_nilai');
        $pp['mtd_bobot'] = $this->input->post('ket_mtd_bobot');
        $pp['mtd_jml_nilai'] = $this->input->post('ket_mtd_jml_nilai');
        $this->m_konsultan->insertMetodePerusahaan($pp);
        
        //a. PEM
        $pp['mtd_kd_sub'] = 'KON';
        $pp['mtd_nm_sub'] = 'konsistensi antara metodologi dengan  rencana kerja';
        $pp['mtd_penilaian'] = $this->input->post('kon_mtd_penilaian');
        $pp['mtd_nilai'] = $this->input->post('kon_mtd_nilai');
        $pp['mtd_bobot'] = $this->input->post('kon_mtd_bobot');
        $pp['mtd_jml_nilai'] = $this->input->post('kon_mtd_jml_nilai');
        $this->m_konsultan->insertMetodePerusahaan($pp);
        
        //a. PEM
        $pp['mtd_kd_sub'] = 'APR';
        $pp['mtd_nm_sub'] = 'apresiasi terhadap inovasi';
        $pp['mtd_penilaian'] = $this->input->post('apr_mtd_penilaian');
        $pp['mtd_nilai'] = $this->input->post('apr_mtd_nilai');
        $pp['mtd_bobot'] = $this->input->post('apr_mtd_bobot');
        $pp['mtd_jml_nilai'] = $this->input->post('apr_mtd_jml_nilai');
        $this->m_konsultan->insertMetodePerusahaan($pp);
        
        //a. PEM
        $pp['mtd_kd_sub'] = 'DUK';
        $pp['mtd_nm_sub'] = 'dukungan data yang tersedia terhadap KAK';
        $pp['mtd_penilaian'] = $this->input->post('duk_mtd_penilaian');
        $pp['mtd_nilai'] = $this->input->post('duk_mtd_nilai');
        $pp['mtd_bobot'] = $this->input->post('duk_mtd_bobot');
        $pp['mtd_jml_nilai'] = $this->input->post('duk_mtd_jml_nilai');
        $this->m_konsultan->insertMetodePerusahaan($pp);
        
        //a. PEM
        $pp['mtd_kd_sub'] = 'URA';
        $pp['mtd_nm_sub'] = 'uraian tugas';
        $pp['mtd_penilaian'] = $this->input->post('ura_mtd_penilaian');
        $pp['mtd_nilai'] = $this->input->post('ura_mtd_nilai');
        $pp['mtd_bobot'] = $this->input->post('ura_mtd_bobot');
        $pp['mtd_jml_nilai'] = $this->input->post('ura_mtd_jml_nilai');
        $this->m_konsultan->insertMetodePerusahaan($pp);
        
        //a. PEM
        $pp['mtd_kd_sub'] = 'JAN';
        $pp['mtd_nm_sub'] = 'jangka waktu pelaksanaan';
        $pp['mtd_penilaian'] = $this->input->post('jan_mtd_penilaian');
        $pp['mtd_nilai'] = $this->input->post('jan_mtd_nilai');
        $pp['mtd_bobot'] = $this->input->post('jan_mtd_bobot');
        $pp['mtd_jml_nilai'] = $this->input->post('jan_mtd_jml_nilai');
        $this->m_konsultan->insertMetodePerusahaan($pp);
        
        //a. PEM
        $pp['mtd_kd_sub'] = 'PRO';
        $pp['mtd_nm_sub'] = 'program kerja, jadwal pekerjaan, dan jadwal penugasan';
        $pp['mtd_penilaian'] = $this->input->post('pro_mtd_penilaian');
        $pp['mtd_nilai'] = $this->input->post('pro_mtd_nilai');
        $pp['mtd_bobot'] = $this->input->post('pro_mtd_bobot');
        $pp['mtd_jml_nilai'] = $this->input->post('pro_mtd_jml_nilai');
        $this->m_konsultan->insertMetodePerusahaan($pp);
        
        //a. PEM
        $pp['mtd_kd_sub'] = 'ORG';
        $pp['mtd_nm_sub'] = 'organisasi';
        $pp['mtd_penilaian'] = $this->input->post('org_mtd_penilaian');
        $pp['mtd_nilai'] = $this->input->post('org_mtd_nilai');
        $pp['mtd_bobot'] = $this->input->post('org_mtd_bobot');
        $pp['mtd_jml_nilai'] = $this->input->post('org_mtd_jml_nilai');
        $this->m_konsultan->insertMetodePerusahaan($pp);
        
        //a. PEM
        $pp['mtd_kd_sub'] = 'KEB';
        $pp['mtd_nm_sub'] = 'kebutuhan fasilitas penunjang';
        $pp['mtd_penilaian'] = $this->input->post('keb_mtd_penilaian');
        $pp['mtd_nilai'] = $this->input->post('keb_mtd_nilai');
        $pp['mtd_bobot'] = $this->input->post('keb_mtd_bobot');
        $pp['mtd_jml_nilai'] = $this->input->post('keb_mtd_jml_nilai');
        $this->m_konsultan->insertMetodePerusahaan($pp);
        
        //a. PEM
        $pp['mtd_kd_sub'] = 'PENA';
        $pp['mtd_nm_sub'] = 'penyajian analisis dan gambar-gambar kerja';
        $pp['mtd_penilaian'] = $this->input->post('penA_mtd_penilaian');
        $pp['mtd_nilai'] = $this->input->post('penA_mtd_nilai');
        $pp['mtd_bobot'] = $this->input->post('penA_mtd_bobot');
        $pp['mtd_jml_nilai'] = $this->input->post('penA_mtd_jml_nilai');
        $this->m_konsultan->insertMetodePerusahaan($pp);
        
        //a. PEM
        $pp['mtd_kd_sub'] = 'PENST';
        $pp['mtd_nm_sub'] = 'penyajian spesifikasi teknis dan perhitungan teknis';
        $pp['mtd_penilaian'] = $this->input->post('penST_mtd_penilaian');
        $pp['mtd_nilai'] = $this->input->post('penST_mtd_nilai');
        $pp['mtd_bobot'] = $this->input->post('penST_mtd_bobot');
        $pp['mtd_jml_nilai'] = $this->input->post('penST_mtd_jml_nilai');
        $this->m_konsultan->insertMetodePerusahaan($pp);
        
        //a. PEM
        $pp['mtd_kd_sub'] = 'PENL';
        $pp['mtd_nm_sub'] = 'penyajian laporan-laporan';
        $pp['mtd_penilaian'] = $this->input->post('penL_mtd_penilaian');
        $pp['mtd_nilai'] = $this->input->post('penL_mtd_nilai');
        $pp['mtd_bobot'] = $this->input->post('penL_mtd_bobot');
        $pp['mtd_jml_nilai'] = $this->input->post('penL_mtd_jml_nilai');
        $this->m_konsultan->insertMetodePerusahaan($pp);
        
        //a. PEM
        $pp['mtd_kd_sub'] = 'GAG';
        $pp['mtd_nm_sub'] = 'gagasan baru yang diajukan oleh peserta untuk meningkatkan kualitas keluaran yang diinginkan dalam KAK';
        $pp['mtd_penilaian'] = $this->input->post('gag_mtd_penilaian');
        $pp['mtd_nilai'] = $this->input->post('gag_mtd_nilai');
        $pp['mtd_bobot'] = $this->input->post('gag_mtd_bobot');
        $pp['mtd_jml_nilai'] = $this->input->post('gag_mtd_jml_nilai');
        $this->m_konsultan->insertMetodePerusahaan($pp);
        
        // Update total unsur penilaian
        $data= $this->m_konsultan->selectByIdUnsurPenilaian($unp_id);
        $up['unp_nilai_pnd_mtd'] = $this->input->post('unp_nilai_pnd_mtd');
        $up['unp_jml_pnd_mtd'] =$data->unp_bobot_pnd_mtd*$up['unp_nilai_pnd_mtd'];
        $this->m_konsultan->updateUnsurPenilaianTeknis($unp_id,$up);
        $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
        redirect(site_url('Pengadaan/PengadaanKonsultanHPS'));
    }
    
    
}