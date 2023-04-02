<?php defined('BASEPATH') or exit('No direct scripts allowed');

class Jabatan_model extends CI_Model
{
    public $table = 'jabatan';
    public $id_jabatan= 'jabatan.id_jabatan';

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
    public function getById($id_jabatan)
    {
        $this->db->from($this->table);
        $this->db->where('id_jabatan', $id_jabatan);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function update($where,$data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id_jabatan)
    {
        $this->db->where($this->id_jabatan, $id_jabatan);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    
    function getJabatan($id_jabatan)
    {
        $this->db->select('*');
        $this->db->from('jabatan');
        $this->db->where('id_jabatan', $id_jabatan);
        $query = $this->db->get();
        return $query->result();
    }
}