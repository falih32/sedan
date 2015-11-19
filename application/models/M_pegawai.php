<?php

class M_pegawai extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->library('Datatables');
    }
     function insert($data){
        $this->db->insert('t_pegawai', $data);
    }
    
    function delete($id){
	$data['pgw_deleted'] = '1';
        $this->db->where('pgw_id', $id);
        $this->db->update('t_pegawai', $data);
    }   
    // mengambil data user tertentu
    function get_pegawai($id_pegawai){
       $this->db->select('*');
       $this->db->from('t_pegawai');
       $this->db->where('pgw_id', $id_pegawai);
       return $this->db->get();
    }
    			
    function selectAll(){
       $this->db->select('*');
       $this->db->from('t_pegawai');
       return $this->db->get();
    }
    
    function selectAllWithJabatan(){
       $this->db->select('t_pegawai.*, jbt_id, jbt_nama');
       $this->db->from('t_pegawai');
       $this->db->join('t_jabatan', 't_jabatan.jbt_id = t_pegawai.pgw_jabatan','left');
       $this->db->where('pgw_deleted', '0'); 
       return $this->db->get();
    }
    
    function selectAllActivePegawai(){
       $this->db->select('*');
       $this->db->from('t_pegawai');
       $this->db->where('pgw_deleted', '0');
       return $this->db->get();
    }
    
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_pegawai');
        $this->db->where('pgw_id', $id);
        return $this->db->get();
    }
	
   
    function ajaxProcess(){
        $this->datatables
        ->select('pgw_id,pgw_nama,pgw_nip,jbt_nama,pgw_telp')
        ->from('t_pegawai')
        ->where('pgw_deleted', '0')
    ->join('t_jabatan', 't_jabatan.jbt_id = t_pegawai.pgw_jabatan','left')
        ->edit_column('aksi',"".
                "<form>".
                "<div class='form-group'>".
                "<a class='btn btn-danger btn-sm delete btn-aksi' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Anda yakin akan menghapus pegawai ini?' href='Pegawai/deletePegawai/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Hapus</a>".
                "<a class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Tambah User' href='User/addUser/$1'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Tambah User</a>".
                "<a class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Edit' href='Pegawai/editPegawai/$1'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah</a>".
                "</div>".
                "</form>".
        "",'pgw_id');
        return $this->datatables->generate();
    }
        
        
    function update($id, $data){
        $this->db->where('pgw_id', $id);
        $this->db->update('t_pegawai', $data);
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
