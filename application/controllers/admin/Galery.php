<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Galery extends CI_Controller
{
	public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
        is_logged_in();
        $this->load->model('galery_model');
        $this->load->model('berita_model');
        $this->load->model('tim_model');
	}

	function index()
    {

        $data['diagram'] = $this->berita_model->getDiagram();
        $data['tim']=$this->tim_model->getAdmin();
        
            $this->load->database();
            $this->load->model('galery_model');
            $data['kd'] = $this->galery_model->auto_code();

            if (isset($_POST['tambah'])) {
                $this->form_validation->set_rules('judul', 'Judul Galery', 'required', [
                    'required' => 'Judul Galery Wajib diisi',
                ]);
                
                $this->form_validation->set_rules('kategori', 'Kategori', 'required', [
                    'required' => 'Kategori Galery Wajib diisi',
                ]);
        
                $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
                    'required' => 'Deskripsi Galery Wajib diisi',
                ]);
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>Galery gagal ditambah!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }

            if (isset($_POST['update'])) {
                $this->form_validation->set_rules('judul_update', 'Judul Galery', 'required', [
                    'required' => 'Judul Galery Wajib diisi',
                ]);
                
                $this->form_validation->set_rules('kategori_update', 'Kategori', 'required', [
                    'required' => 'Kategori Galery Wajib diisi',
                ]);
        
                $this->form_validation->set_rules('deskripsi_update', 'Deskripsi', 'required', [
                    'required' => 'Deskripsi Galery Wajib diisi',
                ]);
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>Galery gagal diupdate!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }

            if ($this->form_validation->run() == false) {
                $data['judul'] = "Galery LPSE Kabupaten Siak";
                $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
                $this->load->view("layout/header", $data);
                $this->load->view("admin/vw_galery", $data);
                $this->load->view("layout/footer", $data);
    
            } else {
                if (isset($_POST['tambah'])) {
                    $this->tambah();
                }
                if (isset($_POST['update'])) {
                    $this->update($id_galery);
                }
                if (isset($_POST['hapus'])) {
                    $this->hapus();
                }
            }
	}
    function tambah()
    {
            $data = [
                'id_galery' => $this->input->post('id_galery'),
				'judul' => $this->input->post('judul'),
                'kategori' => $this->input->post('kategori'),
                'deskripsi' => $this->input->post('deskripsi'),
                'timestamp' => date("Y-m-d H:i:s"),
            ];


            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
                $config['max_size'] = '6114';
                $config['upload_path'] = './assets/img/galeri/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }		
            $this->galery_model->insert($data, $upload_image);
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Galery berhasil ditambah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/galery');
        }


function update($id_galery)
{
            $data = [
                'judul' => htmlspecialchars($this->input->post('judul_update',true)),
                'kategori' => htmlspecialchars($this->input->post('kategori_update',true)),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi_update',true)),
                'timestamp' => htmlspecialchars(date("Y-m-d H:i:s")),
			];

			$upload_image = $_FILES['gambar']['name'];
			if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
                $config['max_size'] = '6114';
				$config['upload_path'] = './assets/img/galeri/';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {

					$new_image = $this->upload->data('file_name');
					$this->db->set('gambar', $new_image);
					$query = $this->db->set('gambar', $new_image);
					if ($query) {
						$old_image = $this->db->get_where('galery', ['id_galery' => $id_galery])->row();
						unlink(FCPATH . 'assets/img/galeri/' . $old_image->gambar);
					}
				}
			}
// var_dump($data);die;
			$id_galery = $this->input->post('id_galery');
			$this->galery_model->update(['id_galery' => $id_galery], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i> Galery Berhasil diupdate!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
			redirect('admin/galery');
		}
        
function hapus($id_galery)
{
    $this->galery_model->delete($id_galery);
         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
         <i class="fa fa-exclamation-circle me-2"></i> Galery Berhasil dihapus!
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>');
    redirect('admin/galery');
}

function getKategori() {
    $request=$_POST['request'];
    $query = $this->db->query("SELECT * FROM galery where kategori ='$request'")->result_array();
    echo json_encode($query);
}

    }


    
