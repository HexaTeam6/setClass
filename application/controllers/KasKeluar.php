<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KasKeluar extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kas_keluar_model');
        $this->load->model('Logs_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Kas_keluar_model->tampil_data()->result();
            $data['kasPribadi'] = $this->Kas_keluar_model->kasPribadi()->row('nominal');
            $data['kasMasuk'] = $this->Kas_keluar_model->kasMasuk()->row('nominal');
            $data['kasKeluar'] = $this->Kas_keluar_model->kasKeluar()->row('nominal');
            $data['kasAnak'] = $this->Kas_keluar_model->kasAnak()->row('nominal');
            $data['kasKelas'] = $data['kasMasuk'] - $data['kasKeluar'];

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/keuangan/kas_keluar', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function insert()
    {
        $kode_kas_keluar = $this->Kas_keluar_model->getKode()->row('kode');
        $kode_user = $_SESSION['kode_user'];
        $kode_kelas = $_SESSION['kode_kelas'];
        $nominal = str_replace(',', '', $this->input->post('nominal'));
        $perihal = $this->input->post('perihal');
        $namaSiswa = $_SESSION['nama'];
        $data = array(
            'kode_kas_keluar' => $kode_kas_keluar,
            'kode_user' => $kode_user,
            'kode_kelas' => $kode_kelas,
            'nominal' => $nominal,
            'perihal' => $perihal
        );
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => $namaSiswa.' telah menggunakan uang kas',
            'link' => 'KasKeluar',
            'icon' => 'mdi-package-up',
            'color' => 'success'
        );

        $this->Kas_keluar_model->input_data('kas_keluar', $data);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/KasKeluar');
    }

    public function update()
    {
        $kode_kas_keluar = $this->input->post('kode_kas_keluar');
        $kode_user = $_SESSION['kode_user'];
        $kode_kelas = $_SESSION['kode_kelas'];
        $nominal = str_replace(',', '', $this->input->post('nominal'));
        $perihal = $this->input->post('perihal');
        $namaSiswa = $_SESSION['nama'];
        $data = array(
            'kode_kas_keluar' => $kode_kas_keluar,
            'kode_user' => $kode_user,
            'kode_kelas' => $kode_kelas,
            'nominal' => $nominal,
            'perihal' => $perihal
        );
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => $namaSiswa.' telah mengubah transaksi kas keluar',
            'link' => 'KasKeluar',
            'icon' => 'mdi-package-up',
            'color' => 'warning'
        );

        $this->Kas_keluar_model->update_data('kas_keluar', $kode_kas_keluar, $data);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/KasKeluar');
    }

    public function delete($kode_kas_keluar)
    {
        $kode_kas_keluar = str_replace('-', '/', $kode_kas_keluar);

        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah menghapus transaksi '.$kode_kas_keluar,
            'link' => 'KasKeluar',
            'icon' => 'mdi-package-up',
            'color' => 'danger'
        );

        $this->Kas_keluar_model->delete_data('kas_keluar', $kode_kas_keluar);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('KasKeluar');
    }

    public function excel()
    {
        require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $excel = new PHPExcel();

        $excel->getProperties()->setCreator('setClass');
        $excel->getProperties()->setTitle('Kas Keluar');

        $excel->setActiveSheetIndex(0);

        $excel->getActiveSheet()->setCellValue('A1','Kode Kas Keluar');
        $excel->getActiveSheet()->setCellValue('B1','Nama');
        $excel->getActiveSheet()->setCellValue('C1','Nominal');
        $excel->getActiveSheet()->setCellValue('D1','Perihal');
        $excel->getActiveSheet()->setCellValue('E1','Keterangan');

        $data = $this->Kas_keluar_model->tampil_data()->result();
        $row = 2;
        foreach ($data as $val){
            $excel->getActiveSheet()->setCellValue('A'.$row, $val->kode_kas_keluar);
            $excel->getActiveSheet()->setCellValue('B'.$row, $val->nama);
            $excel->getActiveSheet()->setCellValue('C'.$row, $val->nominal);
            $excel->getActiveSheet()->setCellValue('D'.$row, $val->perihal);
            $excel->getActiveSheet()->setCellValue('E'.$row, 'Diterima '.date('d-m-Y', strtotime($val->created_at)).'( '.get_timeago(strtotime($val->created_at)).' )');

            $row++;
        }

        $filename = 'Kas Keluar '.date('d-m-Y-H-i-s').'.xlsx';

        $excel->getActiveSheet()->setTitle("Report-Kas Keluar");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $writer->save('php://output');
        exit;
    }

    public function pdf()
    {
        $this->load->library('Pdf');
        $data['data'] = $this->Kas_keluar_model->tampil_data()->result();
        $this->load->view('prints/Kas_keluar_print', $data);
    }

}
?>