<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_penyusun
 *
 * @author Ganteng Imut
 */
class M_penyusun extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->library('Datatables');
    }
    
     function selectLastPenyusun(){
       $this->db->select('*');
       $this->db->from('t_master_penyusun');
       $this->db->order_by("msp_tgl_input", "desc");
       $this->db->limit(1);
       return $this->db->get();
    }
    
    function ajaxProcess(){
        $this->datatables
        ->select('t_master_penyusun.*,msp_id,ketua.pgw_nip as ketua_nip, ketua.pgw_nama as ketua_nama, jbtKetua.jbt_nama as ketua_jabatan, '
                . 'anggota1.pgw_nip as anggota1_nip, anggota1.pgw_nama as anggota1_nama, jbtanggota1.jbt_nama as anggota1_jabatan, '
                . 'anggota2.pgw_nip as anggota2_nip, anggota2.pgw_nama as anggota2_nama, jbtanggota2.jbt_nama as anggota2_jabatan, '
                . 'anggota3.pgw_nip as anggota3_nip, anggota3.pgw_nama as anggota3_nama, jbtanggota3.jbt_nama as anggota3_jabatan, '
                . 'anggota4.pgw_nip as anggota4_nip, anggota4.pgw_nama as anggota4_nama, jbtanggota4.jbt_nama as anggota4_jabatan')
        ->from('t_master_penyusun')
        ->where('msp_deleted', '0')
        ->join('t_pegawai ketua', 'ketua.pgw_id = msp_ketua','left')
        ->join('t_pegawai anggota1', 'anggota1.pgw_id = msp_anggota1','left')
        ->join('t_pegawai anggota2', 'anggota2.pgw_id = msp_anggota2','left')
        ->join('t_pegawai anggota3', 'anggota3.pgw_id = msp_anggota3','left')
        ->join('t_pegawai anggota4', 'anggota4.pgw_id = msp_anggota4','left')
        ->join('t_jabatan jbtKetua', 'jbtKetua.jbt_id = ketua.pgw_jabatan','left')
        ->join('t_jabatan jbtanggota1', 'jbtanggota1.jbt_id = anggota1.pgw_jabatan','left')
        ->join('t_jabatan jbtanggota2', 'jbtanggota2.jbt_id = anggota2.pgw_jabatan','left')
        ->join('t_jabatan jbtanggota3', 'jbtanggota3.jbt_id = anggota3.pgw_jabatan','left')
        ->join('t_jabatan jbtanggota4', 'jbtanggota4.jbt_id = anggota4.pgw_jabatan','left')
        ->add_column('msp_penyusun', 'Ketua : $3 ($1-$2)<br>'
                                    . 'Anggota ke-1 : $6 ($4-$5)<br>'
                . 'Anggota ke-2 : $9 ($7-$8)<br>'
                . 'Anggota ke-3 : $12 ($10-$11)<br>'
                . 'Anggota ke-4 : $15 ($13-$14)<br>', 
                'ketua_nip, ketua_nama, ketua_jabatan,'
                . 'anggota1_nip, anggota1_nama, anggota1_jabatan,'
                . 'anggota2_nip, anggota2_nama, anggota2_jabatan,'
                . 'anggota3_nip, anggota3_nama, anggota3_jabatan,'
                . 'anggota4_nip, anggota4_nama, anggota4_jabatan')
        ->edit_column('aksi',"".
                "<form>".
                "<div class='form-group'>".
                "<a class='btn btn-danger btn-sm delete btn-aksi' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Anda yakin akan menghapus penyusun ini?' href='Penyusun/deletePenyusun/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Hapus</a>".
                
                "</div>".
                "</form>".
        "",'msp_id');
        return $this->datatables->generate();
    }
    
    function insert($data){
        $this->db->insert('t_master_penyusun', $data);
    }
    
    function delete($id){
	$data['msp_deleted'] = '1';
        $this->db->where('msp_id', $id);
        $this->db->update('t_master_penyusun', $data);
    }   
    // mengambil data user tertentu
    function get_masterpenyusun($id){
       $this->db->select('*');
       $this->db->from('t_master_penyusun');
       $this->db->where('msp_id', $id);
       return $this->db->get();
    }
    			
    function selectAll(){
       $this->db->select('*');
       $this->db->from('t_master_penyusun');
       return $this->db->get();
    }
    
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_master_penyusun');
        $this->db->where('msp_id', $id);
        return $this->db->get();
    }
    
    function update($id, $data){
        $this->db->where('msp_id', $id);
        $this->db->update('t_master_penyusun', $data);
    }
}
