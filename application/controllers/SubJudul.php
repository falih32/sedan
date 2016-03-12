<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SubJudul extends CI_Controller {
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
            $this->load->model('M_subjudul');
        }
    }
	
    public function index(){
        $data['content'] = 'l_subjudul';
        $data['title']= 'Sub Judul';
        $this->load->view('layout',$data);
    }
    
    public function prosesInputSubJudul(){
        $data['sjd_sub_judul'] = $this->input->post('sjd_sub_judul');
        $data['sjd_jenis'] = $this->input->post('sub_pgd_tipe_pengadaan');
        $nama = trim($data['sjd_sub_judul'],' ');
       
        try {
            if($nama != ''){
                $count = count($this->M_subjudul->selectByNama($nama)->row());
                echo $count;
                if($count > 0){
                    echo "duplicate";
                }else{
                    $this->M_subjudul->insert($data);
                    echo "success";
                }
            }else{
                echo "empty";
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
	
    public function ajaxProcess(){
        echo $this->M_subjudul->ajaxProcess();
    }
    
    public function select2All(){
        $search = strip_tags(trim($this->input->get('q')));
        //$search = "";
        $result = $this->M_subjudul->select2All($search);
        
//        if(count($result) != 0) {
//            foreach ($result as $row){
//                $answer[] = array("id"=>$row->ang_kode,"text"=>$row->ang_kode." - ".$row->ang_nama);  
//            }
//          } 
//        else { 
//            // 0 results send a message back to say so.     
//            $answer[] = array("id"=>"0","text"=>"Data tidak ditemukan.."); 
//        } 
        // finally encode the answer to json and send back the result. 
        echo json_encode($result); 
    }
    function postVariabel(){
	//$data['utj_id']             = $this->input->post('utj_id');
	$data['sjd_sub_judul']    = $this->input->post('sjd_sub_judul');
        return $data;
    }
    
    public function tambah_subsudul(){
        $data['content'] = 'f_subjudul';
	$data['title']= 'Input subjudul';
        $data['mode']= 'add';
        $this->load->view('layout',$data);
    }
    public function proses_tambah_anggaran(){      
        $data = $this->postVariabel();
        $this->M_subjudul->insert($data);
        redirect(site_url('Subjudul'));
    }
    
    public function edit_subjudul($id){
        $data['dataUnit'] = $this->M_subjudul->selectById($id)->row();
        $data['id'] = $id;
        $data['mode'] = 'edit';
        $data['content'] = 'f_subjudul';
        $data['title'] = 'Edit Sub Judul';
        if($data['dataUnit']->sjd_id != ''){
            $this->load->view('layout', $data);
        }else{
            redirect(site_url('Sidoel404'));
        }
    }
    
}