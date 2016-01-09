<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dipa extends CI_Controller {
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
            $this->load->model('m_dipa');
        }
    }
	
    public function index(){
        $data['content'] = 'l_dipa';
        $data['title']= 'Dipa';
        $this->load->view('layout',$data);
    }
	
    public function ajaxProcess(){
        echo $this->m_dipa->ajaxProcess();
    }
    
    function postVariabel(){
	//$data['utj_id']             = $this->input->post('utj_id');
	$data['dipa_nomor']    = $this->input->post('dipa_nomor');
        $data['dipa_nomorsk']    = $this->input->post('dipa_nomorsk');
        $data['dipa_tahun']    = $this->input->post('dipa_tahun');
        return $data;
    }
    
    public function tambah_dipa(){
        $data['content'] = 'f_dipa';
	$data['title']= 'Input dipa';
        $data['mode']= 'add';
        $this->load->view('layout',$data);
    }
    public function proses_tambah_dipa(){      
        $data = $this->postVariabel();
        $this->m_dipa->insert($data);
        redirect(site_url('Dipa'));
    }
    
    public function edit_dipa($id){
        $data['dataUnit'] = $this->m_dipa->selectById($id)->row();
        $data['id'] = $id;
        $data['mode'] = 'edit';
        $data['content'] = 'f_dipa';
        $data['title'] = 'Edit dipa';
        if($data['dataUnit']->spl_id != ''){
            $this->load->view('layout', $data);
        }else{
            redirect(site_url('Sidoel404'));
        }
    }
    
    public function proses_edit_dipa(){
        $data = $this->postVariabel();
        $id_edit=$this->input->post('id');
        $this->m_dipa->update($id_edit, $data);
        redirect(site_url('Dipa'));
    }
    
    public function delete_dipa($id){
        $this->m_dipa->delete($id);
        redirect('Dipa');
    }
}
