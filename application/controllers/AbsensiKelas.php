<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AbsensiKelas extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Absensi_kelas_model');
        $this->load->model('Logs_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Absensi_kelas_model->tampil_data()->result();
            $kode_absensi = 'AK/'.$_SESSION['kode_kelas'].'/'.str_replace('-', '', date('d-m-Y'));
            $data['check'] = $this->Absensi_kelas_model->checkGetKodeAbsensi()->row('kode_absensi');
            $data['izin'] = $this->Absensi_kelas_model->countPermission()->row('numb');
            $data['sakit'] = $this->Absensi_kelas_model->countSick()->row('numb');
            $data['tidakMasuk'] = $this->Absensi_kelas_model->countSkipping()->row('numb');
            $data['izinAnak'] = $this->Absensi_kelas_model->countPermissionAnak()->row('numb');
            $data['sakitAnak'] = $this->Absensi_kelas_model->countSickAnak()->row('numb');
            $data['tidakMasukAnak'] = $this->Absensi_kelas_model->countSkippingAnak()->row('numb');

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/administrasi/absensi_kelas', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function getAbsen()
    {
        $check = $this->Absensi_kelas_model->checkGetKodeAbsensi()->row('kode_absensi');

        if ($check == ''){
            $kode_absensi = 'AK/'.$_SESSION['kode_kelas'].'/'.str_replace('-', '', date('d-m-Y'));
            $kode_kelas = $_SESSION['kode_kelas'];
            $tanggal = date('Y-m-d');
            $data = array(
                'kode_absensi' => $kode_absensi,
                'kode_kelas' => $kode_kelas,
                'tanggal' => $tanggal
            );
            $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => $_SESSION['nama'].' sedang mengabsen',
            'link' => 'AbsensiKelas',
            'icon' => 'mdi-book-open',
            'color' => 'success'
            );

            $this->Absensi_kelas_model->input_data('data_absensi', $data);
            $this->Logs_model->input_data('logs', $logs);

            redirect(site_url().'/AbsensiKelas/add');
        }else{
            redirect(site_url().'/AbsensiKelas');
        }
    }

    public function add()
    {
        if(isset($_SESSION['kode_user'])){
            $data['siswa'] = $this->Absensi_kelas_model->getStudent()->result();
            $data['kode_absensi'] = $this->Absensi_kelas_model->checkGetKodeAbsensi()->row('kode_absensi');

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/administrasi/absensi_kelas_add', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function insert()
    {
        $allStudent = $this->Absensi_kelas_model->getStudent()->result();

        foreach ($allStudent as $row):
            $kode_absensi = $this->input->post('kode_absensi');
            $kode_kelas = $_SESSION['kode_kelas'];
            $kode_user = $this->input->post('siswa-' . $row->NIS);
            $status = $this->input->post('status-' . $row->NIS);
            $data = array(
                'kode_absensi' => $kode_absensi,
                'kode_kelas' => $kode_kelas,
                'kode_user' => $kode_user,
                'status' => $status,
            );

            $this->Absensi_kelas_model->input_data('data_absensi_detail', $data);
        endforeach;

        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/AbsensiKelas');
    }

    public function edit($kode_absensi)
    {
        $kode_absensi = str_replace('-', '/', $kode_absensi);
        if(isset($_SESSION['kode_user'])){
            $data['detail'] = $this->Absensi_kelas_model->getDetail($kode_absensi)->result();
            $data['kode_absensi'] = $this->Absensi_kelas_model->getDetail($kode_absensi)->row('kode_absensi');;

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/administrasi/absensi_kelas_edit', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function update()
    {
        $kode_absensi = $this->input->post('kode_absensi');
        $detail = $this->Absensi_kelas_model->getDetail($kode_absensi)->result();

        foreach ($detail as $row):
            $kode_kelas = $_SESSION['kode_kelas'];
            $kode_user = $this->input->post('siswa-' . $row->kode_user);
            $status = $this->input->post('status-' . $row->kode_user);
            $data = array(
                'kode_absensi' => $kode_absensi,
                'kode_kelas' => $kode_kelas,
                'kode_user' => $kode_user,
                'status' => $status,
            );

            $this->Absensi_kelas_model->update_data('data_absensi_detail', 'id_detail', $row->id_detail, $data);
        endforeach;

        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => $_SESSION['nama'].' telah mengedit data absen',
            'link' => 'AbsensiKelas',
            'icon' => 'mdi-book-open',
            'color' => 'warning'
        );

        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/AbsensiKelas');
    }

    public function delete($kode_absensi)
    {
        $kode_absensi = str_replace('-', '/', $kode_absensi);

        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => $_SESSION['nama'].' sedang mengabsen',
            'link' => 'AbsensiKelas',
            'icon' => 'mdi-book-open',
            'color' => 'danger'
        );

        $this->Absensi_kelas_model->delete_data('data_absensi', 'kode_absensi', $kode_absensi);
        $this->Absensi_kelas_model->delete_data('data_absensi_detail', 'kode_absensi', $kode_absensi);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('AbsensiKelas');
    }

}
?>