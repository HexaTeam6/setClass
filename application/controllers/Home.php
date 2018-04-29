<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Logs_model');
        $this->load->model('Absensi_kelas_model');
        $this->load->model('Tabungan_kelas_model');
        $this->load->model('Kas_masuk_model');
        $this->load->model('Data_informasi_model');
        $this->load->model('Jadwal_mapel_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $data['tabunganPribadi'] = $this->Tabungan_kelas_model->tabunganPribadi()->row('nominal');
            $data['tabunganAnak'] = $this->Tabungan_kelas_model->tabunganAnak()->row('nominal');
            $data['tabunganKelas'] = $this->Tabungan_kelas_model->tabunganKelas()->row('nominal');

            $data['tidakMasukAnak'] = $this->Absensi_kelas_model->countSkippingAnak()->row('numb');
            $data['tidakMasuk'] = $this->Absensi_kelas_model->countSkipping()->row('numb');

            $data['kasMasuk'] = $this->Kas_masuk_model->kasMasuk()->row('nominal');
            $data['kasKeluar'] = $this->Kas_masuk_model->kasKeluar()->row('nominal');
            $data['kasAnak'] = $this->Kas_masuk_model->kasAnak()->row('nominal');
            $data['kasPribadi'] = $this->Kas_masuk_model->kasPribadi()->row('nominal');
            $data['kasKelas'] = $data['kasMasuk'] - $data['kasKeluar'];

            $data['informasi'] = $this->Data_informasi_model->infoBaru()->result();

            $day = '';
            switch(date('l')){
                case 'Monday': $day = '1';
                    break;
                case 'Tuesday': $day = '2';
                    break;
                case 'Wednesday': $day = '3';
                    break;
                case 'Thursday': $day = '4';
                    break;
                case 'Friday': $day = "5";
                    break;
                case 'Saturday': $day = '6';
                    break;
                case 'Monday': $day = '7';
                    break;
                default: $day = 'Tidak terdefinisi';
            }
            $data['jadwal'] = $this->Jadwal_mapel_model->todayJadwal($day)->result();

			$this->load->view('home', $data);
		}
		else{
			redirect(site_url().'/Auth/logout');
		}
    }

}
