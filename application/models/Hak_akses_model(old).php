<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hak_akses_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        if (($_SESSION['kode_kelas'] == 24101999))
        {
            return $this->db->query("SELECT DISTINCT ha.kode_akses, ha.kode_kelas, mk.nama_sekolah, mk.kelas, ha.hak_akses, ha.kode_jabatan, mj.jabatan
		FROM menu_hak_akses ha, master_kelas mk, master_jabatan mj
		WHERE ha.kode_kelas = mk.kode_kelas
		AND ha.kode_jabatan = mj.kode_jabatan
		AND ha.kode_kelas not in (24101999)
		ORDER BY ha.kode_akses DESC");
        }
        else
        {
            return $this->db->query("SELECT DISTINCT ha.kode_akses, ha.kode_kelas, mk.nama_sekolah, mk.kelas, ha.hak_akses, ha.kode_jabatan, mj.jabatan
		FROM menu_hak_akses ha, master_kelas mk, master_jabatan mj
		WHERE ha.kode_kelas = mk.kode_kelas
		AND ha.kode_jabatan = mj.kode_jabatan 
		AND ha.kode_akses in (3)
		AND ha.kode_kelas = '".$_SESSION['kode_kelas']."'
		ORDER BY ha.kode_akses DESC");
        }
    }

    function input_data($table,$data){
        //$this->output->enable_profiler(TRUE);
        return $this->db->insert($table,$data);
    }
    function update_data($table,$where,$data){
        $this->db->where('kode_akses',$where);
        $this->db->update($table,$data);
        return true;
    }
    function delete_data($table, $where)
    {
        $this->db->where('kode_akses', $where);
        $this->db->delete($table);
    }
    function inactive_data($table,$where,$data){
        $this->db->where('kode_akses',$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>