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
            $this->load->model('m_pengadaan');
            $this->load->model('m_jabatan');
            $this->load->model('m_user');
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
        $data['content'] = 'f_laporan';
        $data['title']= 'Laporan';
        $this->load->view('layout',$data);
    }
    
   public function cetaklaporan($id){
           // $data['pengadaanlist'] = $this->m_pengadaan->selectById($id)->row();
            $data['id'] = $id;
            $data['content'] = 'f_laporan';
            $data['title'] = 'cetak laporan';
            $data['jbtlist']= $this->m_jabatan->selectAll()->result();
            
             $this->load->view('layout', $data);
            //$data['jbt']= $this->m_pegawai->selectById($id)->row()->pgw_jabatan;
           /* if($data['userlist']->pgw_deleted == '0'){
               
            }else{
                redirect(site_url('Sidoel404'));
            }*/
        
    } 
}
