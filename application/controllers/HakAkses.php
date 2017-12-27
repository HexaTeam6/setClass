<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HakAkses extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Hak_akses_model');
        $this->load->model('Logs_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Hak_akses_model->tampil_data()->result();
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->num_rows();
            $this->load->view('menu/pengaturan/hak_akses', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function insert()
    {
        $hak_akses = $this->input->post('hakAkses');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'hak_akses' => $hak_akses,
            'keterangan' => $keterangan
        );

        $this->Hak_akses_model->input_data('menu_hak_akses', $data);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/HakAkses');
    }

    public function update()
    {
        $kode_akses = $this->input->post('kode');
        $hak_akses = $this->input->post('hakAkses');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'hak_akses' => $hak_akses,
            'keterangan' => $keterangan
        );

        $this->Hak_akses_model->update_data('menu_hak_akses', $kode_akses, $data);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/HakAkses');
    }

    public function delete($kode_akses)
    {
        $this->Hak_akses_model->delete_data('menu_hak_akses', $kode_akses);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('HakAkses');
    }

}
?>