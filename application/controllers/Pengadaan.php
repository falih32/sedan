<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengadaan extends CI_Controller{
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
	
    function writeLog($tabel, $aksi){
        $data['log_user'] = $this->session->userdata('id_user');
        $data['log_nama_tabel'] = $tabel;
        $data['log_aksi'] = $aksi;
        $this->m_log->insert($data);
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
    
    public function index(){
//        $level = $this->session->userdata('id_level');
//        if($level != 1){$this->limitRole(array(1, 2, 3));}
        $data['content'] = 'l_pengadaan';
        $data['title']= 'Daftar Pengadaan';
        $this->load->view('layout',$data);
    }
		
    public function ajaxProcess(){
        $min=$this->input->post('min');
        $max=$this->input->post('max');
        if($min == '') $min = '0000-00-00';
        if($max == '') $max = '9999-12-31';
        $result = $this->m_pengadaan->ajaxProcess($min,$max);
        echo $result;
    }
    
     public function add_pengadaan(){
        $data['content'] = 'f_pengadaan';
        $data['title']= 'Tambah Pengadaan'; 
        $data['anggaranList']= $this->M_anggaran->selectAll()->result();
        $data['supplierList']= $this->M_supplier->selectAll()->result();
        $data['pegawaiList']= $this->M_pegawai->selectAllWithJabatan()->result();
        $data['suratList']= $this->M_suratizin->selectAll()->result();
        $this->load->view('layout',$data);
    }
  	
    public function prosesInputAnggaran(){
        $data['ang_kode']               = $this->input->post('ang_kode1');
        $data['ang_nama']                = $this->input->post('ang_name');
        
        $kode = trim($data['ang_kode'],' ');
        $nama = trim($data['ang_nama'],' ');
        
        try {
            if($kode != '' && $nama != ''){
                $count = count($this->M_anggaran->selectById($data['ang_kode'])->row());
                echo $count;
                if($count > 0){
                    echo "duplicate";
                }else{
                    $this->M_anggaran->insert($data);
                    echo "success";
                }
            }else{
                echo "empty";
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
	
    public function getAllUnitTujuan(){       
        return $this->m_unit_tujuan->selectAll()->result();
    }
    
    public function getAllJenisSurat(){
        return $this->m_jenis_smasuk->selectAll()->result();
    }
    
    public function getAllTingkatAman(){
        return $this->m_tingkat_aman->selectAll()->result();
    }
    
    public function getAllSifat(){
        return $this->m_sifat->selectAll()->result();
    }
    
    function postVariabel(){
        $data['sms_nomor_surat']        = $this->input->post('sms_nomor_surat');
        $data['sms_tgl_srt']            = $this->input->post('sms_tgl_srt');
        $data['sms_tgl_srt_diterima']   = $this->input->post('sms_tgl_srt_diterima');
        $data['sms_tgl_srt_dtlanjut']   = $this->input->post('sms_tgl_srt_dtlanjut');
        $data['sms_tenggat_wkt']        = $this->input->post('sms_tenggat_wkt');
        $data['sms_perihal']            = $this->input->post('sms_perihal');
        $data['sms_jenis_surat']        = $this->input->post('sms_jenis_surat');
        $data['sms_tkt_aman']           = $this->input->post('sms_tkt_aman');
        $data['sms_sifat']              = $this->input->post('sms_sifat');
        $data['sms_no_agenda']          = $this->input->post('sms_no_agenda');
        $data['sms_unit_tujuan']        = $this->input->post('sms_unit_tujuan');
        $data['sms_keterangan']         = $this->input->post('sms_keterangan');
        $data['sms_edited_by']          = $this->session->userdata('id_user');
        $data['sms_status_terkirim']    = $this->input->post('sms_status_terkirim');
        $data['sms_file']               = $this->input->post('sms_file');
        $data['sms_pengirim']           = $this->input->post('sms_pengirim');
        $data['sms_indek']              = $this->input->post('sms_indek');
        $data['sms_kode']               = $this->input->post('sms_kode');
        $data['sms_lampiran']           = $this->input->post('sms_lampiran');
        return $data;
    }
    
    public function upload_config(){
        $config['upload_path'] = './uploads/surat_masuk';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
        $config['max_size']	= '10000';

        $this->load->library('upload', $config);
	}
     
    public function tambah_surat_masuk(){
        $this->limitRole(array(1,2,3));
        $data['content'] = 'f_suratmasuk';
        $data['title']= 'Daftar surat masuk';          
        $data['jenisList'] = $this->getAllJenisSurat();
        $data['unitList'] = $this->getAllUnitTujuan();
        $data['tingkatList']=$this->getAllTingkatAman();
        $data['sifatList']=$this->getAllSifat();
        $this->load->view('layout',$data);
    }
    public function proses_tambah_smasuk(){  
        $this->limitRole(array(1, 2));    
        $data = $this->postVariabel();
        $this->upload_config();
        if($this->upload->do_upload('sms_file')){
                $updata = $this->upload->data();
                $data['sms_file'] = $updata['file_name'];
                $upload = true;
        }
        
        $this->m_surat_masuk->insert($data);
        if($upload){
               $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
        } else{
             $this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan tanpa ada file yang berhasil diunggah. <br> Jika ingin mengunggah file silahkan gunakan menu Ubah','class' => 'warning'));
        }
        $this->writeLog('Surat Masuk','Create');
        redirect(site_url('SuratMasuk'));
    }
    
    public function detail_surat_masuk($id){
        $this->limitRole(array(1, 2, 3, 4));
        $level = $this->session->userdata('id_level');
        if($level==1){
            $this->m_surat_masuk->setStatusToRead($id);
        }
        $data['dataSurat'] = $this->m_surat_masuk->selectById($id);
        $data['id'] = $id;
        $data['mode'] = 'edit';
        $data['content'] = 'v_suratmasuk';
        $data['title'] = 'Detail surat masuk';
        $data['jenisList'] = $this->getAllJenisSurat();
        $data['tingkatList'] = $this->getAllTingkatAman();
        $data['sifatList'] = $this->getAllSifat();
        $data['unitList'] = $this->getAllUnitTujuan();
        if($data['dataSurat']->sms_deleted == '0'){
            $this->load->view('layout', $data);
        }else{
            redirect(site_url('Sidoel404'));
        }
    }
    
    public function edit_surat_masuk($id){
        $this->limitRole(array(1, 2, 3));
        $data['dataSurat'] = $this->m_surat_masuk->selectByIdEdit($id);
        if($data['dataSurat']->sms_sudah_disposisi == 0 || $this->session->userdata('id_role')<=1){
            $data['id'] = $id;
            $data['mode'] = 'edit';
            $data['content'] = 'f_suratmasuk';
            $data['title'] = 'Edit surat masuk';
            $data['jenisList'] = $this->getAllJenisSurat();
            $data['tingkatList'] = $this->getAllTingkatAman();
            $data['sifatList'] = $this->getAllSifat();
            $data['unitList'] = $this->getAllUnitTujuan();
            if($data['dataSurat']->sms_deleted == '0'){
                $this->load->view('layout', $data);
            }else{
                redirect(site_url('Sidoel404'));
            }
        }
        else{
            $this->session->set_flashdata('message', array('msg' => 'Surat yang sudah didisposisi tidak dapat diubah','class' => 'danger'));
            redirect(site_url('SuratMasuk'));
        }
    }
    
    public function proses_edit_smasuk(){
        $this->limitRole(array(1, 2, 3));
        $data = $this->postVariabel();
        $this->upload_config();
        if($this->upload->do_upload('sms_file')){
                $updata = $this->upload->data();
                $data['sms_file'] = $updata['file_name'];
        }
        $id_edit=$this->input->post('id');
        $this->m_surat_masuk->update($id_edit, $data);
        $this->session->set_flashdata('message', array('msg' => 'Data telah diperbarui','class' => 'success'));
        $this->writeLog('Surat Masuk','Update');
        redirect(site_url('SuratMasuk'));
    }
    
    public function delete_smasuk($id){
        $this->limitRole(array(1, 2));
        $surat = $this->m_surat_masuk->selectById($id);
        if($surat->sms_sudah_disposisi == 0 || $this->session->userdata('id_role')<=1){
            $this->m_surat_masuk->delete($id);
            $this->session->set_flashdata('message', array('msg' => 'Data telah dihapus','class' => 'warning'));
            $this->writeLog('Surat Masuk','Delete');
            redirect('SuratMasuk');
        }
        else{
            $this->session->set_flashdata('message', array('msg' => 'Surat yang sudah didisposisi tidak dapat dihapus','class' => 'danger'));
            redirect(site_url('SuratMasuk'));
        }
    }
	
    public function konfirmasi($id){
        $this->limitRole(array(1, 3));
        $data['sms_confirm_by'] = $this->session->userdata("id_user");
        $data['sms_confirm_status'] = '1';
        $this->m_surat_masuk->update($id, $data);
        $this->sms_konfirmasi($id);
    }
    
    public function sms_konfirmasi($id){
        $surat = $this->m_surat_masuk->selectById($id);
        $sekertaris = $this->m_user->selectById($surat->sms_confirm_by)->row();
        $karo = $this->m_user->selectKaro()->row();
        /*
        $userkey="andhika1988"; // userkey di SMS Notifikasi //

        $passkey="211188"; // passkey di SMS Notifikasi //

        $message='Surat masuk dengan No. surat: '.$surat->sms_nomor_surat.' telah diterima oleh sekretaris. '.base_url().'SuratMasuk/detail_surat_masuk/'.$id;

        $url = "http://reguler.sms-notifikasi.com/apps/smsapi.php";$curlHandle = curl_init();

        curl_setopt($curlHandle, CURLOPT_URL, $url);

        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, "userkey=".$userkey."&passkey=".$passkey."&nohp=".$karo->usr_no_telp.
        "&pesan=".urlencode($message));

        curl_setopt($curlHandle, CURLOPT_HEADER, 0);

        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);

        curl_setopt($curlHandle, CURLOPT_POST, 1);

        $results = curl_exec($curlHandle);

        curl_close($curlHandle);*/
        
        /*$to = $karo->usr_email;
        $message='Surat masuk dengan No. surat: '.$surat->sms_nomor_surat.' telah diterima oleh sekretaris. '.base_url().'SuratMasuk/detail_surat_masuk/'.$id;
        $subject = "Link untuk reset password";
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	// More headers
	$headers .= 'From: <webmaster@sidoel.esy.es>' . "\r\n";
		
	mail($to,$subject,$message,$headers);
		
	$this->session->set_flashdata('message', array('msg' => 'Surat masuk terkonfirmasi dan Kepala Biro telah dinotifikasikan via email','class' => 'warning'));
        */
    }

        public function batal_konfirmasi($id){
        $this->limitRole(array(1, 3));
        $data['sms_confirm_by'] = $this->session->userdata("id_user");
        $data['sms_confirm_status'] = '0';
        $this->m_surat_masuk->update($id, $data);
    }
    
    public function disposisi_cetak($id) {
        $data['suratMasuk']=  $this->m_surat_masuk->selectById($id);
        $data['instruksi'] = $this->m_instruksi->selectAll()->result();
        $data['disposisiInstruksi'] = '';
        $data['unitTerusan'] = $this->m_unit_terusan->selectAll()->result();
        $data['disposisiUnitTerusan'] = '';
        if($data['suratMasuk']->sms_deleted == '0'){
            $this->load->view('v_cetakdisposrmasuk',$data);
        }else{
            redirect(site_url('Sidoel404'));
        }
    }
    
    public function cetak_all($id){
        $disposisiInstruksi = array();
        $unitTerusan = array();
        $subBagian = array();
        $catatan = array();
        $data['disposisiUnitTerusanX'] = array();
        $data['suratMasuk']=  $this->m_surat_masuk->selectById($id);
        $data['instruksi'] = $this->m_instruksi->selectAll()->result();
        $data['unitTerusan'] = $this->m_unit_terusan->selectAll()->result();
        $all = $this->m_surat_masuk->selectTracking($id);
        foreach ($all as $row){
            if($row->din_id){array_push($disposisiInstruksi, $row->din_id_instruksi);}
            if($row->dpt_id){
                array_push($unitTerusan, $row->dpt_id);
                array_push($unitTerusan, $row->dpt_parent);
            }
            if($row->dpt_parent > '0'){array_push($subBagian, $row->dpt_nama);}
            if($row->fds_catatan){array_push($catatan, "<b>".$row->jnama."</b>: ".$row->fds_catatan."<br><sub>(".$row->fds_tgl_disposisi_show.")</sub>");}
            array_push($data['disposisiUnitTerusanX'], $this->m_disposisi_user->selectByDisposisi($row->fds_id)->result());
        }
        $data['disposisiInstruksi'] = array_unique($disposisiInstruksi);
        $data['disposisiUnitTerusan'] = array_unique($unitTerusan);
        $data['subBagian'] = array_unique($subBagian);
        $data['catatan'] = array_unique($catatan);
        //echo print_r($data['disposisiUnitTerusan']);
        if($data['suratMasuk']->sms_deleted == '0'){
            $this->load->view('v_cetaktrack',$data);
        }else{
            redirect(site_url('Sidoel404'));
        }
    }
    
    public function tracking($id){
        $countDispoParent = $this->m_disposisi->countParentBySurat($id)->row()->total;
        if($countDispoParent == 1){
            $dispo = $this->m_disposisi->getDispoParentBySurat($id);
            redirect(site_url('Disposisi/trackingDisposisi')."/".$dispo->fds_id);
        }elseif ($countDispoParent > 1) {
            redirect(site_url('Disposisi/MultiParentsTracking')."/".$id);
        }else{
            $this->session->set_flashdata('message', array('msg' => 'Tidak ada disposisi untuk surat masuk yang anda pilih','class' => 'danger'));
            redirect(site_url('dashboard'));
       }
    }
    
    public function set_status(){
        $surat = $this->input->post('sms_id');
        $data['sms_status'] = $this->input->post('sms_status');
        $this->m_surat_masuk->update($surat, $data);
        redirect(site_url('SuratMasuk').'/detail_surat_masuk/'.$surat);    
    }
    
    /*public function normalize_status(){
        $status = -1;
        $list_surat = $this->m_surat_masuk->selectAll();
        foreach ($list_surat as $row){
            $list_dispo = $this->m_disposisi->selectBySuratParent($row->sms_id)->result();
            $instat = 0;
            $adadispo = 0;
            foreach ($list_dispo as $row2){
                $adadispo = 1;
                $list_dus = $this->m_disposisi_user->selectByDisposisi($row2->fds_id)->result();
                foreach ($list_dus as $row3){
                    if($row3->dus_status != 1){
                       $instat = 1;
                       break;
                    }
                }
            }
            if($adadispo == 1){
                if($instat == 1){$status = 0;}
                else{$status = 1;}
            }else{
                $status = -1;
            }
            $data['sms_status'] = $status;
            $this->m_surat_masuk->update($row->sms_id, $data);
        }
    }*/

    public function scan($namafile){
        $target_dir='C:\sidoel'; 
        chdir($target_dir); 
        $target_file= "upload.exe $namafile surat_masuk"; 
        exit( (shell_exec($target_file)!=NULL?'SUKSES':'GAGAL')); 
    }
    
    public function delete_scan($file){
        //$base = base_url();
        $base = 'sidoel.kkp.go.id/';
        $target = $base.'uploads/surat_masuk/'.$file;
        if(file_exists($target)){
            unlink($target);
        }
    }
    
}
?>