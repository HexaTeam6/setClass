<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserProfile extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->User_model->tampil_data()->result();
            $this->load->view('menu/pengaturan/user_profile', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function update()
    {
        $nama = $this->input->post('nama');
        $jenis_kelamin = $this->input->post('jenisKelamin');
        $tempat_lahir = $this->input->post('tempatLahir');
        $tanggal_lahir = $this->input->post('tanggalLahir');
        $no_telp = $this->input->post('nomerTelepon');
        $alamat = $this->input->post('alamat');
        $dataUser = array(
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'no_telp' => $no_telp,
            'alamat' => $alamat
        );
        $dataLogin = array(
            'nama' => $nama
        );

        switch ($_SESSION['kode_akses']){
            case '2' : $this->User_model->update_data('NIP' ,'master_wali_kelas', $_SESSION['kode_user'], $dataUser);
            break;
            case '3' : $this->User_jabatan_model->update_data('NIS' ,'master_siswa', $_SESSION['kode_user'], $dataUser);
            break;
            case '4' : $this->User_jabatan_model->update_data('NIK' ,'master_ortu', $_SESSION['kode_user'], $dataUser);
            break;
            default : '';
        }

        $this->User_model->update_data('kode_user' ,'master_login', $_SESSION['kode_user'], $dataLogin);
        $this->session->set_userdata("nama",$nama);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/UserProfile');
    }

    public function uploadFile()
    {
        //Delete recent image

        $recentImage = $this->User_model->selectUserInfo($_SESSION['kode_user'])->row()->foto;
        if(file_exists("assets/img/userProfile/".$recentImage)){
            unlink("assets/img/userProfile/".$recentImage);
        }

        $config['upload_path'] = './assets/img/userProfile/';
        $config['allowed_types'] = 'jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $this->upload->do_upload('foto');

        $upload_data = $this->upload->data();

        $file_name = $upload_data['file_name'];

        $data = array(
            'foto' => $file_name
        );

        switch ($_SESSION['kode_akses']){
            case '2' : $this->User_model->update_data('NIP' ,'master_wali_kelas', $_SESSION['kode_user'], $data);
                break;
            case '3' : $this->User_jabatan_model->update_data('NIS' ,'master_siswa', $_SESSION['kode_user'], $data);
                break;
            case '4' : $this->User_jabatan_model->update_data('NIK' ,'master_ortu', $_SESSION['kode_user'], $data);
                break;
            default : '';
        }
        $this->User_model->update_data('kode_user' ,'master_login', $_SESSION['kode_user'], $data);
        $this->session->set_userdata("foto",$file_name);
        $this->session->set_flashdata('msg', 'Berhasil diupload!');

        redirect(site_url().'/UserProfile');

    }

}
?>