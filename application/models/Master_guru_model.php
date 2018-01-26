<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_guru_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        if ($_SESSION['kode_kelas']==24101999)
        {
            return $this->db->query("
            SELECT *
		    FROM master_guru
		    ORDER BY nama_guru DESC");
        }else{
            return $this->db->query("
            SELECT *
		    FROM master_guru
		    WHERE kode_kelas = ?
		    ORDER BY nama_guru DESC", array($_SESSION['kode_kelas']));
        }
    }

    function getGuru($kode_guru){
        return $this->db->query("SELECT *
                                 FROM master_guru
                                 WHERE kode_guru = ?", array($kode_guru));
    }

    function selectUserInfo($nip){
        return $this->db->query("SELECT *
                                 FROM master_guru
                                 WHERE NIP = ?", array($nip));
    }

    function checkUpdate($kode_guru, $nip){
        return $this->db->query("SELECT *
                                 FROM master_guru
                                 WHERE NIP = ?
                                 AND kode_guru NOT IN (?)", array($nip, $kode_guru));
    }

    function input_data($table,$data){
        //$this->output->enable_profiler(TRUE);
        return $this->db->insert($table,$data);
    }
    function update_data($table,$where,$data){
        $this->db->where('kode_guru',$where);
        $this->db->update($table,$data);
        return true;
    }
    function delete_data($table, $where)
    {
        $this->db->where('kode_guru', $where);
        $this->db->delete($table);
    }
    function inactive_data($table,$where,$data){
        $this->db->where('kode_guru',$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>