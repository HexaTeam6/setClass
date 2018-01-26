<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarWaliMurid extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Daftar_model');
        $this->load->model('User_model');
        $this->load->model('Logs_model');
    }

    public function index()
    {
        $this->load->view('pages/daftar_wali_murid');
    }

    public function insert()
    {
        //upload file and get the name
        $foto = $this->uploadFile();

        //$this->output->enable_profiler(TRUE);
//        $fileName = date("d-m-Y H:i:s")."_".@$_FILES['foto']['name'];
       $kode_user = $this->input->post('nik');
       $nama = $this->input->post('nama');
       $password = $this->input->post('password');
       $email = $this->input->post('email');
       $jenisKelamin = $this->input->post('jenisKelamin');
       $tempatLahir = $this->input->post('tempatLahir');
       $tanggalLahir = $this->input->post('tanggalLahir');
       $alamat = $this->input->post('alamat');
       $telepon = $this->input->post('telepon');
       $kode_kelas = $this->input->post('kodeKelas');
       $nik_siswa = $this->input->post('nikAnak');
       $hubungan_dengan_siswa= $this->input->post('hubunganSiswa');

        $kode_jabatan = $this->User_model->getJabatan($kode_kelas, 7)->row()->kode_jabatan;

       $dataLogin = array(
           'kode_user' => $kode_user,
           'kode_akses' => '4',
           'kode_kelas' => $kode_kelas,
           'kode_jabatan' => $kode_jabatan,
           'email' => $email,
           'nama' => $nama,
           'password' => md5($password),
           'status' => 'Unconfirmed',
           'foto' => $foto
       );
       $dataWaliMurid = array(
           'NIK' => $kode_user,
           'NIK_siswa' => $nik_siswa,
           'kode_kelas' => $kode_kelas,
           'kode_akses' => '4',
           'email' => $email,
           'nama' => $nama,
           'jenis_kelamin' => $jenisKelamin,
           'tempat_lahir' => $tempatLahir,
           'tanggal_lahir' => $tanggalLahir,
           'alamat' => $alamat,
           'no_telp' => $telepon,
           'hubungan_dengan_siswa' => $hubungan_dengan_siswa,
           'foto' => $foto
       );
        $logs = array(
            'kode_user' => $kode_user,
            'kode_kelas' => $kode_kelas,
            'message' => 'Telah bergabung ke kelas.',
            'link' => 'MasterWaliMurid',
            'icon' => 'mdi-account-multiple-plus',
            'color' => 'success'
        );

       $this->Daftar_model->input_data('master_wali_murid', $dataWaliMurid);
       $this->Daftar_model->input_data('master_login', $dataLogin);
       $this->Logs_model->input_data('logs', $logs);
       redirect(site_url() . '/Daftar/show/'. $kode_user);
    }

    public function getStudent($nik_anak)
    {
        $cek = $this->User_model->cekNik($nik_anak)->num_rows();

        if ($cek > 0){
            $result = $this->User_model->getStudent($nik_anak)->result();
            foreach ($result as $row){
                $data = $row->NIK.':'.$row->nama.':'.$row->tempat_lahir.', '.$row->tanggal_lahir.':'.$row->jenis_kelamin.':'.$row->nama_sekolah.':'.$row->kelas.':'.$row->jurusan.':'.$row->kode_kelas;
            }
            echo $data;
        }else{
            echo "false";
        }
    }

    public function checkUserInfo($kode_user)
    {
        $query = $this->User_model->selectUserInfo($kode_user);
        $query2 = $this->User_model->cekNik($kode_user);
        if (count($query->result()) > 0 || count($query2->result()) > 0){
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