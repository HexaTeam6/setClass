<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataInformasi extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_informasi_model');
        $this->load->model('Logs_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Data_informasi_model->tampil_data()->result();

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/informasi/data_informasi', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function add()
    {
        if(isset($_SESSION['kode_user'])){

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/informasi/add_informasi', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function edit($id)
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Data_informasi_model->edit($id)->result();

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/informasi/edit_informasi', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function insert()
    {
        $foto = $this->uploadFile();

        $isi_informasi = $this->input->post('isiInformasi');
        $kode_user = $_SESSION['kode_user'];
        $kode_kelas = $_SESSION['kode_kelas'];
        $akses_jabatan = $this->input->post('aksesJabatan');
        $data = array(
            'isi_informasi' => $isi_informasi,
            'gambar' => $foto,
            'kode_user' => $kode_user,
            'kode_kelas' => $kode_kelas,
            'akses_jabatan' => $akses_jabatan
        );
        $this->Data_informasi_model->input_data('data_informasi', $data);
        $id_informasi = $this->db->insert_id();

        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah menambahkan informasi baru',
            'link' => 'LihatInformasi-info-'.$id_informasi,
            'icon' => 'mdi-information-variant',
            'color' => 'success'
        );

        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/DataInformasi');
    }

    public function update()
    {
        $foto = $this->uploadFile();

        $id_informasi = $this->input->post('idInformasi');
        $isi_informasi = $this->input->post('isiInformasi');
        $kode_user = $_SESSION['kode_user'];
        $kode_kelas = $_SESSION['kode_kelas'];
        $akses_jabatan = $this->input->post('aksesJabatan');
        if ($foto != ''){
            $data = array(
                'isi_informasi' => $isi_informasi,
                'gambar' => $foto,
                'kode_user' => $kode_user,
                'kode_kelas' => $kode_kelas,
                'akses_jabatan' => $akses_jabatan
            );
        }else{
            $data = array(
                'isi_informasi' => $isi_informasi,
                'kode_user' => $kode_user,
                'kode_kelas' => $kode_kelas,
                'akses_jabatan' => $akses_jabatan
            );
        }
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah memperbarui informasi',
            'link' => 'LihatInformasi-info-'.$id_informasi,
            'icon' => 'mdi-information-variant',
            'color' => 'warning'
        );

        $this->Data_informasi_model->update_data('data_informasi', $id_informasi, $data);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/DataInformasi/edit/'.$id_informasi);
    }

    public function delete($id,$nama)
    {
        $nama = str_replace('%20', ' ', $nama);

        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah menghapus informasi yang dibuat '.$nama,
            'link' => 'DataInformasi',
            'icon' => 'mdi-information-variant',
            'color' => 'danger'
        );

        $this->Data_informasi_model->delete_data('data_informasi', $id);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('DataInformasi');
    }

    public function uploadFile()
    {
        //Make directory
        if(!file_exists("assets/img/informasi")){
            mkdir("assets/img/informasi");
        }

        $config['upload_path'] = './assets/img/informasi/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $this->upload->do_upload('foto');

        $upload_data = $this->upload->data();

        $file_name = $upload_data['file_name'];

        return $file_name;

    }

}
?>