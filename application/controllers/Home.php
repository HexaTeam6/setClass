<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Logs_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['notif'] = $this->Logs_model->getNotification()->result();
            $data['new'] = $this->Logs_model->newNotification()->num_rows();
			$this->load->view('home', $data);
		}
		else{
			redirect(site_url().'/Auth/logout');
		}
    }

}
