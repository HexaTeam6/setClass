<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    function tampil_data(){
        if ($_SESSION['kode_akses'] == 2){
            $sql = "SELECT 
                ml.kode_user, 
                mwk.*,
                mk.nama_sekolah, mk.alamat_sekolah, mk.telp_sekolah, mk.kelas, mk.jurusan, 
                mj.jabatan,
                (SELECT count(nis) FROM master_siswa WHERE kode_kelas = ?) as jumlahSiswa
                FROM master_login ml, master_wali_kelas mwk, master_jabatan mj, master_kelas mk
                WHERE ml.kode_user = ?
                AND ml.kode_user = mwk.NIP
                AND ml.kode_kelas = mk.kode_kelas
                AND ml.kode_jabatan = mj.kode_jabatan";
        }else if($_SESSION['kode_akses'] == 3){
            $sql = "SELECT 
                ml.kode_user, 
                ms.*, (SELECT count(nis) FROM master_siswa WHERE kode_kelas = ?) as jumlahSiswa,
                mk.nama_sekolah, mk.alamat_sekolah, mk.telp_sekolah, mk.kelas, mk.jurusan, 
                mj.jabatan
                FROM master_login ml, master_siswa ms, master_jabatan mj, master_kelas mk
                WHERE ml.kode_user = ?
                AND ml.kode_user = ms.NIS
                AND ml.kode_kelas = mk.kode_kelas
                AND ml.kode_jabatan = mj.kode_jabatan";
        }else{
            $sql = "SELECT 
                ml.kode_user, 
                mwm.*, (SELECT count(nis) FROM master_siswa WHERE kode_kelas = ?) as jumlahSiswa,
                mk.nama_sekolah, mk.alamat_sekolah, mk.telp_sekolah, mk.kelas, mk.jurusan, 
                mj.jabatan
                FROM master_login ml, master_wali_murid mwm, master_jabatan mj, master_kelas mk
                WHERE ml.kode_user = ?
                AND ml.kode_user = mwm.NIK
                AND ml.kode_kelas = mk.kode_kelas
                AND ml.kode_jabatan = mj.kode_jabatan";
        }
        $result = $this->db->query($sql, array($_SESSION['kode_kelas'], $_SESSION['kode_user']));
        return $result;
    }

    function get_hak_akses(){
        return $this->db->query("SELECT l.* 
                                 FROM menu_level l, master_login u
                                 WHERE l.kode_akses = u.kode_akses 
                                 AND u.kode_user = '".$_SESSION['kode_user']."'");
    }

    function selectUserInfo($kode_user){
        $sql = "SELECT ml.*, ha.hak_akses 
                FROM master_login ml, menu_hak_akses ha
                WHERE ml.kode_user=?
                AND ml.kode_akses = ha.kode_akses";
        $result = $this->db->query($sql, array($kode_user));
        return $result;
    }

    function cekNik($nik){
        return $this->db->query("SELECT * FROM master_siswa WHERE NIK = ?", array($nik));
    }

    function cekEmail($email){
        return $this->db->query("SELECT * FROM master_login WHERE email = ?", array($email));
    }

    function getClass($kode_kelas){
        return $this->db->query("SELECT mk.*, mwk.nama, mwk.NIP
                                 FROM master_kelas mk, master_wali_kelas mwk
                                 WHERE mk.kode_kelas = ?
                                 AND mk.kode_kelas = mwk.kode_kelas", array($kode_kelas));
    }

    function getStudent($nik){
        return $this->db->query("SELECT ms.*, mk.nama_sekolah, mk.kelas, mk.jurusan, mk.kode_kelas
                                 FROM master_siswa ms, master_kelas mk
                                 WHERE ms.NIK = ?
                                 AND ms.kode_kelas = mk.kode_kelas", array($nik));
    }

    function getJabatan($kode_kelas, $akses){
        return $this->db->query("SELECT kode_jabatan FROM master_jabatan 
                                 WHERE kode_kelas = ?
                                 AND akses_jabatan = ?", array($kode_kelas, $akses));
    }

    function getLogin($kode_user, $password)
    {
        $sql = "SELECT ml.*, mj.jabatan, mj.akses_jabatan
                FROM master_login ml, master_jabatan mj
                WHERE kode_user=? 
                AND password=MD5(?)
                AND ml.kode_jabatan = mj.kode_jabatan
                AND ml.status = 'Confirmed'";
        $result = $this->db->query($sql, array($kode_user, $password));
        return $result;
    }

    public function input_data($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    function update_data($id,$table,$where,$data){
        $this->db->where($id,$where);
        $this->db->update($table,$data);
        return true;
    }
}
?>