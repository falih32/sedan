<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anggaran extends CI_Controller {
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
            $this->load->model('m_anggaran');
        }
    }
	
    public function index(){
        $data['content'] = 'l_anggaran';
        $data['title']= 'Anggaran';
        $this->load->view('layout',$data);
    }
	
    public function ajaxProcess(){
        echo $this->m_anggaran->ajaxProcess();
    }
    
    public function select2All(){
        $search = strip_tags(trim($this->input->get('q')));
        //$search = "";
        $result = $this->m_anggaran->select2All($search);
        
        echo json_encode($result); 
    }
    function postVariabel(){
	//$data['utj_id']             = $this->input->post('utj_id');
	$data['ang_nama']    = $this->input->post('ang_nama');
        return $data;
    }
    
    public function tambah_anggaran(){
        $data['content'] = 'f_anggaran';
	$data['title']= 'Input Anggaran';
        $data['mode']= 'add';
        $this->load->view('layout',$data);
    }
    public function proses_tambah_anggaran(){      
        $data = $this->postVariabel();
        $this->m_anggaran->insert($data);
        redirect(site_url('Anggaran'));
    }
    
    public function edit_anggaran($id){
        $data['dataUnit'] = $this->m_anggaran->selectById($id)->row();
        $data['id'] = $id;
        $data['mode'] = 'edit';
        $data['content'] = 'f_anggaran';
        $data['title'] = 'Edit Anggaran';
        if($data['dataUnit']->ang_id != ''){
            $this->load->view('layout', $data);
        }else{
            redirect(site_url('Sidoel404'));
        }
    }
    
    public function proses_edit_suratizin(){
        $data = $this->postVariabel();
        $id_edit=$this->input->post('id');
        $this->m_anggaran->update($id_edit, $data);
        redirect(site_url('SuratIzin'));
    }
    
    public function delete_suratizin($id){
        $this->m_anggaran->delete($id);
        redirect('SuratIzin');
    }
}
