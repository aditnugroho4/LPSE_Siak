<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Berita extends CI_Controller
{
	public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
        $this->load->model('berita_model');
	}

	function index()
    {       $data['berita']=$this->berita_model->get();
            $this->load->view("layout/header_pengunjung",$data);
            $this->load->view("pengunjung/vw_berita", $data);
            $this->load->view("layout/footer_pengunjung",$data);
    }

    function detail_berita($id_berita)
    {
          $data['berita']=$this->berita_model->getById($id_berita);
            $this->load->view("layout/header_pengunjung",$data);
            $this->load->view("pengunjung/vw_detail_berita", $data);
            $this->load->view("layout/footer_pengunjung3",$data);
    }
}