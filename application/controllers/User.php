<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{
    
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
            $this->load->model('m_user');
            $this->load->model('m_jabatan');
        }
    }
	
    public function index(){
        $data['content'] = 'l_user';
        $data['title']= 'Daftar user';
        $this->load->view('layout',$data);
    }
	
    public function ajaxProcess(){
        echo $this->m_user->ajaxProcess();
    }
    
    function postVariabel(){
   
        $data['usr_username']           = $this->input->post('usr_username');
        $data['usr_password']           = md5($this->input->post('usr_password'));
        $data['usr_pegawai']            = $this->input->post('usr_pegawai');
        $data['usr_role']               = $this->input->post('usr_role');   
        $data['usr_email']              = $this->input->post('usr_email');	
        return $data;
    }
    
    function postVariabelEdit(){
   
        $data['usr_username']           = $this->input->post('usr_username');
        //$data['usr_password']           = md5($this->input->post('usr_password'));
        $data['usr_pegawai']               = $this->input->post('usr_pegawai');
        $data['usr_role']               = $this->input->post('usr_role');   
        $data['usr_email']              = $this->input->post('usr_email');	
        return $data;
    }
    
    public function viewList(){
        $data['content'] = 'l_user';
        $data['title'] = 'Daftar User';
        $data['userlist'] = $this->m_user->getAllUser();
        $this->load->view('layout', $data);
    }
    public function checkUserAjax(){
        $un = $this->input->get('usr_username');
        $chk = $this->m_user->check_username($un);
        if ($chk->num_rows() == "0"){			
            return json_encode($chk);
        }
        else{
            header('HTTP/1.1 410 Username sudah terdapat pada sistem');
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('message' => 'ERROR', 'code' => 410)));
        }
    }
    public function addUser($id_pgw){
       $this->limitRole(array(1));    
        $idpgw=$id_pgw;
        $cekpegawai=count($this->m_user->selectUserbyPegawai($idpgw)->row());
        if($cekpegawai>0) {
          $this->session->set_flashdata('message', array('msg' => 'Pegawai Sudah menjadi User','class' => 'danger'));  
          redirect(site_url('User'));
        }
        else {    
            $data['pegawai']=$this->m_pegawai->selectById($idpgw)->row();
            $data['content'] = 'f_user';
            $data['title'] = 'Tambah Pengguna';
            $data['mode']= 'add';
            $this->load->view('layout', $data);
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
    public function proses_addUser(){     
        $data = $this->postVariabel();
        $check = $this->m_user->check_username($data['usr_username']);
        if($check->num_rows() == "0"){
            $this->m_user->insert($data);
            $this->session->set_flashdata('message', array('msg' => 'Data berhasil disimpan','class' => 'success'));
        }
        else{
            $this->session->set_flashdata('message', array('msg' => 'Username yang anda pilih sudah terdapat pada sistem','class' => 'danger'));
        }
        redirect(site_url('User'));
        
    }
    
    public function editUser($id){
            $data['userlist'] = $this->m_user->selectById($id)->row();
            $data['id'] = $id;
            $data['mode'] = 'edit';
            $data['content'] = 'f_user';
            $data['title'] = 'Edit Informasi user ';
            //$data['jbt']= $this->m_user->selectById($id)->row()->usr_pegawai;
            if($data['userlist']->usr_deleted == '0'){
                $this->load->view('layout', $data);
            }else{
                redirect(site_url('Sidoel404'));
            }
        
    }
    
    public function proses_editUser(){
        $id_edit=$this->input->post('id');
            $data = $this->postVariabelEdit();
            //$jbt = $this->m_user->selectById($id_edit)->row()->pgw_jabatan;
                $this->m_user->update($id_edit, $data);
                $this->session->set_flashdata('message', array('msg' => 'Data berhasil disimpan','class' => 'success'));
        redirect(site_url('User'));
    }
 
      public function changePassword($id){
        $data['id'] = $id;
        if($this->session->userdata('id_user') == $id || $this->session->userdata('id_role') == '1'){
            $data['userData'] = $this->m_user->selectById($id)->row();
            $data['title'] = 'Ubah Password';
            $data['content'] = 'password_change';
            $this->load->view('layout', $data);
        }
        else{
            $this->session->set_flashdata('message', array('msg' => 'Anda <strong>tidak memiliki akses</strong> ke fitur yang anda pilih','class' => 'danger'));
            redirect(site_url('User'));
        }
    }

    public function process_change_password(){
        $id_edit=$this->input->post('usr_id');
        if($this->session->userdata('id_user') == $id_edit || $this->session->userdata('id_role') == '1'){
            $old_pass = md5($this->input->post('old_pass'));
            $check_password = $this->m_user->selectById($id_edit)->row()->usr_password;
            if($old_pass  == $check_password){
                $data['usr_password'] = md5($this->input->post('new_pass'));
                $this->m_user->update($id_edit, $data);
                $this->writeLog('User','Update');
                $this->session->set_flashdata('message', array('msg' => 'Data berhasil disimpan','class' => 'success'));
            }
            else{
                $this->session->set_flashdata('message', array('msg' => 'Password yang anda masukkan tidak sesuai','class' => 'danger'));
            }
        }
        else{
                $this->session->set_flashdata('message', array('msg' => 'Anda <strong>tidak memiliki akses</strong> ke fitur yang anda pilih','class' => 'danger'));
        }
        redirect(site_url('User'));
    }
  public function deleteUser($id){
        $this->m_user->delete($id);
        $this->session->set_flashdata('message', array('msg' => 'user telah dihapus','class' => 'success'));
        redirect('User');
    }
}
?>