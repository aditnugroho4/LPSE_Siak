<?php defined('BASEPATH') or exit('No direct scripts allowed');

class keterangan_model extends CI_Model
{
    public $table = 'keterangan';
    public $id_keterangan= 'keterangan.id_keterangan';

    public function __construct()
    {
        parent::__construct();
    }
    public function auto_code() {
        $this->db->select_max('id_keterangan');
        $auto = $this->db->get('keterangan');
        return $auto->result_array();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id_keterangan)
    {
        $this->db->from($this->table);
        $this->db->where('id_keterangan', $id_keterangan);
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
    public function delete($id_keterangan)
    {
        $this->db->where($this->id_keterangan, $id_keterangan);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}