<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Berita extends CI_Controller
{
	public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
        is_logged_in();
        $this->load->model('berita_model');
        $this->load->model('tim_model');
        $this->load->model('user_model');
	}

	function index()
    {

        $data['diagram'] = $this->berita_model->getDiagram();
        $data['user']=$this->user_model->get();
        $data['tim']=$this->tim_model->getAdmin();


            $this->load->database();
            $this->load->model('berita_model');
            $data['kd'] = $this->berita_model->auto_code();


            if (isset($_POST['tambah'])) {
                $this->form_validation->set_rules('judul', 'Judul berita', 'required', [
                    'required' => 'Judul Berita Wajib diisi',
                ]);
                
                $this->form_validation->set_rules('kategori', 'Kategori', 'required', [
                    'required' => 'Kategori Berita Wajib diisi',
                ]);
        
                $this->form_validation->set_rules('konten', 'Isi Berita', 'required', [
                    'required' => 'Isi Berita Wajib diisi',
                ]);
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>Berita gagal ditambah!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }

            if (isset($_POST['update'])) {
               
                $this->form_validation->set_rules('judul_update', 'Judul berita', 'required', [
                    'required' => 'Judul Berita Wajib diisi',
                ]);
                $this->form_validation->set_rules('kategori_update', 'Kategori', 'required', [
                    'required' => 'Kategori Berita Wajib diisi',
                ]);
                $this->form_validation->set_rules('konten', 'Isi Berita', 'required', [
                    'required' => 'Isi Berita Wajib diisi',
                ]);
    
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>Berita gagal diupdate!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }

            if ($this->form_validation->run() == false) {
                $data['judul'] = "Berita LPSE Kabupaten Siak";
                $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
                $this->load->view("layout/header", $data);
                $this->load->view("admin/vw_berita", $data);
                $this->load->view("layout/footer", $data);
    
            } else {
                if (isset($_POST['tambah'])) {
                    $this->tambah();
                }
                if (isset($_POST['update'])) {
                    $this->update($id_berita);
                }
                if (isset($_POST['hapus'])) {
                    $this->hapus();
                }
            }
	}
    function tambah()
    {
            $data = [
                'id_berita' => $this->input->post('id_berita'),
				'judul' => $this->input->post('judul'),
                'kategori' => $this->input->post('kategori'),
                'konten' => $this->input->post('konten'),
                'timestamp' => date("Y-m-d H:i:s"),
            ];

            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
                $config['max_size'] = '6114';
                $config['upload_path'] = './assets/img/berita/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }		
            $this->berita_model->insert($data, $upload_image);
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Berita berhasil ditambah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            
            redirect('admin/berita');
}

function update($id_berita)
{
            $data = [
                'judul' => htmlspecialchars($this->input->post('judul_update',true)),
                'kategori' => htmlspecialchars($this->input->post('kategori_update',true)),
                'konten' => htmlspecialchars($this->input->post('konten',true)),
                'timestamp' => htmlspecialchars(date("Y-m-d H:i:s")),
			];
			$upload_image = $_FILES['gambar']['name'];
			if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
                $config['max_size'] = '6114';
				$config['upload_path'] = './assets/img/berita/';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {

					$new_image = $this->upload->data('file_name');
					$this->db->set('gambar', $new_image);
					$query = $this->db->set('gambar', $new_image);
					if ($query) {
						$old_image = $this->db->get_where('berita', ['id_berita' => $id_berita])->row();
						unlink(FCPATH . 'assets/img/berita/' . $old_image->gambar);
					}
				}
			}
			$id_berita = $this->input->post('id_berita');
			$this->berita_model->update(['id_berita' => $id_berita], $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i> Berita Berhasil diupdate!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
			redirect('admin/berita');


}

function hapus($id_berita)
{
    $this->berita_model->delete($id_berita);
         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
         <i class="fa fa-exclamation-circle me-2"></i> Berita Berhasil dihapus!
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>');
    redirect('admin/berita');
}

function getKategori() {
    $request=$_POST['request'];
    $query = $this->db->query("SELECT * FROM berita where kategori ='$request'")->result_array();
    echo json_encode($query);
}

    }


    
