<?php

class M_suratizin extends CI_Model{
    function __construct(){
        parent::__construct();
        	$this->load->library('Datatables');
    }
    
    function insert($data){
        $this->db->insert('t_suratizin', $data);
    }
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('t_suratizin');
        $this->db->where('siz_deleted', '0');
        $this->db->order_by('siz_id', 'desc');
        return $this->db->get();
    }
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_suratizin');
        $this->db->where('siz_id', $id);
        return $this->db->get();
    }
  
    function ajaxProcess(){
		$this->datatables
		->select('siz_id, siz_nama')
		->from('t_suratizin')    
                ->where('siz_deleted', '0')
		->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-danger btn-sm delete btn-aksi' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Anda yakin akan menghapus ini?' href='Jabatan/delete_jabatan/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Hapus</a>".
			"<a class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Edit' href='Jabatan/edit_jabatan/$1'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah</a>".
			"</div>".
			"</form>".
		"",'siz_id');
		return $this->datatables->generate();
	}
    function update($id, $data){
        $this->db->where('siz_id', $id);
        $this->db->update('t_suratizin', $data);
    }
    
    function delete($id){
 	$data['siz_deleted'] = '1';
        $this->db->where('siz_id', $id);
        $this->db->update('t_suratizin', $data);
    }
    
    // function yang digunakan oleh paginationsample
    function selectAllPaging($limit=array()){
        $this->db->select('*');
        $this->db->from('t_suratizin');
        $this->db->order_by('siz_id', 'desc');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
	
}
