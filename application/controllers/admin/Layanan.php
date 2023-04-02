<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Layanan extends CI_Controller
{
	public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
        is_logged_in();
        $this->load->model('layanan_model');
        $this->load->model('berita_model');
        $this->load->model('tim_model');
	}

	function index()
    {            
            $this->load->database();
            $this->load->model('layanan_model');
            $data['kd'] = $this->layanan_model->auto_code();

            $data['tim']=$this->tim_model->getAdmin();
            $data['diagram'] = $this->berita_model->getDiagram();

        if (isset($_POST['tambah'])) {
            $this->form_validation->set_rules('nama_layanan', 'Nama Layanan', 'required', [
                'required' => 'Nama Layanan Wajib diisi',
            ]);
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
                'required' => 'Deskripsi Layanan Wajib diisi',
            ]);

            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Layanan gagal ditambah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }

        if (isset($_POST['update'])) {

            $this->form_validation->set_rules('nama_layanan_update', 'Nama Layanan', 'required', ['required' => 'Nama Layanan Wajib di isi',]);
            $this->form_validation->set_rules('deskripsi_update', 'Deskripsi', 'required', 'required', ['required' => 'Deskripsi Layanan Wajib di isi',]);

            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Layanan gagal diupdate!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Layanan LPSE Kabupaten Siak";
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $this->load->view("layout/header", $data);
            $this->load->view("admin/vw_layanan", $data);
            $this->load->view("layout/footer", $data);

        } else {
            if (isset($_POST['tambah'])) {
                $this->tambah();
            }
            if (isset($_POST['update'])) {
                $this->update($id_layanan);
            }

            if (isset($_POST['hapus'])) {
                $this->hapus();
            }
        }

    }

    function tambah()
    {
            $data = [
                'id_layanan' => $this->input->post('id_layanan'),
				'nama_layanan' => $this->input->post('nama_layanan'),
                'deskripsi' => $this->input->post('deskripsi'),
                'timestamp' => date("Y-m-d H:i:s"),
            ];

            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
                $config['max_size'] = 10000;
                $config['upload_path'] = './assets/img/layanan/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }		
            $this->layanan_model->insert($data, $upload_image);
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Layanan berhasil ditambah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/layanan');
        }

function update($id_layanan)
{
            $data = [
                'nama_layanan' => htmlspecialchars($this->input->post('nama_layanan_update',true)),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi_update',true)),
                'timestamp' => htmlspecialchars(date("Y-m-d H:i:s")),
			];
			$upload_image = $_FILES['gambar']['name'];
			if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
                $config['max_size'] = 10000;
				$config['upload_path'] = './assets/img/layanan/';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {

					$new_image = $this->upload->data('file_name');
					$this->db->set('gambar', $new_image);
					$query = $this->db->set('gambar', $new_image);
					if ($query) {
						$old_image = $this->db->get_where('layanan', ['id_layanan' => $id_layanan])->row();
						unlink(FCPATH . 'assets/img/layanan/' . $old_image->gambar);
					}
				}
			}
			$id_layanan = $this->input->post('id_layanan');
			$this->layanan_model->update(['id_layanan' => $id_layanan], $data);
            // var_dump($data);die;
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i> Layanan Berhasil diupdate!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/layanan');
		}

function hapus($id_layanan)
{
    $this->layanan_model->delete($id_layanan);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa fa-exclamation-circle me-2"></i> Layanan Berhasil dihapus!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>');
    redirect('admin/layanan');
}


    
}
