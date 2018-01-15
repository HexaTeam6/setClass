<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarSiswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Daftar_model');
        $this->load->model('User_model');
        $this->load->model('Logs_model');
    }

    public function index()
    {
        $this->load->view('pages/daftar_siswa');
    }

    public function insert()
    {
        //upload file and get the name
        $foto = $this->uploadFile();

        //$this->output->enable_profiler(TRUE);
//        $fileName = date("d-m-Y H:i:s")."_".@$_FILES['foto']['name'];
       $kode_user = $this->input->post('nis');
       $nama = $this->input->post('nama');
       $password = $this->input->post('password');
       $nik = $this->input->post('nik');
       $email = $this->input->post('email');
       $jenisKelamin = $this->input->post('jenisKelamin');
       $tempatLahir = $this->input->post('tempatLahir');
       $tanggalLahir = $this->input->post('tanggalLahir');
       $alamat = $this->input->post('alamat');
       $telepon = $this->input->post('telepon');
       $kode_kelas = $this->input->post('kodeKelas');

       //get kode jabatan where access is anggota
       $kode_jabatan = $this->User_model->getJabatan($kode_kelas)->row()->kode_jabatan;

       $dataLogin = array(
           'kode_user' => $kode_user,
           'kode_akses' => '3',
           'kode_kelas' => $kode_kelas,
           'kode_jabatan' => $kode_jabatan,
           'email' => $email,
           'nama' => $nama,
           'password' => md5($password),
           'status' => 'Unconfirmed',
           'foto' => $foto
       );
       $dataSiswa = array(
           'NIS' => $kode_user,
           'kode_kelas' => $kode_kelas,
           'kode_akses' => '3',
           'email' => $email,
           'nik' => $nik,
           'nama' => $nama,
           'jenis_kelamin' => $jenisKelamin,
           'tempat_lahir' => $tempatLahir,
           'tanggal_lahir' => $tanggalLahir,
           'alamat' => $alamat,
           'no_telp' => $telepon,
           'foto' => $foto
       );
        $logs = array(
            'kode_user' => $kode_user,
            'kode_kelas' => $kode_kelas,
            'message' => 'Telah bergabung ke kelas.',
            'link' => 'MasterSiswa',
            'icon' => 'mdi-account-multiple-plus',
            'color' => 'success'
        );

       $this->Daftar_model->input_data('master_siswa', $dataSiswa);
       $this->Daftar_model->input_data('master_login', $dataLogin);
       $this->Logs_model->input_data('logs', $logs);
       redirect(site_url() . '/Daftar/show/'. $kode_user);
    }

    public function show($kode_user)
    {
        $data['user'] = $this->User_model->selectUserInfo($kode_user)->result();
//        print_r($data);
        $this->load->view('pages/success_page', $data);
    }

    public function getClass($kode_kelas)
    {
        $cek = $this->User_model->getClass($kode_kelas)->num_rows();

        if ($cek > 0){
            $result = $this->User_model->getClass($kode_kelas)->result();
            foreach ($result as $row){
                $data = $row->nama.':'.$row->NIP.':'.$row->nama_sekolah.':'.$row->alamat_sekolah.':'.$row->telp_sekolah.':'.$row->kelas.':'.$row->jurusan;
            }
            echo $data;
        }else{
            echo "false";
        }
    }

    public function checkUserInfo($kode_user)
    {
        $query = $this->User_model->selectUserInfo($kode_user);
        if (count($query->result()) > 0){
//            return true;
            echo "true";
        }else{
//            return false;
            echo "false";
        }
    }

    public function checkUserNik($nik)
    {
        $query = $this->User_model->cekNik($nik);
        if (count($query->result()) > 0){
//            return true;
            echo "true";
        }else{
//            return false;
            echo "false";
        }
    }

    public function checkUserEmail($email)
    {
        $email = str_replace("-at-", "@", $email);
        $query = $this->User_model->cekEmail($email);
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
        if(!file_exists("assets/img/userProfile")){
            mkdir("assets/img/userProfile");
        }

        $config['upload_path'] = './assets/img/userProfile/';
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