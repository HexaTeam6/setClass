<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_wali_murid_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        if ($_SESSION['kode_kelas']==24101999)
        {
            return $this->db->query("
            SELECT mwm.*, ml.status, ms.nama AS nama_siswa, ms.NIS
		    FROM master_wali_murid mwm, master_login ml, master_siswa ms
		    WHERE mwm.NIK = ml.kode_user
		    AND mwm.NIK_siswa = ms.NIK
		    ORDER BY mwm.created_at DESC");
        }else{
            return $this->db->query("
            SELECT mwm.*, ml.status, ms.nama AS nama_siswa, ms.NIS
		    FROM master_wali_murid mwm, master_login ml, master_siswa ms
		    WHERE mwm.NIK = ml.kode_user
		    AND mwm.NIK_siswa = ms.NIK
		    AND mwm.kode_kelas = ?
		    ORDER BY mwm.created_at DESC", array($_SESSION['kode_kelas']));
        }
    }

    function preview($kode_user){
        return $this->db->query("SELECT mwm.*, ml.kode_user, ms.nama AS nama_siswa, ha.hak_akses, ms.NIS,
                                (SELECT count(nis) FROM master_siswa WHERE kode_kelas = ?) as jumlahSiswa
                                 FROM master_wali_murid mwm, master_login ml, master_siswa ms, menu_hak_akses ha
                                 WHERE mwm.NIK = ?
                                 AND mwm.NIK = ml.kode_user
                                 AND mwm.NIK_siswa = ms.NIK
                                 AND mwm.kode_akses = ha.kode_akses", array($_SESSION['kode_kelas'], $kode_user));
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