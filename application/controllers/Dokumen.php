<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dokumen extends CI_Controller
{
	public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
        $this->load->model('dokumen_model');
	}

	function index()
    {      
        // $data['dokumen']=$this->dokumen_model->get();

        // $this->load->view("layout/header_pengunjung",$data);
        // $this->load->view("pengunjung/vw_dokumen_SOP",$data);
        // $this->load->view("layout/footer_pengunjung",$data);
    }

    function SOP()
    {       
        $data['dokumen']=$this->dokumen_model->get();
        $this->load->view("layout/header_pengunjung",$data);
        $this->load->view("pengunjung/vw_dokumen_SOP",$data);
        $this->load->view("layout/footer_pengunjung2",$data);
    }

    function Regulasi()
    {       
        $data['dokumen']=$this->dokumen_model->get();
        $this->load->view("layout/header_pengunjung",$data);
        $this->load->view("pengunjung/vw_dokumen_regulasi",$data);
        $this->load->view("layout/footer_pengunjung2",$data);
    }

    function Panduan()
    {       
        $data['dokumen']=$this->dokumen_model->get();
        $this->load->view("layout/header_pengunjung",$data);
        $this->load->view("pengunjung/vw_dokumen_panduan",$data);
        $this->load->view("layout/footer_pengunjung2",$data);
    }
    function download($id) {
        $file_download = $this->dokumen_model->getDataDokumen($id);
        $filePath = base_url() . "file_download/" . $file_download->berkas;
        $filename = basename($filePath);
        // echo $filePath;
    
        $data = file_get_contents($filePath);
        force_download($filename, $data);
    }
    
}

?>
