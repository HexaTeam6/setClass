<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterRuang extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_ruang_model');
        $this->load->model('Logs_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Master_ruang_model->tampil_data()->result();

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/master/master_ruang', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function insert()
    {
        $kode_kelas = $_SESSION['kode_kelas'];
        $nama_ruang = $this->input->post('namaRuang');
        $data = array(
            'kode_kelas' => $kode_kelas,
            'nama_ruang' => $nama_ruang
        );
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah menambahkan ruang '.$nama_ruang,
            'link' => 'MasterRuang',
            'icon' => 'mdi-home-variant',
            'color' => 'success'
        );

        $this->Master_ruang_model->input_data('master_ruang', $data);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/MasterRuang');
    }

    public function update()
    {
        $kode_ruang = $this->input->post('kode_ruang');
        $kode_kelas = $_SESSION['kode_kelas'];
        $nama_ruang = $this->input->post('namaRuang');
        $data = array(
            'kode_kelas' => $kode_kelas,
            'nama_ruang' => $nama_ruang
        );
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah mengedit ruang '.$nama_ruang,
            'link' => 'MasterRuang',
            'icon' => 'mdi-home-variant',
            'color' => 'warning'
        );

        $this->Master_ruang_model->update_data('master_ruang', $kode_ruang, $data);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/MasterRuang');
    }

    public function delete($id,$nama_ruang)
    {
        $nama_ruang = str_replace('%20', ' ', $nama_ruang);

        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah menghapus ruang '.$nama_ruang,
            'link' => 'MasterRuang',
            'icon' => 'mdi-home-variant',
            'color' => 'danger'
        );

        $this->Master_ruang_model->delete_data('master_ruang', $id);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('MasterRuang');
    }

}
?>