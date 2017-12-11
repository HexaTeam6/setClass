<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hak_akses_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        return $this->db->query("SELECT * FROM menu_hak_akses WHERE kode_akses NOT IN (1) ORDER BY kode_akses DESC");
    }

    function input_data($table,$data){
        //$this->output->enable_profiler(TRUE);
        return $this->db->insert($table,$data);
    }
    function update_data($table,$where,$data){
        $this->db->where('kode_akses',$where);
        $this->db->update($table,$data);
        return true;
    }
    function delete_data($table, $where)
    {
        $this->db->where('kode_akses', $where);
        $this->db->delete($table);
    }
    function inactive_data($table,$where,$data){
        $this->db->where('kode_akses',$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>