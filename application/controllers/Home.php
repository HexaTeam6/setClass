<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();	
    }

    public function index()
    {
//        if(isset($_SESSION['username'])){
			$this->load->view('home');
//		}
//		else{
//			redirect(site_url().'/Auth/logout');
//		}
    }

}
