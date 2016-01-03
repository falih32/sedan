<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Penyusun
 *
 * @author Ganteng Imut
 */
class Penyusun extends CI_Controller{
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
            $this->load->model('m_penyusun');
        }
    }
	
    public function index(){
        $data['content'] = 'l_masterpenyusun';
        $data['title']= 'Daftar Riwayat Penyusun';
        $this->load->view('layout',$data);
    }
	
    public function ajaxProcess(){
        echo $this->m_penyusun->ajaxProcess();
    }
    
    function postVariabel(){
   
        $data['msp_sk']               = $this->input->post('msp_sk');
        $data['msp_ketua']                = $this->input->post('msp_ketua');
        $data['msp_anggota1']            = $this->input->post('msp_anggota1');
        $data['msp_anggota2']             = $this->input->post('msp_anggota2');	
        $data['msp_anggota3']             = $this->input->post('msp_anggota3');
        $data['msp_anggota4']             = $this->input->post('msp_anggota4');
        return $data;
    }
    
    function postVariabelEdit(){
        $data['msp_sk']               = $this->input->post('msp_sk');
        $data['msp_ketua']                = $this->input->post('msp_ketua');
        $data['msp_anggota1']            = $this->input->post('msp_anggota1');
        $data['msp_anggota2']             = $this->input->post('msp_anggota2');	
        $data['msp_anggota3']             = $this->input->post('msp_anggota3');
        $data['msp_anggota4']             = $this->input->post('msp_anggota4');	
        return $data;

    }
    

    
    public function addPenyusun(){
     //   $this->limitRole(array(1));
        $data['content'] = 'f_masterpenyusun';
        $data['title'] = 'Tambah Data Penyusun';
        $data['mode']= 'add';
        $data['pgwlist']= $this->m_pegawai->selectAllWithJabatan()->result();
        $this->load->view('layout', $data);
    }
        
    public function proses_addPenyusun(){     
        $data = $this->postVariabel();
        $this->m_penyusun->insert($data);
        $this->session->set_flashdata('message', array('msg' => 'Data berhasil disimpan','class' => 'success'));
        redirect(site_url('Penyusun'));
    }
    
    public function editPenyusun($id){
            $data['penyusunlist'] = $this->m_penyusun->selectById($id)->row();
            $data['id'] = $id;
            $data['mode'] = 'edit';
            $data['content'] = 'f_masterpenyusun';
            $data['title'] = 'Edit Data Penyusun ';
            $data['pgwlist']= $this->m_pegawai->selectAllWithJabatan()->result();
            if($data['penyusunlist']->msp_deleted == '0'){
                $this->load->view('layout', $data);
            }else{
                redirect(site_url('Sidoel404'));
            }
        
    }
    
    public function proses_editPenyusun(){
        $id_edit=$this->input->post('id');
        $data = $this->postVariabelEdit();
        //$jbt = $this->m_pegawai->selectById($id_edit)->row()->pgw_jabatan;
        $this->m_penyusun->update($id_edit, $data);
        $this->session->set_flashdata('message', array('msg' => 'Data berhasil disimpan','class' => 'success'));
        redirect(site_url('Penyusun'));
    }
 
    public function deletePenyusun($id){
        $this->m_penyusun->delete($id);
        $this->session->set_flashdata('message', array('msg' => 'Data telah dihapus','class' => 'success'));
        redirect('Penyusun');
    }
    
}
?>
