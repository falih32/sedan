<?php

class M_user extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->library('Datatables');
    }
     function insert($data){
        $this->db->insert('t_user', $data);
        
    }
    
    function delete($id){
	$data['usr_deleted'] = '1';
        $this->db->where('usr_id', $id);
        $this->db->update('t_user', $data);
    }
    
    function activate($id){
	$data['usr_deleted'] = '0';
        $this->db->where('usr_id', $id);
        $this->db->update('t_user', $data);
    }
	
    // cek keberadaan user di sistem
    function check_user_account($username, $password){
        return $this->db->query("SELECT * FROM t_user "
                . "WHERE usr_username LIKE BINARY ".$this->db->escape($username)." "
                . "AND usr_password LIKE BINARY ".$this->db->escape(md5($password))." "
                . "AND usr_deleted = '0';");
    }
    function selectUserbyPegawai($id){
        return $this->db->query("SELECT * FROM t_user "
                . "WHERE usr_pegawai=".$id." "
                . "AND usr_deleted = '0';");
    }
    // mengambil data user tertentu
    function get_user($id_user){
       $this->db->select('*');
       $this->db->from('t_user');
       $this->db->where('usr_id', $id_user);
       return $this->db->get();
    }
    	
    function check_username($username){
        $this->db
        ->select('*')
        ->from('t_user')
        ->where('usr_username', $username);
        return $this->db->get();
    }
		
    function selectAll(){
       $this->db->select('*');
       $this->db->from('t_user');
       return $this->db->get();
    }
    function selectAllActiveUser(){
       $this->db->select('*');
       $this->db->from('t_user');
       $this->db->where('usr_deleted', '0');
       return $this->db->get();
    }
    
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_user');
        $this->db->where('usr_id', $id);
        return $this->db->get();
    }
	
    function selectByUsername($username){
        $this->db->select('*');
        $this->db->from('t_user');
        $this->db->where('usr_username', $username);
        return $this->db->get();
    }
    
    
    function ajaxProcess(){
        $this->datatables
        ->select('usr_id,usr_pegawai,pgw_nip,usr_username,pgw_nama,usr_email,usr_role')
        ->from('t_user')
        ->where('usr_deleted', '0')
        ->join('t_pegawai', 't_pegawai.pgw_id = t_user.usr_pegawai','left')
        ->edit_column('aksi',"".
                "<form>".
                "<div class='form-group'>".
                "<a class='btn btn-danger btn-sm delete btn-aksi' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Anda yakin akan menghapus user ini?' href='User/deleteUser/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Hapus</a>".
                "<a class='btn btn-warning btn-sm delete btn-aksi' data-toggle='tooltip' data-placement='top' title='Aktifkan' data-confirm='Anda yakin akan membuat user ini tidak aktif?' href='User/deactivate/$1'><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Non-aktifkan</a>".
                "<a class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Edit' href='User/editUser/$1'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah</a>".
                "</div>".
                "</form>".
        "",'usr_id');
        return $this->datatables->generate();
    }
        
        
    function update($id, $data){
        $this->db->where('usr_id', $id);
        $this->db->update('t_user', $data);
    }
    
    function updateNotif($id){
        $this->db->query("UPDATE t_user SET usr_total_read=usr_total_read+1 WHERE usr_id='".$id."'");
    }
    
    function updateNotifZero($id){
        $this->db->query("UPDATE t_user SET usr_total_read=0 WHERE usr_id='".$id."'");
    }
    
    function selectAllPaging($limit=array()){
        $this->db->select('*');
        $this->db->from('t_user');
        $this->db->join('t_role','t_role.rle_id=t_user.usr_role', 'left');
         $this->db->where('usr_deleted', '0');
        $this->db->order_by('usr_id', 'asc');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
}
