<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Logs_model");
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Logs_model->allNotification()->result();

            //Notification
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->result();
            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('logs', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function getNewLogs($link, $id)
    {
        $dataDetail = array(
            'id_logs' => $id,
            'kode_user' => $_SESSION['kode_user'],
            'kode_kelas' => $_SESSION['kode_kelas'],
        );
        $dataLogs = array(
            'link' => $link
        );

        $this->Logs_model->input_data('logs_detail', $dataDetail);
        $this->Logs_model->update_data('logs', $id, $dataLogs);

        redirect(site_url().'/'.$link);
    }
}
