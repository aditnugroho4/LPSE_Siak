<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    function index()
    {

        if ($this->session->userdata('username')) {
        redirect('auth');
    }
        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
        'required' => 'Username Wajib di isi'
    ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
        'required' => 'Password Wajib di isi'
    ]);

        if ($this->form_validation->run() == false) {
        $this->load->view("layout/auth_header.php");
        $this->load->view("auth/login");
        $this->load->view("layout/auth_footer.php");
        } else {
            $this->cek_login();
        }
    }

    function register()
        {

        if ($this->session->userdata('username')) {
                redirect('auth');
        }
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
        $this->form_validation->set_rules(
            'password1','Password','required|trim|min_length[5]|matches[password2]',
            [
            'matches' => 'Password Tidak Sama',
            'min_length' => 'Password Terlalu Pendek',
            'required' => 'Password harus diisi'
            ]
            );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'trim|required', ['required' => 'Jenis Kelamin Wajib di isi']);
    
    if ($this->form_validation->run() == false) {

        $this->load->view('layout/auth_header');
        $this->load->view('auth/register');
        $this->load->view('layout/auth_footer');

    } else {

        $jeniskelamin = $this->input->post('jeniskelamin',TRUE);
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
        'jeniskelamin' => htmlspecialchars($this->input->post('jeniskelamin', true)),
        'notelp' => htmlspecialchars($this->input->post('notelp', true)),
        'username' => htmlspecialchars($this->input->post('username', true)),
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'gambar' => 'default_PR.png',
        'role' => 'Pengunjung',
        'timestamp' => date("Y-m-d H:i:s"),
    ];
}
    $this->user_model->insert($data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User telah berhasil terdaftar </div>');
    redirect('auth');
        }
    }
 
    function cek_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        
		// $this->db->select('us.*, tm.*');	 
        // $this->db->from('user us');
        // $this->db->join('tim tm', 'us.nip = tm.nip');
		// $this->db->where(['us.username' => $username]);
        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        // $user = $this->db->get()->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'role' => $user['role'],
                    // 'id_user' => $user['id_user'],
                    // 'nip' => $user['nip'],
                ];

                $this->session->set_userdata($data);
                if ($user['role'] == 'Admin') {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-exclamation-circle me-2"></i>Berhasil Login!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    redirect('admin/dashboard');
                } else if ($user['role'] == 'Pengunjung') {
                    redirect('Test');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username belum terdaftar! </div>');
            redirect('auth');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout! </div>');
        redirect('auth');
    }
}

?>
