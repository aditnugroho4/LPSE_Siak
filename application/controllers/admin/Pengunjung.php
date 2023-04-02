<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pengunjung extends CI_Controller
{
	public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
        is_logged_in();
        $this->load->model('user_model');
        $this->load->model('tim_model');
	}

	function index()
    {
        $data['tim']=$this->tim_model->getAdmin();
            $this->load->database();
            $this->load->model('user_model');
            $data['kd'] = $this->user_model->auto_code();

            if (isset($_POST['tambah'])) {
                $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
                    'required' => 'Nama Wajib di isi']);
                $this->form_validation->set_rules('notelp', 'No Telepon', 'trim|required', [
                    'required' => 'Nomor Telepon Wajib di isi']);
                $this->form_validation->set_rules('username', 'username', 'trim|required', [
                        'required' => 'Username Wajib di isi']);
                $this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'trim|required', [
                        'required' => 'Jenis Kelamin Wajib di isi']);
                $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
                    'is_unique' => 'Email ini sudah terdaftar!',
                    'required' => 'Email Wajib di isi']);

                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>Pengunjung gagal ditambah!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }

            if (isset($_POST['update'])) {
                $this->form_validation->set_rules('nama_update', 'Nama', 'trim|required', [
                    'required' => 'Nama Wajib di isi']);
                $this->form_validation->set_rules('notelp_update', 'No Telepon', 'trim|required', [
                    'required' => 'Nomor Telepon Wajib di isi']);
                $this->form_validation->set_rules('username_update', 'username', 'trim|required', [
                        'required' => 'Username Wajib di isi']);
                $this->form_validation->set_rules('jeniskelamin_update', 'Jenis Kelamin', 'trim|required', [
                        'required' => 'Jenis Kelamin Wajib di isi']);
                $this->form_validation->set_rules('email_update', 'Email', 'required|trim', [
                    'required' => 'Email Wajib di isi']);
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>Pengunjung gagal diupdate!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }

            if ($this->form_validation->run() == false) {
                $data['judul'] = "Pengunjung LPSE Kabupaten Siak";
                $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
                $this->load->view("layout/header", $data);
                $this->load->view("admin/vw_pengunjung", $data);
                $this->load->view("layout/footer", $data);
    
            } else {
                if (isset($_POST['tambah'])) {
                    $this->tambah();
                }
                if (isset($_POST['update'])) {
                    $this->update($id_user);
                }
                if (isset($_POST['hapus'])) {
                    $this->hapus();
                }
                if (isset($_POST['reset'])) {
                    $this->reset();
                }
            }
	}

    function tambah()
    {
        $jeniskelamin = $this->input->post('jeniskelamin');
        if ($jeniskelamin == "Laki-laki") { 
        $data = [
        'id_user' => htmlspecialchars($this->input->post('id_user', true)),
        'nama' => htmlspecialchars($this->input->post('nama', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'notelp' => htmlspecialchars($this->input->post('notelp', true)),
        'jeniskelamin' => htmlspecialchars($this->input->post('jeniskelamin', true)),
        'username' => htmlspecialchars($this->input->post('username', true)),
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'gambar' => 'default_LK.png',
        'role' => 'Pengunjung',
        'timestamp' => date("Y-m-d H:i:s"),
    ];

} else if ($jeniskelamin == "Perempuan") { 
    $data = [
        'id_user' => htmlspecialchars($this->input->post('id_user', true)),
        'nama' => htmlspecialchars($this->input->post('nama', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'notelp' => htmlspecialchars($this->input->post('notelp', true)),
        'jeniskelamin' => htmlspecialchars($this->input->post('jeniskelamin', true)),
        'username' => htmlspecialchars($this->input->post('username', true)),
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'gambar' => 'default_PR.png',
        'role' => 'Pengunjung',
        'timestamp' => date("Y-m-d H:i:s"),
    ];
}
            $this->user_model->insert($data);
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Pengunjung berhasil ditambah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/pengunjung');
        }


function update($id_user)
{
    $jeniskelamin= $this->input->post('jeniskelamin_update',TRUE);
    if ($jeniskelamin == "Laki-laki") { 
    $data = [
    'nama' => htmlspecialchars($this->input->post('nama_update', true)),
    'email' => htmlspecialchars($this->input->post('email_update', true)),
    'notelp' => htmlspecialchars($this->input->post('notelp_update', true)),
    'jeniskelamin' => $jeniskelamin,
    'username' => htmlspecialchars($this->input->post('username_update', true)),
    'gambar' => 'default_LK.png',
    'role' => 'Pengunjung',
    'timestamp' => htmlspecialchars(date("Y-m-d H:i:s")),
];
} else if ($jeniskelamin == "Perempuan") { 
$data = [
    'nama' => htmlspecialchars($this->input->post('nama_update', true)),
    'email' => htmlspecialchars($this->input->post('email_update', true)),
    'notelp' => htmlspecialchars($this->input->post('notelp_update', true)),
    'jeniskelamin' => $jeniskelamin,
    'username' => htmlspecialchars($this->input->post('username_update', true)),
    'gambar' => 'default_PR.png',
    'role' => 'Pengunjung',
    'timestamp' => htmlspecialchars(date("Y-m-d H:i:s")),
];
}
			$id_user = $this->input->post('id_user');
			$this->user_model->update(['id_user' => $id_user], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i> Pengunjung Berhasil diupdate!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
			redirect('admin/pengunjung');
		}
        
function hapus($id_user)
{
    $this->user_model->delete($id_user);
         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
         <i class="fa fa-exclamation-circle me-2"></i> Pengunjung Berhasil dihapus!
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>');
    redirect('admin/pengunjung');
}

function reset() {
    $data = [
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
    ];

    $id_user = $this->input->post('id_user');
    $this->user_model->update(['id_user' => $id_user], $data);
    // var_dump($data);die;
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>Password berhasil direset!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    redirect('admin/pengunjung');
}
    }


    
