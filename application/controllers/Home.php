<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
	public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
        $this->load->model('user_model');
        $this->load->model('layanan_model');
        $this->load->model('tim_model');
        $this->load->model('agenda_model');
	}

	function index()
    {       $data['layanan']=$this->layanan_model->get();
            $data['agenda']=$this->agenda_model->get();
            $this->load->view("layout/header_pengunjung_Home",$data);
            $this->load->view("pengunjung/vw_home", $data);
            $this->load->view("layout/footer_pengunjung",$data);
    }
    
}
