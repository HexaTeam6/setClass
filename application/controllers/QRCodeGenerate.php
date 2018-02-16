<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QRCodeGenerate extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Absensi_kelas_model');
        $this->load->model('Logs_model');
        $this->load->library('ciqrcode');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user']) && $_SESSION['26insert'] == 1 && ($_SESSION['akses_jabatan'] == 2 || $_SESSION['akses_jabatan'] == 3 || $_SESSION['akses_jabatan'] == 4)){

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

                //Set all student to alpha
                $students = $this->Absensi_kelas_model->getStudent()->result();
                foreach ($students as $row):
                    $data = array(
                        'kode_absensi' => $kode_absensi,
                        'kode_kelas' => $_SESSION['kode_kelas'],
                        'kode_user' => $row->NIS,
                        'status' => 'Tidak Masuk'
                    );
                    $this->Absensi_kelas_model->input_data('data_absensi_detail', $data);
                endforeach;


                $kode['kode_absensi'] = $kode_absensi;
                $this->load->view('menu/administrasi/absensi_kelas_qr', $kode);
            }else{
                redirect(site_url().'/AbsensiKelas');
            }
        }
        else{
            redirect(site_url().'/Home');
        }
    }

    public function generateQr($kode_absensi)
    {
        header('Content-Type: image/png');
        //get the current network IP (change if have domain)
        $qr['data'] = 'http://'.gethostbyname(gethostname()).'/setClass/index.php/QRCodeGenerate/getAbsen/'.$kode_absensi;
        $qr['size'] = 10;
        $this->ciqrcode->generate($qr);
    }

    public function getAbsen($kode_absensi)
    {
        $kode_absensi = str_replace('-', '/', $kode_absensi);
        if (isset($_SESSION['kode_user'])){
            $this->db
                ->set('status', 'Masuk')
                ->where('kode_absensi', $kode_absensi)
                ->where('kode_user', $_SESSION['kode_user'])
                ->update('data_absensi_detail');

            $this->session->set_flashdata('msg', 'Berhasil absensi!');
            redirect(site_url().'/AbsensiKelas');
        }else{
            redirect(site_url().'/Auth/masuk');
        }
    }
}
