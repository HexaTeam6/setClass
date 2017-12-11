<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_child_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        return $this->db->query("
        SELECT mc.kode_menu_child, mc.menu_name, mc.file_php, mc.kode_menu_header, mh.menu_header
		FROM menu_child mc, menu_header mh
		WHERE mc.kode_menu_header = mh.kode_menu_header
		ORDER BY kode_menu_child DESC");
    }

    function input_data($table,$data){
        //$this->output->enable_profiler(TRUE);
        return $this->db->insert($table,$data);
    }
    function update_data($table,$where,$data){
        $this->db->where('kode_menu_child',$where);
        $this->db->update($table,$data);
        return true;
    }
    function delete_data($table, $where)
    {
        $this->db->where('kode_menu_child', $where);
        $this->db->delete($table);
    }
    function inactive_data($table,$where,$data){
        $this->db->where('kode_menu_child',$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>