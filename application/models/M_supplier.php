<?php

class M_supplier extends CI_Model{
    function __construct(){
        parent::__construct();
        	$this->load->library('Datatables');
    }
    
    function insert($data){
        $this->db->insert('t_supplier', $data);
    }
    
    function select2All($search){
        
        $search = '%'.$search.'%';
        return $this->db->query("select spl_id as id, spl_nama as 'text' "
                . "From t_supplier "
                . "where spl_deleted = 0 "
                . "and spl_nama like '$search' "
                . "order by spl_nama LIMIT 0,40")->result();
       
    }
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('t_supplier');
        $this->db->where('spl_deleted', '0');
        $this->db->order_by('spl_nama', 'desc');
        return $this->db->get();
    }
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_supplier');
        $this->db->where('spl_id', $id);
        return $this->db->get();
    }
  
    function ajaxProcess(){
		$this->datatables
		->select('spl_id, spl_nama, spl_alamat, spl_npwp, spl_rekening, spl_bank ')
		->from('t_supplier')    
                ->where('spl_deleted', '0')
		->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-danger btn-sm delete btn-aksi' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Anda yakin akan menghapus ini?' href='Supplier/delete_supplier/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Hapus</a>".
			"<a class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Edit' href='Supplier/edit_supplier/$1'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah</a>".
			"</div>".
			"</form>".
		"",'spl_id');
		return $this->datatables->generate();
	}
    function update($id, $data){
        $this->db->where('spl_id', $id);
        $this->db->update('t_supplier', $data);
    }
    
    function delete($id){
 	$data['spl_deleted'] = '1';
        $this->db->where('spl_id', $id);
        $this->db->update('t_supplier', $data);
    }
    
    
    
}
