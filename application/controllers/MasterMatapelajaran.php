<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterMatapelajaran extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_matapelajaran_model');
        $this->load->model('Logs_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Master_matapelajaran_model->tampil_data()->result();

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/master/master_matapelajaran', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function insert()
    {
        $kode_kelas = $_SESSION['kode_kelas'];
        $nama_matapelajaran = $this->input->post('namaMatapelajaran');
        $data = array(
            'kode_kelas' => $kode_kelas,
            'nama_matapelajaran' => $nama_matapelajaran
        );
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah menambahkan matapelajaran '.$nama_matapelajaran,
            'link' => 'MasterMatapelajaran',
            'icon' => 'mdi-book-open-page-variant',
            'color' => 'success'
        );

        $this->Master_matapelajaran_model->input_data('master_matapelajaran', $data);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/MasterMatapelajaran');
    }

    public function update()
    {
        $kode_matapelajaran = $this->input->post('kode_matapelajaran');
        $nama_matapelajaran = $this->input->post('namaMatapelajaran');
        $data = array(
            'nama_matapelajaran' => $nama_matapelajaran
        );
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah mengedit matapelajaran '.$nama_matapelajaran,
            'link' => 'MasterMatapelajaran',
            'icon' => 'mdi-book-open-page-variant',
            'color' => 'warning'
        );

        $this->Master_matapelajaran_model->update_data('master_matapelajaran', $kode_matapelajaran, $data);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/MasterMatapelajaran');
    }

    public function delete($id,$nama_matapelajaran)
    {
        $nama_matapelajaran = str_replace('%20', ' ', $nama_matapelajaran);

        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah menghapus matapelajaran '.$nama_matapelajaran,
            'link' => 'MasterMatapelajaran',
            'icon' => 'mdi-book-open-page-variant',
            'color' => 'danger'
        );

        $this->Master_matapelajaran_model->delete_data('master_matapelajaran', $id);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('MasterMatapelajaran');
    }

}
?>