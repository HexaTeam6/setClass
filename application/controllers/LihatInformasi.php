<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LihatInformasi extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lihat_informasi_model');
        $this->load->model('Logs_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Lihat_informasi_model->tampil_data()->result();

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/informasi/all_informasi', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function info($id)
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Lihat_informasi_model->info($id)->result();
            $data['komentar'] = $this->Lihat_informasi_model->komentar($id)->result();
            $cek = $this->Lihat_informasi_model->info($id)->row()->akses_jabatan;

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            if ($cek == $_SESSION['akses_jabatan'] || $cek == 0 || $_SESSION['akses_jabatan'] == 2 || $_SESSION['akses_jabatan'] == 1){
                $this->load->view('menu/informasi/info_informasi', $data);
            }else{
                $this->session->set_flashdata('error', 'Tidak memiliki akses!');
                redirect(site_url().'/LihatInformasi');
            }
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function comment()
    {
        $id_informasi = $this->input->post('id_informasi');
        $isi_komentar = $this->input->post('isiKomentar');
        $kode_user = $_SESSION['kode_user'];
        $kode_kelas = $_SESSION['kode_kelas'];
        $data = array(
            'isi_komentar' => $isi_komentar,
            'id_informasi' => $id_informasi,
            'kode_user' => $kode_user,
            'kode_kelas' => $kode_kelas
        );
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah mengomentari sebuah postingan',
            'link' => 'LihatInformasi-info-'.$id_informasi,
            'icon' => 'mdi-comment-alert',
            'color' => 'warning'
        );

        $this->Lihat_informasi_model->input_data('komentar', $data);
        $this->Logs_model->input_data('logs', $logs);

        redirect(site_url().'/LihatInformasi/info/'.$id_informasi);
    }

    public function delete($id, $id_informasi)
    {
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah menghapus komentar pada sebuah postingan',
            'link' => 'LihatInformasi-info-'.$id_informasi,
            'icon' => 'mdi-comment-alert',
            'color' => 'danger'
        );

        $this->Lihat_informasi_model->delete_data('komentar', $id);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        redirect(site_url().'/LihatInformasi/info/'.$id_informasi);
    }
}
?>