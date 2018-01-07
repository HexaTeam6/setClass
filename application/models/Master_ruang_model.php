<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_ruang_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        if ($_SESSION['kode_kelas']==24101999)
        {
            return $this->db->query("
            SELECT *
		    FROM master_ruang
		    ORDER BY kode_ruang DESC");
        }else{
            return $this->db->query("
            SELECT *
		    FROM master_ruang
		    WHERE kode_kelas = '".$_SESSION['kode_kelas']."'
		    ORDER BY kode_ruang DESC");
        }
    }

    function input_data($table,$data){
        //$this->output->enable_profiler(TRUE);
        return $this->db->insert($table,$data);
    }
    function update_data($table,$where,$data){
        $this->db->where('kode_ruang',$where);
        $this->db->update($table,$data);
        return true;
    }
    function delete_data($table, $where)
    {
        $this->db->where('kode_ruang', $where);
        $this->db->delete($table);
    }
    function inactive_data($table,$where,$data){
        $this->db->where('kode_ruang',$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>