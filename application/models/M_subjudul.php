<?php

class M_subjudul extends CI_Model{
    function __construct(){
        parent::__construct();
        	$this->load->library('Datatables');
    }
    
    function insert($data){
        $this->db->insert('t_sub_judul', $data);
    }
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('t_sub_judul');
        $this->db->where('sjd_id', '0');
        $this->db->order_by('sjd_sub_judul', 'asc');
        return $this->db->get();
    }
    
    function select2All($search, $tipe){
        
        $search = '%'.strtolower($search).'%';
        return $this->db->query("select sjd_id as id, sjd_sub_judul as 'text' "
                . "From t_sub_judul "
                . "where LOWER(sjd_sub_judul) like '$search'  "
                . "and sjd_jenis = '$tipe' "
                . "order by sjd_sub_judul LIMIT 0,40")->result();
       
    }
    
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_sub_judul');
        $this->db->where('sjd_id', $id);
        return $this->db->get();
    }
    
    function selectByNama($nama){
        $this->db->select('*');
        $this->db->from('t_sub_judul');
        $this->db->where('LOWER(sjd_sub_judul)', strtolower($nama));
        return $this->db->get();
    }
  
    function ajaxProcess(){
		$this->datatables
		->select('sjd_id, sjd_sub_judul')
		->from('t_sub_judul')    
		->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-danger btn-sm delete btn-aksi' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Anda yakin akan menghapus ini?' href='SubJudul/delete_subjudul/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Hapus</a>".
			"<a class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Edit' href='SubJudul/edit_subjudul/$1'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah</a>".
			"</div>".
			"</form>".
		"",'sjd_id');
		return $this->datatables->generate();
	}
    function update($id, $data){
        $this->db->where('sjd_id', $id);
        $this->db->update('t_sub_judul', $data);
    }
    
    function delete($id){
        $this->db->where('sjd_id', $id);
        $this->db->delete('t_sub_judul', $data);
    }
    
}