<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihat_informasi_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        if ($_SESSION['kode_kelas']==24101999) {
            return $this->db->query("
            SELECT di.*, ml.nama, ml.foto, mj.jabatan, count(k.id_komentar) as komen
		    FROM master_login ml, master_jabatan mj, data_informasi di
		    LEFT JOIN komentar k ON (di.id_informasi = k.id_informasi)
		    WHERE di.kode_user = ml.kode_user
		    AND ml.kode_jabatan = mj.kode_jabatan
		    GROUP BY id_informasi
		    ORDER BY created_at DESC");
        }elseif($_SESSION['kode_akses'] == 2){
            return $this->db->query("
            SELECT di.*, ml.nama, ml.foto, mj.jabatan, count(k.id_komentar) as komen
		    FROM master_login ml, master_jabatan mj, data_informasi di
		    LEFT JOIN komentar k ON (di.id_informasi = k.id_informasi)
		    WHERE di.kode_kelas = ?
		    AND di.kode_user = ml.kode_user
		    AND ml.kode_jabatan = mj.kode_jabatan
		    GROUP BY id_informasi
		    ORDER BY created_at DESC
		    LIMIT 0,5", array($_SESSION['kode_kelas']));
        }else{
            return $this->db->query("
            SELECT di.*, ml.nama, ml.foto, mj.jabatan, count(k.id_komentar) as komen
		    FROM master_login ml, master_jabatan mj, data_informasi di
		    LEFT JOIN komentar k ON (di.id_informasi = k.id_informasi)
		    WHERE di.kode_kelas = ?
		    AND di.akses_jabatan IN (?,0)
		    AND di.kode_user = ml.kode_user
		    AND ml.kode_jabatan = mj.kode_jabatan
		    GROUP BY id_informasi
		    ORDER BY di.created_at DESC
		    LIMIT 0,5", array($_SESSION['kode_kelas'], $_SESSION['akses_jabatan']));
        }
    }

    function info($id){
        return $this->db->query("SELECT di.*, ml.nama, ml.foto, mj.jabatan 
                                 FROM data_informasi di, master_login ml, master_jabatan mj
                                 WHERE di.id_informasi = ?
                                 AND di.kode_user = ml.kode_user
                                 AND ml.kode_jabatan = mj.kode_jabatan", array($id));
    }

    function komentar($id){
        return $this->db->query("SELECT k.*, ml.nama, ml.foto, mj.jabatan 
                                 FROM komentar k, master_login ml, master_jabatan mj
                                 WHERE k.id_informasi = ?
                                 AND k.kode_user = ml.kode_user
                                 AND ml.kode_jabatan = mj.kode_jabatan", array($id));
    }

    function input_data($table,$data){
        //$this->output->enable_profiler(TRUE);
        return $this->db->insert($table,$data);
    }
    function update_data($table,$where,$data){
        $this->db->where('id_komentar',$where);
        $this->db->update($table,$data);
        return true;
    }
    function delete_data($table, $where)
    {
        $this->db->where('id_komentar', $where);
        $this->db->delete($table);
    }
    function inactive_data($table,$where,$data){
        $this->db->where('id_komentar',$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>