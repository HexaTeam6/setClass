<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();		
        $this->load->model('User_model');
        $this->load->model('Menu_model');
    }

    public function index()
    {
        $this->load->view('pages/homepage');
    }

    public function masuk()
    {
        $this->load->view('pages/masuk');
    }

    public function login()
    {
        //$this->output->enable_profiler(TRUE);
        $kode_user = $this->input->post("username");
        $password = $this->input->post("password");
        $query = $this->User_model->getLogin($kode_user, $password);
        
        if (count($query->result())>0){ 
            foreach ($query->result() as $row)
            {
                $this->session->set_userdata("kode_user",$row->kode_user);
                $this->session->set_userdata("kode_akses",$row->kode_akses);
                $this->session->set_userdata("kode_kelas",$row->kode_kelas);
                $this->session->set_userdata("kode_jabatan",$row->kode_jabatan);
                $this->session->set_userdata("email",$row->email);
                $this->session->set_userdata("nama",$row->nama);
                $this->session->set_userdata("status",$row->status);
//				$this->session->set_userdata("menu",$this->generateMenu());
                echo site_url('Home');
            }
        }else{
            echo "false";
        }
    }
	
	public function generateMenu(){
		$data = $this->Menu_model->select_header()->result();
		$html = "";
		//print_r($html);
		foreach ($data as $row):
			///echo $row->menu_header;
			$html .= "<li class='treeview'>
                                  <a href='#'><i class='fa fa-link'></i> <span>".$row->menu_header."</span>
                                          <span class='pull-right-container'>
                                            <i class='fa fa-angle-left pull-right'></i>
                                          </span>
                                  </a>
                                  <ul class='treeview-menu'>";
			$submenu = $this->Menu_model->select_child($row->kode_menu_header)->result();
			foreach ($submenu as $rows):
			$html .= "<li><a href='".site_url('/'.$rows->file_php.'')."'>".$rows->menu_name."</a></li>";
			endforeach;
			$html .= "</ul>
                                  </li>";
			//print_r($submenu);
		endforeach;
		return $html;
	}

    public function logout()
    {
        $this->session->sess_destroy();
//        $data['msg'] = "Silahkan Login";
        $this->load->view('pages/masuk');
    }
}
