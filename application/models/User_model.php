<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    function tampil_data(){
        $sql = "SELECT DISTINCT 
                ml.kode_user, 
                mwk.*, 
                mk.nama_sekolah, mk.alamat_sekolah, mk.telp_sekolah, mk.kelas, mk.jurusan, 
                mj.jabatan
                FROM master_login ml, master_wali_kelas mwk, master_jabatan mj, master_kelas mk
                WHERE ml.kode_user=?
                AND ml.kode_user = mwk.NIP
                AND ml.kode_kelas = mk.kode_kelas
                AND ml.kode_jabatan = mj.kode_jabatan";
        $result = $this->db->query($sql, array($_SESSION['kode_user']));
        return $result;
    }

    function selectUserInfo($kode_user){
        $sql = "SELECT DISTINCT ml.*, mwk.foto, mj.jabatan 
                FROM master_login ml, master_wali_kelas mwk, master_jabatan mj
                WHERE ml.kode_user=? 
                AND ml.kode_user = mwk.NIP
                AND ml.kode_jabatan = mj.kode_jabatan";
        $result = $this->db->query($sql, array($kode_user));
        return $result;
    }

    function getLogin($kode_user, $password)
    {
        $sql = "SELECT * FROM master_login WHERE kode_user=? AND password=MD5(?)";
        $result = $this->db->query($sql, array($kode_user, $password));
        return $result;
    }

    function update_data($id,$table,$where,$data){
        $this->db->where($id,$where);
        $this->db->update($table,$data);
        return true;
    }
}
?>