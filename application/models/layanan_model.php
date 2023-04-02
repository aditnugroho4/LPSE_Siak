<?php defined('BASEPATH') or exit('No direct scripts allowed');

class Layanan_model extends CI_Model
{
    public $table = 'layanan';
    public $id_layanan = 'layanan.id_layanan';

    public function __construct()
    {
        parent::__construct();
    }

    public function auto_code() {
        $this->db->select_max('id_layanan');
        $auto = $this->db->get('layanan');
        return $auto->result_array();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id_layanan)
    {
        $this->db->from($this->table);
        $this->db->where('id_layanan', $id_layanan);
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
    public function delete($id_layanan)
    {
        $this->db->where($this->id_layanan, $id_layanan);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function getLayanan() {
        $query=$this->db->query("SELECT * FROM layanan");
        return $query->num_rows();
    }
}