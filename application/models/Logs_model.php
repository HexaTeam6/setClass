<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function getRiwayat(){
        return $this->db->query("SELECT * FROM logs WHERE kode_user = ".$_SESSION['kode_user']." ORDER BY created_at DESC LIMIT 0,5");
    }

    function getNotification(){
        return $this->db->query("SELECT l.*, ml.nama 
                                  FROM logs l, master_login ml
                                  WHERE l.kode_user = ml.kode_user
                                  ORDER BY created_at DESC");
    }

    function newNotification(){
        return $this->db->query("SELECT ld.* 
                                  FROM logs_detail ld, logs l
                                  WHERE ld.id_logs = l.id
                                  AND ld.kode_user = ?
                                  AND ld.kode_kelas = ?", array($_SESSION['kode_user'], $_SESSION['kode_kelas']));
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
    function delete_data($table, $where){
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