<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {
    //put your code here
    
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('id_user') == ''){
            $this->session->set_flashdata('message', array('msg' => 'Please <strong>login</strong> to continue','class' => 'danger'));
            redirect('login');
        }
        else
        {
            $this->load->helper('url');
            $this->load->database();
            $this->load->helper('date');
            $this->load->model('m_surat_masuk');
            $this->load->model('m_disposisi');
            $this->load->model('m_user');
            $this->load->model('m_departemen');
            $this->load->model('m_status_disposisi');
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
    
    function index(){
        redirect('Dashboard');
    }
    
    function suratmasuk(){
        $bulan = $this->input->post('sms_bulan');
        $tahun = $this->input->post('sms_tahun');
        $bagian = $this->input->post('sms_bagian');
        $awal = $tahun."-".$bulan."-01";
        $akhir = $tahun."-".($bulan+1)."-01";
        $user = $this->m_user->selectById($this->session->userdata('id_user'))->row();
        $role = $this->session->userdata('id_role');
        $level = $this->session->userdata('id_level');
        if($role == 1 || $level == 1){
            if($bagian == 'all'){
                $data['record1'] = $this->m_surat_masuk->laporSuratMasuk1($awal, $akhir);
                $data['record2'] = $this->m_surat_masuk->laporSuratMasuk2($awal, $akhir);
                $data['record3'] = $this->m_surat_masuk->laporSuratMasuk3($awal, $akhir);
                //$data['count'] = $this->m_surat_masuk->countAll($awal, $akhir);
            }
            else{
                $data['record1'] = $this->m_surat_masuk->laporSuratMasukBagian1($awal, $akhir, $bagian);
                $data['record2'] = $this->m_surat_masuk->laporSuratMasukBagian2($awal, $akhir, $bagian);
                $data['record3'] = $this->m_surat_masuk->laporSuratMasukBagian3($awal, $akhir, $bagian);
                $data['bagian'] = $this->m_departemen->selectById($bagian)->row();
                //$data['count'] = $this->m_surat_masuk->countAllBagian($awal, $akhir, $bagian);
            }
        }
        elseif($user->dpt_parent == 0){
            $data['record1'] = $this->m_surat_masuk->laporSuratMasukBagian1($awal, $akhir, $user->dpt_id);
            $data['record2'] = $this->m_surat_masuk->laporSuratMasukBagian2($awal, $akhir, $user->dpt_id);
            $data['record3'] = $this->m_surat_masuk->laporSuratMasukBagian3($awal, $akhir, $user->dpt_id);
            $data['bagian'] = $this->m_departemen->selectById($user->dpt_id)->row();
            //$data['count'] = $this->m_surat_masuk->countAllBagian($awal, $akhir, $user->dpt_id);
        }
        elseif($user->dpt_parent > 0){
            $data['record1'] = $this->m_surat_masuk->laporSuratMasukSubBagian1($awal, $akhir, $user->dpt_id);
            $data['record2'] = $this->m_surat_masuk->laporSuratMasukSubBagian2($awal, $akhir, $user->dpt_id);
            $data['record3'] = $this->m_surat_masuk->laporSuratMasukSubBagian3($awal, $akhir, $user->dpt_id);
            $data['bagian'] = $this->m_departemen->selectById($user->dpt_id)->row();
        }
            
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['timestamp'] = $this->m_surat_masuk->getTimeStamp()->CurrentDateTime;
        $this->load->view('laporan_surat', $data);
    }
    
    function disposisi(){
        $bulan = $this->input->post('fds_bulan');
        $tahun = $this->input->post('fds_tahun');
        $bagian = $this->input->post('fds_bagian');
        $awal = $tahun."-".$bulan."-01";
        $akhir = $tahun."-".($bulan+1)."-01";
        $user = $this->m_user->selectById($this->session->userdata('id_user'))->row();
        $role = $this->session->userdata('id_role');
        $level = $this->session->userdata('id_level');
        if($role == 1 || $level == 1){
            $data['liststatus'] = $this->m_status_disposisi->selectAll()->result();
            $data['user'] = $user;
            if($bagian == 'all'){
                $data['record'] = $this->m_disposisi->laporDisposisi($awal, $akhir);
                //$data['count'] = $this->m_disposisi->countAll($awal, $akhir);
            }
            else{
                $data['record'] = $this->m_disposisi->laporDisposisiBagian($awal, $akhir, $bagian);
                $data['bagian'] = $this->m_departemen->selectById($bagian)->row();
                //$data['count'] = $this->m_disposisi->countAllBagian($awal, $akhir, $bagian);
            }
        }
        elseif($user->dpt_parent >= 0){
            //$data['record'] = $this->m_disposisi->laporDisposisiBagian($awal, $akhir, $user->dpt_id);
            $data['record'] = $this->m_disposisi->laporDisposisiUser($awal, $akhir, $user->usr_id);
            $data['bagian'] = $this->m_departemen->selectById($user->dpt_id)->row();
            $data['user'] = $user;
            $data['liststatus'] = $this->m_status_disposisi->selectAll()->result();
            //$data['count'] = $this->m_disposisi->countAllBagian($awal, $akhir, $user->dpt_id);
        }
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['timestamp'] = $this->m_disposisi->getTimeStamp()->CurrentDateTime;
        $data['mode']='user';
        $this->load->view('laporan_disposisi', $data);
    }
    
    function disposisiBagian(){
        $bulan = $this->input->post('fds_bulan');
        $tahun = $this->input->post('fds_tahun');
        $bagian = $this->input->post('fds_bagian');
        $awal = $tahun."-".$bulan."-01";
        $akhir = $tahun."-".($bulan+1)."-01";
        $user = $this->m_user->selectById($this->session->userdata('id_user'))->row();
        $role = $this->session->userdata('id_role');
        $level = $this->session->userdata('id_level');
        if($role == 1 || $level == 1){
            $data['liststatus'] = $this->m_status_disposisi->selectAll()->result();
            $data['user'] = $user;
            if($bagian == 'all'){
                $data['record'] = $this->m_disposisi->laporDisposisi($awal, $akhir);
                //$data['count'] = $this->m_disposisi->countAll($awal, $akhir);
            }
            else{
                $data['record'] = $this->m_disposisi->laporDisposisiBagian($awal, $akhir, $bagian);
                $data['bagian'] = $this->m_departemen->selectById($bagian)->row();
                //$data['count'] = $this->m_disposisi->countAllBagian($awal, $akhir, $bagian);
            }
        }
        elseif($user->dpt_parent >= 0){
            //$data['record'] = $this->m_disposisi->laporDisposisiBagian($awal, $akhir, $user->dpt_id);
            $data['record'] = $this->m_disposisi->laporDisposisiBagian($awal, $akhir, $user->dpt_id);
            $data['bagian'] = $this->m_departemen->selectById($user->dpt_id)->row();
            $data['user'] = $user;
            $data['liststatus'] = $this->m_status_disposisi->selectAll()->result();
            //$data['count'] = $this->m_disposisi->countAllBagian($awal, $akhir, $user->dpt_id);
        }
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['timestamp'] = $this->m_disposisi->getTimeStamp()->CurrentDateTime;
        $data['mode']='bagian';
        $this->load->view('laporan_disposisi', $data);
    }
}
