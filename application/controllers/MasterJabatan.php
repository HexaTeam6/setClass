<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterJabatan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_jabatan_model');
        $this->load->model('Logs_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Master_jabatan_model->tampil_data()->result();

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

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
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah menambahkan jabatan '.$jabatan.' baru',
            'link' => 'Logs/getNewLogs/MasterJabatan',
            'icon' => 'ti-ruler-alt',
            'color' => 'success'
        );

        $this->Master_jabatan_model->input_data('master_jabatan', $data);
        $this->Logs_model->input_data('logs', $logs);
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
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah mengedit jabatan '.$jabatan,
            'link' => 'Logs/getNewLogs/MasterJabatan',
            'icon' => 'ti-ruler-alt',
            'color' => 'warning'
        );

        $this->Master_jabatan_model->update_data('master_jabatan', $id, $data);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/MasterJabatan');
    }

    public function delete($id,$jabatan)
    {
        $jabatan = str_replace('%20', ' ', $jabatan);

        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah menghapus jabatan '.$jabatan,
            'link' => 'Logs/getNewLogs/MasterJabatan',
            'icon' => 'ti-ruler-alt',
            'color' => 'danger'
        );

        $this->Master_jabatan_model->delete_data('master_jabatan', $id);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('MasterJabatan');
    }

}
?>