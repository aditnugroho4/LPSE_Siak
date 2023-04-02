<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Agenda extends CI_Controller
{
	public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
        is_logged_in();
        $this->load->model('agenda_model');
        $this->load->model('berita_model');
        $this->load->model('tim_model');
	}

    public function index()
    {
        $data['tim']=$this->tim_model->getAdmin();
        $data['diagram'] = $this->berita_model->getDiagram();
        

        $this->load->database();
        $this->load->model('agenda_model');
        $data['kd'] = $this->agenda_model->auto_code();

        if (isset($_POST['tambah'])) {
            $this->form_validation->set_rules('nama', 'Judul Agenda', 'required', [
                'required' => 'Judul Agenda Wajib diisi',
            ]);
            $this->form_validation->set_rules('deskripsi', 'Isi Agenda', 'required', [
                'required' => 'Isi Agenda Wajib diisi',
            ]);

            $this->form_validation->set_rules('waktu', 'Waktu Agenda', 'required', [
                'required' => 'Tanggal Agenda Wajib diisi',
            ]);
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Agenda gagal ditambah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }

        if (isset($_POST['update'])) {
            $this->form_validation->set_rules('nama_update', 'Judul Agenda', 'required', [
                'required' => 'Judul Agenda Wajib diisi',
            ]);
            $this->form_validation->set_rules('deskripsi', 'Isi Agenda', 'required', [
                'required' => 'Isi Agenda Wajib diisi',
            ]);

            $this->form_validation->set_rules('waktu_update', 'Waktu Agenda', 'required', [
                'required' => 'Tanggal Agenda Wajib diisi',
            ]);

            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Agenda gagal diupdate!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Agenda LPSE Kabupaten Siak";
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $this->load->view("layout/header", $data);
            $this->load->view("admin/vw_agenda", $data);
            $this->load->view("layout/footer", $data);

        } else {
            if (isset($_POST['tambah'])) {
                $this->tambah();
            }
            if (isset($_POST['update'])) {
                $this->update($id_agenda);
            }
            if (isset($_POST['hapus'])) {
                $this->hapus();
            }
        }

    }
    
    function tambah()
    {
            $data = [
                'id_agenda' => $this->input->post('id_agenda'),
				'nama' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi'),
                'waktu' => $this->input->post('waktu'),
                'timestamp' => date("Y-m-d H:i:s"),
            ];

            $this->agenda_model->insert($data);
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Agenda berhasil ditambah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/agenda');
}

function update($id_agenda)
{  
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama_update',true)),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi',true)),
                'waktu' => htmlspecialchars($this->input->post('waktu_update',true)),
                'timestamp' => htmlspecialchars(date("Y-m-d H:i:s")),
			];
        
            $id_agenda = $this->input->post('id_agenda');
			$this->agenda_model->update(['id_agenda' => $id_agenda], $data);
            // var_dump($data);die;
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i> Agenda Berhasil diupdate!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
			redirect('admin/agenda');
}

function hapus($id_agenda)
{
    $this->agenda_model->delete($id_agenda);
         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
         <i class="fa fa-exclamation-circle me-2"></i> Agenda Berhasil dihapus!
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>');
    redirect('admin/agenda');
}
    }


     
