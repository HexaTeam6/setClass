<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuHeader extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_header_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Menu_header_model->tampil_data()->result();
            $this->load->view('menu/pengaturan/menu_header', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function insert()
    {
        $menu_header = $this->input->post('nama');
        $icon = $this->input->post('icon');
        $data = array(
            'menu_header' => $menu_header,
            'icon' => $icon
        );

        $this->Menu_header_model->input_data('menu_header', $data);
//        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/Auth/refreshMenu/MenuHeader');
    }

    public function update()
    {
        $kode_menu_header = $this->input->post('kode');
        $menu_header = $this->input->post('nama');
        $icon = $this->input->post('icon');
        $data = array(
            'menu_header' => $menu_header,
            'icon' => $icon
        );

        $this->Menu_header_model->update_data('menu_header', $kode_menu_header, $data);
//        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/Auth/refreshMenu/MenuHeader');
    }

    public function delete($kode_menu_header)
    {
        $this->Menu_header_model->delete_data('menu_header', $kode_menu_header);
//        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('/Auth/refreshMenu/MenuHeader');
    }

}
?>