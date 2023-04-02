<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Galery extends CI_Controller
{
	public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
        $this->load->model('galery_model');
	}

	function index()
    {       $data['galery']=$this->galery_model->get();
            $this->load->view("layout/header_pengunjung",$data);
            $this->load->view("pengunjung/vw_galery", $data);
            $this->load->view("layout/footer_pengunjung",$data);
    }
    
}
