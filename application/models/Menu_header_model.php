<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_header_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        return $this->db->query("
        SELECT kode_menu_header, menu_header, icon
		FROM menu_header 
		ORDER BY kode_menu_header DESC");
    }

    function input_data($table,$data){
        //$this->output->enable_profiler(TRUE);
        return $this->db->insert($table,$data);
    }
    function update_data($table,$where,$data){
        $this->db->where('kode_menu_header',$where);
        $this->db->update($table,$data);
        return true;
    }
    function delete_data($table, $where)
    {
        $this->db->where('kode_menu_header', $where);
        $this->db->delete($table);
    }
    function inactive_data($table,$where,$data){
        $this->db->where('kode_menu_header',$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>