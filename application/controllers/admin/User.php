<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{

	public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
        // is_logged_in();
        $this->load->model('user_model');
        $this->load->model('berita_model');
        $this->load->model('tim_model');
	}

	function index()
    {
            $data['user']=$this->User_model->get();
            $data['user']= $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            
            $this->load->database();
            $this->load->model('user_model');
            $data['kd'] = $this->user_model->auto_code();

            $this->load->view("layout/header", $data);
            $this->load->view("layout/login", $data);
            $this->load->view("layout/footer", $data);
	}

    function profil()
    {
        
            $data['judul']="Profile Admin LPSE Kabupaten Siak";
            $data['user']=$this->user_model->get();
            $data['tim']=$this->tim_model->getAdmin();
            $data['diagram'] = $this->berita_model->getDiagram();
            $data['user']= $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            
            $this->load->view("layout/header", $data);
            $this->load->view("admin/vw_profile", $data);
            $this->load->view("layout/footer", $data);
	}

    function test()
    {
            $data['diagram'] = $this->berita_model->getDiagram();
            $data['user']= $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            
            $this->load->view("layout/header", $data);
            $this->load->view("vw_test", $data);
            $this->load->view("layout/footer", $data);
	}

    function profilUpdate()
    {

    $data_tim = [
        'nama' => htmlspecialchars($this->input->post('nama', true)), 
        'email' => htmlspecialchars($this->input->post('email', true)),
        'notelp' => htmlspecialchars($this->input->post('notelp', true)),
        'tempat_lahir' =>  htmlspecialchars($this->input->post('tempat_lahir')),
        'tanggal_lahir' =>  htmlspecialchars($this->input->post('tanggal_lahir')),
        'jeniskelamin' => htmlspecialchars($this->input->post('jeniskelamin', true)),
        'timestamp' => htmlspecialchars(date("Y-m-d H:i:s")),
     ];
     
     $data_admin = [
         'username' => htmlspecialchars($this->input->post('username', true)),
         'timestamp' => htmlspecialchars(date("Y-m-d H:i:s")),
     ];

     $nip = $this->input->post('nip');
     $id_user = $this->input->post('id_user');
     $this->tim_model->update(['nip' => $nip],$data_tim);
    //  $this->user_model->updateAdmin(['id_user' => $id_user],['nip' => $nip],$data_admin);
     $this->db->where('nip', $nip);
     $this->db->join('user', 'tim.nip = user.nip');
     $this->db->update('tim', $data_admin);


    // var_dump($data_admin);exit;
     $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
     <i class="fa fa-exclamation-circle me-2"></i> Profil Admin Berhasil diupdate!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>');
     redirect('admin/user/profil');
		} 


    }


    
