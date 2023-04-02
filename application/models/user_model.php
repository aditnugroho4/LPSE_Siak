<?php
defined('BASEPATH') or exit('No direct scripts allowed');

class User_model extends CI_Model
{
    public $table = 'user';
    public $id_user = 'user.id_user';
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function auto_code() {
        $this->db->select_max('id_user');
        $auto = $this->db->get('user');
        return $auto->result_array();
    }
    public function getBy()
    {
      $this->db->from($this->table);
      $this->db->where('username', $this->session->userdata('username'));
      $query = $this->db->get();
      return $query->row_array();
    }
    
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    
    public function updateAdmin($where, $data)
    {
        $this->db->join('tim', 'user.nip = tim.nip');
        $this->db->set($data);
        $this->db->where('tim.nip',$nip);
        $this->db->update('user');
        return $this->db->affected_rows();   





    }



    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id_user)
    {
        $this->db->where($this->id_user, $id_user);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function getPengunjung() {
        $query=$this->db->query("SELECT * FROM user WHERE role = 'Pengunjung'");
        return $query->num_rows();
	}




}
