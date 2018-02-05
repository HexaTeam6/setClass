<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kas_keluar_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        if ($_SESSION['kode_kelas']==24101999)
        {
            return $this->db->query("
            SELECT kk.*, ml.nama, mj.jabatan
		    FROM kas_keluar kk, master_login ml, master_jabatan mj
		    WHERE kk.kode_user = ml.kode_user
		    AND ml.kode_jabatan = mj.kode_jabatan
		    ORDER BY created_at DESC");
        }else{
            return $this->db->query("
            SELECT kk.*, ml.nama, mj.jabatan
		    FROM kas_keluar kk, master_login ml, master_jabatan mj
		    WHERE kk.kode_user = ml.kode_user
		    AND ml.kode_jabatan = mj.kode_jabatan
		    AND kk.kode_kelas = '".$_SESSION['kode_kelas']."'
		    ORDER BY created_at DESC");
        }
    }

    function getKode(){
        return $this->db->query("SELECT generate_kas_keluar(?) AS kode", array($_SESSION['kode_kelas']));
    }

    function kasPribadi(){
        return $this->db->query("SELECT SUM(nominal) AS nominal FROM kas_masuk WHERE kode_user = ?", array($_SESSION['kode_user']));
    }

    function kasAnak(){
        return $this->db->query("SELECT SUM(km.nominal) AS nominal 
                                 FROM kas_masuk km, master_siswa ms 
                                 WHERE km.kode_user = ms.NIS
                                 AND ms.NIK = (SELECT NIK_siswa FROM master_wali_murid WHERE NIK = ?)", array($_SESSION['kode_user']));
    }

    function kasMasuk(){
        return $this->db->query("SELECT SUM(nominal) AS nominal FROM kas_masuk WHERE kode_kelas = ?", array($_SESSION['kode_kelas']));
    }

    function kasKeluar(){
        return $this->db->query("SELECT SUM(nominal) AS nominal FROM kas_keluar WHERE kode_kelas = ?", array($_SESSION['kode_kelas']));
    }

    function input_data($table,$data){
        //$this->output->enable_profiler(TRUE);
        return $this->db->insert($table,$data);
    }
    function update_data($table,$where,$data){
        $this->db->where('kode_kas_keluar',$where);
        $this->db->update($table,$data);
        return true;
    }
    function delete_data($table, $where){
        $this->db->where('kode_kas_keluar', $where);
        $this->db->delete($table);
    }
    function inactive_data($table,$where,$data){
        $this->db->where('kode_kas_keluar',$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>