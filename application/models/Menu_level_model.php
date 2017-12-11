<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_level_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        return $this->db->query("SELECT * FROM menu_hak_akses ORDER BY kode_akses DESC");
    }

    function get_data($kode_akses){
        $sql = "SELECT c.kode_menu_child, c.menu_name, 
    (select l.akses_insert from menu_level l where l.kode_menu_child= c.kode_menu_child and l.kode_akses = '".$kode_akses."')akses_insert, 
    (select l.akses_view from menu_level l where l.kode_menu_child= c.kode_menu_child and l.kode_akses = '".$kode_akses."')akses_view, 
    (select l.akses_edit from menu_level l where l.kode_menu_child= c.kode_menu_child and l.kode_akses = '".$kode_akses."')akses_edit, 
    (select l.akses_delete from menu_level l where l.kode_menu_child= c.kode_menu_child and l.kode_akses = '".$kode_akses."')akses_delete
FROM `menu_child` c";
        return $this->db->query($sql);
    }

    function get_menu_child(){
        return $this->db->query("SELECT `kode_menu_child`, `kode_menu_header`, `menu_name`, `file_php`
FROM `menu_child`");
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
    function delete_data($table,$where){
        $this->db->where('kode_akses',$where);
        $this->db->delete($table);
        return true;
    }
}
?>
