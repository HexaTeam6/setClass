<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_jabatan_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        return $this->db->query("
        SELECT *
		FROM master_jabatan
		WHERE kode_kelas = '".$_SESSION['kode_kelas']."'
		AND kode_jabatan NOT IN(1,2)
		ORDER BY kode_jabatan DESC");
    }

    function input_data($table,$data){
        //$this->output->enable_profiler(TRUE);
        return $this->db->insert($table,$data);
    }
    function update_data($table,$where,$data){
        $this->db->where('id',$where);
        $this->db->update($table,$data);
        return true;
    }
    function delete_data($table, $where)
    {
        $this->db->where('id', $where);
        $this->db->delete($table);
    }
    function inactive_data($table,$where,$data){
        $this->db->where('id',$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>