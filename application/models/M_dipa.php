<?php

class M_dipa extends CI_Model{
    function __construct(){
        parent::__construct();
        	$this->load->library('Datatables');
    }
    
    function insert($data){
        $this->db->insert('t_dipa', $data);
    }
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('t_dipa');
        $this->db->where('dipa_deleted', '0');
        $this->db->order_by('dipa_id', 'desc');
        return $this->db->get();
    }
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_dipa');
        $this->db->where('dipa_id', $id);
        return $this->db->get();
    }
  
    function ajaxProcess(){
		$this->datatables
		->select('dipa_id, dipa_nomor, dipa_nomorsk, dipa_tanggal ')
		->from('t_dipa')    
                ->where('dipa_deleted', '0')
		->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-danger btn-sm delete btn-aksi' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Anda yakin akan menghapus ini?' href='Dipa/delete_dipa/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Hapus</a>".
			"<a class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Edit' href='Dipa/edit_dipa/$1'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah</a>".
			"</div>".
			"</form>".
		"",'dipa_id');
		return $this->datatables->generate();
	}
    function update($id, $data){
        $this->db->where('dipa_id', $id);
        $this->db->update('t_dipa', $data);
    }
    
    function delete($id){
 	$data['dipa_deleted'] = '1';
        $this->db->where('dipa_id', $id);
        $this->db->update('t_dipa', $data);
    }
    
    
    
}
