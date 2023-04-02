<?php defined('BASEPATH') or exit('No direct scripts allowed');

class Dokumen_model extends CI_Model
{
    public $table = 'dokumen';
    public $id_dokumen= 'dokumen.id_dokumen';

    public function __construct()
    {
        parent::__construct();
    }
    public function auto_code() {
        $this->db->select_max('id_dokumen');
        $auto = $this->db->get('dokumen');
        return $auto->result_array();
    }
    public function getDataDokumen($id)
    {
        $this->db->where('id_dokumen',$id);
        $query = $this->db->get('dokumen');
        return $query->row();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id_dokumen)
    {
        $this->db->from($this->table);
        $this->db->where('id_dokumen', $id_dokumen);
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
    public function delete($id_dokumen)
    {
        $this->db->where($this->id_dokumen, $id_dokumen);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }    
    public function getSOP() {
        $query=$this->db->query("SELECT * FROM dokumen where kategori='SOP'");
        return $query->result_array();  
}


}
