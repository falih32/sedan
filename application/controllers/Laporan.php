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
            $data['pwklist']= $this->m_laporan->selectPengSUP($id)->result();
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
         $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');
         
          
        //dari
         $dknt0['dknt_idkonten']=1;
         $dknt0['dknt_isi']=$datacetak['dari']; 
        //kepada
         $dknt1['dknt_idkonten']=2;
         $dknt1['dknt_isi']=$datacetak['kepada'];
         //tanggal
         $dknt2['dknt_idkonten']=3;
         $dknt2['dknt_isi']=$data['tanggal'];
         //namapejabat
         $dknt3['dknt_idkonten']=4;
         $dknt3['dknt_isi']=$datapegawaidari->pgw_nama;
         //nomor memo2
         $dknt4['dknt_idkonten']=5;
         $dknt4['dknt_isi']=$data['no_mem2'];
         $datacetak['no_mem2']=$data['no_mem2'];
         //namapejabatmem2
         $dknt5['dknt_idkonten']=6;
         $dknt5['dknt_isi']=$datapegawaikepada->pgw_nama;
         
         //nomor memo3
         $dknt6['dknt_idkonten']=7;
         $dknt6['dknt_isi']=$data['no_mem3'];
         $datacetak['no_mem2']=$data['no_mem3'];
        
         //namapejabatmem3
         $dknt7['dknt_idkonten']=8;
         $dknt7['dknt_isi']=$namappk->pgw_nama;
         
         $datacetak['tanggal']=$data['tanggal'];
         $datacetak['ttd']=$datapegawaidari->pgw_nama;
         $d=$this->m_laporan->angpgd($dsrt ['dsrt_idpengadaan']);
         $datacetak['pgd_perihal']=$d->pgd_perihal;
         $datacetak['ang_kode']=$d->ang_kode;
         $datacetak['ang_nama']=$d->ang_nama;
         $datacetak['no_mem2']=$data['no_mem2'];
         $datacetak['no_mem3']=$data['no_mem3'];
         $datacetak['ttd2']=$datapegawaikepada->pgw_nama;
         $datacetak['namappk']=$namappk->pgw_nama;
         $tempnum=$this->m_laporan->selectdetsurat('1',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('1',$this->input->post('idpengadaan'), $dsrt);
         $i=0;   
            while ($i<8){
                $this->m_laporan->updatedknt($i+1,$tempnum->dsrt_id, ${"dknt" . $i});
                $i++;
            }
         
         }else {
         $dknt= $this->m_laporan->insertdsrt($dsrt);
         $i=0;   
            while ($i<8){
                ${"dknt" . $i}['dknt_detailsurat']=$dknt;
                $this->m_laporan->insertdknt(${"dknt" . $i});
                $i++;
            }
         }
  
         $this->load->view('fpdf/cetak_memorandum',$datacetak);
         $this->session->set_flashdata('message', array('msg' => 'Data berhasil disimpan','class' => 'success'));
        //redirect(site_url('Pegawai'));
    }
    
     public function cetakhps(){
     $datacetak['listpeng']=$this->m_laporan->detpengbyid($this->input->post('idpengadaan'));    
     $namappk=$this->m_laporan->selectPPK();
     $datacetak['namappk']=$namappk->pgw_nama;
     $d=$this->m_laporan->selectpengbyid($this->input->post('idpengadaan'))->row();
     $datacetak['jum_sblm_ppn']=$d->pgd_jml_sblm_ppn_hps;
     $datacetak['jum_ssdh_ppn']=$d->pgd_jml_ssdh_ppn_hps;
     $datacetak['perihal']=$d->pgd_perihal;
     $datacetak['tgl']=$this->input->post('tgl');
     $datacetak['timpny']=$this->m_laporan->selecttimpny($this->input->post('idpengadaan'));
     
         $dsrt ['dsrt_jenis_surat']=2;
         $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
         $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');
         $dknt ['dknt_isi']= $this->input->post('tgl');
         
         $tempnum=$this->m_laporan->selectdetsurat('2',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('2',$this->input->post('idpengadaan'), $dsrt);
         $this->m_laporan->updatedknt('3',$tempnum->dsrt_id, $dknt);
         }else {
         $dknt['dknt_detailsurat']= $this->m_laporan->insertdsrt($dsrt); 
         $dknt['dknt_idkonten']=3;
         $this->m_laporan->insertdknt($dknt);
         }

         $this->load->view('fpdf/c_hps',$datacetak);       
     }
     public function cetak_dftr_harga(){
     $datacetak['nomor']=$this->input->post('no_dftrh');
     $datacetak['listpeng']=$this->m_laporan->detpengbyid($this->input->post('idpengadaan'));    
     $namapejpeng=$this->m_laporan->selectPejPeng();
     $datacetak['namapejpeng']=$namapejpeng->pgw_nama;
     $datacetak['tgl']=$this->input->post('tgldkh');
     $dsrt ['dsrt_jenis_surat']=3;
     $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
     $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');
         $dknt0['dknt_idkonten']=9;
         $dknt0['dknt_isi']=$this->input->post('no_dftrh');
         $dknt1['dknt_idkonten']=3;
         $dknt1['dknt_isi']= $this->input->post('tgldkh');
         
         $tempnum=$this->m_laporan->selectdetsurat('3',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('3',$this->input->post('idpengadaan'), $dsrt);
         $i=0;   
            while ($i<2){
                $this->m_laporan->updatedknt(${"dknt" . $i}['dknt_idkonten'],$tempnum->dsrt_id, ${"dknt" . $i});
                $i++;
            }

         }else {
         $dknt= $this->m_laporan->insertdsrt($dsrt);
         $i=0;   
            while ($i<2){
                ${"dknt" . $i}['dknt_detailsurat']=$dknt;
                $this->m_laporan->insertdknt(${"dknt" . $i});
                $i++;
            }
         }
         
         $this->load->view('fpdf/c_dftr_harga',$datacetak); 
     }
    
     public function cetakspektek(){
         
            $datacetak['listpeng']=$this->m_laporan->detpengbyid($this->input->post('idpengadaan'));    
            $namappk=$this->m_laporan->selectPPK();
            $datacetak['namappk']=$namappk->pgw_nama;
            $d=$this->m_laporan->selectpengbyid($this->input->post('idpengadaan'))->row();
            $datacetak['perihal']=$d->pgd_perihal;
            $datacetak['tgl']=$this->input->post('tglspektek');
            $dsrt ['dsrt_jenis_surat']=4;
            $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
            $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');
            $dknt ['dknt_isi']= $this->input->post('tglspektek');
            $dknt['dknt_idkonten']=3;
         $tempnum=$this->m_laporan->selectdetsurat('4',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('4',$this->input->post('idpengadaan'), $dsrt);   
         $this->m_laporan->updatedknt('3',$tempnum->dsrt_id, $dknt);
         }else {
         $dknt['dknt_detailsurat']= $this->m_laporan->insertdsrt($dsrt); 
         $this->m_laporan->insertdknt($dknt);
         }
                $this->load->view('fpdf/c_spektek',$datacetak); 
     }
      public function cetakldp(){
            $datacetak['d']=$this->m_laporan->selectpengbyid($this->input->post('idpengadaan'))->row();
            $datacetak['listsiz']=$this->m_laporan->selectsizbypgd($this->input->post('idpengadaan'));
            $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
            $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');
            $tempnum=$this->m_laporan->selectdetsurat('5',$this->input->post('idpengadaan'))->row();
            $count=count($tempnum);
            if($count>0){
             $this->m_laporan->updatedsrt('5',$this->input->post('idpengadaan'), $dsrt);
             }else {
             $dsrt ['dsrt_jenis_surat']=5; 
             $this->m_laporan->insertdsrt($dsrt);
            }
            $this->load->view('fpdf/cetak_ldp', $datacetak); 
     }
      public function cetakUndangan(){
            $datacetak['d']=$this->m_laporan->selectPengSUP($this->input->post('idpengadaan'))->row();
            $datacetak['nomor']=$this->input->post('no_undangan');
            $datacetak['PDP']=$this->input->post('p_dok_penawaran');
            $datacetak['klarifikasi']=$this->input->post('klarifikasi');
            $datacetak['penandatanganan']=$this->input->post('penandatanganan');
            $datacetak['pejpeng']=$this->m_laporan->selectPejPeng();
            $datacetak['tgl']=$this->input->post('tgludg');
            $dsrt ['dsrt_jenis_surat']=6;
            $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
            $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');
                   $dknt0['dknt_idkonten']=9;
                   $dknt0['dknt_isi']=$this->input->post('no_undangan');
                   $dknt1['dknt_idkonten']=10;
                   $dknt1['dknt_isi']=$this->input->post('p_dok_penawaran');
                   $dknt2['dknt_idkonten']=11;
                   $dknt2['dknt_isi']=$this->input->post('klarifikasi');
                   $dknt3['dknt_idkonten']=12;
                   $dknt3['dknt_isi']=$this->input->post('penandatanganan');
                   $dknt4['dknt_isi']= $this->input->post('tgludg');
                   $dknt4['dknt_idkonten']=3;

         $tempnum=$this->m_laporan->selectdetsurat('6',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('6',$this->input->post('idpengadaan'), $dsrt);
         $i=0;   
            while ($i<5){
                $this->m_laporan->updatedknt(${"dknt" . $i}['dknt_idkonten'],$tempnum->dsrt_id, ${"dknt" . $i});
                $i++;
            }
         }else {
         $dknt= $this->m_laporan->insertdsrt($dsrt);
         $i=0;   
            while ($i<5){
                ${"dknt".$i}['dknt_detailsurat']=$dknt;
                $this->m_laporan->insertdknt(${"dknt".$i});
                $i++;
            }
         } 
            $this->load->view('fpdf/c_undangan', $datacetak); 
     }
