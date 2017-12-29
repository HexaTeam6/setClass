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

    function allNotification(){

        //get if new notification is available
        $row = $this->newNotification()->num_rows();

        //check new notif
        if ($row > 0){
            $sql = $this->idNewLogs();

            return $this->db->query("SELECT l.*, ml.nama 
                                  FROM logs l, master_login ml
                                  WHERE l.kode_user = ml.kode_user
                                  AND l.kode_kelas = ?
                                  AND l.kode_user NOT IN (?)
                                  AND l.id NOT IN (".$sql.")
                                  ORDER BY created_at DESC", array($_SESSION['kode_kelas'], $_SESSION['kode_user']));
        }else{
            return $this->db->query("SELECT l.*, ml.nama 
                                  FROM logs l, master_login ml
                                  WHERE l.kode_user = ml.kode_user
                                  AND l.kode_kelas = ?
                                  AND l.kode_user NOT IN (?)
                                  ORDER BY created_at DESC", array($_SESSION['kode_kelas'], $_SESSION['kode_user']));
        }
    }

    function getNotification(){

        //get if new notification is available
        $row = $this->newNotification()->num_rows();

        //check new notif
        if ($row > 0){
            $sql = $this->idNewLogs();

            return $this->db->query("SELECT l.*, ml.nama 
                                  FROM logs l, master_login ml
                                  WHERE l.kode_user = ml.kode_user
                                  AND l.kode_kelas = ?
                                  AND l.kode_user NOT IN (?)
                                  AND l.id NOT IN (".$sql.")
                                  ORDER BY created_at DESC
                                  LIMIT 0,5", array($_SESSION['kode_kelas'], $_SESSION['kode_user']));
        }else{
            return $this->db->query("SELECT l.*, ml.nama 
                                  FROM logs l, master_login ml
                                  WHERE l.kode_user = ml.kode_user
                                  AND l.kode_kelas = ?
                                  AND l.kode_user NOT IN (?)
                                  ORDER BY created_at DESC
                                  LIMIT 0,5", array($_SESSION['kode_kelas'], $_SESSION['kode_user']));
        }
    }

    function newNotification(){
        return $this->db->query("SELECT l.*, ml.nama
                                  FROM `logs` l, master_login ml
                                  WHERE l.id NOT IN (SELECT id_logs FROM logs_detail WHERE kode_user = ?)
                                  AND l.kode_user = ml.kode_user
                                  AND l.kode_user NOT IN (?)
                                  AND l.kode_kelas = ?
                                  ORDER BY l.created_at DESC ", array($_SESSION['kode_user'], $_SESSION['kode_user'], $_SESSION['kode_kelas']));
    }

    function idNewLogs(){
        return $sql = "SELECT id
                        FROM `logs`
                        WHERE id NOT IN (SELECT id_logs FROM logs_detail WHERE kode_user = ".$_SESSION['kode_user'].")
                        AND kode_user NOT IN (".$_SESSION['kode_user'].")
                        AND kode_kelas = '".$_SESSION['kode_kelas']."'";
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