<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ContactUs extends CI_Controller
{
	public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
	}

	function index()
    {       
            $this->load->view("layout/header_pengunjung");
            $this->load->view("pengunjung/vw_contact_us");
            $this->load->view("layout/footer_pengunjung");
    }
    
}
?>