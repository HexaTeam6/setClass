<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuChild extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_child_model');
        $this->load->model('Menu_header_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Menu_child_model->tampil_data()->result();
            $data['menu_header'] = $this->Menu_header_model->tampil_data()->result();
            $this->load->view('menu/pengaturan/menu_child', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function insert()
    {
        $menu_name = $this->input->post('nama');
        $kode_menu_header = $this->input->post('menuHeader');
        $file_php = $this->input->post('filePhp');
        $data = array(
            'menu_name' => $menu_name,
            'kode_menu_header' => $kode_menu_header,
            'file_php' => $file_php
        );

        $this->Menu_child_model->input_data('menu_child', $data);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/MenuChild');
    }

    public function update()
    {
        $kode_menu_child = $this->input->post('kode');
        $menu_name = $this->input->post('nama');
        $kode_menu_header = $this->input->post('menuHeader');
        $file_php = $this->input->post('filePhp');
        $data = array(
            'menu_name' => $menu_name,
            'kode_menu_header' => $kode_menu_header,
            'file_php' => $file_php
        );

        $this->Menu_child_model->update_data('menu_child', $kode_menu_child, $data);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/MenuChild');
    }

    public function delete($kode_menu_child)
    {
        $this->Menu_child_model->delete_data('menu_child', $kode_menu_child);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('MenuChild');
    }

}
?>