<?php defined('BASEPATH') or exit('No direct scripts allowed');

class Agenda_model extends CI_Model
{
    public $table = 'agenda';
    public $id_agenda= 'agenda.id_agenda';

    public function __construct()
    {
        parent::__construct();
    }
    public function auto_code() {
        $this->db->select_max('id_agenda');
        $auto = $this->db->get('agenda');
        return $auto->result_array();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id_agenda)
    {
        $this->db->from($this->table);
        $this->db->where('id_agenda', $id_agenda);
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
    public function delete($id_agenda)
    {
        $this->db->where($this->id_agenda, $id_agenda);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}