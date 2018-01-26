<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterSiswa extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_siswa_model');
        $this->load->model('Logs_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Master_siswa_model->tampil_data()->result();

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/master/master_siswa', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function confirm($nis, $nama)
    {
        $nama = str_replace('%20', ' ', $nama);

        $data = array(
            'status' => 'Confirmed'
        );
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah mengkonfirmasi '.$nama.' sebagai anggota kelas',
            'link' => 'MasterSiswa',
            'icon' => 'mdi-account-check',
            'color' => 'success'
        );
        $this->Master_siswa_model->doConfirm('master_login', $nis, $data);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil dikonfirmasi!');
        redirect(site_url().'/MasterSiswa');
    }

    public function update()
    {
        $kode_user = $this->input->post('nis');
        $kode_jabatan = $this->input->post('kode_jabatan');
        $jabatan = $this->input->post('jabatan');
        $nama = $this->input->post('nama');
        $data = array(
            'kode_jabatan' => $kode_jabatan
        );
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah merubah '.$nama.' menjadi '.$jabatan,
            'link' => 'MasterSiswa',
            'icon' => 'mdi-account-edit',
            'color' => 'warning'
        );

        $this->Master_siswa_model->update_data('master_login', 'kode_user',$kode_user, $data);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/MasterSiswa');
    }

    public function preview($kode_user){

        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Master_siswa_model->preview($kode_user)->result();

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/master/master_siswa_preview', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function getJabatan($akses_jabatan)
    {
        $cek = $this->Master_siswa_model->getJabatan($akses_jabatan)->num_rows();

        if ($cek > 0 ){
            $result = $this->Master_siswa_model->getJabatan($akses_jabatan)->result();
            echo json_encode($result);
        }else{
            echo 'false';
        }

    }

    public function getKodeJabatan($akses_jabatan, $jabatan)
    {
        $jabatan = str_replace('%20', ' ', $jabatan);
        $cek = $this->Master_siswa_model->getKodeJabatan($akses_jabatan, $jabatan)->num_rows();

        if ($cek > 0 ){
            $result = $this->Master_siswa_model->getKodeJabatan($akses_jabatan, $jabatan)->result();
            echo json_encode($result);
        }else{
            echo 'false';
        }

    }

    public function delete($kode_user, $nama)
    {
        $nama = str_replace('%20', ' ', $nama);

        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah menghapus '.$nama.' dari anggota kelas',
            'link' => 'MasterSiswa',
            'icon' => 'mdi-account-minus',
            'color' => 'danger'
        );

        $this->Master_siswa_model->delete_data('master_siswa', 'NIS', $kode_user);
        $this->Master_siswa_model->delete_data('master_login', 'kode_user', $kode_user);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('MasterSiswa');
    }

}
?>