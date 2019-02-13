<?php
class Group_model extends CI_Model {
    public $tableName = "crm_group";

    public function __construct() {
        parent::__construct();
    }

    public function get($id){
        $this->db->select("*");
        $this->db->from($this->tableName);
        $this->db->where("group_id", $id);
        return $this->db->get()->row_array();
    }

    public function get_all() {
        $query = $this->db->get($this->tableName);
        return $query->result_array();
    }

    public function insert($params) {
        return $this->db->insert($this->tableName, $params);
    }

    public function update($id, $params) {
        return $this->db->update($this->tableName, $params, array('group_id' => $id));
    }

    public function delete($id){
        $this->db->delete($this->tableName); 
    }
}

