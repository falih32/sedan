<?php

class M_konsultan extends CI_Model{
    function __construct(){
        parent::__construct();
        	$this->load->library('Datatables');
    }
    
    function insertKons1($data){
        $this->db->insert('t_detail_konsultan1', $data);
    }
    
    function insertKons2($data){
        $this->db->insert('t_detail_konsultan2', $data);
    }
    
    function selectDrawTableKons1($id){
        return $this->db->query(""
                . "SELECT sjd_sub_judul, t_detail_konsultan1.* "
                . "FROM t_detail_konsultan1 "
                . "LEFT JOIN t_sub_judul "
                . "ON dtk_sub_judul = sjd_id "
                . "WHERE dtk_pgd = '$id'")->result();
    }
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('t_anggaran');
        $this->db->where('ang_deleted', '0');
        $this->db->order_by('ang_kode', 'asc');
        return $this->db->get();
    }
    
    function select2All($search){
        
        $search = '%'.$search.'%';
        return $this->db->query("select ang_kode as id, CONCAT(ang_kode,' - ', ang_nama) as 'text' "
                . "From t_anggaran "
                . "where ang_deleted = 0 "
                . "and ((ang_kode like '$search') OR (ang_nama like '$search')) "
                . "order by ang_kode LIMIT 0,40")->result();
       
    }
    
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_anggaran');
        $this->db->where('ang_kode', $id);
        return $this->db->get();
    }
  
    function ajaxProcess(){
		$this->datatables
		->select('ang_kode, ang_nama')
		->from('t_anggaran')    
                ->where('ang_deleted', '0')
		->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-danger btn-sm delete btn-aksi' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Anda yakin akan menghapus ini?' href='Anggaran/delete_anggaran/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Hapus</a>".
			"<a class='btn btn-info btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Edit' href='Anggaran/edit_anggaran/$1'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah</a>".
			"</div>".
			"</form>".
		"",'jbt_id');
		return $this->datatables->generate();
	}
    function update($id, $data){
        $this->db->where('ang_kode', $id);
        $this->db->update('t_anggaran', $data);
    }
    
    function delete($id){
 	$data['jbt_deleted'] = '1';
        $this->db->where('ang_kode', $id);
        $this->db->update('t_anggaran', $data);
    }
    
}
