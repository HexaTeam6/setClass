<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_mapel_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        if ($_SESSION['kode_kelas']==24101999)
        {
            return $this->db->query("
            SELECT djm.*, mg.nama_guru, mm.nama_matapelajaran, mr.nama_ruang
		    FROM data_jadwal_mapel djm, master_guru mg, master_matapelajaran mm, master_ruang mr
		    WHERE djm.NIP = mg.NIP
		    AND djm.kode_matapelajaran = mm.kode_matapelajaran
		    AND djm.kode_ruang = mr.kode_ruang
		    ORDER BY hari, jam_mulai ASC");
        }else{
            return $this->db->query("
            SELECT djm.*, mg.nama_guru, mm.nama_matapelajaran, mr.nama_ruang
		    FROM data_jadwal_mapel djm, master_guru mg, master_matapelajaran mm, master_ruang mr
		    WHERE djm.NIP = mg.NIP
		    AND djm.kode_matapelajaran = mm.kode_matapelajaran
		    AND djm.kode_ruang = mr.kode_ruang
		    AND djm.kode_kelas = '".$_SESSION['kode_kelas']."'
		    ORDER BY hari, jam_mulai ASC");
        }
    }

    function input_data($table,$data){
        //$this->output->enable_profiler(TRUE);
        return $this->db->insert($table,$data);
    }
    function update_data($table,$where,$data){
        $this->db->where('kode_jadwal',$where);
        $this->db->update($table,$data);
        return true;
    }
    function delete_data($table, $where)
    {
        $this->db->where('kode_jadwal', $where);
        $this->db->delete($table);
    }
    function inactive_data($table,$where,$data){
        $this->db->where('kode_jadwal',$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>