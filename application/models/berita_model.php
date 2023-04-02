<?php defined('BASEPATH') or exit('No direct scripts allowed');

class Berita_model extends CI_Model
{
    public $table = 'berita';
    public $id_berita= 'berita.id_berita';

    public function __construct()
    {
        parent::__construct();
    }
    public function auto_code() {
        $this->db->select_max('id_berita');
        $auto = $this->db->get('berita');
        return $auto->result_array();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id_berita)
    {
        $this->db->from($this->table);
        $this->db->where('id_berita', $id_berita);
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
    public function delete($id_berita)
    {
        $this->db->where($this->id_berita, $id_berita);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function getDiagram() {
        $query=$this->db->query("SELECT kategori, count(kategori) as total FROM berita GROUP BY kategori");
        return $query->result_array();  
}

}