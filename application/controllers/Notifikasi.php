<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notifikasi extends CI_Controller{
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
            $this->load->model('m_notif');
            $this->load->model('m_user');
        }
    }
    
    public function index(){
        $data['title'] = "Notifikasi";
        $data['content'] = "l_notif";
        $this->load->view('layout', $data);
    }
    
    public function getNotification($last){
        $user = $this->session->userdata('id_user');
        $respon = $this->m_notif->selectByUser($user, $last)->result();
        echo json_encode($respon);
    }
    
    public function getOldNotification($last){
        $user = $this->session->userdata('id_user');
        $respon = $this->m_notif->selectByUserOld($user, $last)->result();
        echo json_encode($respon);
    }
    
    public function updateCount(){
        $user = $this->session->userdata('id_user');
        $respon = $this->m_user->updateNotifZero($user);
        echo $respon;
    }
    
    public function countNotif(){
        $user = $this->session->userdata('id_user');
        $respon = $this->m_notif->totalUnread($user)->row()->usr_total_read;
        echo $respon;
    }
    
    public function ajaxTable(){
        $user = $this->session->userdata('id_user');
        $result = $this->m_notif->getAjaxTable($user);
        echo $result;
    }
    
    public function goto_notif($id){
        $notif = $this->m_notif->selectById($id)->row();
        $data['ntf_read_status'] = 1;
        $this->m_notif->update($id, $data);
        redirect(base_url().$notif->ntf_link);
    }
    
    public function deleteByUser(){
        $user = $this->session->userdata('id_user');
        $this->m_notif->deleteByUser($user);
    }
}
?>