<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();		
        $this->load->model('User_model');
        $this->load->model('Menu_model');
        $this->load->helper('cookie');
    }

    public function index()
    {
        $this->load->view('pages/homepage');
    }

    public function masuk()
    {
        if (isset($_COOKIE['kode_user']) && isset($_COOKIE['password'])){
            redirect(site_url().'/Auth/login');
        }else{
            $this->load->view('pages/masuk');
        }
    }

    public function login()
    {
        //$this->output->enable_profiler(TRUE);
        if (isset($_COOKIE['kode_user']) && isset($_COOKIE['password'])){
            $kode_user = $_COOKIE['kode_user'];
            $password = $_COOKIE['password'];
        }else{
            $kode_user = $this->input->post("username");
            $password = $this->input->post("password");
        }

        $query = $this->User_model->getLogin($kode_user, $password);

        if (count($query->result())>0){
            foreach ($query->result() as $row)
            {
                $this->session->set_userdata("kode_user",$row->kode_user);
                $this->session->set_userdata("kode_akses",$row->kode_akses);
                $this->session->set_userdata("kode_kelas",$row->kode_kelas);
                $this->session->set_userdata("kode_jabatan",$row->kode_jabatan);
                $this->session->set_userdata("akses_jabatan",$row->akses_jabatan);
                $this->session->set_userdata("jabatan",$row->jabatan);
                $this->session->set_userdata("email",$row->email);
                $this->session->set_userdata("nama",$row->nama);
                $this->session->set_userdata("status",$row->status);
                $this->session->set_userdata("foto",$row->foto);
				$this->session->set_userdata("menu",$this->generateMenu());
				$this->set_hak_akses();
				if ($this->input->post('remember') == 'on'){
				    set_cookie('kode_user', $kode_user, 86400 * 30);
				    set_cookie('password', $password, 86400 * 30);
                }
                if (isset($_COOKIE['kode_user']) && isset($_COOKIE['password'])){
				    redirect(site_url().'/Home');
                }else{
                    echo site_url('Home');
                }
            }
        }else{
            echo "false";
        }
    }

    public function set_hak_akses(){
        $data = $this->User_model->get_hak_akses();
        foreach ($data->result() as $row):
            $this->session->set_userdata($row->kode_menu_child."insert",$row->akses_insert);
            $this->session->set_userdata($row->kode_menu_child."view",$row->akses_view);
            $this->session->set_userdata($row->kode_menu_child."edit",$row->akses_edit);
            $this->session->set_userdata($row->kode_menu_child."delete",$row->akses_delete);
        endforeach;
    }
	
	public function generateMenu(){
		$data = $this->Menu_model->select_header()->result();
		$html = '';
		//print_r($html);
		foreach ($data as $row):
			///echo $row->menu_header;
            $html .= '<li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="'.$row->icon.'"></i>
                        <span class="hide-menu">'.$row->menu_header.'</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">';
			$submenu = $this->Menu_model->select_child($row->kode_menu_header)->result();
			foreach ($submenu as $rows):
			$html .= '<li><a href="'.site_url('/'.$rows->file_php.'').'">'.$rows->menu_name.'</a></li>';
			endforeach;
			$html .= '</ul>
                                  </li>';
			//print_r($submenu);
		endforeach;
		return $html;
	}

	public function refreshMenu($link){
        $this->session->set_userdata("menu",$this->generateMenu());
        $this->set_hak_akses();
        if ($link > 0 ){
            redirect(site_url().'/MenuLevel/setting/'.$link);
        }else{
            redirect(site_url().'/'.$link);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        delete_cookie('kode_user');
        delete_cookie('password');
//        $data['msg'] = "Silahkan Login";
        redirect(site_url().'/Auth/masuk');
    }
}
