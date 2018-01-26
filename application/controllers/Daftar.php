<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Daftar_model');
        $this->load->model('User_model');
    }

    public function index()
    {
        $this->load->view('pages/daftar');
    }

    public function insert()
    {
        //upload file and get the name
        $foto = $this->uploadFile();

        //$this->output->enable_profiler(TRUE);
//        $fileName = date("d-m-Y H:i:s")."_".@$_FILES['foto']['name'];
       $kode_user = $this->input->post('nip');
       $nama = $this->input->post('nama');
       $password = $this->input->post('password');
       $email = $this->input->post('email');
       $jenisKelamin = $this->input->post('jenisKelamin');
       $tempatLahir = $this->input->post('tempatLahir');
       $tanggalLahir = $this->input->post('tanggalLahir');
       $alamat = $this->input->post('alamat');
       $telepon = $this->input->post('telepon');
       $kode_kelas = $this->input->post('kodeKelas');
       $namaSekolah = $this->input->post('namaSekolah');
       $alamatSekolah = $this->input->post('alamatSekolah');
       $teleponSekolah = $this->input->post('teleponSekolah');
       $kelas = $this->input->post('kelas');
       $jurusan = $this->input->post('jurusan');

        $dataJabatanWali = array(
            'akses_jabatan' => 2,
            'kode_kelas' => $kode_kelas,
            'jabatan' => 'Wali Kelas',
            'keterangan' => 'Wali Kelas'
        );
        $dataJabatanAnggota = array(
            'akses_jabatan' => 6,
            'kode_kelas' => $kode_kelas,
            'jabatan' => 'Anggota',
            'keterangan' => 'Anggota kelas'
        );
        $dataJabatanWaliMurid= array(
            'akses_jabatan' => 7,
            'kode_kelas' => $kode_kelas,
            'jabatan' => 'Wali Murid',
            'keterangan' => 'Wali Murid'
        );
        $this->Daftar_model->input_data('master_jabatan', $dataJabatanAnggota);
        $this->Daftar_model->input_data('master_jabatan', $dataJabatanWaliMurid);
        $this->Daftar_model->input_data('master_jabatan', $dataJabatanWali);
        $kode_jabatan = $this->db->insert_id();

       $dataLogin = array(
           'kode_user' => $kode_user,
           'kode_akses' => '2',
           'kode_kelas' => $kode_kelas,
           'kode_jabatan' => $kode_jabatan,
           'email' => $email,
           'nama' => $nama,
           'password' => md5($password),
           'status' => 'Confirmed',
           'foto' => $foto
       );
       $dataWaliKelas = array(
           'NIP' => $kode_user,
           'kode_kelas' => $kode_kelas,
           'kode_akses' => '2',
           'email' => $email,
           'nama' => $nama,
           'jenis_kelamin' => $jenisKelamin,
           'tempat_lahir' => $tempatLahir,
           'tanggal_lahir' => $tanggalLahir,
           'alamat' => $alamat,
           'no_telp' => $telepon,
           'foto' => $foto
       );
       $dataKelas = array(
           'kode_kelas' => $kode_kelas,
           'nama_sekolah' => $namaSekolah,
           'alamat_sekolah' => $alamatSekolah,
           'telp_sekolah' => $teleponSekolah,
           'kelas' => $kelas,
           'jurusan' => $jurusan
       );


       $this->Daftar_model->input_data('master_kelas', $dataKelas);
       $this->Daftar_model->input_data('master_wali_kelas', $dataWaliKelas);
       $this->Daftar_model->input_data('master_login', $dataLogin);
       redirect(site_url() . '/Daftar/show/'. $kode_user);
    }

    public function show($kode_user)
    {
        $data['user'] = $this->User_model->selectUserInfo($kode_user)->result();
//        print_r($data);
        $this->load->view('pages/success_page', $data);
    }

    public function generateClass()
    {
        $kode = str_split(strtoupper(md5(uniqid(rand(),true))), 10);
        $kode = $kode[0];
        echo $kode;
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