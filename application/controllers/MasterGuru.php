<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterGuru extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_guru_model');
        $this->load->model('Logs_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Master_guru_model->tampil_data()->result();

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/master/master_guru', $data);
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

            $this->load->view('menu/master/master_guru_add', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function edit($kode_guru)
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Master_guru_model->getGuru($kode_guru)->result();

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

//            var_dump($data);
            $this->load->view('menu/master/master_guru_edit', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function insert()
    {
        //upload file and get the name
        $foto = $this->uploadFile();

        $kode_kelas = $_SESSION['kode_kelas'];
        $NIP = $this->input->post('nip');
        $nama_guru = $this->input->post('nama');
        $jenis_kelamin = $this->input->post('jenisKelamin');
        $tempat_lahir = $this->input->post('tempatLahir');
        $tanggal_lahir = $this->input->post('tanggalLahir');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('telepon');

        $data = array(
            'kode_kelas' => $kode_kelas,
            'NIP' => $NIP,
            'nama_guru' => $nama_guru,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'foto' => $foto
        );
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah menambahkan data guru baru',
            'link' => 'MasterGuru',
            'icon' => 'mdi-account-card-details',
            'color' => 'success'
        );

        $this->Master_guru_model->input_data('master_guru', $data);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/MasterGuru');
    }

    public function update()
    {
        $foto = $this->uploadFile();

        $kode_guru = $this->input->post('kode_guru');
        $kode_kelas = $_SESSION['kode_kelas'];
        $NIP = $this->input->post('nip');
        $nama_guru = $this->input->post('nama');
        $jenis_kelamin = $this->input->post('jenisKelamin');
        $tempat_lahir = $this->input->post('tempatLahir');
        $tanggal_lahir = $this->input->post('tanggalLahir');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('telepon');

        if ($foto != ''){
            $data = array(
                'kode_kelas' => $kode_kelas,
                'NIP' => $NIP,
                'nama_guru' => $nama_guru,
                'jenis_kelamin' => $jenis_kelamin,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'alamat' => $alamat,
                'no_telp' => $no_telp,
                'foto' => $foto
            );
        }else{
            $data = array(
                'kode_kelas' => $kode_kelas,
                'NIP' => $NIP,
                'nama_guru' => $nama_guru,
                'jenis_kelamin' => $jenis_kelamin,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'alamat' => $alamat,
                'no_telp' => $no_telp
            );
        }
        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah mengedit data guru '.$nama_guru,
            'link' => 'MasterGuru',
            'icon' => 'mdi-account-card-details',
            'color' => 'warning'
        );

        $this->Master_guru_model->update_data('master_guru', $kode_guru, $data);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/MasterGuru');
    }

    public function preview($kode_guru){

        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Master_guru_model->getGuru($kode_guru)->result();

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/master/master_guru_preview', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function delete($kode_guru, $nama)
    {
        $nama = str_replace('%20', ' ', $nama);

        $logs = array(
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
            'message' => 'Telah menghapus data guru dengan nama '.$nama,
            'link' => 'MasterGuru',
            'icon' => 'mdi-account-card-details',
            'color' => 'danger'
        );

        $this->Master_guru_model->delete_data('master_guru', $kode_guru);
        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('MasterGuru');
    }

    public function checkUserInfo($nip)
    {
        $query = $this->Master_guru_model->selectUserInfo($nip);
        if (count($query->result()) > 0){
//            return true;
            echo "true";
        }else{
//            return false;
            echo "false";
        }
    }

    public function checkUpdate($kode_guru, $nip)
    {
        $query = $this->Master_guru_model->checkUpdate($kode_guru, $nip);
        if (count($query->result()) > 0){
//            return true;
            echo "true";
        }else{
//            return false;
            echo "false";
        }
    }

    public function uploadFile()
    {
        //Make directory
        if(!file_exists("assets/img/fotoGuru")){
            mkdir("assets/img/fotoGuru");
        }

        $config['upload_path'] = './assets/img/fotoGuru/';
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