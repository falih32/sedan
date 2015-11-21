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
            //$this->load->library('fpdf');
            $this->load->library('pdf_mc_table');
            $this->load->database();
            $this->load->helper('date');
//            $this->load->model('m_pengadaan');
            $this->load->model('m_laporan');
            $this->load->model('m_user');
        }
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
    
     function postVariabel(){
   
        $data['kepada']               = $this->input->post('kepada');
        $data['dari']                = $this->input->post('dari');
        $data['tanggal']            = $this->input->post('tanggal');	
        $data['no_mem2']            = $this->input->post('no_mem2');	
        $data['no_mem3']            = $this->input->post('no_mem3');	
        return $data;
    }
    
   public function cetaklaporan($id){
           // $data['pengadaanlist'] = $this->m_pengadaan->selectById($id)->row();
            $data['idpengadaan'] = $id;
            $data['content'] = 'f_laporan';
            $data['title'] = 'cetak laporan';
            $data['jbtlist']= $this->m_laporan->jabatanpegawai();
            
             $this->load->view('layout', $data);
            //$data['jbt']= $this->m_pegawai->selectById($id)->row()->pgw_jabatan;
           /* if($data['userlist']->pgw_deleted == '0'){
               
            }else{
                redirect(site_url('Sidoel404'));
            }*/
        
    } 
    public function cetakmemorandum1(){
         $data = $this->postVariabel();
         $datapegawaidari=$this->m_laporan->jabatanpegawaibyid($data['dari']);
         $datapegawaikepada=$this->m_laporan->jabatanpegawaibyid($data['kepada']);
         $namappk=$this->m_laporan->selectPPK();
         $dep="";
         if ($datapegawaidari->dep1!='NULL'||$datapegawaidari->dep1!='Biro Umum') {$dep=$datapegawaidari->dep2;}
         $datacetak['dari']=$datapegawaidari->jbt_nama." ".$dep ;        
         if ($datapegawaikepada->dep1!='NULL'||$datapegawaikepada->dep1!='Biro Umum') {$dep=$datapegawaikepada->dep2;}
         $datacetak['kepada']=$datapegawaikepada->jbt_nama." ".$dep ;
         
         $dsrt ['dsrt_jenis_surat']=1;
         $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
         $dsrt ['dsrt_iddraftpengadaan']= $this->input->post('idpengadaan');
  
         $dknt['dknt_detailsurat']= $this->m_laporan->insertdsrt($dsrt); 
        //dari
         $dknt['dknt_idkonten']=1;
         $dknt['dknt_isi']=$datacetak['dari'];
         $this->m_laporan->insertdknt($dknt); 
        //kepada
         $dknt['dknt_idkonten']=2;
         $dknt['dknt_isi']=$datacetak['kepada'];
         $this->m_laporan->insertdknt($dknt);
         //tanggal
         $dknt['dknt_idkonten']=3;
         $dknt['dknt_isi']=$data['tanggal'];
         $this->m_laporan->insertdknt($dknt);
         //namapejabat
         $dknt['dknt_idkonten']=4;
         $dknt['dknt_isi']=$datapegawaidari->pgw_nama;
         $this->m_laporan->insertdknt($dknt);
         //nomor memo2
         $dknt['dknt_idkonten']=5;
         $dknt['dknt_isi']=$data['no_mem2'];
         $datacetak['no_mem2']=$data['no_mem2'];
         $this->m_laporan->insertdknt($dknt);
         //namapejabatmem2
         $dknt['dknt_idkonten']=6;
         $dknt['dknt_isi']=$datapegawaikepada->pgw_nama;
         $this->m_laporan->insertdknt($dknt);
         
         //nomor memo3
         $dknt['dknt_idkonten']=7;
         $dknt['dknt_isi']=$data['no_mem3'];
         $datacetak['no_mem2']=$data['no_mem3'];
         $this->m_laporan->insertdknt($dknt);
         //namapejabatmem3
         $dknt['dknt_idkonten']=8;
         $dknt['dknt_isi']=$namappk->pgw_nama;
         $this->m_laporan->insertdknt($dknt);
         
         $datacetak['tanggal']=$data['tanggal'];
         $datacetak['ttd']=$datapegawaidari->pgw_nama;
         $d=$this->m_laporan->angdrppgd($dsrt ['dsrt_iddraftpengadaan']);
         $datacetak['pgd_perihal']=$d->pgd_perihal;
         $datacetak['ang_kode']=$d->ang_kode;
         $datacetak['ang_nama']=$d->ang_nama;
         $datacetak['no_mem2']=$data['no_mem2'];
         $datacetak['no_mem3']=$data['no_mem3'];
         $datacetak['ttd2']=$datapegawaikepada->pgw_nama;
         $datacetak['namappk']=$namappk->pgw_nama;

         
         $this->load->view('fpdf/cetak_memorandum',$datacetak);
         $this->session->set_flashdata('message', array('msg' => 'Data berhasil disimpan','class' => 'success'));
        //redirect(site_url('Pegawai'));
    }
    
     public function cetakhps(){
     $datacetak['listpeng']=$this->m_laporan->detpengbyid($this->input->post('idpengadaan'));    
     $namappk=$this->m_laporan->selectPPK();
     $datacetak['namappk']=$namappk->pgw_nama;

         
         $this->load->view('fpdf/c_hps',$datacetak); 
     }
    
}
