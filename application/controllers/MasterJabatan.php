<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterJabatan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_jabatan_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Master_jabatan_model->tampil_data()->result();
            $this->load->view('menu/master/master_jabatan', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function insert()
    {
        $kode_jabatan = $this->input->post('kode');
        $kode_kelas = $_SESSION['kode_kelas'];
        $jabatan = $this->input->post('jabatan');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'kode_jabatan' => $kode_jabatan,
            'kode_kelas' => $kode_kelas,
            'jabatan' => $jabatan,
            'keterangan' => $keterangan
        );

        $this->Master_jabatan_model->input_data('master_jabatan', $data);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/MasterJabatan');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $kode_jabatan = $this->input->post('kode');
        $kode_kelas = $_SESSION['kode_kelas'];
        $jabatan = $this->input->post('jabatan');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'kode_jabatan' => $kode_jabatan,
            'kode_kelas' => $kode_kelas,
            'jabatan' => $jabatan,
            'keterangan' => $keterangan
        );

        $this->Master_jabatan_model->update_data('master_jabatan', $id, $data);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/MasterJabatan');
    }

    public function delete($kode_menu_child)
    {
        $this->Menu_child_model->delete_data('menu_child', $kode_menu_child);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('MenuChild');
    }

}
?>