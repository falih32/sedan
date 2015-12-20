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
 //       $data['no_mem2']            = $this->input->post('no_mem2');	
  //      $data['no_mem3']            = $this->input->post('no_mem3');	
        return $data;
    }
    
   public function cetaklaporan($id){
            $data['idpengadaan'] = $id;
            $data['content'] = 'f_laporan';
            $data['title'] = 'cetak laporan';
            $data['jbtlist']= $this->m_laporan->jabatanpegawai();
            $data['mode1'] = '';
            $suratmemo1= $this->m_laporan->selectdetsurat('1',$id)->row();
            if($suratmemo1){
            $data['mode1'] = 'edit';
            $data['kontensuratdari']= $this->m_laporan->selectkonten($id,'1','1'); 
            $data['kontensuratkepada']= $this->m_laporan->selectkonten($id,'2','1');
            $data['kontensurattanggal']= $this->m_laporan->selectkonten($id,'3','1');
            }
            $suratmemo2= $this->m_laporan->selectdetsurat('16',$id)->row();
            $data['mode2'] = '';
            if($suratmemo2){
            $data['mode2'] = 'edit';
            $data['kontensuratnomem2']= $this->m_laporan->selectkonten($id,'9','16'); 
            $data['kontensurattglmem2']= $this->m_laporan->selectkonten($id,'3','16');
            }
            $suratmemo3= $this->m_laporan->selectdetsurat('17',$id)->row();
            $data['mode3'] = '';
            if($suratmemo3){
            $data['mode3'] = 'edit';
            $data['kontensuratnomem3']= $this->m_laporan->selectkonten($id,'9','16'); 
            $data['kontensurattglmem3']= $this->m_laporan->selectkonten($id,'3','16');
            }
               $this->load->view('layout', $data);
    } 
    public function cetakmemorandum1(){
         $data = $this->postVariabel();
         $datapegawaidari=$this->m_laporan->jabatanpegawaibyid($data['dari']);
         $datapegawaikepada=$this->m_laporan->jabatanpegawaibyid($data['kepada']);
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
         $dknt0['dknt_isi']=$data['dari'];
        //kepada
         $dknt1['dknt_idkonten']=2;
         $dknt1['dknt_isi']=$data['kepada'];
         //tanggal
         $dknt2['dknt_idkonten']=3;
         $dknt2['dknt_isi']=$data['tanggal'];
         
         $datacetak['tanggal']=$data['tanggal'];
         $datacetak['ttd']=$datapegawaidari->pgw_nama;
         $d=$this->m_laporan->angpgd($dsrt ['dsrt_idpengadaan']);
         $datacetak['pgd_perihal']=$d->pgd_perihal;
         $datacetak['ang_kode']=$d->ang_kode;
         $datacetak['ang_nama']=$d->ang_nama;
         $tempnum=$this->m_laporan->selectdetsurat('1',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('1',$this->input->post('idpengadaan'), $dsrt);
         $i=0;   
            while ($i<3){
                $this->m_laporan->updatedknt($i+1,$tempnum->dsrt_id, ${"dknt" . $i});
                $i++;
            }
         
         }else {
         $dknt= $this->m_laporan->insertdsrt($dsrt);
         $i=0;   
            while ($i<3){
                ${"dknt" . $i}['dknt_detailsurat']=$dknt;
                $this->m_laporan->insertdknt(${"dknt" . $i});
                $i++;
            }
         }
  
         $this->load->view('fpdf/cetak_memorandum',$datacetak);
         $this->session->set_flashdata('message', array('msg' => 'Data berhasil disimpan','class' => 'success'));
        //redirect(site_url('Pegawai'));
    }
    
        public function cetakmemorandum2(){
         $datapegawai=$this->m_laporan->selectpegawaikepada($this->input->post('idpengadaan'));
         $refpegawai=$this->m_laporan->selectpegawaidari($this->input->post('idpengadaan'));
         if($datapegawai){
         $datapegawaidari=$this->m_laporan->jabatanpegawaibyid($datapegawai->pgw_id);
         $rp=$this->m_laporan->jabatanpegawaibyid($refpegawai->pgw_id);
         $dep="";
         if ($datapegawaidari->dep1!='NULL'||$datapegawaidari->dep1!='Biro Umum') {$dep=$datapegawaidari->dep2;}
         $datacetak['dari']=$datapegawaidari->jbt_nama." ".$dep ;        
         if ($rp->dep1!='NULL'||$rp->dep1!='Biro Umum') {$dep=$rp->dep2;}
         $datacetak['rp']=$rp->jbt_nama." ".$dep ;
         
         $dsrt ['dsrt_jenis_surat']=16;
         $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
         $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');

        //tanggalmem2
         $dknt0['dknt_idkonten']=3;
         $dknt0['dknt_isi']=$this->input->post('tglmem2'); 
        //nomor mem2
         $dknt1['dknt_idkonten']=9;
         $dknt1['dknt_isi']=$this->input->post('no_mem2'); 
         
         $datacetak['tanggal']=$this->input->post('tglmem2');
         $datacetak['ttd2']=$datapegawai->pgw_nama;
         $d=$this->m_laporan->angpgd($dsrt ['dsrt_idpengadaan']);
         $datacetak['pgd_perihal']=$d->pgd_perihal;
         $datacetak['no_mem2']=$this->input->post('no_mem2');
         $datacetak['tglmem1']= $this->m_laporan->selectkonten($this->input->post('idpengadaan'),'3','1');
         $tempnum=$this->m_laporan->selectdetsurat('16',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('16',$this->input->post('idpengadaan'), $dsrt);
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
  
        $this->load->view('fpdf/cetak_memorandum2',$datacetak);
        $this->session->set_flashdata('message', array('msg' => 'Data berhasil disimpan','class' => 'success'));
    
         }else {
                // kalau ga ada diredirect lagi ke halaman login
                $this->session->set_flashdata('message', array('msg' => '<strong> Masukkan data yang dibutuhkan di Memorandum I.','class' => 'danger'));
                redirect(site_url('Laporan/cetaklaporan/'.$this->input->post('idpengadaan').''));
            }    
    }
    
         public function cetakmemorandum3(){
         $datapegawai=$this->m_laporan->selectpegawaikepada($this->input->post('idpengadaan'));    
         //ppk=33    
         $namappk=$this->m_laporan->selectPPK();
         if($namappk||$datapegawai){
         $datapegawaidari=$this->m_laporan->jabatanpegawaibyid($datapegawai->pgw_id);
         $dep="";
         if ($datapegawaidari->dep1!='NULL'||$datapegawaidari->dep1!='Biro Umum') {$dep=$datapegawaidari->dep2;}
         $datacetak['kepada']=$datapegawaidari->jbt_nama." ".$dep ;        
         
         $dsrt ['dsrt_jenis_surat']=17;
         $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
         $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');

        //tanggalmem3
         $dknt0['dknt_idkonten']=3;
         $dknt0['dknt_isi']=$this->input->post('tglmem3'); 
        //nomor mem3
         $dknt1['dknt_idkonten']=9;
         $dknt1['dknt_isi']=$this->input->post('no_mem3'); 
         
         $datacetak['tanggal']=$this->input->post('tglmem3');
         $datacetak['namappk']=$namappk->pgw_nama;
         $d=$this->m_laporan->angpgd($dsrt ['dsrt_idpengadaan']);
         $datacetak['pgd_perihal']=$d->pgd_perihal;
         $datacetak['no_mem3']=$this->input->post('no_mem3');
         $datacetak['no_mem2']= $this->m_laporan->selectkonten($this->input->post('idpengadaan'),'9','16'); 
         $datacetak['tglmem2']= $this->m_laporan->selectkonten($this->input->post('idpengadaan'),'3','16');
         
         $tempnum=$this->m_laporan->selectdetsurat('17',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('17',$this->input->post('idpengadaan'), $dsrt);
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
  
        $this->load->view('fpdf/cetak_memorandum3',$datacetak);
        $this->session->set_flashdata('message', array('msg' => 'Data berhasil disimpan','class' => 'success'));
    
         }else {
                // kalau ga ada diredirect lagi ke halaman login
                $this->session->set_flashdata('message', array('msg' => '<strong> Silahkan Lengkapi data Memorandum I dan II dan Masukkan Nama Pejabat Pembuat Komitmen terlebih dahulu.','class' => 'danger'));
                redirect(site_url('Laporan/cetaklaporan/'.$this->input->post('idpengadaan').''));
            }    
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
       // $data['pwklist']= $this->m_laporan->selectPengSUP($id)->result();
        $data['no_udanganlist']=$this->m_laporan->selectNoUndangan($id);
        
        $this->load->view('layout',$data); 
        
     }
      public function cetakBAPemasukkan(){
//$i=jenis surat          
            $datacetak['d']=$this->m_laporan->selectPengSUP($this->input->post('idpengadaan'))->row();
            $datacetak['noundangan']=$this->m_laporan->selectNoUndangan($this->input->post('idpengadaan'));
            $datacetak['nomor']=$this->input->post('no_BA_pemasukkan');
            $datacetak['noevadministrasi']=$this->input->post('no_BA_evadministrasi');
            $datacetak['noevateknis']=$this->input->post('no_BA_evateknis');
            $datacetak['noevaharga']=$this->input->post('no_BA_evaharga');
            $datacetak['noevakualifikasi']=$this->input->post('no_BA_evakualifikasi');
           // $datacetak['pwk']=$this->input->post('nama_perwakilan');
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
         $this->m_laporan->updatedknt('9',$tempnum->dsrt_id, $dknt);
         }else {
         $dknt['dknt_detailsurat']= $this->m_laporan->insertdsrt($dsrt); 
         $dknt['dknt_idkonten']=9;
         $this->m_laporan->insertdknt($dknt);
         }
}
            
            $this->load->view('fpdf/c_berita_acara', $datacetak); 
     }  
     
     public function LaporanFix($id){
        $data['idpengadaan'] = $id;
        $data['content'] = 'f_laporanfix';
        $data['title']= 'Laporan Fix';
        //$data['pwklist']= $this->m_laporan->selectPengSUP($id)->result();
        $data['no_udanganlist']=$this->m_laporan->selectNoUndangan($id);
        
        $this->load->view('layout',$data); 
        
     }
      public function cetakBAklarifikasi(){
            $datacetak['d']=$this->m_laporan->selectPengSUP($this->input->post('idpengadaan'))->row();
         // $datacetak['noundangan']=$this->input->post('no_undangan');
            $datacetak['nomor']=$this->input->post('no_BA_klarifikasi');
            $datacetak['nokepkuas']=$this->input->post('no_kepkuas');
            $datacetak['tglkepkuas']=$this->input->post('tglkepkuas');
            $datacetak['nosp']=$this->input->post('no_sp');
            $datacetak['tglsp']=$this->input->post('tglsp');
            $datacetak['tglklarifikasi']=$this->m_laporan->selecttglklarifikasiUndangan($this->input->post('idpengadaan'));
           // $datacetak['pwk']=$this->input->post('nama_perwakilan');
            $datacetak['pejpeng']=$this->m_laporan->selectPejPeng();
            $datacetak['listpeng']=$this->m_laporan->detpengbyid($this->input->post('idpengadaan'));
         $dsrt ['dsrt_jenis_surat']=12;
         $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
         $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');
         
                   $dknt0['dknt_idkonten']=9;
                   $dknt0['dknt_isi']=$this->input->post('no_BA_klarifikasi');
                   $dknt1['dknt_idkonten']=14;
                   $dknt1['dknt_isi']=$this->input->post('no_kepkuas');
                   $dknt2['dknt_idkonten']=15;
                   $dknt2['dknt_isi']=$this->input->post('no_sp');
                   $dknt3['dknt_idkonten']=16;
                   $dknt3['dknt_isi']=$this->input->post('tglkepkuas');
                   $dknt4['dknt_isi']= $this->input->post('tglsp');
                   $dknt4['dknt_idkonten']=17;
         $tempnum=$this->m_laporan->selectdetsurat('12',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('12',$this->input->post('idpengadaan'), $dsrt);
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
            $this->load->view('fpdf/c_BA_klarifkasi', $datacetak); 
      }
      
 public function cetakBAHasilPenetapanPengumuman(){
            $datacetak['d']=$this->m_laporan->selectPengSUP($this->input->post('idpengadaan'))->row();
            $datacetak['noBAPemasukan']=$this->m_laporan->selectNoBAPemasukkan($this->input->post('idpengadaan'));
            $datacetak['nomorBAH']=$this->input->post('no_BA_hasil');
            $datacetak['nopeng']=$this->input->post('no_peng');
            $datacetak['nopet']=$this->input->post('no_penetapan');
            $datacetak['tglklarifikasi']=$this->m_laporan->selecttglklarifikasiUndangan($this->input->post('idpengadaan'));
             $datacetak['tglpembukaan']=$this->m_laporan->selecttglPmbkUndangan($this->input->post('idpengadaan'));
            $datacetak['pejpeng']=$this->m_laporan->selectPejPeng();
     //----------------------------------------------------------------------------------------------------   
         $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
         $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');
         $dknt13['dknt_isi']= $this->input->post('no_BA_hasil');
         $dknt14['dknt_isi']= $this->input->post('no_penetapan');
         $dknt15['dknt_isi']= $this->input->post('no_peng');
    
for($i=13;$i<=15;$i++){ 
         $dknt['dknt_isi']=${"dknt".$i}['dknt_isi'];
         $tempnum=$this->m_laporan->selectdetsurat($i,$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         $dsrt ['dsrt_jenis_surat']=$i;
         if($count>0){
         $this->m_laporan->updatedsrt($i,$this->input->post('idpengadaan'), $dsrt);
         $this->m_laporan->updatedknt('9',$tempnum->dsrt_id, $dknt);
         }else {
         $dknt['dknt_detailsurat']= $this->m_laporan->insertdsrt($dsrt); 
         $dknt['dknt_idkonten']=9;
         $this->m_laporan->insertdknt($dknt);
         }
}
            
            $this->load->view('fpdf/c_BA_hasil_pengadaan', $datacetak); 
     }        
}
 