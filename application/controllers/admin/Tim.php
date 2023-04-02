<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tim extends CI_Controller
{

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        parent::__construct();
        is_logged_in();
        $this->load->model('tim_model');
        // $this->load->model('user_model');
        $this->load->model('berita_model');
    }

    function index()
    {
        if (isset($_POST['tambah'])) {
            $this->form_validation->set_rules('nip', 'NIP', 'required', [
                'required' => 'NIP Wajib diisi',
            ]);
            $this->form_validation->set_rules('nama', 'Nama ', 'required', [
                'required' => 'Nama Petugas Wajib diisi',
            ]);
            $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', [
                'required' => 'Tempat Lahir Wajib diisi',
            ]);
            $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', [
                'required' => 'Tempat Lahir Wajib diisi',
            ]);
            $this->form_validation->set_rules('notelp', 'No Telepon', 'required', [
                'required' => 'No Telepon Wajib diisi',
            ]);
            $this->form_validation->set_rules('email', 'Email', 'required', [
                'required' => 'No Telepon Wajib diisi',
            ]);

            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Tim gagal ditambah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }

        if (isset($_POST['update'])) {
            $this->form_validation->set_rules('nama_update', 'Nama ', 'required', [
                'required' => 'Nama Petugas Wajib diisi',
            ]);
            $this->form_validation->set_rules('tempat_lahir_update', 'Tempat Lahir', 'required', [
                'required' => 'Tempat Lahir Wajib diisi',
            ]);
            $this->form_validation->set_rules('tanggal_lahir_update', 'Tanggal Lahir', 'required', [
                'required' => 'Tempat Lahir Wajib diisi',
            ]);
            $this->form_validation->set_rules('notelp_update', 'No Telepon', 'required', [
                'required' => 'No Telepon Wajib diisi',
            ]);
            $this->form_validation->set_rules('email_update', 'Email', 'required', [
                'required' => 'Email Wajib diisi',
            ]);

             $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Tim gagal diupdate!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Tim LPSE Kabupaten Siak";
            $data['tim']=$this->tim_model->getAdmin();
            $data['diagram'] = $this->berita_model->getDiagram();
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view("layout/header", $data);
            $this->load->view("admin/vw_tim", $data);
            $this->load->view("layout/footer", $data);

        } else {
            if (isset($_POST['tambah'])) {
                $this->tambah();
            }

            if (isset($_POST['update'])) {
                $this->update($nip);
            }

            if (isset($_POST['hapus'])) {
                $this->hapus($nip);
            }

        }
    }


    function tambah()
    {
        $data = [
            'nip' => $this->input->post('nip'),
            'nama' => $this->input->post('nama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jabatan' => $this->input->post('jabatan'),
            'keterangan' => $this->input->post('keterangan'),
            'email' => $this->input->post('email'),
            'notelp' => $this->input->post('notelp'),
            'timestamp' => date("Y-m-d H:i:s"),
        ];

        $upload_image = $_FILES['gambar']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
            $config['max_size'] = 10000;
            $config['upload_path'] = './assets/img/tim/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->tim_model->insert($data, $upload_image);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>Tim berhasil ditambah!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('admin/tim');
    }

    function update($nip)
    {
        $jabatan = $this->input->post('jabatan_update',TRUE);
        $keterangan = '';

       if ($jabatan == "Unit Administrasi Sistem Elektronik" or "Unit Registrasi dan Verifikasi" or "Unit Layanan dan Dukungan") {
            $data = [
                'nama' =>  htmlspecialchars($this->input->post('nama_update')),
                'tempat_lahir' =>  htmlspecialchars($this->input->post('tempat_lahir_update')),
                'tanggal_lahir' =>  htmlspecialchars($this->input->post('tanggal_lahir_update')),
                'jabatan' =>  htmlspecialchars($this->input->post('jabatan_update')),
                'email' =>  htmlspecialchars($this->input->post('email_update')),
                'keterangan' =>  htmlspecialchars($this->input->post('keterangan_update')),
                'notelp' =>  htmlspecialchars($this->input->post('notelp_update')),
                'timestamp' =>  htmlspecialchars(date("Y-m-d H:i:s")),
            ];
        }

        else if ($jabatan == "Penanggung Jawab LPSE" or "Koordinator LPSE" or "Admin LPSE") { 
            $data = [
                'nama' =>  htmlspecialchars($this->input->post('nama_update')),
                'tempat_lahir' =>  htmlspecialchars($this->input->post('tempat_lahir_update')),
                'tanggal_lahir' =>  htmlspecialchars($this->input->post('tanggal_lahir_update')),
                'jabatan' =>  htmlspecialchars($this->input->post('jabatan_update')),
                'keterangan' => $keterangan,
                'email' =>  htmlspecialchars($this->input->post('email_update')),
                'notelp' =>  htmlspecialchars($this->input->post('notelp_update')),
                'timestamp' =>  htmlspecialchars(date("Y-m-d H:i:s")),
            ];
        }

        $upload_image = $_FILES['gambar']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
            $config['max_size'] = 10000;
            $config['upload_path'] = './assets/img/tim/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
                $query = $this->db->set('gambar', $new_image);
                if ($query) {
                    $old_image = $this->db->get_where('tim', ['nip' => $nip])->row();
                    unlink(FCPATH . 'assets/img/tim/' . $old_image->gambar);
                }
            }
        }
        $nip = $this->input->post('nip');
        $this->tim_model->update(['nip' => $nip], $data, $upload_image);
        // var_dump($data);die;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>Tim berhasil ditambah!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('admin/tim');
    }

    function hapus($nip)
    {
        $this->tim_model->delete($nip);
        // echo json_encode($nip);exit;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
         <i class="fa fa-exclamation-circle me-2"></i> Tim Berhasil dihapus!
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>');
        redirect('admin/tim');
    }

    function getJabatan()
    {
        $id_jabatan = $this->input->post("id_jabatan");
        $data = $this->jabatan_model->get();
        echo json_encode($data);
    }
}
