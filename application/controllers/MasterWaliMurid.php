<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterWaliMurid extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_wali_murid_model');
        $this->load->model('Logs_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Master_wali_murid_model->tampil_data()->result();

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/master/master_wali_murid', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function confirm($nik, $nama)
    {
        $nama = str_replace('%20', ' ', $nama);

        $data = array(
            'status' => 'Confirmed'
        );
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah mengkonfirmasi '.$nama.' sebagai Wali murid',
            'link' => 'MasterWaliMurid',
            'icon' => 'mdi-account-check',
            'color' => 'success'
        );
        $this->Master_wali_murid_model->doConfirm('master_login', $nik, $data);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil dikonfirmasi!');
        redirect(site_url().'/MasterWaliMurid');
    }

    public function preview($kode_user){

        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Master_wali_murid_model->preview($kode_user)->result();

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/master/master_wali_murid_preview', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function delete($kode_user, $nama)
    {
        $nama = str_replace('%20', ' ', $nama);

        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah menghapus '.$nama.' dari anggota kelas',
            'link' => 'MasterWaliMurid',
            'icon' => 'mdi-account-minus',
            'color' => 'danger'
        );

        $this->Master_wali_murid_model->delete_data('master_wali_murid', 'NIK', $kode_user);
        $this->Master_wali_murid_model->delete_data('master_login', 'kode_user', $kode_user);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('MasterWaliMurid');
    }

}
?>