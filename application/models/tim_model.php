<?php defined('BASEPATH') or exit('No direct scripts allowed');

class Tim_model extends CI_Model
{
    public $table = 'tim';
    public $nip = 'tim.nip';

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

    public function getAdmin()
    {
        $this->db->select('us.*, tm.*');
        $this->db->from('user us');
        $this->db->join('tim tm', 'us.nip = tm.nip');
        $this->db->where('username', $this->session->userdata('username'));
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getById($nip)
    {
        $this->db->from($this->table);
        $this->db->where('nip', $nip);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($nip)
    {
        $this->db->delete('tim', ['nip' => $nip]);
        $q = $this->db->where('nip', $nip)->get('tim');
        foreach( $q->result() as $Child ) {
             $this->delete($Child->id);

        }
    }
        public function getTim() {
            $query=$this->db->query("SELECT * FROM tim");
            return $query->num_rows();
        }


}
