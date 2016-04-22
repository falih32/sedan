<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {
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
            $this->load->model('m_suratizin');
        }
    }
	
    public function index(){
        $data['content'] = 'l_test';
        $data['title']= 'TEST';
        $this->load->view('layout',$data);
    }
	
    public function ajaxProcess(){
        echo $this->m_suratizin->ajaxProcess();
    }
    
    function postVariabel(){
	//$data['utj_id']             = $this->input->post('utj_id');
	$data['siz_nama']    = $this->input->post('siz_nama');
        return $data;
    }
    
    public function tambah_suratizin(){
        $data['content'] = 'f_suratizin';
	$data['title']= 'Input surat izin';
        $data['mode']= 'add';
        $this->load->view('layout',$data);
    }
    public function proses_tambah_suratizin(){      
        $data = $this->postVariabel();
        $this->m_suratizin->insert($data);
        redirect(site_url('SuratIzin'));
    }
    
    public function edit_suratizin($id){
        $data['dataUnit'] = $this->m_suratizin->selectById($id)->row();
        $data['id'] = $id;
        $data['mode'] = 'edit';
        $data['content'] = 'f_suratizin';
        $data['title'] = 'Edit surat izin';
        if($data['dataUnit']->siz_id != ''){
            $this->load->view('layout', $data);
        }else{
            redirect(site_url('Sidoel404'));
        }
    }
    
    public function proses_edit_suratizin(){
        $data = $this->postVariabel();
        $id_edit=$this->input->post('id');
        $this->m_suratizin->update($id_edit, $data);
        redirect(site_url('SuratIzin'));
    }
    
    public function delete_suratizin($id){
        $this->m_suratizin->delete($id);
        redirect('SuratIzin');
    }
    public function coba(){
    $data['test']=$this->input->post('id');
        echo var_dump($data['test']);
//        $str='';
//        foreach ( $test as $t){
//        $str=$str.'siz_id='.$t.' or ';        
//        }
//        $str= preg_replace('/\W\w+\s*(\W*)$/', '$1', $str);
//        
//        echo $str;
//        $data['content'] = 'v_Test';
        //$this->load->view('layout', $data);
        
    }
}
