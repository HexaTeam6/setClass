<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TabunganKelas extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tabungan_kelas_model');
        $this->load->model('Logs_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Tabungan_kelas_model->tampil_data()->result();
            $data['siswa'] = $this->Tabungan_kelas_model->getStudent()->result();
            $data['tabunganPribadi'] = $this->Tabungan_kelas_model->tabunganPribadi()->row('nominal');
            $data['tabunganAnak'] = $this->Tabungan_kelas_model->tabunganAnak()->row('nominal');
            $data['tabunganKelas'] = $this->Tabungan_kelas_model->tabunganKelas()->row('nominal');

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/keuangan/tabungan_kelas', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function insert()
    {
        $kode_tabungan = $this->Tabungan_kelas_model->getKode()->row('kode');
        $kode_user = $this->input->post('siswa');
        $kode_kelas = $_SESSION['kode_kelas'];
        $penerima = $_SESSION['kode_user'];
        $nominal = str_replace(',', '', $this->input->post('nominal'));
        $namaSiswa = $this->input->post('namaSiswa');
        $data = array(
            'kode_tabungan' => $kode_tabungan,
            'kode_user' => $kode_user,
            'kode_kelas' => $kode_kelas,
            'penerima' => $penerima,
            'nominal' => $nominal
        );
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => $namaSiswa.' telah menabung',
            'link' => 'TabunganKelas',
            'icon' => 'mdi-cash',
            'color' => 'success'
        );

        $this->Tabungan_kelas_model->input_data('data_tabungan', $data);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/TabunganKelas');
    }

    public function update()
    {
        $kode_tabungan = $this->input->post('kode_tabungan');
        $kode_user = $this->input->post('siswa');
        $kode_kelas = $_SESSION['kode_kelas'];
        $penerima = $_SESSION['kode_user'];
        $nominal = str_replace(',', '', $this->input->post('nominal'));
        $namaSiswa = $this->input->post('namaSiswa');
        $data = array(
            'kode_tabungan' => $kode_tabungan,
            'kode_user' => $kode_user,
            'kode_kelas' => $kode_kelas,
            'penerima' => $penerima,
            'nominal' => $nominal
        );
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah merubah transaksi tabungan '.$namaSiswa,
            'link' => 'TabunganKelas',
            'icon' => 'mdi-cash',
            'color' => 'warning'
        );

        $this->Tabungan_kelas_model->update_data('data_tabungan', $kode_tabungan, $data);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/TabunganKelas');
    }

    public function delete($kode_tabungan)
    {
        $kode_tabungan = str_replace('-', '/', $kode_tabungan);

        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah menghapus transaksi '.$kode_tabungan,
            'link' => 'TabunganKelas',
            'icon' => 'mdi-cash',
            'color' => 'danger'
        );

        $this->Tabungan_kelas_model->delete_data('data_tabungan', $kode_tabungan);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('TabunganKelas');
    }

    public function excel()
    {
        require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $excel = new PHPExcel();

        $excel->getProperties()->setCreator('setClass');
        $excel->getProperties()->setTitle('Data Tabungan Kelas');

        $excel->setActiveSheetIndex(0);

        $excel->getActiveSheet()->setCellValue('A1','Kode Tabungan');
        $excel->getActiveSheet()->setCellValue('B1','Nama');
        $excel->getActiveSheet()->setCellValue('C1','Penerima');
        $excel->getActiveSheet()->setCellValue('D1','Nominal');
        $excel->getActiveSheet()->setCellValue('E1','Keterangan');

        $data = $this->Tabungan_kelas_model->tampil_data()->result();
        $row = 2;
        foreach ($data as $val){
            $excel->getActiveSheet()->setCellValue('A'.$row, $val->kode_tabungan);
            $excel->getActiveSheet()->setCellValue('B'.$row, $val->nama);
            $excel->getActiveSheet()->setCellValue('C'.$row, $val->nama_penerima);
            $excel->getActiveSheet()->setCellValue('D'.$row, $val->nominal);
            $excel->getActiveSheet()->setCellValue('E'.$row, 'Diterima '.date('d-m-Y', strtotime($val->created_at)).'( '.get_timeago(strtotime($val->created_at)).' )');

            $row++;
        }

        $filename = 'Data Tabungan '.date('d-m-Y-H-i-s').'.xlsx';

        $excel->getActiveSheet()->setTitle("Report-Data Tabungan");

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
        $data['data'] = $this->Tabungan_kelas_model->tampil_data()->result();
        $this->load->view('prints/Tabungan_kelas_print', $data);
    }
}
?>