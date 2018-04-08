<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KasMasuk extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kas_masuk_model');
        $this->load->model('Logs_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Kas_masuk_model->tampil_data()->result();
            $data['siswa'] = $this->Kas_masuk_model->getStudent()->result();
            $data['kasPribadi'] = $this->Kas_masuk_model->kasPribadi()->row('nominal');
            $data['kasMasuk'] = $this->Kas_masuk_model->kasMasuk()->row('nominal');
            $data['kasKeluar'] = $this->Kas_masuk_model->kasKeluar()->row('nominal');
            $data['kasAnak'] = $this->Kas_masuk_model->kasAnak()->row('nominal');
            $data['kasKelas'] = $data['kasMasuk'] - $data['kasKeluar'];

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/keuangan/kas_masuk', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function insert()
    {
        $kode_kas_masuk = $this->Kas_masuk_model->getKode()->row('kode');
        $kode_user = $this->input->post('siswa');
        $kode_kelas = $_SESSION['kode_kelas'];
        $penerima = $_SESSION['kode_user'];
        $nominal = str_replace(',', '', $this->input->post('nominal'));
        $namaSiswa = $this->input->post('namaSiswa');
        $data = array(
            'kode_kas_masuk' => $kode_kas_masuk,
            'kode_user' => $kode_user,
            'kode_kelas' => $kode_kelas,
            'penerima' => $penerima,
            'nominal' => $nominal
        );
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => $namaSiswa.' telah membayar kas',
            'link' => 'KasMasuk',
            'icon' => 'mdi-package-down',
            'color' => 'success'
        );

        $this->Kas_masuk_model->input_data('kas_masuk', $data);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/KasMasuk');
    }

    public function update()
    {
        $kode_kas_masuk = $this->input->post('kode_kas_masuk');
        $kode_user = $this->input->post('siswa');
        $kode_kelas = $_SESSION['kode_kelas'];
        $penerima = $_SESSION['kode_user'];
        $nominal = str_replace(',', '', $this->input->post('nominal'));
        $namaSiswa = $this->input->post('namaSiswa');
        $data = array(
            'kode_kas_masuk' => $kode_kas_masuk,
            'kode_user' => $kode_user,
            'kode_kelas' => $kode_kelas,
            'penerima' => $penerima,
            'nominal' => $nominal
        );
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah merubah transaksi kas '.$namaSiswa,
            'link' => 'KasMasuk',
            'icon' => 'mdi-package-down',
            'color' => 'warning'
        );

        $this->Kas_masuk_model->update_data('kas_masuk', $kode_kas_masuk, $data);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/KasMasuk');
    }

    public function delete($kode_kas_masuk)
    {
        $kode_kas_masuk = str_replace('-', '/', $kode_kas_masuk);

        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah menghapus transaksi '.$kode_kas_masuk,
            'link' => 'KasMasuk',
            'icon' => 'mdi-package-down',
            'color' => 'danger'
        );

        $this->Kas_masuk_model->delete_data('kas_masuk', $kode_kas_masuk);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('KasMasuk');
    }

    public function excel()
    {
        require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $excel = new PHPExcel();

        $excel->getProperties()->setCreator('setClass');
        $excel->getProperties()->setTitle('Kas Masuk');

        $excel->setActiveSheetIndex(0);

        $excel->getActiveSheet()->setCellValue('A1','Kode Kas Masuk');
        $excel->getActiveSheet()->setCellValue('B1','Nama');
        $excel->getActiveSheet()->setCellValue('C1','Penerima');
        $excel->getActiveSheet()->setCellValue('D1','Nominal');
        $excel->getActiveSheet()->setCellValue('E1','Keterangan');

        $data = $this->Kas_masuk_model->tampil_data()->result();
        $row = 2;
        foreach ($data as $val){
            $excel->getActiveSheet()->setCellValue('A'.$row, $val->kode_kas_masuk);
            $excel->getActiveSheet()->setCellValue('B'.$row, $val->nama);
            $excel->getActiveSheet()->setCellValue('C'.$row, $val->nama_penerima);
            $excel->getActiveSheet()->setCellValue('D'.$row, $val->nominal);
            $excel->getActiveSheet()->setCellValue('E'.$row, 'Diterima '.date('d-m-Y', strtotime($val->created_at)).'( '.get_timeago(strtotime($val->created_at)).' )');

            $row++;
        }

        $filename = 'Kas Masuk '.date('d-m-Y-H-i-s').'.xlsx';

        $excel->getActiveSheet()->setTitle("Report-Kas Masuk");

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
        $data['data'] = $this->Kas_masuk_model->tampil_data()->result();
        $this->load->view('prints/Kas_masuk_print', $data);
    }

}
?>