<?php

class M_jabatan extends CI_Model{
    function __construct(){
        parent::__construct();
        	$this->load->library('Datatables');
    }
    
    function insert($data){
        $this->db->insert('t_jabatan', $data);
    }
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('t_jabatan');
        $this->db->order_by('jbt_id', 'desc');
        return $this->db->get();
    }
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_jabatan');
        $this->db->where('jbt_id', $id);
        $this->db->join('t_user', 't_user.usr_jabatan = t_jabatan.jbt_id', 'left');
        return $this->db->get();
    }
    
     function selectJabatanbyUserFromFDSDUS($id){
        return $this->db->query("SELECT jbt_id, jbt_nama "
                . "FROM t_form_disposisi, t_jabatan, tr_disposisi_user, t_user "
                . "WHERE usr_id = $id "
                . "AND fds_pengirim = $id "
                . "AND dus_user = $id "
                . "AND fds_jabatan_pengirim <> usr_jabatan "
                . "AND dus_jabatan_user <> usr_jabatan "
                . "AND jbt_id IN (fds_jabatan_pengirim, dus_jabatan_user) "
                . "GROUP BY jbt_id;");
    }
    
    function AlokasiFDSDUS($oldID, $oldJabatan, $newId, $newJabatan){
        $this->db->query("UPDATE t_form_disposisi "
                . "SET fds_pengirim = $newId, fds_jabatan_pengirim = $newJabatan "
                . "WHERE fds_pengirim = $oldID "
                . "AND fds_jabatan_pengirim = $oldJabatan;");
        $this->db->query("UPDATE tr_disposisi_user "
                . "SET dus_user = $newId, dus_jabatan_user = $newJabatan "
                . "WHERE dus_user = $oldID "
                . "AND dus_jabatan_user = $oldJabatan;");
    }
    
     
    function ajaxProcess(){
		$this->datatables
		->select('jbt_id, jbt_nama, jbt_departemen, dpt_nama')
		->from('t_jabatan')
                ->join ('t_departemen','t_departemen.dpt_id = t_jabatan.jbt_departemen','left')        
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
        $this->db->where('jbt_id', $id);
        $this->db->delete('t_jabatan');
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
