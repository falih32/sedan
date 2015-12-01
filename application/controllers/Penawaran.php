<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Penawaran
 *
 * @author Ganteng Imut
 */
class Penawaran {
    //put your code here
    public function __construct(){
        parent::__construct();
        $level = $this->session->userdata('id_level');
        if($this->session->userdata('id_user') == ''){
            $this->session->set_flashdata('message', array('msg' => 'Silahkan <strong>login</strong> untuk melanjutkan','class' => 'danger'));
            $this->session->set_flashdata('history', $this->uri->uri_string());
            redirect('login');
        }
        else
        {
            $this->load->helper('url');
            $this->load->helper('date');
            $this->load->database();
            $this->load->model('m_pengadaan');
            $this->load->model('M_anggaran');
            $this->load->model('m_user');
            $this->load->model('M_supplier');
            $this->load->model('M_suratizin');
            $this->load->model('M_pegawai');
       
        }
    }
    
    public function add_penawaran($id){
        // 1. ambil data draft yang terpilih mnegenai waktu input penawaran
        // 2. ambil data detail pekerjaan
        // 3. ambil data draft surat
        // 4. post ke view
        $data['dataPengadaan'] = $this->m_pengadaan->selectById($id);
    }
            
    
}
