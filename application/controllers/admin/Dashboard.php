<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
        is_logged_in();

        $this->load->model('user_model');
        $this->load->model('berita_model');
        $this->load->model('tim_model');
        $this->load->model('layanan_model');
	}

	function index()
    {            

        $username = $this->session->userdata('username');

            $data['judul'] = "Dashboard";
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            $data['pengunjung']=$this->user_model->getPengunjung();
            $data['user']=$this->user_model->get();
            $data['tim']=$this->tim_model->getAdmin();
            $data['tim1']=$this->user_model->getPengunjung();
            $data['diagram'] = $this->berita_model->getDiagram();
            $data['layanan'] = $this->layanan_model->getLayanan();

            $this->load->view("layout/header", $data);
            $this->load->view("admin/vw_dashboard", $data);
            $this->load->view("layout/footer", $data);
    }
    
}

?>