//     
     
     public function LaporanPenawaran($id){
        $data['idpengadaan'] = $id;
        $data['content'] = 'f_laporanpenawaran';
        $data['title']= 'Laporan Penawaran';
        $data['pwklist']= $this->m_laporan->selectPengSUP($id)->result();
        $data['no_udanganlist']=$this->m_laporan->selectNoUndangan($id);
        
        $this->load->view('layout',$data); 
        
     }
      public function cetakBAPemasukkan(){
            $datacetak['d']=$this->m_laporan->selectPengSUP($this->input->post('idpengadaan'))->row();
            $datacetak['noundangan']=$this->m_laporan->selectNoUndangan($this->input->post('idpengadaan'));
            $datacetak['nomor']=$this->input->post('no_BA_pemasukkan');
            $datacetak['noevadministrasi']=$this->input->post('no_BA_evadministrasi');
            $datacetak['noevateknis']=$this->input->post('no_BA_evateknis');
            $datacetak['noevaharga']=$this->input->post('no_BA_evaharga');
            $datacetak['noevakualifikasi']=$this->input->post('no_BA_evakualifikasi');
            $datacetak['pwk']=$this->input->post('nama_perwakilan');
            $datacetak['tglpembukaan']=$this->m_laporan->selecttglPmbkUndangan($this->input->post('idpengadaan'));
            $datacetak['tglundangan']=$this->m_laporan->selecttglUndangan($this->input->post('idpengadaan'));
            $datacetak['pejpeng']=$this->m_laporan->selectPejPeng();
        
         $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
         $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');
         $dknt7['dknt_isi']= $this->input->post('no_BA_pemasukkan');
         $dknt8['dknt_isi']= $this->input->post('no_BA_evadministrasi');
         $dknt9['dknt_isi']= $this->input->post('no_BA_evaharga');
         $dknt10['dknt_isi']= $this->input->post('no_BA_evateknis');
         $dknt11['dknt_isi']= $this->input->post('no_BA_evakualifikasi');       
for($i=7;$i<=11;$i++){ 
         $dknt['dknt_isi']=${"dknt".$i}['dknt_isi'];
         $tempnum=$this->m_laporan->selectdetsurat($i,$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         $dsrt ['dsrt_jenis_surat']=$i;
         if($count>0){
         $this->m_laporan->updatedsrt($i,$this->input->post('idpengadaan'), $dsrt);
         $this->m_laporan->updatedknt('3',$tempnum->dsrt_id, $dknt);
         }else {
         $dknt['dknt_detailsurat']= $this->m_laporan->insertdsrt($dsrt); 
         $dknt['dknt_idkonten']=3;
         $this->m_laporan->insertdknt($dknt);
         }
}
            
            $this->load->view('fpdf/c_berita_acara', $datacetak); 
     }  
     
     public function LaporanFix($id){
        $data['idpengadaan'] = $id;
        $data['content'] = 'f_laporanfix';
        $data['title']= 'Laporan Fix';
        $data['pwklist']= $this->m_laporan->selectPengSUP($id)->result();
        $data['no_udanganlist']=$this->m_laporan->selectNoUndangan($id);
        
        $this->load->view('layout',$data); 
        
     }
      public function cetakBA_Fix(){
            $datacetak['d']=$this->m_laporan->selectPengSUP($this->input->post('idpengadaan'))->row();
         // $datacetak['noundangan']=$this->input->post('no_undangan');
            $datacetak['nomor']=$this->input->post('no_BA_pemasukkan');
            $datacetak['noevadministrasi']=$this->input->post('no_BA_evadministrasi');
            $datacetak['noevateknis']=$this->input->post('no_BA_evateknis');
            $datacetak['noevaharga']=$this->input->post('no_BA_evaharga');
            $datacetak['noevakualifikasi']=$this->input->post('no_BA_evakualifikasi');
            $datacetak['pwk']=$this->input->post('nama_perwakilan');
         
            $datacetak['pejpeng']=$this->m_laporan->selectPejPeng();

      }
}
 