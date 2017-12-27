<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuLevel extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_level_model');
        $this->load->model('Logs_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Menu_level_model->tampil_data()->result();
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->num_rows();
            $this->load->view('menu/pengaturan/menu_level_view',$data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function setting($kode_akses){
        //$this->output->enable_profiler(TRUE);
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Menu_level_model->get_data($kode_akses)->result();
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->num_rows();
            $data['kode_akses'] = $kode_akses;
            $this->load->view('menu/pengaturan/menu_level_edit', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function update()
    {
        //$this->output->enable_profiler(TRUE);
        $menu = $this->Menu_level_model->get_menu_child()->result();
        echo $kode_akses = $this->input->post('kode_akses');
        $this->Menu_level_model->delete_data('menu_level',$kode_akses);
        foreach ($menu as $row):
            $view = $this->input->post('view_'.$row->kode_menu_child);
            $insert = $this->input->post('insert_'.$row->kode_menu_child);
            $edit = $this->input->post('edit_'.$row->kode_menu_child);
            $delete = $this->input->post('delete_'.$row->kode_menu_child);
            $data = array(
                'kode_akses' => $kode_akses,
                'kode_menu_child' => $row->kode_menu_child,
                'akses_view' => ($view=="1")?"1":"0",
                'akses_insert' => ($insert=="1")?"1":"0",
                'akses_edit' => ($edit=="1")?"1":"0",
                'akses_delete' => ($delete=="1")?"1":"0",
            );
            $this->Menu_level_model->input_data('menu_level', $data);
        endforeach;
//        $this->session->set_flashdata('msg', 'Berhasil disimpan!');
        redirect(site_url().'/Auth/refreshMenu/'.$kode_akses);
    }

}
?>
