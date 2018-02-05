<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabungan_kelas_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        if ($_SESSION['kode_kelas']==24101999)
        {
            return $this->db->query("
            SELECT dt.*, ml.nama AS nama_penerima, ms.nama, mj.jabatan
		    FROM data_tabungan dt, master_login ml, master_siswa ms, master_jabatan mj
		    WHERE dt.penerima = ml.kode_user
		    AND ml.kode_jabatan = mj.kode_jabatan
		    AND dt.kode_user = ms.NIS
		    ORDER BY created_at DESC");
        }elseif($_SESSION['kode_akses'] == 4){
            return $this->db->query("
            SELECT dt.*, ml.nama AS nama_penerima, ms.nama, mj.jabatan
		    FROM data_tabungan dt, master_login ml, master_siswa ms, master_jabatan mj
		    WHERE dt.penerima = ml.kode_user
		    AND ml.kode_jabatan = mj.kode_jabatan
		    AND dt.kode_user = ms.NIS
		    AND ms.NIK = (SELECT NIK_siswa FROM master_wali_murid WHERE NIK = ?) 
		    AND dt.kode_kelas = '".$_SESSION['kode_kelas']."'
		    ORDER BY created_at DESC", array($_SESSION['kode_user']));
        }else{
            return $this->db->query("
            SELECT dt.*, ml.nama AS nama_penerima, ms.nama, mj.jabatan
		    FROM data_tabungan dt, master_login ml, master_siswa ms, master_jabatan mj
		    WHERE dt.penerima = ml.kode_user
		    AND ml.kode_jabatan = mj.kode_jabatan
		    AND dt.kode_user = ms.NIS
		    AND dt.kode_kelas = '".$_SESSION['kode_kelas']."'
		    ORDER BY created_at DESC");
        }
    }

    function getStudent(){
        return $this->db->query("SELECT * 
                                 FROM master_siswa
                                 WHERE kode_kelas = ?
                                 ORDER BY nama ASC", array($_SESSION['kode_kelas']));
    }

    function getKode(){
        return $this->db->query("SELECT generate_tabungan(?) AS kode", array($_SESSION['kode_kelas']));
    }

    function tabunganPribadi(){
        return $this->db->query("SELECT SUM(nominal) AS nominal FROM data_tabungan WHERE kode_user = ?", array($_SESSION['kode_user']));
    }

    function tabunganAnak(){
        return $this->db->query("SELECT SUM(dt.nominal) AS nominal 
                                 FROM data_tabungan dt, master_siswa ms 
                                 WHERE dt.kode_user = ms.NIS
                                 AND ms.NIK = (SELECT NIK_siswa FROM master_wali_murid WHERE NIK = ?)", array($_SESSION['kode_user']));
    }

    function tabunganKelas(){
        return $this->db->query("SELECT SUM(nominal) AS nominal FROM data_tabungan WHERE kode_kelas = ?", array($_SESSION['kode_kelas']));
    }

    function input_data($table,$data){
        //$this->output->enable_profiler(TRUE);
        return $this->db->insert($table,$data);
    }
    function update_data($table,$where,$data){
        $this->db->where('kode_tabungan',$where);
        $this->db->update($table,$data);
        return true;
    }
    function delete_data($table, $where){
        $this->db->where('kode_tabungan', $where);
        $this->db->delete($table);
    }
    function inactive_data($table,$where,$data){
        $this->db->where('kode_tabungan',$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>