<?php
class Calllog_model extends CI_Model {
    public function insert($params) {
        return $this->db->insert('crm_calllog', $params);
    }
}