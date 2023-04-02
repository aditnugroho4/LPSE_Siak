<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dokumen extends CI_Controller
{
	public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
        is_logged_in();
        $this->load->model('dokumen_model');
        $this->load->model('berita_model');
        $this->load->model('tim_model');
	}

	function index()
    {

        $data['tim']=$this->tim_model->getAdmin();
        $data['diagram'] = $this->berita_model->getDiagram();


        $this->load->database();
        $this->load->model('dokumen_model');
        $data['kd'] = $this->dokumen_model->auto_code();


        if (isset($_POST['tambah'])) {
            $this->form_validation->set_rules('judul', 'Judul Dokumen', 'required', [
                'required' => 'Judul Dokumen Wajib diisi',
            ]);
            
            $this->form_validation->set_rules('kategori', 'Kategori Dokumen', 'required', [
                'required' => 'Kategori dokumen Wajib diisi',
            ]);
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Dokumen gagal ditambah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }

        if (isset($_POST['update'])) {
            $this->form_validation->set_rules('judul_update', 'Judul Dokumen', 'required', [
                'required' => 'Judul Dokumen Wajib diisi',
            ]);
            
            $this->form_validation->set_rules('kategori_update', 'Kategori Dokumen', 'required', [
                'required' => 'Kategori dokumen Wajib diisi',
            ]);
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Dokumen gagal diupdate!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
        
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Dokumen LPSE Kabupaten Siak";
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $this->load->view("layout/header", $data);
            $this->load->view("admin/vw_dokumen", $data);
            $this->load->view("layout/footer", $data);

        } else {
            if (isset($_POST['tambah'])) {
                $this->tambah();
            }
            if (isset($_POST['update'])) {
                $this->update($id_dokumen);
            }
            if (isset($_POST['hapus'])) {
                $this->hapus();
            }
        }
    }

    function tambah()
    {

            $ukuran_file = $_FILES['berkas']['size'];
            
            $data = [
                'id_dokumen' => $this->input->post('id_dokumen'),
				'judul' => $this->input->post('judul'),
                'kategori' => $this->input->post('kategori'),
                'size' => $ukuran_file,
                'timestamp' => date("Y-m-d H:i:s"),
            ];

            $upload_file = $_FILES['berkas']['name'];
			if ($upload_file) {
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '1000000';
                $config['upload_path'] = 'file_download/';
				$this->load->library('upload', $config);

                if ($this->upload->do_upload('berkas')) {
					$new_file = $this->upload->data('file_name');
					$this->db->set('berkas', $new_file);
				} else {
					echo $this->upload->display_errors();
				}
			}
	
            $this->dokumen_model->insert($data , $upload_file);
            // var_dump($data, $upload_file);die;
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Dokumen berhasil ditambah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/dokumen');
        }
    
function update($id_dokumen)
    {
        $upload_file = $_FILES['berkas']['name'];
			if ($upload_file) {
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '1000000';
                $config['upload_path'] = 'file_download/';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('berkas')) {
					$new_file = $this->upload->data('file_name', 'file_size');
					$this->db->set('berkas', $new_file);
					$query = $this->db->set('berkas', $new_file);
					if ($query) {
						$old_file = $this->db->get_where('dokumen', ['id_dokumen' => $id_dokumen])->row();
						unlink(FCPATH . 'file_download/' . $old_file->berkas);
					}
				}
			}
    if($upload_file == null){
        $data = [
            'judul' => htmlspecialchars($this->input->post('judul_update',true)),
            'kategori' => htmlspecialchars($this->input->post('kategori_update',true)),
            'timestamp' => htmlspecialchars(date("Y-m-d H:i:s"),true),
    ];
    }else{
        $data = [
            'judul' => htmlspecialchars($this->input->post('judul_update',true)),
            'kategori' => htmlspecialchars($this->input->post('kategori_update',true)),
            'size' =>     $ukuran_file = $_FILES['berkas']['size'],
            'timestamp' => htmlspecialchars(date("Y-m-d H:i:s"),true),
    ];
    }
   
			

            // $upload_file = $_FILES['berkas']['name'];
            // $ukuran_file = $_FILES['berkas']['size'];
			// if ($upload_file) {
            //     $config['allowed_types'] = 'pdf';
            //     $config['max_size'] = '10000';
            //     $config['upload_path'] = 'file_download/';
			// 	$this->load->library('upload', $config);

            //     if ($this->upload->do_upload('berkas')) {
			// 		$new_file = $this->upload->data('file_name');
			// 		$this->db->set('berkas', $new_file);
			// 	} else {
			// 		echo $this->upload->display_errors();
			// 	}
			// }

	$id_dokumen = $this->input->post('id_dokumen');
	$this->dokumen_model->update(['id_dokumen' => $id_dokumen], $data, $upload_file);

    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa fa-exclamation-circle me-2"></i> Dokumen Berhasil diupdate!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
	redirect('admin/dokumen');
		}

function hapus($id_dokumen)
{
    $this->dokumen_model->delete($id_dokumen);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa fa-exclamation-circle me-2"></i> Dokumen Berhasil dihapus!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>');

    redirect('admin/dokumen');
}

function download($id) {
    $file_download = $this->dokumen_model->getDataDokumen($id);
    $filePath = base_url() . "file_download/" . $file_download->berkas;
    $filename = basename($filePath);
    // echo $filePath;

    $data = file_get_contents($filePath);
    force_download($filename, $data);
}
//untuk filter kategori dokumen
function getKategori() {
    $request=$_POST['request'];
    $query = $this->db->query("SELECT * FROM dokumen where kategori ='$request'")->result_array();
    echo json_encode($query);
}


}



    
