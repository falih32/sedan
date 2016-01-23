<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller {
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
            $this->load->model('m_supplier');
        }
    }
	
    public function index(){
        $data['content'] = 'l_supplier';
        $data['title']= 'Supplier';
        $this->load->view('layout',$data);
    }
	
    public function ajaxProcess(){
        echo $this->m_supplier->ajaxProcess();
    }
    
    function postVariabel(){
	//$data['utj_id']             = $this->input->post('utj_id');
	$data['spl_nama']    = $this->input->post('spl_nama');
        $data['spl_alamat']    = $this->input->post('spl_alamat');
        $data['spl_telp']    = $this->input->post('spl_telp');
        $data['spl_npwp']    = $this->input->post('spl_npwp');
        $data['spl_rekening']    = $this->input->post('spl_rekening');
        $data['spl_bank']    = $this->input->post('spl_bank');
        return $data;
    }
    
    public function tambah_supplier(){
        $data['content'] = 'f_supplier';
	$data['title']= 'Input supplier';
        $data['mode']= 'add';
        $this->load->view('layout',$data);
    }
    public function proses_tambah_supplier(){      
        $data = $this->postVariabel();
        $this->m_supplier->insert($data);
        redirect(site_url('Supplier'));
    }
    
    public function edit_supplier($id){
        $data['dataUnit'] = $this->m_supplier->selectById($id)->row();
        $data['id'] = $id;
        $data['mode'] = 'edit';
        $data['content'] = 'f_supplier';
        $data['title'] = 'Edit supplier';
        if($data['dataUnit']->spl_id != ''){
            $this->load->view('layout', $data);
        }else{
            redirect(site_url('Sidoel404'));
        }
    }
    
    public function proses_edit_supplier(){
        $data = $this->postVariabel();
        $id_edit=$this->input->post('id');
        $this->m_supplier->update($id_edit, $data);
        redirect(site_url('Supplier'));
    }
    
    public function delete_supplier($id){
        $this->m_supplier->delete($id);
        redirect('Supplier');
    }
}
