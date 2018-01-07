<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_siswa_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        if ($_SESSION['kode_kelas']==24101999)
        {
            return $this->db->query("
            SELECT ms.*, ml.status, mj.jabatan, ml.kode_jabatan, mj.akses_jabatan
		    FROM master_siswa ms, master_login ml, master_jabatan mj
		    WHERE ms.NIS = ml.kode_user
		    AND ml.kode_jabatan = mj.kode_jabatan
		    ORDER BY mj.akses_jabatan ASC");
        }else{
            return $this->db->query("
            SELECT ms.*, ml.status, mj.jabatan, ml.kode_jabatan, mj.akses_jabatan
		    FROM master_siswa ms, master_login ml, master_jabatan mj
		    WHERE ms.kode_kelas = '".$_SESSION['kode_kelas']."'
		    AND ms.NIS = ml.kode_user
		    AND ml.kode_jabatan = mj.kode_jabatan
		    ORDER BY mj.akses_jabatan ASC");
        }
    }

    function preview($kode_user){
        return $this->db->query("SELECT ms.*, ml.kode_user, mj.jabatan, 
                                (SELECT count(nis) FROM master_siswa WHERE kode_kelas = ?) as jumlahSiswa
                                 FROM master_siswa ms, master_login ml, master_jabatan mj
                                 WHERE ms.NIS = ?
                                 AND ms.NIS = ml.kode_user
                                 AND ml.kode_jabatan = mj.kode_jabatan", array($_SESSION['kode_kelas'], $kode_user));
    }

    function getJabatan($akses_jabatan){
        return $this->db->query("SELECT * FROM master_jabatan 
                                 WHERE akses_jabatan = ?
                                 AND kode_kelas = ?", array($akses_jabatan, $_SESSION['kode_kelas']));
    }

    function getKodeJabatan($akses_jabatan, $jabatan){
        return $this->db->query("SELECT * FROM master_jabatan
                                 WHERE akses_jabatan = ?
                                 AND jabatan = ?
                                 AND kode_kelas = ?", array($akses_jabatan, $jabatan, $_SESSION['kode_kelas']));
    }

    function doConfirm($table,$where,$data){
        $this->db->where('kode_user',$where);
        $this->db->update($table,$data);
        return true;
    }

    function input_data($table,$data){
        //$this->output->enable_profiler(TRUE);
        return $this->db->insert($table,$data);
    }
    function update_data($table,$id,$where,$data){
        $this->db->where($id,$where);
        $this->db->update($table,$data);
        return true;
    }
    function delete_data($table,$id,$where){
        $this->db->where($id, $where);
        $this->db->delete($table);
    }
    function inactive_data($table,$id,$where,$data){
        $this->db->where($id,$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>