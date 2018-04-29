<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_informasi_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        if ($_SESSION['kode_kelas']==24101999) {
            return $this->db->query("
            SELECT di.*, ml.nama
		    FROM data_informasi di, master_login ml
		    WHERE di.kode_user = ml.kode_user
		    ORDER BY created_at DESC");
        }elseif($_SESSION['kode_akses'] == 2){
            return $this->db->query("
            SELECT di.*, ml.nama
		    FROM data_informasi di, master_login ml
		    WHERE di.kode_kelas = ?
		    AND di.kode_user = ml.kode_user
		    ORDER BY created_at DESC", array($_SESSION['kode_kelas']));
        }else{
            return $this->db->query("
            SELECT di.*, ml.nama
		    FROM data_informasi di, master_login ml
		    WHERE di.kode_kelas = ?
		    AND di.akses_jabatan IN (?,0)
		    AND di.kode_user = ml.kode_user
		    ORDER BY created_at DESC", array($_SESSION['kode_kelas'], $_SESSION['akses_jabatan']));
        }
    }

    function infoBaru(){
        if($_SESSION['kode_akses'] == 2){
            return $this->db->query("
                        SELECT di.*, ml.nama, mj.jabatan
                        FROM data_informasi di, master_login ml, master_jabatan mj
                        WHERE di.kode_kelas = ?
                        AND ml.kode_jabatan = mj.kode_jabatan
                        AND di.kode_user = ml.kode_user
                        ORDER BY created_at DESC
                        LIMIT 3", array($_SESSION['kode_kelas']));
        }else{
            return $this->db->query("
                    SELECT di.*, ml.nama, mj.jabatan
                    FROM data_informasi di, master_login ml, master_jabatan mj
                    WHERE di.kode_kelas = ?
                    AND ml.kode_jabatan = mj.kode_jabatan
                    AND di.akses_jabatan IN (?,0)
                    AND di.kode_user = ml.kode_user
                    ORDER BY created_at DESC
                    LIMIT 3", array($_SESSION['kode_kelas'], $_SESSION['akses_jabatan']));
        }
    }

    function edit($id){
        return $this->db->query("SELECT * FROM data_informasi WHERE id_informasi = ?", array($id));
    }

    function input_data($table,$data){
        //$this->output->enable_profiler(TRUE);
        return $this->db->insert($table,$data);
    }
    function update_data($table,$where,$data){
        $this->db->where('id_informasi',$where);
        $this->db->update($table,$data);
        return true;
    }
    function delete_data($table, $where)
    {
        $this->db->where('id_informasi', $where);
        $this->db->delete($table);
    }
    function inactive_data($table,$where,$data){
        $this->db->where('id_informasi',$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>