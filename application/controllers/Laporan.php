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
            $this->load->model('m_pengadaan');
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
            $data['kontensuratnomem3']= $this->m_laporan->selectkonten($id,'9','17'); 
            $data['kontensurattglmem3']= $this->m_laporan->selectkonten($id,'3','17');
            }
            $surathps= $this->m_laporan->selectdetsurat('2',$id)->row();
            $data['mode4'] = '';
            if($surathps){
            $data['mode4'] = 'edit';
            $data['kontensurattglhps']= $this->m_laporan->selectkonten($id,'3','2');
            }
            $suratdkh= $this->m_laporan->selectdetsurat('3',$id)->row();
            $data['mode5'] = '';
            if($suratdkh){
            $data['mode5'] = 'edit';
            $data['kontensurattgldkh']= $this->m_laporan->selectkonten($id,'3','3');
            }
            $suratspektek= $this->m_laporan->selectdetsurat('4',$id)->row();
            $data['mode6'] = '';
            if($suratdkh){
            $data['mode6'] = 'edit';
            $data['kontensurattglspektek']= $this->m_laporan->selectkonten($id,'3','4');
            }
            $suratudg= $this->m_laporan->selectdetsurat('6',$id)->row();
            $data['mode7'] = '';
            if($suratudg){
            $data['mode7'] = 'edit';
            $data['kontensurattgludg']= $this->m_laporan->selectkonten($id,'3','6');
            $data['kontensuratLudg']= $this->m_laporan->selectkonten($id,'4','6');
            $data['kontensuratnoudg']= $this->m_laporan->selectkonten($id,'9','6');
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
         $d=$this->m_laporan->selectpengbyid($this->input->post('idpengadaan'))->row();
         if($datapegawai){
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
         $datacetak['namappk']=$d->pgd_nama_ppk;
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
                $this->session->set_flashdata('message', array('msg' => '<strong> Silahkan Lengkapi data Memorandum I dan II.','class' => 'danger'));
                redirect(site_url('Laporan/cetaklaporan/'.$this->input->post('idpengadaan').''));
            }    
    }
    
     public function cetakhps(){
     $datacetak['listpeng']=$this->m_laporan->detpengbyid($this->input->post('idpengadaan'));    
     
     $d=$this->m_laporan->selectpengbyid($this->input->post('idpengadaan'))->row();
     $datacetak['namappk']=$d->pgd_nama_ppk;
     $datacetak['pgd_dgn_pajak']=$d->pgd_dgn_pajak;
     $datacetak['jum_sblm_ppn']=$d->pgd_jml_sblm_ppn_hps;
     $datacetak['jum_ssdh_ppn']=$d->pgd_jml_ssdh_ppn_hps;
     $datacetak['perihal']=$d->pgd_perihal;
     $datacetak['tgl']=$this->input->post('tgl');
     $datacetak['ketua']=$this->m_laporan->selecttimpnyketua($this->input->post('idpengadaan'));
     $datacetak['anggota1']=$this->m_laporan->selecttimpnyanggota1($this->input->post('idpengadaan'));
     $datacetak['anggota2']=$this->m_laporan->selecttimpnyanggota2($this->input->post('idpengadaan'));
     $datacetak['anggota3']=$this->m_laporan->selecttimpnyanggota3($this->input->post('idpengadaan'));
     $datacetak['anggota4']=$this->m_laporan->selecttimpnyanggota4($this->input->post('idpengadaan'));
    
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
     $datacetak['listpeng']=$this->m_laporan->detpengbyid($this->input->post('idpengadaan'));    
     $d=$this->m_laporan->selectpengbyid($this->input->post('idpengadaan'))->row();
     $datacetak['namapejpeng']=$d->pgd_nama_pejpeng;
     $datacetak['tgl']=$this->input->post('tgldkh');
     $datacetak['perihal']=$d->pgd_perihal;
     $datacetak['pgd_dgn_pajak']=$d->pgd_dgn_pajak;
     $dsrt ['dsrt_jenis_surat']=3;
     $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
     $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');
         $dknt0['dknt_idkonten']=3;
         $dknt0['dknt_isi']= $this->input->post('tgldkh');
         
         $tempnum=$this->m_laporan->selectdetsurat('3',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('3',$this->input->post('idpengadaan'), $dsrt);
         $i=0;   
            while ($i<1){
                $this->m_laporan->updatedknt(${"dknt" . $i}['dknt_idkonten'],$tempnum->dsrt_id, ${"dknt" . $i});
                $i++;
            }

         }else {
         $dknt= $this->m_laporan->insertdsrt($dsrt);
         $i=0;   
            while ($i<1){
                ${"dknt" . $i}['dknt_detailsurat']=$dknt;
                $this->m_laporan->insertdknt(${"dknt" . $i});
                $i++;
            }
         }
         
         $this->load->view('fpdf/c_dftr_harga',$datacetak); 
     }
    
     public function cetakspektek(){
         
            $datacetak['listpeng']=$this->m_laporan->detpengbyid($this->input->post('idpengadaan'));    
            $d=$this->m_laporan->selectpengbyid($this->input->post('idpengadaan'))->row();
            $datacetak['namappk']=$d->pgd_nama_ppk;
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
            $this->load->view('fpdf/cetak_ldp_konsultan', $datacetak); 
     }
      public function cetakUndangan(){
            $datacetak['d']=$this->m_laporan->selectPengSUP($this->input->post('idpengadaan'))->row();
            $datacetak['nomor']=$this->input->post('no_undangan');
            $datacetak['lampiran']=$this->input->post('lampiran');

            $datacetak['tgl']=$this->input->post('tgludg');
            $dsrt ['dsrt_jenis_surat']=6;
            $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
            $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');
                   $dknt0['dknt_idkonten']=9;
                   $dknt0['dknt_isi']=$this->input->post('no_undangan');
                   $dknt1['dknt_isi']= $this->input->post('tgludg');
                   $dknt1['dknt_idkonten']=3;
                   $dknt2['dknt_isi']= $this->input->post('lampiran');
                   $dknt2['dknt_idkonten']=4;

         $tempnum=$this->m_laporan->selectdetsurat('6',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('6',$this->input->post('idpengadaan'), $dsrt);
         $i=0;   
            while ($i<3){
                $this->m_laporan->updatedknt(${"dknt" . $i}['dknt_idkonten'],$tempnum->dsrt_id, ${"dknt" . $i});
                $i++;
            }
         }else {
         $dknt= $this->m_laporan->insertdsrt($dsrt);
         $i=0;   
            while ($i<3){
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
        $data['mode1'] = '';
            $BAP= $this->m_laporan->selectdetsurat('7',$id)->row();
            if($BAP){
            $data['mode1'] = 'edit';
            $data['kontensuratnoBAP']= $this->m_laporan->selectkonten($id,'9','7'); 
            $data['kontensurattglBAP']= $this->m_laporan->selectkonten($id,'3','7');
            }
            $BAEA= $this->m_laporan->selectdetsurat('8',$id)->row();
            $data['mode2'] = '';
            if($BAEA){
            $data['mode2'] = 'edit';
            $data['kontensuratnoBAEA']= $this->m_laporan->selectkonten($id,'9','8'); 
            $data['kontensurattglBAEA']= $this->m_laporan->selectkonten($id,'3','8');
            }
            $BAEH= $this->m_laporan->selectdetsurat('9',$id)->row();
            $data['mode3'] = '';
            if($BAEH){
            $data['mode3'] = 'edit';
            $data['kontensuratnoBAEH']= $this->m_laporan->selectkonten($id,'9','9'); 
            $data['kontensurattglBAEH']= $this->m_laporan->selectkonten($id,'3','9');
            }
            $BAET= $this->m_laporan->selectdetsurat('10',$id)->row();
            $data['mode4'] = '';
            if($BAET){
            $data['mode4'] = 'edit';
            $data['kontensuratnoBAET']= $this->m_laporan->selectkonten($id,'9','10'); 
            $data['kontensurattglBAET']= $this->m_laporan->selectkonten($id,'3','10');
            }
            $BAEK= $this->m_laporan->selectdetsurat('11',$id)->row();
            $data['mode5'] = '';
            if($BAEK){
            $data['mode5'] = 'edit';
            $data['kontensuratnoBAEK']= $this->m_laporan->selectkonten($id,'9','11'); 
            $data['kontensurattglBAEK']= $this->m_laporan->selectkonten($id,'3','11');
            }
        
        $this->load->view('layout',$data); 
        
     }
     
      public function cetakBAEA(){
      $datacetak['noevadministrasi']=$this->input->post('no_BA_evadministrasi');  
      $datacetak['tglpembukaan']=$this->input->post('tglBAEA');  
      $datacetak['d']=$this->m_laporan->selectPengSUP($this->input->post('idpengadaan'))->row();
      
        $dsrt ['dsrt_jenis_surat']=8;
         $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
         $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');

        //tangga
         $dknt0['dknt_idkonten']=3;
         $dknt0['dknt_isi']=$this->input->post('tglBAEA'); 
        //nomor
         $dknt1['dknt_idkonten']=9;
         $dknt1['dknt_isi']=$this->input->post('no_BA_evadministrasi');
         
         $tempnum=$this->m_laporan->selectdetsurat('8',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('8',$this->input->post('idpengadaan'), $dsrt);
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
      
      
          $this->load->view('fpdf/c_berita_acara_evaluasiadm', $datacetak); 
      }
  

      public function cetakBAEH(){
      $datacetak['noevaharga']=$this->input->post('no_BA_evaharga');
      $datacetak['tglKudg']=$this->input->post('tglBAEH');  
      $datacetak['d']=$this->m_laporan->selectPengSUP($this->input->post('idpengadaan'))->row();
      
         $dsrt ['dsrt_jenis_surat']=9;
         $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
         $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');

        //tangga
         $dknt0['dknt_idkonten']=3;
         $dknt0['dknt_isi']=$this->input->post('tglBAEH'); 
        //nomor
         $dknt1['dknt_idkonten']=9;
         $dknt1['dknt_isi']=$this->input->post('no_BA_evaharga');
         
         $tempnum=$this->m_laporan->selectdetsurat('9',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('9',$this->input->post('idpengadaan'), $dsrt);
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

          $this->load->view('fpdf/c_berita_acara_evaluasiharga', $datacetak); 
      }      
 
 public function cetakBAET(){
      $datacetak['noevateknis']=$this->input->post('no_BA_evateknis');
      $datacetak['tglKudg']=$this->input->post('tglBAET');  
      $datacetak['d']=$this->m_laporan->selectPengSUP($this->input->post('idpengadaan'))->row();
      
         $dsrt ['dsrt_jenis_surat']=10;
         $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
         $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');

        //tangga
         $dknt0['dknt_idkonten']=3;
         $dknt0['dknt_isi']=$this->input->post('tglBAET'); 
        //nomor
         $dknt1['dknt_idkonten']=9;
         $dknt1['dknt_isi']=$this->input->post('no_BA_evateknis');
         
         $tempnum=$this->m_laporan->selectdetsurat('10',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('10',$this->input->post('idpengadaan'), $dsrt);
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

          $this->load->view('fpdf/c_berita_acara_evaluasitek', $datacetak); 
      }            

 public function cetakBAEK(){
      $datacetak['noevakualifikasi']=$this->input->post('no_BA_evakualifikasi');
      $datacetak['tglKudg']=$this->input->post('tglBAEK');  
      $datacetak['d']=$this->m_laporan->selectPengSUP($this->input->post('idpengadaan'))->row();
      $datacetak['listsiz']=$this->m_laporan->selectsizbypgd($this->input->post('idpengadaan'));
      
         $dsrt ['dsrt_jenis_surat']=11;
         $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
         $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');

        //tangga
         $dknt0['dknt_idkonten']=3;
         $dknt0['dknt_isi']=$this->input->post('tglBAEK'); 
        //nomor
         $dknt1['dknt_idkonten']=9;
         $dknt1['dknt_isi']=$this->input->post('no_BA_evakualifikasi');
         
         $tempnum=$this->m_laporan->selectdetsurat('11',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('11',$this->input->post('idpengadaan'), $dsrt);
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

          $this->load->view('fpdf/c_berita_acara_evaluasikualifikasi', $datacetak); 
      }    
      
      public function cetakBAP(){

            $datacetak['noundangan']=$this->m_laporan->selectNoUndangan($this->input->post('idpengadaan'));
            $datacetak['nomor']=$this->input->post('no_BA_pemasukkan');
            $datacetak['tglundangan']=$this->m_laporan->selecttglUndangan($this->input->post('idpengadaan'));
            $datacetak['tglpembukaan']=$this->input->post('tglBAP');  
             $datacetak['d']=$this->m_laporan->selectPengSUP($this->input->post('idpengadaan'))->row();
          
         $dsrt ['dsrt_jenis_surat']=7;
         $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
         $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');

        //tangga
         $dknt0['dknt_idkonten']=3;
         $dknt0['dknt_isi']=$this->input->post('tglBAP'); 
        //nomor
         $dknt1['dknt_idkonten']=9;
         $dknt1['dknt_isi']=$this->input->post('no_BA_pemasukkan');
         
         $tempnum=$this->m_laporan->selectdetsurat('7',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('7',$this->input->post('idpengadaan'), $dsrt);
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
   
            $this->load->view('fpdf/c_berita_acara', $datacetak); 
     }  
     
     public function LaporanFix($id){
        $data['idpengadaan'] = $id;
        $data['dataPengadaan']= $this->m_pengadaan->selectById($id);
        $data['content'] = 'f_laporanfix';
        $data['title']= 'Laporan Fix';
            $data['mode1'] = '';
            $BAH= $this->m_laporan->selectdetsurat('13',$id)->row();
            if($BAH){
            $data['mode1'] = 'edit';
            $data['kontensuratnoBAH']= $this->m_laporan->selectkonten($id,'9','13'); 
            $data['kontensurattglBAH']= $this->m_laporan->selectkonten($id,'3','13');
            }
            $SP= $this->m_laporan->selectdetsurat('14',$id)->row();
            $data['mode2'] = '';
            if($SP){
            $data['mode2'] = 'edit';
            $data['kontensuratnoSP']= $this->m_laporan->selectkonten($id,'9','14'); 
            $data['kontensurattglSP']= $this->m_laporan->selectkonten($id,'3','14');
            }
            $SPeng= $this->m_laporan->selectdetsurat('15',$id)->row();
            $data['mode3'] = '';
            if($SPeng){
            $data['mode3'] = 'edit';
            $data['kontensuratnoSPeng']= $this->m_laporan->selectkonten($id,'9','15'); 
            $data['kontensurattglSPeng']= $this->m_laporan->selectkonten($id,'3','15');
            }
            $BAK= $this->m_laporan->selectdetsurat('12',$id)->row();
            $data['mode4'] = '';
            if($BAK){
            $data['mode4'] = 'edit';
            $data['kontensuratnoBAK']= $this->m_laporan->selectkonten($id,'9','12'); 
            $data['kontensurattglBAK']= $this->m_laporan->selectkonten($id,'3','12');
            $data['kontensuratnoSKP']= $this->m_laporan->selectkonten($id,'14','12'); 
            $data['kontensurattglSKP']= $this->m_laporan->selectkonten($id,'15','12');
            }
        
        
        $this->load->view('layout',$data); 
        
     }
      public function cetakBAklarifikasi(){
            $datacetak['d']=$this->m_laporan->selectPengSUP($this->input->post('idpengadaan'))->row();
         // $datacetak['noundangan']=$this->input->post('no_undangan');
            $datacetak['nomor']=$this->input->post('no_BA_klarifikasi');
            $datacetak['nokepkuas']=$this->input->post('no_kepkuas');
            $datacetak['tglkepkuas']=$this->input->post('tglkepkuas');
            $datacetak['tglklarifikasi']=$this->input->post('tglBAK');
           // $datacetak['pwk']=$this->input->post('nama_perwakilan');
            
            $datacetak['listpeng']=$this->m_laporan->detpengbyid($this->input->post('idpengadaan'));
         $dsrt ['dsrt_jenis_surat']=12;
         $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
         $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');
         
                   $dknt0['dknt_idkonten']=9;
                   $dknt0['dknt_isi']=$this->input->post('no_BA_klarifikasi');
                   $dknt1['dknt_idkonten']=3;
                   $dknt1['dknt_isi']=$this->input->post('tglBAK');
                   $dknt2['dknt_idkonten']=14;
                   $dknt2['dknt_isi']=$this->input->post('no_kepkuas');
                   $dknt3['dknt_idkonten']=15;
                   $dknt3['dknt_isi']=$this->input->post('tglkepkuas');
                  
         $tempnum=$this->m_laporan->selectdetsurat('12',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('12',$this->input->post('idpengadaan'), $dsrt);
         $i=0;   
            while ($i<4){
                $this->m_laporan->updatedknt(${"dknt" . $i}['dknt_idkonten'],$tempnum->dsrt_id, ${"dknt" . $i});
                $i++;
            }
         }else {
         $dknt= $this->m_laporan->insertdsrt($dsrt);
         $i=0;   
            while ($i<4){
                ${"dknt".$i}['dknt_detailsurat']=$dknt;
                $this->m_laporan->insertdknt(${"dknt".$i});
                $i++;
            }
         }     
            $this->load->view('fpdf/c_BA_klarifkasi', $datacetak); 
      }

public function cetakBAH(){
            $datacetak['d']=$this->m_laporan->selectPengSUP($this->input->post('idpengadaan'))->row();
            $datacetak['nomorBAH']=$this->input->post('no_BA_hasil');
            $datacetak['tanggalH']=$this->input->post('tglBAH');
            $datacetak['noBAPemasukan']=$this->m_laporan->selectkonten($this->input->post('idpengadaan'),'9','7');  
            $datacetak['tglBAP']= $this->m_laporan->selectkonten($this->input->post('idpengadaan'),'3','7');
            
            
         $dsrt ['dsrt_jenis_surat']=13;
         $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
         $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');

        //tangga
         $dknt0['dknt_idkonten']=3;
         $dknt0['dknt_isi']=$this->input->post('tglBAH'); 
        //nomor
         $dknt1['dknt_idkonten']=9;
         $dknt1['dknt_isi']=$this->input->post('no_BA_hasil');
         
         $tempnum=$this->m_laporan->selectdetsurat('13',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('13',$this->input->post('idpengadaan'), $dsrt);
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
   
            $this->load->view('fpdf/c_BA_hasil_pengadaan', $datacetak); 
     }

public function cetakSP(){
            $datacetak['d']=$this->m_laporan->selectPengSUP($this->input->post('idpengadaan'))->row();
            $datacetak['nopet']=$this->input->post('no_penetapan');
            $datacetak['tanggalSP']=$this->input->post('tglSP');
            $datacetak['nomorBAH']= $this->m_laporan->selectkonten($this->input->post('idpengadaan'),'9','13');
            
            
         $dsrt ['dsrt_jenis_surat']=14;
         $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
         $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');
        //tangga
         $dknt0['dknt_idkonten']=3;
         $dknt0['dknt_isi']=$this->input->post('tglSP'); 
        //nomor
         $dknt1['dknt_idkonten']=9;
         $dknt1['dknt_isi']=$this->input->post('no_penetapan');
         
         $tempnum=$this->m_laporan->selectdetsurat('14',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('14',$this->input->post('idpengadaan'), $dsrt);
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
   
            $this->load->view('fpdf/c_penetapan', $datacetak); 
     }
     
public function cetakSPeng(){
            $datacetak['d']=$this->m_laporan->selectPengSUP($this->input->post('idpengadaan'))->row();
            $datacetak['nopeng']=$this->input->post('no_peng');
            $datacetak['tanggalSPeng']=$this->input->post('tglSPeng');
            $datacetak['nopet']= $this->m_laporan->selectkonten($this->input->post('idpengadaan'),'9','14'); 
            $datacetak['tglSP']= $this->m_laporan->selectkonten($this->input->post('idpengadaan'),'3','14');
           
            
         $dsrt ['dsrt_jenis_surat']=15;
         $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
         $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');
        //tangga
         $dknt0['dknt_idkonten']=3;
         $dknt0['dknt_isi']=$this->input->post('tglSPeng'); 
        //nomor
         $dknt1['dknt_idkonten']=9;
         $dknt1['dknt_isi']=$this->input->post('no_peng');
         
         $tempnum=$this->m_laporan->selectdetsurat('15',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('15',$this->input->post('idpengadaan'), $dsrt);
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
   
            $this->load->view('fpdf/c_pengumuman', $datacetak); 
     }
     
      
 public function cetakBAHasilPenetapanPengumuman(){
            
            
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
     
 public function Laporanakhir($id){
        $data['idpengadaan'] = $id;
        $data['dataPengadaan']= $this->m_pengadaan->selectById($id);
        $data['content'] = 'f_laporanakhir';
        $data['title']= 'Laporan Akhir';
        $data['d']=$this->m_laporan->selectPengSUP($id)->row();
        $data['dipalist']=$this->m_laporan->selectdipa();
            $data['mode1'] = '';
            $SPK= $this->m_laporan->selectdetsurat('18',$id)->row();
            if($SPK){
            $data['mode1'] = 'edit';
            $data['kontensuratnoSPK']= $this->m_laporan->selectkonten($id,'9','18'); 
            $data['kontensurattglSPK']= $this->m_laporan->selectkonten($id,'3','18');
            $data['kontensurattglawal']= $this->m_laporan->selectkonten($id,'10','18');
            $data['kontensurattglakhir']= $this->m_laporan->selectkonten($id,'11','18');
            $data['kontendipa']= $this->m_laporan->selectkonten($id,'12','18');
            }
            $SPMK= $this->m_laporan->selectdetsurat('19',$id)->row();
            $data['mode2'] = '';
            if($SPMK){
            $data['mode2'] = 'edit';
            $data['kontensuratnoSPMK']= $this->m_laporan->selectkonten($id,'9','19'); 
            $data['kontensurattglSPMK']= $this->m_laporan->selectkonten($id,'3','19');
            }
        $this->load->view('layout',$data);         
     } 
     function cetakSPK(){
         $datacetak['d']=$this->m_laporan->selectPengSUP($this->input->post('idpengadaan'))->row();
         $datacetak['nospk']=$this->input->post('nospk');
         $datacetak['tglspk']=$this->input->post('tglspk');
         $datacetak['noundangan']= $this->m_laporan->selectkonten($this->input->post('idpengadaan'),'9','6'); 
         $datacetak['tglundangan']= $this->m_laporan->selectkonten($this->input->post('idpengadaan'),'3','6');
         $datacetak['nohasilP']= $this->m_laporan->selectkonten($this->input->post('idpengadaan'),'9','13'); 
         $datacetak['tglhasilP']= $this->m_laporan->selectkonten($this->input->post('idpengadaan'),'3','13');
         $datacetak['dipa']=$this->m_laporan->pilihdipa($this->input->post('dipa_nomor'));
         $datacetak['tglawal']=$this->input->post('tglawal');
         $datacetak['tglakhir']=$this->input->post('tglakhir');
            $datacetak['listpeng']=$this->m_laporan->detpengbyid($this->input->post('idpengadaan'));  
         
         $dsrt ['dsrt_jenis_surat']=18;
         $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
         $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');
        //tanggal
         $dknt0['dknt_idkonten']=3;
         $dknt0['dknt_isi']=$this->input->post('tglspk'); 
        //nomor
         $dknt1['dknt_idkonten']=9;
         $dknt1['dknt_isi']=$this->input->post('nospk');
         
         $dknt2['dknt_idkonten']=10;
         $dknt2['dknt_isi']=$this->input->post('tglawal'); 
        
         $dknt3['dknt_idkonten']=11;
         $dknt3['dknt_isi']=$this->input->post('tglakhir'); 
        
         $dknt4['dknt_idkonten']=12;
         $dknt4['dknt_isi']=$this->input->post('dipa_nomor');
         
         $tempnum=$this->m_laporan->selectdetsurat('18',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('18',$this->input->post('idpengadaan'), $dsrt);
         $i=0;   
            while ($i<5){
                $this->m_laporan->updatedknt(${"dknt" . $i}['dknt_idkonten'],$tempnum->dsrt_id, ${"dknt" . $i});
                $i++;
            }
         
         }else {
         $dknt= $this->m_laporan->insertdsrt($dsrt);
         $i=0;   
            while ($i<5){
                ${"dknt" . $i}['dknt_detailsurat']=$dknt;
                $this->m_laporan->insertdknt(${"dknt" . $i});
                $i++;
            }
         }        
         
         $this->load->view('fpdf/c_spk',$datacetak);
     }
     function cetakSPMK(){
         $datacetak['d']=$this->m_laporan->selectPengSUP($this->input->post('idpengadaan'))->row();
         $datacetak['nospmk']=$this->input->post('nospmk');
         $datacetak['tglspmk']=$this->input->post('tglspmk');
         $datacetak['nospk']= $this->m_laporan->selectkonten($this->input->post('idpengadaan'),'9','18'); 
         $datacetak['tglspk']= $this->m_laporan->selectkonten($this->input->post('idpengadaan'),'3','18');
         $datacetak['tglmulai']= $this->m_laporan->selectkonten($this->input->post('idpengadaan'),'10','18');
         $datacetak['tglakhir']= $this->m_laporan->selectkonten($this->input->post('idpengadaan'),'11','18');
      
         $dsrt ['dsrt_jenis_surat']=19;
         $dsrt ['dsrt_pencetak']=$this->session->userdata('id_user');
         $dsrt ['dsrt_idpengadaan']= $this->input->post('idpengadaan');
        //tangga
         $dknt0['dknt_idkonten']=3;
         $dknt0['dknt_isi']=$this->input->post('tglspmk'); 
        //nomor
         $dknt1['dknt_idkonten']=9;
         $dknt1['dknt_isi']=$this->input->post('nospmk');
         
         $tempnum=$this->m_laporan->selectdetsurat('19',$this->input->post('idpengadaan'))->row();
         $count=count($tempnum);
         if($count>0){
         $this->m_laporan->updatedsrt('19',$this->input->post('idpengadaan'), $dsrt);
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
         
         $this->load->view('fpdf/c_spmk',$datacetak);
     }
     
     function test(){
        $data['content'] = 'f_pengadaan_konsultan_personel';
        $this->load->view('layout',$data);
    }
}
 