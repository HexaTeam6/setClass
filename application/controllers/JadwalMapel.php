<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalMapel extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_mapel_model');
        $this->load->model('Master_ruang_model');
        $this->load->model('Master_guru_model');
        $this->load->model('Master_matapelajaran_model');
        $this->load->model('Logs_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Jadwal_mapel_model->tampil_data()->result();
            $data['ruang'] = $this->Master_ruang_model->listRuang()->result();
            $data['guru'] = $this->Master_guru_model->listGuru()->result();
            $data['mapel'] = $this->Master_matapelajaran_model->listMatapelajaran()->result();

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/administrasi/jadwal_mapel', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function insert()
    {
        $kode_kelas = $_SESSION['kode_kelas'];
        $NIP = $this->input->post('NIP');
        $kode_matapelajaran = $this->input->post('kode_matapelajaran');
        $kode_ruang = $this->input->post('kode_ruang');
        $hari = $this->input->post('hari');
        $jam_mulai = $this->input->post('jam_mulai');
        $jam_selesai = $this->input->post('jam_selesai');
        $data = array(
            'kode_kelas' => $kode_kelas,
            'NIP' => $NIP,
            'kode_matapelajaran' => $kode_matapelajaran,
            'kode_ruang' => $kode_ruang,
            'hari' => $hari,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai,
        );
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah menambahkan Jadwal baru',
            'link' => 'JadwalMapel',
            'icon' => 'mdi-calendar-clock',
            'color' => 'success'
        );

        $this->Jadwal_mapel_model->input_data('data_jadwal_mapel', $data);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/JadwalMapel');
    }

    public function update()
    {
        $kode_jadwal = $this->input->post('kode_jadwal');
        $kode_kelas = $_SESSION['kode_kelas'];
        $NIP = $this->input->post('NIP');
        $kode_matapelajaran = $this->input->post('kode_matapelajaran');
        $kode_ruang = $this->input->post('kode_ruang');
        $hari = $this->input->post('hari');
        $jam_mulai = $this->input->post('jam_mulai');
        $jam_selesai = $this->input->post('jam_selesai');
        $data = array(
            'kode_kelas' => $kode_kelas,
            'NIP' => $NIP,
            'kode_matapelajaran' => $kode_matapelajaran,
            'kode_ruang' => $kode_ruang,
            'hari' => $hari,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai,
        );
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah merubah Jadwal',
            'link' => 'JadwalMapel',
            'icon' => 'mdi-calendar-clock',
            'color' => 'warning'
        );

        $this->Jadwal_mapel_model->update_data('data_jadwal_mapel', $kode_jadwal, $data);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/JadwalMapel');
    }

    public function delete($id,$nama_ruang)
    {
        $nama_ruang = str_replace('%20', ' ', $nama_ruang);

        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah menghapus jadwal '.$nama_ruang,
            'link' => 'JadwalMapel',
            'icon' => 'mdi-calendar-clock',
            'color' => 'danger'
        );

        $this->Jadwal_mapel_model->delete_data('data_jadwal_mapel', $id);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('JadwalMapel');
    }

    public function excel()
    {
        require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $excel = new PHPExcel();

        $excel->getProperties()->setCreator('setClass');
        $excel->getProperties()->setTitle('Jadwal Matapelajaran');

        $excel->setActiveSheetIndex(0);

        $excel->getActiveSheet()->setCellValue('A1','Guru');
        $excel->getActiveSheet()->setCellValue('B1','Matapelajaran');
        $excel->getActiveSheet()->setCellValue('C1','Ruang');
        $excel->getActiveSheet()->setCellValue('D1','Hari');
        $excel->getActiveSheet()->setCellValue('E1','Jam');

        $data = $this->Jadwal_mapel_model->tampil_data()->result();
        $row = 2;
        $hari = '';
        $jamSelesai = '';
        $jamMulai = '';
        foreach ($data as $val){
            $excel->getActiveSheet()->setCellValue('A'.$row, $val->nama_guru);
            $excel->getActiveSheet()->setCellValue('B'.$row, $val->nama_matapelajaran);
            $excel->getActiveSheet()->setCellValue('C'.$row, $val->nama_ruang);
            switch ($val->hari){
                case 1 : $hari = 'Senin';
                    break;
                case 2 : $hari = 'Selasa';
                    break;
                case 3 : $hari = 'Rabu';
                    break;
                case 4 : $hari = 'Kamis';
                    break;
                case 5 : $hari = "Jum'at";
                    break;
                case 6 : $hari = 'Sabtu';
                    break;
                default : $hari = 'Tidak terdefinisi';
            }
            $excel->getActiveSheet()->setCellValue('D'.$row, $hari);
            $jamMulai = explode(':',$val->jam_mulai);
            $jamSelesai = explode(':',$val->jam_selesai);
            $excel->getActiveSheet()->setCellValue('E'.$row, $jamMulai[0].':'.$jamMulai[1].' - '.$jamSelesai[0].':'.$jamSelesai[1]);

            $row++;
        }

        $filename = 'Jadwal Matapelajaran '.date('d-m-Y-H-i-s').'.xlsx';

        $excel->getActiveSheet()->setTitle("Report-Jadwal Matapelajaran");

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
        $data['data'] = $this->Jadwal_mapel_model->tampil_data()->result();
        $this->load->view('prints/Jadwal_mapel_print', $data);
    }

}
?>