<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_kelas_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        if ($_SESSION['kode_kelas']==24101999)
        {
            return $this->db->query("
            SELECT dad.kode_absensi, da.tanggal,
            SUM(CASE dad.status WHEN 'Sakit' THEN 1 ELSE 0 END) AS sakit,
            SUM(CASE dad.status WHEN 'Izin' THEN 1 ELSE 0 END) AS izin,
            SUM(CASE dad.status WHEN 'Masuk' THEN 1 ELSE 0 END) AS masuk,
            SUM(CASE dad.status WHEN 'Tidak Masuk' THEN 1 ELSE 0 END) AS tidakMasuk
            FROM data_absensi_detail dad, data_absensi da
            WHERE dad.kode_absensi = da.kode_absensi
            GROUP BY kode_absensi ");
        }else{
            return $this->db->query("
            SELECT dad.kode_absensi, da.tanggal,
            SUM(CASE dad.status WHEN 'Sakit' THEN 1 ELSE 0 END) AS sakit,
            SUM(CASE dad.status WHEN 'Izin' THEN 1 ELSE 0 END) AS izin,
            SUM(CASE dad.status WHEN 'Masuk' THEN 1 ELSE 0 END) AS masuk,
            SUM(CASE dad.status WHEN 'Tidak Masuk' THEN 1 ELSE 0 END) AS tidakMasuk
            FROM data_absensi_detail dad, data_absensi da
            WHERE dad.kode_absensi = da.kode_absensi
            AND da.kode_kelas = ? 
            GROUP BY kode_absensi ", array($_SESSION['kode_kelas']));
        }
    }

    function checkGetKodeAbsensi(){
        return $this->db->query("SELECT kode_absensi FROM data_absensi WHERE kode_kelas = ? AND tanggal = ? ", array($_SESSION['kode_kelas'], date('Y-m-d')));
    }

    function getStudent(){
        return $this->db->query("SELECT ms.* 
                                 FROM master_siswa ms, master_login ml
                                 WHERE ms.kode_kelas = ?
                                 AND ms.NIS = ml.kode_user
                                 AND ml.status = 'Confirmed'
                                 ORDER BY ms.nama ASC", array($_SESSION['kode_kelas']));
    }

    //jika ingin edit tidak mengupdate jumlah siswa awal maka tambahkan AND dad.tanggal = tanggalSistem
    function getDetail($kode_absensi){
        return $this->db->query("SELECT dad.*, ms.nama, ms.NIS
                                 FROM data_absensi_detail dad, master_siswa ms
                                 WHERE dad.kode_user = ms.NIS
                                 AND dad.kode_kelas = ?
                                 AND dad.kode_absensi = ?", array($_SESSION['kode_kelas'], $kode_absensi));
    }

    function countSick(){
        return $this->db->query("SELECT COUNT(kode_user) as numb 
                                 FROM data_absensi_detail 
                                 WHERE kode_kelas = ?
                                 AND kode_user = ?
                                 AND status = 'Sakit'", array($_SESSION['kode_kelas'], $_SESSION['kode_user']));
    }

    function countPermission(){
        return $this->db->query("SELECT COUNT(kode_user) as numb 
                                 FROM data_absensi_detail 
                                 WHERE kode_kelas = ?
                                 AND kode_user = ?
                                 AND status = 'Izin'", array($_SESSION['kode_kelas'], $_SESSION['kode_user']));
    }

    function countSkipping(){
        return $this->db->query("SELECT COUNT(kode_user) as numb 
                                 FROM data_absensi_detail 
                                 WHERE kode_kelas = ?
                                 AND kode_user = ?
                                 AND status = 'Tidak Masuk'", array($_SESSION['kode_kelas'], $_SESSION['kode_user']));
    }

    function countSickAnak(){
        return $this->db->query("SELECT COUNT(dad.kode_user) as numb 
                                 FROM data_absensi_detail dad, master_siswa ms
                                 WHERE dad.kode_kelas = ?
                                 AND dad.kode_user = ms.NIS
                                 AND ms.NIK = (SELECT NIK_siswa FROM master_wali_murid WHERE NIK = ?)
                                 AND dad.status = 'Sakit'", array($_SESSION['kode_kelas'], $_SESSION['kode_user']));
    }

    function countPermissionAnak(){
        return $this->db->query("SELECT COUNT(dad.kode_user) as numb 
                                 FROM data_absensi_detail dad, master_siswa ms
                                 WHERE dad.kode_kelas = ?
                                 AND dad.kode_user = ms.NIS
                                 AND ms.NIK = (SELECT NIK_siswa FROM master_wali_murid WHERE NIK = ?)
                                 AND dad.status = 'Izin'", array($_SESSION['kode_kelas'], $_SESSION['kode_user']));
    }

    function countSkippingAnak(){
        return $this->db->query("SELECT COUNT(dad.kode_user) as numb 
                                 FROM data_absensi_detail dad, master_siswa ms
                                 WHERE dad.kode_kelas = ?
                                 AND dad.kode_user = ms.NIS
                                 AND ms.NIK = (SELECT NIK_siswa FROM master_wali_murid WHERE NIK = ?)
                                 AND dad.status = 'Tidak Masuk'", array($_SESSION['kode_kelas'], $_SESSION['kode_user']));
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
    function delete_data($table, $id, $where){
        $this->db->where($id, $where);
        $this->db->delete($table);
    }
    function inactive_data($table,$where,$data){
        $this->db->where('kode_absensi',$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>