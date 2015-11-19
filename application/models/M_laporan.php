<?php

class M_laporan extends CI_Model{
    function __construct(){
        parent::__construct();
        	$this->load->library('Datatables');
    }

    function cetakmemo1($data) {
        $this->db->select('*');
        $this->db->from('t_draftjabatan');
        $this->db->where('jbt_id', $id);
        return $this->db->get();

    }    
    function jabatanpegawai($data) {
            $this->db
		->select('*')
        ->from('t_jabatan')
		->join('t_pegawai', 'jbt_id = pgw_jabatan', 'left')
		->join('t_departemen A ', 'jbt_departemen=A.dpt_id', 'left')
                ->join('t_departemen B', 'A.dpt_parent=B.dpt_id', 'left');
        return $this->db->get()->row();

    }   
    
    
    
    
    function insert($data){
        $this->db->insert('t_jabatan', $data);
    }
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('t_jabatan');
        $this->db->where('jbt_deleted', '0');
        $this->db->order_by('jbt_id', 'desc');
        return $this->db->get();
    }
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_jabatan');
        $this->db->where('jbt_id', $id);
        return $this->db->get();
    }
  
    function ajaxProcess(){
		$this->datatables
		->select('jbt_id, jbt_nama')
		->from('t_jabatan')    
                ->where('jbt_deleted', '0')
		->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-danger btn-sm delete btn-aksi' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Anda yakin akan menghapus ini?' href='Jabatan/delete_jabatan/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Hapus</a>".
			"<a class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Edit' href='Jabatan/edit_jabatan/$1'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah</a>".
			"</div>".
			"</form>".
		"",'jbt_id');
		return $this->datatables->generate();
    }
    function update($id, $data){
        $this->db->where('jbt_id', $id);
        $this->db->update('t_jabatan', $data);
    }
    
    function delete($id){
 	$data['jbt_deleted'] = '1';
        $this->db->where('jbt_id', $id);
        $this->db->update('t_jabatan', $data);
    }
    
    // function yang digunakan oleh paginationsample
    function selectAllPaging($limit=array()){
        $this->db->select('*');
        $this->db->from('t_jabatan');
        $this->db->order_by('jbt_id', 'desc');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
	
    function ajaxByDept($dept){
        $this->db->select('*');
        $this->db->from('t_jabatan');
        $this->db->where('jbt_departemen', $dept);
		$this->db->or_where('jbt_departemen', NULL); 
        return $this->db->get();
	}
    
}
