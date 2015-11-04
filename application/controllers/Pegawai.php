<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller{
    
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
            $this->load->model('m_pegawai');
            $this->load->model('m_jabatan');
        }
    }
	
    public function index(){
        $data['content'] = 'l_pegawai';
        $data['title']= 'Daftar Pegawai';
        $this->load->view('layout',$data);
    }
	
    public function ajaxProcess(){
        echo $this->m_pegawai->ajaxProcess();
    }
    
    function postVariabel(){
   
        $data['pgw_nama']               = $this->input->post('pgw_nama');
        $data['pgw_nip']                = $this->input->post('pgw_nip');
        $data['pgw_jabatan']            = $this->input->post('pgw_jabatan');
        $data['pgw_telp']             = $this->input->post('pgw_no_telp');		
        return $data;
    }
    
    function postVariabelEdit(){
       $data['pgw_nama']               = $this->input->post('pgw_nama');
        $data['pgw_nip']                = $this->input->post('pgw_nip');
        $data['pgw_jabatan']            = $this->input->post('pgw_jabatan');
        $data['pgw_telp']             = $this->input->post('pgw_no_telp');		
        return $data;
			
        return $data;
    }
    
    public function viewList(){
        $data['content'] = 'l_pegawai';
        $data['title'] = 'Daftar Pegawai';
        $data['userlist'] = $this->m_pegawai->getAllPegawai();
        $this->load->view('layout', $data);
    }
    
    public function addPegawai(){
     //   $this->limitRole(array(1));
        $data['content'] = 'f_pegawai';
        $data['title'] = 'Tambah Pegawai';
        $data['mode']= 'add';
        $data['jbtlist']= $this->m_jabatan->selectAll()->result();
        $this->load->view('layout', $data);
    }
        
    public function proses_addPegawai(){     
        $data = $this->postVariabel();
            $this->m_pegawai->insert($data);
            $this->session->set_flashdata('message', array('msg' => 'Data berhasil disimpan','class' => 'success'));
        redirect(site_url('Pegawai'));
    }
    
    public function editPegawai($id){
            $data['userlist'] = $this->m_pegawai->selectById($id)->row();
            $data['id'] = $id;
            $data['mode'] = 'edit';
            $data['content'] = 'f_pegawai';
            $data['title'] = 'Edit Informasi Pegawai ';
            $data['jbtlist']= $this->m_jabatan->selectAll()->result();
            $data['jbt']= $this->m_pegawai->selectById($id)->row()->pgw_jabatan;
            if($data['userlist']->pgw_deleted == '0'){
                $this->load->view('layout', $data);
            }else{
                redirect(site_url('Sidoel404'));
            }
        
    }
    
    public function proses_editPegawai(){
        $id_edit=$this->input->post('id');
            $data = $this->postVariabelEdit();
            //$jbt = $this->m_pegawai->selectById($id_edit)->row()->pgw_jabatan;
                $this->m_pegawai->update($id_edit, $data);
                $this->session->set_flashdata('message', array('msg' => 'Data berhasil disimpan','class' => 'success'));
        redirect(site_url('Pegawai'));
    }
 
    public function deletePegawai($id){
        $this->m_pegawai->delete($id);
        $this->session->set_flashdata('message', array('msg' => 'Pegawai telah dihapus','class' => 'success'));
        redirect('Pegawai');
    }
    
}
?>